<?php

namespace App\Http\Livewire\RegistrationAccreditation;

use App\Models\ApplicationStatus;
use App\Models\Country;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateTrainerRegistration extends Component
{
    public $firstname, $middlename, $lastname, $gender, $dob, $country = 'Gambia',
        $tin, $nin_passport, $ain, $email, $address, $postal_address, $tel_home, $mobile, $application_no,
        $application_date, $application_status, $license_start_date, $license_end_date, $license_no, $trainer_type,
        $practical_trainer;

    public $is_gambian = true, $is_approved = false, $is_practical_trainer = false;

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

    public function render()
    {
        $countries = Country::all()->pluck('name');
        $trainer_types = TrainerType::all();
        $application_statuses = ApplicationStatus::all()->pluck('name');

        $records = ApplicationDetail::all();
        if ($records->isEmpty()) {
            $new_serial_no = '000001';
            $this->application_no = 'APP-' . $new_serial_no;
        } else {
            $last_record = ApplicationDetail::latest()->limit(1)->first();
            $new_serial_no = str_pad((int)$last_record->serial_no + 1, 6, '0', STR_PAD_LEFT);
            $this->application_no = 'APP-' . $new_serial_no;
        }
        return view(
            'livewire.registration-accreditation.create-trainer-registration',
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

    public function registerTrainer()
    {
        $this->validate();

        $serial_no = explode('-', $this->application_no);

        // check if trainer exist in the database
        if (
            Trainer::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
            ->where(function ($query) {
                $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                    ->orWhereNull('middlename');
            })
            ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
            ->whereDate('date_of_birth', $this->dob)
            ->where('gender', $this->gender)
            ->where('country_of_citizenship', 'like', '%' . $this->country . '%')
            ->where('TIN', $this->tin)
            ->where('NIN', $this->nin_passport)
            ->where('AIN', $this->ain)
            ->exists()
        ) {
            // check if trainer has a valid licence
            if (
                Trainer::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                ->where(function ($query) {
                    $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                        ->orWhereNull('middlename');
                })
                ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                ->whereDate('date_of_birth', $this->dob)
                ->where('gender', $this->gender)
                ->where('country_of_citizenship', 'like', '%' . $this->country . '%')
                ->where('TIN', $this->tin)
                ->where('NIN', $this->nin_passport)
                ->where('AIN', $this->ain)
                ->whereHas('validLicence', function (Builder $query) {
                    $query->where('trainer_type', $this->trainer_type);
                })
                ->exists()
            ) {
                alert(
                    'Duplicate Registration',
                    'Registration not possible as Trainer already has an Active Licence',
                    'info'
                );

                return redirect()->route('registration-accreditation.registration.trainers.index');
            } else {
                DB::transaction(function () use ($serial_no) {
                    // get trainer details
                    $trainer = Trainer::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                        ->where(function ($query) {
                            $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                                ->orWhereNull('middlename');
                        })
                        ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                        ->whereDate('date_of_birth', $this->dob)
                        ->where('gender', $this->gender)
                        ->where('country_of_citizenship', 'like', '%' . $this->country . '%')
                        ->where('TIN', $this->tin)
                        ->where('NIN', $this->nin_passport)
                        ->where('AIN', $this->ain)
                        ->first();

                    // check if trainer has any currently pending or ongoing registration applications
                    $application = ApplicationDetail::where('trainer_id', $trainer->id)
                        ->whereIn('status', ['Ongoing', 'Pending'])
                        ->exists();
                    if ($application) {
                        return back()
                            ->withWarning(
                                'Cannot Proceed with registration as this Trainer already has a Pending or
                                Ongoing Application. Please Process that first!.'
                            );
                    } else {
                        // store training provider application details
                        $application = ApplicationDetail::create([
                            'trainer_id' => $trainer->id,
                            'applicant_type' => 'trainer',
                            'application_no' => $this->application_no,
                            'serial_no' => $serial_no[1],
                            'application_type' => 'trainer_registration',
                            'status' => $this->application_status,
                            'application_date' => $this->application_date,
                        ]);

                        // If application is accepted, create a license record
                        if ($this->application_status === 'Approved') {
                            RegistrationLicenceDetail::create([
                                'trainer_id' => $application->trainer_id,
                                'trainer_type' => $this->trainer_type,
                                'practical_trainer_type' => $this->practical_trainer ?? null,
                                'application_id' => $application->id,
                                'licence_start_date' => $this->license_start_date,
                                'licence_end_date' => $this->license_end_date,
                                'license_status' => 'Approved',
                                'license_no' => $this->license_no,
                            ]);
                        }
                    }
                });
            }
        } else {
            DB::transaction(function () use ($serial_no) {
                // store training provider details
                $trainer = Trainer::create([
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
                // dd($trainer->id);

                // store training provider application details
                $application = ApplicationDetail::create([
                    'trainer_id' => $trainer->id,
                    'applicant_type' => 'trainer',
                    'application_no' => $this->application_no,
                    'serial_no' => $serial_no[1],
                    'application_type' => 'trainer_registration',
                    'status' => $this->application_status,
                    'application_date' => $this->application_date,
                ]);

                // If application is accepted, create a license record
                if ($this->application_status === 'Approved') {
                    RegistrationLicenceDetail::create([
                        'trainer_id' => $application->trainer_id,
                        'trainer_type' => $this->trainer_type,
                        'practical_trainer_type' => $this->practical_trainer ?? null,
                        'application_id' => $application->id,
                        'licence_start_date' => $this->license_start_date,
                        'licence_end_date' => $this->license_end_date,
                        'license_status' => 'Approved',
                        'license_no' => $this->license_no,
                    ]);
                }
            });
        }

        alert(
            'Registration Successfull',
            'Trainer registration details Successfully added in the system',
            'success'
        );

        return redirect()->route('registration-accreditation.registration.trainers.index');
    }
}
