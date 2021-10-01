<?php

namespace App\Http\Requests\StandardsCurriculum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateQualificationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name' => ['required', 'string'],
            'practical' => ['required', 'in:yes,no'],
            'tuition_fee' => ['bail', 'nullable', 'numeric'],
            'entry_requirements' => ['required', 'array'],
            'entry_requirements.*' => ['string'],
            'mode_of_delivery' => ['required', 'string'],
            'minimum_duration' => ['required', 'numeric'],
            'qualification_level_id' => ['required', 'numeric', 'integer'],
            'education_field_id' => ['required', 'numeric', 'integer'],
            'education_sub_field_id' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Qualification name',
            'tuition_fee.numeric' => 'Tuition fee must be a number',
            'entry_requirements.required' => 'Please Enter the Entry requirement(s)',
            'mode_of_delivery.required' => 'Please Enter the mode of delivery',
            'minimum_duration.required' => 'Please Enter the minimum duration',
            'minimum_duration.numeric' => 'Duration must be a numeric value',
            'qualification_level_id.required' => 'Please select qualification level',
            'qualification_level_id.numeric' => 'Please select a valid qualfication level',
            'education_field_id.required' => 'Please Select field of education',
            'education_field_id.numeric' => 'Please Select a valid field of education',
        ];
    }
}
