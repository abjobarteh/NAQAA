<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreDistrictRequest;
use App\Http\Requests\systemadmin\UpdateDistrictRequest;
use App\Models\District;
use App\Models\Region;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_district'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all();

        return view('systemadmin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_district'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name','id');

        return view('systemadmin.districts.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        District::create($request->validated());

        return redirect(route('admin.districts.index'))->withSuccess('District Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        abort_if(Gate::denies('edit_district'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name','id');

        return view('systemadmin.districts.edit', compact('district', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistrictRequest $request, District $district)
    {
        $district->update($request->validated());

        return redirect(route('admin.districts.index'))->withSuccess('District Successfully updated');
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
