<?php

namespace App\Exports\StandardsCurriculum;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UnitStandardsReportExport implements FromView, ShouldAutoSize
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