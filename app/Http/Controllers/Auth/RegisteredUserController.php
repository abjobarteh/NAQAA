<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrationActivity;
use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string|digits_between:7,15',
            'address' => 'required|string',
        ]);
        
        Auth::login($user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name ?? null,
            'last_name' => $request->last_name,
            'full_name' => $request->first_name.' '.$request->middle_name.' '.$request->last_name ?? $request->first_name.' '.$request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'directorate_id' => null,
            'unit_id' => null,
            'designation_id' => null,
            'user_status' => 1,
            'default_password_status' => 1,
        ]));

        event(new Registered($user));
        $user->roles()->attach(Role::where('slug','systemadmin')->first());

        return redirect(route('systemadmin.index'));
    }
}
