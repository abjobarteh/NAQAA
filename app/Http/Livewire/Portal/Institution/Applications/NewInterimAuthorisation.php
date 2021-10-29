<?php

namespace App\Http\Livewire\Portal\Institution\Applications;

use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\InstitutionPromoter;
use App\Models\RegistrationAccreditation\InterimAuthorisationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\Role;
use App\Models\TownVillage;
use App\Notifications\AssessmentCertification\CertificateEndorsementRequestNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewInterimAuthorisation extends Component
{
    use WithFileUploads;

    public $proposed_name, $address, $region_id, $district_id, $town_village_id, $vision, $mission, $organogramme,
        $objectives, $promoter_fullname, $promoter_dob, $promoter_occupation, $promoter_address, $promoter_passportcopy,
        $funding_name, $funding_evidence, $physical_structure_plan, $five_year_strategic_plan, $application_id;

    public $promoter_inputs = [];
    public $funding_inputs = [];
    public $promoter_counter = 1;
    public $funding_counter = 1;

    public function addPromoter($counter)
    {
        $counter = $counter + 1;
        $this->promoter_counter = $counter;
        array_push($this->promoter_inputs, $counter);
    }

    public function removePromoter($counter)
    {
        unset($this->promoter_inputs[$counter]);
    }

    public function addFundingSource($counter)
    {
        $counter = $counter + 1;
        $this->funding_counter = $counter;
        array_push($this->funding_inputs, $counter);
    }

    public function removeFundingSource($counter)
    {
        unset($this->funding_inputs[$counter]);
    }

    public function render()
    {
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');

        return view(
            'livewire.portal.institution.applications.new-interim-authorisation',
            compact('regions', 'districts', 'townvillages')
        )
            ->extends('layouts.portal');
    }

    public function submitApplication()
    {

        $validatedData = $this->validate([
            'proposed_name' => 'required|string',
            'address' => 'required|string',
            'region_id' => 'required|integer',
            'district_id' => 'required|integer',
            'town_village_id' => 'nullable|integer',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'objectives' => 'required|string',
            'promoter_fullname.0' => 'required|string',
            'promoter_dob.0' => 'required|date',
            'promoter_occupation.0' => 'required|string',
            'promoter_address.0' => 'required|string',
            'promoter_passportcopy.0' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'promoter_fullname.*' => 'required|string',
            'promoter_dob.*' => 'required|date',
            'promoter_occupation.*' => 'required|string',
            'promoter_address.*' => 'required|string',
            'promoter_passportcopy.*' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'funding_name.0' => 'required|string',
            'funding_evidence.0' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'funding_name.*' => 'required|string',
            'funding_evidence.*' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'organogramme' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'physical_structure_plan' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'five_year_strategic_plan' => 'required|file|mimes:jpg,png,jpeg,pdf',
        ]);

        $application = null;


        DB::transaction(function () use ($application) {
            Storage::makeDirectory(auth()->user()->username);
            $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->first();
            $funding_details = [];
            $application_no = null;

            // check if there is already an interim authorisation application approved for this institution

            if (
                ApplicationDetail::where('training_provider_id', $trainingprovider->id)
                ->where('application_type', 'institution_letter_of_interim_authorisation')
                ->where('status', 'Approved')
                ->exists()
            ) {
                alert(
                    'Duplicate Application',
                    'Your Application for Letter of Interim Authorisation cannot proceed
                     as you already have an Approved Application for Letter of Interim Authorisation.',
                    'warning'
                );

                return redirect(route('portal.institution.interim-authorisation'));
            } else {
                // check if institution has a Pending or Ongoing Application
                if (
                    ApplicationDetail::where('training_provider_id', $trainingprovider->id)
                    ->where('application_type', 'institution_letter_of_interim_authorisation')
                    ->whereIn('status', ['Pending', 'Ongoing'])
                    ->exists()
                ) {
                    alert(
                        'Pending Or Ongoing Application',
                        'Your Application for Letter of Interim Authorisation cannot proceed
                         as you already have a Pending ot Ongoing Application for Letter of Interim Authorisation.',
                        'warning'
                    );

                    return redirect(route('portal.institution.interim-authorisation'));
                } else {
                    // generate new serial no
                    $records = ApplicationDetail::all();
                    if ($records->isEmpty()) {
                        $new_serial_no = '000001';
                        $application_no = 'APP-' . $new_serial_no;
                    } else {
                        $last_record = ApplicationDetail::latest()->limit(1)->first();
                        $new_serial_no = str_pad((int)$last_record->serial_no + 1, 6, '0', STR_PAD_LEFT);
                        $application_no = 'APP-' . $new_serial_no;
                    }

                    $application = ApplicationDetail::create([
                        'training_provider_id' => $trainingprovider->id,
                        'application_type' => 'institution_letter_of_interim_authorisation',
                        'application_no' => $application_no,
                        'serial_no' => $new_serial_no,
                        'status' => 'Pending',
                        'application_form_status' => 'Saved',
                        'submitted_from' => 'Portal',
                    ]);

                    foreach ($this->funding_name as $key => $value) {
                        if (!is_null($this->funding_evidence[$key])) {
                            $path = $this->funding_evidence[$key]->store(auth()->user()->username);
                            array_push($funding_details, [
                                'funding_name' => $this->funding_name[$key],
                                'evidence' => $path,
                            ]);
                        } else {
                            array_push($funding_details, [
                                'funding_name' => $this->funding_name[$key],
                                'evidence' => $this->funding_evidence[$key],
                            ]);
                        }
                    }

                    $physical_plan = $this->physical_structure_plan->store(auth()->user()->username);
                    $five_year_plan = $this->five_year_strategic_plan->store(auth()->user()->username);
                    $organogramme = $this->organogramme->store(auth()->user()->username);

                    $interim_authorisation = InterimAuthorisationDetail::create([
                        'training_provider_id' => $trainingprovider->id,
                        'application_id' => $application->id,
                        'proposed_name' => $this->proposed_name,
                        'street' => $this->address,
                        'region_id' => $this->region_id,
                        'district_id' => $this->district_id,
                        'town_village_id' => $this->town_village_id,
                        'mission' => $this->mission,
                        'vision' => $this->vision,
                        'organogramme' => '/storage/' . $organogramme,
                        'objectives' => $this->objectives,
                        'sources_of_funding_details' => $funding_details,
                        'physical_structure_plan' => '/storage/' . $physical_plan,
                        'five_year_strategic_plan' => '/storage/' . $five_year_plan,
                    ]);

                    foreach ($this->promoter_fullname as $key => $value) {
                        $passportcopy = $this->promoter_passportcopy[$key]->store(auth()->user()->username);
                        InstitutionPromoter::create([
                            'interim_authorisation_id' => $interim_authorisation->id,
                            'fullname' => $this->promoter_fullname[$key],
                            'date_of_birth' => $this->promoter_dob[$key],
                            'occupation' => $this->promoter_occupation[$key],
                            'address' => $this->promoter_address[$key],
                            'passport_copy' => '/storage/' . $passportcopy,
                        ]);
                    }

                    $this->application_id = $application->id;
                }
            }
        });

        alert(
            'Success',
            'Your Application for Letter of Interim Authorisation has Successfully been saved.
             You will now be redirected to the payments page to complete the payment and submit your Application',
            'success'
        );


        return redirect(route('portal.application-payment', $this->application_id));
    }

    public function saveInterimAuthorisation()
    {
        DB::transaction(function () {
            $directory = Storage::makeDirectory(auth()->user()->username);
            $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->get();
            $funding_details = [];

            $application = ApplicationDetail::create([
                'training_provider_id' => $trainingprovider[0]->id,
                'application_type' => 'institution_letter_of_interim_authorisation',
                'status' => 'Pending',
                'application_form_status' => 'Saved',
                'submitted_through' => 'Portal',
            ]);

            foreach ($this->funding_name as $key => $value) {
                if (!is_null($this->funding_evidence[$key])) {
                    $path = $this->funding_evidence[$key]->store(auth()->user()->username);
                    array_push($funding_details, [
                        'funding_name' => $this->funding_name[$key],
                        'evidence' => $path,
                    ]);
                } else {
                    array_push($funding_details, [
                        'funding_name' => $this->funding_name[$key],
                        'evidence' => $this->funding_evidence[$key],
                    ]);
                }
            }

            $physical_plan = $this->physical_structure_plan->store(auth()->user()->username);
            $five_year_plan = $this->five_year_strategic_plan->store(auth()->user()->username);
            $organogramme = $this->organogramme->store(auth()->user()->username);

            $interim_authorisation = InterimAuthorisationDetail::create([
                'training_provider_id' => $trainingprovider[0]->id,
                'application_id' => $application->id,
                'proposed_name' => $this->proposed_name,
                'street' => $this->address,
                'region_id' => $this->region_id,
                'district_id' => $this->district_id,
                'town_village_id' => $this->town_village_id,
                'mission' => $this->mission,
                'vision' => $this->vision,
                'organogramme' => $organogramme,
                'objectives' => $this->objectives,
                'sources_of_funding_details' => $funding_details,
                'physical_structure_plan' => $physical_plan,
                'five_year_strategic_plan' => $five_year_plan,
            ]);

            foreach ($this->promoter_fullname as $key => $value) {
                $passportcopy = $this->promoter_passportcopy[$key]->store(auth()->user()->username);
                InstitutionPromoter::create([
                    'interim_authorisation_id' => $interim_authorisation->id,
                    'fullname' => $this->promoter_fullname[$key],
                    'date_of_birth' => $this->promoter_dob[$key],
                    'occupation' => $this->promoter_occupation[$key],
                    'address' => $this->promoter_address[$key],
                    'passport_copy' => $passportcopy,
                ]);
            }
        });

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'title' => 'Application Saved',
            'message' => 'Your Application for Letter of Interim Authorisation has Successfully been Saved.'
        ]);

        return redirect(route('portal.institution.interim-authorisation'));
    }
}
