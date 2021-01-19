<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.users')->extends('layouts.systemadmin');
    }
}
