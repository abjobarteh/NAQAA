<?php

namespace App\Http\Controllers\AssessmentCertification;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssessmentCertification\StoreStudentRegistrationRequest;
use App\Http\Requests\AssessmentCertification\UpdateStudentRegistrationRequest;
use App\Models\AssessmentCertification\RegisteredStudent;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\District;
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
        $registeredstudents = TrainingProviderStudent::with([
            'programme:id,name', 'level:id,name', 'trainingprovider:id,name', 'registration'
        ])
            ->whereHas('registration')
            ->latest()->get();

        return view('assessmentcertification.registration.index', compact('registeredstudents'));
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
        $programmes = Qualification::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');

        return view(
            'assessmentcertification.registration.create',
            compact('institutions', 'programmes', 'levels', 'regions', 'districts', 'townvillages')
        );
    }

    /**
     * Store a newly created resource in storage.
     * TODO: Refactor this function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRegistrationRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {
            if ($request->file()) {
                $name = time() . '_' . $request->picture->getClientOriginalName();
                $filePath = $request->file('picture')->storeAs('uploads', $name, 'public');

                $newstudent = TrainingProviderStudent::create([
                    'training_provider_id' => $data['training_provider_id'],
                    'candidate_type' => $data['candidate_type'],
                    'academic_year' => $data['academic_year'],
                    'firstname' => $data['firstname'],
                    'middlename' => $data['middlename'],
                    'lastname' => $data['lastname'],
                    'gender' => $data['gender'],
                    'date_of_birth' => $data['date_of_birth'],
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
            }
            $newstudent = TrainingProviderStudent::create([
                'training_provider_id' => $data['training_provider_id'],
                'candidate_type' => $data['candidate_type'],
                'academic_year' => $data['academic_year'],
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'address' => $data['address'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'programme_id' => $data['programme_id'],
                'programme_level_id' => $data['programme_level_id'],
                'region_id' => $data['region_id'],
                'district_id' => $data['district_id'],
                'town_village_id' => $data['town_village_id'],
            ]);

            StudentRegistrationDetail::create([
                'student_id' => $newstudent->id,
                'registration_no' => 'auto-generated',
                'registration_date' => now(),
                'serial_no' => 'auto-generated'
            ]);
        });

        return redirect()->route('assessment-certification.registrations.index')
            ->withSuccess('Student successfully registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        return view(
            'assessmentcertification.registration.show',
            compact('institutions', 'programmes', 'levels', 'regions', 'districts', 'townvillages', 'registeredstudent')
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
        return view(
            'assessmentcertification.registration.edit',
            compact('institutions', 'programmes', 'levels', 'regions', 'districts', 'townvillages', 'registeredstudent')
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

        if ($request->file()) {
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
        }

        $registeredstudent->update([
            'training_provider_id' => $data['training_provider_id'],
            'candidate_type' => $data['candidate_type'],
            'academic_year' => $data['academic_year'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'programme_id' => $data['programme_id'],
            'programme_level_id' => $data['programme_level_id'],
            'region_id' => $data['region_id'],
            'district_id' => $data['district_id'],
            'town_village_id' => $data['town_village_id'],
        ]);

        return back()->withSuccess('Student registration details successfully updated');
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
