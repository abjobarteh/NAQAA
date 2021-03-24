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
        abort_if(Gate::denies('access_activity_logs'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $activities = Activity::with(['causer','subject'])->orderBy('created_at','desc')->get();

        $roles = Role::all()->pluck('name','id');

        $users = User::all()->pluck('username','id');
        
        // dd($roles);

        return view('systemadmin.auditlogs.index', compact('activities','roles','users'));
    }

    public function activityLogsFilter(Request $request)
    {
        // if($)
        $data = $request->filter_by_user;
        if(!empty($request->filter_by_user))
        {
            $result = Activity::where('causer_id', $request->filter_by_user)->get();
        }

        return response()->json([
            'data' => $result,

        ],200);
        
    }


}
