{{-- Research and Development --}}
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
@can('access_research_survey_documentation')
<li class="nav-item">
    <a href="{{route('researchdevelopment.job-vacancies.index')}}" class="nav-link {{
       request()->is('researchdevelopment/job-vacancies') ||
       request()->is('researchdevelopment/job-vacancies/*') ? 'active' : '' }}"
       >
      <i class="nav-icon fas fa-briefcase"></i>
      <p>
        Vacancies Information
      </p>
    </a>
  </li>
  @endcan
  @can('access_research_development_data_import')
    <li class="nav-item">
      <a href="{{route('researchdevelopment.datacollection-imports.index')}}" class="nav-link 
      {{ request()->is('researchdevelopment/datacollection-imports') || 
         request()->is('researchdevelopment/datacollection-imports/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-import"></i>
        <p>
           Automatic Import
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
{{-- Standards and curriculum --}}
@role('standards_development_manager|standards_development_officer')
<li class="nav-item">
  <a href="{{route('standardscurriculum.dashboard')}}" class="nav-link {{
     request()->is('standardscurriculum/dashboard') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
@can('access_unit_standards')
<li class="nav-item">
  <a href="{{route('standardscurriculum.qualifications.index')}}" class="nav-link 
  {{ request()->is('standardscurriculum/qualifications') || 
     request()->is('standardscurriculum/qualifications/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-award"></i>
    <p>
      Qualifications
    </p>
  </a>
  </li>
  @endcan
@can('access_unit_standards')
<li class="nav-item">
  <a href="{{route('standardscurriculum.unit-standards.index')}}" class="nav-link 
  {{ request()->is('standardscurriculum/unit-standards') || 
     request()->is('standardscurriculum/unit-standards/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-scroll"></i>
    <p>
      Unit Standards
    </p>
  </a>
  </li>
  @endcan
{{-- @can('access_unit_standard_reviews')
<li class="nav-item">
  <a href="{{route('standardscurriculum.review-standards')}}" class="nav-link 
  {{ request()->is('standardscurriculum/review-standards') || 
     request()->is('standardscurriculum/review-standards/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-scroll"></i>
    <p>
      Review Unit Standards
    </p>
  </a>
  </li>
  @endcan --}}
  @can('access_unit_standard_reports')
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

{{-- Registration Accreditation --}}
@role('registration_and_accreditation_manager|registration_and_accreditation_officer')
<li class="nav-item">
  <a href="{{route('registration-accreditation.dashboard')}}" class="nav-link {{
     request()->is('registration-accreditation/dashboard') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('registration-accreditation/registration/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-newspaper"></i>
    <p>
      Registration
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.registration.trainingproviders.index')}}" class="nav-link 
      {{ request()->is('registration-accreditation/registration/trainingproviders') || 
         request()->is('registration-accreditation/registration/trainingproviders/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-university"></i>
        <p>
          Training Providers
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('registration-accreditation.registration.trainers.index')}}" class="nav-link 
      {{ request()->is('registration-accreditation/registration/trainers') || 
         request()->is('registration-accreditation/registration/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
          Trainers
        </p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('registration-accreditation/accreditation/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-stamp"></i>
    <p>
      Accreditation
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.accreditation.programmes.index')}}" class="nav-link 
      {{ request()->is('registration-accreditation/accreditation/programmes') || 
         request()->is('registration-accreditation/accreditation/programmes/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-certificate"></i>
        <p>
          Programmes
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('registration-accreditation.accreditation.trainers.index')}}" class="nav-link 
      {{ request()->is('registration-accreditation/accreditation/trainers') || 
         request()->is('registration-accreditation/accreditation/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>
          Trainers
        </p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a href="#" class="nav-link"
     >
    <i class="nav-icon fas fa-envelope"></i>
    <p>
      Applications
      <span class="badge badge-info right">6</span>
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link"
     >
    <i class="nav-icon fas fa-chart-bar"></i>
    <p>
      Reports
    </p>
  </a>
</li>
@endrole
