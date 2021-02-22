<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstitutionCategoryRequest;
use App\Http\Requests\StoreInstitutionTypeRequest;
use App\Http\Requests\UpdateInstitutionCategoryRequest;
use App\Http\Requests\UpdateInstitutionTypeRequest;
use App\Models\InstitutionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class InstitutionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('institution_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = InstitutionType::all();

        return view('systemadmin.institutionTypes.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('institution_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.institutionTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitutionTypeRequest $request)
    {
        InstitutionType::create($request->all());

        return redirect(route('systemadmin.institution-types.index'))->withSuccess('Institution type successfully created');
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
    public function edit(InstitutionType $institution_type)
    {
        abort_if(Gate::denies('institution_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.institutionTypes.edit', compact('institution_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstitutionTypeRequest $request, InstitutionType $institution_type)
    {
        $institution_type->update($request->all());
        return redirect(route('systemadmin.institution-types.index'))->withSuccess('Institution category successfully updated');
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
