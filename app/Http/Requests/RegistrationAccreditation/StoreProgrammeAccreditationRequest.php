<?php

namespace App\Http\Requests\RegistrationAccreditation;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgrammeAccreditationRequest extends FormRequest
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
            'trainingprovider_id' => ['required', 'numeric'],
            'programme_title' => ['required', 'string'],
            'level' => ['required', 'string'],
            'studentship_duration' => ['required', 'numeric'],
            'total_qualification_time' => ['required', 'numeric'],
            'level_of_fees' => ['required', 'numeric'],
            'admission_requirements' => ['required', 'array'],
            'admission_requirements.*' => ['string'],
            'application_no' => ['required', 'string'],
            'application_date' => ['required', 'date'],
            'status' => ['required', 'string', 'in:accepted,rejected,pending'],
            'accreditation_start_date' => ['required_if:status,accepted', 'date'],
            'accreditation_end_date' => ['required_if:status,accepted', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'trainingprovider_id.required' => 'Please select a training provider',
            'programme_title.required' => 'Please Enter the title of the programme',
            'level.required' => 'Please select programme level',
            'studentship_duration.required' => 'Please Enter studentship duration for the programme',
            'studentship_duration.numeric' => 'Studentship duration must be a numeric value',
            'total_qualification_time.required' => 'Please Enter total qualification time for the programme',
            'total_qualification_time.numeric' => 'Total Qualification time must be a numeric value',
            'level_of_fees.required' => 'Please Enter Programme level of fees',
            'level_of_fees.numeric' => 'Level of fees must be a numeric value',
            'admission_requirements.required' => 'Please Enter programme admission requirements',
            'application_date.required' => 'Please Enter the Programme accreditation application date',
            'application_date.date' => 'Application date must be a valid date entry',
            'status.required' => 'Please select the status of the application',
        ];
    }
}
