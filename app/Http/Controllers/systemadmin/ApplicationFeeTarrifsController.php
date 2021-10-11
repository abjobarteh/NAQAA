<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ApplicationFeeTarrifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application_types = ApplicationType::all();

        return  view('systemadmin.applicationfeestariffs.index', compact('application_types'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationType $application_fees_tariff)
    {
        abort_if(Gate::denies('edit_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application_type = $application_fees_tariff;

        return  view('systemadmin.applicationfeestariffs.edit', compact('application_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationType $application_fees_tariff)
    {
        $data = $request->validate([
            'fee' => 'required|numeric',
            'description' => 'nullable|string'
        ]);
        $application_fees_tariff->update($data);

        return redirect(route('admin.application-fees-tariffs.index'))
            ->withSuccess('Application Fee Tariff successfully updated');
    }
}
