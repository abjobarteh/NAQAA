{{-- Research and Development --}}
@role('research_and_development_module')
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
         request()->is('researchdevelopment/datacollection/program-details/*') ||
         request()->is('researchdevelopment/datacollection/add-programme-details') ||
         request()->is('researchdevelopment/datacollection/edit-programme-details/*') ? 'active' : '' }}">
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
       request()->is('researchdevelopment/job-vacancies/*') ||
       request()->is('researchdevelopment/add-jobvacancy') ||
       request()->is('researchdevelopment/edit-jobvacancy/*') ? 'active' : '' }}"
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
      <a href="{{route('researchdevelopment.datacollection-imports')}}" class="nav-link 
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
  <li class="nav-item menu-open">
    <a href="#" class="nav-link 
    {{ request()->is('researchdevelopment/reports/*') || 
       request()->is('researchdevelopment/reports/*') ? 'active' : '' }}"
      >
      <i class="nav-icon fas fa-chart-area"></i>
      <p>
        Reports
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('researchdevelopment.reports.enrollments')}}" class="nav-link 
        {{ request()->is('researchdevelopment/reports/enrollments') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-graduate"></i>
          <p>
            Enrollments
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('researchdevelopment.reports.graduates')}}" class="nav-link 
        {{ request()->is('researchdevelopment/reports/graduates') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-graduate"></i>
          <p>
            Graduates
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('researchdevelopment.reports.labour-market')}}" class="nav-link 
        {{ request()->is('researchdevelopment/reports/labour-market') ? 'active' : '' }}">
          <i class="nav-icon fas fa-briefcase"></i>
          <p>
            Labour Market
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('researchdevelopment.reports.research-survey')}}" class="nav-link 
        {{ request()->is('researchdevelopment/reports/research-survey') ? 'active' : '' }}">
          <i class="nav-icon fas fa-search-dollar"></i>
          <p>
            Research or Survey
          </p>
        </a>
      </li>
    </ul>
  </li>
  @endcan
@endrole
{{-- Standards and curriculum --}}
@role('standards_development_module')
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
@can('access_qualifications')
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
  @can('access_unit_standard_reports')
  <li class="nav-item menu-open">
    <a href="#" class="nav-link 
    {{ request()->is('standardscurriculum/reports/*') || 
       request()->is('standardscurriculum/reports/*') ? 'active' : '' }}"
      >
      <i class="nav-icon fas fa-chart-area"></i>
      <p>
        Reports
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('standardscurriculum.reports.unit-standards')}}" class="nav-link 
        {{ request()->is('standardscurriculum/reports/unit-standards') ? 'active' : '' }}">
          <i class="nav-icon fas fa-chart-line"></i>
          <p>
            Unit Standards
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('standardscurriculum.reports.qualification')}}" class="nav-link 
        {{ request()->is('standardscurriculum/reports/qualification') ? 'active' : '' }}">
          <i class="nav-icon fas fa-user-graduate"></i>
          <p>
            Qualifications
          </p>
        </a>
      </li>
    </ul>
  </li>
  @endcan
@endrole

