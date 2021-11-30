<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreTrainingProviderRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateTrainingProviderRequest;
use App\Models\ApplicationStatus;
use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use App\Models\TrainingProviderCategory;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingProvidersRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = ApplicationDetail::with([
            'trainingprovider.district',
            'trainingprovider.classification',
            'registrationLicence'
        ])->where('application_type', 'institution_registration')
            ->latest()
            ->get();

        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');

        return view(
            'registrationAccreditation.registration.trainingproviders.index',
            compact('registrations', 'regions', 'districts', 'townvillages')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $categories = TrainingProviderCategory::all()->pluck('name', 'id');
        $ownerships = TrainingProviderOwnership::all()->pluck('name', 'id');
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
            'registrationAccreditation.registration.trainingproviders.create',
            compact(
                'regions',
                'districts',
                'townvillages',
                'classifications',
                'categories',
                'ownerships',
                'application_statuses',
                'application_no'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingProviderRequest $request)
    {
        $data = $request->validated();
        $serial_no = explode('-', $data['application_no']);

        // check if training provider exist in the database
        if (
            TrainingProvider::where(
                DB::raw('LOWER(name)'),
                'LIKE',
                '%' . strtolower($request->name) . '%'
            )->exists()
        ) {
            // check if institution has a valid licence
            if (
                TrainingProvider::where(
                    DB::raw('LOWER(name)'),
                    'LIKE',
                    '%' . strtolower($request->name) . '%'
                )
                ->whereHas('validLicence')
                ->exists()
            ) {
                return back()
                    ->withInfo('Registration not possible as Training Provider already has an Active Licence');
            } else {
                DB::transaction(function () use ($data, $request, $serial_no) {

                    // get training provider details
                    $trainingprovider = TrainingProvider::where(
                        DB::raw('LOWER(name)'),
                        'LIKE',
                        '%' . strtolower($request->name) . '%'
                    )
                        ->first();

                    // check if there is any currently ongoing or pending registration applications
                    $application = ApplicationDetail::where('training_provider_id', $trainingprovider->id)
                        ->where('application_type', 'institution_registration')
                        ->whereIn('status', ['Ongoing', 'Pending'])
                        ->exists();

                    if ($application) {
                        return back()
                            ->withWarning(
                                'Cannot Proceed with registration as this Institution already has a Pending or
                                Ongoing Application. Please Process that first!.'
                            );
                    } else {
                        // store training provider application details
                        $application = ApplicationDetail::create([
                            'training_provider_id' => $trainingprovider->id,
                            'applicant_type' => 'training_provider',
                            'application_no' => $data['application_no'],
                            'serial_no' => $serial_no[1],
                            'application_type' => 'institution_registration',
                            'status' => $data['status'],
                            'application_date' => $data['application_date'],
                        ]);

                        // If application is approved, create a license record
                        if ($data['status'] === 'Approved') {
                            RegistrationLicenceDetail::create([
                                'training_provider_id' => $trainingprovider->id,
                                'application_id' => $application->id,
                                'license_no' => $data['license_no'],
                                'licence_start_date' => $data['license_start_date'],
                                'licence_end_date' => $data['license_end_date'],
                                'license_status' => 'Approved',
                            ]);
                        }
                    }
                });
            }
        } else {
            DB::transaction(function () use ($data, $serial_no) {
                // store training provider details
                $trainingprovider = TrainingProvider::create([
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'po_box' => $data['po_box'],
                    'region_id' => $data['region_id'],
                    'district_id' => $data['district_id'],
                    'town_village_id' => $data['town_village_id'],
                    'telephone_work' => $data['telephone_work'] ?? $data['mobile_phone'],
                    'mobile_phone' => $data['mobile_phone'],
                    'fax' => $data['fax'],
                    'website' => $data['website'],
                    'email' => $data['email'],
                    'classification_id' => $data['classification_id'],
                    'category_id' => $data['category_id'],
                    'ownership_id' => $data['ownership_id'],
                    'is_registered' => $data['status'] === 'Approved' ? 1 : 0,
                    'manager' => $data['manager'],
                ]);

                // store training provider application details
                $application = ApplicationDetail::create([
                    'training_provider_id' => $trainingprovider->id,
                    'applicant_type' => 'training_provider',
                    'application_no' => $data['application_no'],
                    'serial_no' => $serial_no[1],
                    'application_type' => 'institution_registration',
                    'status' => $data['status'],
                    'application_date' => $data['application_date'],
                ]);

                // If application is approved, create a license record
                if ($data['status'] === 'Approved') {
                    RegistrationLicenceDetail::create([
                        'training_provider_id' => $trainingprovider->id,
                        'application_id' => $application->id,
                        'license_no' => $data['license_no'],
                        'licence_start_date' => $data['license_start_date'],
                        'licence_end_date' => $data['license_end_date'],
                        'license_status' => 'Approved',
                    ]);
                }
            });
        }



        return redirect()->route('registration-accreditation.registration.trainingproviders.index')
            ->withSuccess('Training provider registration Successfully added in the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = ApplicationDetail::findOrFail($id)->load('trainingprovider', 'registrationLicence');

        return view('registrationAccreditation.registration.trainingproviders.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = ApplicationDetail::findOrFail($id)->load('trainingprovider', 'registrationLicence');

        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $categories = TrainingProviderCategory::all()->pluck('name', 'id');
        $ownerships = TrainingProviderOwnership::all()->pluck('name', 'id');
        $application_statuses = ApplicationStatus::all()->pluck('name');

        return view(
            'registrationAccreditation.registration.trainingproviders.edit',
            compact(
                'registration',
                'regions',
                'districts',
                'townvillages',
                'categories',
                'classifications',
                'ownerships',
                'application_statuses'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingProviderRequest $request, $id)
    {
        $data = $request->validated();
        $registration = ApplicationDetail::findOrFail($id)->load('trainingprovider', 'registrationLicence');

        DB::transaction(function () use ($data, $registration) {

            $registration->trainingprovider->update([
                'name' => $data['name'],
                'address' => $data['address'],
                'po_box' => $data['po_box'],
                'region_id' => $data['region_id'],
                'district_id' => $data['district_id'],
                'town_village_id' => $data['town_village_id'],
                'telephone_work' => $data['telephone_work'],
                'mobile_phone' => $data['mobile_phone'],
                'fax' => $data['fax'],
                'website' => $data['website'],
                'email' => $data['email'],
                'classification_id' => $data['classification_id'],
                'category_id' => $data['category_id'],
                'ownership_id' => $data['ownership_id'],
                'manager' => $data['manager'],
            ]);

            $registration->update([
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            if ($data['status'] === 'Approved') {
                if (!is_null($registration->registrationLicence)) {

                    $registration->registrationLicence->update([
                        'licence_start_date' => $data['license_start_date'],
                        'licence_end_date' => $data['license_end_date'],
                        'license_status' => 'valid',
                    ]);
                } else {
                    RegistrationLicenceDetail::create([
                        'training_provider_id' => $registration->training_provider_id,
                        'application_id' => $registration->id,
                        'license_no' => $data['license_no'],
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

        return back()->withSuccess('Training provider registration Successfully updated in the system');
    }

    // public function filterTrainingProviders(Request $request)
    // {
    //     $trainingprovider = TrainingProvider::query();

    //     if ($request->filled('region')) {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('region_id', $request->input('region'));
    //     } else if ($request->filled('district')) {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('ditrict_id', $request->input('district'));
    //     } else if ($request->filled('town_village')) {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('town_village_id', $request->input('town_village'));
    //     } else if ($request->filled('region') && $request->filled('district') && !$request->filled('town_village')) {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('region_id', $request->input('region'))
    //             ->where('ditrict_id', $request->input('district'));
    //     } else if ($request->filled('region') && !$request->filled('district') && $request->filled('town_village')) {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('region_id', $request->input('region'))
    //             ->where('town_village_id', $request->input('town_village'));
    //     } else if (!$request->filled('region') && $request->filled('district') && $request->filled('town_village')) {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('ditrict_id', $request->input('district'))
    //             ->where('town_village_id', $request->input('town_village'));
    //     } else {
    //         $trainingprovider->whereHas('validLicence')
    //             ->where('region_id', $request->input('region'))
    //             ->where('ditrict_id', $request->input('district'))
    //             ->where('town_village_id', $request->input('town_village'));
    //     }

    //     if ($trainingprovider->get()->isEmpty()) {
    //         return json_encode(['status' => 404, 'message' => 'No Registered Training Providers exist under these parameters']);
    //     }

    //     $trainingprovider->with([
    //         'validLicence',
    //         'category',
    //         'classification',
    //         'region',
    //         'district',
    //         'townVillage'
    //     ]);

    //     return json_encode(['status' => 200, 'data' => $trainingprovider->get()]);
    // }
}
