<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssessmentCertification\StoreCertificateEndorsementRequest;
use App\Http\Requests\AssessmentCertification\UpdateCertificateEndorsementRequest;
use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
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
        $endorsements = EndorsedCertificateDetail::with('institution:id,name')->whereYear('created_at', date('Y'))->get();

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
                ];
                array_push($trainerdetails, $trainerdetail);
            }
        }

        EndorsedCertificateDetail::create($request->validated() + ['trainer_details' => json_encode($trainerdetails)]);

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

        // dd($endorsement->trainer_details);

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
                ];
                array_push($trainerdetails, $trainerdetail);
            }
        }

        $endorsement->update($request->validated() + ['trainer_details' => json_encode($trainerdetails)]);

        return back()->withSuccess('Certificate Endorsement details successfully updated');
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
