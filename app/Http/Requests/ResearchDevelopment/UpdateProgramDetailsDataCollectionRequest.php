<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateProgramDetailsDataCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'program_name' => 'required|String',
            'duration' => 'required|numeric|integer',
            'tuition_fee_per_year' => 'required|numeric',
            'awarding_body' => 'required|string',
            'field_of_education' => 'required|string',
            'training_provider_id' => 'required|numeric|integer',
            'entry_requirements' => ['required', 'array'],
            'entry_requirements.*' => ['string'],
        ];
    }

    public function messages()
    {
        return [
            'program_name.required' => 'Please Enter Program name',
            'duration.required' => 'Please Enter program duration',
            'duration.numeric' => 'Duration must be numeric value',
            'tuition_fee_per_year.required' => 'Please Enter Program tuition fee per year',
            'tuition_fee_per_year.numeric' => 'Tuition fee must be a numeric value',
            'entry_requirements.required' => 'Please Program Entery requirements',
            'awarding_body.required' => 'Please select the Awarding body',
            'field_of_education.required' => 'Please select program field of education',
            'training_provider_id.required' => 'Please select learning center',
            'training_provider_id.numeric' => 'Learning center cannot be empty',
        ];
    }
}
