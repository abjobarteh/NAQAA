<?php

namespace App\Http\Livewire\RegistrationAccreditation\Reports;

use App\Exports\RegistrationAccreditation\TrainerReportExport;
use App\Models\ApplicationStatus;
use App\Models\Country;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerType;
use App\Models\TrainingProviderClassification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class TrainersReport extends Component
{
    public $highest_qualification, $nationality, $programme, $level, $region, $license_status, $year;
    public $is_highest_qualification, $is_nationality, $is_programme, $is_region,
        $is_license_status;
    public $report_type, $trainer_type;

    public function mount($report_type)
    {
        $this->report_type = $report_type;

        switch ($this->report_type) {
            case "highest_qualification":
                $this->is_highest_qualification = true;
            case "nationality":
                $this->is_nationality = true;
            case "accredited_programmes":
                $this->is_programme = true;
            case "region":
                $this->is_region = true;
            case "license_status":
                $this->is_license_status = true;
            case "default":
                return back();
        }
    }

    public function render()
    {
        $fields_of_education = EducationField::all()->pluck('name');
        $levels = QualificationLevel::all()->pluck('name');
        $nationalities = Country::all()->pluck('name', 'id');
        $statuses = ApplicationStatus::all()->pluck('name');
        $regions = Region::all()->pluck('name', 'id');
        $trainer_types = TrainerType::all();

        return view(
            'livewire.registration-accreditation.reports.trainers-report',
            compact(
                'fields_of_education',
                'levels',
                'nationalities',
                'statuses',
                'regions',
                'trainer_types'
            )
        )
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        $registered_trainer = Trainer::query();

        if ($this->is_highest_qualification) {
        } else if ($this->is_nationality) {
            $registered_trainer->with('validLicence')
                ->whereHas('validLicence', function (Builder $query) {
                    $query->where('trainer_type', $this->trainer_type);
                })
                ->where('country_of_citizenship', $this->nationality);

            return Excel::download(new TrainerReportExport($registered_trainer->get()), 'trainers_by_nationality.xlsx');
        } else if ($this->is_programme) {
            $registered_trainer->with('validLicence')
                ->whereHas('validLicence', function (Builder $query) {
                    $query->where('trainer_type', $this->trainer_type);
                })
                ->whereHas('accreditations', function (Builder $query) {
                    $query->where(DB::raw('lower(area)'), 'like', '%' . strtolower($this->programme) . '%')
                        ->where('level', $this->level);
                });
            return Excel::download(new TrainerReportExport($registered_trainer->get()), 'trainers_by_accredited_areas_levels.xlsx');
        } else if ($this->is_region) {
        } else if ($this->is_license_status) {
            $this->year = $this->year == null ? date('Y') : $this->year;
            $registered_trainer->with('validLicence')
                ->whereHas('licences', function (Builder $query) {
                    $query->where('trainer_type', $this->trainer_type)
                        ->where('license_status', $this->license_status)
                        ->whereYear('created_at', $this->year);
                });

            return Excel::download(new TrainerReportExport($registered_trainer->get()), 'trainers_by_license_status.xlsx');
        }
    }
}
