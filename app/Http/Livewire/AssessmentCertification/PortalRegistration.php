<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class PortalRegistration extends Component
{
    public $training_provider_id, $academic_year, $candidatesExist = false, $candidates;

    protected $rules = [
        'training_provider_id' => ['required', 'numeric'],
        'academic_year' => ['required', 'numeric'],
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        abort_if(Gate::denies('access_portal_registration'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'Approved');
        })->pluck('name', 'id');

        return view(
            'livewire.assessment-certification.portal-registration',
            compact('institutions')
        )
            ->extends('layouts.admin');
    }

    public function getPendingRegistrations()
    {
        $this->candidates = StudentRegistrationDetail::where('training_provider_id', $this->training_provider_id)
            ->where('academic_year', $this->academic_year)
            ->where('registration_status', 'Pending')
            ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registeredStudent'])
            ->latest()
            ->get();

        if ($this->candidates->isEmpty()) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'info',
                'title' => 'No Pending Registrations',
                'message' => 'No Pending candidate registrations from this Institution.'
            ]);
        } else {
            $this->candidatesExist = true;
        }
    }

    public function approveRegistrations()
    {
        foreach ($this->candidates as $candidate) {
            $candidate->update([
                'registration_status' => 'Approved'
            ]);
        }

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'title' => 'Registrations Approved',
            'message' => 'You have successfully Approved the Registrations of all candidates from this Institution'
        ]);

        $this->emitSelf('refreshComponent');
    }
}
