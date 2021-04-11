<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstitutionDetailsDataCollectionRequest extends FormRequest
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
            'training_provider_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'po_box' => 'nullable|string',
            'website' => 'nullable|string',
            'financial_source' => 'nullable|string',
            'estimated_yearly_turnover' => 'nullable|integer',
            'enrollment_capacity' => 'nullable||integer',
            'no_of_lecture_rooms' => 'required|integer',
            'no_of_computer_labs' => 'required|integer',
            'total_no_of_computers_in_labs' => 'required|integer',
            'ownership_id' => 'required|integer',
            'classification_id' => 'required|integer',
            'district_id' => 'required|integer',
            'lga_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'training_provider_name.required' => 'Please Enter Learning center name!',
            'emai.required' => 'Email field cannot be empty. Please Enter an email!',
            'emai.email' => 'Please Enter a valid email address!',
            'phone.required' => 'Please Enter a Phone number!',
            'address.required' => 'Address field is empty. Please Enter an Address!',
            'estimated_yearly_turnover.integer' => 'Estimated yearly turnover can only be a numeric value',
            'enrollment_capacity.integer' => 'Enrollment capacity can only be a numeric integer value!',
            'no_of_lecture_rooms.required' => 'Please Enter No. of lecture rooms!',
            'no_of_lecture_rooms.integer' => 'No. of lecture rooms can only be a numeric value',
            'no_of_computer_labs.required' => 'Please Enter the No. of computer labs',
            'no_of_computer_labs.integer' => 'No. of computer labs can only be a numeric value',
            'total_no_of_computers_in_labs.required' => 'Please enter the total no. of computers in all computer labs',
            'total_no_of_computers_in_labs.integer' => 'The total no. of computers in all computer labs must be a numeric value',
            'ownership_id.required' => 'Please select training provider ownership',
            'ownership_id.integer' => 'No training provider ownership selected',
            'classification_id.required' => 'Please select training provider classfication',
            'classification_id.integer' => 'No training provider classfication selected',
            'district_id.required' => 'Please select district',
            'district_id.integer' => 'No district has been selected',
            'lga_id.required' => 'Please select local goverment area',
            'lga_id.integer' => 'No local goverment area selected',
        ];
    }
}
