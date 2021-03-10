<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreUnitsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name' => 'required|array',
            'name.*' => 'required|string',
            'directorate' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Unit names cannot be empty',
            'name.*.required' => 'Please Enter a unit name',
            'directorate.required' => 'Please select a directorate to create units for.'
        ];
    }
}
