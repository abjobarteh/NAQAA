<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\StandardsCurriculum\UnitStandard;
use App\Models\TrainingProviderStudent;
use Carbon\Carbon;
use Livewire\Component;

class AssessmentForm extends Component
{
    public $assessment_status, $qualification_type, $last_assessment_date, $assessment_center,
        $student_detail, $is_partial = false, $unit_standards = null;

    protected $listeners = ['openAssessmentForm' => 'showFormModal'];

    public function render()
    {
        return view('livewire.assessment-certification.assessment-form');
    }

    public function showFormModal($id)
    {
        $this->student_detail = TrainingProviderStudent::findOrFail($id);

        if (!is_null($this->student_detail->currentAssessment)) {
            $this->fill([
                'assessment_status' => $this->student_detail->currentAssessment->assessment_status,
                'qualification_type' => $this->student_detail->currentAssessment->qualification_type,
                'last_assessment_date' => $this->student_detail->currentAssessment->last_assessment_date,
                'assessment_center' => $this->student_detail->currentAssessment->assessment_center,
            ]);
        }

        $this->dispatchBrowserEvent('openAssessmentFormModal');
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

        $this->dispatchBrowserEvent('closeAssessmentFormModal');
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
        $this->validate([
            'assessment_status' => ['required', 'in:competent,notcompetent,incomplete'],
            'qualification_type' => ['required', 'in:full,partial'],
            'last_assessment_date' => ['required', 'date'],
            'assessment_center' => ['nullable', 'string'],
        ]);

        $alreadyAssigned = StudentAssessmentDetail::where('student_id', $this->student_detail->id)
            ->whereYear('created_at', (Carbon::now())->format('Y'))
            ->exists();

        if ($alreadyAssigned) {
            if ($this->assessment_status === 'competent') {
                $alreadyAssessed = StudentAssessmentDetail::where('assessment_status', 'competent')
                    ->where('student_id', $this->student_detail->id)
                    ->whereYear('created_at', (Carbon::now())->format('Y'))
                    ->exists();

                if (!$alreadyAssessed) {
                    StudentAssessmentDetail::where('student_id', $this->student_detail->id)
                        ->update([
                            'assessment_status' => $this->assessment_status,
                            'qualification_type' => $this->qualification_type,
                            'last_assessment_date' => $this->last_assessment_date,
                            'assessment_center' => $this->assessment_center,
                        ]);
                } else {
                    return $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'title' => 'Duplicate Candidate Competent assessment',
                        'message' => 'This candidate has already been assessed to be Competent!'
                    ]);
                }
            } else {
                StudentAssessmentDetail::where('student_id', $this->student_detail->id)
                    ->update([
                        'assessment_status' => $this->assessment_status,
                        'qualification_type' => $this->qualification_type,
                        'last_assessment_date' => $this->last_assessment_date,
                        'assessment_center' => $this->assessment_center,
                    ]);
            }

            $this->emit('refreshStudentAssessment');

            $this->closeAssessmentForm();

            return $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'Candidate Assessment Details Saved',
                'message' => 'Candidates assessment details has successfully been saved!'
            ]);
        } else {

            $this->closeAssessmentForm();

            return $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'title' => 'Assessor/verifier not assigned to candidate',
                'message' => 'This Candidate has not been assigned an assesor/verifier'
            ]);
        }
    }
}
