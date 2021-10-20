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

class EditJobvacancy extends Component
{
    public $position_exist = true, $position_advertised, $position_name, $date_advertised, $minimum_required_job_experience,
        $minimum_required_qualification, $fields_of_study, $job_status, $institution, $region_id,
        $district_id, $localgoverment_area_id, $jobvacancy, $jobvacancy_category_id, $occupational_group;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
        'position_advertised' => ['required', 'string'],
        'position_name' => ['required_if:position_advertised,not-specified', 'string'],
        'date_advertised' => ['required', 'date'],
        'minimum_required_job_experience' => ['required', 'numeric'],
        'minimum_required_qualification' => ['required', 'string'],
        'fields_of_study' => ['required', 'array'],
        'fields_of_study.*' => ['string'],
        'job_status' => ['required', 'string'],
        'institution' => ['required', 'string'],
        'region_id' => ['nullable', 'numeric'],
        'district_id' => ['nullable', 'numeric'],
        'localgoverment_area_id' => ['nullable', 'numeric'],
        'jobvacancy_category_id' => ['required', 'numeric'],
    ];

    public function mount($id)
    {
        abort_if(Gate::denies('edit_job_vacancy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->jobvacancy = JobVacancy::findOrFail($id);

        $this->fill([
            'position_advertised' => $this->jobvacancy->position_advertised_id,
            'date_advertised' => $this->jobvacancy->date_advertised,
            'minimum_required_job_experience' => $this->jobvacancy->minimum_required_job_experience,
            'minimum_required_qualification' => $this->jobvacancy->minimum_required_qualification,
            'fields_of_study' => $this->jobvacancy->fields_of_study,
            'job_status' => $this->jobvacancy->job_status,
            'occupational_group' => $this->jobvacancy->occupational_group,
            'institution' => $this->jobvacancy->institution,
            'region_id' => $this->jobvacancy->region_id,
            'district_id' => $this->jobvacancy->district_id,
            'localgoverment_area_id' => $this->jobvacancy->localgoverment_area_id,
            'jobvacancy_category_id' => $this->jobvacancy->jobvacancy_category_id,
        ]);
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
            'livewire.research-development.edit-jobvacancy',
            compact('qualifications', 'fields', 'regions', 'districts', 'lgas', 'job_categories', 'job_positions')
        )->extends('layouts.admin');
    }

    public function updatedPositionAdvertised($value)
    {
        if ($value === "not-specified") {
            $this->position_exist = false;
        } else {
            $this->position_exist = true;
        }
    }

    public function updateJobvacancy()
    {
        abort_if(Gate::denies('edit_job_vacancy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate();

        if ($this->position_exist) {
            $this->jobvacancy->update([
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
                $this->jobvacancy->position->update([
                    'name' => $this->position_name,
                ]);
                $this->jobvacancy->update([
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

        $this->reset(['position_exist', 'position_advertised']);
        $this->emitSelf('refreshComponent');
    }
}
