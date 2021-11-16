<?php

namespace App\Http\Controllers\Portal\Trainer;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationAccreditation\StoreTrainerRegistrationRequest;
use App\Http\Requests\RegistrationAccreditation\UpdateTrainerRegistrationRequest;
use App\Models\Country;
use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\RegistrationLicenceDetail;
use App\Models\RegistrationAccreditation\Trainer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ApplicationDetail::with([
            'trainer:id,firstname,middlename,lastname,date_of_birth,gender,country_of_citizenship,email',
            'registrationLicence'
        ])
            ->whereHas('trainer', function (Builder $query) {
                $query->where('login_id', auth()->user()->id);
            })
            ->where('application_type', 'trainer_registration')
            ->latest()
            ->get();

        return view('portal.trainers.registrations.index', compact('applications'));
    }
}
