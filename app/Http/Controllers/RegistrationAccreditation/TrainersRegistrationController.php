<?php

namespace App\Http\Controllers\RegistrationAccreditation;

use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TrainersRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_registration'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainer_registrations = ApplicationDetail::with([
            'trainer:id,firstname,middlename,lastname,date_of_birth,gender,country_of_citizenship,email',
            'registrationLicence'
        ])->where('application_type', 'trainer_registration')
            ->latest()
            ->get();

        return view('registrationAccreditation.registration.trainers.index', compact('trainer_registrations'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('show_registration'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registration = ApplicationDetail::findOrFail($id)->load('trainer', 'registrationLicence');

        return view('registrationAccreditation.registration.trainers.show', compact('registration'));
    }
}
