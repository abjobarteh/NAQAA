<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
    @portal('institution')
    <li class="c-sidebar-nav-item">
        <a href="{{route('portal.institution.dashboard')}}" class="c-sidebar-nav-link 
        {{ request()->is('portal/dashboard') ? 'active' : '' }}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard
        </a>
    </li>
    <li class="c-sidebar-nav-title">Applications</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle 
        {{ request()->is('portal/institution/interim-authorisation') ||
        request()->is('portal/institution/interim-authorisation/*') || 
        request()->is('portal/institution/registration') || 
        request()->is('portal/institution/registration/*') || 
        request()->is('portal/institution/accreditation') || 
        request()->is('portal/institution/accreditation/*') 
         ? 'active' : '' }}" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-envelope-closed"></use>
            </svg>
            Manage Application
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link 
                {{ request()->is('portal/institution/interim-authorisation') ||
                    request()->is('portal/institution/interim-authorisation/*') 
                     ? 'active' : '' }}" href="{{route('portal.institution.interim-authorisation')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Interim Authorisation
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{
                    request()->is('portal/institution/registration') || 
                    request()->is('portal/institution/registration/*')  
                     ? 'active' : '' }}" href="{{route('portal.institution.registration.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Registration
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{
                    request()->is('portal/institution/accreditation') || 
                    request()->is('portal/institution/accreditation/*') 
                         ? 'active' : '' }}" href="{{route('portal.institution.accreditation.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Programme accreditation
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{
                    request()->is('portal/institution/checklist-evidence') || 
                    request()->is('portal/institution/checklist-evidence/*') 
                         ? 'active' : '' }}" href="{{route('portal.institution.checklist-evidence.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Checklist Evidence
                </a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-title">Data Collections</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg>
            Manage Data collection
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.institution.datacollection.programmes.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Programmes
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.institution.datacollection.trainers.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Academic & Admin Staff
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.institution.datacollection.students.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Students
                </a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-title">GSQ Registrations</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('portal.institution.student-registrations')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-people"></use>
            </svg> 
            Student Registration
        </a>
    </li>

    <li class="c-sidebar-nav-title">Endorsement</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('portal.institution.certificate-endorsements.index')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-spreadsheet"></use>
            </svg> 
            Certificate Endorsements
        </a>
    </li>
    <li class="c-sidebar-nav-title">Profile</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->is('portal/institution/settings') ? 'active' : '' }}" href="{{route('portal.institution.settings')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-cog"></use>
            </svg> 
            Profile 
        </a>
    </li>
    @endportal
    @portal('trainer')
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('portal.trainer.dashboard')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard
        </a>
    </li>
    <li class="c-sidebar-nav-title">Applications</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-browser"></use>
            </svg>
            Manage Application
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.trainer.registrations.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Registration
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.trainer.accreditations.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Programme accreditation
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{
                    request()->is('portal/trainer/checklist-evidence') || 
                    request()->is('portal/trainer/checklist-evidence/*') 
                         ? 'active' : '' }}" href="{{route('portal.trainer.checklist-evidence.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Checklist Evidence
                </a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-title">Assessments</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-briefcase"></use>
            </svg>
            Manage assessments
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{
                    request()->is('portal/trainer/assigned-candidates') || 
                    request()->is('portal/trainer/assigned-candidates/*') 
                         ? 'active' : '' }}"  href="{{route('portal.trainer.assigned-candidates')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Assigned candidates
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{
                    request()->is('portal/trainer/assigned-candidates') || 
                    request()->is('portal/trainer/assigned-candidates/*') 
                         ? 'active' : '' }}" href="{{route('portal.trainer.assessment-results')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Assessment results 
                </a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-title">Profile</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->is('portal/trainer/settings') ? 'active' : '' }}" href="{{route('portal.trainer.settings')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-apps-settings"></use>
            </svg> 
            Profile 
        </a>
    </li>
    @endportal
    <li class="c-sidebar-nav-title">General</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="index.html">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-bell"></use>
            </svg> 
                Notifications
            <span class="badge badge-info">{{auth()->user()->roles[0]->notifications->count()}}</span>
        </a>
    </li>
    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-account-logout"></use>
            </svg> 
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    
        