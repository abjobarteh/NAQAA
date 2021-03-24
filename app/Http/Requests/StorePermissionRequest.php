<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StorePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('create_permission'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'slug' => 'required',
            'permission_type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Permission name is required. Please Enter Permission name!',
            'slug.required' => 'Permission slug is required. Please Enter it in the format specified!',
            'permission_type.required' => 'Please select the type of permission to create!'
        ];
    }
}
