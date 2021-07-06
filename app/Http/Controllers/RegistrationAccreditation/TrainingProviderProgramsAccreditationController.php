<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreProgrammeAccreditationRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateProgrammeAccreditationRequest;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\AccreditedProgramme;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\ProgrammeAccreditationDetails;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderProgramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingProviderProgramsAccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accreditations = ApplicationDetail::with([
            'programmeDetail:id,programme_title,level,admission_requirements,studentship_duration,total_qualification_time,level_of_fees',
            'programmeAccreditations', 'trainingprovider'
        ])->where('application_category', 'programme_accreditation')
            ->where('applicant_type', 'training_provider')
            ->latest()
            ->get();

        return view('registrationaccreditation.accreditation.programmes.index', compact('accreditations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainingproviders = TrainingProvider::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('registrationaccreditation.accreditation.programmes.create', compact('trainingproviders', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgrammeAccreditationRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {
            // Store Programme details
            $programme = TrainingProviderProgramme::create([
                'training_provider_id' => $data['trainingprovider_id'],
                'programme_title' => $data['programme_title'],
                'level' => $data['level'],
                'studentship_duration' => $data['studentship_duration'],
                'total_qualification_time' => $data['total_qualification_time'],
                'level_of_fees' => $data['level_of_fees'],
                'admission_requirements' => $data['admission_requirements'],
                'is_accredited' => $data['status'] === 'accepted' ? 1 : 0,
            ]);

            // store training provider application details
            $application = ApplicationDetail::create([
                'training_provider_id' => $data['trainingprovider_id'],
                'programme_id' => $programme->id,
                'applicant_type' => 'training_provider',
                'application_no' => $data['application_no'],
                'application_category' => 'programme_accreditation',
                'application_type' => 'new',
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            // If application accepted, create a programme accreditation record
            if ($data['status'] === 'accepted') {
                ProgrammeAccreditationDetails::create([
                    'programme_id' => $programme->id,
                    'application_id' => $application->id,
                    'accreditation_start_date' => $data['accreditation_start_date'],
                    'accreditation_end_date' => $data['accreditation_end_date'],
                    'accreditation_status' => 'valid',
                ]);
            }
        });

        return redirect()->route('registration-accreditation.accreditation.programmes.index')
            ->withSuccess('Programme accreditation details Successfully added in the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accreditation = ApplicationDetail::findOrFail($id)
            ->load([
                'programmeDetail:id,programme_title,level,admission_requirements,studentship_duration,total_qualification_time,level_of_fees',
                'programmeAccreditations',
            ]);
        $trainingproviders = TrainingProvider::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('registrationaccreditation.accreditation.programmes.show', compact('accreditation', 'trainingproviders', 'levels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accreditation = ApplicationDetail::findOrFail($id)
            ->load([
                'programmeDetail:id,programme_title,level,admission_requirements,studentship_duration,total_qualification_time,level_of_fees',
                'programmeAccreditations',
            ]);
        $trainingproviders = TrainingProvider::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('registrationaccreditation.accreditation.programmes.edit', compact('accreditation', 'trainingproviders', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgrammeAccreditationRequest $request, $id)
    {
        $data = $request->validated();

        $accreditation = ApplicationDetail::findOrFail($id);

        DB::transaction(function () use ($data, $accreditation) {
            // Update training provider application details
            $accreditation->update([
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            $accreditation->programmeDetail->update([
                'trainingprovider_id' => $data['trainingprovider_id'],
                'programme_title' => $data['programme_title'],
                'level' => $data['level'],
                'studentship_duration' => $data['studentship_duration'],
                'total_qualification_time' => $data['total_qualification_time'],
                'level_of_fees' => $data['level_of_fees'],
                'admission_requirements' => $data['admission_requirements'],
            ]);

            if (!is_null($accreditation->programmeAccreditations)) {

                $accreditation->programmeAccreditations->update([
                    'accreditation_start_date' => $data['accreditation_start_date'],
                    'accreditation_end_date' => $data['accreditation_end_date'],
                ]);
            } else {
                if ($data['status'] === 'accepted') {
                    ProgrammeAccreditationDetails::create([
                        'application_id' => $accreditation->id,
                        'accreditation_start_date' => $data['accreditation_start_date'],
                        'accreditation_end_date' => $data['accreditation_end_date'],
                        'accreditation_status' => 'valid',
                    ]);
                }
            }
        });

        return back()->withSuccess('Programme accreditation details Successfully updated in the system');
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
