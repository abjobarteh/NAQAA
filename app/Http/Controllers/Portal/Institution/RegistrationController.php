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
use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use App\Models\Role;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use App\Notifications\AssessmentCertification\CertificateEndorsementRequestNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
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
        $checklists = TrainingProviderChecklist::all()->pluck('name', 'id');

        return view(
            'portal.institutions.registrations.create',
            compact(
                'regions',
                'districts',
                'townvillages',
                'classifications',
                'countries',
                'qualification_levels',
                'banks',
                'checklists'
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
        // dd($request->all());

        $boardMembers = $request->filled('boardmember_names') ?  $request->input('boardmember_names', []) : [];
        $bankSignatories = $request->filled('signatories_names') ?  $request->input('signatories_names', []) : [];

        if (
            TrainingProvider::where('login_id', auth()->user()->id)
            ->whereHas('validLicence')
            ->exists()
        ) {
            return back()
                ->withInfo('Registration not possible as you already have an Active Registration Licence');
        } else {
            dd('no valid licence');

            DB::transaction(function () use ($request, $boardMembers, $bankSignatories) {
                Storage::makeDirectory(auth()->user()->username);
                $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->first();
                // update training provider details
                $trainingprovider
                    ->update([
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
                        // 'bank_names' => $request->bank_names,
                        'storage_path' => '/storage/' . auth()->user()->username
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

                $uploadedFiles = $this->storeTrainingProviderFiles(collect($request->file()));

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
                    'application_no' => $application_no,
                    'serial_no' => $serial_no[1],
                    'application_type' => 'institution_registration',
                    'status' => 'Pending',
                    'application_form_status' => 'Saved',
                    'application_date' => now(),
                    'submitted_from' => 'Portal',
                    'checklists' => json_encode($uploadedFiles),
                ]);

                $this->application_id = $application->id;
            });
        }



        // $role = Role::where('slug', 'registration_and_accreditation_module')->get();
        // $message = "New Insttution registration application from " . auth()->user()->username;

        // $role[0]->notify(new CertificateEndorsementRequestNotification(
        //     $message
        // ));

        return redirect()->route('portal.application-payment', $this->application_id)
            ->withSuccess('Your Application for registration is successfully submitted');
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
        $banks = Bank::all()->pluck('name', 'id');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');

        $application = ApplicationDetail::findOrFail($id)->load('trainingprovider');

        return view(
            'portal.institutions.registrations.show',
            compact(
                'regions',
                'districts',
                'townvillages',
                'classifications',
                'countries',
                'qualification_levels',
                'application',
                'banks'
            )
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
        $application = ApplicationDetail::findOrFail($id)->load('trainingprovider');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name');
        $banks = Bank::all()->pluck('name', 'id');
        $qualification_levels = QualificationLevel::all()->pluck('name', 'id');
        $checklists = TrainingProviderChecklist::all()->pluck('name', 'id');

        // dd($application);

        return view(
            'portal.institutions.registrations.edit',
            compact(
                'application',
                'regions',
                'districts',
                'townvillages',
                'classifications',
                'countries',
                'qualification_levels',
                'checklists',
                'banks'
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
    public function update(Request $request, $id)
    {
        $boardMembers = $request->filled('boardmember_names') ?  $request->input('boardmember_names', []) : [];
        $bankSignatories = $request->filled('signatories_names') ?  $request->input('signatories_names', []) : [];
        $registration = ApplicationDetail::findOrFail($id)->load('trainingprovider');
        // dd(collect($request->file()));

        // check if application is approved
        if ($registration->status === 'Approved') {
            return back()->withWarning('You cannot edit this Application as it has already been Approved.');
        } else {
            // check if training provider has an active licence
            if (
                TrainingProvider::where('login_id', auth()->user()->id)
                ->whereHas('validLicence')
                ->exists()
            ) {
                return back()
                    ->withInfo('Registration not possible as you already have an Active Registration Licence');
            } else {
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
                    // update or create new board of members
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
            }
        }

        return back()->withSuccess('Your Application for registration is successfully updated');
    }


    protected function storeTrainingProviderFiles($files)
    {
        $checklists = [];

        foreach ($files as $key => $file) {
            $name = time() . '_' . $key;
            $path = $file->storeAs(auth()->user()->username, $name);
            $checklists[$key] = '/storage/' . $path;
        }

        return $checklists;
    }
}
