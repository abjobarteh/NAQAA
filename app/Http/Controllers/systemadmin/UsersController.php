<?php

namespace App\Http\Controllers\systemadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Designation;
use App\Models\Directorate;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
 
        return view('systemadmin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $directorates = Directorate::all();

        $roles = Role::all()->pluck('name','id');

        $units = Unit::all();

        $designations = Designation::all();

        $permissions = Permission::all()->pluck('name','id');

        return view('systemadmin.users.create',compact('directorates','roles','units','designations','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
       $user_status = $request->user_status == 'on' ? 1 : 0;
       $user =  User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role_id' => $request->role,
            'directorate_id' => $request->directorate,
            'unit_id' => $request->unit,
            'designation_id' => $request->designation,
            'user_status' => $user_status,
            'default_password_status' => 1,
        ]);

        $user->roles()->sync($request->input('roles', []));

        $user->permissions()->sync($request->input('permissions', []));

        return redirect(route('systemadmin.users.index'))->with('success','User Successfully created');
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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $directorates = Directorate::all();

        $roles = Role::all()->pluck('name','id');

        $units = Unit::all();

        $designations = Designation::all();

        $permissions = Permission::all()->pluck('name','id');

        $user->load(['roles','permissions']);


        return view('systemadmin.users.edit', compact('user','directorates','roles','units','designations','permissions'));
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
        $user_status = $request->user_status == 'on' ? 1 : 0;
        if($request->filled('password')){
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name ?? null,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'role_id' => $request->role,
                'directorate_id' => $request->directorate,
                'unit_id' => $request->unit,
                'designation_id' => $request->designation,
                'user_status' => $user_status,
            ]);
        }
        else{
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name ?? null,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'role_id' => $request->role,
                'directorate_id' => $request->directorate,
                'unit_id' => $request->unit,
                'designation_id' => $request->designation,
                'user_status' => $user_status,
            ]);
        }

        $user->roles()->sync($request->input('roles', []));

        $user->permissions()->sync($request->input('permissions', []));

        return redirect(route('systemadmin.users.index'))->with('success','User Successfully updated');
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

    public function getUnitsByDirectorate(Directorate $directorate)
    {
        $directorate->load('units');
        return response()->json(['data' => $directorate->units->pluck('name','id')]);
    }
}
