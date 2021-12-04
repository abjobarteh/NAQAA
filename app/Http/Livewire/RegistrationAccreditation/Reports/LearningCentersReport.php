<?php

namespace App\Http\Livewire\RegistrationAccreditation\Reports;

use App\Exports\RegistrationAccreditation\LearningcenterReportExport;
use App\Models\District;
use App\Models\EducationField;
use App\Models\Program;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LearningCentersReport extends Component
{
    public $classification, $ownership, $education_field, $programme, $level, $region, $district;
    public $is_classification, $is_ownership, $is_programme, $is_region, $is_district;
    public $report_type;

    public function mount($report_type)
    {
        $this->report_type = $report_type;

        switch ($this->report_type) {
            case "classification":
                $this->is_classification = true;
            case "ownership":
                $this->is_ownership = true;
            case "accredited_programmes":
                $this->is_programme = true;
            case "region":
                $this->is_region = true;
            case "district":
                $this->is_district = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $ownerships = TrainingProviderOwnership::all()->pluck('name', 'id');
        $fields_of_education = EducationField::all()->pluck('name');
        $levels = QualificationLevel::all()->pluck('name');
        $programmes = Program::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');

        return view(
            'livewire.registration-accreditation.reports.learning-centers-report',
            compact(
                'classifications',
                'ownerships',
                'fields_of_education',
                'levels',
                'programmes',
                'regions',
                'districts',
            )
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $learningcenter = TrainingProvider::query();

        if ($this->is_classification) {
            $learningcenter->with('classification', 'ownership', 'category', 'region', 'district')
                ->where('classification_id', $this->classification);

            return Excel::download(new LearningCenterReportExport($learningcenter->get()), 'learningcenter_by_classifications.xlsx');
        } else if ($this->is_ownership) {
            $learningcenter->with('classification', 'ownership', 'category', 'region', 'district')
                ->where('ownership_id', $this->ownership);

            return Excel::download(new LearningCenterReportExport($learningcenter->get()), 'learningcenter_by_ownership.xlsx');
        } else if ($this->is_programme) {
            $learningcenter->with('classification', 'ownership', 'category', 'region', 'district', 'programmes')
                ->whereHas('programmes', function (Builder $query) {
                    $query->where('programme_id', $this->programme)
                        ->where('level', $this->level)
                        ->has('isAccredited');
                });

            return Excel::download(new LearningcenterReportExport($learningcenter->get()), 'learningcenter_by_accredited_programmes_levels.xlsx');
        } else if ($this->is_region) {
            $learningcenter->with('classification', 'ownership', 'category', 'region', 'district')
                ->where('region_id', $this->region);

            return Excel::download(new LearningCenterReportExport($learningcenter->get()), 'learningcenter_by_regions.xlsx');
        } else if ($this->is_district) {
            $learningcenter->with('classification', 'ownership', 'category', 'region', 'district')
                ->where('district_id', $this->district);

            return Excel::download(new LearningCenterReportExport($learningcenter->get()), 'learningcenter_by_districts.xlsx');
        }
    }
}
