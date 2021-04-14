<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentDetailsDataCollectionRequest extends FormRequest
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
            'student_id' => 'nullable|string',
            'firstname' => 'nullable|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string',
            'nationality' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'programme' => 'required|string',
            'attendance_status' => 'nullable|string',
            'admission_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'qualification_at_entry' => 'nullable|numeric|integer',
            'award' => 'required|numeric|integer',
            'education_field_id' => 'nullable|numeric|integer',
            'institution_id' => 'required|numeric|integer',
            'studentdetail_type' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter first name',
            'lastname.required' => 'Please Enter first name',
            'gender.required' => 'Please select gender type',
            'phone.required' => 'Please Enter phone number',
            'programme.required' => 'Please Enter Programme name',
            'admission_date.date' => 'Admission Date must be a valid date entry',
            'completion_date.date' => 'Completion Date must be a valid date entry',
            'qualification_at_entry.numeric' => 'The selected Qualification entry value is not valid',
            'award.numeric' => 'The selected Award value is not valid',
            'education_field_id.numeric' => 'The selected filed of education value is not valid',
            'institution_id.numeric' => 'The selected learning center value is not valid',
            'studentdetail_type.required' => 'Please Select the type of student detail data collection type',
            'date_of_birth.date' => 'Date of birth must be a valid date entry',
        ];
    }
}
