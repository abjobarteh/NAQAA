<?php

namespace App\Http\Livewire\ResearchDevelopment\Reports;

use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\TrainingProviderClassification;
use Livewire\Component;

class EnrollmentReports extends Component
{
    public $start_date, $end_date;

    public function render()
    {
        return view('livewire.research-development.reports.enrollment-reports')
            ->extends('layouts.admin');
    }

    public function getReport()
    {
        dd('Report generation has started. Please wait');
    }
}
