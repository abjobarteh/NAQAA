<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreQualificationLevelsRequest;
use App\Http\Requests\systemadmin\UpdateQualificationLevelsRequest;
use App\Models\QualificationLevel;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class QualificationLevelsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualifications = QualificationLevel::all();

        return view('systemadmin.qualificationlevels.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.qualificationlevels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQualificationLevelsRequest $request)
    {
        QualificationLevel::create($request->validated());

        return redirect(route('admin.qualification-levels.index'))->withSuccess('Qualification level successfully added');
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

        $qualification = QualificationLevel::where('id',$id)->get();

        return view('systemadmin.qualificationlevels.edit', compact('qualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQualificationLevelsRequest $request, QualificationLevel $entry_level_qualification)
    {
        $entry_level_qualification->update($request->validated());

        return redirect(route('admin.qualification-levels.index'))->withSuccess('Qualification level updated successfully');
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
