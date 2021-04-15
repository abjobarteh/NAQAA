<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreResearchSurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('create_research_survey_documentation'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        
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
            'research_topic' => 'required|string',
            'purpose' => 'required|string|max:100',
            'name_of_authors' => ['required','array'],
            'name_of_authors.*' => ['string'],
            'key_findings' => 'required|string|max:300',
            'recommendation' => 'required|string|max:300',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'funded_by' => 'required|string',
            'cost' => 'required|numeric',
            'remarks' => 'required|string|max:300',
        ];
    }

    public function messages()
    {
        return [
            'research_topic.required' => 'Please Enter Research topic',
            'purpose.required' => 'Please Enter the purpose of Research',
            'purpose.max' => 'Research purpose should be less than 300 characters',
            'name_of_authors.required' => 'Please Enter Author(S) involved',
            'key_findings.required' => 'Please Enter key findings from the research',
            'key_findings.max' => 'Research find should be less than 300 characters',
            'recommendation.required' => 'Please Enter recommendation from the research',
            'recommendation.max' => 'Recommendation should be less than 300 characters',
            'publisher.required' => 'Please Enter the publisher',
            'publication_date.required' => 'Please Enter publication date',
            'publication_date.date' => 'Publication date must be a valid date entry',
            'funded_by.required' => 'Funded by is required. Please Enter funded by',
            'cost.required' => 'Cost is required. Please Enter the cost',
            'remarks.required' => 'Please Enter remarks from the research survey',
            'remarks.max' => 'Remarks should be less than 300 characters',
        ];
    }
}
