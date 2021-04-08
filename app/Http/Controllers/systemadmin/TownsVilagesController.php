<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreTownsVillageRequest;
use App\Http\Requests\systemadmin\UpdateTownsVillageRequest;
use App\Models\District;
use App\Models\TownVillage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TownsVilagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_towns_villages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townsVillages = TownVillage::all();
        
        return view('systemadmin.townsVillages.index', compact('townsVillages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_towns_villages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name','id');

        return view('systemadmin.townsVillages.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTownsVillageRequest $request)
    {
       TownVillage::create($request->validated());

       return redirect(route('admin.towns-villages.index'))->withSuccess('Town/Village Successfully created');
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
    public function edit(TownVillage $towns_village)
    {
        abort_if(Gate::denies('edit_towns_villages'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name','id');
        
        return view('systemadmin.townsVillages.edit', compact('towns_village', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTownsVillageRequest $request, TownVillage $towns_village)
    {
        $towns_village->update($request->validated());

        return redirect(route('admin.towns-villages.index'))->withSuccess('Town/Village Successfully updated');
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
