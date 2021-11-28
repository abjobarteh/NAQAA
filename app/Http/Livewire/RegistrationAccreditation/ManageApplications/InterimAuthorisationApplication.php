<?php

namespace App\Http\Livewire\RegistrationAccreditation\ManageApplications;

use App\Models\ApplicationStatus;
use Livewire\Component;

class InterimAuthorisationApplication extends Component
{
    public $application;

    public function mount($application)
    {
        $this->application = $application->load('interimAuthorisation', 'trainingprovider', 'interimAuthorisation.promoters');
    }
    public function render()
    {
        return view(
            'livewire.registration-accreditation.manage-applications.interim-authorisation-application'
        );
    }
}
