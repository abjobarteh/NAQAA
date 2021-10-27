<?php

namespace App\Exports\ResearchDevelopment;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GraduatesReportExport implements FromView, ShouldAutoSize
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
            'researchdevelopment.reports.graduate-reports',
            [
                'results' => $this->results
            ]
        );
    }
}
