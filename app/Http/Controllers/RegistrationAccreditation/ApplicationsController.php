<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_portal_applications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = ApplicationDetail::with(['trainingprovider', 'trainer'])
            ->where('submitted_from', 'Portal')
            ->where('application_form_status', 'Submitted')
            ->whereIn('status', ['Pending', 'Ongoing'])
            ->latest()
            ->get();

        return view('registrationAccreditation.applications.index', compact('applications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = ApplicationDetail::findOrFail($id);

        return view('registrationAccreditation.applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = ApplicationDetail::findOrFail($id);

        return view(
            'registrationAccreditation.applications.edit',
            compact('application')
        );
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
        //
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
