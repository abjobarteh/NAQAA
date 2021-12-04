<?php

namespace App\Exports\RegistrationAccreditation;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TrainerReportExport implements FromView, ShouldAutoSize
{
    public function __construct($results)
    {
        $this->results = $results;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view(
            'registrationAccreditation.reports.trainer-reports',
            ['results' => $this->results]
        );
    }
}
