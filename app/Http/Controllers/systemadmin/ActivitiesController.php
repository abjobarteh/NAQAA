<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Activitylog\Models\Activity;
use Symfony\Component\HttpFoundation\Response;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_activity_logs'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = Activity::with(['causer', 'subject'])->whereHas('causer')->orderBy('created_at', 'desc')->get();

        return view('systemadmin.auditlogs.index', compact('activities'));
    }

    public function show($id)
    {
        $activity = Activity::where('id', $id)->get();

        return view('systemadmin.auditlogs.show', compact('activity'));
    }

    public function filterLogs(Request $request)
    {
        $activity = Activity::query();

        if (
            ($request->user_id != null || $request->user_id != '')
            && ($request->daterange == '' || $request->daterange == null)
        ) {
            $activity->where('causer_id', $request->user_id);
        }

        if (
            ($request->user_id != null || $request->user_id != '')
            && ($request->daterange != '' || $request->daterange != null)
        ) {
            $daterange = explode('-', $request->daterange);
            $activity->where('causer_id', $request->user_id)
                ->whereDate('created_at', '>=', $daterange[0])->whereDate('created_at', '>=', $daterange[1]);
        }

        return json_encode(['data' => $activity->get(), 'status' => 200]);
    }
}
