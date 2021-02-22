<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        
        return view('systemadmin.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->pluck('name','id');
        return view('systemadmin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {

        $role = Role::create([
            'name' => $request->role_name,
            'slug' => $request->role_slug,
        ]);

        $role->permissions()->sync($request->input('permissions', []));

        return redirect(route('systemadmin.roles.index'))->with('success','Role successfully created!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');

        $role->load('permissions');

        return view('systemadmin.roles.edit',compact('role','permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());

        $role->permissions()->sync($request->input('permissions', []));

        return redirect(route('systemadmin.roles.index'))->with('success','Role successfully updated!');
    }
}
