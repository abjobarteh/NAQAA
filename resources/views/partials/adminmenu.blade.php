 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar nav-child-indent nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    
    <li class="nav-item">
      <a href="{{route('systemadmin.index')}}" class="nav-link {{ request()->is('systemadmin/') || request()->is('systemadmin/permissions/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    @can('user_management_access')
      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ request()->is('systemadmin/permissions') || request()->is('systemadmin/roles') || request()->is('systemadmin/users') || request()->is('systemadmin/permissions/*') || request()->is('systemadmin/roles/*') || request()->is('systemadmin/users/*') || request()->is('systemadmin/permissions/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            User Management
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @can('permission_access')
          <li class="nav-item">
            <a href="{{route('systemadmin.permissions.index')}}" class="nav-link {{ request()->is('systemadmin/permissions') || request()->is('systemadmin/permissions/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Permissions
              </p>
            </a>
          </li>
          @endcan

          @can('role_access')
          <li class="nav-item">
            <a href="{{ route('systemadmin.roles.index') }}" class="nav-link {{ request()->is('systemadmin/roles') || request()->is('systemadmin/roles/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          
          @can('user_access')
          <li class="nav-item">
            <a href="{{route('systemadmin.users.index')}}" class="nav-link {{ request()->is('systemadmin/users') || request()->is('systemadmin/users/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </li>
    @endcan
    @can('institution_settings_access')
    <li class="nav-item menu-open">
      <a href="#" class="nav-link {{ request()->is('systemadmin/institution-categories') || request()->is('systemadmin/institution-types') || request()->is('systemadmin/program-levels') || request()->is('systemadmin/program-categories') || request()->is('systemadmin/institution-types/*') || request()->is('systemadmin/program-levels/*') || request()->is('systemadmin/program-categories/*') || request()->is('systemadmin/institution-categories/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          Institution Settings
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        @can('institution_categories_access')
        <li class="nav-item">
          <a href="{{ route('systemadmin.institution-categories.index') }}" class="nav-link {{ request()->is('systemadmin/institution-categories') || request()->is('systemadmin/institution-categories/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Institution categories
            </p>
          </a>
        </li>
        @endcan
        
        @can('institution_type_access')
        <li class="nav-item">
          <a href="{{ route('systemadmin.institution-types.index') }}" class="nav-link {{ request()->is('systemadmin/institution-types') || request()->is('systemadmin/institution-types/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Institution Types
            </p>
          </a>
        </li>
        @endcan
        @can('program_level_access')
        <li class="nav-item">
          <a href="{{ route('systemadmin.program-levels.index') }}" class="nav-link {{ request()->is('systemadmin/program-levels') || request()->is('systemadmin/program-levels/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Program Levels
            </p>
          </a>
        </li>
        @endcan
        @can('program_category_access')
        <li class="nav-item">
          <a href="{{ route('systemadmin.program-categories.index') }}" class="nav-link {{ request()->is('systemadmin/program-categories') || request()->is('systemadmin/program-categories/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Program Categories
            </p>
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcan
    @can('directorate_access')
    <li class="nav-item">
      <a href="{{route('systemadmin.directorates.index')}}" class="nav-link {{ request()->is('systemadmin/directorates') || request()->is('systemadmin/directorates/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Directorates
        </p>
      </a>
    </li>
    @endcan
    @can('designation_access')
      <li class="nav-item">
      <a href="{{route('systemadmin.designations.index')}}" class="nav-link {{ request()->is('systemadmin/designations') || request()->is('systemadmin/designations/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>
          Designations
        </p>
      </a>
    </li>
    @endcan
    @can('subdivision_access')
    <li class="nav-item menu-open">
      <a href="#" class="nav-link {{ request()->is('systemadmin/regions') || request()->is('systemadmin/regions/*') || request()->is('systemadmin/districts') || request()->is('systemadmin/districts/*') || request()->is('systemadmin/towns-villages') || request()->is('systemadmin/towns-villages/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
          Subdivisions
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        @can('region_access')
        <li class="nav-item">
          <a href="{{route('systemadmin.regions.index')}}" class="nav-link {{ request()->is('systemadmin/regions') || request()->is('systemadmin/regions/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Regions
            </p>
          </a>
        </li>
        @endcan
        @can('district_access')
        <li class="nav-item">
          <a href="{{route('systemadmin.districts.index')}}" class="nav-link {{ request()->is('systemadmin/districts') || request()->is('systemadmin/districts/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-location-arrow"></i>
            <p>
              Districts
            </p>
          </a>
        </li>
        @endcan
        @can('towns_villages_access')
        <li class="nav-item">
          <a href="{{route('systemadmin.towns-villages.index')}}" class="nav-link {{ request()->is('systemadmin/towns-villages') || request()->is('systemadmin/towns-villages/*') ? 'active' : '' }}">
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
    @can('standards_access')
    <li class="nav-item">
      <a href="{{ route('systemadmin.standards.index') }}" class="nav-link {{ request()->is('systemadmin/standards') || request()->is('systemadmin/standards/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
            Standards
        </p>
      </a>
    </li>
    @endcan
    @can('compliance_level_access')
    <li class="nav-item">
      <a href="{{route('systemadmin.compliance-levels.index')}}" class="nav-link {{ request()->is('systemadmin/compliance-levels') || request()->is('systemadmin/compliance-levels/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
            Compliance Levels
        </p>
      </a>
    </li>
    @endcan
    @can('activity_logs_access')
    <li class="nav-item">
      <a href="{{route('systemadmin.activities.index')}}" class="nav-link {{ request()->is('systemadmin/auditlogs') || request()->is('systemadmin/auditlogs/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-archive"></i>
        <p>
          Activity Logs
        </p>
      </a>
    </li>
    @endcan
    @can('systemadmin_reports_access')
    <li class="nav-item">
      <a href="{{route('systemadmin.activities.index')}}" class="nav-link {{ request()->is('systemadmin/auditlogs') || request()->is('systemadmin/auditlogs/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Reports
        </p>
      </a>
    </li>
    @endcan
    @can('backup_access')
    <li class="nav-item">
      <a href="{{route('systemadmin.activities.index')}}" class="nav-link {{ request()->is('systemadmin/settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-database"></i>
        <p>
          Backup
        </p>
      </a>
    </li>
    @endcan
    @can('profile_access')
    <li class="nav-item">
      <a href="{{route('settings')}}" class="nav-link {{ request()->is('settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
          Profile
        </p>
      </a>
    </li>
    @endcan
    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-power-off"></i>
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