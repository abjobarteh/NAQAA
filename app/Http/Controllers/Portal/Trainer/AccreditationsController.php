<?php

namespace App\Http\Controllers\Portal\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreTrainerAccreditationRequest;
use App\Models\ApplicationStatus;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerAccreditationDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccreditationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accreditations = ApplicationDetail::whereHas('trainer', function (Builder $query) {
            $query->where('login_id', auth()->user()->id);
        })
            ->where('application_type', 'trainer_accreditation')
            ->latest()
            ->get();

        return view('portal.trainers.accreditations.index', compact('accreditations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('portal.trainers.accreditations.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerAccreditationRequest $request)
    {
        $areas = $request->filled('areas') ?  $request->input('areas', []) : [];
        $levels = $request->filled('levels') ?  $request->input('levels', []) : [];
        DB::transaction(function () use ($request, $areas, $levels) {
            // store training provider application details
            $application_no = null;

            $records = ApplicationDetail::all();
            if ($records->isEmpty()) {
                $new_serial_no = '000001';
                $application_no = 'APP-' . $new_serial_no;
            } else {
                $last_record = ApplicationDetail::latest()->limit(1)->first();
                $new_serial_no = str_pad((int)$last_record->serial_no + 1, 6, '0', STR_PAD_LEFT);
                $application_no = 'APP-' . $new_serial_no;
            }
            $serial_no = explode('-', $application_no);

            // store training provider application details
            $application = ApplicationDetail::create([
                'trainer_id' => $request->trainer_id,
                'applicant_type' => 'trainer',
                'application_no' => $application_no,
                'serial_no' => $serial_no[1],
                'application_type' => 'trainer_accreditation',
                'status' => 'Pending',
                'submitted_from' => 'Portal',
                'application_form_status' => 'Saved',
                'application_date' => $request->application_date,
            ]);

            for ($area = 0; $area < count($areas); $area++) {
                if ($areas[$area] != '') {

                    TrainerAccreditationDetail::create([
                        'trainer_id' => $request->trainer_id,
                        'area' => $areas[$area],
                        'level' => $levels[$area],
                        'application_id' => $application->id,
                        'status' => 'Pending',
                    ]);
                }
            }
        });

        return redirect()->route('portal.trainer.accreditations.index')
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

        $accreditation->load(['trainerAccreditations', 'trainer']);

        return view('portal.trainers.accreditations.show', compact('accreditation'));
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

        $levels = QualificationLevel::all()->pluck('name', 'id');

        $accreditation->load(['trainerAccreditations', 'trainer:id,firstname,middlename,lastname']);

        return view('portal.trainers.accreditations.edit', compact('accreditation', 'levels', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $application = ApplicationDetail::findOrFail($id);

        DB::transaction(function () use ($request, $application) {
            $areas = $request->filled('areas') ?  $request->input('areas', []) : [];
            $levels = $request->filled('levels') ?  $request->input('levels', []) : [];
            $accred_statuses = $request->filled('statuses') ?  $request->input('statuses', []) : [];
            $programmedIDs = $request->filled('accreditation_ids') ?  $request->input('accreditation_ids', []) : [];
            // Update training provider application details
            $application->update([
                'status' => $request->status,
                'application_date' => $request->application_date,
            ]);

            for ($area = 0; $area < count($areas); $area++) {
                if ($areas[$area] != '') {
                    if ($programmedIDs[$area] != null || $programmedIDs[$area] != '') {
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
                    } else {
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
