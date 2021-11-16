<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\Country;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\Checklist;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerType;
use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewTrainerRegistration extends Component
{
    public $firstname, $middlename, $lastname, $gender, $dob, $country = 'Gambia',
        $tin, $nin_passport, $ain, $email, $address, $postal_address, $tel_home, $mobile, $application_no,
        $application_date, $application_status, $license_start_date, $license_end_date, $license_no, $trainer_type,
        $practical_trainer;

    public $is_gambian = true, $is_approved = false, $is_practical_trainer = false;
    public $application_id;

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
        $trainer = Trainer::where('login_id', auth()->user()->id)->first();

        $this->fill([
            'firstname' => $trainer->firstname,
            'middlename' => $trainer->middlename,
            'lastname' => $trainer->lastname,
            'dob' => $trainer->date_of_birth,
            'gender' => $trainer->gender,
            'country' => $trainer->country_of_citizenship ?? $this->country,
            'tin' => $trainer->TIN,
            'nin_passport' => $trainer->NIN,
            'ain' => $trainer->AIN,
            'email' => $trainer->email,
            'address' => $trainer->physical_address,
            'postal_address' => $trainer->postal_address,
            'tel_home' => $trainer->phone_home,
            'mobile' => $trainer->phone_mobile,
            'is_gambian' => $trainer->country_of_citizenship ?? $this->country == 'Gambia' ? true : false
        ]);
    }

    public function render()
    {
        $countries = Country::all()->pluck('name');
        $trainer_types = TrainerType::all();

        return view(
            'livewire.portal.trainer.new-trainer-registration',
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

    public function submitApplication()
    {
        $this->validate();

        // check if trainer has a valid registration license
        if (
            Trainer::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
            ->where(function ($query) {
                $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                    ->orWhereNull('middlename');
            })
            ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
            // ->whereDate('date_of_birth', $this->dob)
            // ->where('gender', $this->gender)
            // ->where('country_of_citizenship', 'like', '%' . $this->country . '%')
            // ->where('TIN', $this->tin)
            // ->where('NIN', $this->nin_passport)
            // ->where('AIN', $this->ain)
            ->whereHas('validLicence')
            ->exists()
        ) {
            alert(
                'Duplicate Registration',
                'Registration not possible as you already have an Active Licence',
                'info'
            );

            return redirect()->route('portal.trainer.registrations.index');
        } else {
            // get trainer details
            $trainer = Trainer::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                ->where(function ($query) {
                    $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                        ->orWhereNull('middlename');
                })
                ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                // ->whereDate('date_of_birth', $this->dob)
                // ->where('gender', $this->gender)
                // ->where('country_of_citizenship', 'like', '%' . $this->country . '%')
                // ->where('TIN', $this->tin)
                // ->where('NIN', $this->nin_passport)
                // ->where('AIN', $this->ain)
                ->first();

            // check if trainer has any currently pending or ongoing registration applications
            if (
                ApplicationDetail::where('trainer_id', $trainer->id)
                ->where('application_type', 'trainer_registration')
                ->whereIn('status', ['Ongoing', 'Pending'])
                ->exists()
            ) {
                alert(
                    'Ongoing/Pending Registration',
                    'Cannot Proceed with registration. You already have a Pending or
                    Ongoing Application!',
                    'info'
                );
                return redirect(route('portal.trainer.registrations.index'));
            } else {
                if (!$this->isChecklistEvidenceUploaded()) {
                    alert(
                        'Incomplete Checklist Evidence',
                        'Cannot Proceed with registration as you have not uploaded the require Checklist evidence.
                        Please Click on the Checklist Evidence menu under Manage Application to upload all required evidences!',
                        'info'
                    );
                    return redirect(route('portal.trainer.registrations.index'));
                } else {
                    DB::transaction(function () use ($trainer) {
                        // generate new application no
                        $records = ApplicationDetail::all();
                        if ($records->isEmpty()) {
                            $new_serial_no = '000001';
                            $application_no = 'APP-' . $new_serial_no;
                        } else {
                            $last_record = ApplicationDetail::latest()->limit(1)->first();
                            $new_serial_no = str_pad((int)$last_record->serial_no + 1, 6, '0', STR_PAD_LEFT);
                            $application_no = 'APP-' . $new_serial_no;
                        }

                        // store training provider application details
                        $application = ApplicationDetail::create([
                            'trainer_id' => $trainer->id,
                            'application_type' => 'trainer_registration',
                            'application_no' => $application_no,
                            'serial_no' => $new_serial_no,
                            'status' => 'Pending',
                            'application_form_status' => 'Saved',
                            'submitted_from' => 'Portal',
                            'trainer_type' => $this->trainer_type,
                        ]);
                        $this->application_id = $application->id;
                    });
                }
            }
        }

        alert(
            'Registration Successfull',
            'Your Registration has successfully been saved. 
             You will be redirected to the payment page to complete your Registration',
            'success'
        );

        return redirect(route('portal.application-payment', $this->application_id));
    }

    public function isChecklistEvidenceUploaded()
    {
        $trainer_id = (Trainer::where('login_id', auth()->user()->id)->first())->id;
        $checklists_required = Checklist::where('is_required', 'yes')
            ->where('checklist_type', 'trainer')
            ->pluck('slug', 'id');
        $checklist_evidences = TrainingProviderChecklist::where('trainer_id', $trainer_id)
            ->pluck('path', 'checklist_id');

        $uploaded =  $checklists_required->intersectByKeys($checklist_evidences);

        if ($uploaded->count() < $checklists_required->count()) {
            return false;
        } else {
            return true;
        }
    }
}
