<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        //Todo: use real data for training providers and trainers tiles @Biran

        $tiles = [
            [
                'name' => 'Total Users',
                'data' => User::all()->count(),
                'background' => 'bg-info',
                'icon' => 'ion ion-android-contacts'
            ],
            [
                'name' => 'Total Training Providers',
                'data' => 0,
                'background' => 'bg-success',
                'icon' => 'ion ion-ios-albums'
            ],
            [
                'name' => 'Total Trainers',
                'data' => 0,
                'background' => 'bg-warning',
                'icon' => 'ion ion-man'
            ]
        ];

        $activities = Activity::with(['causer'])->whereHas('causer')->latest()->take(10)->get();

        return view('systemadmin.dashboard', compact('activities', 'tiles'));
    }
}
