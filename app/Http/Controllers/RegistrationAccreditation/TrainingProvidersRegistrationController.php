<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreTrainingProviderRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateTrainingProviderRequest;
use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
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
            'registrationLicence'
        ])->where('application_category', 'registration')
            ->where('applicant_type', 'training_provider')
            ->latest()
            ->get();

        return view('registrationaccreditation.registration.trainingproviders.index', compact('registrations'));
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
        $categories = TrainingProviderClassification::all()->pluck('name', 'id');

        return view(
            'registrationaccreditation.registration.trainingproviders.create',
            compact('regions', 'districts', 'townvillages', 'categories')
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

        DB::transaction(function () use ($data) {
            // store training provider details
            $trainingprovider = TrainingProvider::create([
                'name' => $data['name'],
                'physical_address' => $data['physical_address'],
                'postal_address' => $data['postal_address'],
                'region_id' => $data['region_id'],
                'district_id' => $data['district_id'],
                'town_village_id' => $data['town_village_id'],
                'telephone_work' => $data['telephone_work'],
                'mobile_phone' => $data['mobile_phone'],
                'fax' => $data['fax'],
                'website' => $data['website'],
                'email' => $data['email'],
                'category_id' => $data['category_id'],
            ]);

            // store training provider application details
            $application = ApplicationDetail::create([
                'training_provider_id' => $trainingprovider->id,
                'applicant_type' => 'training_provider',
                'application_no' => $data['application_no'],
                'application_category' => 'registration',
                'application_type' => 'new',
                'status' => $data['status'],
                'application_date' => $data['application_date'],
            ]);

            // If application accepted, create a license record
            if ($data['status'] === 'accepted') {
                RegistrationLicenceDetail::create([
                    'training_provider_id' => $trainingprovider->id,
                    'application_id' => $application->id,
                    'licence_start_date' => $data['license_start_date'],
                    'licence_end_date' => $data['license_end_date'],
                    'license_status' => 'valid',
                ]);
            }
        });

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

        return view('registrationaccreditation.registration.trainingproviders.show', compact('registration'));
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
        $categories = TrainingProviderClassification::all()->pluck('name', 'id');

        return view(
            'registrationaccreditation.registration.trainingproviders.edit',
            compact('registration', 'regions', 'districts', 'townvillages', 'categories')
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
                'physical_address' => $data['physical_address'],
                'postal_address' => $data['postal_address'],
                'region_id' => $data['region_id'],
                'district_id' => $data['district_id'],
                'town_village_id' => $data['town_village_id'],
                'telephone_work' => $data['telephone_work'],
                'mobile_phone' => $data['mobile_phone'],
                'fax' => $data['fax'],
                'website' => $data['website'],
                'email' => $data['email'],
                'category_id' => $data['category_id'],
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
                        'training_provider_id' => $registration->training_provider_id,
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

        return back()->withSuccess('Training provider registration Successfully updated in the system');
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