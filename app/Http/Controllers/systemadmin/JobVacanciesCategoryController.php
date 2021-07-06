<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class JobVacanciesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobvacancy_categories = JobVacancyCategory::all();

        return view('systemadmin.jobvacanciescategory.index', compact('jobvacancy_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.jobvacanciescategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        JobVacancyCategory::create($request->all());

        return redirect(route('admin.jobvacancies-category.index'))
            ->withSuccess('Jobvacancy category successfully added');
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

        $jobvacancy_category = JobVacancyCategory::findOrFail($id);

        return view('systemadmin.jobvacanciescategory.edit', compact('jobvacancy_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancyCategory $jobvacancies_category)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'name' => ['required', 'string']
        ]);

        $jobvacancies_category->update($request->all());

        return back()->withSuccess('Jobvacancy category successfuly updated');
    }
}
