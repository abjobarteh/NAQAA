<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class Subdivisions extends Component
{
    public $showRegions,$showDistricts, $showTownsVillages, $regions, $districts, $townsVillages;
    public $systemadminModel;

    protected $listeners = ['refreshSubdivisions' => '$refresh'];

    public function mount(systemadmin $systemadmin)
    {
        $this->systemadminModel = $systemadmin;
        $this->showRegions = true;
        $this->showDistricts = false;
        $this->showTownsVillages = false;
    }

    public function render()
    {
        if($this->showRegions)
        {
            $this->regions = $this->systemadminModel->getSubdivisionsByType('regions');
        }
        if($this->showDistricts)
        {
            $this->districts = $this->systemadminModel->getSubdivisionsByType('districts');
        }
        
        if($this->showTownsVillages)
        {
            $this->townsVillages = $this->systemadminModel->getSubdivisionsByType('towns_villages');
        }
        return view('livewire.systemadmin.subdivisions')->extends('layouts.systemadmin');
    }
}
