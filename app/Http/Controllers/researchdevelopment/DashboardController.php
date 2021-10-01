<?php

namespace App\Http\Controllers\researchdevelopment;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use App\Models\ResearchDevelopment\ResearchSurvey;
use App\Models\ResearchDevelopment\StudentDetailsDataCollection;
use App\Models\TrainingProviderProgramme;
use App\Models\TrainingProviderStudent;

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
                'name' => 'Total Learning Centers',
                'data' => TrainingProvider::all()->count(),
                'background' => 'bg-info',
                'icon' => 'fas fa-university fa-3x'
            ],
            [
                'name' => 'Total Programs Offered',
                'data' => TrainingProviderProgramme::distinct()->count(),
                'background' => 'bg-success',
                'icon' => 'fas fa-tasks fa-3x'
            ],
            [
                'name' => 'Total Graduates',
                'data' => TrainingProviderStudent::whereYear('completion_date', date('Y'))->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-graduation-cap'
            ],
            [
                'name' => 'Total Admissions',
                'data' => TrainingProviderStudent::whereYear('admission_date', date('Y'))->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-user-graduate'
            ],
            [
                'name' => 'Total Research Documentation',
                'data' => ResearchSurvey::all()->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-poll-h fa-3x'
            ]
        ];

        $latestresearches = ResearchSurvey::all()->sortByDesc('created_at')->take(10);

        return view('researchdevelopment.dashboard', compact('tiles', 'latestresearches'));
    }
}
