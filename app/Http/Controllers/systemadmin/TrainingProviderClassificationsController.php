<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateTrainingProviderClassificationRequest;
use App\Http\Requests\systemadmin\UpdateTrainingProviderClassificationRequest;
use App\Models\TrainingProviderClassification;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TrainingProviderClassificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classifications = TrainingProviderClassification::all();

        return view('systemadmin.trainingproviderclassifications.index', compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.trainingproviderclassifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrainingProviderClassificationRequest $request)
    {
        TrainingProviderClassification::create($request->validated());

        return redirect(route('admin.training-provider-classifications.index'))->withSuccess('classification successfully added');
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

        $classification = TrainingProviderClassification::where('id', $id)->get();

        return view('systemadmin.trainingproviderclassifications.edit', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdateTrainingProviderClassificationRequest $request, 
        TrainingProviderClassification $training_provider_classification
        )
    {
        $training_provider_classification->update($request->validated());

        return redirect(route('admin.training-provider-classifications.index'))
                ->withSuccess('classification successfully updated');
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
