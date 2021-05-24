<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Exports\AssessmentCertification\CandidatesExport;
use App\Http\Controllers\Controller;
use App\Models\AssessmentCertification\RegisteredStudent;
use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class StudentAssessmentsController extends Controller
{
    public function candidates()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $programmes = Qualification::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        $tableColumns = collect((new RegisteredStudent)->getTableColumns())
            ->diff(
                [
                    'id',
                    'programme_id',
                    'programme_level_id',
                    'region_id', 'district_id',
                    'townvillage_id',
                    'institution_id',
                    'created_at',
                    'updated_at'
                ]
            );

        return view('assessmentcertification.assessment.generate', compact('institutions', 'programmes', 'levels', 'tableColumns'));
    }

    public function generateCandidates(Request $request)
    {
        $request->validate([
            'institution_id' => ['required', 'numeric'],
            'programme_id' => ['required', 'numeric'],
            'programme_level_id' => ['required', 'numeric'],
            'columns' => ['bail', 'nullable', 'array'],
            'columns.*' => ['string'],
        ]);

        $candidates = RegisteredStudent::where('institution_id', $request->institution_id)
            ->where('programme_id', $request->programme_id)
            ->where('programme_level_id', $request->programme_level_id)
            ->whereYear('academic_year', date('Y'))
            ->with(['programme:id,name', 'level:id,name', 'institution:id,name', 'registration'])
            ->latest()
            ->get();

        if ($candidates->isEmpty()) {
            return back()->withSuccess('No candidates available under these paramteres');
        } else {

            $assessors = Trainer::whereHas('accreditedAreas')->with('accreditedAreas')
                ->where('type', 'assessor')->get();

            return view('assessmentcertification.assessment.candidate', compact('candidates', 'assessors'));
        }
    }

    public function assessorAssignment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'assessor' => ['required', 'numeric'],
            'excel_type' => ['required', 'in:excel,pdf'],
            'candidates' => ['required', 'array'],
            'candidates.*' => ['numeric'],
        ]);
        $candidates = $request->candidates;
        $assessor = $request->assessor;
        $errors = [];

        for ($candidate = 0; $candidate < count($candidates); $candidate++) {
            $assessmentExist = StudentAssessmentDetail::where('student_id', $candidates[$candidate])
                ->where('assessor_id', $assessor)->whereNull('assessment_status')->exists();

            if (!$assessmentExist) {
                $application = StudentRegistrationDetail::where('student_id', $candidates[$candidate])->get();

                StudentAssessmentDetail::create(
                    [
                        'student_id' => $candidates[$candidate],
                        'assessor_id' => $assessor,
                        'application_id' => $application[0]->id,
                    ]
                );
            } else {
                array_push($errors, ['candidate' => $candidates[$candidate], 'message' => 'Candidate already assigned an assesor']);
                continue;
            }
        }

        return response()->json(['message' => 'Candidates successfully assigned to assessor', 'errors' => $errors, 'status' => 200], 200);
    }

    public function exportCandidates(Request $request)
    {
        if ($request->type === 'excel') {
            Excel::download(new CandidatesExport($request->assessor, $request->candidates), 'candidates.xlsx');
        }
        return json_encode(['status' => 'export successfull']);
    }
}
