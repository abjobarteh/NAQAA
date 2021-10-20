<?php

namespace App\Http\Livewire\StandardsCurriculum\Reports;

use App\Exports\StandardsCurriculum\UnitStandardsReportExport;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\StandardsCurriculum\UnitStandard;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class UnitStandardReports extends Component
{
    public $field_of_education, $level, $validated, $entry_requirements, $report_type, $is_field_of_education, $is_level,
        $is_validated, $is_entry_requirements;

    public function mount($report_type)
    {
        $this->report_type = $report_type;
        switch ($this->report_type) {
            case "field_of_education":
                $this->is_field_of_education = true;
            case "level":
                $this->is_level = true;
            case "validated":
                $this->is_validated = true;
            case "entry_requirements":
                $this->is_entry_requirements = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        $fieldofEducations = EducationField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('livewire.standards-curriculum.reports.unit-standard-reports', compact('fieldofEducations', 'levels'))
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $unit_standard = UnitStandard::query();

        if ($this->is_field_of_education) {
            $unit_standard->with('qualification', 'qualification.fieldOfEducation', 'qualification.level')
                ->whereHas('qualification', function (Builder $query) {
                    $query->where('education_field_id', $this->field_of_education);
                });

            return Excel::download(new UnitStandardsReportExport($unit_standard->get()), 'unit_standards_by_field.xlsx');
        } else if ($this->is_level) {
            $unit_standard->with('qualification', 'qualification.fieldOfEducation', 'qualification.level')
                ->whereHas('qualification', function (Builder $query) {
                    $query->where('qualification_level_id', $this->level);
                });

            return Excel::download(new UnitStandardsReportExport($unit_standard->get()), 'unit_standards_by_level.xlsx');
        } else if ($this->is_validated) {
            $unit_standard->with('qualification', 'qualification.fieldOfEducation', 'qualification.level')
                ->where('validated', $this->validated);

            return Excel::download(new UnitStandardsReportExport($unit_standard->get()), 'unit_standards_by_validation.xlsx');
        } else if ($this->is_entry_requirements) {
            $unit_standard->with('qualification', 'qualification.fieldOfEducation', 'qualification.level')
                ->whereHas('qualification', function (Builder $query) {
                    $query->where('entry_requirements', 'like', '%' . $this->entry_requirements . '%');
                });

            return Excel::download(new UnitStandardsReportExport($unit_standard->get()), 'unit_standards_by_entry_requirements.xlsx');
        }
    }
}
