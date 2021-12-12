<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;

class StudentRegistrationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $training_provider_id = (TrainingProvider::where('login_id', auth()->user()->id)->first())->id;

        $candidates = StudentRegistrationDetail::with(
            'registeredStudent',
            'programme',
            'level',
            'trainingprovider',
        )
            ->where('training_provider_id', $training_provider_id)
            ->where('academic_year', date('Y'))
            ->get();

        return view('portal.institutions.student-registrations', compact('candidates'));
    }
}
