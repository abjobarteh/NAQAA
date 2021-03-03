<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeStandardsRequest;
use App\Http\Requests\updateStandardsRequest;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StandardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('standards_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $standards = Standard::all('id','title','description','maximum_score');

        return view('systemadmin.standards.index', compact('standards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('standards_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.standards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeStandardsRequest $request)
    {
        Standard::create($request->all());

        return redirect()->route('systemadmin.standards.index')->withSuccess('Standard successfully added');
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
    public function edit(Standard $standard)
    {
        abort_if(Gate::denies('standards_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.standards.edit', compact('standard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateStandardsRequest $request, Standard $standard)
    {
        $standard->update($request->all());

        return redirect()->route('systemadmin.standards.index')->withSuccess('Standard updated successfully');
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
