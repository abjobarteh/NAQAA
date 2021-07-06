<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStudent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StudentAssessmentsController extends Controller
{
    public function candidates()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $programmes = Qualification::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        $tableColumns = collect((new TrainingProviderStudent)->getTableColumns())
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
        $candidates = null;

        if ($request->candidate_type === 'regular') {
            $request->validate([
                'institution' => ['required', 'numeric'],
                'programme' => ['required', 'numeric'],
                'level' => ['required', 'numeric'],
            ]);

            $candidates = TrainingProviderStudent::where('training_provider_id', $request->institution)
                ->where('programme_id', $request->programme)
                ->where('programme_level_id', $request->level)
                ->where('academic_year', '2021')
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                ->latest()
                ->get();
        } else {
            $candidates = TrainingProviderStudent::whereHas('registration', function (Builder $query) use ($request) {
                $query->where('registration_no', $request->registration_no);
            })
                ->where('date_of_birth', $request->date_of_birth)
                ->where('academic_year', '2021')
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                ->latest()
                ->get();
        }

        if ($candidates->isEmpty()) {
            return json_encode(['status' => 404, 'message' => 'No candidates available under these paramters']);
        } else {

            $assessors = Trainer::whereHas('accreditedAreas')->with('accreditedAreas')
                ->where('type', 'assessor')->get();

            return json_encode(['status' => 200, 'data' => ['candidates' => $candidates, 'assessors' => $assessors]]);
        }
    }

    public function generateCandidatesForAssessment(Request $request)
    {
        $candidates = null;
        if ($request->assessment_type === 'new') {
            if ($request->candidate_type === 'regular') {
                $request->validate([
                    'institution' => ['required', 'numeric'],
                    'programme' => ['required', 'numeric'],
                    'level' => ['required', 'numeric'],
                ]);

                $candidates = TrainingProviderStudent::where('training_provider_id', $request->institution)
                    ->where('programme_id', $request->programme)
                    ->where('programme_level_id', $request->level)
                    ->where('academic_year', '2021')
                    ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                    ->latest()
                    ->get();
            } else {
                $candidates = TrainingProviderStudent::whereHas('registration', function (Builder $query) use ($request) {
                    $query->where('registration_no', $request->registration_no);
                })
                    ->where('date_of_birth', $request->date_of_birth)
                    ->where('academic_year', '2021')
                    ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                    ->latest()
                    ->get();
            }
        } else {
            $candidates = TrainingProviderStudent::whereHas('registration', function (Builder $query) use ($request) {
                $query->where('registration_no', $request->candidate_registration_no);
            })
                ->where('date_of_birth', $request->candidate_date_of_birth)
                ->where('academic_year', '2021')
                ->with(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'])
                ->latest()
                ->get();
        }

        if ($candidates->isEmpty()) {
            return json_encode(['status' => 404, 'message' => 'No candidates available under these paramters']);
        } else {

            return json_encode(['status' => 200, 'data' => ['candidates' => $candidates]]);
        }
    }

    public function assessorAssignment(Request $request)
    {
        $request->validate([
            'assessor' => ['required', 'numeric'],
            'candidates' => ['required', 'array'],
            'candidates.*' => ['numeric'],
        ]);
        $candidates = $request->candidates;
        $assessor = $request->assessor;
        $errors = [];

        for ($candidate = 0; $candidate < count($candidates); $candidate++) {
            $assessmentExist = StudentAssessmentDetail::where('student_id', $candidates[$candidate])
                ->where('assessor_id', $assessor)
                ->whereNull('assessment_status')
                ->orWhere('assessment_status', 'competent')
                ->exists();

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
                array_push($errors, ['candidate' => $candidates[$candidate]]);
                continue;
            }
        }

        if (count($errors) > 0 && count($errors) == count($candidates)) {

            return response()->json(['message' => 'This candidates has already being assigned to this assessor', 'errors' => $errors, 'status' => 401], 200);
        }

        return response()->json(['message' => 'Candidates successfully assigned to assessor', 'errors' => $errors, 'status' => 200], 200);
    }

    public function studentAssessment()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $programmes = Qualification::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');


        return view('assessmentcertification.assessment.assessment', compact('institutions', 'programmes', 'levels'));
    }

    public function storeAssessmentDetails(Request $request)
    {
        $request->validate([
            'candidates' => ['required', 'array'],
            'candidates.*' => ['numeric'],
            'assessment_status' => ['required', 'array'],
            'assessment_status.*' => ['string'],
            'qualification_type' => ['required', 'array'],
            'qualification_type.*' => ['string'],
            'last_assessment_date' => ['required', 'array'],
            'last_assessment_date.*' => ['date'],
        ]);
        $candidates = $request->candidates;
        $assessment_statuses = $request->assessment_status;
        $qualification_types = $request->qualification_type;
        $last_assessment_dates = $request->last_assessment_date;
        $errors = [];

        for ($candidate = 0; $candidate < count($candidates); $candidate++) {
            if ($assessment_statuses[$candidate] === 'competent') {
                $alreadyAssessed = StudentAssessmentDetail::where('assessment_status', 'competent')
                    ->where('student_id', $candidates[$candidate])
                    ->exists();

                if (!$alreadyAssessed) {
                    StudentAssessmentDetail::where('student_id', $candidates[$candidate])
                        ->update([
                            'assessment_status' => $assessment_statuses[$candidate],
                            'qualification_type' => $qualification_types[$candidate],
                            'last_assessment_date' => $last_assessment_dates[$candidate],
                        ]);
                } else {
                    array_push($errors, ['candidate' => $candidates[$candidate]]);
                    continue;
                }
            }
        }

        if (count($errors) > 0 && count($errors) == count($candidates)) {

            return response()->json(['message' => 'This candidates has already being assessed to be competent', 'errors' => $errors, 'status' => 401], 200);
        }

        return response()->json(['message' => 'Candidates assessment details successfully added', 'status' => 200], 200);
    }
}
