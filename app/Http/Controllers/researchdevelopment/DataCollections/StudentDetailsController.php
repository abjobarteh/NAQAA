<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreStudentDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateStudentDetailsDataCollectionRequest;
use App\Models\Country;
use App\Models\EducationField;
use App\Models\EntryLevelQualification;
use App\Models\Ethnicity;
use App\Models\QualificationLevel;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\ResearchDevelopment\StudentDetailsDataCollection;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StudentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        
        $students = StudentDetailsDataCollection::with(['learningcenter','educationField'])->get();

        return view('researchdevelopment.studentdetails.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $qualifications = QualificationLevel::all('name');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');

        $fields = EducationField::all()->pluck('name','id');

        $countries = Country::all('name');

        $ethnicities = Ethnicity::all('name');

        return view('researchdevelopment.studentdetails.create',
                     compact('qualifications','learningcenters','fields', 'countries','ethnicities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentDetailsDataCollectionRequest $request)
    {
        StudentDetailsDataCollection::create($request->all());

        return redirect()->route('researchdevelopment.datacollection.student-details.index')
                ->withSuccess('Student details data collection record successfully added');
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

        $student = StudentDetailsDataCollection::where('id',$id)->get();

        return view('researchdevelopment.studentdetails.show', compact('student'));
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

        $student = StudentDetailsDataCollection::where('id',$id)->get();

        $qualifications = QualificationLevel::all('name');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');

        $fields = EducationField::all()->pluck('name','id');

        $countries = Country::all('name');

        $ethnicities = Ethnicity::all('name');

        return view('researchdevelopment.studentdetails.edit', 
                compact('qualifications','learningcenters','fields','student', 'countries','ethnicities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateStudentDetailsDataCollectionRequest $request, 
        StudentDetailsDataCollection $student_detail
        )
    {
        $student_detail->update($request->validated());

        return redirect()->route('researchdevelopment.datacollection.student-details.index')
                ->withSuccess('Student details data collection record successfully updated');
    }

}
