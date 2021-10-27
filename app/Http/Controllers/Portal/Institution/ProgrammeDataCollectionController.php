<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\AwardBody;
use App\Models\EducationField;
use App\Models\Program;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use App\Models\TrainingProviderProgramme;
use Carbon\Carbon;
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
        $programs = ProgramDetailsDataCollection::with('programmeDetails')->get();

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
        $training_provider_id = TrainingProvider::where('login_id', auth()->user()->id)->first();
        if (Program::where('name', 'like', '%' . $request->program_name . '%')->exists()) {
            $program_catalogue = Program::where('name', 'like', '%' . $request->program_name . '%')->first();
        } else {
            $program_catalogue = Program::create([
                'name' => $request->program_name
            ]);
        }

        $programme = TrainingProviderProgramme::where('training_provider_id', $training_provider_id->id)
            ->where('programme_id', $program_catalogue->id)
            ->exists();

        if (!$programme) {
            DB::transaction(function () use ($request, $training_provider_id, $program_catalogue) {
                $new_programme =  TrainingProviderProgramme::create([
                    'training_provider_id' => $training_provider_id->id,
                    'programme_id' => $program_catalogue->id,
                    'admission_requirements' => $request->entry_requirements,
                    'level_of_fees' => $request->tuition_fee_per_year,
                    'field_of_education' => $request->field_of_education,
                    'awarding_body' => $request->awarding_body,
                    'is_accredited' => 0
                ]);
                ProgramDetailsDataCollection::create([
                    'programme_id' => $new_programme->id,
                    'duration' => $request->duration,
                    'tuition_fee_per_year' => $request->tuition_fee_per_year,
                    'entry_requirements' => $request->entry_requirements,
                    'awarding_body' => $request->awarding_body,
                    'academic_year' => (Carbon::now())->format('Y'),
                ]);
            });
        } else {
            $existing_programme = TrainingProviderProgramme::where('training_provider_id', $training_provider_id->id)
                ->where('programme_id', $program_catalogue->id)
                ->first();
            ProgramDetailsDataCollection::create([
                'programme_id' => $existing_programme->id,
                'duration' => $request->duration,
                'tuition_fee_per_year' => $request->tuition_fee_per_year,
                'entry_requirements' => $request->entry_requirements,
                'awarding_body' => $request->awarding_body,
                'academic_year' => (Carbon::now())->format('Y'),
            ]);
        }


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
        $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programmeDetails');

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
        $programdetail = ProgramDetailsDataCollection::findOrFail($id)->load('programmeDetails');

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
    public function update(Request $request,  $id)
    {
        $program_detail = ProgramDetailsDataCollection::findOrFail($id)->load('programmeDetails');

        if (!$program_detail->programmeDetails->is_accredited == 0) {
            DB::transaction(function () use ($request, $program_detail) {
                $program_detail->update([
                    'duration' => $request->duration,
                    'tuition_fee_per_year' => $request->tuition_fee_per_year,
                    'entry_requirements' => $request->entry_requirements,
                    'awarding_body' => $request->awarding_body,
                ]);
            });
        } else {
            $program_detail->update([
                'duration' => $request->duration,
                'tuition_fee_per_year' => $request->tuition_fee_per_year,
                'entry_requirements' => $request->entry_requirements,
                'awarding_body' => $request->awarding_body,
            ]);
        }


        return back()->withSuccess('Program details data collection record successfully updated');
    }
}
