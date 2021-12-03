<?php

namespace App\Http\Livewire\AssessmentCertification\Reports;

use App\Exports\AssessmentCertification\LearnerAchievementReportsExport;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\EducationField;
use App\Models\LocalGovermentAreas;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderStudent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LearnerAchievementReports extends Component
{
    public $institution_type, $programme, $field_of_education, $level, $qualification_type,
        $certification_status, $region, $report_type;
    public $is_institution_type, $is_programme, $is_field_of_education, $is_level,
        $is_qualification_type, $is_certification_status, $is_region;

    public function mount($report_type)
    {
        $this->report_type = $report_type;
        switch ($this->report_type) {
            case "institution_type":
                $this->is_institution_type = true;
            case "programme":
                $this->is_programme = true;
            case "field_of_education":
                $this->is_field_of_education = true;
            case "level":
                $this->is_level = true;
            case "qualification_type":
                $this->is_qualification_type = true;
            case "certification_status":
                $this->is_certification_status = true;
            case "region":
                $this->is_region = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        $fieldofEducations = EducationField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $qualifications = Qualification::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');

        return view(
            'livewire.assessment-certification.reports.learner-achievement-reports',
            compact(
                'fieldofEducations',
                'levels',
                'classifications',
                'qualifications',
                'regions',
            )
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $students = StudentRegistrationDetail::query();

        if ($this->is_institution_type) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->whereHas('trainingprovider', function (Builder $query) {
                    $query->where('classification_id', $this->institution_type);
                });

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_institution_type.xlsx');
        } else if ($this->is_programme) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->where('programme_id', $this->programme);

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_programme.xlsx');
        } else if ($this->is_field_of_education) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->whereHas('programme', function (Builder $query) {
                    $query->where('education_field_id', $this->field_of_education);
                });

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_field_of_education.xlsx');
        } else if ($this->is_level) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->where('programme_level_id', $this->level);

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_programme_level.xlsx');
        } else if ($this->is_qualification_type) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->whereHas('studentAssessments', function (Builder $query) {
                    $query->where('qualification_type', $this->qualification_type);
                });

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_qualification_type.xlsx');
        } else if ($this->is_certification_status) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->whereHas('studentAssessments', function (Builder $query) {
                    $query->where('assessment_satus', $this->certification_status);
                });

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_certification_status.xlsx');
        } else if ($this->is_region) {
            $students->with('trainingprovider', 'programme', 'level', 'registeredStudent')
                ->whereHas('registeredStudent', function (Builder $query) {
                    $query->where('region_id', $this->region);
                });

            return Excel::download(new LearnerAchievementReportsExport($students->get()), 'students_by_certification_status.xlsx');
        }
    }
}
