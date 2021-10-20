<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\Trainer;
use Illuminate\Http\Request;

class AssessorVerifiersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $assessor_verifiers = Trainer::with('currentAccreditation')
            ->where('type', 'assessor')
            ->orWhere('type', 'verifier')
            ->whereHas('currentAccreditation')
            ->latest()
            ->get();

        return view('assessmentcertification.assessor-verifiers', compact('assessor_verifiers'));
    }
}
