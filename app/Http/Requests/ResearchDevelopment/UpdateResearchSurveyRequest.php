<?php

namespace App\Http\Requests\ResearchDevelopment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateResearchSurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('edit_research_survey_documentation'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'purpose' => 'required|string',
            'name_of_authors' => ['required', 'array'],
            'name_of_authors.*' => ['string'],
            'key_findings' => 'required|string',
            'recommendation' => 'required|string',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'funded_by' => 'required|string',
            'cost' => 'required|numeric',
            'remarks' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'research_topic.required' => 'Please Enter Research topic',
            'purpose.required' => 'Please Enter the purpose of Research',
            'name_of_authors.required' => 'Please Enter Author(S) involved',
            'key_findings.required' => 'Please Enter key findings from the research',
            'recommendation.required' => 'Please Enter recommendation from the research',
            'publisher.required' => 'Please Enter the publisher',
            'publication_date.required' => 'Please Enter publication date',
            'publication_date.date' => 'Publication date must be a valid date entry',
            'funded_by.required' => 'Funded by is required. Please Enter funded by',
            'cost.required' => 'Cost is required. Please Enter the cost',
            'remarks.required' => 'Please Enter remarks from the research survey',
        ];
    }
}
