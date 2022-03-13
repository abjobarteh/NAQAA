<?php

namespace App\Http\Controllers\researchdevelopment;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreResearchSurveyRequest;
use App\Http\Requests\ResearchDevelopment\UpdateResearchSurveyRequest;
use App\Models\ResearchDevelopment\ResearchSurvey;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class ResearchSurveyDocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_research_survey_documentation'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surveys = ResearchSurvey::all();
        // dd($surveys);

        return view('researchdevelopment.researchsurveydocumentation.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_research_survey_documentation'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('researchdevelopment.researchsurveydocumentation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearchSurveyRequest $request)
    {
        ResearchSurvey::create($request->validated());

        return redirect()->route('researchdevelopment.research-survey-documentation.index')
            ->withSuccess('Research survey documentation successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('show_research_survey_documentation'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $survey = ResearchSurvey::where('id', $id)->get();

        return view('researchdevelopment.researchsurveydocumentation.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_research_survey_documentation'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $survey = ResearchSurvey::where('id', $id)->get();

        return view('researchdevelopment.researchsurveydocumentation.edit', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResearchSurveyRequest $request, ResearchSurvey $research_survey_documentation)
    {
        $research_survey_documentation->update($request->validated());

        return back()->withSuccess('Research survey documentation successfully updated');
    }

    public function filterResearchSurvey(Request $request)
    {
        $research = ResearchSurvey::query();

        if ($request->filled('topic')) {
            $research->where('research_topic', $request->research_topic);
        } else if ($request->filled('purpose')) {
            $research->where('purpose', 'like', "%{$request->purpose}%");
        } else if ($request->filled('main_findings')) {
            $research->where('key_findings', 'like', "%{$request->main_findings}%");
        } else if ($request->filled('authors')) {
            $research->where('name_of_authors', 'like', "%{$request->authors}%");
        } else if ($request->filled('funding_body')) {
            $research->where('funded_by', 'like', "%{$request->funding_body}%");
        } else if ($request->filled('publication_date')) {
            $research->where('publication_date', 'like', "%{$request->publication_date}%");
        } else if ($request->filled('topic') && $request->filled('purpose')) {
            $research->where('research_topic', $request->qualification)
                ->where('purpose', 'like', "%{$request->field_of_education}%");
        } else if (
            $request->filled('topic') &&
            $request->filled('purpose') &&
            $request->filled('main_findings')
        ) {
            $research->where('research_topic', $request->topic)
                ->where('purpose', 'like', "%{$request->purpose}%")
                ->where('key_findings', 'like', "%{$request->main_findings}%");
        }

        if ($research->get()->isEmpty()) {
            return json_encode(['status' => 404, 'message' => 'No research surveys exist under these parameters']);
        }

        return json_encode(['status' => 200, 'data' => $research->get()]);
    }
}
