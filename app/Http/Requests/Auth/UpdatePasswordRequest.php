<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'current_password' => 'password',
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password field cannot be empty',
            'password.confirmed' => 'Password fields do not match',
        ];
    }
}
