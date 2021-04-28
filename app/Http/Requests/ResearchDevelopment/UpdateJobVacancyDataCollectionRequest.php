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
        abort_if(Gate::denies('edit_job_vacancy'), Response::HTTP_FORBIDDEN,'403 Forbidden');

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
            'minimum_required_qualification' => 'required|string',
            'fields_of_study' => ['required','array'],
            'fields_of_study.*' => ['string'],
            'job_status' => 'required|string|in:part_time,full_time',
            'region_id' => 'required|numeric|integer',
            'institution' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'position_advertised.required' => 'Please Enter Position advertised',
            'minimum_required_qualification.required' => 'Please select minimum required qualification',
            'fields_of_study.required' => 'Please select field of study(s)',
            'job_status.required' => 'Please select Job Status',
            'region_id.required' => 'Please select region of advertised position',
            'region_id.numeric' => 'Please select a valid region',
            'institution.required' => 'Please Enter institution name'
        ];
    }
}
