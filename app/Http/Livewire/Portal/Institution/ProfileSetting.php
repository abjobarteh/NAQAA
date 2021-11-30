<?php

namespace App\Http\Livewire\Portal\Institution;

use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use Livewire\Component;

class ProfileSetting extends Component
{
    public $classification_id, $address, $po_box, $telephone_work, $mobile_phone, $fax, $email, $website,
        $region_id, $district_id, $town_village_id;
    public $training_provider;
    public $current_password, $new_password, $new_password_confirmation;
    public $is_success =  false, $message;

    protected $rules = [
        'classification_id' => 'required|integer',
        'address' => 'required|string',
        'po_box' => 'nullable|string',
        'telephone_work' => 'required|string',
        'mobile_phone' => 'required|string',
        'fax' => 'nullable|string',
        'email' => 'required|email',
        'website' => 'nullable|string',
        'region_id' => 'required|integer',
        'district_id' => 'required|integer',
        'town_village_id' => 'nullable|integer',
    ];

    public function mount()
    {
        $this->training_provider = TrainingProvider::where('login_id', auth()->user()->id)->first();

        $this->fill([
            'classification_id' => $this->training_provider->classification_id,
            'address' => $this->training_provider->address,
            'po_box' => $this->training_provider->po_box,
            'telephone_work' => $this->training_provider->telephone_work,
            'mobile_phone' => $this->training_provider->mobile_phone,
            'fax' => $this->training_provider->fax,
            'email' => $this->training_provider->email,
            'website' => $this->training_provider->website,
            'region_id' => $this->training_provider->region_id,
            'district_id' => $this->training_provider->district_id,
            'town_village_id' => $this->training_provider->town_village_id,
        ]);
    }

    public function render()
    {
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');

        return view(
            'livewire.portal.institution.profile-setting',
            compact(
                'regions',
                'districts',
                'townvillages',
                'classifications',
            )
        )
            ->extends('layouts.portal');
    }

    public function saveProfile()
    {
        $this->validate();

        $this->training_provider->update([
            'classification_id' => $this->classification_id,
            'address' => $this->address,
            'po_box' => $this->po_box,
            'telephone_work' => $this->telephone_work,
            'mobile_phone' => $this->mobile_phone,
            'fax' => $this->fax,
            'email' => $this->email,
            'website' => $this->website,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'town_village_id' => $this->town_village_id,
        ]);

        $this->is_success = true;
        $this->message = "Your Profile Details has successfully been updated";
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => "required|password",
            'new_password' => "required|confirmed",
        ]);

        $this->trainer->loginDetail->update([
            'password' => bcrypt($this->new_password)
        ]);

        $this->is_success = true;
        $this->message = "Your Password has successfully been updated";
    }
}
