<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\systemadmin;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AddUser extends Component
{
    public $username, $email, $password, $password_confirmation, $first_name, $middle_name, $last_name, $phone_number, $address, $role, $directorate, $unit, $designation;
    public $roles, $directorates, $units, $designations;
    public $systemadminModel;
    public $didDirectorateChange = false;

    public function mount(systemadmin $systemadmin){
        $this->systemadminModel = $systemadmin;
    }

    public function updatedDirectorate(){
        $this->didDirectorateChange = true;

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
            'role' => 'required',
            'directorate' => 'required',
            'unit' => 'nullable',
            'designation' => 'required'
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
            'directorate.required' => 'Please Select directorate to assign to User',
            'designation.required' => 'Please Select designation to assign to User',
        ]);
        
        $this->systemadminModel->createUser(json_encode($data));
        Alert::toast('User successfully created!', 'success');
        return redirect(route('systemadmin.users'));
    }

    public function render()
    {
        $this->roles =  $this->systemadminModel->getRoles();
        $this->directorates = $this->systemadminModel->getDirectorates();
        if(!$this->didDirectorateChange){

            $this->units = $this->systemadminModel->getUnits();
        }
        else {
            if(!$this->systemadminModel->getUnitsByDirectorate($this->directorate)->isEmpty()){
            $this->units = $this->systemadminModel->getUnitsByDirectorate($this->directorate);
        }
        }
        $this->designations = $this->systemadminModel->getDesignations();
        return view('livewire.systemadmin.add-user')->extends('layouts.systemadmin');
    }
}
