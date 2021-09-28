<?php

namespace App\Http\Livewire\Portal\Institution\Applications;

use App\Models\RegistrationAccreditation\ApplicationDetail;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class InterimAuthorisation extends Component
{
    public function render()
    {
        $applications = ApplicationDetail::whereHas('trainingprovider', function (Builder $query) {
            $query->where('login_id', auth()->user()->id);
        })
            ->where('application_type', 'institution_letter_of_interim_authorisation')
            ->latest()
            ->get();

        return view(
            'livewire.portal.institution.applications.interim-authorisation',
            compact('applications')
        )
            ->extends('layouts.portal');
    }
}
