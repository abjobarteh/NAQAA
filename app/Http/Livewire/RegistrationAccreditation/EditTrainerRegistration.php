<?php

namespace App\Http\Livewire\RegistrationAccreditation;

use App\Models\ApplicationStatus;
use App\Models\Country;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

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
        'application_no' => 'required|string',
        'application_date' => 'required|date',
        'application_status' => 'required|string',
        'license_start_date' => 'required_if:application_status,Approved|nullable|date',
        'license_end_date' => 'required_if:application_status,Approved|nullable|date',
        'license_no' => 'required_if:application_status,Approved|nullable|string',
    ];

    public function mount($id)
    {
        abort_if(Gate::denies('edit_registration'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registration = ApplicationDetail::findOrFail($id)->load('trainer', 'registrationLicence');
        $this->trainer_registration = $registration;

        $this->fill([
            'firstname' => $registration->trainer->firstname,
            'middlename' => $registration->trainer->middlename,
            'lastname' => $registration->trainer->lastname,
            'dob' => $registration->trainer->date_of_birth,
            'gender' => $registration->trainer->gender,
            'country' => $registration->trainer->country_of_citizenship,
            'tin' => $registration->trainer->TIN,
            'nin_passport' => $registration->trainer->NIN,
            'ain' => $registration->trainer->AIN,
            'email' => $registration->trainer->email,
            'address' => $registration->trainer->physical_address,
            'postal_address' => $registration->trainer->postal_address,
            'tel_home' => $registration->trainer->phone_home,
            'mobile' => $registration->trainer->phone_mobile,
            'application_no' => $registration->application_no,
            'application_date' => $registration->application_date,
            'application_status' => $registration->status,
            'license_start_date' => $registration->registrationLicence->licence_start_date ?? null,
            'license_end_date' => $registration->registrationLicence->licence_end_date ?? null,
            'trainer_type' => $registration->registrationLicence->trainer_type ?? null,
            'practical_trainer' => $registration->registrationLicence->practical_trainer_type ?? null,
            'license_no' => $registration->registrationLicence->license_no ?? null,
            'is_approved' => $registration->registrationLicence->license_status ?? null == 'Approved' ? true : false,
            'is_gambian' => $registration->trainer->country_of_citizenship == 'Gambia' ? true : false
        ]);
    }

    public function render()
    {
        $countries = Country::all()->pluck('name');
        $trainer_types = TrainerType::all();
        $application_statuses = ApplicationStatus::all()->pluck('name');

        return view(
            'livewire.registration-accreditation.edit-trainer-registration',
            compact('countries', 'trainer_types', 'application_statuses')
        )
            ->extends('layouts.admin');
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

    public function updatedApplicationStatus($value)
    {
        if ($value == 'Approved') {
            $this->is_approved = true;
        } else {
            $this->is_approved = false;
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
                'status' => $this->application_status,
                'application_date' => $this->application_date,
            ]);

            if ($this->application_status === 'Approved') {

                if (!is_null($this->trainer_registration->registrationLicence)) {

                    $this->trainer_registration->registrationLicence->update([
                        'licence_start_date' => $this->license_start_date,
                        'licence_end_date' => $this->license_end_date,
                        'license_status' => 'Approved',
                        'license_no' => $this->license_no,
                    ]);
                } else {
                    RegistrationLicenceDetail::create([
                        'trainer_id' => $this->trainer_registration->trainer_id,
                        'trainer_type' => $this->trainer_type,
                        'practical_trainer_type' => $this->practical_trainer ?? null,
                        'application_id' => $this->trainer_registration->id,
                        'licence_start_date' => $this->license_start_date,
                        'licence_end_date' => $this->license_end_date,
                        'license_status' => 'Approved',
                        'license_no' => $this->license_no,
                    ]);
                }
            } else {

                if (!is_null($this->trainer_registration->registrationLicence)) {

                    $this->trainer_registration->registrationLicence->delete();
                }
            }
        });

        $this->update_successfull = true;
    }
}
