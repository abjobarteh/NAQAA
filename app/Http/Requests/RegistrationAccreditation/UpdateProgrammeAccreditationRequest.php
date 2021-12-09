<?php

namespace App\Http\Requests\RegistrationAccreditation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateProgrammeAccreditationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_accreditation'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'total_qualification_time_months' => ['required', 'numeric'],
            'total_qualification_time_hours' => ['required', 'numeric'],
            'level_of_fees' => ['required', 'numeric'],
            'admission_requirements' => ['required', 'array'],
            'admission_requirements.*' => ['string'],
            'application_no' => ['required', 'string'],
            'application_date' => ['required', 'date'],
            'status' => ['required', 'string'],
            'accreditation_start_date' => ['required_if:status,Approved', 'date'],
            'accreditation_end_date' => ['required_if:status,Approved', 'date'],
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
            'total_qualification_time_months.required' => 'Please Enter total qualification time in months for the programme',
            'total_qualification_time_months.numeric' => 'Total Qualification time months must be a numeric value',
            'total_qualification_time_hours.required' => 'Please Enter total qualification time in hours for the programme',
            'total_qualification_time_hours.numeric' => 'Total Qualification time hours must be a numeric value',
            'level_of_fees.required' => 'Please Enter Programme level of fees',
            'level_of_fees.numeric' => 'Level of fees must be a numeric value',
            'admission_requirements.required' => 'Please Enter programme admission requirements',
            'application_date.required' => 'Please Enter the Programme accreditation application date',
            'application_date.date' => 'Application date must be a valid date entry',
            'status.required' => 'Please select the status of the application',
        ];
    }
}
