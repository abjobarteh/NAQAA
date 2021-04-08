<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateEducationSubFieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('create_field_of_education'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name' => 'required|string',
            'education_field_id' =>'required|integer',
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Field of education name!',
            'education_field_id.required' => 'Please Select the Field of education!',
        ];
    }
}
