<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Exports\ResearchDevelopment\LabourMarketReportExport;
use App\Models\EducationField;
use App\Models\PositionAdvertised;
use App\Models\QualificationLevel;
use App\Models\ResearchDevelopment\JobVacancy;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LabourMarketReports extends Component
{
    public $position_advertised, $field_of_education, $educational_level, $job_status;

    public function render()
    {
        $fields_of_education = EducationField::all()->pluck('name');
        $levels = QualificationLevel::all()->pluck('name');

        return view(
            'livewire.research-development.reports.labour-market-reports',
            compact('fields_of_education', 'levels')
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        // dd('report generation in the background');

        $data = JobVacancy::query();
        // dd((Carbon::now())->format('Y'));

        if (
            !is_null($this->position_advertised) &&
            is_null($this->field_of_education) &&
            is_null($this->educational_level) &&
            is_null($this->job_status)
        ) {
            $position_id = PositionAdvertised::where('name', 'like', '%' . $this->position_advertised . '%')->get();
            $data->where('position_advertised_id', $position_id[0]->id ?? null)
                ->whereYear('date_advertised', (Carbon::now())->format('Y'));
        }
        if (
            !is_null($this->field_of_education) &&
            is_null($this->position_advertised) &&
            is_null($this->educational_level) &&
            is_null($this->job_status)
        ) {
            $data->where('fields_of_study', 'like', '%' . $this->field_of_education . '%')
                ->whereYear('date_advertised', (Carbon::now())->format('Y'));
        }
        if (
            !is_null($this->educational_level) &&
            is_null($this->field_of_education) &&
            is_null($this->position_advertised) &&
            is_null($this->job_status)
        ) {
            $data->where('education_level', 'like', '%' . $this->educational_level . '%')
                ->whereYear('date_advertised', (Carbon::now())->format('Y'));
        }
        if (
            !is_null($this->job_status) &&
            is_null($this->educational_level) &&
            is_null($this->field_of_education) &&
            is_null($this->position_advertised)
        ) {
            $data->where('job_status', 'like', '%' . $this->job_status . '%')
                ->whereYear('date_advertised', (Carbon::now())->format('Y'));
        }

        if ($data->get()->isEmpty()) {
            dd('No data exist');
        }

        return Excel::download(new LabourMarketReportExport($data->get()), 'labourmarket_reports.xlsx');
    }
}
