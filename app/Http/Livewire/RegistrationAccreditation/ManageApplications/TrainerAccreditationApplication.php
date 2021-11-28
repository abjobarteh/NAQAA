<?php

namespace App\Http\Livewire\RegistrationAccreditation\ManageApplications;

use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use Livewire\Component;

class TrainerAccreditationApplication extends Component
{
    public $application, $checklists;

    public function mount($application)
    {
        $this->application = $application->load('trainerAccreditations', 'trainer');
        $this->checklists = TrainingProviderChecklist::where('trainer_id', $application->trainer_id)
            ->with('checklist')
            ->get();
    }

    public function render()
    {
        return view('livewire.registration-accreditation.manage-applications.trainer-accreditation-application');
    }
}
