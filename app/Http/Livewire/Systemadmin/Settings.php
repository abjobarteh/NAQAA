<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.settings')->extends('layouts.systemadmin');
    }
}
