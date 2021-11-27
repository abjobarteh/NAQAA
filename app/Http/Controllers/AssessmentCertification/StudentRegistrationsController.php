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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_registration = StudentRegistrationDetail::find($id)
            ->load(['programme', 'level', 'trainingprovider', 'registeredStudent']);
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');
        $programmes = Qualification::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $nationalities = Country::all()->pluck('name', 'id');
        $local_languages = LocalLanguage::all()->pluck('name', 'id');

        return view(
            'assessmentcertification.registration.show',
            compact(
                'institutions',
                'programmes',
                'levels',
                'regions',
                'districts',
                'townvillages',
                'student_registration',
                'nationalities',
                'local_languages'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registeredstudent = TrainingProviderStudent::find($id)
            ->load(['programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration']);
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'valid');
        })->pluck('name', 'id');
        $programmes = Qualification::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $nationalities = Country::all()->pluck('name', 'id');
        $local_languages = LocalLanguage::all()->pluck('name', 'id');

        return view(
            'assessmentcertification.registration.edit',
            compact(
                'institutions',
                'programmes',
                'levels',
                'regions',
                'districts',
                'townvillages',
                'registeredstudent',
                'nationalities',
                'local_languages'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     * TODO: This function needs refactoring
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRegistrationRequest $request, $id)
    {
        $registeredstudent = TrainingProviderStudent::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('picture')) {
            $name = time() . '_' . $request->picture->getClientOriginalName();
            $filePath = $request->file('picture')->storeAs('uploads', $name, 'public');

            $registeredstudent->update([
                'training_provider_id' => $data['training_provider_id'],
                'candidate_type' => $data['candidate_type'],
                'academic_year' => $data['academic_year'],
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'nationality' => $data['nationality'],
                'local_language' => $data['local_language'],
                'address' => $data['address'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'programme_id' => $data['programme_id'],
                'programme_level_id' => $data['programme_level_id'],
                'region_id' => $data['region_id'],
                'district_id' => $data['district_id'],
                'town_village_id' => $data['town_village_id'],
                'picture' => '/storage/' . $filePath,
            ]);
        } else {
            $registeredstudent->update([
                'training_provider_id' => $data['training_provider_id'],
                'candidate_type' => $data['candidate_type'],
                'academic_year' => $data['academic_year'],
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'nationality' => $data['nationality'],
                'local_language' => $data['local_language'],
                'address' => $data['address'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'programme_id' => $data['programme_id'],
                'programme_level_id' => $data['programme_level_id'],
                'region_id' => $data['region_id'],
                'district_id' => $data['district_id'],
                'town_village_id' => $data['town_village_id'],
            ]);
        }

        return back()->withSuccess('Student registration details successfully updated');
    }
}
