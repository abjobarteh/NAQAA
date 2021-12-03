<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Exports\ResearchDevelopment\GraduatesReportExport;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderStudent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class GraduatesReports extends Component
{
    public $classification, $programme, $education_field, $level, $lga_region, $graduation_year;
    public $is_classification = false, $is_programme = false, $is_education_field = false, $is_level = false,
        $is_lga_region = false, $is_sponsor = false;
    public $report_type;

    public function mount($report_type)
    {
        $this->report_type = $report_type;

        switch ($this->report_type) {
            case "classification":
                $this->is_classification = true;
            case "programme":
                $this->is_programme = true;
            case "education_field":
                $this->is_education_field = true;
            case "level":
                $this->is_level = true;
            case "lga_region":
                $this->is_lga_region = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $fields_of_education = EducationField::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');

        return view(
            'livewire.research-development.reports.graduates-reports',
            compact('classifications', 'fields_of_education', 'levels', 'regions')
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $graduates = TrainingProviderStudent::query();
        $year = $this->graduation_year ==  null ? date('Y') : $this->graduation_year;

        if ($this->is_classification) {
            $graduates->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->whereHas('trainingprovider', function (Builder $query) {
                    $query->where('classification_id', $this->classification);
                })
                ->where('graduation_date', $year);

            return Excel::download(
                new GraduatesReportExport($graduates->get()),
                'graduates_by_classification.xlsx'
            );
        } else if ($this->is_programme) {
            $graduates->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('programme_name', 'like', '%' . $this->programme . '%')
                ->where('graduation_date', $year);


            return Excel::download(
                new GraduatesReportExport($graduates->get()),
                'graduates_by_programme.xlsx'
            );
        } else if ($this->is_education_field) {
            $graduates->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('field_of_education', 'like', '%' . $this->education_field . '%')
                ->where('graduation_date', $year);

            return Excel::download(
                new GraduatesReportExport($graduates->get()),
                'graduates_by_field_of_education.xlsx'
            );
        } else if ($this->is_level) {
            $graduates->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('qualification_at_entry', $this->level)
                ->where('graduation_date', $year);


            return Excel::download(
                new GraduatesReportExport($graduates->get()),
                'graduates_by_qualification_level.xlsx'
            );
        } else if ($this->is_lga_region) {
            $graduates->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('region_id', $this->lga_region)
                ->where('graduation_date', $year);


            return Excel::download(
                new GraduatesReportExport($graduates->get()),
                'graduates_by_regions.xlsx'
            );
        }
    }
}
