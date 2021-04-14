<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreStudentDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateStudentDetailsDataCollectionRequest;
use App\Models\Country;
use App\Models\EducationField;
use App\Models\EntryLevelQualification;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\ResearchDevelopment\StudentDetailsDataCollection;

class StudentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentDetailsDataCollection::with(['learningcenter','educationField','studentaward'])->get();

        return view('researchdevelopment.studentdetails.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualifications = EntryLevelQualification::all()->pluck('name','id');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');

        $fields = EducationField::all()->pluck('name','id');

        $countries = Country::all('name');

        return view('researchdevelopment.studentdetails.create', compact('qualifications','learningcenters','fields', 'countries'));
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
        $student = StudentDetailsDataCollection::where('id',$id)->get();

        $qualifications = EntryLevelQualification::all()->pluck('name','id');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');

        $fields = EducationField::all()->pluck('name','id');

        $countries = Country::all('name');

        return view('researchdevelopment.studentdetails.edit', 
                compact('qualifications','learningcenters','fields','student', 'countries'));
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
