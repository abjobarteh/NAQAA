<?php

namespace App\Http\Controllers\researchdevelopment;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreJobVacancyDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateJobVacancyDataCollectionRequest;
use App\Models\District;
use App\Models\EducationField;
use App\Models\JobVacancyCategory;
use App\Models\LocalGovermentAreas;
use App\Models\PositionAdvertised;
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

        $jobvacancies = JobVacancy::with('region', 'position', 'vacancyCategory', 'district', 'localgovermentarea')->latest()->get();
        $qualifications = QualificationLevel::all()->pluck('name', 'id');
        $fields = EducationField::all()->pluck('name', 'id');

        // dd($jobvacancies);

        return view(
            'researchdevelopment.jobvacancies.index',
            compact('jobvacancies', 'qualifications', 'fields')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobvacancy = JobVacancy::findOrFail($id)->load('region', 'position');

        return view('researchdevelopment.jobvacancies.show', compact('jobvacancy'));
    }
}
