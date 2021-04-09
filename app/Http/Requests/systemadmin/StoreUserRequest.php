<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('create_user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'phonenumber' => 'required|string',
            'address' => 'required|string',
            'roles' => ['required','array'],
            'directorate' => 'required|integer',
            'unit' => 'nullable|integer',
            'designation' => 'required|integer',
            'permissions' => ['nullable', 'array']
     
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username cannot be empty. Please Enter a username!',
            'username.unique' => 'This username has already been taken. Please choose another one',
            'password.required' => 'Password is empty. Please Enter a password',
            'password.min' => 'Password cannot be less than 8 characters',
            'password.confirmed' => 'Passwords do not match',
            'firstname.required' => 'Please Enter a First Name',
            'firstname.string' => 'First Name cannot contain numeric characters',
            'middlename.string' => 'Midlle Name cannot contain numeric characters',
            'lastname.required' => 'Please Enter a Last Name',
            'lastname.string' => 'Last Name cannot contain numeric characters',
            'phonenumber.required' => 'Please Enter a Phone Number',
            'address.required' => 'Please Enter an Address',
            'role.required' => 'Please Select a Role to assign to User',
            'directorate.required' => 'Please Select directorate to assign to User',
            'designation.required' => 'Please Select designation to assign to User',
            'roles.required' => 'Please Select a Role to assign to User',
        ];
    }
}
