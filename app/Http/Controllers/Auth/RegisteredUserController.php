<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrationActivity;
use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
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
            'username' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'user_type' => ['required', 'in:institution,trainer'],
        ]);

        Auth::login($user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'user_category' => 'portal',
            'user_status' => 1,
            'default_password_status' => 0,
        ]));

        $user->roles()->attach(Role::where('slug', $request->user_type)->first());

        event(new Registered($user));

        if ($request->user_type === 'institution') {
            TrainingProvider::create([
                'email' =>  $request->email,
                'login_id' => $user->id
            ]);

            return redirect(route('portal.institution.dashboard'));
        } else if ($request->user_type === 'trainer') {
            Trainer::create([
                'email' => $request->email,
                'login_id' => $user->id,
            ]);

            return redirect(route('portal.trainer.dashboard'));
        }
    }
}
