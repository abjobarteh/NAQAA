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

        return view('auth.profile');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user  = User::where(Auth::user()->id);


        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('settings')->withSuccess('Your Profile has successfuly been updated');
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        $user  = User::Find(Auth::user()->id);
        
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect('settings')->withSuccess('Password successfuly updated');
    }
}
