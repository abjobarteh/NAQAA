<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreProgrammeAccreditationRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateProgrammeAccreditationRequest;
use App\Models\ApplicationStatus;
use App\Models\Program;
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
            'programmeAccreditations', 'trainingprovider', 'programmeAccreditations.programme',
            'programmeAccreditations.programme.programme'
        ])->where('application_type', 'institution_accreditation')
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
        $application_statuses = ApplicationStatus::all()->pluck('name');
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

        return view(
            'registrationaccreditation.accreditation.programmes.create',
            compact('trainingproviders', 'levels', 'application_statuses', 'application_no')
        );
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
        $serial_no = explode('-', $data['application_no']);

        DB::transaction(function () use ($data, $serial_no) {
            if (Program::where('name', 'like', '%' . $data['programme_title'] . '%')->exists()) {
                $program_catalogue = Program::where('name', 'like', '%' . $data['programme_title'] . '%')->pluck('name', 'id');
            } else {
                $program_catalogue = Program::create([
                    'name' => $data['programme_title']
                ]);
            }
            // Store Programme details
            $programme = TrainingProviderProgramme::create([
                'training_provider_id' => $data['trainingprovider_id'],
                'programme_id' => $program_catalogue->id,
                'level' => $data['level'],
                'studentship_duration' => $data['studentship_duration'],
                'total_qualification_time' => $data['total_qualification_time'],
                'level_of_fees' => $data['level_of_fees'],
                'admission_requirements' => $data['admission_requirements'],
                'is_accredited' => $data['status'] === 'Approved' ? 1 : 0,
            ]);

            // store training provider application details
            $application = ApplicationDetail::create([
                'training_provider_id' => $data['trainingprovider_id'],
                'applicant_type' => 'training_provider',
                'application_no' => $data['application_no'],
                'serial_no' => $serial_no[1],
                'application_type' => 'institution_accreditation',
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            // If application approved, create a programme accreditation record
            if ($data['status'] === 'Approved') {
                ProgrammeAccreditationDetails::create([
                    'programme_id' => $programme->id,
                    'application_id' => $application->id,
                    'accreditation_start_date' => $data['accreditation_start_date'],
                    'accreditation_end_date' => $data['accreditation_end_date'],
                    'accreditation_status' => 'Approved',
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
                'programmeAccreditations',
                'programmeAccreditations.programme',
                'programmeAccreditations.programme.programme'
            ]);
        $trainingproviders = TrainingProvider::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $application_statuses = ApplicationStatus::all()->pluck('name');

        return view(
            'registrationaccreditation.accreditation.programmes.show',
            compact('accreditation', 'trainingproviders', 'levels', 'application_statuses')
        );
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
                'programmeAccreditations',
                'programmeAccreditations.programme',
                'programmeAccreditations.programme.programme'
            ]);
        $trainingproviders = TrainingProvider::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $application_statuses = ApplicationStatus::all()->pluck('name');

        return view(
            'registrationaccreditation.accreditation.programmes.edit',
            compact('accreditation', 'trainingproviders', 'levels', 'application_statuses')
        );
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

        $accreditation = ApplicationDetail::findOrFail($id)->load([
            'programmeAccreditations',
            'programmeAccreditations.programme',
            'programmeAccreditations.programme.programme'
        ]);;

        DB::transaction(function () use ($data, $accreditation) {

            if (Program::where('name', 'like', '%' . $data['programme_title'] . '%')->exists()) {
                $program_catalogue = Program::where('name', 'like', '%' . $data['programme_title'] . '%')->pluck('name', 'id');
            } else {
                $program_catalogue = Program::create([
                    'name' => $data['programme_title']
                ]);
            }
            // Update training provider application details
            $accreditation->update([
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            $accreditation->programmeAccreditations->programme->update([
                'trainingprovider_id' => $data['trainingprovider_id'],
                'programme_id' => $program_catalogue->id,
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
                if ($data['status'] === 'Approved') {
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
