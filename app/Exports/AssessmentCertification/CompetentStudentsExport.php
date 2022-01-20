<?php

namespace App\Exports\AssessmentCertification;

use App\Exports\AssessmentCertification\Sheets\CandidateExportSheet;
use App\Exports\AssessmentCertification\Sheets\CandidatesImageSheet;
use App\Models\TrainingProviderStudent;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CompetentStudentsExport implements WithMultipleSheets
{
    public $competent_candidates;
    public function __construct($data)
    {
        $this->competent_candidates = $data;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new CandidateExportSheet($this->competent_candidates);
        $sheets[] = new CandidatesImageSheet($this->competent_candidates);

        return $sheets;
    }
}
