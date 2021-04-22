<?php

namespace App\Http\Controllers\ResearchDevelopment;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreJobVacancyDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateJobVacancyDataCollectionRequest;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JobVacanciesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_job_vacancy'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $jobvacancies = JobVacancy::with('region')->get();

        return view('researchdevelopment.jobvacancies.index', compact('jobvacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_job_vacancy'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $qualifications = QualificationLevel::all()->pluck('name','id');

        $fields = EducationField::all()->pluck('name','id');

        $regions = Region::all()->pluck('name','id');

        return view('researchdevelopment.jobvacancies.create', compact('qualifications','fields','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobVacancyDataCollectionRequest $request)
    {
        JobVacancy::create($request->all());
        
        return redirect()->route('researchdevelopment.job-vacancies.index')->withSuccess('Job vacancy successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobvacancy = JobVacancy::where('id', $id)->get();

        return view('researchdevelopment.jobvacancies.show', compact('jobvacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobvacancy = JobVacancy::where('id', $id)->get();

        $qualifications = QualificationLevel::all()->pluck('name','id');

        $fields = EducationField::all()->pluck('name','id');

        $regions = Region::all()->pluck('name','id');

        return view('researchdevelopment.jobvacancies.edit', compact('jobvacancy','qualifications','fields','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobVacancyDataCollectionRequest $request, JobVacancy $job_vacancy)
    {
        $job_vacancy->update($request->all());
        
        return redirect()->route('researchdevelopment.job-vacancies.index')->withSuccess('Job vacancy successfully updated');
    }

}
