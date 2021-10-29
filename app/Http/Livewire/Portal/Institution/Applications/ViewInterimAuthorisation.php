<?php

namespace App\Http\Livewire\Portal\Institution\Applications;

use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\TownVillage;
use Livewire\Component;

class ViewInterimAuthorisation extends Component
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
            $this->funding_evidence[$key] = $value->evidence;
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

    public function render()
    {
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');

        return view(
            'livewire.portal.institution.applications.view-interim-authorisation',
            compact('regions', 'districts', 'townvillages')
        )
            ->extends('layouts.portal');
    }
}
