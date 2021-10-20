<?php

namespace App\Http\Requests\AssessmentCertification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificateEndorsementRequest extends FormRequest
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
            'training_provider_id' => ['required', 'numeric'],
            'programme' => ['required', 'string'],
            'level' => ['required', 'string'],
            'total_certificates_received' => ['required', 'numeric'],
            'total_males' => ['required', 'numeric'],
            'total_females' => ['required', 'numeric'],
            'trainer_details' => ['nullable', 'array'],
            'trainer_details.*' => ['array'],
            'endorsed_certificates' => ['required', 'numeric'],
            'non_endorsed_declared' => ['required', 'numeric'],
            'non_endorsed_certificates' => ['required', 'numeric'],
            'programme_start_date' => ['required', 'date'],
            'programme_end_date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'training_provider_id.required' => 'Please select institution',
            'programme.required' => 'Please Enter programme name',
            'level.required' => 'Please select level',
            'total_certificates_declared.required' => 'Please enter total number of certificates declared',
            'total_certificates_received.required' => 'Please enter total number of certificates',
            'total_males.required' => 'Please Enter total number of males in programme',
            'total_females.required' => 'Please Enter total number of females in programme',
            'endorsed_certificates' => 'Please Enter total number of certificates endorsed',
            'non_endorsed_certificates' => 'Please Enter total number of certificates non-endorsed',
            'programme_start_date.required' => 'Please enter the programme start date',
            'programme_start_date.date' => 'Programme start date must be a valid date',
            'programme_end_date.required' => 'Please enter the programme end date',
            'programme_end_date.date' => 'Programme end date must be a valid date',
        ];
    }
}
