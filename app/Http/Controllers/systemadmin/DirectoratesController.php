<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreDirectorateRequest;
use App\Http\Requests\systemadmin\UpdateDirectorateRequest;
use App\Models\Directorate;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DirectoratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_directorate'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorates = Directorate::all();

        return view('systemadmin.directorates.index', compact('directorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_directorate'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.directorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectorateRequest $request)
    {
        Directorate::create($request->all());

        return redirect()->route('admin.directorates.index')->withSuccess('Directorate successfully added');
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
    public function edit(Directorate $directorate)
    {
        abort_if(Gate::denies('edit_directorate'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.directorates.edit', compact('directorate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirectorateRequest $request, Directorate $directorate)
    {
        $directorate->update($request->all());

        return redirect()->route('systemadmin.directorates.index')->withSuccess('Directorate successfully updated');
    }
    
}
