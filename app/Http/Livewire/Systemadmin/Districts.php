<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Districts extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.districts')->extends('layouts.systemadmin');
    }
}
