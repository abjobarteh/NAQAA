<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\Designation;
use App\Models\Directorate;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProfilesController extends Controller
{
    public function settings()
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userProfile = Auth::user();

        return view('auth.profile', compact('userProfile'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user  = User::Find(Auth::user()->id);


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
}
