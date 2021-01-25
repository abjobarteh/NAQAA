<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class AddDepartment extends Component
{
    public systemadmin $systemadminModel;
    public $departmentName;

    public function mount(){ $this->systemadminModel = new systemadmin(); }

    public function createDepartment(){
        $data = $this->validate(
            [
                'departmentName' => 'required|string',
            ],
            [
                'departmentName.required' => 'Please Enter Department Name.',
            ],
        );

        $this->systemadminModel->createDepartment(json_encode($data));
        $this->dispatchBrowserEvent('department-added', ['department' => $this->departmentName]);
        $this->reset('departmentName');
    }
    public function render()
    {
        return view('livewire.systemadmin.add-department')->extends('layouts.systemadmin');
    }
}
