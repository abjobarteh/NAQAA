<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\CreateTrainingProviderStaffRoleRequest;
use App\Http\Requests\systemadmin\UpdateTrainingProviderStaffRoleRequest;
use App\Models\TrainingProviderStaffsRole;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TrainingProviderStaffsRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = TrainingProviderStaffsRole::all();

        return view('systemadmin.adminStaffRoles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_general_configurations'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.adminStaffRoles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrainingProviderStaffRoleRequest $request)
    {
        TrainingProviderStaffsRole::create($request->validated());

        return redirect(route('admin.training-provider-staff-roles.index'))->withSuccess('Role successfully added');
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

        $role = TrainingProviderStaffsRole::where('id',$id)->get();

        return view('systemadmin.adminStaffRoles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingProviderStaffRoleRequest $request, TrainingProviderStaffsRole $training_provider_staff_role)
    {
        $training_provider_staff_role->update($request->validated());

        return redirect(route('admin.training-provider-staff-roles.index'))->withSuccess('Role successfully updated');
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
