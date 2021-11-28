@extends('layouts.admin')

@section('content')
    @if ($application->application_type === "institution_letter_of_interim_authorisation")
        @livewire('registration-accreditation.manage-applications.interim-authorisation-application',["application" => $application])    
    @endif
    @if ($application->application_type === "institution_registration")
        @livewire('registration-accreditation.manage-applications.institution-registration-application',["application" => $application])    
    @endif
    @if ($application->application_type === "institution_accreditation")
        @livewire('registration-accreditation.manage-applications.institution-accreditation-application',["application" => $application])    
    @endif
    @if ($application->application_type === "trainer_registration")
        @livewire('registration-accreditation.manage-applications.trainer-registration-application',["application" => $application])    
    @endif
    @if ($application->application_type === "trainer_accreditation")
        @livewire('registration-accreditation.manage-applications.trainer-accreditation-application',["application" => $application])    
    @endif

    {{-- @livewire('registration-accreditation.manage-applications.update-application-status',["application" => $application],key($application->id)) --}}
@endsection