<?php

namespace App\Exports\AssessmentCertification;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LearnerAchievementReportsExport implements FromView, ShouldAutoSize
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('assessmentcertification.reports.learner-achievement-reports', [
            'results' => $this->data
        ]);
    }
}
