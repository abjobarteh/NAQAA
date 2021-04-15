<?php

namespace App\Http\Controllers\researchdevelopment;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreResearchSurveyRequest;
use App\Http\Requests\ResearchDevelopment\UpdateResearchSurveyRequest;
use App\Models\ResearchDevelopment\ResearchSurvey;
use Illuminate\Support\Facades\Gate;
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
        abort_if(Gate::denies('access_research_survey_documentation'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $surveys = ResearchSurvey::all();

        return view('researchdevelopment.researchsurveydocumentation.index',compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_research_survey_documentation'), Response::HTTP_FORBIDDEN,'403 Forbidden');

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
        abort_if(Gate::denies('show_research_survey_documentation'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $survey = ResearchSurvey::where('id', $id)->get();

        return view('researchdevelopment.researchsurveydocumentation.show',compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_research_survey_documentation'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $survey = ResearchSurvey::where('id', $id)->get();

        return view('researchdevelopment.researchsurveydocumentation.edit',compact('survey'));
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

        return redirect()->route('researchdevelopment.research-survey-documentation.index')
                ->withSuccess('Research survey documentation successfully updated');
    }

}
