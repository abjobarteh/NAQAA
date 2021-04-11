<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicAdminStaffDetailsDataCollectionRequest extends FormRequest
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
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'specialisation' => 'required|string',
            'rank_id' => 'required|numeric|integer',
            'role_id' => 'required|numeric|integer',
            'institution_id' => 'required|numeric|integer',
            'main_teaching_field_of_study' => 'required|string',
            'secondary_teaching_fields_of_study' => ['nullable','array'],
            'secondary_teaching_fields_of_study.*' => ['string'],
            'qualifications' => ['required','array'],
            'qualifications.*' => ['string'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter first name',
            'lastname.required' => 'Please Enter last name',
            'specialisation.required' => 'Please Enter specialisation',
            'rank_id.required' => 'Please select rank',
            'rank_id.numeric' => 'Rank cannot be empty',
            'role_id.required' => 'Please select role',
            'role_id.numeric' => 'Role cannot be empty',
            'institution_id.required' => 'Please select learning center',
            'institution_id.numeric' => 'Learning center cannot be empty',
            'main_teaching_field_of_study' => 'Please enter main teaching field of study',
            'qualifications.required' => 'Please select qualification(s)',
        ];
    }
}
