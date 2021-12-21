<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreStudentDetailsDataCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'phone' => 'required|string',
            'nationality' => 'required|string',
            'date_of_birth' => 'required|date',
            'programme_name' => 'required|string',
            'attendance_status' => 'required|string',
            'admission_date' => 'required|date',
            'completion_date' => 'nullable|date',
            'qualification_at_entry' => 'required|numeric|integer',
            'award' => 'required|numeric|integer',
            'field_of_education' => 'required|string',
            'training_provider_id' => 'required|numeric|integer',
            'academic_year' => 'required|string',
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
            'programme_name.required' => 'Please Enter Programme name',
            'attendance_status.required' => 'Please select attendance status',
            'admission_date.date' => 'Admission Date must be a valid date entry',
            'completion_date.date' => 'Completion Date must be a valid date entry',
            'qualification_at_entry.required' => 'Please select qualification at entry',
            'qualification_at_entry.numeric' => 'Please select a valid qualification at entry',
            'award.required' => 'Please select Award',
            'award.numeric' => 'Please select a valid Award',
            'training_provider_id.numeric' => 'Training provider selected is not valid',
            'academic_year.required' => 'Please Enter the academic year',
            'date_of_birth.date' => 'Date of birth must be a valid date entry',
        ];
    }
}
