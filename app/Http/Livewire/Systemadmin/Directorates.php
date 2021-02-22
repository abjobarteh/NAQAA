<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class Directorates extends Component
{
    public $systemadminModel, $directorates;

    protected $listeners = ['refreshDirectorates' => '$refresh'];

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
    }

    public function render()
    {
        $this->directorates = $this->systemadminModel->getDirectorates();
        return view('livewire.systemadmin.directorates')->extends('layouts.systemadmin');
    }
}
