<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/man.svg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('systemadmin.index')}}" class="d-block">{{ Auth::user()->full_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('systemadmin.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.institutions')}}" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Institutions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.departments')}}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Directorates
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.subdivisions')}}" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Subdivisions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.roles-permissions')}}" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Roles/Permissions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.activities')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Activities
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('systemadmin.settings')}}" class="nav-link">
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
    </div>
    <!-- /.sidebar -->
  </aside>