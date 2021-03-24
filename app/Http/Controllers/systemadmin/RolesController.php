<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('access_role'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with('permissions')->orderBy('created_at','desc')->get();
        
        return view('systemadmin.roles.index',compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('create_role'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('name','id');

        return view('systemadmin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {

        $role = Role::create($request->validated());

        $role->permissions()->sync($request->input('permissions', []));

        return redirect(route('admin.roles.index'))->with('success','Role successfully created!');
    }

    // Remove edit role function for security purpose @Biran
    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');

        $role->load('permissions');

        return view('systemadmin.roles.edit',compact('role','permissions'));
    }

    // Remove update function as well for security purpose @Biran
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());

        $role->permissions()->sync($request->input('permissions', []));

        return redirect(route('admin.roles.index'))->with('success','Role successfully updated!');
    }
}
