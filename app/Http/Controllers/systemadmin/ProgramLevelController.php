<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramLevelRequest;
use App\Http\Requests\UpdateProgramLevelRequest;
use App\Models\ProgramLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProgramLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('program_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programlevels = ProgramLevel::all();

        return view('systemadmin.programLevels.index', compact('programlevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('program_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.programLevels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramLevelRequest $request)
    {
        ProgramLevel::create($request->all());

        return redirect(route('systemadmin.program-levels.index'))->withSuccess('Program Level successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('program_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramLevel $program_level)
    {
        abort_if(Gate::denies('program_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.programLevels.edit', compact('program_level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramLevelRequest $request, ProgramLevel $program_level)
    {
        $program_level->update($request->all());
        
        return redirect(route('systemadmin.program-levels.index'))->withSuccess('Institution Program Level successfully updated');
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
