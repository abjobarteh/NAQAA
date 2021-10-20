<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssessmentCertification\StoreCertificateEndorsementRequest;
use App\Http\Requests\AssessmentCertification\UpdateCertificateEndorsementRequest;
use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\Role;
use App\Models\User;
use App\Notifications\AssessmentCertification\CertificateEndorsementRequestNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CertificateEndorsementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endorsements = EndorsedCertificateDetail::with('trainingprovider:id,name')->whereYear('created_at', date('Y'))->get();

        return view('assessmentcertification.endorsements.index', compact('endorsements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('assessmentcertification.endorsements.create', compact('institutions', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateEndorsementRequest $request)
    {
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

        EndorsedCertificateDetail::create(
            $request->validated()
                + [
                    'trainer_details' => json_encode($trainerdetails),
                    'request_status' => 'processed',
                    'total_certificates_declared' => $request->total_certificates_declared
                ]
        );

        return redirect()->route('assessment-certification.certificate-endorsements.index')
            ->withSuccess('Certificates Endorsement details successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endorsement = EndorsedCertificateDetail::findOrFail($id);

        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('assessmentcertification.endorsements.show', compact('institutions', 'levels', 'endorsement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endorsement = EndorsedCertificateDetail::findOrFail($id);

        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');

        $levels = QualificationLevel::all()->pluck('name', 'id');

        return view('assessmentcertification.endorsements.edit', compact('institutions', 'levels', 'endorsement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateEndorsementRequest $request, $id)
    {
        $endorsement = EndorsedCertificateDetail::findOrFail($id);
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

        if ($endorsement->request_status == 'pending') {
            $endorsement->update($request->validated() + [
                'trainer_details' => json_encode($trainerdetails),
                'request_status' => 'processed',
                'total_certificates_declared' => $request->total_certificates_declared
            ]);

            $message = "Your Certificate endorsement request has succesfully been processed";
            $endorsement->trainingprovider->user->notify(new CertificateEndorsementRequestNotification(
                $message
            ));
        } else {
            $endorsement->update($request->validated() + [
                'trainer_details' => json_encode($trainerdetails),
                'total_certificates_declared' => $request->total_certificates_declared
            ]);
        }

        return back()->withSuccess('Certificate Endorsement details successfully updated');
    }
}
