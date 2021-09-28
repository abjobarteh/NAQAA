<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\systemadmin\StoreUserRequest;
use App\Http\Requests\systemadmin\UpdateUserRequest;
use App\Models\Designation;
use App\Models\Directorate;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('access_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['designation', 'roles'])->get();

        return view('systemadmin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('create_user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorates = Directorate::all()->pluck('name', 'id');

        $roles = Role::all()->pluck('name', 'id');

        $units = Unit::all()->pluck('name', 'id');

        $designations = Designation::all()->pluck('name', 'id');

        $permissions = Permission::all()->pluck('name', 'id');

        return view('systemadmin.users.create', compact('directorates', 'roles', 'units', 'designations', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user =  User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'firstname' => $request->firstname,
            'middlename' => $request->middlename ?? null,
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
            'role_id' => $request->role,
            'directorate_id' => $request->directorate,
            'unit_id' => $request->unit,
            'designation_id' => $request->designation,
            'user_status' => $request->user_status == 'on' ? 1 : 0,
            'user_category' => 'system',
            'default_password_status' => 1,
        ]);

        $user->roles()->sync($request->input('roles', []));

        $user->permissions()->sync($request->input('permissions', []));

        return redirect(route('admin.users.index'))->with('success', 'User Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('edit_user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorates = Directorate::all()->pluck('name', 'id');

        $roles = Role::all()->pluck('name', 'id');

        $units = Unit::all()->pluck('name', 'id');

        $designations = Designation::all()->pluck('name', 'id');

        $permissions = Permission::all()->pluck('name', 'id');

        $user->load(['roles', 'permissions']);


        return view('systemadmin.users.edit', compact('user', 'directorates', 'roles', 'units', 'designations', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->filled('password')) {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'firstname' => $request->firstname,
                'middlename' => $request->middlename ?? null,
                'lastname' => $request->lastname,
                'phonenumber' => $request->phonenumber,
                'address' => $request->address,
                'role_id' => $request->role,
                'directorate_id' => $request->directorate,
                'unit_id' => $request->unit,
                'designation_id' => $request->designation,
                'user_status' => $request->user_status == 'on' ? 1 : 0,
            ]);
        } else {
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename ?? null,
                'lastname' => $request->lastname,
                'phonenumber' => $request->phonenumber,
                'address' => $request->address,
                'role_id' => $request->role,
                'directorate_id' => $request->directorate,
                'unit_id' => $request->unit,
                'designation_id' => $request->designation,
                'user_status' => $request->user_status == 'on' ? 1 : 0,
            ]);
        }

        $user->roles()->sync($request->input('roles', []));

        $user->permissions()->sync($request->input('permissions', []));

        return back()->with('success', 'User Successfully updated');
    }


    public function getUnitsByDirectorate(Directorate $directorate)
    {
        $directorate->load('units');
        return response()->json(['data' => $directorate->units->pluck('name', 'id')]);
    }
}
