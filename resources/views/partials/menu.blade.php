@role('research_and_development_manager|research_and_development_officer')
<li class="nav-item">
  <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link {{
     request()->is('researchdevelopment/dashboard') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('researchdevelopment/institutions') || 
     request()->is('researchdevelopment/assessor-verifiers/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-server"></i>
    <p>
      Data Collection
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link 
      {{ request()->is('researchdevelopment/trainers') || 
         request()->is('researchdevelopment/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Institutions Details
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link 
      {{ request()->is('researchdevelopment/trainers') || request()->is('researchdevelopment/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Programs Offered
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link 
      {{ request()->is('researchdevelopment/trainers') || request()->is('researchdevelopment/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
          Academic & Admin Staff
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link 
      {{ request()->is('researchdevelopment/trainers') || request()->is('researchdevelopment/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
           Graduates
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link 
      {{ request()->is('researchdevelopment/trainers') || request()->is('researchdevelopment/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-folder"></i>
        <p>
           Students Admission
        </p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
    <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link {{
       request()->is('researchdevelopment/dashboard') ? 'active' : '' }}"
       >
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Research Documentation
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{route('researchdevelopment.dashboard')}}" class="nav-link {{
       request()->is('researchdevelopment/dashboard') ? 'active' : '' }}"
       >
      <i class="nav-icon fas fa-chart-bar"></i>
      <p>
        Reports
      </p>
    </a>
  </li>
@endrole
