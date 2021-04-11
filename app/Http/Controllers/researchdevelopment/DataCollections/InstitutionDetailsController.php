<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreInstitutionDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateInstitutionDetailsDataCollectionRequest;
use App\Models\District;
use App\Models\LocalGovermentAreas;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Illuminate\Http\Request;

class InstitutionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $institutionsdata = InstitutionDetailsDataCollection::all();

        return view('researchdevelopment.institutiondetails.index', compact('institutionsdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ownerships = TrainingProviderOwnership::all()->pluck('name','id');
        $classifications = TrainingProviderClassification::all()->pluck('name','id');
        $districts = District::all()->pluck('name','id');
        $lgas = LocalGovermentAreas::all()->pluck('name','id');

        return view('researchdevelopment.institutiondetails.create',compact('ownerships','classifications','districts','lgas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitutionDetailsDataCollectionRequest $request)
    {
        InstitutionDetailsDataCollection::create($request->validated());

        return redirect()->route('researchdevelopment.datacollection.institution-details.index')
                ->withSuccess('Institution details data collection record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = InstitutionDetailsDataCollection::with(['ownership','classification','district','localgovermentarea'])
                ->where('id', $id)->get();

        return view('researchdevelopment.institutiondetails.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = InstitutionDetailsDataCollection::where('id', $id)->get();
        $ownerships = TrainingProviderOwnership::all()->pluck('name','id');
        $classifications = TrainingProviderClassification::all()->pluck('name','id');
        $districts = District::all()->pluck('name','id');
        $lgas = LocalGovermentAreas::all()->pluck('name','id');

        return view('researchdevelopment.institutiondetails.edit',
                    compact('ownerships','classifications','districts','lgas','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateInstitutionDetailsDataCollectionRequest $request, 
        InstitutionDetailsDataCollection $institution_detail
        )
    {
        $institution_detail->update($request->validated());

        return redirect()->route('researchdevelopment.datacollection.institution-details.index')
                ->withSuccess('Institution details data collection record successfully updated');
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
