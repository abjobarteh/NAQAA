<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramCategoryRequest;
use App\Http\Requests\UpdateProgramCategoryRequest;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProgramCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('program_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programcategories = ProgramCategory::all();

        return view('systemadmin.programCategories.index', compact('programcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('program_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.programCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramCategoryRequest $request)
    {
        ProgramCategory::create($request->all());

        return redirect(route('systemadmin.program-categories.index'))->withSuccess('Program Category successfully created');
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
    public function edit(ProgramCategory $program_category)
    {
        abort_if(Gate::denies('program_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.programCategories.edit', compact('program_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramCategoryRequest $request, ProgramCategory $program_category)
    {
        $program_category->update($request->all());

        return redirect(route('systemadmin.program-categories.index'))->withSuccess('Institution Program category successfully updated');
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
