<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateStudentDetailsDataCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');

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
            'student_id' => 'required|string',
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string',
            'nationality' => 'required|string',
            'date_of_birth' => 'required|date',
            'programme' => 'required|string',
            'attendance_status' => 'required|string',
            'admission_date' => 'required|date',
            'completion_date' => 'nullable|date',
            'qualification_at_entry' => 'required|numeric|integer',
            'award' => 'required|numeric|integer',
            'education_field_id' => 'required|numeric|integer',
            'institution_id' => 'required|numeric|integer',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Please Enter first name',
            'lastname.required' => 'Please Enter first name',
            'gender.required' => 'Please select gender type',
            'phone.required' => 'Please Enter phone number',
            'nationality.required' => 'Please select nationality',
            'date_of_birth.required' => 'Please select date of birth',
            'date_of_birth.date' => 'Date of birth must be a valid date',
            'programme.required' => 'Please Enter Programme name',
            'attendance_status.required' => 'Please select attendance status',
            'admission_date.date' => 'Admission Date must be a valid date entry',
            'completion_date.date' => 'Completion Date must be a valid date entry',
            'qualification_at_entry.required' => 'Please select qualification at entry',
            'qualification_at_entry.numeric' => 'Please select a valid qualification at entry',
            'award.required' => 'Please select Award',
            'award.numeric' => 'Please select a valid Award',
            'education_field_id.numeric' => 'The selected filed of education value is not valid',
            'institution_id.numeric' => 'The selected learning center value is not valid',
            'studentdetail_type.required' => 'Please Select the type of student detail data collection type',
            'date_of_birth.date' => 'Date of birth must be a valid date entry',
        ];
    }
}
