<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;

class Users extends Component
{
    public $users;
    public $systemadminModel;
    public function mount(systemadmin $systemadminModel){
        $this->systemadminModel = $systemadminModel;
    }
    public function render()
    {
        $this->users = $this->systemadminModel->getAllUsers();
        return view('livewire.systemadmin.users')->extends('layouts.systemadmin');
    }
}
