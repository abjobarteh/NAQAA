<?php

namespace App\Http\Controllers\Portal\Trainer;

use App\Http\Controllers\Controller;
use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\RegistrationAccreditation\Trainer;
use Illuminate\Http\Request;

class AssessmentsController extends Controller
{
    public function index()
    {
        $trainer_id = (Trainer::where('login_id', auth()->user()->id)->first())->id;

        $assigned_candidates = StudentAssessmentDetail::with(
            'student',
            'registration',
            'registration.programme',
            'regitsration.level',
            'regitsration.trainingprovider',
        )
            ->where(function ($query) use ($trainer_id) {
                $query->where('assessor_id', $trainer_id)
                    ->orWhere('verifier_id', $trainer_id);
            })
            ->whereNull('assessment_status')
            ->whereHas('registration')
            ->get();

        return view('portal.trainers.assessments.index', compact('assigned_candidates'));
    }
}
