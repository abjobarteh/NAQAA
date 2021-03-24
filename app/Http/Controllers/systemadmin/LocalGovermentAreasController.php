<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreLocalgovermentAreaRequest;
use App\Http\Requests\systemadmin\UpdateLocalgovermentAreaRequest;
use App\Models\LocalGovermentAreas;
use App\Models\Region;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LocalGovermentAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_local_goverment_areas'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $lgas = LocalGovermentAreas::with('region');
        return view('systemadmin.localgovermentareas.index', compact('lgas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_local_goverment_areas'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name','id');

        return view('systemadmin.localgovermentareas.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocalgovermentAreaRequest $request)
    {
        LocalGovermentAreas::create($request->validated());

        return redirect(route('admin.localgovermentareas.index'))->withSuccess('Localgoverment Area successfully added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LocalGovermentAreas $localgovermentarea)
    {
        abort_if(Gate::denies('edit_local_goverment_areas'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('name','id');

        return view('systemadmin.localgovermentareas.edit', compact('regions','localgovermentarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalgovermentAreaRequest $request, LocalGovermentAreas $localgovermentarea)
    {
        $localgovermentarea->update($request->validated());
        
        return redirect(route('admin.localgovermentareas.index'))->withSuccess('Localgoverment Area successfully added!');
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
