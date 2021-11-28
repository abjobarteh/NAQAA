<?php

namespace App\Http\Livewire\RegistrationAccreditation\ManageApplications;

use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use Livewire\Component;

class InstitutionRegistrationApplication extends Component
{
    public $application, $checklists;

    public function mount($application)
    {
        $this->application = $application->load('trainingprovider');
        $this->checklists = TrainingProviderChecklist::where('training_provider_id', $application->training_provider_id)
            ->with('checklist')->get();
    }

    public function render()
    {
        return view('livewire.registration-accreditation.manage-applications.institution-registration-application');
    }
}
