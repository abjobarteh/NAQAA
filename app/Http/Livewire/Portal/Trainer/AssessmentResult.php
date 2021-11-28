<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class AssessmentResult extends Component
{
    public $training_provider_id, $candidates;
    public $candidatesExist = false, $is_error = false, $error_msg;

    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'Approved');
        })->pluck('name', 'id');

        return view('livewire.portal.trainer.assessment-result', compact('institutions'))
            ->extends('layouts.portal');
    }

    public function getCandidates()
    {
        $trainer_id = (Trainer::where('login_id', auth()->user()->id)->first())->id;

        $this->candidates = StudentAssessmentDetail::with('student', 'registration')
            ->where(function ($query) use ($trainer_id) {
                $query->where('assessor_id', $trainer_id)
                    ->orWhere('verifier_id', $trainer_id);
            })
            ->whereNull('assessment_status')
            ->whereHas('registration', function (Builder $query) {
                $query->where('training_provider_id', $this->training_provider_id);
            })
            ->get();

        if (!$this->candidates->isEmpty()) {
            $this->candidatesExist = true;
        } else {
            $this->is_error = true;
            $this->error_msg = "No candidates from this Institution has been assigned to you";
        }
    }
}
