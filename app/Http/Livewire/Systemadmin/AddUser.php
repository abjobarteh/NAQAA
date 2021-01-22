<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AddUser extends Component
{
    public $username, $email, $password, $password_confirmation, $first_name, $middle_name, $last_name, $phone_number, $address,
    $role, $department;
    public $roles, $departments;
    public $systemadminModel;

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
    }

    public function createUser(){
        $data = $this->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|digits_between:7,15',
            'address' => 'required|string',
            'role' => 'required|string',
            'department' => 'required|string'
        ],
        [
            'username.required' => 'Username cannot be empty. Please Enter a username!',
            'username.unique' => 'This username has already been taken. Please choose another one',
            'password.required' => 'Password is empty. Please Enter a password',
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
        
        $this->systemadminModel->createUser(json_encode($data));
        Alert::toast('User successfully created!', 'success');
        return redirect(route('systemadmin.users'));
    }
    public function render()
    {
        return view('livewire.systemadmin.add-user')->extends('layouts.systemadmin');
    }
}
