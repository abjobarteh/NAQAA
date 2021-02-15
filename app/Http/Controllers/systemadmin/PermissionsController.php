<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    
    public function index()
    {
        $permissions = Permission::all();

        return view('systemadmin.permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('systemadmin.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        Permission::create([
            'name' => $request->permission_name,
            'slug' => $request->permission_slug
        ]);
        
        return redirect(route('systemadmin.permissions.index'))->with('success','Permission successfully created!');
    }

    public function edit(Permission $permission)
    {
        
        return view('systemadmin.permissions.edit',compact('permission'));
    }

    public function update(UpdatePermissionRequest $request,Permission $permission)
    {
        $permission->update([
            'name' => $request->permission_name,
            'slug' => $request->permission_slug,
        ]);

        return redirect(route('systemadmin.permissions.index'))->with('success','Permission successfully updated!');
    }
}
