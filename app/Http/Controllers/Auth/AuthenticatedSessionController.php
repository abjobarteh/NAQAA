<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\HasPermissionsTrait;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if ($request->user()->user_category === 'system') {
            if ($request->user()->user_status == 0) {
                Auth::guard('web')->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return back()->withWarning('Your Account is Deactivated. Please contact your administrator for further advice.');
            }

            session(['active_role' => auth()->user()->roles[0]->slug]);

            if ($request->user()->default_password_status == 1) return $this->changeDefaultPassword();
        }

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
        if ($request->password != $request->password_confirmation) {
            return redirect(route('change-default-password'))
                ->withErrors(['password' => 'Passwords do not match. Please make sure the passwords match!']);
        }

        $user = User::FindorFail(Auth::user()->id);

        if (!Hash::check($request->password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->password),
                'default_password_status' => 0
            ]);

            return $this->redirectToCorrectUserDashboard($request);
        } else {
            return redirect(route('change-default-password'))
                ->withWarning(
                    'Password you entered cannot be the same as the one provided by the Syadmin. 
                    Please enter a new and different password!'
                );
        }
    }

    public function skipDefaultPasswordUpdate(Request $request)
    {
        return $this->redirectToCorrectUserDashboard($request);
    }

    public function redirectToCorrectUserDashboard($request)
    {
        if ($request->user()->user_category === 'system') {
            if (in_array(
                session('active_role'),
                ['registration_and_accreditation_module']
            )) {
                return redirect(route('registration-accreditation.dashboard'));
            } else if (in_array(
                session('active_role'),
                ['assessment_and_certification_module']
            )) {
                return redirect(route('assessment-certification.dashboard'));
            } else if (in_array(
                session('active_role'),
                ['research_and_development_module']
            )) {
                return redirect(route('researchdevelopment.dashboard'));
            } else if (in_array(
                session('active_role'),
                ['standards_development_module']
            )) {
                return redirect(route('standardscurriculum.dashboard'));
            } else {
                return redirect(route('admin.dashboard'));
            }
        } else {
            if ($request->user()->hasRole(
                ...['institution']
            )) {
                return redirect(route('portal.institution.dashboard'));
            } else if ($request->user()->hasRole(
                ...['trainer']
            )) {
                return redirect(route('portal.trainer.dashboard'));
            }
        }
    }
}
