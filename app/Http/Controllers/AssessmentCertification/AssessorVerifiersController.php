<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\Trainer;
use Illuminate\Database\Eloquent\Builder;
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
        $assessor_verifiers = Trainer::with('currentAccreditation', 'validLicence')
            ->whereHas('validLicence', function (Builder $query) {
                $query->where('trainer_type', 'Assessor')
                    ->orWhere('trainer_type', 'Verifier');
            })
            ->latest()
            ->get();

        return view('assessmentcertification.assessor-verifiers', compact('assessor_verifiers'));
    }
}
