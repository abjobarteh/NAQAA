<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\Country;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\TrainerAccreditationDetail;
use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditTrainerRegistration extends Component
{

    public $firstname, $middlename, $lastname, $gender, $dob, $country = 'Gambia',
        $tin, $nin_passport, $ain, $email, $address, $postal_address, $tel_home, $mobile, $application_no,
        $application_date, $application_status, $license_start_date, $license_end_date, $license_no, $trainer_type,
        $practical_trainer;

    public $accreditation_area, $accreditation_level, $accreditation_id;
    public $accreditation_inputs = [];
    public $accreditation_counter = 1;

    public $is_gambian = true, $is_approved = false, $is_practical_trainer = false, $trainer_registration,
        $update_successfull = false;


    protected $rules = [
        'firstname' => 'required|string',
        'middlename' => 'nullable|string',
        'lastname' => 'required|string',
        'dob' => 'required|date',
        'gender' => 'required|string|in:M,F',
        'country' => 'required|string',
        'tin' => 'required|string',
        'nin_passport' => 'nullable|string',
        'ain' => 'nullable|string',
        'email' => 'required|email',
        'address' => 'required|string',
        'postal_address' => 'nullable|string',
        'tel_home' => 'nullable|string',
        'mobile' => 'required|string',
        'accreditation_area.0' => 'required|string',
        'accreditation_level.0' => 'required|string',
        'accreditation_area.*' => 'required|string',
        'accreditation_level.*' => 'required|string',
        'trainer_type' => 'required|string',
        'practical_trainer' => 'required_if:trainer_type,Practical Trainer|nullable|string'
    ];

    public function mount($id)
    {
        $registration = ApplicationDetail::findOrFail($id)
            ->load('trainer', 'registrationLicence', 'trainerAccreditations');
        $this->trainer_registration = $registration;

        $this->fill([
            'firstname' => $registration->trainer->firstname,
            'middlename' => $registration->trainer->middlename,
            'lastname' => $registration->trainer->lastname,
            'dob' => $registration->trainer->date_of_birth,
            'gender' => $registration->trainer->gender,
            'country' => $registration->trainer->country_of_citizenship ?? $this->country,
            'tin' => $registration->trainer->TIN,
            'nin_passport' => $registration->trainer->NIN,
            'ain' => $registration->trainer->AIN,
            'email' => $registration->trainer->email,
            'address' => $registration->trainer->physical_address,
            'postal_address' => $registration->trainer->postal_address,
            'tel_home' => $registration->trainer->phone_home,
            'mobile' => $registration->trainer->phone_mobile,
            'is_gambian' => $registration->trainer->country_of_citizenship ?? $this->country == 'Gambia' ? true : false,
            'trainer_type' => $registration->trainer_type,
            'is_practical_trainer' => $registration->trainer_type == 'Practical Trainer' ? true : false,
        ]);

        foreach ($registration->trainerAccreditations as $key => $value) {
            $this->accreditation_area[$key] = $value->area;
            $this->accreditation_level[$key] = $value->level;
            $this->accreditation_id[$key] = $value->id;
            array_push($this->accreditation_inputs, $key);
        }
    }

    public function addAccreditation($counter)
    {
        $counter = $counter + 1;
        $this->accreditation_counter = $counter;
        array_push($this->accreditation_inputs, $counter);
    }

    public function removeAccreditation($counter)
    {
        unset($this->accreditation_inputs[$counter]);
    }

    public function render()
    {
        $countries = Country::all()->pluck('name');
        $trainer_types = TrainerType::all();
        $levels = QualificationLevel::all()->pluck('name', 'id');



        return view(
            'livewire.portal.trainer.edit-trainer-registration',
            compact('countries', 'trainer_types', 'levels')
        )
            ->extends('layouts.portal');
    }

    public function updatedTrainerType($value)
    {
        if ($value == 'Practical Trainer') {
            $this->is_practical_trainer = true;
        } else {
            $this->is_practical_trainer = false;
        }
    }

    public function updatedCountry($value)
    {
        if ($value != "Gambia") {
            $this->is_gambian = false;
        } else {
            $this->is_gambian = true;
        }
    }

    public function updateTrainer()
    {
        // $this->validate();

        DB::transaction(function () {

            $this->trainer_registration->update([
                'trainer_type' => $this->trainer_type
            ]);

            // update accreditation details
            foreach ($this->accreditation_area as $key => $value) {
                TrainerAccreditationDetail::where('id', $this->accreditation_id[$key])
                    ->update([
                        'area' => $this->accreditation_area[$key],
                        'level' => $this->accreditation_level[$key],
                    ]);
            }
        });

        $this->update_successfull = true;
    }
}
