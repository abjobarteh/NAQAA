<?php

namespace App\Http\Controllers\Portal\Institution;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        $user = User::with('roles')->where('id', auth()->id())->get();

        return view('portal.institutions.profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user  = User::where('id', Auth::user()->id);


        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
        ]);

        return back()->withSuccess('Profile successfuly updated');
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        $user  = User::Findorfail(Auth::user()->id);

        if ($user->default_password_status == 1) {
            $user->update([
                'password' => bcrypt($request->password),
                'default_password_status' => 0
            ]);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return back()->withSuccess('Password successfuly updated');
    }
}
