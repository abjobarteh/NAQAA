<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
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
                'icon' => 'fas fa-users'
            ],
            [
                'name' => 'Total System Users',
                'data' => User::where('user_category', 'system')->count(),
                'background' => 'bg-secondary',
                'icon' => 'fas fa-user-friends'
            ],
            [
                'name' => 'Total Portal Users',
                'data' => User::where('user_category', 'portal')->count(),
                'background' => 'bg-teal',
                'icon' => 'fas fa-user'
            ],
            [
                'name' => 'Total Training Providers',
                'data' => Role::whereHas('users')->where('slug', 'institution')->count(),
                'background' => 'bg-primary',
                'icon' => 'fas fa-university'
            ],
            [
                'name' => 'Total Trainers',
                'data' => Role::whereHas('users')->where('slug', 'trainer')->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-user-tie'
            ]
        ];

        $activities = Activity::with(['causer'])->whereHas('causer')->latest()->take(10)->get();

        return view('systemadmin.dashboard', compact('activities', 'tiles'));
    }
}
