<?php

namespace App\Http\Requests\RegistrationAccreditation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainerAccreditationRequest extends FormRequest
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
            'trainer_id' => ['required', 'numeric'],
            'application_no' => ['required', 'string'],
            'application_date' => ['required', 'date'],
            'status' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'trainer_id.required' => 'Please select trainer to accredit',
            'application_date.required' => 'Please enter the date of application',
            'accreditation_start_date.date.required' => 'Please enter a valid license start date',
            'accreditation_end_date.date.required' => 'Please enter a valid license end date',
        ];
    }
}