{{-- Registration Accreditation --}}
@role('registration_and_accreditation_module')
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
@can('access_registration')
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
         request()->is('registration-accreditation/registration/create-trainer-registration') || 
         request()->is('registration-accreditation/registration/edit-trainer-registration') || 
         request()->is('registration-accreditation/registration/edit-trainer-registration/*') || 
         request()->is('registration-accreditation/registration/trainers/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-id-card-alt"></i>
        <p>
          Trainers
        </p>
      </a>
    </li>
  </ul>
</li>
@endcan
@can('access_accreditation')
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
        <i class="nav-icon fas fa-id-card-alt"></i>
        <p>
          Trainers
        </p>
      </a>
    </li>
  </ul>
</li>
@endcan
@can('access_licence')
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('registration-accreditation/licences/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-credit-card"></i>
    <p>
      Licences
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.licence.registrations')}}" class="nav-link 
      {{ request()->is('registration-accreditation/licence/registrations') || 
         request()->is('registration-accreditation/licence/registrations/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
          Registration
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('registration-accreditation.licence.accreditations')}}" class="nav-link 
      {{ request()->is('registration-accreditation/licence/accreditations') || 
         request()->is('registration-accreditation/licence/accreditations/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-stamp"></i>
        <p>
          Accreditation
        </p>
      </a>
    </li>
  </ul>
</li>
@endcan
@can('access_portal_applications')
<li class="nav-item">
  <a href="{{route('registration-accreditation.applications.index')}}" class="nav-link 
  {{ request()->is('registration-accreditation/applications') || 
    request()->is('registration-accreditation/applications/*') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-envelope"></i>
    <p>
      Portal Applications
      <span class="badge badge-info right">@php
          echo \App\Models\RegistrationAccreditation\ApplicationDetail::where('submitted_from', 'Portal')
            ->where('submitted_from', 'Portal')
            ->where('application_form_status', 'submitted')
            ->whereIn('status', ['Pending','Ongoing'])
            ->latest()
            ->count();
      @endphp</span>
    </p>
  </a>
</li>
@endcan
@can('access_checklist_configuration')
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('registration-accreditation/checklist-thematic-area') ||
    request()->is('registration-accreditation/checklist-thematic-area/*') ||
    request()->is('registration-accreditation/checklists') ||
    request()->is('registration-accreditation/checklists/*')
  ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-th-list"></i>
    <p>
       Checklists configuration
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.checklist-thematic-area.index')}}" class="nav-link 
      {{ request()->is('registration-accreditation/checklist-thematic-area') || 
         request()->is('registration-accreditation/checklist-thematic-area/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
          Checklist Thematic Area
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('registration-accreditation.checklists.index')}}" class="nav-link 
      {{ request()->is('registration-accreditation/checklists') || 
         request()->is('registration-accreditation/checklists/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list-ul"></i>
        <p>
          Checklist evidence
        </p>
      </a>
    </li>
  </ul>
</li> 
@endcan
@can('access_registration_accreditation_reports')
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('registration-accreditation/reports/*') || 
     request()->is('registration-accreditation/reports/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-chart-area"></i>
    <p>
      Reports
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('registration-accreditation.reports.learning-centers')}}" class="nav-link 
      {{ request()->is('registration-accreditation/reports/learning-centers') ? 'active' : '' }}">
        <i class="nav-icon fas fa-university"></i>
        <p>
          Learning Centers
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('registration-accreditation.reports.registered-trainers')}}" class="nav-link 
      {{ request()->is('registration-accreditation/reports/registered-trainers') ||
      request()->is('registration-accreditation/reports/registered-trainer-reports')
        ? 'active' : '' }}">
        <i class="nav-icon fas fa-id-card"></i>
        <p>
          Trainers
        </p>
      </a>
    </li>
  </ul>
</li>
@endcan
@endrole

{{-- Assessment & Certification --}}
@role('assessment_and_certification_module')
<li class="nav-item">
  <a href="{{route('assessment-certification.dashboard')}}" class="nav-link {{
     request()->is('assessment-certification/dashboard') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
@can('access_student_registration')
<li class="nav-item">
  <a href="{{route('assessment-certification.registrations.index')}}" class="nav-link {{
     request()->is('assessment-certification/registrations') || 
     request()->is('assessment-certification/registrations/*') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-user-graduate"></i>
    <p>
      Registrations
    </p>
  </a>
</li>
@endcan
@can('access_student_registration')
<li class="nav-item">
  <a href="{{route('assessment-certification.portal-registrations')}}" class="nav-link {{
     request()->is('assessment-certification/portal-registrations') || 
     request()->is('assessment-certification/portal-registrations/*') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-envelope-open-text"></i>
    <p>
      Portal Registrations
    </p>
  </a>
</li>
@endcan
@can('access_student_assessment')
<li class="nav-item menu-open">
  <a href="#" class="nav-link 
  {{ request()->is('assessment-certification/assessment/*') ? 'active' : '' }}"
    >
    <i class="nav-icon fas fa-stream"></i>
    <p>
      Assessmeent
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('assessment-certification.assessment.candidates')}}" class="nav-link 
      {{ request()->is('assessment-certification/assessment/candidates') || 
         request()->is('assessment-certification/assessment/candidates/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-certificate"></i>
        <p>
          Generate Candidates
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('assessment-certification.assessment.student-assessment')}}" class="nav-link 
      {{ request()->is('assessment-certification/assessment/student-assessment') || 
         request()->is('assessment-certification/assessment/student-assessment/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-id-card-alt"></i>
        <p>
          Student Assessment
        </p>
      </a>
    </li>
  </ul>
</li>
@endcan
@can('access_endorsement')
<li class="nav-item">
  <a href="{{route('assessment-certification.certificate-endorsements.index')}}" class="nav-link {{
     request()->is('assessment-certification/certificate-endorsements') ||
     request()->is('assessment-certification/certificate-endorsements/*') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-stamp"></i>
    <p>
      Endorsements
      <span class="badge badge-info right">
        <?php echo App\Models\AssessmentCertification\EndorsedCertificateDetail::where('request_status','pending')->get()->count() ?>
      </span>
    </p>
  </a>
</li>
@endcan
<li class="nav-item">
  <a href="{{route('assessment-certification.assessor-verifiers')}}" class="nav-link {{
     request()->is('assessment-certification/assessor-verifiers') ||
     request()->is('assessment-certification/assessor-verifiers/*') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-chalkboard-teacher"></i>
    <p>
      Assessor/Verifiers
    </p>
  </a>
</li>
@can('access_assessment_certification_reports')
<li class="nav-item">
  <a href="{{route('assessment-certification.learner-achievements')}}" class="nav-link {{
    request()->is('assessment-certification/learner-achievements') ||
    request()->is('assessment-certification/learner-achievements/*') ||
    request()->is('assessment-certification/learner-achievement-reports/*') ? 'active' : '' }}"
     >
    <i class="nav-icon fas fa-chart-bar"></i>
    <p>
      Reports
    </p>
  </a>
</li>
@endcan
@endrole
