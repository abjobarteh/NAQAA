<?php

namespace App\Exports\StandardsCurriculum;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UnitStandardsReportExport implements FromView
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('standardscurriculum.reports.unitstandardreports', [
            'results' => $this->data
        ]);
    }
}
