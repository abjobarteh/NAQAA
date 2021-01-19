<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Departments extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.departments')->extends('layouts.systemadmin');
    }
}
