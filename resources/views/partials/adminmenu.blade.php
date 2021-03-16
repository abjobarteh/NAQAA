 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar nav-child-indent nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    
    <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    @can('user_management_access')
      <li class="nav-item menu-open">
        <a href="#" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/roles') || request()->is('admin/users') || request()->is('admin/permissions/*') || request()->is('admin/roles/*') || request()->is('admin/users/*') || request()->is('admin/permissions/*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>
            User Management
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @can('permission_access')
          <li class="nav-item">
            <a href="{{route('admin.permissions.index')}}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Permissions
              </p>
            </a>
          </li>
          @endcan

          @can('role_access')
          <li class="nav-item">
            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan
          
          @can('user_access')
          <li class="nav-item">
            <a href="{{route('admin.users.index')}}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
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
    {{-- @can('institution_settings_access')
    <li class="nav-item menu-open">
      <a href="#" class="nav-link {{ request()->is('admin/institution-categories') || request()->is('admin/institution-types') || request()->is('admin/program-levels') || request()->is('admin/program-categories') || request()->is('admin/institution-types/*') || request()->is('admin/program-levels/*') || request()->is('admin/program-categories/*') || request()->is('admin/institution-categories/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          Institution Settings
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        @can('institution_categories_access')
        <li class="nav-item">
          <a href="{{ route('admin.institution-categories.index') }}" class="nav-link {{ request()->is('admin/institution-categories') || request()->is('admin/institution-categories/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Institution categories
            </p>
          </a>
        </li>
        @endcan
        
        @can('institution_type_access')
        <li class="nav-item">
          <a href="{{ route('admin.institution-types.index') }}" class="nav-link {{ request()->is('admin/institution-types') || request()->is('admin/institution-types/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Institution Types
            </p>
          </a>
        </li>
        @endcan
        @can('program_level_access')
        <li class="nav-item">
          <a href="{{ route('admin.program-levels.index') }}" class="nav-link {{ request()->is('admin/program-levels') || request()->is('admin/program-levels/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Program Levels
            </p>
          </a>
        </li>
        @endcan
        @can('program_category_access')
        <li class="nav-item">
          <a href="{{ route('admin.program-categories.index') }}" class="nav-link {{ request()->is('admin/program-categories') || request()->is('admin/program-categories/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-house-user"></i>
            <p>
              Program Categories
            </p>
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcan --}}
    @can('directorate_access')
    <li class="nav-item">
      <a href="{{route('admin.directorates.index')}}" class="nav-link {{ request()->is('admin/directorates') || request()->is('admin/directorates/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Directorates
        </p>
      </a>
    </li>
    @endcan
    @can('unit_access')
    <li class="nav-item">
      <a href="{{route('admin.units.index')}}" class="nav-link {{ request()->is('admin/units') || request()->is('admin/units/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Units
        </p>
      </a>
    </li>
    @endcan
    @can('designation_access')
      <li class="nav-item">
      <a href="{{route('admin.designations.index')}}" class="nav-link {{ request()->is('admin/designations') || request()->is('admin/designations/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>
          Designations
        </p>
      </a>
    </li>
    @endcan
    @can('subdivision_access')
    <li class="nav-item menu-open">
      <a href="#" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') || request()->is('admin/districts') || request()->is('admin/districts/*') || request()->is('admin/towns-villages') || request()->is('admin/towns-villages/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
          Country Subdivisions
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        @can('region_access')
        <li class="nav-item">
          <a href="{{route('admin.regions.index')}}" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Regions
            </p>
          </a>
        </li>
        @endcan
        @can('district_access')
        <li class="nav-item">
          <a href="{{route('admin.districts.index')}}" class="nav-link {{ request()->is('admin/districts') || request()->is('admin/districts/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-location-arrow"></i>
            <p>
              Districts
            </p>
          </a>
        </li>
        @endcan
        @can('towns_villages_access')
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
    @can('standards_access')
    <li class="nav-item">
      <a href="{{ route('admin.standards.index') }}" class="nav-link {{ request()->is('admin/standards') || request()->is('admin/standards/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-solar-panel"></i>
        <p>
            Panels
        </p>
      </a>
    </li>
    @endcan
    @can('standards_access')
    <li class="nav-item">
      <a href="{{ route('admin.standards.index') }}" class="nav-link {{ request()->is('admin/standards') || request()->is('admin/standards/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
            Standards
        </p>
      </a>
    </li>
    @endcan
    @can('compliance_level_access')
    <li class="nav-item">
      <a href="{{route('admin.compliance-levels.index')}}" class="nav-link {{ request()->is('admin/compliance-levels') || request()->is('admin/compliance-levels/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
            Compliance Levels
        </p>
      </a>
    </li>
    @endcan
    @can('activity_logs_access')
    <li class="nav-item">
      <a href="{{route('admin.activities.index')}}" class="nav-link {{ request()->is('admin/activities') || request()->is('admin/activities/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-archive"></i>
        <p>
          Activity Logs
        </p>
      </a>
    </li>
    @endcan
    @can('admin_reports_access')
    <li class="nav-item">
      <a href="{{route('admin.activities.index')}}" class="nav-link {{ request()->is('admin/auditlogs') || request()->is('admin/auditlogs/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Reports
        </p>
      </a>
    </li>
    @endcan
    @can('backup_access')
    <li class="nav-item">
      <a href="{{route('admin.backup')}}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-database"></i>
        <p>
          Backup
        </p>
      </a>
    </li>
    @endcan
    <li class="nav-item">
      <a href="{{route('settings')}}" class="nav-link {{ request()->is('settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
          Profile
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->