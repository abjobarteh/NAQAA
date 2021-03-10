<?php

namespace App\Http\Requests;

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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|digits_between:7,15',
            'address' => 'required|string',
            'roles' => ['required','array'],
            'directorate' => 'nullable',
            'unit' => 'nullable',
            'designation' => 'nullable',
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
            'first_name.required' => 'Please Enter a First Name',
            'first_name.string' => 'First Name cannot contain numeric characters',
            'middle_name.string' => 'Midlle Name cannot contain numeric characters',
            'last_name.required' => 'Please Enter a Last Name',
            'last_name.string' => 'Last Name cannot contain numeric characters',
            'phone_number.required' => 'Please Enter a Phone Number',
            'phone_number.digits_between' => 'Phone number can only be  between 7 and 15 digits long',
            'address.required' => 'Please Enter an Address',
            'roles.required' => 'Please Select a Role to assign to User',
        ];
    }
}
