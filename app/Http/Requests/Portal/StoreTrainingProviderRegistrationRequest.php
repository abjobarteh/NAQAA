<?php

namespace App\Http\Requests\Portal;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingProviderRegistrationRequest extends FormRequest
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
            'category_id' => ['required', 'numeric'],
            'physical_address' => ['required', 'string'],
            'postal_address' => ['required', 'string'],
            'telephone_work' => ['required', 'numeric'],
            'mobile_phone' => ['required', 'numeric'],
            'fax' => ['nullable', 'numeric'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'string'],
            'region_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'town_village_id' => ['nullable', 'numeric'],
            'firstname' => ['required', 'string'],
            'middlename' => ['nullable', 'string'],
            'lastname' => ['required', 'string'],
            'gender' => ['required', 'in:male,female'],
            'date_of_birth' => ['required', 'date'],
            'nationality' => ['required', 'string'],
            'qualifications' => ['required', 'string'],
            'relevant_experience' => ['required', 'string'],
            'bank_names' => ['required', 'string'],
            'signatories_names' => ['required', 'array'],
            'signatories_names.*' => ['string'],
            'signatories_postitions' => ['required', 'array'],
            'signatories_postitions.*' => ['string'],
            'signatories_signature' => ['nullable', 'array'],
            'signatories_signature.*' => ['string'],
            'boardmember_names' => ['required', 'array'],
            'boardmember_names.*' => ['string'],
            'boardmember_nationalities' => ['required', 'array'],
            'boardmember_nationalities.*' => ['string'],
            'boardmember_experience' => ['required', 'array'],
            'boardmember_experience.*' => ['string'],
            'boardmember_positions' => ['required', 'array'],
            'boardmember_positions.*' => ['string'],
            'registration_license' => ['required', 'mimes:jpg,png,pdf'],
            'organisational_chart' => ['required', 'mimes:jpg,png,pdf'],
            'financial_policy' => ['required', 'mimes:jpg,png,pdf'],
            'audited_accounts' => ['required', 'mimes:jpg,png,pdf'],
            'staff_socialsecurity_receipt' => ['required', 'mimes:jpg,png,pdf'],
            'institutional_tin' => ['required', 'mimes:jpg,png,pdf'],
            'health_inspectors_certificate' => ['required', 'mimes:jpg,png,pdf'],
            'budget_estimate' => ['required', 'mimes:jpg,png,pdf'],
            'last_three_month_account_statement' => ['required', 'mimes:jpg,png,pdf'],
            'fees_policy' => ['required', 'mimes:jpg,png,pdf'],
            'student_code_of_conduct' => ['required', 'mimes:jpg,png,pdf'],
            'sample_student_record' => ['required', 'mimes:jpg,png,pdf'],
            'student_feedback' => ['required', 'mimes:jpg,png,pdf'],
            'staff_policy' => ['required', 'mimes:jpg,png,pdf'],
            'job_descriptions' => ['required', 'mimes:jpg,png,pdf'],
            'staff_meeting_minutes' => ['required', 'mimes:jpg,png,pdf'],
            'board_meeting_minutes' => ['required', 'mimes:jpg,png,pdf'],
            'quality_management_systems' => ['required', 'mimes:jpg,png,pdf'],
            'self_evaluation_instruments' => ['required', 'mimes:jpg,png,pdf'],
            'performance_indicators' => ['required', 'mimes:jpg,png,pdf'],
            'trainer_lists' => ['nullable', 'mimes:jpg,png,pdf'],
            'declaration' => ['required'],
        ];
    }
}
