<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
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
                'name' => 'Training Provider Applications',
                'data' => ApplicationDetail::where('application_type', 'institution_registration')
                    ->whereYear('created_at', date('Y'))
                    ->count(),
                'background' => 'bg-info',
                'icon' => 'fas fa-university fa-3x'
            ],
            [
                'name' => 'Trainer Registration Applications',
                'data' => ApplicationDetail::where('application_type', 'trainer_registration')
                    ->whereYear('created_at', date('Y'))
                    ->count(),
                'background' => 'bg-success',
                'icon' => 'fas fa-tasks fa-3x'
            ],
            [
                'name' => 'Trainer Accreditations Applications',
                'data' => ApplicationDetail::where('application_type', 'trainer_accreditation')
                    ->whereYear('created_at', date('Y'))
                    ->count(),
                'background' => 'bg-success',
                'icon' => 'fas fa-tasks fa-3x'
            ],
            [
                'name' => 'Licences Issued',
                'data' => RegistrationLicenceDetail::whereYear('created_at', date('Y'))->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-graduation-cap'
            ],
            [
                'name' => 'Pending Applications',
                'data' => ApplicationDetail::where('status', 'pending')
                    ->whereYear('created_at', date('Y'))
                    ->count(),
                'background' => 'bg-warning',
                'icon' => 'fas fa-user-graduate'
            ],
        ];

        return view('registrationAccreditation.dashboard', compact('tiles'));
    }
}
