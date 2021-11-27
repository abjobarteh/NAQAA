<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssessmentCertification\StoreStudentRegistrationRequest;
use App\Http\Requests\AssessmentCertification\UpdateStudentRegistrationRequest;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Country;
use App\Models\District;
use App\Models\LocalLanguage;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use App\Models\TrainingProviderStudent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class StudentRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registeredstudents = StudentRegistrationDetail::with([
            'programme', 'level', 'trainingprovider', 'registeredStudent'
        ])
            ->latest()->get();

        return view('assessmentcertification.registration.index', compact('registeredstudents'));
    }
}
