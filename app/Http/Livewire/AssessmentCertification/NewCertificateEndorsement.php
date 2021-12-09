<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class NewCertificateEndorsement extends Component
{
    public $training_provider_id, $level, $programme, $programme_start_date, $programme_end_date,
        $total_certificates_declared, $total_certificates_received, $total_males, $total_females,
        $endorsed_certificates, $non_endorsed_certificates, $firstnames, $middlenames, $lastnames,
        $license_nos, $modules;
    public $trainer_inputs = [];
    public $trainer_counter = 1;
    public $programmes_exist = false, $programmes, $is_error =  false, $error_msg;

    protected $rules = [
        'training_provider_id' => 'required|numeric',
        'level' => 'required|string',
        'programme' => 'required_with:training_provider_id,level|string',
        'total_certificates_received' => 'required|numeric',
        'total_certificates_declared' => 'required|numeric',
        'total_males' => 'required|numeric',
        'total_females' => 'required|numeric',
        'firstnames.0' => 'required|string',
        'middlenames.0' => 'nullable|string',
        'lastnames.0' => 'required|string',
        'license_nos.0' => 'required|string',
        'modules.0' => 'required|string',
        'firstnames.*' => 'required|string',
        'middlenames.*' => 'nullable|string',
        'lastnames.*' => 'required|string',
        'license_nos.*' => 'required|string',
        'modules.*' => 'required|string',
        'endorsed_certificates' => 'required|numeric',
        'non_endorsed_certificates' => 'required|numeric',
        'programme_start_date' => 'required|date',
        'programme_end_date' => 'required|date',
    ];

    public function mount()
    {
        abort_if(Gate::denies('create_endorsement'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function addTrainer($counter)
    {
        $counter = $counter + 1;
        $this->trainer_counter = $counter;
        array_push($this->trainer_inputs, $counter);
    }

    public function removeTrainer($counter)
    {
        unset($this->trainer_inputs[$counter]);
    }

    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'Approved');
        })->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view(
            'livewire.assessment-certification.new-certificate-endorsement',
            compact('institutions', 'levels')
        )
            ->extends('layouts.admin');
    }

    public function updatedLevel($value)
    {
        if ($this->training_provider_id == null) {
            $this->is_error = true;
            $this->programmes_exist = false;
            $this->error_msg = "You must also select an Institution 
            to check if there are any programmes registered under this Institution";
        } else {
            $this->programmes = TrainingProviderProgramme::where('training_provider_id', $this->training_provider_id)
                ->where('level', $value)
                ->whereHas('accreditations', function (Builder $query) {
                    $query->where('accreditation_status', 'Approved');
                })
                ->get();
            if ($this->programmes->isEmpty()) {
                $this->is_error = true;
                $this->programmes_exist = false;
                $this->error_msg = "No Programmes accredited for this Institution under this level!";
            } else $this->programmes_exist = true;
        }
    }

    public function storeEndorsement()
    {
        $this->validate();

        // check if institution programme has already an endorsement in the current year
        if (
            EndorsedCertificateDetail::where('training_provider_id', $this->training_provider_id)
            ->where('programme', $this->programme)
            ->where('level', $this->level)
            ->whereYear('created_at', date('Y'))
            ->exists()
        ) {
            $this->is_error = true;
            $this->error_msg = "Duplicate Endorsement. There is already an endorsement request
            from this Insitution for this Programme under this level";

            return;
        } else {
            DB::transaction(function () {
                $trainer_details = [];
                foreach ($this->firstnames as $key => $value) {
                    array_push($trainer_details, [
                        'firstname' => $this->firstnames[$key],
                        'middlename' => $this->middlenames[$key] ?? null,
                        'lastname' => $this->lastnames[$key],
                        'license_no' => $this->license_nos[$key],
                        'module' => $this->modules[$key],
                    ]);
                }

                EndorsedCertificateDetail::create([
                    'training_provider_id' => $this->training_provider_id,
                    'programme' => $this->programme,
                    'level' => $this->level,
                    'total_certificates_declared' => $this->total_certificates_declared,
                    'total_certificates_received' => $this->total_certificates_received,
                    'total_males' => $this->total_males,
                    'total_females' => $this->total_females,
                    'trainer_details' => json_encode($trainer_details),
                    'endorsed_certificates' => $this->endorsed_certificates,
                    'non_endorsed_certificates' => $this->non_endorsed_certificates,
                    'programme_start_date' => $this->programme_start_date,
                    'programme_end_date' => $this->programme_end_date,
                    'request_status' => 'Processed'
                ]);
            });
        }

        alert(
            'Success',
            'Certificate Endorsement request successfully created',
            'success'
        );

        return redirect()->route('assessment-certification.certificate-endorsements.index');
    }
}
