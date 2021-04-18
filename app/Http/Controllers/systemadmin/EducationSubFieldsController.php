<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateEducationSubFieldRequest;
use App\Http\Requests\systemadmin\UpdateEducationSubFieldRequest;
use App\Models\EducationField;
use App\Models\EducationSubField;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EducationSubFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subfields = EducationSubField::with('educationField')->get();

        return view('systemadmin.educationSubFields.index', compact('subfields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fields = EducationField::all()->pluck('name','id');

        return view('systemadmin.educationSubFields.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEducationSubFieldRequest $request)
    {
        EducationSubField::create($request->validated());

        return redirect(route('admin.education-subfields.index'))->withSuccess('SubField of Education successfully added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subfield = EducationSubField::where('id',$id)->get();

        $fields = EducationField::all()->pluck('name','id');

        return view('systemadmin.educationSubFields.edit', compact('subfield','fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationSubFieldRequest $request, EducationSubField $education_subfield)
    {

        $education_subfield->update($request->validated());

        return redirect(route('admin.education-subfields.index'))->withSuccess('SubField of Education successfully updated');
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
