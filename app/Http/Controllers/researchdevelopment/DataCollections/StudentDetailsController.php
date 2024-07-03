<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Models\Region;
use App\Models\Country;
use App\Models\District;
use App\Models\TownVillage;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\LocalGovermentAreas;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TrainingProviderStudent;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Imports\ResearchDevelopment\Sheets\StudentDataImport;
use App\Http\Requests\ResearchDevelopment\StoreStudentDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateStudentDetailsDataCollectionRequest;

class StudentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = TrainingProviderStudent::with(['trainingprovider', 'awardName'])
            ->whereNotNull('programme_name')
            ->get();
            // dd($students);

        return view('researchdevelopment.studentdetails.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $fields = EducationField::all()->pluck('name', 'id');

        $regions = Region::all()->pluck('name', 'id');

        $districts = District::all()->pluck('name', 'id');

        $towns = TownVillage::all()->pluck('name', 'id');

        $countries = Country::all('name');

        $localgovernmentareas = LocalGovermentAreas::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.studentdetails.create',
            compact('levels', 'learningcenters', 'fields', 'countries', 'regions', 'districts', 'towns', 'localgovernmentareas')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentDetailsDataCollectionRequest $request)
    {
        $student_exist = TrainingProviderStudent::where('training_provider_id', $request->training_provider_id)
            ->where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($request->firstname) . '%')
            ->where(function ($query) use ($request) {
                $query->whereNull('middlename')
                    ->orWhere(DB::raw('lower(middlename)'), 'like', '%' . strtolower($request->middlename) . '%');
            })
            ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($request->lastname) . '%')
            ->where('gender', $request->gender)
            ->where('region_id', $request->region_id)
            ->where('district_id', $request->district_id)
            ->where('town_village_id', $request->town_village_id)
            ->whereDate('date_of_birth', $request->date_of_birth)
            ->where('nationality',  $request->nationality)
            ->where('local_government_area', $request->local_government_area)
            ->whereDate('admission_date', $request->admission_date)
            ->where(DB::raw('lower(programme_name)'), 'like', '%' . strtolower($request->programme_name) . '%')
            ->exists();

        if ($student_exist) {
            return back()->withWarning('Student details datacollection details already exist!');
        }
        TrainingProviderStudent::create($request->validated());

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
        abort_if(Gate::denies('show_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = TrainingProviderStudent::findOrFail($id)->load('trainingprovider', 'awardName');

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
        abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = TrainingProviderStudent::findOrFail($id);

        $qualifications = QualificationLevel::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $fields = EducationField::all()->pluck('name', 'id');

        $countries = Country::all('name');

        return view(
            'researchdevelopment.studentdetails.edit',
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
    public function update(
        UpdateStudentDetailsDataCollectionRequest $request,
        TrainingProviderStudent $student_detail
    ) {

        $student_detail->update($request->validated());

        return back()->withSuccess('Student details data collection record successfully updated');
    }

    // importing data from excell
    public function uploadStudentsData(Request $request)
    {
      
      Excel::import(new StudentDataImport,request()->file('file'));

      alert('Import Successfully', 'Institution details successfully imported', 'success');
      
      return back();
    }
}
