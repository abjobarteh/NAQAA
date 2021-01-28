<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class Departments extends Component
{
    public $systemadminModel, $departments;

    protected $listeners = ['refreshDepartments' => '$refresh'];

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
    }
    public function render()
    {
        $this->departments = $this->systemadminModel->getDepartments();
        return view('livewire.systemadmin.departments')->extends('layouts.systemadmin');
    }
}
