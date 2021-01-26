<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class AddSubdivision extends Component
{
    public $subdivisionName, $subdivisionType, $regions, $districts, $region, $district;
    public systemadmin $systemadminModel;
    public $isCreatingDistrict = false;
    public $iscreatingTownsVillages = false;
    public $isEdit = false;
    public $subdivisionId;

    protected $listeners = ['editSubdivision','clearForm'];

    public function mount()
    {
        $this->systemadminModel = new systemadmin();
    }


    public function createSubdivision()
    {
        if($this->subdivisionType == 'regions'){
            $data = $this->validate(
                [
                    'subdivisionName' => 'required|string',
                    'subdivisionType' => 'required'
                ],
                [
                    'subdivisionName.required' => 'The :attribute cannot be empty.',
                    'subdivisionName.string' => 'The :attribute format is not valid.',
                    'subdivisionType.required' => 'Please select a :attribute to create.',
                ],
                ['subdivisionName' => 'subdivision Name'],
                ['subdivisionType' => 'subdivision Type']
            );
        }
        else if($this->subdivisionType == 'districts'){
            $data = $this->validate(
                [
                    'subdivisionName' => 'required|string',
                    'subdivisionType' => 'required',
                    'region' => 'required'
                ],
                [
                    'subdivisionName.required' => 'The :attribute cannot be empty.',
                    'subdivisionName.string' => 'The :attribute format is not valid.',
                    'subdivisionType.required' => 'Please select a :attribute to create.',
                    'region.required' => 'Please select a :attribute.',
                ],
                ['subdivisionName' => 'subdivision Name'],
                ['region' => 'Region']
            );
        }
        else{
            $data = $this->validate(
                [
                    'subdivisionName' => 'required|string',
                    'subdivisionType' => 'required',
                    'district' => 'required'
                ],
                [
                    'subdivisionName.required' => 'The :attribute cannot be empty.',
                    'subdivisionName.string' => 'The :attribute format is not valid.',
                    'subdivisionType.required' => 'Please select a :attribute to create.',
                    'district.required' => 'Please select a :attribute.',
                ],
                ['subdivisionName' => 'subdivision Name'],
                ['district' => 'District']
            );
        }

        if($this->isEdit == false){
            $this->systemadminModel->createSubdivisionByType($data);
            $this->dispatchBrowserEvent('subdivision-added', ['subvisionName' => $this->subdivisionName,'action' => 'create']);
        }
        else{
            $this->systemadminModel->updateSubdivisionByType($this->subdivisionId,$data);
            $this->dispatchBrowserEvent('subdivision-added', ['subvisionName' => $this->subdivisionName,'action' => 'update']);
        }
        $this->reset(['subdivisionName','subdivisionType','regions','districts','region','district','isCreatingDistrict','iscreatingTownsVillages','isEdit','subdivisionId']);
    }

    public function updatedSubdivisionType(){
        if($this->subdivisionType == 'districts'){
            $this->isCreatingDistrict = true;
            $this->iscreatingTownsVillages = false; 
        }
        if($this->subdivisionType == 'towns_villages') {

            $this->iscreatingTownsVillages = true;
            $this->isCreatingDistrict = false;  
        }
    }

    public function editSubdivision($type,$data)
    {
        $this->isEdit = true; 
        $details = json_decode($data);
        $this->subdivisionId = $details->id;

        if($type == 'regions'){
            $this->subdivisionName = $details->region_name;
            $this->subdivisionType = $type;
        }
        else if($type == 'districts'){
            $this->subdivisionName = $details->district_name;
            $this->subdivisionType = $type;
            $this->isCreatingDistrict = true;
            $this->iscreatingTownsVillages = false;
            $this->region = $details->region_id;
        }
        else{
            $this->subdivisionName = $details->town_or_village_name;
            $this->subdivisionType = $type;
            $this->iscreatingTownsVillages = true;
            $this->isCreatingDistrict = false;
            $this->district = $details->district_id;
        }
    }

    public function clearForm(){

        $this->reset(['subdivisionName','subdivisionType','regions','districts','region','district','isCreatingDistrict','iscreatingTownsVillages','isEdit','subdivisionId']);
    }


    public function render()
    {
        if($this->isCreatingDistrict)
        {
            $this->regions = $this->systemadminModel->getSubdivisionsByType('regions');
        }
        if($this->iscreatingTownsVillages)
        {
            $this->districts = $this->systemadminModel->getSubdivisionsByType('districts');
        }
        return view('livewire.systemadmin.add-subdivision')->extends('layouts.systemadmin');
    }
}
