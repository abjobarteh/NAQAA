<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\ApplicationDetail;

class TrainersRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainer_registrations = ApplicationDetail::with([
            'trainer:id,firstname,middlename,lastname,date_of_birth,gender,country_of_citizenship,email',
            'registrationLicence'
        ])->where('application_type', 'trainer_registration')
            ->latest()
            ->get();

        return view('registrationaccreditation.registration.trainers.index', compact('trainer_registrations'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = ApplicationDetail::findOrFail($id)->load('trainer', 'registrationLicence');

        return view('registrationaccreditation.registration.trainers.show', compact('registration'));
    }
}
