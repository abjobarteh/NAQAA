<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class AddDesignation extends Component
{
    public systemadmin $systemadminModel;
    public $designationName, $designationId;
    public $isEdit;

    protected $listeners = ['editDesignation','clearForm'];

    public function mount(){ $this->systemadminModel = new systemadmin(); }

    public function createDesignation(){
        $data = $this->validate(
            [
                'designationName' => 'required|string',
            ],
            [
                'designationName.required' => 'Please Enter Designation Name.',
            ],
        );
        if(!$this->isEdit){
            $this->systemadminModel->createDesignation(json_encode($data));
            $this->dispatchBrowserEvent('designation-added', ['designation' => $this->designationName, 'action' => 'create']);
        } else{
            $this->systemadminModel->updateDesignation($this->designationId,json_encode($data));
            $this->dispatchBrowserEvent('designation-added', ['designation' => $this->designationName, 'action' => 'update']);
        }
        $this->reset(['designationName','designationId']);
    }

    public function editDesignation($designation){
        $this->isEdit = true;
        $designation = json_decode($designation);
        $this->designationId = $designation->id;
        $this->designationName = $designation->designation_name;
     }

     public function clearForm(){
        $this->reset(['designationName','designationId','isEdit']);
    }

    public function render()
    {
        return view('livewire.systemadmin.add-designation');
    }
}
