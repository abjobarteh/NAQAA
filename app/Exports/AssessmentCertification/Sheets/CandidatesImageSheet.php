<?php

namespace App\Exports\AssessmentCertification\Sheets;

use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CandidatesImageSheet implements WithDrawings, WithTitle, ShouldAutoSize
{
    private $competent_candidates;
    public function __construct($candiates)
    {
        $this->competent_candidates = $candiates;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function drawings()
    {
        $drawings = [];
        $loop = 1;
        foreach ($this->competent_candidates as $candidate) {
            $drawing = new Drawing();
            $drawing->setName($candidate->full_name);
            $drawing->setDescription('This is the profile image of ' . $candidate->full_name);
            $drawing->setPath(public_path($candidate->picture));
            $drawing->setCoordinates('B' . $loop);
            $drawing->setHeight(100);

            $drawings[] = $drawing;
            $loop++;
        }

        return $drawings;
    }

    public function title(): string
    {
        return "Competent Students Profile Images";
    }
}