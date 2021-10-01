<?php

namespace App\Http\Requests\RegistrationAccreditation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingProviderRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'classification_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'ownership_id' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'po_box' => ['nullable', 'string'],
            'telephone_work' => ['required', 'string'],
            'mobile_phone' => ['required', 'string'],
            'fax' => ['nullable', 'string'],
            'email' => ['required', 'string'],
            'website' => ['nullable', 'string'],
            'region_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'town_village_id' => ['nullable', 'string'],
            'application_no' => ['required', 'string'],
            'application_date' => ['required', 'date'],
            'status' => ['required', 'string'],
            'license_start_date' => ['required_if:status,Approved', 'date'],
            'license_end_date' => ['required_if:status,Approved', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter name of training provider',
            'classification_id.required' => 'Please select classification of training provider',
            'category_id.required' => 'Please select category of training provider',
            'ownership_id.required' => 'Please select ownership of training provider',
            'address.required' => 'Please Enter training provider physical address',
            'telephone_work.required' => 'Please Enter work telephone number of training provider',
            'mobile_phone.required' => 'Please Enter mobile phone number of training provider',
            'email.required' => 'Please Enter training provider Email address',
            'region_id.required' => 'Please select Region training provider is in',
            'region_id.numeric' => 'Region selected is not valid',
            'district_id.required' => 'Please select District training provider is in',
            'district_id.numeric' => 'District selected is not valid',
            'town_village_id.required' => 'Please select Town/Village training provider is in',
            'town_village_id.numeric' => 'Town/Village selected is not valid',
            'status.required' => 'Please select the status of the application',
            'application_date.required' => 'Please enter the date of application',
            'license_start_date.date.required' => 'Please enter a valid license start date',
            'license_end_date.date.required' => 'Please enter a valid license end date',
        ];
    }
}
