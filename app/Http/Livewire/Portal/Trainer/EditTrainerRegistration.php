<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\Country;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditTrainerRegistration extends Component
{

    public $firstname, $middlename, $lastname, $gender, $dob, $country = 'Gambia',
        $tin, $nin_passport, $ain, $email, $address, $postal_address, $tel_home, $mobile, $application_no,
        $application_date, $application_status, $license_start_date, $license_end_date, $license_no, $trainer_type,
        $practical_trainer;

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
    ];

    public function mount($id)
    {
        $registration = ApplicationDetail::findOrFail($id)->load('trainer', 'registrationLicence');
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
            'is_gambian' => $registration->trainer->country_of_citizenship ?? $this->country == 'Gambia' ? true : false
        ]);
    }

    public function render()
    {
        $countries = Country::all()->pluck('name');
        $trainer_types = TrainerType::all();

        return view(
            'livewire.portal.trainer.edit-trainer-registration',
            compact('countries', 'trainer_types')
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

        $this->validate();

        DB::transaction(function () {

            $this->trainer_registration->trainer->update([
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'lastname' => $this->lastname,
                'gender' => $this->gender,
                'date_of_birth' => $this->dob,
                'country_of_citizenship' => $this->country,
                'TIN' => $this->tin,
                'NIN' => $this->nin_passport && $this->country === 'Gambia' ? $this->nin_passport : null,
                'AIN' => $this->ain && $this->country != 'Gambia' ? $this->ain : null,
                'email' => $this->email,
                'physical_address' => $this->address,
                'postal_address' => $this->postal_address,
                'phone_home' => $this->tel_home,
                'phone_mobile' => $this->mobile,
            ]);

            $this->trainer_registration->update([
                'trainer_type' => $this->trainer_type
            ]);
        });

        $this->update_successfull = true;
    }
}
