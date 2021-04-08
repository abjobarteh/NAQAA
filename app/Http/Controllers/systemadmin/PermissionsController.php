<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StorePermissionRequest;
use App\Http\Requests\systemadmin\UpdatePermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('access_permission'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('systemadmin.permissions.index',compact('permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('create_permission'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('name');

        return view('systemadmin.permissions.create', compact('roles'));
    }

    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());
        
        return redirect(route('admin.permissions.index'))->with('success','Permission successfully created!');
    }

    //Todo: Remove Edit function for security reasons @Biran
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('edit_permission'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('systemadmin.permissions.edit',compact('permission'));
    }

    // update function should also be deleted for security purpose @Biran
    public function update(UpdatePermissionRequest $request,Permission $permission)
    {
        $permission->update([
            'name' => $request->permission_name,
            'slug' => $request->permission_slug,
        ]);

        return redirect(route('admin.permissions.index'))->with('success','Permission successfully updated!');
    }
}
