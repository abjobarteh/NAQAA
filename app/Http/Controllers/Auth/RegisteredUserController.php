<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrationActivity;
use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainerType;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\Role;
use App\Models\TrainingProviderClassification;
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
        $classifications = TrainingProviderClassification::all()->pluck('name', 'id');
        $trainer_types = TrainerType::all();

        return view('auth.register', compact('classifications', 'trainer_types'));
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
        if ($request->user_type === 'institution') {

            $request->validate([
                'username' => ['required', 'string', 'unique:users'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'confirmed', 'min:8'],
                'institution_name' => ['required', 'string'],
                'phone_number' => ['required', 'string'],
                'classification' => ['required', 'integer'],
            ]);

            Auth::login($user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_category' => 'portal',
                'user_status' => 1,
                'default_password_status' => 0,
            ]));

            $user->roles()->attach(Role::where('slug', $request->user_type)->first());

            $training_provider_exist = TrainingProvider::where('name', 'like', '%' . $request->institution_name . '%')
                ->where('classification_id', $request->classification)
                ->exists();

            if (!$training_provider_exist) {
                TrainingProvider::create([
                    'name' =>  $request->institution_name,
                    'mobile_phone' =>  $request->phone_number,
                    'classification_id' =>  $request->classification,
                    'login_id' => $user->id
                ]);
            } else {
                TrainingProvider::where('name', 'like', '%' . $request->institution_name . '%')
                    ->where('classification_id', $request->classification)
                    ->update([
                        'login_id' => $user->id
                    ]);
            }

            event(new Registered($user));

            return redirect(route('portal.institution.dashboard'));
        } else {
            $request->validate([
                'username' => ['required', 'string', 'unique:users'],
                'email' => ['required', 'email', 'unique:users'],
                'trainerpassword' => ['required', 'string', 'confirmed', 'min:8'],
                'firstname' => ['required', 'string'],
                'middlename' => ['nullable', 'string'],
                'lastname' => ['required', 'string'],
                'trainer_phone_number' => ['required', 'string'],
                'trainer_type' => ['required', 'string'],
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

            $trainer_exist = Trainer::where('firstname', 'like', '%' . $request->firstname . '%')
                ->where('middlename', 'like', '%' . $request->middlename . '%')
                ->where('lastname', 'like', '%' . $request->lastname . '%')
                ->where('type', 'like', $request->trainer_type)
                ->exists();

            if (!$trainer_exist) {
                Trainer::create([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'phone_mobile' => $request->trainer_phone_number,
                    'type' => $request->trainer_type,
                    'login_id' => $user->id,
                ]);
            } else {
                Trainer::where('firstname', 'like', '%' . $request->firstname . '%')
                    ->where('middlename', 'like', '%' . $request->middlename . '%')
                    ->where('lastname', 'like', '%' . $request->lastname . '%')
                    ->where('type', 'like', $request->trainer_type)
                    ->update([
                        'login_id' => $user->id
                    ]);
            }

            event(new Registered($user));

            return redirect(route('portal.trainer.dashboard'));
        }
    }
}
