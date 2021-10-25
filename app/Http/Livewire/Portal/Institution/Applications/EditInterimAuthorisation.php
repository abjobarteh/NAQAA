<?php

namespace App\Http\Livewire\Portal\Institution\Applications;

use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\InstitutionPromoter;
use App\Models\RegistrationAccreditation\InterimAuthorisationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditInterimAuthorisation extends Component
{
    public $proposed_name, $address, $region_id, $district_id, $town_village_id, $vision, $mission, $organogramme,
        $objectives, $promoter_fullname, $promoter_dob, $promoter_occupation, $promoter_address, $promoter_passportcopy,
        $funding_name, $funding_evidence, $physical_structure_plan, $five_year_strategic_plan,
        $authorisation, $promoters, $funding_sources;

    public $promoter_inputs = [];
    public $funding_inputs = [];
    public $promoter_counter = 1;
    public $funding_counter = 1;

    public function mount($id)
    {
        $this->authorisation = ApplicationDetail::findOrFail($id)
            ->load('interimAuthorisation', 'interimAuthorisation.promoters');

        $this->fill([
            'proposed_name' => $this->authorisation->interimAuthorisation->proposed_name,
            'address' => $this->authorisation->interimAuthorisation->street,
            'region_id' => $this->authorisation->interimAuthorisation->region_id,
            'district_id' => $this->authorisation->interimAuthorisation->district_id,
            'town_village_id' => $this->authorisation->interimAuthorisation->town_village_id,
            'vision' => $this->authorisation->interimAuthorisation->vision,
            'mission' => $this->authorisation->interimAuthorisation->mission,
            'objectives' => $this->authorisation->interimAuthorisation->objectives,
            'funding_sources' => $this->authorisation->interimAuthorisation->sources_of_funding_details,
            'promoters' => $this->authorisation->interimAuthorisation->promoters,
        ]);
        foreach ($this->authorisation->interimAuthorisation->sources_of_funding_details as $key => $value) {
            $this->funding_name[$key] = $value->funding_name;
            array_push($this->funding_inputs, $key);
        }

        foreach ($this->authorisation->interimAuthorisation->promoters as $key => $value) {
            $this->promoter_fullname[$key] = $value->fullname;
            $this->promoter_dob[$key] = $value->date_of_birth;
            $this->promoter_occupation[$key] = $value->occupation;
            $this->promoter_address[$key] = $value->address;
            array_push($this->promoter_inputs, $key);
        }
    }

    public function addPromoter($counter)
    {
        $counter = $counter + 1;
        $this->promoter_counter = $counter;
        array_push($this->promoter_inputs, $counter);
        // dd($this->promoter_inputs);
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
            'livewire.portal.institution.applications.edit-interim-authorisation',
            compact('regions', 'districts', 'townvillages')
        )
            ->extends('layouts.portal');
    }

    public function updateApplication()
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
            'promoter_passportcopy.0' => 'nullablle|file|mimes:jpg,png,jpeg,pdf',
            'promoter_fullname.*' => 'required|string',
            'promoter_dob.*' => 'required|date',
            'promoter_occupation.*' => 'required|string',
            'promoter_address.*' => 'required|string',
            'promoter_passportcopy.*' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'funding_name.0' => 'required|string',
            'funding_evidence.0' => 'required|file|mimes:jpg,png,jpeg,pdf',
            'funding_name.*' => 'required|string',
            'funding_evidence.*' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
            'organogramme' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
            'physical_structure_plan' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
            'five_year_strategic_plan' => 'nullable|file|mimes:jpg,png,jpeg,pdf',
        ]);

        DB::transaction(function () {
            Storage::makeDirectory(auth()->user()->username);
            $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->get();
            $funding_details = null;

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
                    $funding_details = [
                        'funding_name' => $this->funding_name[$key],
                        'evidence' => $path,
                    ];
                } else {
                    $funding_details = [
                        'funding_name' => $this->funding_name[$key],
                        'evidence' => $this->funding_evidence[$key],
                    ];
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
        });

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'title' => 'Application Sent',
            'message' => 'Your Application for Letter of Interim Authorisation has Successfully been sent.'
        ]);

        return redirect(route('portal.institution.interim-authorisation'));
    }
}
