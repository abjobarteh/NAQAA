<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\AccreditedProgramme;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\ProgrammeDepartmentHead;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ApplicationDetail::whereHas('trainingprovider', function (Builder $query) {
            $query->where('login_id', auth()->user()->id);
        })->where('application_type', 'institution_accreditation')
            ->with('programmeDetail.departmentHeads')
            ->latest()->get();

        return view('portal.institutions.accreditations.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('name');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');

        return view('portal.institutions.accreditations.create', compact('countries', 'qualification_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departmentHeads = $request->filled('department_head_names') ?  $request->input('department_head_names', []) : [];
        $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->get();

        if (!$trainingprovider->isEmpty()) {
            DB::transaction(function () use ($request, $departmentHeads, $trainingprovider) {
                $programme = TrainingProviderProgramme::create([
                    'training_provider_id' => $trainingprovider[0]->id,
                    'programme_title' => $request->programme_title,
                    'level' => $request->level,
                    'mentoring_institution' => $request->mentoring_institution,
                    'mentoring_institution_address' => $request->mentoring_institution_address,
                    'programme_affiliation_proof' => null,
                    'programme_support_proof' => null,
                    'programme_aims' => $request->programme_aims,
                    'programme_objectives' => $request->programme_objectives,
                    'admission_requirements' => $request->admission_requirements,
                    'progression_requirements' => $request->progrssion_requirements,
                    'learning_outcomes' => $request->learning_outcomes,
                    'studentship_duration' => $request->studentship_duration,
                    'total_qualification_time' => $request->total_qualification_time,
                    'level_of_fees' => $request->level_of_fees,
                    'department_name' => $request->department_name,
                    'department_establishment_date' => $request->department_establishment_date,
                    'curriculum_design_process' => $request->curriculum_design_process,
                    'curriculum_update' => $request->curriculum_update,
                    'programme_structure' => null,
                    'students_assessment_mode' => $request->students_assessment_mode,
                    'certification_mode' => $request->certification_mode,
                    'external_examiners_appointment_evidence' => $request->external_examiners_appointment_evidence,
                    'staff_recruitment_policy' => $request->staff_recruitment_policy,
                    'provisions_for_disability' => $request->provisions_for_disability,
                    'provided_safety_facilities' => $request->provided_safety_facilities,
                ]);

                for ($head = 0; $head < count($departmentHeads); $head++) {
                    if ($departmentHeads[$head] != '') {

                        ProgrammeDepartmentHead::create([
                            'training_provider_id' => $trainingprovider[0]->id,
                            'name' => $departmentHeads[$head],
                            'rank' => $request->department_head_ranks[$head],
                            'highest_qualifications' => $request->department_head_qualifications[$head],
                            'other_qualifications' => $request->department_head_other_qualifications[$head],
                            'relevant_post_qualification_experience' => $request->department_head_experience[$head],
                            'programme_id' => $programme->id,
                        ]);
                    }
                }

                $application = ApplicationDetail::create([
                    'training_provider_id' => $trainingprovider[0]->id,
                    'programme_id' => $programme->id,
                    'applicant_type' => 'training_provider',
                    'application_no' => 'auto-generated',
                    'application_category' => 'programme_accreditation',
                    'application_type' => 'new',
                    'status' => 'pending',
                    'application_form_status' => 'submitted',
                    'application_date' => now(),
                    'submitted_through' => 'portal',
                ]);
            });

            return redirect()->route('portal.institution.accreditation.index')
                ->withSuccess('Programme Accreditation application has successfully been submitted');
        } else {
            return back()
                ->withWarning('You are not yet registered. Please apply for registration before applying for accreditation');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countries = Country::all()->pluck('name');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');
        $application = ApplicationDetail::findOrFail($id)->load('programmeDetail');

        return view('portal.institutions.accreditations.show', compact('countries', 'qualification_levels', 'application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all()->pluck('name');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');

        $application = ApplicationDetail::findOrFail($id)->load('programmeDetail');
        // dd($application);

        return view('portal.institutions.accreditations.edit', compact('countries', 'qualification_levels', 'application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departmentHeads = $request->filled('department_head_names') ?  $request->input('department_head_names', []) : [];
        $accreditation = ApplicationDetail::findOrFail($id)->load('programmeDetail');

        DB::transaction(function () use ($departmentHeads, $request, $accreditation) {
            $accreditation->programmeDetail->update([
                'programme_title' => $request->programme_title,
                'level' => $request->level,
                'mentoring_institution' => $request->mentoring_institution,
                'mentoring_institution_address' => $request->mentoring_institution_address,
                'programme_affiliation_proof' => null,
                'programme_support_proof' => null,
                'programme_aims' => $request->programme_aims,
                'programme_objectives' => $request->programme_objectives,
                'admission_requirements' => $request->admission_requirements,
                'progression_requirements' => $request->progrssion_requirements,
                'learning_outcomes' => $request->learning_outcomes,
                'studentship_duration' => $request->studentship_duration,
                'total_qualification_time' => $request->total_qualification_time,
                'level_of_fees' => $request->level_of_fees,
                'department_name' => $request->department_name,
                'department_establishment_date' => $request->department_establishment_date,
                'curriculum_design_process' => $request->curriculum_design_process,
                'curriculum_update' => $request->curriculum_update,
                'programme_structure' => null,
                'students_assessment_mode' => $request->students_assessment_mode,
                'certification_mode' => $request->certification_mode,
                'external_examiners_appointment_evidence' => $request->external_examiners_appointment_evidence,
                'staff_recruitment_policy' => $request->staff_recruitment_policy,
                'provisions_for_disability' => $request->provisions_for_disability,
                'provided_safety_facilities' => $request->provided_safety_facilities,
            ]);

            for ($head = 0; $head < count($departmentHeads); $head++) {
                if ($departmentHeads[$head] != '') {

                    if ($request->departmenthead_ids[$head] != null || $request->departmenthead_ids[$head] != '') {
                        $departmentHead = ProgrammeDepartmentHead::findOrFail($request->departmenthead_ids[$head]);

                        $departmentHead->update([
                            'name' => $departmentHeads[$head],
                            'rank' => $request->department_head_ranks[$head],
                            'highest_qualifications' => $request->department_head_qualifications[$head],
                            'other_qualifications' => $request->department_head_other_qualifications[$head],
                            'relevant_post_qualification_experience' => $request->department_head_experience[$head],
                        ]);
                    } else {
                        ProgrammeDepartmentHead::create([
                            'training_provider_id' => $accreditation->training_provider_id,
                            'name' => $departmentHeads[$head],
                            'rank' => $request->department_head_ranks[$head],
                            'highest_qualifications' => $request->department_head_qualifications[$head],
                            'other_qualifications' => $request->department_head_other_qualifications[$head],
                            'relevant_post_qualification_experience' => $request->department_head_experience[$head],
                            'accredited_programme_id' => $accreditation->programme_id,
                        ]);
                    }
                }
            }
        });

        return back()->withSuccess('Programme Accreditation application has successfully been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
