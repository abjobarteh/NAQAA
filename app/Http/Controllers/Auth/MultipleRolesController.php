<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultipleRolesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $role)
    {
        session(['active_role' => $role]);

        if (in_array(
            $role,
            ['registration_and_accreditation_manager', 'registration_and_accreditation_officer']
        )) {
            return redirect(route('registration-accreditation.dashboard'));
        } else if (in_array(
            $role,
            ['assessment_and_certification_manager', 'assessment_and_certification_officer']
        )) {
            return redirect(route('assessment-certification.registrations.index'));
        } else if (in_array(
            $role,
            ['research_and_development_manager', 'research_and_development_officer']
        )) {
            return redirect(route('researchdevelopment.dashboard'));
        } else if (in_array(
            $role,
            ['standards_development_manager', 'standards_development_officer']
        )) {
            return redirect(route('standardscurriculum.dashboard'));
        } else {
            return redirect(route('admin.dashboard'));
        }
    }
}
