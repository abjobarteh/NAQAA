<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\HasPermissionsTrait;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    use HasPermissionsTrait;
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if($request->user()->user_status == 0)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
    
            $request->session()->regenerateToken();

            return back()->withWarning('Your Account is Deactivated. Please contact your administrator for further advice.');
        }

        if($request->user()->default_password_status == 1) return $this->changeDefaultPassword();

        return $this->redirectToCorrectUserDashboard($request);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/');
    }

    public function changeDefaultPassword()
    {
        return view('auth.change-default-password');
    }

    public function updateDefaultPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $user = User::FindorFail(Auth::user()->id);

        $user->update([
            'password' => bcrypt($request->password),
            'default_password_status' => 0
        ]);

        return $this->redirectToCorrectUserDashboard($request);
    }

    public function skipDefaultPasswordUpdate(Request $request)
    {
        return $this->redirectToCorrectUserDashboard($request);
    }

    public function redirectToCorrectUserDashboard($request)
    {
        // dd($request->user());
        if($request->user()->hasRole(
            ...['registration_and_accreditation_manager','registration_and_accreditation_officer']
        ))
        {
            return redirect(route('registration-accreditation.dashboard'));
        }
        else if($request->user()->hasRole(
            ...['assessment_and_certification_manager','assessment_and_certification_officer']
        ))
        {
            return redirect(route('assessment-certification.dashboard'));
        }
        else{
            return redirect(route('systemadmin.dashboard'));
        }
    }
}
