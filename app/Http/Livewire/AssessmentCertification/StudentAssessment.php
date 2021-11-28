<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Jobs\GenerateCandidateID;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStudent;
use Carbon\Carbon;
use Illuminate\Bus\Batch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;
use Throwable;

class StudentAssessment extends Component
{
    public $assessment_type, $candidate_type, $training_provider_id, $programme_id, $programme_level_id, $academic_year,
        $registration_no, $date_of_birth, $isReassessment = false, $isPrivate = false,
        $candidatesExist = false, $candidates, $selectAll = false, $selectedCandidates = [];

    protected $rules = [
        'assessment_type' => ['required', 'in:new,reassessment'],
        'candidate_type' => ['required_if:assessment_type,new', 'in:regular,private'],
        'training_provider_id' => ['required_if:candidate_type,regular', 'numeric'],
        'programme_id' => ['required_if:candidate_type,regular', 'numeric'],
        'programme_level_id' => ['required_if:candidate_type,regular', 'numeric'],
        'academic_year' => ['required_if:candidate_type,regular', 'numeric'],
        'registration_no' => ['string'],
        'date_of_birth' => ['date'],
    ];

    protected $listeners = ['refreshStudentAssessment' => '$refresh'];

    public function mount()
    {
        $this->assessment_type = 'new';
        $this->candidate_type = 'regular';
    }

    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'Approved');
        })->pluck('name', 'id');

        $programmes = Qualification::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view(
            'livewire.assessment-certification.student-assessment',
            compact(
                'institutions',
                'programmes',
                'levels'
            )
        )
            ->extends('layouts.admin');
    }

    public function updatedAssessmentType($value)
    {
        if ($value === 'reassessment') {
            $this->isReassessment = true;
        } else {
            $this->isReassessment = false;
        }
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
        // $this->validate();

        if ($this->assessment_type === 'new' && $this->candidate_type === 'regular') {
            $this->candidates = StudentRegistrationDetail::where('training_provider_id', $this->training_provider_id)
                ->where('programme_id', $this->programme_id)
                ->where('programme_level_id', $this->programme_level_id)
                ->where('academic_year', $this->academic_year)
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registeredStudent'])
                ->latest()
                ->get();
        } else {
            $this->candidates = StudentRegistrationDetail::where('registration_no', $this->registration_no)
                ->whereHas('registeredStudent', function (Builder $query) {
                    $query->where('date_of_birth', $this->date_of_birth);
                })
                ->where('academic_year', $this->academic_year)
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registeredStudent'])
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
        }
    }

    public function generateCandidateIDs()
    {
        $competent_candidates = StudentRegistrationDetail::whereHas('studentAssessments', function (Builder $query) {
            $query->where('assessment_status', 'competent');
        })
            ->where('training_provider_id', $this->training_provider_id)
            ->where('programme_id', $this->programme_id)
            ->where('programme_level_id', $this->programme_level_id)
            ->get();
        $jobs = [];

        foreach ($competent_candidates as $candidate) {
            $jobs[] = new GenerateCandidateID($candidate->id);
        }

        $batch = Bus::batch($jobs)
            ->catch(function (Batch $batch, Throwable $e) {
                dd($e->getMessage());
            })
            ->finally(function (Batch $batch) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'title' => 'Generate Candidate IDs completed successfully',
                    'message' => 'Candidate IDs successfully generated for Competent Candidates'
                ]);
            })
            ->dispatch();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'info',
            'title' => 'Candidate IDs generation started',
            'message' => 'Please be patient while the system generate candidate IDs for Competent Students.'
        ]);
    }
}
