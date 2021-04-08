<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateApplicationFeeTariffsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_application_fees'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
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
            'amount' => 'required|numeric',
            'application_category' => 'required|string',
            'application_type' => 'required|string',
            'applicant_type' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Please Enter application fee amount!',
            'amount.numeric' => 'Application fee amount must be numerical!',
            'application_category.requied' => 'Please select the application category!',
            'application_type.requied' => 'Please select the application type!',
            'applicant_type.requied' => 'Please select type of applicant!',
        ];
    }
}
