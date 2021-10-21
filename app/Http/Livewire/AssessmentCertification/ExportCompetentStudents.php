<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Exports\AssessmentCertification\CompetentStudentsExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ExportCompetentStudents extends Component
{
    public function render()
    {
        return view('livewire.assessment-certification.export-competent-students');
    }

    public function exportCompetentStudents()
    {
        return Excel::download(new CompetentStudentsExport, 'competent_students.xlsx');
    }
}
