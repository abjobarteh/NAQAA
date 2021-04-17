<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function settings()
    {
        $user = User::with('roles')->where('id',auth()->id())->get();

        return view('auth.profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user  = User::where('id',Auth::user()->id);


        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
        ]);

        return redirect('settings')->withSuccess('Profile successfuly updated');
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        $user  = User::Findorfail(Auth::user()->id);

        if($user->default_password_status == 1)
        {
            $user->update([
                'password' => bcrypt($request->password),
                'default_password_status' => 0
            ]);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect('settings')->withSuccess('Password successfuly updated');
    }
}
