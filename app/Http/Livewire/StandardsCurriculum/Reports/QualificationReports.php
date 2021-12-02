<?php

namespace App\Http\Livewire\StandardsCurriculum\Reports;

use App\Exports\StandardsCurriculum\QualificationsReportExport;
use App\Models\EducationField;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class QualificationReports extends Component
{
    public $field_of_education, $level, $mode_of_delivery, $minimum_duration,
        $entry_requirements, $report_type, $is_field_of_education, $is_level, $is_mode_of_delivery,
        $is_minimum_duration, $is_entry_requirements;

    public function mount($report_type)
    {
        $this->report_type = $report_type;
        switch ($this->report_type) {
            case "field_of_education":
                $this->is_field_of_education = true;
            case "level":
                $this->is_level = true;
            case "mode_of_delivery":
                $this->is_mode_of_delivery = true;
            case "minimum_duration":
                $this->is_minimum_duration = true;
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

        return view(
            'livewire.standards-curriculum.reports.qualification-reports',
            compact('fieldofEducations', 'levels')
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $qualification = Qualification::query();

        if ($this->is_field_of_education) {
            $qualification->with('fieldOfEducation', 'level')
                ->where('education_field_id', $this->field_of_education);

            return Excel::download(new QualificationsReportExport($qualification->get()), 'qualifications_by_field.xlsx');
        } else if ($this->is_level) {
            $qualification->with('fieldOfEducation', 'level')
                ->where('qualification_level_id', $this->level);

            return Excel::download(new QualificationsReportExport($qualification->get()), 'qualifications_by_level.xlsx');
        } else if ($this->is_mode_of_delivery) {
            $qualification->with('fieldOfEducation', 'level')
                ->where(DB::raw('lower(mode_of_delivery)'), 'like', '%' . strtolower($this->validated) . '%');

            return Excel::download(new QualificationsReportExport($qualification->get()), 'qualifications_by_mode_of_delivery.xlsx');
        } else if ($this->is_minimum_duration) {
            $qualification->with('fieldOfEducation', 'level')
                ->where('minimum_duration', $this->minimum_duration);

            return Excel::download(new QualificationsReportExport($qualification->get()), 'qualifications_by_minimum_duration.xlsx');
        } else if ($this->is_entry_requirements) {
            $qualification->with('fieldOfEducation', 'level')
                ->where('entry_requirements', 'like', '%' . $this->entry_requirements . '%');

            return Excel::download(new QualificationsReportExport($qualification->get()), 'qualifications_by_entry_requirements.xlsx');
        }
    }
}
