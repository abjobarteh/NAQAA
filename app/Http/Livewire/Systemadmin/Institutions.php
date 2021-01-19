<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Institutions extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.institutions')->extends('layouts.systemadmin');
    }
}
