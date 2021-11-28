<?php

namespace App\Http\Livewire\RegistrationAccreditation\ManageApplications;

use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use Livewire\Component;

class InstitutionAccreditationApplication extends Component
{
    public $application, $checklists;

    public function mount($application)
    {
        $this->application = $application
            ->load('programmeAccreditations', 'trainingprovider', 'trainingproviderprogramme');
        $this->checklists = TrainingProviderChecklist::where('training_provider_id', $application->training_provider_id)
            ->with('checklist')
            ->get();
    }

    public function render()
    {
        return view('livewire.registration-accreditation.manage-applications.institution-accreditation-application');
    }
}
