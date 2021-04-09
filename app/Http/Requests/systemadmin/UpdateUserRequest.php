<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => "required|string|unique:users,username, {$this->user->id}",
            'email' => "required|email|unique:users,email, {$this->user->id}",
            'password' => 'nullable|min:8|confirmed',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'phonenumber' => 'required|string',
            'address' => 'required|string',
            'roles' => ['required','array'],
            'directorate' => 'nullable|integer',
            'unit' => 'nullable|integer',
            'designation' => 'nullable|integer',
            'permissions' => ['nullable','array']
            
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username cannot be empty. Please Enter a username!',
            'username.unique' => 'This username has already been taken. Please choose another one',
            'password.min' => 'Password cannot be less than 8 characters',
            'password.confirmed' => 'Passwords do not match',
            'firstname.required' => 'Please Enter a First Name',
            'middlename.string' => 'First Name can only be a string',
            'middle_name.string' => 'Midlle Name can only be a string',
            'lastname.required' => 'Please Enter a Last Name',
            'lastname.string' => 'Last Name cannot contain numeric characters',
            'phonenumber.required' => 'Please Enter a Phone Number',
            'address.required' => 'Please Enter an Address',
            'roles.required' => 'Please Select a Role to assign to User',
        ];
    }
}
