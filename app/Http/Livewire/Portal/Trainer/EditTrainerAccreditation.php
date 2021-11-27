<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\TrainerAccreditationDetail;
use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditTrainerAccreditation extends Component
{
    public $accreditation_area, $accreditation_level, $trainer_type, $practical_trainer, $application;
    public $accreditation_inputs = [];
    public $accreditation_counter = 1;
    public $is_gambian = true, $is_approved = false, $is_practical_trainer = false;
    public $application_id, $update_successfull = false;

    protected $rules = [
        'accreditation_area.0' => 'required|string',
        'accreditation_level.0' => 'required|string',
        'accreditation_area.*' => 'required|string',
        'accreditation_level.*' => 'required|string',
        'trainer_type' => 'required|string',
        'practical_trainer' => 'required_if:trainer_type,Practical Trainer|nullable|string'
    ];

    public function mount($id)
    {
        $application = ApplicationDetail::findOrFail($id)
            ->load('trainer', 'registrationLicence', 'trainerAccreditations');
        $this->application = $application;

        $this->fill([
            'trainer_type' => $application->trainer_type,
            'is_practical_trainer' => $application->trainer_type == 'Practical Trainer' ? true : false,
        ]);

        foreach ($application->trainerAccreditations as $key => $value) {
            $this->accreditation_area[$key] = $value->area;
            $this->accreditation_level[$key] = $value->level;
            $this->accreditation_id[$key] = $value->id;
            array_push($this->accreditation_inputs, $key);
        }
    }

    public function addAccreditation($counter)
    {
        $counter = $counter + 1;
        $this->accreditation_counter = $counter;
        array_push($this->accreditation_inputs, $counter);
    }

    public function removeAccreditation($counter)
    {
        unset($this->accreditation_inputs[$counter]);
    }

    public function render()
    {
        $trainer_types = TrainerType::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view(
            'livewire.portal.trainer.edit-trainer-accreditation',
            compact('trainer_types', 'levels')
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

    public function updateApplication()
    {
        // / $this->validate();

        DB::transaction(function () {

            $this->trainer_registration->update([
                'trainer_type' => $this->trainer_type
            ]);

            // update accreditation details
            foreach ($this->accreditation_area as $key => $value) {
                TrainerAccreditationDetail::where('id', $this->accreditation_id[$key])
                    ->update([
                        'area' => $this->accreditation_area[$key],
                        'level' => $this->accreditation_level[$key],
                    ]);
            }
        });

        $this->update_successfull = true;
    }
}
