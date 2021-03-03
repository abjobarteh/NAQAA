<?php

namespace App\Http\Requests\systemadmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreDistrictRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('district_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'region_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter District name',
            'region_id.required' => 'Region is requied to create district. Please select one'
        ];
    }
}
