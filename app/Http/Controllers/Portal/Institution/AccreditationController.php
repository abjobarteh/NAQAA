<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Program;
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
    private $application_id;
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
            ->with('trainingproviderprogramme.departmentHeads')
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
        $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->first();

        // check if training provider is registered
        if (
            TrainingProvider::where('login_id', auth()->user()->id)
            ->doesntHave('validLicence')
            ->exists()
        ) {

            return back()
                ->withInfo(
                    'You must first apply for Registration before applying for Programme Accreditation!'
                );
        } else {
            if (Program::where(DB::raw('lower(name)'), 'like', '%' . strtolower($request->programme_title) . '%')
                ->exists()
            ) {
                $program_catalogue = Program::where(DB::raw('lower(name)'), 'like', '%' . strtolower($request->programme_title) . '%')
                    ->first();
            } else {
                $program_catalogue = Program::create([
                    'name' => $request->programme_title
                ]);
            }
            if (
                TrainingProviderProgramme::where('training_provider_id', $trainingprovider->id)
                ->where('programme_id', $program_catalogue->id)
                ->where('level', $request->level)
                ->has('isAccredited')
                ->exists()
            ) {
                $request->flash();
                return back()
                    ->withInfo(
                        'This programme has already been accredited for your institution'
                    );
            } else {
                DB::transaction(function () use ($request, $departmentHeads, $trainingprovider, $program_catalogue) {
                    // Store programme details
                    $programme_affiliation_proof = $request->programme_affiliation_proof
                        ->storeAs(
                            auth()->user()->username,
                            time() . '_' . $request->programme_affiliation_proof->getClientOriginalName()
                        );
                    $programme_support_proof = $request->programme_support_proof
                        ->storeAs(
                            auth()->user()->username,
                            time() . '_' . $request->programme_support_proof->getClientOriginalName()
                        );
                    $programme_structure = $request->programme_structure
                        ->storeAs(
                            auth()->user()->username,
                            time() . '_' . $request->programme_structure->getClientOriginalName()
                        );
                    $programme = TrainingProviderProgramme::create([
                        'training_provider_id' => $trainingprovider->id,
                        'programme_id' => $program_catalogue->id,
                        'level' => $request->level,
                        'mentoring_institution' => $request->mentoring_institution,
                        'mentoring_institution_address' => $request->mentoring_institution_address,
                        'programme_affiliation_proof' => '/storage/' . $programme_affiliation_proof,
                        'programme_support_proof' => '/storage/' . $programme_support_proof,
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
                        'programme_structure' => '/storage/' . $programme_structure,
                        'students_assessment_mode' => $request->students_assessment_mode,
                        'certification_mode' => $request->certification_mode,
                        'external_examiners_appointment_evidence' => $request->external_examiners_appointment_evidence,
                        'staff_recruitment_policy' => $request->staff_recruitment_policy,
                        'provisions_for_disability' => $request->provisions_for_disability,
                        'provided_safety_facilities' => $request->provided_safety_facilities,
                    ]);

                    // Store department heads
                    for ($head = 0; $head < count($departmentHeads); $head++) {
                        if ($departmentHeads[$head] != '') {

                            ProgrammeDepartmentHead::create([
                                'training_provider_id' => $trainingprovider->id,
                                'name' => $departmentHeads[$head],
                                'rank' => $request->department_head_ranks[$head],
                                'highest_qualifications' => $request->department_head_qualifications[$head],
                                'other_qualifications' => $request->department_head_other_qualifications[$head],
                                'relevant_post_qualification_experience' => $request->department_head_experience[$head],
                                'programme_id' => $programme->id,
                            ]);
                        }
                    }

                    // store training provider application details
                    $application_no = null;

                    $records = ApplicationDetail::all();
                    if ($records->isEmpty()) {
                        $new_serial_no = '000001';
                        $application_no = 'APP-' . $new_serial_no;
                    } else {
                        $last_record = ApplicationDetail::latest()->limit(1)->first();
                        $new_serial_no = str_pad((int)$last_record->serial_no + 1, 6, '0', STR_PAD_LEFT);
                        $application_no = 'APP-' . $new_serial_no;
                    }
                    $serial_no = explode('-', $application_no);

                    $application = ApplicationDetail::create([
                        'training_provider_id' => $trainingprovider->id,
                        'programme_id' => $programme->id,
                        'application_no' => $application_no,
                        'serial_no' => $serial_no[1],
                        'application_type' => 'institution_accreditation',
                        'status' => 'Pending',
                        'application_form_status' => 'Saved',
                        'application_date' => now(),
                        'submitted_through' => 'Portal',
                    ]);
                    $this->application_id = $application->id;
                });
            }
        }

        return redirect()->route('portal.application-payment', $this->application_id)
            ->withSuccess(
                'Programme Accreditation application has successfully been saved. You will now be redirected
                to the payment screen to complete your Payment.'
            );
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
        $application = ApplicationDetail::findOrFail($id)->load('trainingproviderprogramme');

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

        $application = ApplicationDetail::findOrFail($id)->load('trainingproviderprogramme');
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
        $accreditation = ApplicationDetail::findOrFail($id)->load('trainingproviderprogramme');

        if (Program::where(DB::raw('lower(name)'), 'like', '%' . strtolower($request->programme_title) . '%')
            ->exists()
        ) {
            $program_catalogue = Program::where(DB::raw('lower(name)'), 'like', '%' . strtolower($request->programme_title) . '%')
                ->first();
        } else {
            $program_catalogue = Program::create([
                'name' => $request->programme_title
            ]);
        }

        if (
            TrainingProviderProgramme::where('training_provider_id', $accreditation->training_provider_id)
            ->where('programme_id', $program_catalogue->id)
            ->where('level', $request->level)
            ->has('isAccredited')
            ->exists()
        ) {
            $request->flash();
            return back()
                ->withInfo(
                    'This programme has already been accredited for your institution!'
                );
        } else {
            DB::transaction(function () use ($departmentHeads, $request, $accreditation) {
                $programme_affiliation_proof = $request->programme_affiliation_proof != null ?
                    $request->programme_affiliation_proof
                    ->storeAs(
                        auth()->user()->username,
                        time() . '_' . $request->programme_affiliation_proof->getClientOriginalName()
                    )
                    : $accreditation->trainingproviderprogramme->programme_affiliation_proof;
                $programme_support_proof = $request->programme_support_proof != null ?
                    $request->programme_support_proof
                    ->storeAs(
                        auth()->user()->username,
                        time() . '_' . $request->programme_support_proof->getClientOriginalName()
                    )
                    : $accreditation->trainingproviderprogramme->programme_support_proof;
                $programme_structure = $request->programme_structure != null ?
                    $request->programme_structure
                    ->storeAs(
                        auth()->user()->username,
                        time() . '_' . $request->programme_structure->getClientOriginalName()
                    )
                    : $accreditation->trainingproviderprogramme->programme_structure;

                $accreditation->trainingproviderprogramme->update([
                    'programme_title' => $request->programme_title,
                    'level' => $request->level,
                    'mentoring_institution' => $request->mentoring_institution,
                    'mentoring_institution_address' => $request->mentoring_institution_address,
                    'programme_affiliation_proof' => $programme_affiliation_proof,
                    'programme_support_proof' => $programme_support_proof,
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
                    'programme_structure' => $programme_structure,
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
        }

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
