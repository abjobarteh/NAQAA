@role(...['sysadmin']) 
     <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    @can('access_user_management')
      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/roles') || request()->is('admin/users') || request()->is('admin/permissions/*') || request()->is('admin/roles/*') || request()->is('admin/users/*') || request()->is('admin/permissions/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            User Management
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @can('access_permission')
          <li class="nav-item">
            <a href="{{route('admin.permissions.index')}}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Permissions
              </p>
            </a>
          </li>
          @endcan

          @can('access_role')
          <li class="nav-item">
            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          
          @can('access_users')
          <li class="nav-item">
            <a href="{{route('admin.users.index')}}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </li>
    @endcan
    @can('access_directorate')
    <li class="nav-item menu-open">
      <a href="#" class="nav-link {{ request()->is('admin/directorates') || request()->is('admin/directorates/*') || request()->is('admin/units')  || request()->is('admin/units/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
          Organization
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        @can('access_directorate')
        <li class="nav-item">
          <a href="{{ route('admin.directorates.index') }}" class="nav-link {{ request()->is('admin/directorates') || request()->is('admin/directorates/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-university"></i>
            <p>
              Manage Directorates
            </p>
          </a>
        </li>
        @endcan
        
        @can('access_unit')
        <li class="nav-item">
          <a href="{{ route('admin.units.index') }}" class="nav-link {{ request()->is('admin/units') || request()->is('admin/units/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Manage Units
            </p>
          </a>
        </li>
        @endcan
        @can('access_designation')
        <li class="nav-item">
        <a href="{{route('admin.designations.index')}}" class="nav-link {{ request()->is('admin/designations') || request()->is('admin/designations/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-tag"></i>
          <p>
            Designations
          </p>
        </a>
      </li>
      @endcan
      </ul>
    </li>
    @endcan
    @can('access_subdivision')
    <li class="nav-item menu-open">
      <a href="#" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') || request()->is('admin/districts') || request()->is('admin/districts/*') || request()->is('admin/towns-villages') || request()->is('admin/towns-villages/*') || request()->is('admin/localgovermentareas') || request()->is('admin/localgovermentareas/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>
          Country Subdivisions
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        @can('access_region')
        <li class="nav-item">
          <a href="{{route('admin.regions.index')}}" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Regions
            </p>
          </a>
        </li>
        @endcan
        @can('access_region')
        <li class="nav-item">
          <a href="{{route('admin.localgovermentareas.index')}}" class="nav-link {{ request()->is('admin/localgovermentareas') || request()->is('admin/localgovermentareas/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-location-arrow"></i>
            <p>
              Local Goverment Areas
            </p>
          </a>
        </li>
        @endcan
        @can('access_district')
        <li class="nav-item">
          <a href="{{route('admin.districts.index')}}" class="nav-link {{ request()->is('admin/districts') || request()->is('admin/districts/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-pin"></i>
            <p>
              Districts
            </p>
          </a>
        </li>
        @endcan
        @can('access_towns_villages')
        <li class="nav-item">
          <a href="{{route('admin.towns-villages.index')}}" class="nav-link {{ request()->is('admin/towns-villages') || request()->is('admin/towns-villages/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-thumbtack"></i>
            <p>
              Towns/Villages
            </p>
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcan
    @can('access_general_configurations')
    <li class="nav-item">
      <a href="{{ route('admin.configurations') }}" class="nav-link {{ 
        request()->is('admin/configurations') || request()->is('admin/configurations/*')
        || request()->is('admin/education-fields') || request()->is('admin/education-fields/*')
        || request()->is('admin/education-subfields') || request()->is('admin/education-subfields/*')
        || request()->is('admin/training-provider-staff-ranks') || request()->is('admin/training-provider-staff-ranks/*')
        || request()->is('admin/training-provider-staff-roles') || request()->is('admin/training-provider-staff-roles/*')
        || request()->is('admin/entry-level-qualifications') || request()->is('admin/entry-level-qualifications/*')
        || request()->is('admin/training-provider-classifications') || request()->is('admin/training-provider-classifications/*')
        || request()->is('admin/training-provider-ownerships') || request()->is('admin/training-provider-ownerships/*')
        || request()->is('admin/ethnicity') || request()->is('admin/ethnicity/*')
        || request()->is('admin/awarding-bodies') || request()->is('admin/awarding-bodies/*')
        || request()->is('admin/application-fees-tariffs') || request()->is('admin/application-fees-tariffs/*')
        ? 'active' : '' 
        }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>
            Predefine Configurations
        </p>
      </a>
    </li>
    @endcan
    @can('access_activity_logs')
    <li class="nav-item">
      <a href="{{route('admin.activities.index')}}" class="nav-link {{ request()->is('admin/activities') || request()->is('admin/activities/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
          Activity Logs
        </p>
      </a>
    </li>
    @endcan
    @can('access_sysadmin_reports')
    <li class="nav-item">
      <a href="{{route('admin.activities.index')}}" class="nav-link {{ request()->is('admin/auditlogs') || request()->is('admin/auditlogs/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Reports
        </p>
      </a>
    </li>
    @endcan
    @can('access_backup_settings')
    <li class="nav-item">
      <a href="{{route('admin.backup')}}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-database"></i>
        <p>
          Backup
        </p>
      </a>
    </li>
    @endcan
@endrole