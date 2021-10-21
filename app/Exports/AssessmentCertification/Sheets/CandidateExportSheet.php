<?php

namespace App\Exports\AssessmentCertification\Sheets;

use App\Models\TrainingProviderStudent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class CandidateExportSheet implements FromView, WithTitle, ShouldAutoSize
{
    private $competent_candidates;
    public function __construct($candidates)
    {
        $this->competent_candidates = $candidates;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {

        return view('assessmentcertification.competent-students', ['candidates' => $this->competent_candidates]);
    }

    public function title(): string
    {
        return "Competent Students details";
    }
}
