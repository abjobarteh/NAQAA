<?php

namespace App\Http\Requests\StandardsCurriculum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateUnitStandardsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_unit_standards'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'unit_standard_title' => 'required|string',
            'unit_standard_code' => 'required|string',
            'unit_standard_type' => 'required|in:key,occupational',
            'status' => 'required|in:active,inactive',
            'minimum_required_hours' => 'required|string',
            'validated' => 'required|string|in:yes,no',
            'validation_date' => 'required|date',
            'qualification_id' => 'required|numeric',
            'developed_by_stakeholders' => ['required', 'array'],
            'developed_by_stakeholders.*' => ['string'],
            'validated_by_stakeholders' => ['required', 'array'],
            'validated_by_stakeholders.*' => ['string'],
        ];
    }

    public function messages()
    {
        return [
            'unit_standard_title.required' => 'Please Enter the Unit Standard title',
            'unit_standard_code.required' => 'Please Enter unit Standard code',
            'minimum_required_hours.required' => 'Please Enter the required minimum hours for this unit standard',
            'developed_by_stakeholders.required' => 'Please Enter names of stakeholder involved in the development process',
            'validated_by_stakeholders.required' => 'Please Enter names of stakeholder involved in the validation process',
            'validated.required' => 'Please Select validation status of the unit standard',
            'validated.in' => 'Selected validation status value is invalid',
            'validation_date.required' => 'Please Enter Unit Standard validation date',
            'qualification_id.required' => 'Please select Qualification',
            'qualification_id.numeric' => 'Please select a valid Qualification',
        ];
    }
}
