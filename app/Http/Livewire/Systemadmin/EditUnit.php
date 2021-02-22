<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class EditUnit extends Component
{
    public systemadmin $systemadminModel;
    public $directorate, $UnitId, $unitName, $directorates;

    protected $listeners = ['editUnit'];

    public function mount(){ $this->systemadminModel = new systemadmin(); }

    public function render()
    {
        $this->directorates = (new systemadmin())->getDirectorates();
        return view('livewire.systemadmin.edit-unit');
    }

    public function editUnit($unit){
        $unit = json_decode($unit);
        $this->UnitId = $unit->id;
        $this->unitName = $unit->name;
        $this->directorate = $unit->directorate_id;
    }

    public function updateUnit(){
        $data = $this->validate(
            [
                'unitName' => 'required',
                'directorate' => 'required',
            ],
            [
                'unitName.required' => 'Please Enter a unit name.',
                'directorate.required' => 'Please select a directorate.',
            ],
        );

        (new systemadmin())->updateUnit($this->UnitId,$data);
        Alert::success('Unit successfully update');
        return redirect(route('systemadmin.units'));
    }
}
