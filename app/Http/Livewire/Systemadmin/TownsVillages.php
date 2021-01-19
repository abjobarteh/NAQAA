<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class TownsVillages extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.towns-villages')->extends('layouts.systemadmin');
    }
}
