<?php

namespace App\Exports\ResearchDevelopment;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LabourMarketReportExport implements FromView
{
    private $results;

    public function __construct($results)
    {
        $this->results = $results;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('researchdevelopment.reports.labourmarket-report', ['results' => $this->results]);
    }
}