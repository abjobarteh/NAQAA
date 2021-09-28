<?php

namespace App\Http\Livewire\ResearchDevelopment\Datacollection;

use App\Models\AwardBody;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use App\Models\TrainingProviderProgramme;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditProgrammesOffered extends Component
{
    public $isAccredited = false, $training_provider_id, $program_name, $duration, $tuition_fee_per_year, $entry_requirements,
        $field_of_education, $awarding_body, $accredited_programmes, $programme_id, $specify_programme = false,
        $academic_year, $program_details;


    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
        'program_name' => 'nullable|String',
        'programme_id' => 'nullable',
        'duration' => 'required|numeric|integer',
        'tuition_fee_per_year' => 'required|numeric',
        'awarding_body' => 'required|string',
        'field_of_education' => 'required|string',
        'training_provider_id' => 'required|numeric|integer',
        'entry_requirements' => ['required', 'array'],
        'entry_requirements.*' => ['string'],
    ];

    protected $messages = [
        'duration.required' => 'Please Enter program duration',
        'duration.numeric' => 'Duration must be numeric value',
        'tuition_fee_per_year.required' => 'Please Enter Program tuition fee per year',
        'tuition_fee_per_year.numeric' => 'Tuition fee must be a numeric value',
        'entry_requirements.required' => 'Please Program Entery requirements',
        'awarding_body.required' => 'Please select the Awarding body',
        'field_of_education.required' => 'Please select program field of education',
        'training_provider_id.required' => 'Please select training provider',
        'training_provider_id.numeric' => 'Training provider cannot be empty',
    ];

    public function mount($id)
    {
        $this->program_details = ProgramDetailsDataCollection::findOrFail($id)->load('programmeDetails');
        $this->fill([
            'training_provider_id' => $this->program_details->programmeDetails->training_provider_id,
            'programme_id' => $this->program_details->programme_id,
            'tuition_fee_per_year' => $this->program_details->tuition_fee_per_year,
            'duration' => $this->program_details->duration,
            'entry_requirements' => $this->program_details->entry_requirements,
            'field_of_education' => $this->program_details->programmeDetails->field_of_education,
            'awarding_body' => $this->program_details->awarding_body,
            'academic_year' => $this->program_details->academic_year,
            'accredited_programmes' => TrainingProviderProgramme::where('training_provider_id', $this->program_details->programmeDetails->training_provider_id)
                ->with('programme')->get(),
            'isAccredited' => true
        ]);

        if ($this->program_details->programmeDetails->is_accredited == 0) {
            $this->isAccredited = false;
            $this->program_name = $this->program_details->programmeDetails->programme->name;
        }
    }

    public function render()
    {
        $educationfields = EducationField::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name');

        $awardbodies = AwardBody::all()->pluck('name', 'id');

        return view(
            'livewire.research-development.datacollection.edit-programmes-offered',
            compact('educationfields', 'learningcenters', 'levels', 'awardbodies')
        )->extends('layouts.admin');
    }

    public function updatedTrainingProviderId($training_provider_id)
    {
        if (TrainingProvider::where('is_registered', 1)->where('id', $training_provider_id)->exists()) {
            $programmes = TrainingProviderProgramme::where('training_provider_id', $training_provider_id)
                ->with('programme')->get();
        } else {
            $programmes = TrainingProviderProgramme::where('training_provider_id', $training_provider_id)
                ->with('programme')->get();
        }

        if (!$programmes->isEmpty()) {
            $this->accredited_programmes = $programmes;
        }
    }

    public function updatedProgrammeId($value)
    {
        if ($value === 'not-specified') {
            $this->specify_programme = true;
        } else {
            $this->specify_programme = false;
        }
    }

    public function updateProgramme()
    {
        $this->validate();

        DB::transaction(function () {
            if ($this->isAccredited) {
                if ($this->programme_id === 'not-specified') {
                    $programme =  TrainingProviderProgramme::create([
                        'training_provider_id' => $this->training_provider_id,
                        'programme_title' => $this->program_name,
                        'admission_requirements' => $this->entry_requirements,
                        'level_of_fees' => $this->tuition_fee_per_year,
                        'field_of_education' => $this->field_of_education,
                        'awarding_body' => $this->awarding_body,
                        'is_accredited' => 0,
                    ]);

                    $this->program_details->update([
                        'programme_id' => $programme->id,
                        'duration' => $this->duration,
                        'tuition_fee_per_year' => $this->tuition_fee_per_year,
                        'entry_requirements' => $this->entry_requirements,
                        'awarding_body' => $this->awarding_body,
                        'academic_year' => $this->academic_year,
                    ]);
                } else {
                    $this->program_details->update([
                        'programme_id' => $this->programme_id,
                        'duration' => $this->duration,
                        'tuition_fee_per_year' => $this->tuition_fee_per_year,
                        'entry_requirements' => $this->entry_requirements,
                        'awarding_body' => $this->awarding_body,
                        'academic_year' => $this->academic_year,
                    ]);
                }
            } else {
                $this->program_details->programmeDetails->update([
                    'training_provider_id' => $this->training_provider_id,
                    'admission_requirements' => $this->entry_requirements,
                    'level_of_fees' => $this->tuition_fee_per_year,
                    'field_of_education' => $this->field_of_education,
                    'awarding_body' => $this->awarding_body,
                ]);

                $this->program_details->update([
                    'duration' => $this->duration,
                    'tuition_fee_per_year' => $this->tuition_fee_per_year,
                    'entry_requirements' => $this->entry_requirements,
                    'awarding_body' => $this->awarding_body,
                    'academic_year' => $this->academic_year,
                ]);
            }
        });

        alert('Success', 'Program details data collection record successfully updated', 'success');

        $this->emitSelf('refreshComponent');
    }
}
