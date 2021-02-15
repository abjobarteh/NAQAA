<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class Designations extends Component
{
    public $systemadminModel, $designations;

    protected $listeners = ['refreshDesignations' => '$refresh'];

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
    }
    
    public function render()
    {
        $this->designations = $this->systemadminModel->getDesignations();
        return view('livewire.systemadmin.designations')->extends('layouts.systemadmin');
    }
}
