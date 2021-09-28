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
     * Show the form for creating a new resource.
     * Transferred to a livewire component
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $educationfields = EducationField::all()->pluck('name', 'id');

    //     $learningcenters = TrainingProvider::all()->pluck('name', 'id');

    //     $levels = QualificationLevel::all()->pluck('name');

    //     $awardbodies = AwardBody::all()->pluck('name', 'id');

    //     return view(
    //         'researchdevelopment.programdetails.create',
    //         compact('educationfields', 'learningcenters', 'levels', 'awardbodies')
    //     );
    // }

    /**
     * Store a newly created resource in storage.
     * Transferred to a livewire component
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreProgramDetailsDataCollectionRequest $request)
    // {

    //     DB::transaction(function () use ($request) {
    //         $programme =  TrainingProviderProgramme::create([
    //             'training_provider_id' => $request->training_provider_id,
    //             'programme_title' => $request->program_name,
    //             'admission_requirements' => $request->entry_requirements,
    //             'level_of_fees' => $request->tuition_fee_per_year,
    //             'field_of_education' => $request->field_of_education,
    //             'awarding_body' => $request->awarding_body,
    //         ]);
    //         ProgramDetailsDataCollection::create([
    //             'programme_id' => $programme->id,
    //             'duration' => $request->duration,
    //             'tuition_fee_per_year' => $request->tuition_fee_per_year,
    //             'entry_requirements' => $request->entry_requirements,
    //             'awarding_body' => $request->awarding_body,
    //             'academic_year' => date('Y'),
    //         ]);
    //     });

    //     return redirect()->route('researchdevelopment.datacollection.program-details.index')
    //         ->withSuccess('Program details data collection record successfully added');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('show_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programme');
        // dd($programdetail);

        return view('researchdevelopment.programdetails.show', compact('programdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     * Transferred to a livewire component
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programme');

    //     $educationfields = EducationField::all()->pluck('name', 'id');

    //     $learningcenters = TrainingProvider::all()->pluck('name', 'id');

    //     $levels = QualificationLevel::all()->pluck('name');

    //     $awardbodies = AwardBody::all()->pluck('name', 'id');

    //     return view(
    //         'researchdevelopment.programdetails.edit',
    //         compact('programdetail', 'educationfields', 'levels', 'learningcenters', 'awardbodies')
    //     );
    // }

    /**
     * Update the specified resource in storage.
     * Transferre to a livewire component
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(
    //     UpdateProgramDetailsDataCollectionRequest $request,
    //     ProgramDetailsDataCollection $program_detail
    // ) {
    //     DB::transaction(function () use ($request, $program_detail) {
    //         $program_detail->programme->update([
    //             'training_provider_id' => $request->training_provider_id,
    //             'programme_title' => $request->program_name,
    //             'admission_requirements' => $request->entry_requirements,
    //             'level_of_fees' => $request->tuition_fee_per_year,
    //             'field_of_education' => $request->field_of_education,
    //             'awarding_nody' => $request->awarding_body,
    //         ]);
    //         $program_detail->update([
    //             'duration' => $request->duration,
    //             'tuition_fee_per_year' => $request->tuition_fee_per_year,
    //             'entry_requirements' => $request->entry_requirements,
    //             'awarding_body' => $request->awarding_body,
    //         ]);
    //     });

    //     return back()->withSuccess('Program details data collection record successfully updated');
    // }
}
