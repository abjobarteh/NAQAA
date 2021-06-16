<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
    @role('institution')
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('portal.institution.dashboard')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard
        </a>
    </li>
    <li class="c-sidebar-nav-title">Applications</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg>
            Manage Application
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.institution.registration.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Registration
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.institution.accreditation.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Programme accreditation
                </a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-title">Data Collections</li>
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg>
            Manage Data collection
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('portal.institution.datacollection.learningcenter.index')}}">
                    <span class="c-sidebar-nav-icon"></span> 
                    Learning center
                </a>
            </li>
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
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{route('portal.institution.certificate-endorsements.index')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> 
            Certificate Endorsements
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="index.html">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> 
            Notifications
            <span class="badge badge-info">0</span>
        </a>
    </li>
    {{-- <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="index.html">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> 
            Settings 
        </a>
    </li> --}}
    @endrole
    @role('trainer')
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
                <a class="c-sidebar-nav-link" href="base/breadcrumb.html">
                    <span class="c-sidebar-nav-icon"></span> 
                    Assigned candidates
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="base/breadcrumb.html">
                    <span class="c-sidebar-nav-icon"></span> 
                    Assessment results 
                </a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="index.html">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-bell"></use>
            </svg> 
            Notifications
            <span class="badge badge-info">0</span>
        </a>
    </li>
    @endrole
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->is('settings') ? 'active' : '' }}" href="{{route('portal.settings')}}">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> 
            Settings 
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
    
        