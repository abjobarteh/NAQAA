<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreProgramDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateProgramDetailsDataCollectionRequest;
use App\Models\AwardBody;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use App\Models\TrainingProviderProgramme;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
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
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = ProgramDetailsDataCollection::with('programmeDetails', 'programmeDetails.programme')->get();

        return view('researchdevelopment.programdetails.index', compact('programs'));
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

        $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programmeDetails', 'programmeDetails.programme');

        return view('researchdevelopment.programdetails.show', compact('programdetail'));
    }
}
