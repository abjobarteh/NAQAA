<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Units extends Component
{
    public $systemadminModel, $units, $unit, $directorates, $directorate;
    public $inputs = [];
    public $rows = 0;
    public $row;

    // protected $listeners = ['refreshDirectorates' => '$refresh'];

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
    }
    
   
    public function add($i)
    {
        if(empty($this->row)){
            $i = $i + 1;
            $this->rows = $i;
            array_push($this->inputs ,$i);
        }else{
            $this->rows = (int)$this->row;

            for($j=1; $j<=$this->rows; $j++){
                array_push($this->inputs ,$j);
            }
        }
        
    }

   
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    
    public function render()
    {
        $this->units = $this->systemadminModel->getUnits();
        $this->directorates = $this->systemadminModel->getDirectorates();
        return view('livewire.systemadmin.units')->extends('layouts.systemadmin');
    }

    public function createUnits()
    {
        // dd($this->unit);
        $data = $this->validate([
                'unit.0' => 'required|string',
                'unit.*' => 'required|string',
                'directorate' => 'required',
                'row' => 'nullable|numeric'
            ],
            [
                'unit.0.required' => 'Name field is required',
                'unit.0.string' => 'Name field is can only be string',
                'unit.*.required' => 'Unit Name is required',
                'directorate.required' => 'Please select a directorate to create Unit/Units for!',
                'rows.numeric' => 'Please Enter a numeric value'
            ]
        );
        
        $this->systemadminModel->addUnits($data);
       
        $this->inputs = [];
   
        $this->reset(['unit','rows','row','directorate']);
   
        Alert::success('Units have successfully been added');
        return redirect(route('systemadmin.units'));
    }

}
