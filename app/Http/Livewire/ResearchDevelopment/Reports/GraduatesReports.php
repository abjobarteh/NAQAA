<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\TrainingProviderClassification;
use Livewire\Component;

class GraduatesReports extends Component
{
    public function render()
    {
        $fields_of_education = EducationField::all()->pluck('name');
        $levels = QualificationLevel::all()->pluck('name');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');

        return view(
            'livewire.research-development.reports.graduates-reports',
            compact('fields_of_education', 'levels', 'classifications')
        )
            ->extends('layouts.admin');
    }
}
