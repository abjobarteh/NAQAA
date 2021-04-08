<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateEducationFieldRequest;
use App\Http\Requests\systemadmin\UpdateEducationFieldRequest;
use App\Models\EducationField;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EducationFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_field_of_education'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fields = EducationField::all();

        return view('systemadmin.educationFields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_field_of_education'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.educationFields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEducationFieldRequest $request)
    {
        EducationField::create($request->validated());

        return redirect(route('admin.education-fields.index'))->withSuccess('Field of Education successfully added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_field_of_education'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $field = EducationField::where('id',$id)->get();

        return view('systemadmin.educationFields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationFieldRequest $request, EducationField $education_field)
    {
        $education_field->update($request->validated());

        return redirect(route('admin.education-fields.index'))->withSuccess('Field of Education successfully updated');
    }

}
