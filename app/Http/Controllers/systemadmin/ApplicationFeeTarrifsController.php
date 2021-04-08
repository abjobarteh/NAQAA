<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreApplicationFeeTariffsRequest;
use App\Http\Requests\systemadmin\UpdateApplicationFeeTariffsRequest;
use App\Models\ApplicationFeeTariff;
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
        abort_if(Gate::denies('access_application_fees'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fees = ApplicationFeeTariff::all();

        return  view('systemadmin.applicationfeestariffs.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_application_fees'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return  view('systemadmin.applicationfeestariffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationFeeTariffsRequest $request)
    {
        ApplicationFeeTariff::create($request->validated()+['approved' => 0]);

        return redirect(route('admin.application-fees-tariffs.index'))
                ->withSuccess('Application Fee Tariff successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_application_fees'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fee = ApplicationFeeTariff::where('id', $id)->get();

        return  view('systemadmin.applicationfeestariffs.edit', compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationFeeTariffsRequest $request, ApplicationFeeTariff $application_fees_tariff)
    {
        $application_fees_tariff->update($request->validated());

        return redirect(route('admin.application-fees-tariffs.index'))
                ->withSuccess('Application Fee Tariff successfully updated');
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
