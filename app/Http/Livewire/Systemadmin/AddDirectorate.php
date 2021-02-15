<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class AddDirectorate extends Component
{
    public systemadmin $systemadminModel;
    public $directorateName, $directorateId;
    public $isEdit;

    protected $listeners = ['editDirectorate','clearForm'];

    public function mount(){ $this->systemadminModel = new systemadmin(); }

    public function createDirectorate(){
        $data = $this->validate(
            [
                'directorateName' => 'required|string',
            ],
            [
                'directorateName.required' => 'Please Enter Directorate Name.',
            ],
        );
        if(!$this->isEdit){
            $this->systemadminModel->createDirectorate(json_encode($data));
            $this->dispatchBrowserEvent('directorate-added', ['directorate' => $this->directorateName, 'action' => 'create']);
        } else{
            $this->systemadminModel->updateDirectorate($this->directorateId,json_encode($data));
            $this->dispatchBrowserEvent('directorate-added', ['directorate' => $this->directorateName, 'action' => 'update']);
        }
        $this->reset(['directorateName','directorateId']);
    }

    public function editDirectorate($directorate){
       $this->isEdit = true;
       $directorate = json_decode($directorate);
       $this->directorateId = $directorate->id;
       $this->directorateName = $directorate->directorate_name;
    }

    public function clearForm(){
        $this->reset(['directorateName','directorateId','isEdit']);
    }
    
    public function render()
    {
        return view('livewire.systemadmin.add-directorate')->extends('layouts.systemadmin');
    }
}
