<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Exports\ResearchDevelopment\LabourMarketReportExport;
use App\Models\EducationField;
use App\Models\PositionAdvertised;
use App\Models\QualificationLevel;
use App\Models\ResearchDevelopment\JobVacancy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LabourMarketReports extends Component
{
    public $position_advertised, $field_of_education, $employer_type, $job_status,
        $minimum_qualification, $occupational_area, $work_experience;
    public $is_position_advertised = false, $is_field_of_education = false,
        $is_employer_type = false, $is_job_status, $is_minimum_qualification, $is_occupational_area,
        $is_work_experience;
    public $report_type;

    public function mount($report_type)
    {
        $this->report_type = $report_type;

        switch ($this->report_type) {
            case "position_advertised":
                $this->is_position_advertised = true;
            case "field_of_education":
                $this->is_field_of_education = true;
            case "employer_type":
                $this->is_employer_type = true;
            case "job_status":
                $this->is_job_status = true;
            case "minimum_qualification":
                $this->is_minimum_qualification = true;
            case "occupational_area":
                $this->is_occupational_area = true;
            case "work_experience":
                $this->is_work_experience = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        $fields_of_education = EducationField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view(
            'livewire.research-development.reports.labour-market-reports',
            compact('fields_of_education', 'levels')
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $vacancy = JobVacancy::query();


        if ($this->is_position_advertised) {
            $vacancy->with('vacancyCategory')
                ->whereHas('position', function (Builder $query) {
                    $query->where(DB::raw('lower(name)'), 'like', '%' . strtolower($this->position_advertised) . '%');
                });

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_position_advertised.xlsx');
        } else if ($this->is_field_of_education) {
            $vacancy->with('vacancyCategory')
                ->where(DB::raw('lower(fields_of_study)'), 'like', '%' . strtolower($this->field_of_education) . '%');

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_field_of_study.xlsx');
        } else if ($this->is_employer_type) {
            $vacancy->with('vacancyCategory')
                ->where(DB::raw('lower(institution)'), 'like', '%' . strtolower($this->employer_type) . '%');

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_employer_type.xlsx');
        } else if ($this->is_job_status) {
            $vacancy->with('vacancyCategory')
                ->where('job_status', $this->job_status);

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_job_status.xlsx');
        } else if ($this->is_minimum_qualification) {
            $vacancy->with('vacancyCategory')
                ->where('minimum_required_qualification', $this->minimum_qualification);

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_minimum_qualification.xlsx');
        } else if ($this->is_occupational_area) {
            $vacancy->with('vacancyCategory')
                ->where('occupational_group', $this->occupational_area);

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_occupational_group.xlsx');
        } else if ($this->is_work_experience) {
            $vacancy->with('vacancyCategory')
                ->where('minimum_required_job_experience', $this->work_experience);

            return Excel::download(new LabourMarketReportExport($vacancy->get()), 'labourmarket_reports_by_minimum_required_job_experience.xlsx');
        }
    }
}
