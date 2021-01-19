<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Regions extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.regions')->extends('layouts.systemadmin');
    }
}
