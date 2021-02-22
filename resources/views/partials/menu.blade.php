 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
        <a href="#" class="nav-link">
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
    <li class="nav-item">
      <a href="{{route('systemadmin.institution-settings')}}" class="nav-link {{ request()->is('systemadmin/institutions') || request()->is('systemadmin/institutions/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          Naqaa Settings
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('systemadmin.directorates')}}" class="nav-link {{ request()->is('systemadmin/directorates') || request()->is('systemadmin/directorates/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Directorates
        </p>
      </a>
    </li>
      <li class="nav-item">
      <a href="{{route('systemadmin.designations')}}" class="nav-link {{ request()->is('systemadmin/designations') || request()->is('systemadmin/designations/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tag"></i>
        <p>
          Designations
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('systemadmin.subdivisions')}}" class="nav-link {{ request()->is('systemadmin/subdivisions') || request()->is('systemadmin/subdivisions/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
          Subdivisions
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('systemadmin.roles.index')}}" class="nav-link {{ request()->is('systemadmin/requirements') || request()->is('systemadmin/requirements/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-prescription"></i>
        <p>
          Requirements
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('systemadmin.auditlogs.index')}}" class="nav-link {{ request()->is('systemadmin/auditlogs') || request()->is('systemadmin/auditlogs/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Audit Logs
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('systemadmin.settings')}}" class="nav-link {{ request()->is('systemadmin/settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
          Settings
        </p>
      </a>
    </li>
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