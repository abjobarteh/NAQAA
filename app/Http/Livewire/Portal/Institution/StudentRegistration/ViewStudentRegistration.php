<?php

namespace App\Http\Livewire\Portal\Institution\StudentRegistration;

use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Country;
use App\Models\District;
use App\Models\LocalLanguage;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\StandardsCurriculum\UnitStandard;
use App\Models\TownVillage;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ViewStudentRegistration extends Component
{
    public $training_provider_id, $candidate_type, $academic_year, $firstname, $middlename, $lastname,
        $gender, $date_of_birth, $nationality, $local_language, $ethnicity, $address, $email, $phone,
        $programme_id, $programme_level_id, $region_id, $district_id, $town_village_id, $picture;
    public $unit_standards, $student_unit_standards, $hide_unit_standards = true;
    public $student_registration;

    public function mount($id)
    {
        $this->student_registration = StudentRegistrationDetail::findOrFail($id)
            ->load('registeredStudent', 'programme', 'level', 'trainingprovider');

        $this->fill([
            'firstname' => $this->student_registration->registeredStudent->firstname,
            'middlename' => $this->student_registration->registeredStudent->middlename ?? null,
            'lastname' => $this->student_registration->registeredStudent->lastname,
            'date_of_birth' => $this->student_registration->registeredStudent->date_of_birth,
            'gender' => $this->student_registration->registeredStudent->gender,
            'email' => $this->student_registration->registeredStudent->email,
            'phone' => $this->student_registration->registeredStudent->phone,
            'candidate_type' => $this->student_registration->candidate_type,
            'address' => $this->student_registration->registeredStudent->address,
            'local_language' => $this->student_registration->registeredStudent->local_language,
            'nationality' => $this->student_registration->registeredStudent->nationality,
            'region_id' => $this->student_registration->registeredStudent->region_id,
            'district_id' => $this->student_registration->registeredStudent->district_id,
            'town_village_id' => $this->student_registration->registeredStudent->town_village_id,
            'programme_id' => $this->student_registration->programme_id,
            'programme_level_id' => $this->student_registration->programme_level_id,
            'training_provider_id' => $this->student_registration->training_provider_id,
            'student_unit_standards' => json_decode($this->student_registration->unit_standards),
            'academic_year' => $this->student_registration->academic_year,
            'hide_unit_standards' => false,
        ]);
        $this->unit_standards = UnitStandard::where('qualification_id', $this->programme_id)
            ->whereHas('qualification', function (Builder $query) {
                $query->where('qualification_level_id', $this->programme_level_id);
            })
            ->get();
    }

    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'Approved');
        })->pluck('name', 'id');
        $programmes = Qualification::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $nationalities = Country::all()->pluck('name', 'id');
        $local_languages = LocalLanguage::all()->pluck('name', 'id');

        return view(
            'livewire.portal.institution.student-registration.view-student-registration',
            compact(
                'institutions',
                'programmes',
                'levels',
                'regions',
                'districts',
                'townvillages',
                'nationalities',
                'local_languages'
            )
        )
            ->extends('layouts.portal');
    }
}
