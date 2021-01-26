<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class AddDepartment extends Component
{
    public systemadmin $systemadminModel;
    public $departmentName, $departmentId;
    public $isEdit;

    protected $listeners = ['editDepartment','clearForm'];

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
        if(!$this->isEdit){
            $this->systemadminModel->createDepartment(json_encode($data));
            $this->dispatchBrowserEvent('department-added', ['department' => $this->departmentName, 'action' => 'create']);
        } else{
            $this->systemadminModel->updateDepartment($this->departmentId,json_encode($data));
            $this->dispatchBrowserEvent('department-added', ['department' => $this->departmentName, 'action' => 'update']);
        }
        $this->reset(['departmentName','departmentId']);
    }

    public function editDepartment($department){
       $this->isEdit = true;
       $department = json_decode($department);
       $this->departmentId = $department->id;
       $this->departmentName = $department->department_name;
    }

    public function clearForm(){
        $this->reset(['departmentName','departmentId','isEdit']);
    }
    public function render()
    {
        return view('livewire.systemadmin.add-department')->extends('layouts.systemadmin');
    }
}
