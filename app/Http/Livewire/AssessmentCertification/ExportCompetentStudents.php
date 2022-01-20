<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Exports\AssessmentCertification\CompetentStudentsExport;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ExportCompetentStudents extends Component
{
    public $candidate_type, $training_provider_id, $programme_id, $programme_level_id, $registration_no, $academic_year,
        $date_of_birth, $isPrivate = false, $candidates;

    protected $rules = [
        'candidate_type' => 'required|in:regular,private',
        'training_provider_id' => 'nullable|numeric',
        'programme_id' => 'nullable|numeric',
        'programme_level_id' => 'nullable|numeric',
        'registration_no' => 'required_if:candidate_type,private|nullable|string',
        'date_of_birth' => 'required_if:candidate_type,private|nullable|date',
        'academic_year' => 'required_if:candidate_type,regular|nullable|numeric',
    ];

    public function mount()
    {
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
            'livewire.assessment-certification.export-competent-students',
            compact(
                'institutions',
                'programmes',
                'levels'
            )
        )
            ->extends('layouts.admin');
    }

    public function updatedCandidateType($value)
    {

        if ($value === 'private') {
            $this->isPrivate = true;
        } else {
            $this->isPrivate = false;
        }
    }

    public function exportCompetentStudents()
    {
        $this->validate();

        if ($this->candidate_type === 'regular') {
            if (
                !is_null($this->training_provider_id) &&
                !is_null($this->programme_id) &&
                !is_null($this->programme_level_id)
            ) {
                $this->candidates = StudentRegistrationDetail::where('training_provider_id', $this->training_provider_id)
                    ->where('programme_id', $this->programme_id)
                    ->where('programme_level_id', $this->programme_level_id)
                    ->where('academic_year', $this->academic_year)
                    ->whereHas('latestAssessment', function (Builder $query) {
                        $query->where('assessment_status', 'competent');
                    })
                    ->with([
                        'programme:id,name',
                        'level:id,name',
                        'trainingprovider:id,name',
                        'registeredStudent',
                        'latestAssessment'
                    ])
                    ->latest()
                    ->get();
            } else if (
                !is_null($this->training_provider_id) &&
                is_null($this->programme_id) &&
                is_null($this->programme_level_id)
            ) {
                $this->candidates = StudentRegistrationDetail::where('training_provider_id', $this->training_provider_id)
                    ->where('academic_year', $this->academic_year)
                    ->whereHas('latestAssessment', function (Builder $query) {
                        $query->where('assessment_status', 'competent');
                    })
                    ->with([
                        'programme:id,name',
                        'level:id,name',
                        'trainingprovider:id,name',
                        'registeredStudent',
                        'latestAssessment'
                    ])
                    ->latest()
                    ->get();
            } else if (
                !is_null($this->programme_id) &&
                is_null($this->training_provider_id) &&
                is_null($this->programme_level_id)
            ) {
                $this->candidates = StudentRegistrationDetail::where('programme_id', $this->programme_id)
                    ->where('academic_year', $this->academic_year)
                    ->whereHas('latestAssessment', function (Builder $query) {
                        $query->where('assessment_status', 'competent');
                    })
                    ->with([
                        'programme:id,name',
                        'level:id,name',
                        'trainingprovider:id,name',
                        'registeredStudent',
                        'latestAssessment'
                    ])
                    ->latest()
                    ->get();
            } else if (
                !is_null($this->programme_level_id) &&
                is_null($this->programme_id) &&
                is_null($this->training_provider_id)
            ) {
                $this->candidates = StudentRegistrationDetail::where('programme_level_id', $this->programme_level_id)
                    ->where('academic_year', $this->academic_year)
                    ->whereHas('latestAssessment', function (Builder $query) {
                        $query->where('assessment_status', 'competent');
                    })
                    ->with([
                        'programme:id,name',
                        'level:id,name',
                        'trainingprovider:id,name',
                        'registeredStudent',
                        'latestAssessment'
                    ])
                    ->latest()
                    ->get();
            } else {
                return $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'title' => 'Invalid Paramteres',
                    'message' => 'These Parameters are not supported for filtering Competent Candidates.'
                ]);
            }
        } else {
            $this->candidates = StudentRegistrationDetail::where('registration_no', $this->registration_no)
                ->whereHas('registeredStudent', function (Builder $query) {
                    $query->where('date_of_birth', $this->date_of_birth);
                })
                ->where('academic_year', $this->academic_year)
                ->whereHas('latestAssessment', function (Builder $query) {
                    $query->where('assessment_status', 'competent');
                })
                ->with([
                    'programme:id,name',
                    'level:id,name',
                    'trainingprovider:id,name',
                    'registeredStudent',
                    'latestAssessment'
                ])
                ->latest()
                ->get();
        }

        if ($this->candidates->isEmpty()) {
            return $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'No Competent candidates',
                'message' => 'No Competent candidates/students exist under these parameters.'
            ]);
        } else {
            return Excel::download(
                new CompetentStudentsExport($this->candidates),
                "competent_students_academic_year_$this->academic_year.xlsx"
            );
        }
    }
}
