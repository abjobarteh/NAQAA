<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreTrainerAccreditationRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateTrainerAccreditationRequest;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerAccreditationDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainersAccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accreditations = ApplicationDetail::with(['trainer:id,firstname,middlename,lastname,date_of_birth,gender,nationality,email,type',
        'trainerAccreditations'])->where('application_category','accreditation')
        ->where('applicant_type','trainer')
        ->latest()
        ->get();
        
        return view('registrationaccreditation.accreditation.trainers.index', compact('accreditations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->get();

        $levels = QualificationLevel::all()->pluck('name','id');

        return view('registrationaccreditation.accreditation.trainers.create', compact('trainers','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerAccreditationRequest $request)
    {
        $areas = $request->filled('areas') ?  $request->input('areas',[]) : [];
        $levels = $request->filled('levels') ?  $request->input('levels',[]) : [];
        $accred_statuses = $request->filled('statuses') ?  $request->input('statuses',[]) : [];
        DB::transaction(function()use($request, $areas, $levels, $accred_statuses){
            // store training provider application details
                $application = ApplicationDetail::create([
                    'trainer_id' => $request->trainer_id,
                    'applicant_type' => 'trainer',
                    'application_no' => $request->application_no,
                    'application_category' => 'accreditation',
                    'application_type' => 'new',
                    'status' => $request->status,
                    'application_date' => $request->application_date,
                ]);

                for ($area=0; $area < count($areas); $area++) {
                    if ($areas[$area] != '') {
                        
                        TrainerAccreditationDetail::create([
                                'trainer_id' => $request->trainer_id,
                                'area' => $areas[$area],
                                'level' => $levels[$area],
                                'application_id' => $application->id,
                                'status' => $request->status === 'accepted' ? $accred_statuses[$area] : null,
                                'accreditation_start_date' => $request->status === 'accepted' && $accred_statuses[$area] === 'accepted' ? $request->accreditation_start_date : null,
                                'accreditation_end_date' => $request->status === 'accepted' && $accred_statuses[$area] === 'accepted' ? $request->accreditation_end_date : null,
                                'accreditation_status' => $request->status === 'accepted' ? 'valid' : null,
                        ]); 
                    }
                }
        });

        return redirect()->route('registration-accreditation.accreditation.trainers.index')
                ->withSuccess('Trainer accreditation details Successfully added in the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accreditation = ApplicationDetail::findOrFail($id);

        $accreditation->load(['trainerAccreditations','trainer']);

        return view('registrationaccreditation.accreditation.trainers.show', compact('accreditation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accreditation = ApplicationDetail::findOrFail($id);
        $trainers = Trainer::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->get();

        $levels = QualificationLevel::all()->pluck('name','id');

        $accreditation->load(['trainerAccreditations','trainer:id,firstname,middlename,lastname']);

        return view('registrationaccreditation.accreditation.trainers.edit', compact('accreditation','levels','trainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainerAccreditationRequest $request, $id)
    {
        $application = ApplicationDetail::findOrFail($id);

        DB::transaction(function()use($request,$application){
            $areas = $request->filled('areas') ?  $request->input('areas',[]) : [];
            $levels = $request->filled('levels') ?  $request->input('levels',[]) : [];
            $accred_statuses = $request->filled('statuses') ?  $request->input('statuses',[]) : [];
            $programmedIDs = $request->filled('accreditation_ids') ?  $request->input('accreditation_ids',[]) : [];
            // Update training provider application details
                $application->update([
                    'status' => $request->status,
                    'application_date' => $request->application_date,
                ]);

                for ($area=0; $area < count($areas); $area++) {
                    if ($areas[$area] != ''){
                        if($programmedIDs[$area] != null || $programmedIDs[$area] != '')
                        {
                            $programmeAccreditation = TrainerAccreditationDetail::findOrFail($programmedIDs[$area]);

                            $programmeAccreditation->update([
                                'area' => $areas[$area],
                                'level' => $levels[$area],
                                'application_id' => $application->id,
                                'status' => $request->status === 'accepted' ? $accred_statuses[$area] : null,
                                'accreditation_start_date' => $request->status === 'accepted' && $accred_statuses[$area] === 'accepted' ? $request->accreditation_start_date : null,
                                'accreditation_end_date' => $request->status === 'accepted' && $accred_statuses[$area] === 'accepted' ? $request->accreditation_end_date : null,
                                'accreditation_status' => $request->status === 'accepted' ? 'valid' : null,
                            ]);
                            
                        }
                        else{
                            TrainerAccreditationDetail::create([
                                'trainer_id' => $application->trainer_id,
                                'area' => $areas[$area],
                                'level' => $levels[$area],
                                'application_id' => $application->id,
                                'status' => $request->status === 'accepted' ? $accred_statuses[$area] : null,
                                'accreditation_start_date' => $request->status === 'accepted' && $accred_statuses[$area] === 'accepted' ? $request->accreditation_start_date : null,
                                'accreditation_end_date' => $request->status === 'accepted' && $accred_statuses[$area] === 'accepted' ? $request->accreditation_end_date : null,
                                'accreditation_status' => $request->status === 'accepted' ? 'valid' : null,
                            ]); 
                        }
                    }
                }
        });

        return back()->withSuccess('Trainer accreditation details Successfully updated in the system');
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
