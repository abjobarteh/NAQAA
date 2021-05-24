<?php

namespace App\Exports\AssessmentCertification;

use App\Models\AssessmentCertification\RegisteredStudent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromView;

class CandidatesExport implements FromView
{
    protected  $candidates, $assessor;

    public function __construct($assessor, $candidates)
    {
        $this->candidates = $candidates;
        $this->assessor = $assessor;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $candidates = RegisteredStudent::whereHas('currentAssessment', function (Builder $query) {
            return $query->where('assessor_id', $this->assessor);
        })
            ->whereIn('id', $this->candidates)
            ->get();
        Log::info($candidates);
        return view('assessmentcertification.assessment.candidates-excel', ['candidates' => $candidates]);
    }
}
