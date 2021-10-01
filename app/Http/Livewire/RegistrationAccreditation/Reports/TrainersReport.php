<?php

namespace App\Http\Livewire\RegistrationAccreditation\Reports;

use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\TrainingProviderClassification;
use Livewire\Component;

class TrainersReport extends Component
{
    public function render()
    {
        $fields_of_education = EducationField::all()->pluck('name');
        $levels = QualificationLevel::all()->pluck('name');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');

        return view(
            'livewire.registration-accreditation.reports.trainers-report',
            compact('fields_of_education', 'levels', 'classifications')
        )
            ->extends('layouts.admin');
    }
}
