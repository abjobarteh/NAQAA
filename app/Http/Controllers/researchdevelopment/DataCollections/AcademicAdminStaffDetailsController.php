<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreAcademicAdminStaffDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateAcademicAdminStaffDetailsDataCollectionRequest;
use App\Models\EntryLevelQualification;
use App\Models\ResearchDevelopment\AcademicAdminStaffDataCollection;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\TrainingProviderStaffsRank;
use App\Models\TrainingProviderStaffsRole;
use Illuminate\Http\Request;

class AcademicAdminStaffDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = AcademicAdminStaffDataCollection::with(['rank','role','learningcenter'])->get();

        return view('researchdevelopment.academicadminstaffdetails.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = AcademicAdminStaffDataCollection::with(['rank','role','learningcenter'])->get();

        $ranks = TrainingProviderStaffsRank::all()->pluck('name','id');

        $roles = TrainingProviderStaffsRole::all()->pluck('name','id');

        $qualifications = EntryLevelQualification::all()->pluck('name','id');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');
        
        return view('researchdevelopment.academicadminstaffdetails.create', 
                    compact('staffs','ranks','roles','qualifications','learningcenters'));
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
        $staffdetail = AcademicAdminStaffDataCollection::with(['rank','role','learningcenter'])->where('id',$id)->get();

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
        $staff = AcademicAdminStaffDataCollection::where('id',$id)->get();

        $ranks = TrainingProviderStaffsRank::all()->pluck('name','id');

        $roles = TrainingProviderStaffsRole::all()->pluck('name','id');

        $qualifications = EntryLevelQualification::all()->pluck('name','id');

        $learningcenters = InstitutionDetailsDataCollection::all()->pluck('training_provider_name','id');
        
        return view('researchdevelopment.academicadminstaffdetails.edit', 
                compact('staff','ranks','roles','qualifications','learningcenters'));
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
        )
    {
        $academicadminstaff_detail->update($request->validated());

        return redirect()->route('researchdevelopment.datacollection.academicadminstaff-details.index')
                ->withSuccess('Training provider staff details data collection record successfully updated');

    }

}
