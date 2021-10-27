<?php

namespace App\Http\Livewire\ResearchDevelopment;

use App\Models\District;
use App\Models\EducationField;
use App\Models\JobVacancyCategory;
use App\Models\LocalGovermentAreas;
use App\Models\PositionAdvertised;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class CreateJobvacancy extends Component
{
    public $position_exist = true, $position_advertised, $position_name, $date_advertised, $minimum_required_job_experience,
        $minimum_required_qualification, $fields_of_study, $job_status, $institution, $region_id,
        $district_id, $localgoverment_area_id, $jobvacancy_category_id, $occupational_group;

    protected $rules = [
        'position_advertised' => ['required', 'string'],
        'position_name' => ['required_if:position_advertised,not-specified', 'nullable', 'string'],
        'date_advertised' => ['nullable', 'date'],
        'minimum_required_job_experience' => ['numeric'],
        'minimum_required_qualification' => ['required', 'string'],
        'fields_of_study' => ['required', 'array'],
        'fields_of_study.*' => ['string'],
        'job_status' => ['required', 'string'],
        'institution' => ['required', 'string'],
        'region_id' => ['required', 'numeric'],
        'district_id' => ['required', 'numeric'],
        'localgoverment_area_id' => ['required', 'numeric'],
        'jobvacancy_category_id' => ['required', 'numeric'],
    ];

    public function mount()
    {
        abort_if(Gate::denies('create_job_vacancy'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function render()
    {
        $qualifications = QualificationLevel::all()->pluck('name', 'id');
        $fields = EducationField::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $lgas = LocalGovermentAreas::all()->pluck('name', 'id');
        $job_categories = JobVacancyCategory::all()->pluck('name', 'id');
        $job_positions = PositionAdvertised::all()->pluck('name', 'id');

        return view(
            'livewire.research-development.create-jobvacancy',
            compact('qualifications', 'fields', 'regions', 'districts', 'lgas', 'job_categories', 'job_positions')
        )
            ->extends('layouts.admin');
    }

    public function updatedPositionAdvertised($value)
    {
        if ($value === "not-specified") {
            $this->position_exist = false;
        } else {
            $this->position_exist = true;
        }
    }

    public function addJobvacancy()
    {
        $this->validate();

        if ($this->position_exist) {
            JobVacancy::create([
                'position_advertised_id' => $this->position_advertised,
                'date_advertised' => $this->date_advertised,
                'minimum_required_job_experience' => $this->minimum_required_job_experience,
                'minimum_required_qualification' => $this->minimum_required_qualification,
                'fields_of_study' => $this->fields_of_study,
                'job_status' => $this->job_status,
                'occupational_group' => $this->occupational_group,
                'institution' => $this->institution,
                'region_id' => $this->region_id,
                'district_id' => $this->district_id,
                'localgoverment_area_id' => $this->localgoverment_area_id,
                'jobvacancy_category_id' => $this->jobvacancy_category_id,
            ]);
        } else {
            DB::transaction(function () {
                $position = PositionAdvertised::create([
                    'name' => $this->position_name,
                ]);
                JobVacancy::create([
                    'position_advertised_id' => $position->id,
                    'date_advertised' => $this->date_advertised,
                    'minimum_required_job_experience' => $this->minimum_required_job_experience,
                    'minimum_required_qualification' => $this->minimum_required_qualification,
                    'fields_of_study' => $this->fields_of_study,
                    'job_status' => $this->job_status,
                    'occupational_group' => $this->occupational_group,
                    'institution' => $this->institution,
                    'region_id' => $this->region_id,
                    'district_id' => $this->district_id,
                    'localgoverment_area_id' => $this->localgoverment_area_id,
                    'jobvacancy_category_id' => $this->jobvacancy_category_id,
                ]);
            });
        }

        alert('Created Succesfully', 'Job vacancy successfully added', 'success');

        return redirect(route('researchdevelopment.job-vacancies.index'));
    }
}
