<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateComplianceLevelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('compliance_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
           'name' => 'required',
           'percentage_start' => 'required',
           'percentage_end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Compliance Level Name is required. Please Enter a name',
            'percentage_start.required' => 'Please Enter a start percentage',
            'percentage_end.required' => 'Please Enter an end percentage'
        ];
    }
}
