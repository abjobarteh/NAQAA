<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Exports\ResearchDevelopment\EnrollmentReportsExport;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderStudent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class EnrollmentReports extends Component
{
    public $classification, $programme, $education_field, $level, $lga_region, $sponsor;
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
            case "sponsor":
                $this->is_sponsor = true;
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
            'livewire.research-development.reports.enrollment-reports',
            compact('classifications', 'fields_of_education', 'levels', 'regions')
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        // dd('Report generation has started. Please wait');
        $enrollments = TrainingProviderStudent::query();

        if ($this->is_classification) {
            $enrollments->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->whereHas('trainingprovider', function (Builder $query) {
                    $query->where('classification_id', $this->classification);
                });

            return Excel::download(
                new EnrollmentReportsExport($enrollments->get()),
                'enrollments_by_classification.xlsx'
            );
        } else if ($this->is_programme) {
            $enrollments->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('programme_name', 'like', '%' . $this->programme . '%');
            return Excel::download(
                new EnrollmentReportsExport($enrollments->get()),
                'enrollments_by_programme.xlsx'
            );
        } else if ($this->is_education_field) {
            $enrollments->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('field_of_education', 'like', '%' . $this->education_field . '%');
            return Excel::download(
                new EnrollmentReportsExport($enrollments->get()),
                'enrollments_by_field_of_education.xlsx'
            );
        } else if ($this->is_level) {
            $enrollments->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('qualification_at_entry', $this->level);
            return Excel::download(
                new EnrollmentReportsExport($enrollments->get()),
                'enrollments_by_qualification_level.xlsx'
            );
        } else if ($this->is_lga_region) {
            $enrollments->with('trainingprovider', 'region', 'district', 'awardName', 'entryQualification')
                ->where('region_id', $this->lga_region);
            return Excel::download(
                new EnrollmentReportsExport($enrollments->get()),
                'enrollments_by_regions.xlsx'
            );
        }
    }
}
