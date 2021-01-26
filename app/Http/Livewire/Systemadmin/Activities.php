<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Activities extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.activities')->extends('layouts.systemadmin');
    }
}
