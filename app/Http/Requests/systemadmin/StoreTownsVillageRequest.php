<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreTownsVillageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('towns_villages_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
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
            'district_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Town/Village name is required. Please Enter town/village name',
            'district_id.required' => 'District is required to create Town/Village. Please select a district'
        ];
    }
}
