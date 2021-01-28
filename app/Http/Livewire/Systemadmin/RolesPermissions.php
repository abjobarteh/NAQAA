<?php

namespace App\Http\Livewire\Systemadmin;

use Livewire\Component;

class RolesPermissions extends Component
{
    public function render()
    {
        return view('livewire.systemadmin.roles-permissions')->extends('layouts.systemadmin');
    }
}
