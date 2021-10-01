<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateJobVacancyDataCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_job_vacancy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'position_advertised' => 'required|string',
            'date_advertised' => 'required|date',
            'minimum_required_qualification' => 'required|string',
            'minimum_required_job_experience' => 'required|numeric',
            'fields_of_study' => ['required', 'array'],
            'fields_of_study.*' => ['string'],
            'job_status' => 'required|in:permanent,contract,temporary',
            'institution' => 'required|string',
            'region_id' => 'required|integer',
            'district_id' => 'required|integer',
            'localgoverment_area_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'position_advertised.required' => 'Please Enter Position advertised',
            'minimum_required_qualification.required' => 'Please select minimum required qualification',
            'minimum_required_job_experience.required' => 'Please select minimum required job experience',
            'fields_of_study.required' => 'Please select field of study(s)',
            'job_status.required' => 'Please select Job Status',
            'institution.required' => 'Please Enter institution name',
            'region_id.required' => 'Please select region',
            'region_id.integer' => 'No region has been selected',
            'district_id.required' => 'Please select district',
            'district_id.integer' => 'No district has been selected',
            'localgoverment_area_id.required' => 'Please select local goverment area',
            'localgoverment_area_id.integer' => 'No local goverment area selected',
        ];
    }
}
