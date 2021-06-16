<?php

namespace App\Http\Controllers\ResearchDevelopment;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreJobVacancyDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateJobVacancyDataCollectionRequest;
use App\Models\District;
use App\Models\EducationField;
use App\Models\LocalGovermentAreas;
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
        abort_if(Gate::denies('access_job_vacancy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobvacancies = JobVacancy::with('region')->latest()->get();
        $qualifications = QualificationLevel::all()->pluck('name', 'id');
        $fields = EducationField::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.jobvacancies.index',
            compact('jobvacancies', 'qualifications', 'fields')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_job_vacancy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualifications = QualificationLevel::all()->pluck('name', 'id');
        $fields = EducationField::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $lgas = LocalGovermentAreas::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.jobvacancies.create',
            compact('qualifications', 'fields', 'regions', 'districts', 'lgas')
        );
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
        $jobvacancy = JobVacancy::findOrFail($id);

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
        $jobvacancy = JobVacancy::findOrFail($id);
        $qualifications = QualificationLevel::all()->pluck('name', 'id');
        $fields = EducationField::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $lgas = LocalGovermentAreas::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.jobvacancies.edit',
            compact('jobvacancy', 'qualifications', 'fields', 'regions', 'districts', 'lgas')
        );
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

        return back()->withSuccess('Job vacancy successfully updated');
    }

    public function filterJobVacancy(Request $request)
    {
        $jobvacancy = JobVacancy::query();

        if ($request->filled('qualification')) {
            $jobvacancy->where('minimum_required_qualification', $request->qualification);
        } else if ($request->filled('field_of_education')) {
            $jobvacancy->where('fields_of_study', 'like', "%{$request->field_of_education}%");
        } else if ($request->filled('position_advertised')) {
            $jobvacancy->where('position_advertised', 'like', "%{$request->position_advertised}%");
        } else if ($request->filled('work_experience')) {
            $range = explode('-', $request->work_experience);
            $jobvacancy->whereBetween('minimum_required_job_experience', [$range[0], $range[1]]);
        } else if ($request->filled('qualification') && $request->filled('field_of_education')) {
            $jobvacancy->where('minimum_required_qualification', $request->qualification)
                ->where('fields_of_study', 'like', "%{$request->field_of_education}%");
        } else if (
            $request->filled('position_advertised') &&
            $request->filled('qualification') &&
            $request->filled('field_of_education')
        ) {
            $jobvacancy->where('minimum_required_qualification', $request->qualification)
                ->where('fields_of_study', 'like', "%{$request->field_of_education}%")
                ->where('position_advertised', 'like', "%{$request->position_advertised}%");
        } else if (
            $request->filled('position_advertised') &&
            $request->filled('work_experience')
        ) {
            $range = explode('-', $request->work_experience);
            $jobvacancy
                ->where('position_advertised', 'like', "%{$request->position_advertised}%")
                ->whereBetween('minimum_required_job_experience', [$range[0], $range[1]]);
        }

        if ($jobvacancy->get()->isEmpty()) {
            return json_encode(['status' => 404, 'message' => 'No job vacancies exist under these parameters']);
        } else {
            return json_encode(['status' => 200, 'data' => $jobvacancy->get()]);
        }
    }
}
