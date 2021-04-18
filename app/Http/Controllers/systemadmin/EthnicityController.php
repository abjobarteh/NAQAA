<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\Ethnicity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EthnicityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ethnicities = Ethnicity::all();

        return view('systemadmin.ethnicity.index', compact('ethnicities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.ethnicity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Ethnicity::create($request->all());

        return redirect()->route('admin.ethnicity.index')->withSuccess('Ethnicity successfully added');
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

        $ethnicity = Ethnicity::where('id',$id)->get();

        return view('systemadmin.ethnicity.edit', compact('ethnicity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ethnicity $ethnicity)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $ethnicity->update($request->all());

        return redirect()->route('admin.ethnicity.index')->withSuccess('Ethnicity successfully updated');
    }

}
