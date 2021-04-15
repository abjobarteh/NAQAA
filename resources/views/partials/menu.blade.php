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
@can('access_data_collection')
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('researchdevelopment/datacollection/*') || 
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
      <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}" class="nav-link 
      {{ request()->is('researchdevelopment/datacollection/institution-details') || 
         request()->is('researchdevelopment/datacollection/institution-details/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-university"></i>
        <p>
          Institution Details
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.datacollection.program-details.index')}}" class="nav-link 
      {{ request()->is('researchdevelopment/datacollection/program-details') || 
         request()->is('researchdevelopment/datacollection/program-details/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
          Programs Offered
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}" class="nav-link 
      {{ request()->is('researchdevelopment/datacollection/academicadminstaff-details') || 
         request()->is('researchdevelopment/datacollection/academicadminstaff-details/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
          Academic & Admin Staff
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('researchdevelopment.datacollection.student-details.index')}}" class="nav-link 
      {{ request()->is('researchdevelopment/datacollection/student-details') || 
         request()->is('researchdevelopment/datacollection/student-details/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
           Students Data
        </p>
      </a>
    </li>
    @can('access_research_development_data_import')
    <li class="nav-item">
      <a href="{{route('researchdevelopment.datacollection.datacollection-imports.index')}}" class="nav-link 
      {{ request()->is('researchdevelopment/datacollection/datacollection-imports') || 
         request()->is('researchdevelopment/datacollection/datacollection-imports/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-import"></i>
        <p>
           Automatic Import
        </p>
      </a>
    </li>
    @endcan
  </ul>
</li>
@endcan
@can('access_research_survey_documentation')
<li class="nav-item">
    <a href="{{route('researchdevelopment.research-survey-documentation.index')}}" class="nav-link {{
       request()->is('researchdevelopment/research-survey-documentation') ||
       request()->is('researchdevelopment/research-survey-documentation/*') ? 'active' : '' }}"
       >
      <i class="nav-icon fas fa-poll"></i>
      <p>
        Research Documentation
      </p>
    </a>
  </li>
  @endcan
  @can('access_research_development_reports')
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
  @endcan
@endrole
