<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStudent;
use Illuminate\Http\Request;

class StudentsDataCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_provider = TrainingProvider::where('login_id', auth()->user()->id)->get();
        $students = TrainingProviderStudent::with(['trainingprovider', 'awardName'])
            ->where('training_provider_id', $training_provider[0]->id)
            ->get();

        return view('portal.institutions.datacollections.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $levels = QualificationLevel::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $fields = EducationField::all()->pluck('name', 'id');

        $countries = Country::all('name');

        return view(
            'portal.institutions.datacollections.students.create',
            compact('levels', 'learningcenters', 'fields', 'countries')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainingProviderStudent::create($request->all());

        return redirect()->route('portal.institution.datacollection.students.index')
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
        $student = TrainingProviderStudent::findOrFail($id)->load('trainingprovider', 'awardName');

        return view('portal.institutions.datacollections.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = TrainingProviderStudent::findOrFail($id);

        $qualifications = QualificationLevel::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $fields = EducationField::all()->pluck('name', 'id');

        $countries = Country::all('name');

        return view(
            'portal.institutions.datacollections.students.edit',
            compact('qualifications', 'learningcenters', 'fields', 'student', 'countries')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingProviderStudent $student_detail)
    {
        $student_detail->update($request->all());

        return back()->withSuccess('Student details data collection record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
