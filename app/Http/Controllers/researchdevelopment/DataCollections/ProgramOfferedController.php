<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreProgramDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateProgramDetailsDataCollectionRequest;
use App\Models\EducationField;
use App\Models\EntryLevelQualification;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProgramOfferedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        
        $programs = ProgramDetailsDataCollection::with('educationfield','learningcenter')->get();

        return view('researchdevelopment.programdetails.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $educationfields = EducationField::all()->pluck('name','id');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');

        $qualifications = EntryLevelQualification::all()->pluck('name');

        return view('researchdevelopment.programdetails.create',compact('educationfields','learningcenters','qualifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramDetailsDataCollectionRequest $request)
    {
        ProgramDetailsDataCollection::create($request->validated());

        return redirect()->route('researchdevelopment.datacollection.program-details.index')
                ->withSuccess('Program details data collection record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('show_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $programdetail = ProgramDetailsDataCollection::with(['educationfield','learningcenter'])
                ->where('id', $id)->get();

        return view('researchdevelopment.programdetails.show', compact('programdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $programdetail = ProgramDetailsDataCollection::where('id', $id)->get();

        $educationfields = EducationField::all()->pluck('name','id');

        $qualifications = EntryLevelQualification::all()->pluck('name');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');

        return view('researchdevelopment.programdetails.edit',
                    compact('programdetail','educationfields','qualifications','learningcenters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateProgramDetailsDataCollectionRequest $request, 
        ProgramDetailsDataCollection $program_detail
        )
    {
        $program_detail->update($request->validated());

        return redirect()->route('researchdevelopment.datacollection.program-details.index')
                ->withSuccess('Program details data collection record successfully updated');
    }

}
