<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Users extends Component
{
    public $users;
    public $systemadminModel;
    
    protected $listeners = ['statuschange' => '$refresh'];

    public function mount(systemadmin $systemadminModel){
        $this->systemadminModel = $systemadminModel;
    }

    public function changeUserAccountStatus($userId,$status){
        $this->systemadminModel->changeAccountStatus($userId,$status);
        if($status == 1) $this->dispatchBrowserEvent('Notify',['message' => 'Account successfully activated']);
        else $this->dispatchBrowserEvent('Notify',['message' => 'Account successfully deactivated']);
        $this->emitSelf('statuschange');
    }

    public function render()
    {
        $this->users = User::with('roles')->get();

        return view('livewire.systemadmin.users')->extends('layouts.systemadmin');
    }
    
}
