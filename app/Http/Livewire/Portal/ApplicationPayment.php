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

    public function mount($id)
    {
        $this->application = ApplicationDetail::findOrFail($id)->load(
            'trainingprovider',
            'trainer',
            'trainingproviderprogramme'
        );
        $this->application_type = ApplicationType::where(DB::raw('lower(name)'), 'like', '%' . strtolower($this->application->application_type) . '')
            ->first();
    }

    public function render()
    {
        $fee = $this->application_type->fee;

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
            }
        } else {
            $this->is_error = true;
            $this->message = "The Application Token you entered is Invalid. Please make sure that your Token is valid";
        }
    }

    public function cancelPayment()
    {
        
    }
}
