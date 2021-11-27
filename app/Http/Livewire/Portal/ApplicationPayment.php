<?php

namespace App\Http\Livewire\Portal;

use App\Models\ApplicationToken;
use App\Models\ApplicationType;
use App\Models\PaymentDetail;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\Role;
use App\Notifications\AssessmentCertification\CertificateEndorsementRequestNotification;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApplicationPayment extends Component
{
    public $serial_code, $application, $application_type, $is_error = false, $message;
    public $has_accreditation = false, $programme_fee, $no_of_programmes, $application_fee;

    public function mount($id)
    {
        $this->application = ApplicationDetail::findOrFail($id)->load(
            'trainingprovider',
            'trainer',
            'trainingproviderprogramme',
            'trainerAccreditations',
            'programmeAccreditations'
        );
        $this->application_type = ApplicationType::where(DB::raw('lower(name)'), 'like', '%' . strtolower($this->application->application_type) . '')
            ->first();
        $this->application_fee = $this->application_type->fee;

        if (
            $this->application->application_type == 'trainer_registration' ||
            $this->application->application_type == 'trainer_accreditation' ||
            $this->application->application_type == 'institution_accreditation'
        ) {
            $this->has_accreditation = true;
            $this->programme_fee = $this->application->application_type == 'trainer_registration' ||
                $this->application->application_type == 'trainer_accreditation' ?
                (int)(ApplicationType::where('name', 'trainer_programme_accreditation')->first())->fee
                : (int)(ApplicationType::where('name', 'institution_programme_accreditation')->first())->fee;

            $this->no_of_programmes = $this->application->application_type == 'trainer_registration' ||
                $this->application->application_type == 'trainer_accreditation' ?
                (int)$this->application->trainerAccreditations->count()
                : (int)$this->application->programmeAccreditations->count();
        }
    }

    public function render()
    {
        $fee = $this->getTotalFeeCharge();

        return view('livewire.portal.application-payment', compact('fee'))
            ->extends('layouts.portal');
    }

    public function processPayment()
    {
        $token_exist = ApplicationToken::where('token', $this->serial_code)
            ->where('application_type_id', $this->application_type->id)
            ->where('status', 'available')
            ->exists();

        if ($token_exist) {
            $token = ApplicationToken::where('token', $this->serial_code)
                ->where('application_type_id', $this->application_type->id)
                ->first();
            if (
                PaymentDetail::where('application_id', $this->application->id)
                ->where('token_id', $token->id)
                ->where('status', 'Paid')
                ->exists()
            ) {
                $this->is_error = true;
                $this->message = "The Application has already been paid for. Thank you";
            } else {
                PaymentDetail::create([
                    'application_id' => $this->application->id,
                    'amount' => $token->applicationType->fee,
                    'token_id' => $token->id,
                    'status' => 'Paid'
                ]);

                $this->application->update([
                    'application_form_status' => 'Submitted'
                ]);
                $token->update([
                    'status' => 'sold'
                ]);

                $role = Role::where('slug', 'registration_and_accreditation_module')->get();
                $message = "New Letter of Interim Authorisation Application from " . auth()->user()->username;

                $role[0]->notify(new CertificateEndorsementRequestNotification(
                    $message
                ));

                $this->redirectBack();
            }
        } else {
            $this->is_error = true;
            $this->message = "The Application Token you entered is Invalid. Please make sure that your Token is valid";
        }
    }

    public function redirectBack()
    {
        switch ($this->application->application_type) {
            case "institution_letter_of_interim_authorisation":
                return redirect(route('portal.institution.interim-authorisation'));
            case "institution_registration":
                return redirect(route('portal.institution.registration.index'));
            case "institution_accreditation":
                return redirect(route('portal.institution.accreditations.index'));
            case "trainer_registration":
                return redirect(route('portal.trainer.registrations.index'));
            case "trainer_accreditation":
                return redirect(route('portal.trainer.accreditations.index'));
        }
    }

    public function getTotalFeeCharge()
    {
        if (
            ($this->application->application_type == 'trainer_registration' ||
                $this->application->application_type == 'trainer_accreditation' ||
                $this->application->application_type == 'institution_accreditation') &&
            $this->application->application_form_status == 'Saved' &&
            $this->application->submitted_from == 'Portal'

        ) {
            if (
                $this->application->application_type == 'trainer_registration' ||
                $this->application->application_type == 'trainer_accreditation'
            ) {
                $total = ($this->no_of_programmes * $this->programme_fee) + (int)$this->application_type->fee;

                return $total;
            } else {
                $total = ($this->no_of_programmes * $this->programme_fee) + (int)$this->application_type->fee;

                return $total;
            }
        } else {
            return $this->application_fee;
        }
    }
}
