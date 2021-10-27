<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Region;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ApplicationDetail::with(['trainingprovider', 'trainer'])
            ->where('submitted_from', 'Portal')
            ->where(function ($query) {
                $query->where('application_form_status', 'submitted')
                    ->orWhere('application_form_status', 'Saved');
            })
            ->where('status', 'Pending')
            ->latest()
            ->get();

        return view('registrationaccreditation.applications.index', compact('applications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = ApplicationDetail::findOrFail($id)
            ->load('trainingprovider', 'trainer', 'programmeDetail');

        return view('registrationaccreditation.applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $application = ApplicationDetail::findOrFail($id)
        //     ->load('trainingprovider', 'trainer', 'programmeDetail');
        $registration = ApplicationDetail::findOrFail($id)->load('trainingprovider', 'trainer', 'registrationLicence');

        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $categories = TrainingProviderClassification::all()->pluck('name', 'id');

        return view(
            'registrationaccreditation.applications.edit',
            compact('registration', 'regions', 'districts', 'townvillages', 'categories')
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
