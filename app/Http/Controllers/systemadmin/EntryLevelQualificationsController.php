<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateEntryLevelQualificationRequest;
use App\Http\Requests\systemadmin\UpdateEntryLevelQualificationRequest;
use App\Models\EntryLevelQualification;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EntryLevelQualificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_entry_level_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualifications = EntryLevelQualification::all();

        return view('systemadmin.entryLevelQualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_entry_level_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.entryLevelQualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEntryLevelQualificationRequest $request)
    {
        EntryLevelQualification::create($request->validated());

        return redirect(route('admin.entry-level-qualifications.index'))->withSuccess('Qualification successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_entry_level_qualifications'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualification = EntryLevelQualification::where('id',$id)->get();

        return view('systemadmin.entryLevelQualifications.edit', compact('qualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntryLevelQualificationRequest $request, EntryLevelQualification $entry_level_qualification)
    {
        $entry_level_qualification->update($request->validated());

        return redirect(route('admin.entry-level-qualifications.index'))->withSuccess('Qualification updated successfully');
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
