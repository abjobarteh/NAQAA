<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\AwardBody;
use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use App\Models\TrainingProviderProgramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgrammeDataCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = ProgramDetailsDataCollection::with('programme')->get();

        return view('portal.institutions.datacollections.programmes.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationfields = EducationField::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name');

        $awardbodies = AwardBody::all()->pluck('name', 'id');

        return view(
            'portal.institutions.datacollections.programmes.create',
            compact('educationfields', 'learningcenters', 'levels', 'awardbodies')
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
        DB::transaction(function () use ($request) {
            $programme =  TrainingProviderProgramme::create([
                'training_provider_id' => $request->training_provider_id,
                'programme_title' => $request->program_name,
                'admission_requirements' => $request->entry_requirements,
                'level_of_fees' => $request->tuition_fee_per_year,
                'field_of_education' => $request->field_of_education,
                'awarding_nody' => $request->awarding_body,
            ]);
            ProgramDetailsDataCollection::create([
                'programme_id' => $programme->id,
                'duration' => $request->duration,
                'tuition_fee_per_year' => $request->tuition_fee_per_year,
                'entry_requirements' => $request->entry_requirements,
                'awarding_body' => $request->awarding_body,
                'academic_year' => date('Y'),
            ]);
        });

        return redirect()->route('portal.institution.datacollection.programmes.index')
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
        $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programme');

        return view('portal.institutions.datacollections.programmes.show', compact('programdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programme');

        $educationfields = EducationField::all()->pluck('name', 'id');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name');

        $awardbodies = AwardBody::all()->pluck('name', 'id');

        return view(
            'portal.institutions.datacollections.programmes.edit',
            compact('programdetail', 'educationfields', 'levels', 'learningcenters', 'awardbodies')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramDetailsDataCollection $program_detail)
    {
        DB::transaction(function () use ($request, $program_detail) {
            $program_detail->programme->update([
                'training_provider_id' => $request->training_provider_id,
                'programme_title' => $request->program_name,
                'admission_requirements' => $request->entry_requirements,
                'level_of_fees' => $request->tuition_fee_per_year,
                'field_of_education' => $request->field_of_education,
                'awarding_nody' => $request->awarding_body,
            ]);
            $program_detail->update([
                'duration' => $request->duration,
                'tuition_fee_per_year' => $request->tuition_fee_per_year,
                'entry_requirements' => $request->entry_requirements,
                'awarding_body' => $request->awarding_body,
            ]);
        });

        return back()->withSuccess('Program details data collection record successfully updated');
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
