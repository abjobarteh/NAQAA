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
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $sheets = [];
        $competent_candidates = TrainingProviderStudent::with(['trainingprovider', 'programme', 'level'])->whereHas('currentAssessment', function (Builder $query) {
            $query->where('assessment_status', 'competent');
        })
            ->where('academic_year', (Carbon::now())->format('Y'))
            ->get();

        $sheets[] = new CandidateExportSheet($competent_candidates);
        $sheets[] = new CandidatesImageSheet($competent_candidates);

        return $sheets;
    }
}
