<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\Role;
use App\Models\User;
use App\Notifications\AssessmentCertification\CertificateEndorsementRequestNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CertificateEndorsementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endorsements = EndorsedCertificateDetail::whereHas('trainingprovider', function (Builder $query) {
            $query->where('login_id', auth()->user()->id);
        })
            ->with('trainingprovider:id,name')
            ->latest()
            ->whereYear('created_at', date('Y'))->get();

        return view('portal.institutions.endorsements.index', compact('endorsements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('portal.institutions.endorsements.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainerfirstnames = $request->filled('firstnames') ?  $request->input('firstnames', []) : [];
        $trainerdetails = [];
        $trainingprovider = TrainingProvider::where('login_id', auth()->user()->id)->first();

        if (!$trainingprovider->has('validLicence')->exists()) {
            return redirect()->route('portal.institution.certificate-endorsements.index')
                ->withInfo('Your are not yet registered to submit a Certificate endorsement request');
        }

        for ($trainerfirstname = 0; $trainerfirstname < count($trainerfirstnames); $trainerfirstname++) {
            if ($trainerfirstnames[$trainerfirstname] != '') {
                $trainerdetail = [
                    'firstname' => $trainerfirstnames[$trainerfirstname],
                    'middlename' => $request->middlenames[$trainerfirstname] ?? '',
                    'lastname' => $request->lastnames[$trainerfirstname],
                    'license_no' => $request->license_nos[$trainerfirstname],
                    'module' => $request->modules[$trainerfirstname],
                ];
                array_push($trainerdetails, $trainerdetail);
            }
        }

        EndorsedCertificateDetail::create([
            'training_provider_id' => $trainingprovider->id,
            'programme' => $request->programme,
            'level' => $request->level,
            'total_certificates_declared' => $request->total_certificates_declared,
            'total_males' => $request->total_males,
            'total_females' => $request->total_females,
            'trainer_details' => json_encode($trainerdetails),
            'programme_start_date' => $request->programme_start_date,
            'programme_end_date' => $request->programme_end_date,
            'request_status' => 'pending'
        ]);

        $role = Role::where('slug', 'assessment_and_certification_module')->get();
        $message = "New Certificate endorsement request from " . auth()->user()->username;

        $role[0]->notify(new CertificateEndorsementRequestNotification(
            $message
        ));

        return redirect()->route('portal.institution.certificate-endorsements.index')
            ->withSuccess('Your Certificate Endorsement Request has successfully been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $levels = QualificationLevel::all()->pluck('name', 'id');

        $endorsement = EndorsedCertificateDetail::findOrFail($id);

        return view('portal.institutions.endorsements.show', compact('endorsement', 'levels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $levels = QualificationLevel::all()->pluck('name', 'id');

        $endorsement = EndorsedCertificateDetail::findOrFail($id);

        return view('portal.institutions.endorsements.edit', compact('endorsement', 'levels'));
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
        $endorsement = EndorsedCertificateDetail::findOrFail($id);
        if ($endorsement->request_Status === 'Pending') {
            $trainerfirstnames = $request->filled('firstnames') ?  $request->input('firstnames', []) : [];
            $trainerdetails = [];
            for ($trainerfirstname = 0; $trainerfirstname < count($trainerfirstnames); $trainerfirstname++) {
                if ($trainerfirstnames[$trainerfirstname] != '') {
                    $trainerdetail = [
                        'firstname' => $trainerfirstnames[$trainerfirstname],
                        'middlename' => $request->middlenames[$trainerfirstname] ?? '',
                        'lastname' => $request->lastnames[$trainerfirstname],
                        'license_no' => $request->license_nos[$trainerfirstname],
                        'module' => $request->modules[$trainerfirstname],
                    ];
                    array_push($trainerdetails, $trainerdetail);
                }
            }

            $endorsement->update([
                'programme' => $request->programme,
                'level' => $request->level,
                'total_certificates_declared' => $request->total_certificates_declared,
                'total_males' => $request->total_males,
                'total_females' => $request->total_females,
                'trainer_details' => json_encode($trainerdetails),
                'programme_start_date' => $request->programme_start_date,
                'programme_end_date' => $request->programme_end_date,
            ]);

            return back()->withSuccess('Certificate Endorsement Request successfully updated');
        }

        return back()->withInfo(
            'Certificate Endorsement Request cannot be edited as it has already been processed'
        );
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
