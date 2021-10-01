<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStudent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class GenerateCandidates extends Component
{
    public $candidate_type, $training_provider_id, $programme_id, $programme_level_id, $registration_no,
        $date_of_birth, $isPrivate = false, $candidatesExist = false, $assessors, $verifiers,
        $assessor_id, $verifier_id, $candidates, $selectAll = false, $selectedCandidates = [];

    protected $rules = [
        'candidate_type' => ['required', 'in:regular,private'],
        'training_provider_id' => ['required_if:candidate_type,regular', 'numeric'],
        'programme_id' => ['required_if:candidate_type,regular', 'numeric'],
        'programme_level_id' => ['required_if:candidate_type,regular', 'numeric'],
        'registration_no' => ['required_if:candidate_type,regular', 'string'],
        'date_of_birth' => ['required_if:candidate_type,regular', 'date'],
    ];

    public function mount()
    {
        $this->candidate_type = 'regular';
    }
    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $programmes = Qualification::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view(
            'livewire.assessment-certification.generate-candidates',
            compact(
                'institutions',
                'programmes',
                'levels',
            )
        )->extends('layouts.admin');
    }

    public function updatedCandidateType($value)
    {

        if ($value === 'private') {
            $this->isPrivate = true;
        } else {
            $this->isPrivate = false;
        }
    }

    public function getCandidates()
    {
        // dd('form submission.....');

        // dd('is validation working');
        // $this->validate();

        if ($this->candidate_type === 'regular') {
            $this->candidates = TrainingProviderStudent::where('training_provider_id', $this->training_provider_id)
                ->where('programme_id', $this->programme_id)
                ->where('programme_level_id', $this->programme_level_id)
                ->where('academic_year', (Carbon::now())->format('Y'))
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                ->latest()
                ->get();
        } else {
            $this->candidates = TrainingProviderStudent::whereHas('registration', function (Builder $query) {
                $query->where('registration_no', $this->registration_no);
            })
                ->where('date_of_birth', $this->date_of_birth)
                ->where('academic_year', (Carbon::now())->format('Y'))
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                ->latest()
                ->get();
        }

        if ($this->candidates->isEmpty()) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'No candidates',
                'message' => 'No candidates/students exist under these parameters.'
            ]);
        } else {
            $this->candidatesExist = true;
            $this->assessors = Trainer::where('type', 'assessor')->get();
            $this->verifiers = Trainer::where('type', 'verifier')->get();
        }
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedCandidates = $this->candidates->pluck('id')->toArray();
        } else {
            $this->selectedCandidates = [];
        }
    }

    public function assignAssessor()
    {
        $this->validate([
            'assessor_id' => ['required', 'numeric'],
            'verifier_id' => ['required', 'numeric'],
        ]);

        // dd(count($this->selectedCandidates));

        if (count($this->selectedCandidates) == 0) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Please select at least one student to assign to assessor/verifier!'
            ]);

            return;
        }

        // check if candidates has already assessed
        $assessmentExist = StudentAssessmentDetail::whereIn('student_id', $this->selectedCandidates)
            ->whereNull('assessment_status')
            ->orWhere('assessment_status', 'competent')
            ->whereYear('last_assessment_date', (Carbon::now())->format('Y'))
            ->exists();

        if (!$assessmentExist) {
            for ($candidate = 0; $candidate < count($this->selectedCandidates); $candidate++) {
                $application = StudentRegistrationDetail::where('student_id', $this->selectedCandidates[$candidate])->get();

                StudentAssessmentDetail::create(
                    [
                        'student_id' => $this->selectedCandidates[$candidate],
                        'assessor_id' => $this->assessor_id,
                        'verifier_id' => $this->verifier_id,
                        'application_id' => $application[0]->id,
                    ]
                );
            }

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Assessor/Verifiers successfully assigned to selected students'
            ]);
        } else {
            $sameAssessorAssignment = StudentAssessmentDetail::whereIn('student_id', $this->selectedCandidates)
                ->whereNull('assessment_status')
                ->where('assessor_id', $this->assessor_id)
                ->where('verifier_id', $this->verifier_id)
                ->whereYear('created_at', (Carbon::now())->format('Y'))
                ->exists();

            if (!$sameAssessorAssignment) {
                StudentAssessmentDetail::whereIn('student_id', $this->selectedCandidates)
                    ->update([
                        'assessor_id' => $this->assessor_id,
                        'verifier_id' => $this->verifier_id,
                    ]);
            } else {
                return $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'title' => 'Same Assessor/Verifier assignment',
                    'message' => 'This/These student(s) has/have already been assigned to this assessor and verifier!'
                ]);
            }


            return $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'Assessor/Verifier changed',
                'message' => 'Assessor/Verifiers successfully changed for selected students'
            ]);
        }
    }
}
