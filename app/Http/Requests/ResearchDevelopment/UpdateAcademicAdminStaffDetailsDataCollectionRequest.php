<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateAcademicAdminStaffDetailsDataCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string',
            'email' => 'required|email',
            'job_title' => 'required|string',
            'salary_per_month' => 'required|string',
            'employment_date' => 'required|date',
            'employment_type' => 'required|string',
            'highest_qualification' => 'required|string',
            'other_qualifications' => ['nullable', 'array'],
            'other_qualifications.*' => ['string'],
            'specialisation' => 'required|string',
            'rank' => 'nullable|string',
            'role' => 'nullable|string',
            'institution_id' => 'required|numeric|integer',
            'main_teaching_field_of_study' => 'required|string',
            'secondary_teaching_fields_of_study' => ['nullable', 'array'],
            'secondary_teaching_fields_of_study.*' => ['string'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter first name',
            'lastname.required' => 'Please Enter last name',
            'specialisation.required' => 'Please Enter specialisation',
            'gender.required' => 'Please Select gender',
            'nationality.required' => 'Please Select nationality',
            'date_of_birth.required' => 'Please Enter date of birth',
            'date_of_birth.date' => 'Please Enter a valid date entry',
            'phone.required' => 'Please Enter Phone Number',
            'email.required' => 'Please Enter email',
            'email.email' => 'Email must be a valid email entry',
            'job_title.required' => 'Please Enter job title',
            'salary_per_month.required' => 'Please Enter salary per month',
            'employment_date.required' => 'Please Enter employment date',
            'employment_type.required' => 'Please select the type of employment',
            'highest_qualification' => 'Please Select highest qualification',
            'rank.required' => 'Please select rank',
            'role.required' => 'Please select role',
            'institution_id.required' => 'Please select learning center',
            'institution_id.numeric' => 'Learning center cannot be empty',
            'main_teaching_field_of_study' => 'Please enter main teaching field of study',
        ];
    }
}
