<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Models\Country;
use App\Models\QualificationLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TrainingProviderStaffsRank;
use App\Models\TrainingProviderStaffsRole;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\AcademicAdminStaffDataCollection;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Imports\ResearchDevelopment\Sheets\AcademicAdminStaffSheetImport;
use App\Http\Requests\ResearchDevelopment\StoreAcademicAdminStaffDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateAcademicAdminStaffDetailsDataCollectionRequest;

class AcademicAdminStaffDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffs = AcademicAdminStaffDataCollection::with('learningcenter')->get();
        // dd($staffs);
        return view('researchdevelopment.academicadminstaffdetails.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ranks = TrainingProviderStaffsRank::all()->pluck('name', 'id');

        $roles = TrainingProviderStaffsRole::all()->pluck('name', 'id');

        $qualifications = QualificationLevel::all()->pluck('name', 'id');

        $countries = Country::all('name');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.academicadminstaffdetails.create',
            compact('ranks', 'roles', 'qualifications', 'learningcenters', 'countries')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicAdminStaffDetailsDataCollectionRequest $request)
    {
        AcademicAdminStaffDataCollection::create($request->validated());

        return redirect()->route('researchdevelopment.datacollection.academicadminstaff-details.index')
            ->withSuccess('Training provider staff details data collection record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('show_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffdetail = AcademicAdminStaffDataCollection::findOrFail($id)->load('learningcenter');

        return view('researchdevelopment.academicadminstaffdetails.show', compact('staffdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff = AcademicAdminStaffDataCollection::findOrFail($id)->load('learningcenter');

        $ranks = TrainingProviderStaffsRank::all()->pluck('name', 'id');

        $roles = TrainingProviderStaffsRole::all()->pluck('name', 'id');

        $qualifications = QualificationLevel::all()->pluck('name', 'id');

        $countries = Country::all('name');

        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.academicadminstaffdetails.edit',
            compact('staff', 'ranks', 'roles', 'qualifications', 'learningcenters', 'countries')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateAcademicAdminStaffDetailsDataCollectionRequest $request,
        AcademicAdminStaffDataCollection $academicadminstaff_detail
    ) {
        $academicadminstaff_detail->update($request->validated());

        return back()->withSuccess('Training provider staff details data collection record successfully updated');
    }

    public function import(){
      Excel::import(new AcademicAdminStaffSheetImport,request()->file('file'));

      alert('Import Successfully', 'Institution details successfully imported', 'success');
      
      return back();
    }
}
