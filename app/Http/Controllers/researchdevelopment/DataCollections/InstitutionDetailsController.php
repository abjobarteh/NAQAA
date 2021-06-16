<?php

namespace App\Http\Controllers\researchdevelopment\DataCollections;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchDevelopment\StoreInstitutionDetailsDataCollectionRequest;
use App\Http\Requests\ResearchDevelopment\UpdateInstitutionDetailsDataCollectionRequest;
use App\Models\District;
use App\Models\LocalGovermentAreas;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class InstitutionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institutionsdata = InstitutionDetailsDataCollection::with('trainingprovider:id,name')->latest()->get();

        return view('researchdevelopment.institutiondetails.index', compact('institutionsdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ownerships = TrainingProviderOwnership::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $lgas = LocalGovermentAreas::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.institutiondetails.create',
            compact('ownerships', 'classifications', 'districts', 'lgas', 'regions')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitutionDetailsDataCollectionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $trainingprovider = TrainingProvider::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_phone' => $request->phone,
                'address' => $request->address,
                'po_box' => $request->po_box,
                'webiste' => $request->webiste,
                'region_id' => $request->region_id,
                'district_id' => $request->district_id,
                'lga_id' => $request->lga_id,
                'ownership_id' => $request->ownership_id,
                'classification_id' => $request->classification_id,
                'is_registered' => 0,
            ]);

            InstitutionDetailsDataCollection::create([
                'institution_id' => $trainingprovider->id,
                'financial_source' => $request->financial_source,
                'estimated_yearly_turnover' => $request->estimated_yearly_turnover,
                'enrollment_capacity' => $request->enrollment_capacity,
                'no_of_lecture_rooms' => $request->no_of_lecture_rooms,
                'no_of_computer_labs' => $request->no_of_computer_labs,
                'total_no_of_computers_in_labs' => $request->total_no_of_computers_in_labs,
                'academic_year' => date('Y'),
            ]);
        });

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
        abort_if(Gate::denies('show_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = InstitutionDetailsDataCollection::findOrFail($id)->load('trainingprovider');

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
        abort_if(Gate::denies('edit_data_collection'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = InstitutionDetailsDataCollection::findOrFail($id)->load('trainingprovider');
        $ownerships = TrainingProviderOwnership::all()->pluck('name', 'id');
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $lgas = LocalGovermentAreas::all()->pluck('name', 'id');

        return view(
            'researchdevelopment.institutiondetails.edit',
            compact('ownerships', 'classifications', 'districts', 'lgas', 'data', 'regions')
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
        UpdateInstitutionDetailsDataCollectionRequest $request,
        InstitutionDetailsDataCollection $institution_detail
    ) {

        DB::transaction(function () use ($institution_detail, $request) {
            $institution_detail->trainingprovider->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_phone' => $request->phone,
                'address' => $request->address,
                'po_box' => $request->po_box,
                'webiste' => $request->webiste,
                'region_id' => $request->region_id,
                'district_id' => $request->district_id,
                'lga_id' => $request->lga_id,
                'ownership_id' => $request->ownership_id,
                'classification_id' => $request->classification_id,
            ]);

            $institution_detail->update([
                'financial_source' => $request->financial_source,
                'estimated_yearly_turnover' => $request->estimated_yearly_turnover,
                'enrollment_capacity' => $request->enrollment_capacity,
                'no_of_lecture_rooms' => $request->no_of_lecture_rooms,
                'no_of_computer_labs' => $request->no_of_computer_labs,
                'total_no_of_computers_in_labs' => $request->total_no_of_computers_in_labs,
            ]);
        });

        return back()->withSuccess('Institution details data collection record successfully updated');
    }
}
