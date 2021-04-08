<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateTrainingProviderOwnershipsRequest;
use App\Http\Requests\systemadmin\UpdateTrainingProviderOwnershipsRequest;
use App\Models\TrainingProviderOwnership;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TrainingProviderOwnershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_training_provider_ownership'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ownerships = TrainingProviderOwnership::all();

        return view('systemadmin.trainingproviderownerships.index', compact('ownerships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_training_provider_ownership'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.trainingproviderownerships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrainingProviderOwnershipsRequest $request)
    {
        TrainingProviderOwnership::create($request->validated());

        return redirect(route('admin.training-provider-ownerships.index'))->withSuccess('ownership successfully added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_training_provider_ownership'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ownership = TrainingProviderOwnership::where('id', $id)->get();

        return view('systemadmin.trainingproviderownerships.edit', compact('ownership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
            UpdateTrainingProviderOwnershipsRequest $request,
             TrainingProviderOwnership $training_provider_ownership
        )
    {
        $training_provider_ownership->update($request->validated());

        return redirect(route('admin.training-provider-ownerships.index'))->withSuccess('ownership successfully updated');
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
