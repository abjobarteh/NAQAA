<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreComplianceLevelRequest;
use App\Http\Requests\systemadmin\UpdateComplianceLevelRequest;
use App\Models\ComplianceLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ComplianceLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('compliance_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complianceLevels = ComplianceLevel::all('id','name','percentage_start','percentage_end');

        return view('systemadmin.complianceLevel.index', compact('complianceLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('compliance_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.complianceLevel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComplianceLevelRequest $request)
    {
        ComplianceLevel::create($request->all());

        return redirect()->route('systemadmin.compliance-levels.index')->withSuccess('Compliance Level successfully addedd');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ComplianceLevel $complianceLevel)
    {
        abort_if(Gate::denies('compliance_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.complianceLevel.edit', compact('complianceLevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComplianceLevelRequest $request, ComplianceLevel $complianceLevel)
    {
       $complianceLevel->update($request->all());

       return redirect()->route('systemadmin.compliance-levels.index')->withSuccess('Compliance Level successfully updated');
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
