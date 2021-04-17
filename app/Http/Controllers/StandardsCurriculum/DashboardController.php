<?php

namespace App\Http\Controllers\StandardsCurriculum;

use App\Http\Controllers\Controller;
use App\Models\StandardsCurriculum\UnitStandard;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $tiles = [
            [
                'name' => 'Total Unit Standards',
                'data' => UnitStandard::all()->count(),
                'background' => 'bg-info',
                'icon' => 'fas fa-university fa-3x'
            ],
            [
                'name' => 'Total validated unit standards',
                'data' => UnitStandard::where('validated','yes')->count(),
                'background' => 'bg-success',
                'icon' => 'fas fa-tasks fa-3x'
            ],
            [
                'name' => 'Total non validated unit standards',
                'data' => UnitStandard::where('validated','no')->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-graduation-cap'
            ],
        ];

        return view('standardscurriculum.dashboard', compact('tiles'));
    }
}
