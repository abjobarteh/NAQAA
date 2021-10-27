<?php

namespace App\Exports\ResearchDevelopment;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EnrollmentReportsExport implements FromView, ShouldAutoSize
{
    private $results;

    public function __construct($results)
    {
        $this->results = $results;
    }
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view(
            'researchdevelopment.reports.enrollment-reports',
            [
                'results' => $this->results
            ]
        );
    }
}
