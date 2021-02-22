<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstitutionCategoryRequest;
use App\Http\Requests\UpdateInstitutionCategoryRequest;
use App\Models\InstitutionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class InstitutionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('institution_categories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = InstitutionCategory::all();

        return view('systemadmin.institutionCategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('institution_categories_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.institutionCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstitutionCategoryRequest $request)
    {
        InstitutionCategory::create($request->all());

        return redirect(route('systemadmin.institution-categories.index'))->withSuccess('Institution category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('institution_categories_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InstitutionCategory $institution_category)
    {
        abort_if(Gate::denies('institution_categories_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.institutionCategories.edit', compact('institution_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstitutionCategoryRequest $request, InstitutionCategory $institution_category)
    {
        $institution_category->update($request->all());
        
        return redirect(route('systemadmin.institution-categories.index'))->withSuccess('Institution category successfully updated');
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
