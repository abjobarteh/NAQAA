<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\AcademicAdminStaffDataCollection;
use App\Models\TrainingProviderStaffsRank;
use App\Models\TrainingProviderStaffsRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerDataCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = AcademicAdminStaffDataCollection::with('learningcenter')->get();

        return view('portal.institutions.datacollections.trainers.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = TrainingProviderStaffsRank::all()->pluck('name', 'id');

        $roles = TrainingProviderStaffsRole::all()->pluck('name', 'id');

        $qualifications = QualificationLevel::all()->pluck('name', 'id');

        $countries = Country::all('name');

        return view(
            'portal.institutions.datacollections.trainers.create',
            compact('ranks', 'roles', 'qualifications', 'countries')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training_provider = TrainingProvider::where('login_id', auth()->user()->id)->get();

        if ($request->role != 'Administrative') {
            $trainer_exist = Trainer::where('firstname', 'like', '%' . $request->firstname . '%')
                ->where('middlename', 'like', '%' . $request->middlename . '%')
                ->where('lastname', 'like', '%' . $request->lastname . '%')
                ->where('date_of_birth', $request->date_of_birth)
                ->where('gender', $request->gender)
                ->where('country_of_citizenship', $request->nationality)
                ->exists();
            if (!$trainer_exist) {
                DB::transaction(function () use ($request, $training_provider) {
                    Trainer::create([
                        'firstname' => $request->firstname,
                        'middlename' => $request->middlename,
                        'lastname' => $request->lastname,
                        'gender' => $request->gender,
                        'country_of_citizenship' => $request->nationality,
                        'date_of_birth' => $request->date_of_birth,
                        'email' => $request->email,
                    ]);

                    AcademicAdminStaffDataCollection::create(
                        $request->all() + ['institution_id' => $training_provider[0]->id]
                    );
                });
            } else {
                AcademicAdminStaffDataCollection::create(
                    $request->all() + ['institution_id' => $training_provider[0]->id]
                );
            }
        } else {
            AcademicAdminStaffDataCollection::create(
                $request->all() + ['institution_id' => $training_provider[0]->id]
            );
        }

        return redirect()->route('portal.institution.datacollection.trainers.index')
            ->withSuccess('New Training provider staff details data collection record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staffdetail = AcademicAdminStaffDataCollection::findOrFail($id)->load('learningcenter');

        return view('portal.institutions.datacollections.trainers.show', compact('staffdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = AcademicAdminStaffDataCollection::findOrFail($id)->load('learningcenter');

        $ranks = TrainingProviderStaffsRank::all()->pluck('name', 'id');

        $roles = TrainingProviderStaffsRole::all()->pluck('name', 'id');

        $qualifications = QualificationLevel::all()->pluck('name', 'id');

        $countries = Country::all('name');

        return view(
            'portal.institutions.datacollections.trainers.edit',
            compact('staff', 'ranks', 'roles', 'qualifications', 'countries')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicAdminStaffDataCollection $academicadminstaff_detail)
    {
        $academicadminstaff_detail->update($request->all());

        return back()->withSuccess('Training provider staff details data collection record successfully updated');
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
