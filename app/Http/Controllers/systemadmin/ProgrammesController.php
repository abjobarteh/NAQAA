<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $programmes = Program::all();
        
        return view('systemadmin.programmes.index', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        
        return view('systemadmin.programmes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $request->validate([
            'name' => 'required|string'
        ]);

        Program::create($request->all());

        return redirect()->route('admin.programmes.index')->withSuccess('National Programme successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $programme = Program::where('id', $id)->get();
        
        return view('systemadmin.programmes.edit', compact('programme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $programme)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $request->validate([
            'name' => 'required|string'
        ]);

        $programme->update($request->all());

        return redirect()->route('admin.programmes.index')->withSuccess('National Programme successfully updated');
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
