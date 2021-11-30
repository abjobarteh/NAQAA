<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\ProgrammeAccreditationDetails;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerAccreditationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LicencesManagementController extends Controller
{
    // get registration licences
    public function registration()
    {
        // get all licences
        $all_licences = RegistrationLicenceDetail::with(['trainer', 'trainingprovider', 'application'])
            ->latest()->get();

        $valid_licences = RegistrationLicenceDetail::with(['trainer', 'trainingprovider', 'application'])
            ->where('license_status', 'Approved')->latest()->get();

        $expired_licences = RegistrationLicenceDetail::with(['trainer', 'trainingprovider', 'application'])
            ->where('license_status', 'Expired')->latest()->get();

        $revoked_licences = RegistrationLicenceDetail::with(['trainer', 'trainingprovider', 'application'])
            ->where('license_status', 'Revoked')->latest()->get();

        return view('registrationAccreditation.licences.registration', compact('all_licences', 'valid_licences', 'expired_licences', 'revoked_licences'));
    }

    // get accreditation licences
    public function accreditation()
    {
        $traineraccreditations = TrainerAccreditationDetail::with('application.trainer')
            ->get()->groupBy('application_id');

        $programaccreditations = ProgrammeAccreditationDetails::with('application.trainingprovider')
            ->get()->groupBy('application_id');
        // dd($traineraccreditations);

        // $traineraccreditations->map(function ($item, $key) {
        //     dump($key . ': ' . $item[0]->area . '=>' . $item[0]->level);
        // });
        return view('registrationAccreditation.licences.accreditation', compact('traineraccreditations', 'programaccreditations'));
    }

    // revoked or continue licence of trainingprovider/trainer
    public function updateLicenceStatus(Request $request)
    {
        $licence = RegistrationLicenceDetail::findOrFail($request->id);

        if ($request->status === 'revoke') {
            $licence->update([
                'license_status' => 'Revoked'
            ]);
        } else {
            $licence->update([
                'license_status' => 'Approved'
            ]);
        }

        return json_encode(['status' => 200]);
    }

    public function licenceRenewal($id)
    {
        $licence = RegistrationLicenceDetail::findOrFail($id)->load('trainingprovider', 'trainer');
        $trainingprovider = null;
        $trainer = null;
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $categories = TrainingProviderClassification::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name');

        if (!is_null($licence->training_provider_id)) {
            $trainingprovider = TrainingProvider::findOrFail($licence->training_provider_id);
        } else if (!is_null($licence->trainer_id)) {
            $trainer = Trainer::findOrFail($licence->trainer_id);
        }

        return view(
            'registrationaccreditation.licences.renew',
            compact('trainingprovider', 'trainer', 'regions', 'districts', 'townvillages', 'categories', 'countries')
        );
    }

    public function renewLicence(Request $request)
    {
        $data = null;

        if ($request->filled('training_provider_id')) {
            $validLicence = RegistrationLicenceDetail::where('id', $request->training_provider_id)
                ->where('license_status', 'Approved')->first();

            if (!$validLicence) {
                $data = $request->validate([
                    'name' => ['required', 'string'],
                    'category_id' => ['required', 'numeric'],
                    'physical_address' => ['required', 'string'],
                    'postal_address' => ['nullable', 'string'],
                    'telephone_work' => ['required', 'string'],
                    'mobile_phone' => ['required', 'string'],
                    'fax' => ['nullable', 'string'],
                    'email' => ['required', 'string'],
                    'website' => ['nullable', 'string'],
                    'region_id' => ['required', 'numeric'],
                    'district_id' => ['required', 'numeric'],
                    'town_village_id' => ['nullable', 'string'],
                    'application_no' => ['required', 'string'],
                    'application_date' => ['required', 'date'],
                    'status' => ['required', 'string', 'in:accepted,rejected,pending'],
                    'license_start_date' => ['required_if:status,accepted', 'date'],
                    'license_end_date' => ['required_if:status,accepted', 'date'],
                ]);

                $this->newTrainingProviderRegistrationLicence($request->training_provider_id, $data);
            } else {
                return back()->withWarning('This training provider already has a valid registration licence');
            }

            return redirect()->route('registration-accreditation.licence.registrations')
                ->withSuccess('New Training provider Licence details Successfully added in the system');
        } else if ($request->filled('trainer_id')) {

            $validLicence = RegistrationLicenceDetail::where('id', $request->trainer_id)
                ->where('license_status', 'Approved')->first();
            if (!$validLicence) {
                $data = $request->validate([
                    'firstname' => ['required', 'string'],
                    'middlename' => ['nullable', 'string'],
                    'lastname' => ['required', 'string'],
                    'date_of_birth' => ['required', 'date'],
                    'gender' => ['required', 'string', 'in:male,female'],
                    'nationality' => ['required', 'string'],
                    'TIN' => ['required', 'string'],
                    'NIN' => ['nullable', 'string'],
                    'AIN' => ['nullable', 'string'],
                    'email' => ['required', 'email'],
                    'physical_address' => ['required', 'string'],
                    'postal_address' => ['required', 'string'],
                    'phone_home' => ['required', 'string'],
                    'phone_mobile' => ['required', 'string'],
                    'type' => ['required', 'string'],
                    'application_no' => ['required', 'string'],
                    'application_date' => ['required', 'date'],
                    'status' => ['required', 'string', 'in:accepted,rejected,pending'],
                    'license_start_date' => ['required_if:status,accepted', 'date'],
                    'license_end_date' => ['required_if:status,accepted', 'date'],
                ]);

                $this->newTrainerRegistrationLicence($request->trainer_id, $data);
            } else {
                return back()->withWarning('This trainer already has a valid registration licence');
            }

            return redirect()->route('registration-accreditation.licence.registrations')
                ->withSuccess('New Trainer Licence details Successfully added in the system');
        }
    }

    // create new training provide registration licence
    private function newTrainingProviderRegistrationLicence($id, $data)
    {
        $trainingprovider = TrainingProvider::findOrFail($id);

        DB::transaction(function () use ($trainingprovider, $data) {
            $trainingprovider->update([
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
                'application_type' => 'renewal',
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

        return;
    }

    // create new trainer registration licence
    private function newTrainerRegistrationLicence($id, $data)
    {
        $trainer = Trainer::findOrFail($id);

        DB::transaction(function () use ($trainer, $data) {
            $trainer->update([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'nationality' => $data['nationality'],
                'TIN' => $data['TIN'],
                'NIN' => $data('NIN') != null && $data['nationality'] === 'Gambia' ? $data['NIN'] : null,
                'AIN' => $data('AIN') != null && $data['nationality'] != 'Gambia' ? $data['AIN'] : null,
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
                'application_type' => 'renewal',
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

        return;
    }
}
