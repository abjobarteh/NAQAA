<?php

namespace App\Http\Requests\RegistrationAccreditation;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainerRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'firstname' => ['required', 'string'],
            'middlename' => ['nullable', 'string'],
            'lastname' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:M,F'],
            'nationality' => ['required', 'string'],
            'TIN' => ['required', 'string'],
            'NIN' => ['nullable', 'string'],
            'AIN' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'physical_address' => ['required', 'string'],
            'postal_address' => ['required', 'string'],
            'phone_home' => ['required', 'string'],
            'phone_mobile' => ['required', 'string'],
            'type' => ['required', 'string'],
            'application_no' => ['required', 'string'],
            'application_date' => ['required', 'date'],
            'status' => ['required', 'string'],
            'license_start_date' => ['required_if:status,Approved', 'date'],
            'license_end_date' => ['required_if:status,Approved', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter First name',
            'lastname.required' => 'Please Enter Last name',
            'date_of_birth.required' => 'Please Enter Date of birth',
            'gender.required' => 'Please select gender',
            'nationality.required' => 'Please select nationlaity',
            'TIN.required' => 'Please Enter Trainer TIN number',
            'NIN' => ['required_if:nationality,Gambia', 'string'],
            'AIN' => ['required_unless:nationality,Gambia', 'string'],
            'email' => ['required', 'email'],
            'physical_address' => ['required', 'string'],
            'postal_address' => ['required', 'string'],
            'phone_home' => ['required', 'string'],
            'phone_mobile' => ['required', 'string'],
            'type' => ['required', 'string'],
            'application_date.required' => 'Please enter the date of application',
            'license_start_date.date.required' => 'Please enter a valid license start date',
            'license_end_date.date.required' => 'Please enter a valid license end date',
        ];
    }
}
