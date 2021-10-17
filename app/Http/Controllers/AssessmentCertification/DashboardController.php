<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\TrainingProviderStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tiles = [
            [
                'name' => 'Total Registered Students',
                'data' => TrainingProviderStudent::whereHas('registration')->count(),
                'background' => 'bg-info',
                'icon' => 'fas fa-user-graduate fa-3x'
            ],
            [
                'name' => 'Total Certificate Endorsement',
                'data' => EndorsedCertificateDetail::all()->count(),
                'background' => 'bg-success',
                'icon' => 'fas fa-certificate fa-3x'
            ],
        ];

        return view('assessmentcertification.dashboard', compact('tiles'));
    }
}
