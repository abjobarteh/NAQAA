<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditCertificateEndorsement extends Component
{
    public $training_provider_id, $level, $programme, $programme_start_date, $programme_end_date,
        $total_certificates_declared, $total_certificates_received, $total_males, $total_females,
        $endorsed_certificates, $non_endorsed_certificates, $firstnames, $middlenames, $lastnames,
        $license_nos, $modules;
    public $trainer_inputs = [];
    public $trainer_counter = 1;
    public $programmes_exist = false, $programmes, $is_error =  false, $is_success = false, $message;
    public $endorsement;

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

    public function mount($id)
    {
        $this->endorsement = EndorsedCertificateDetail::findOrFail($id);

        $this->fill([
            'training_provider_id' => $this->endorsement->training_provider_id,
            'programme' => $this->endorsement->programme,
            'level' => $this->endorsement->level,
            'total_certificates_declared' => $this->endorsement->total_certificates_declared,
            'total_certificates_received' => $this->endorsement->total_certificates_received,
            'total_males' => $this->endorsement->total_males,
            'total_females' => $this->endorsement->total_females,
            'endorsed_certificates' => $this->endorsement->endorsed_certificates,
            'non_endorsed_certificates' => $this->endorsement->non_endorsed_certificates,
            'programme_start_date' => $this->endorsement->programme_start_date,
            'programme_end_date' => $this->endorsement->programme_end_date,
        ]);

        foreach ($this->endorsement->trainer_details as $key => $value) {
            $this->firstnames[$key] = $value->firstname;
            $this->middlenames[$key] = $value->middlename;
            $this->lastnames[$key] = $value->lastname;
            $this->license_nos[$key] = $value->license_no;
            $this->modules[$key] = $value->module;
            array_push($this->trainer_inputs, $key);
        }
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
            'livewire.assessment-certification.edit-certificate-endorsement',
            compact('institutions', 'levels')
        )
            ->extends('layouts.admin');
    }

    public function updatedLevel($value)
    {
        if ($this->training_provider_id == null) {
            $this->is_error = true;
            $this->programmes_exist = false;
            $this->message = "You must also select an Institution 
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
                $this->message = "No Programmes accredited for this Institution under this level!";
            } else $this->programmes_exist = true;
        }
    }

    public function updateEndorsement()
    {
        $this->validate();

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

        EndorsedCertificateDetail::where('id', $this->endorsement->id)
            ->update([
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
            ]);

        $this->is_success = true;
        $this->message = "Certificate Endorsement request successfully updated";
    }
}
