@role(...['registration_and_accreditation_manager','registration_and_accreditation_officer'])
<li class="nav-item">
  <a href="{{route('registration-accreditation.dashboard')}}" class="nav-link {{ request()->is('registration-accreditation/dashboard') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item menu-open">
  <a href="#" class="nav-link {{ request()->is('registration-accreditation/registration/institutions') || request()->is('registration-accreditation/registration/institutions/*') || request()->is('registration-accreditation/registration/trainers') || request()->is('registration-accreditation/registration/trainers/*') || request()->is('registration-accreditation/registration/assessor-verifiers') || request()->is('registration-accreditation/registration/assessor-verifiers/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-briefcase"></i>
    <p>
      Authorizations
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.registration.trainers.index')}}" class="nav-link {{ request()->is('registration-accreditation/registration/trainers') || request()->is('registration-accreditation/registration/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Manage Authorizations
        </p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item menu-open">
  <a href="#" class="nav-link {{ request()->is('registration-accreditation/registration/institutions') || request()->is('registration-accreditation/registration/institutions/*') || request()->is('registration-accreditation/registration/trainers') || request()->is('registration-accreditation/registration/trainers/*') || request()->is('registration-accreditation/registration/assessor-verifiers') || request()->is('registration-accreditation/registration/assessor-verifiers/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-briefcase"></i>
    <p>
      Registrations
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.registration.trainers.index')}}" class="nav-link {{ request()->is('registration-accreditation/registration/trainers') || request()->is('registration-accreditation/registration/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Manage Registrations
        </p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item menu-open">
  <a href="#" class="nav-link {{ request()->is('registration-accreditation/accreditation/institutions') || request()->is('registration-accreditation/accreditation/institutions/*') || request()->is('registration-accreditation/accreditation/trainers') || request()->is('registration-accreditation/accreditation/trainers/*') || request()->is('registration-accreditation/accreditation/assessor-verifiers') || request()->is('registration-accreditation/accreditation/assessor-verifiers/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-certificate"></i>
    <p>
        Institutions
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.accreditation.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/accreditation/instiutions') || request()->is('registration-accreditation/accreditation/institutions/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>
            New Accreditation
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('registration-accreditation.accreditation.trainers.index')}}" class="nav-link {{ request()->is('registration-accreditation/accreditation/trainers') || request()->is('registration-accreditation/accreditation/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
          Manage Accreditations
        </p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="{{route('registration-accreditation.registration.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/licences') || request()->is('admin/licences/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-award"></i>
    <p>
      Licences
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route('registration-accreditation.registration.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/licences') || request()->is('admin/licences/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-calendar-plus"></i>
    <p>
      Appointments
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route('registration-accreditation.registration.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/licences') || request()->is('admin/licences/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-calendar-alt"></i>
    <p>
      Schedule
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route('registration-accreditation.registration.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/licences') || request()->is('admin/licences/*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-chart-line"></i>
    <p>
      Reports
    </p>
  </a>
</li>
@endrole