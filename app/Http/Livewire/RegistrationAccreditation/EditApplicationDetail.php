<?php

namespace App\Http\Livewire\RegistrationAccreditation;

use App\Models\ApplicationStatus;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class EditApplicationDetail extends Component
{
    public $application_status, $license_start_date, $license_end_date, $license_no, $trainer_type,
        $practical_trainer;

    public $is_approved = false, $is_trainer = false, $is_practical_trainer = false;
    public $application;

    protected $rules = [
        'application_status' => 'required|string',
        'license_start_date' => 'required_if:application_status,Approved|nullable|date',
        'license_end_date' => 'required_if:application_status,Approved|nullable|date',
        'license_no' => 'required_if:application_status,Approved|nullable|string',
    ];

    public function mount($id)
    {
        abort_if(Gate::denies('access_portal_applications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->application = ApplicationDetail::findOrFail($id);
        $this->fill([
            'application_status' => $this->application->status
        ]);
    }
    public function render()
    {
        $application_statuses = ApplicationStatus::all()->pluck('name');

        return view(
            'livewire.registration-accreditation.edit-application-detail',
            compact('application_statuses')
        )
            ->extends('layouts.admin');
    }

    public function updatedApplicationStatus($value)
    {
        if ($value == 'Approved') {
            if (
                $this->application->application_type === "institution_registration" ||
                $this->application->application_type === "trainer_registration"
            ) {
                $this->is_approved = true;
                if ($this->application->application_type === "trainer_registration") {

                    $this->is_trainer = true;
                }
            }
        } else {
            $this->is_approved = false;
            $this->is_trainer = false;
        }
    }

    public function UpdateApplication()
    {
        $this->application->update([
            'status' => $this->application_status
        ]);

        if ($this->application_status == 'Approved') {
            if (
                $this->application->application_type === "institution_registration" ||
                $this->application->application_type === "trainer_registration"
            ) {
                if ($this->application->application_type === "trainer_registration") {

                    RegistrationLicenceDetail::create([
                        'trainer_id' => $this->application->trainer_id,
                        'trainer_type' => $this->application->trainer_type,
                        'application_id' => $this->application->id,
                        'licence_start_date' => $this->license_start_date,
                        'licence_end_date' => $this->license_end_date,
                        'license_no' => $this->license_no,
                        'license_status' => "Approved",
                    ]);
                } else {
                    RegistrationLicenceDetail::create([
                        'training_provider_id' => $this->application->training_provider_id,
                        'application_id' => $this->application->id,
                        'licence_start_date' => $this->license_start_date,
                        'licence_end_date' => $this->license_end_date,
                        'license_no' => $this->license_no,
                        'license_status' => "Approved",
                    ]);
                }
            }
        }

        alert(
            'Status Update Successfull',
            'Application status successfully updated',
            'success'
        );

        return redirect()->route('registration-accreditation.applications.index');
    }
}
