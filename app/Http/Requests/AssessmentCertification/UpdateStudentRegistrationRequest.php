<?php

namespace App\Http\Requests\AssessmentCertification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRegistrationRequest extends FormRequest
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
            'gender' => ['required', 'in:male,female'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'candidate_type' => ['required', 'in:private,regular'],
            'address' => ['required', 'string'],
            'local_language' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'region_id' => ['nullable', 'numeric'],
            'district_id' => ['nullable', 'numeric'],
            'town_village_id' => ['nullable', 'numeric'],
            'programme_id' => ['required', 'numeric'],
            'programme_level_id' => ['required', 'numeric'],
            'training_provider_id' => ['required', 'numeric'],
            'academic_year' => ['required', 'string'],
            'picture' => ['nullable', 'file', 'mimes:jpg,png'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please enter student first name',
            'lastname.required' => 'Please enter student last name',
            'date_of_birth.required' => 'Please enter student date of birth',
            'gender.required' => 'Please select gender of student',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'Please enter student contact number',
            'candidate_type.required' => 'Please select candidate type',
            'nationality.required' => 'Please select country of origin',
            'local_language.required' => 'Please select local language spoken',
            'address.required' => 'Please enter address',
            'programme_id.required' => 'Please select the programme',
            'programme_level_id.required' => 'Please select level of the programme',
            'training_provider_id.required' => 'Please select the institution',
            'academic_year.required' => 'Please enter the academic year',
        ];
    }
}
