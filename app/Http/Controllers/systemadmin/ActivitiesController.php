<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();

        $roles = Role::all()->pluck('name','id');

        $users = User::all()->pluck('username','id');
        
        // dd($roles);

        return view('systemadmin.auditlogs.index', compact('activities','roles','users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
