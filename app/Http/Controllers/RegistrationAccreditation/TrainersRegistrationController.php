<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreTrainerRegistrationRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateTrainerRegistrationRequest;
use App\Models\Country;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
use Illuminate\Support\Facades\DB;

class TrainersRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainer_regitrations = ApplicationDetail::with([
            'trainer:id,firstname,middlename,lastname,date_of_birth,gender,nationality,email,type',
            'registrationLicence'
        ])->where('application_category', 'registration')
            ->where('applicant_type', 'trainer')
            ->latest()
            ->get();

        return view('registrationaccreditation.registration.trainers.index', compact('trainer_regitrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('name');

        return view('registrationaccreditation.registration.trainers.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRegistrationRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {
            // store training provider details
            $trainer = Trainer::create([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'nationality' => $data['nationality'],
                'TIN' => $data['TIN'],
                'NIN' => $request->filled('NIN') && $data['nationality'] === 'Gambia' ? $data['NIN'] : null,
                'AIN' => $request->filled('AIN') && $data['nationality'] != 'Gambia' ? $data['AIN'] : null,
                'email' => $data['email'],
                'physical_address' => $data['physical_address'],
                'postal_address' => $data['postal_address'],
                'phone_home' => $data['phone_home'],
                'phone_mobile' => $data['phone_mobile'],
                'type' => $data['type'],
            ]);

            // store training provider application details
            $application = ApplicationDetail::create([
                'trainer_id' => $trainer->id,
                'applicant_type' => 'trainer',
                'application_no' => $data['application_no'],
                'application_category' => 'registration',
                'application_type' => 'new',
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            // If application is accepted, create a license record
            if ($data['status'] === 'accepted') {
                RegistrationLicenceDetail::create([
                    'trainer_id' => $trainer->id,
                    'application_id' => $application->id,
                    'licence_start_date' => $data['license_start_date'],
                    'licence_end_date' => $data['license_end_date'],
                    'license_status' => 'valid',
                ]);
            }
        });

        return redirect()->route('registration-accreditation.registration.trainers.index')
            ->withSuccess('Trainer registration details Successfully added in the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = ApplicationDetail::findOrFail($id)->load('trainer', 'registrationLicence');

        return view('registrationaccreditation.registration.trainers.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = ApplicationDetail::findOrFail($id);
        $countries = Country::all()->pluck('name');

        $registration->load(['registrationLicence', 'trainer']);

        return view('registrationaccreditation.registration.trainers.edit', compact('registration', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainerRegistrationRequest $request, $id)
    {
        $data = $request->validated();
        $registration = ApplicationDetail::findOrFail($id)->load('trainer', 'registrationLicence');

        DB::transaction(function () use ($data, $registration, $request) {

            $registration->trainer->update([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'nationality' => $data['nationality'],
                'TIN' => $data['TIN'],
                'NIN' => $request->filled('NIN') && $data['nationality'] === 'Gambia' ? $data['NIN'] : null,
                'AIN' => $request->filled('AIN') && $data['nationality'] != 'Gambia' ? $data['AIN'] : null,
                'email' => $data['email'],
                'physical_address' => $data['physical_address'],
                'postal_address' => $data['postal_address'],
                'phone_home' => $data['phone_home'],
                'phone_mobile' => $data['phone_mobile'],
                'type' => $data['type'],
            ]);

            $registration->update([
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            if ($data['status'] === 'accepted') {

                if (!is_null($registration->registrationLicence)) {

                    $registration->registrationLicence->update([
                        'licence_start_date' => $data['license_start_date'],
                        'licence_end_date' => $data['license_end_date'],
                        'license_status' => 'valid',
                    ]);
                } else {
                    RegistrationLicenceDetail::create([
                        'trainer_id' => $registration->trainer_id,
                        'application_id' => $registration->id,
                        'licence_start_date' => $data['license_start_date'],
                        'licence_end_date' => $data['license_end_date'],
                        'license_status' => 'valid',
                    ]);
                }
            } else {

                if (!is_null($registration->registrationLicence)) {

                    $registration->registrationLicence->delete();
                }
            }
        });

        return back()->withSuccess('Trainer registration details Successfully updated in the system');
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
