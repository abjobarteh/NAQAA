 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      @role(['registration_and_accreditation_manager','registration_and_accreditation_officer'])
      <li class="nav-item">
        <a href="{{route('registration-accreditation.dashboard')}}" class="nav-link {{ request()->is('registration-accreditation/') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ request()->is('systemadmin/permissions') || request()->is('systemadmin/roles') || request()->is('systemadmin/users') || request()->is('systemadmin/permissions/*') || request()->is('systemadmin/roles/*') || request()->is('systemadmin/users/*') || request()->is('systemadmin/permissions/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Registration
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('registration-accreditation.registration.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/registration/instiutions') || request()->is('registration-accreditation/registration/institutions/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Institutions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('registration-accreditation.registration.trainers.index')}}" class="nav-link {{ request()->is('registration-accreditation/registration/trainers') || request()->is('registration-accreditation/registration/trainers/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Trainers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('registration-accreditation.registration.assessor-verifiers.index')}}" class="nav-link {{ request()->is('registration-accreditation/registration/assessor-verifiers') || request()->is('registration-accreditation/registration/assessor-verifiers/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-prescription"></i>
              <p>
                Assesors/Verifiers
              </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ request()->is('systemadmin/permissions') || request()->is('systemadmin/roles') || request()->is('systemadmin/users') || request()->is('systemadmin/permissions/*') || request()->is('systemadmin/roles/*') || request()->is('systemadmin/users/*') || request()->is('systemadmin/permissions/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Accreditation
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('registration-accreditation.accreditation.institutions.index')}}" class="nav-link {{ request()->is('registration-accreditation/accreditation/instiutions') || request()->is('registration-accreditation/accreditation/institutions/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Institutions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('registration-accreditation.accreditation.trainers.index')}}" class="nav-link {{ request()->is('registration-accreditation/accreditation/trainers') || request()->is('registration-accreditation/accreditation/trainers/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Trainers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('registration-accreditation.accreditation.assessor-verifiers.index')}}" class="nav-link {{ request()->is('registration-accreditation/accreditation/assessor-verifiers') || request()->is('registration-accreditation/accreditation/assessor-verifiers/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-prescription"></i>
              <p>
                Assesors/Verifiers
              </p>
            </a>
          </li>
        </ul>
      </li>
      @endrole
      @can('activity_logs_access')
      <li class="nav-item">
        <a href="{{route('registration-accreditation.licences')}}" class="nav-link {{ request()->is('registration-accreditation/licences') || request()->is('systemadmin/licences/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Licences
          </p>
        </a>
      </li>
      @endcan
      @can('activity_logs_access')
      <li class="nav-item">
        <a href="{{route('systemadmin.auditlogs.index')}}" class="nav-link {{ request()->is('systemadmin/auditlogs') || request()->is('systemadmin/auditlogs/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Surveys
          </p>
        </a>
      </li>
      @endcan
      @can('activity_logs_access')
      <li class="nav-item">
        <a href="{{route('systemadmin.auditlogs.index')}}" class="nav-link {{ request()->is('systemadmin/auditlogs') || request()->is('systemadmin/auditlogs/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Institution Audits
          </p>
        </a>
      </li>
      @endcan
      @can('settings_access')
      <li class="nav-item">
        <a href="{{route('systemadmin.settings')}}" class="nav-link {{ request()->is('systemadmin/settings') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-cog"></i>
          <p>
            Settings
          </p>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Logout
          </p>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->