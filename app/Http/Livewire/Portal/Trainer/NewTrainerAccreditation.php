<?php

namespace App\Http\Livewire\Portal\Trainer;

use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerAccreditationDetail;
use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewTrainerAccreditation extends Component
{
    public $accreditation_area, $accreditation_level, $trainer_type, $practical_trainer;
    public $accreditation_inputs = [];
    public $accreditation_counter = 1;
    public $is_gambian = true, $is_approved = false, $is_practical_trainer = false;
    public $application_id;

    protected $rules = [
        'accreditation_area.0' => 'required|string',
        'accreditation_level.0' => 'required|string',
        'accreditation_area.*' => 'required|string',
        'accreditation_level.*' => 'required|string',
        'trainer_type' => 'required|string',
        'practical_trainer' => 'required_if:trainer_type,Practical Trainer|nullable|string'
    ];

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
            'livewire.portal.trainer.new-trainer-accreditation',
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

    public function submitApplication()
    {
        $this->validate();
        // get trainer details
        $trainer = Trainer::where('login_id', auth()->user()->id)
            ->first();

        // check if trainer has an approved registration for this trainer type
        if (
            !ApplicationDetail::where('trainer_id', $trainer->id)
                ->where('trainer_type', $this->trainer_type)
                ->where('application_type', 'trainer_registration')
                ->where('status', 'Approved')
                ->whereHas('registrationLicence', function (Builder $query) {
                    $query->where('license_status', 'Approved');
                })
                ->exists()
        ) {
            alert(
                'Invalid/Pending Registration',
                'You must first apply for Registration for this Trainer type before
                you can apply for Accreditation for this Trainer type!',
                'info'
            );

            return redirect(route('portal.trainer.new-trainer-accreditation'));
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
                    'application_type' => 'trainer_accreditation',
                    'application_no' => $application_no,
                    'serial_no' => $new_serial_no,
                    'status' => 'Pending',
                    'application_form_status' => 'Saved',
                    'submitted_from' => 'Portal',
                    'trainer_type' => $this->trainer_type,
                ]);

                // Save accreditation details
                foreach ($this->accreditation_area as $key => $value) {
                    if (
                        !TrainerAccreditationDetail::where('trainer_id', $trainer->id)
                            ->where(DB::raw('lower(area)'), 'like', '%' . strtolower($this->accreditation_area[$key]) . '%')
                            ->where(DB::raw('lower(level)'), 'like', '%' . strtolower($this->accreditation_level[$key]) . '%')
                            ->whereHas('application', function (Builder $query) {
                                $query->where('trainer_type', $this->trainer_type);
                            })
                            ->exists()
                    ) {
                        TrainerAccreditationDetail::create([
                            'trainer_id' => $trainer->id,
                            'area' => $this->accreditation_area[$key],
                            'level' => $this->accreditation_level[$key],
                            'application_id' => $application->id,
                            'status' => 'Pending',
                        ]);
                    } else continue;
                }
                $this->application_id = $application->id;
            });
        }

        alert(
            'Registration Accreditation Successfull',
            'Your Registration for Accreditation has successfully been saved. 
             You will be redirected to the payment page to complete your Registration 
             for Accreditation',
            'success'
        );

        return redirect(route('portal.application-payment', $this->application_id));
    }
}
