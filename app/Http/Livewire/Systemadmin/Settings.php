<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Settings extends Component
{
    public $username, $email, $password, $password_confirmation, $first_name, $middle_name, $last_name, $phone_number, $address, $role, $department;
    public $roles, $departments;
    public $systemadminModel, $details;

    protected $listeners = ['refreshSettings' => '$refresh'];

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
        $this->details = json_decode($this->systemadminModel->getUserAccountDetails(Auth::user()->id));
        $this->username = $this->details[0]->username;
        $this->email = $this->details[0]->email;
        $this->first_name = $this->details[0]->first_name;
        $this->middle_name = $this->details[0]->middle_name;
        $this->last_name = $this->details[0]->last_name;
        $this->phone_number = $this->details[0]->phone_number;
        $this->address = $this->details[0]->address;
        $this->role = $this->details[0]->role_id;
        $this->department = $this->details[0]->department_id;
    }

    public function updateUserSettings(){
        $data = $this->validate([
            'username' => 'required|string|unique:users,username, '.Auth::user()->id,
            'email' => 'required|email|unique:users,email, '.Auth::user()->id,
            'password' => 'nullable|min:8|confirmed',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|digits_between:7,15',
            'address' => 'required|string',
            'role' => 'required',
            'department' => 'required'
        ],
        [
            'username.required' => 'Username cannot be empty. Please Enter a username!',
            'username.unique' => 'This username has already been taken. Please choose another one',
            'password.min' => 'Password cannot be less than 8 characters',
            'password.confirmed' => 'Passwords do not match',
            'first_name.required' => 'Please Enter a First Name',
            'first_name.string' => 'First Name cannot contain numeric characters',
            'middle_name.string' => 'Midlle Name cannot contain numeric characters',
            'last_name.required' => 'Please Enter a Last Name',
            'last_name.string' => 'Last Name cannot contain numeric characters',
            'phone_number.required' => 'Please Enter a Phone Number',
            'phone_number.digits_between' => 'Phone number can only be  between 7 and 15 digits long',
            'address.required' => 'Please Enter an Address',
            'role.required' => 'Please Select a Role to assign to User',
            'department.required' => 'Please Select department to assign to User',
        ]);
        
        // check if password is being updated
        if($this->password == null){ $this->systemadminModel->updateUser(Auth::user()->id,json_encode($data),0); }
        else $this->systemadminModel->updateUser(Auth::user()->id,json_encode($data),1);
        Alert::success('Success', 'User successfully updated!');
        $this->dispatchBrowserEvent('Notify',['message' => 'Account successfully updated']);
        $this->emitSelf('refreshSettings');
    }

    public function render()
    {
        $this->roles =  $this->systemadminModel->getRoles();
        $this->departments = $this->systemadminModel->getDepartments();
        return view('livewire.systemadmin.settings')->extends('layouts.systemadmin');
    }
}
