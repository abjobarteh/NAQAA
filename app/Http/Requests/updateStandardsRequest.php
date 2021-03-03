<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class updateStandardsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('standards_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'title' => 'required',
            'description' => 'nullable|string',
            'maximum_score' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please Enter a name for the standard',
            'maximum_score.required' => 'Please Enter the weighted maximum score for the standard',
            'maximum_score.regex' => 'The Weighted maximum score should be a float value',
        ];
    }
}
