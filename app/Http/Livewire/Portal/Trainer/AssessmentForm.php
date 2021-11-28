<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\StandardsCurriculum\UnitStandard;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class AssessmentForm extends Component
{
    public $assessment_status, $qualification_type, $last_assessment_date, $assessment_center,
        $student_detail, $is_partial = false, $unit_standards = null, $is_verifier = false,
        $verifier_comments;

    protected $listeners = ['openTrainerAssessmentForm' => 'showTrainerAssessmentFormModal'];

    public function render()
    {
        return view('livewire.portal.trainer.assessment-form');
    }

    public function showTrainerAssessmentFormModal($id)
    {
        $this->student_detail = StudentAssessmentDetail::findOrFail($id)->load('student');

        if (!is_null($this->student_detail)) {
            $this->fill([
                'assessment_status' => $this->student_detail->assessment_status,
                'qualification_type' => $this->student_detail->qualification_type,
                'last_assessment_date' => $this->student_detail->last_assessment_date,
                'assessment_center' => $this->student_detail->assessment_center,
            ]);
        }

        if (
            Trainer::where('login_id', auth()->user()->id)
            ->whereHas('applications', function (Builder $query) {
                $query->where('trainer_type', 'verifier')
                    ->where('status', 'Approved');
            })
            ->exists()
        ) {
            $this->is_verifier = true;
        }

        $this->dispatchBrowserEvent('openTrainerAssessmentFormModal');
    }

    public function closeAssessmentForm()
    {
        $this->reset([
            'assessment_status',
            'qualification_type',
            'last_assessment_date',
            'assessment_center',
            'student_detail'
        ]);

        $this->dispatchBrowserEvent('closeTrainerAssessmentFormModal');
    }

    public function updatedQualificationType($type)
    {
        if ($type == 'partial') {
            $this->is_partial = true;
            $this->unit_standards = UnitStandard::where('qualification_id', $this->student_detail->programme_id)->get();
        } else {
            $this->is_partial = false;
        }
    }

    public function saveStudentAssessment()
    {
        if (!$this->is_verifier) {
            $this->validate([
                'assessment_status' => ['required', 'in:competent,notcompetent,incomplete'],
                'qualification_type' => ['required', 'in:full,partial'],
                'last_assessment_date' => ['required', 'date'],
                'assessment_center' => ['nullable', 'string'],
            ]);

            $this->student_detail->update([
                'assessment_status' => $this->assessment_status,
                'qualification_type' => $this->qualification_type,
                'last_assessment_date' => $this->last_assessment_date,
                'assessment_center' => $this->assessment_center,
            ]);
        } else {
            $this->validate([
                'verifier_comments' => 'required|string',
            ]);
            $this->student_detail->update([
                'comments' => $this->verifier_comments,
            ]);
        }
    }
}
