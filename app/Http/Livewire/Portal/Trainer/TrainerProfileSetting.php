<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\Country;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\Trainer;
use Livewire\Component;

class TrainerProfileSetting extends Component
{
    public $firstname, $middlename, $lastname, $gender, $dob, $country = 'Gambia',
        $tin, $nin_passport, $ain, $email, $address, $postal_address, $tel_home, $mobile;
    public $is_gambian = true, $is_success =  false, $message;
    public $trainer;
    public $current_password, $new_password, $new_password_confirmation;

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

    public function mount()
    {
        $this->trainer = Trainer::where('login_id', auth()->user()->id)->first();

        $this->fill([
            'firstname' => $this->trainer->firstname,
            'middlename' => $this->trainer->middlename,
            'lastname' => $this->trainer->lastname,
            'dob' => $this->trainer->date_of_birth,
            'gender' => $this->trainer->gender,
            'country' => $this->trainer->country_of_citizenship ?? $this->country,
            'tin' => $this->trainer->TIN,
            'nin_passport' => $this->trainer->NIN,
            'ain' => $this->trainer->AIN,
            'email' => $this->trainer->email,
            'address' => $this->trainer->physical_address,
            'postal_address' => $this->trainer->postal_address,
            'tel_home' => $this->trainer->phone_home,
            'mobile' => $this->trainer->phone_mobile,
            'is_gambian' => $this->trainer->country_of_citizenship ?? $this->country == 'Gambia' ? true : false
        ]);
    }

    public function render()
    {
        $countries = Country::all()->pluck('name');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view(
            'livewire.portal.trainer.trainer-profile-setting',
            compact('countries', 'levels')
        )
            ->extends('layouts.portal');
    }

    public function updatedCountry($value)
    {
        if ($value != "Gambia") {
            $this->is_gambian = false;
        } else {
            $this->is_gambian = true;
        }
    }

    public function saveProfile()
    {
        $this->validate();

        $this->trainer->update([
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

        $this->is_success = true;
        $this->message = "Your Profile has successfully been updated";
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => "required|password",
            'new_password' => "required|confirmed",
        ]);

        $this->trainer->loginDetail->update([
            'password' => bcrypt($this->new_password)
        ]);

        $this->is_success = true;
        $this->message = "Your Password has successfully been updated";
    }
}
