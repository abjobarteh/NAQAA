<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portal\StoreTrainingProviderRegistrationRequest;
use App\Models\Bank;
use App\Models\Country;
use App\Models\District;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\BankSignatory;
use App\Models\RegistrationAccreditation\BoardOfDirector;
use App\Models\RegistrationAccreditation\CenterManager;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
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
        })->where('application_type', 'institution_registration')
            ->latest()->get();

        return view('portal.institutions.registrations.index', compact('applications'));
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
        $countries = Country::all()->pluck('name');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');
        $banks = Bank::all()->pluck('name', 'id');

        return view(
            'portal.institutions.registrations.create',
            compact(
                'regions',
                'districts',
                'townvillages',
                'classifications',
                'countries',
                'qualification_levels',
                'banks'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(collect($request->file()));
        $boardMembers = $request->filled('boardmember_names') ?  $request->input('boardmember_names', []) : [];
        $bankSignatories = $request->filled('signatories_names') ?  $request->input('signatories_names', []) : [];
        DB::transaction(function () use ($request, $boardMembers, $bankSignatories) {
            $directory = 'uploads/' . $request->name . '/';
            $storagePath = Storage::makeDirectory($directory);
            // store training provider details
            $trainingprovider = TrainingProvider::create([
                'name' => $request->name,
                'address' => $request->address,
                'po_box' => $request->po_box,
                'region_id' => $request->region_id,
                'district_id' => $request->district_id,
                'town_village_id' => $request->town_village_id,
                'telephone_work' => $request->telephone_work,
                'mobile_phone' => $request->mobile_phone,
                'fax' => $request->fax,
                'website' => $request->website,
                'email' => $request->email,
                'classification_id' => $request->classification_id,
                'login_id' => auth()->user()->id,
                'bank_names' => $request->bank_names,
                'storage_path' => $directory
            ]);

            CenterManager::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'relevant_experience' => $request->relevant_experience,
                'qualifications' => $request->qualifications,
                'training_provider_id' => $trainingprovider->id,
            ]);

            for ($signatory = 0; $signatory < count($bankSignatories); $signatory++) {
                if ($bankSignatories[$signatory] != '') {

                    BankSignatory::create([
                        'training_provider_id' => $trainingprovider->id,
                        'Fullname' => $bankSignatories[$signatory],
                        'position' => $request->signatories_postitions[$signatory],
                        'signature' => $request->signatories_signature[$signatory],
                    ]);
                }
            }

            for ($boardmemeber = 0; $boardmemeber < count($boardMembers); $boardmemeber++) {
                if ($boardMembers[$boardmemeber] != '') {

                    BoardOfDirector::create([
                        'training_provider_id' => $trainingprovider->id,
                        'fullname' => $boardMembers[$boardmemeber],
                        'nationality' => $request->boardmember_nationalities[$boardmemeber],
                        'work_experience' => $request->boardmember_experience[$boardmemeber],
                        'position' => $request->boardmember_positions[$boardmemeber],
                    ]);
                }
            }
            // dd($directory);
            $uploadedFiles = $this->storeTrainingProviderFiles(collect($request->file()), $directory);

            // store training provider application details
            ApplicationDetail::create([
                'training_provider_id' => $trainingprovider->id,
                'applicant_type' => 'training_provider',
                'application_no' => 'auto-generated',
                'application_category' => 'registration',
                'application_type' => 'new',
                'status' => 'pending',
                'application_form_status' => 'submitted',
                'application_date' => now(),
                'submitted_through' => 'portal',
                'application_checklists' => json_encode($uploadedFiles),
            ]);
        });

        return redirect()->route('portal.institution.registration.index')
            ->withSuccess('Your Application for registration is successfullu submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');

        $application = ApplicationDetail::findOrFail($id)->load('trainingprovider');

        return view(
            'portal.institutions.registrations.show',
            compact('regions', 'districts', 'townvillages', 'classifications', 'countries', 'qualification_levels', 'application')
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
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');

        $application = ApplicationDetail::findOrFail($id)->load('trainingprovider');

        return view(
            'portal.institutions.registrations.edit',
            compact('regions', 'districts', 'townvillages', 'classifications', 'countries', 'qualification_levels', 'application')
        );
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
        $boardMembers = $request->filled('boardmember_names') ?  $request->input('boardmember_names', []) : [];
        $bankSignatories = $request->filled('signatories_names') ?  $request->input('signatories_names', []) : [];
        $registration = ApplicationDetail::findOrFail($id)->load('trainingprovider');

        DB::transaction(function () use ($request, $registration, $boardMembers, $bankSignatories) {
            $registration->trainingprovider->update([
                'name' => $request->name,
                'address' => $request->address,
                'po_box' => $request->po_box,
                'region_id' => $request->region_id,
                'district_id' => $request->district_id,
                'town_village_id' => $request->town_village_id,
                'telephone_work' => $request->telephone_work,
                'mobile_phone' => $request->mobile_phone,
                'fax' => $request->fax,
                'website' => $request->website,
                'email' => $request->email,
                'classification_id' => $request->classification_id,
                'login_id' => auth()->user()->id,
                'bank_names' => $request->bank_names,
            ]);

            $registration->trainingprovider->centerManager->update([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'relevant_experience' => $request->relevant_experience,
                'qualifications' => $request->qualifications,
            ]);

            $registration->trainingprovider->centerManager->update([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
                'relevant_experience' => $request->relevant_experience,
                'qualifications' => $request->qualifications,
            ]);

            // Update or create new Bank signatory
            for ($signatory = 0; $signatory < count($bankSignatories); $signatory++) {
                if ($bankSignatories[$signatory] != '') {

                    if ($request->signatory_ids[$signatory] != null || $request->signatory_ids[$signatory] != '') {
                        $currentSignatory = BankSignatory::findOrFail($request->signatory_ids[$signatory]);

                        $currentSignatory->update([
                            'Fullname' => $bankSignatories[$signatory],
                            'position' => $request->signatories_postitions[$signatory],
                            'signature' => $request->signatories_signature[$signatory],
                        ]);
                    } else {
                        BankSignatory::create([
                            'training_provider_id' => $registration->training_provider_id,
                            'Fullname' => $bankSignatories[$signatory],
                            'position' => $request->signatories_postitions[$signatory],
                            'signature' => $request->signatories_signature[$signatory],
                        ]);
                    }
                }
            }
            // update or create new baord of members
            for ($boardmemeber = 0; $boardmemeber < count($boardMembers); $boardmemeber++) {
                if ($boardMembers[$boardmemeber] != '') {
                    if ($request->director_ids[$boardmemeber] != null || $request->director_ids[$boardmemeber] != '') {
                        $currentDirector = BankSignatory::findOrFail($request->director_ids[$boardmemeber]);

                        $currentDirector->update([
                            'fullname' => $boardMembers[$boardmemeber],
                            'nationality' => $request->boardmember_nationalities[$boardmemeber],
                            'work_experience' => $request->boardmember_experience[$boardmemeber],
                            'position' => $request->boardmember_positions[$boardmemeber],
                        ]);
                    } else {
                        BoardOfDirector::create([
                            'training_provider_id' => $registration->training_provider_id,
                            'fullname' => $boardMembers[$boardmemeber],
                            'nationality' => $request->boardmember_nationalities[$boardmemeber],
                            'work_experience' => $request->boardmember_experience[$boardmemeber],
                            'position' => $request->boardmember_positions[$boardmemeber],
                        ]);
                    }
                }
            }
        });
        return back()->withSuccess('Your Application for registration is successfully updated');
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

    protected function storeTrainingProviderFiles($files, $directory)
    {
        // $checklists = [];
        $checklists = $files->map(function ($file, $key) use ($directory) {
            $name = time() . '_' . $file->getClientOriginalName();
            // $filename = "{$key}" . now()  . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/' . $directory, $name, 'public');
            // Storage::putFileAs($storagepath, $file, $filename);
        });

        return $checklists;
    }
}
