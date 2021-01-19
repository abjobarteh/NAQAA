<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.index')->extends('layouts.systemadmin');
    }
}
