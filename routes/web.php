<?php

use App\Http\Controllers\AssessmentCertification\AssessorVerifiersController;
use App\Http\Controllers\AssessmentCertification\CertificateEndorsementsController;
use App\Http\Controllers\AssessmentCertification\DashboardController as AssessmentCertificationDashboardController;
use App\Http\Controllers\AssessmentCertification\StudentAssessmentsController;
use App\Http\Controllers\AssessmentCertification\StudentRegistrationsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\MultipleRolesController;
use App\Http\Controllers\Auth\ProfilesController;
use App\Http\Controllers\Portal\Institution\AccreditationController;
use App\Http\Controllers\Portal\Institution\CertificateEndorsementController;
use App\Http\Controllers\Portal\Institution\DashboardController as InstitutionDashboardController;
use App\Http\Controllers\Portal\Institution\LearningCenterDataCollectionController;
use App\Http\Controllers\Portal\Institution\ProfilesController as InstitutionProfilesController;
use App\Http\Controllers\Portal\Institution\ProgrammeDataCollectionController;
use App\Http\Controllers\Portal\Institution\RegistrationController;
use App\Http\Controllers\Portal\Institution\StudentsDataCollectionController;
use App\Http\Controllers\Portal\Institution\TrainerDataCollectionController;
use App\Http\Controllers\Portal\Institution\TrainingProviderChecklistController;
use App\Http\Controllers\Portal\Trainer\AccreditationsController;
use App\Http\Controllers\Portal\Trainer\DashboardController as TrainerDashboardController;
use App\Http\Controllers\Portal\Trainer\RegistrationsController;
use App\Http\Controllers\Portal\Trainer\TrainerChecklistController;
use App\Http\Controllers\RegistrationAccreditation\ApplicationsController;
use App\Http\Controllers\RegistrationAccreditation\ChecklistController;
use App\Http\Controllers\RegistrationAccreditation\ChecklistThematicAreaController;
use App\Http\Controllers\RegistrationAccreditation\DashboardController as RegistrationAccreditationDashboardController;
use App\Http\Controllers\RegistrationAccreditation\LicencesManagementController;
use App\Http\Controllers\RegistrationAccreditation\TrainersAccreditationController;
use App\Http\Controllers\RegistrationAccreditation\TrainersRegistrationController;
use App\Http\Controllers\RegistrationAccreditation\TrainingProviderProgramsAccreditationController;
use App\Http\Controllers\RegistrationAccreditation\TrainingProvidersRegistrationController;
use App\Http\Controllers\researchdevelopment\DashboardController as ResearchdevelopmentDashboardController;
use App\Http\Controllers\researchdevelopment\DataCollections\AcademicAdminStaffDetailsController;
use App\Http\Controllers\researchdevelopment\DataCollections\DataCollectionsImportsController;
use App\Http\Controllers\researchdevelopment\DataCollections\InstitutionDetailsController;
use App\Http\Controllers\researchdevelopment\DataCollections\ProgramOfferedController;
use App\Http\Controllers\researchdevelopment\DataCollections\StudentDetailsController;
use App\Http\Controllers\ResearchDevelopment\JobVacanciesDataController;
use App\Http\Controllers\researchdevelopment\ReportsController;
use App\Http\Controllers\researchdevelopment\ResearchSurveyDocumentationController;
use App\Http\Controllers\StandardsCurriculum\DashboardController as StandardsCurriculumDashboardController;
use App\Http\Controllers\StandardsCurriculum\QualificationsController;
use App\Http\Controllers\StandardsCurriculum\ReviewUnitStandardsController;
use App\Http\Controllers\StandardsCurriculum\UnitStandardsController;
use App\Http\Controllers\systemadmin\ActivitiesController;
use App\Http\Controllers\systemadmin\ApplicationFeeTarrifsController;
use App\Http\Controllers\systemadmin\ApplicationTokensController;
use App\Http\Controllers\systemadmin\AwardingBodiesController;
use App\Http\Controllers\systemadmin\BackupsController;
use App\Http\Controllers\systemadmin\DashboardController;
use App\Http\Controllers\systemadmin\DesignationsController;
use App\Http\Controllers\systemadmin\DirectoratesController;
use App\Http\Controllers\systemadmin\DistrictsController;
use App\Http\Controllers\systemadmin\EducationFieldsController;
use App\Http\Controllers\systemadmin\EducationSubFieldsController;
use App\Http\Controllers\systemadmin\JobVacanciesCategoryController;
use App\Http\Controllers\systemadmin\LocalGovermentAreasController;
use App\Http\Controllers\systemadmin\LocalLanguageController;
use App\Http\Controllers\systemadmin\PermissionsController;
use App\Http\Controllers\systemadmin\PredefinedSettingsController;
use App\Http\Controllers\systemadmin\QualificationLevelsController;
use App\Http\Controllers\systemadmin\RegionsController;
use App\Http\Controllers\systemadmin\RolesController;
use App\Http\Controllers\systemadmin\TownsVilagesController;
use App\Http\Controllers\systemadmin\TrainingProviderCategoryController;
use App\Http\Controllers\systemadmin\TrainingProviderClassificationsController;
use App\Http\Controllers\systemadmin\TrainingProviderOwnershipsController;
use App\Http\Controllers\systemadmin\TrainingProviderStaffsRankController;
use App\Http\Controllers\systemadmin\TrainingProviderStaffsRoleController;
use App\Http\Controllers\systemadmin\UnitsController;
use App\Http\Controllers\systemadmin\UsersController;
use App\Http\Livewire\AssessmentCertification\EditStudentRegistration;
use App\Http\Livewire\AssessmentCertification\GenerateCandidates;
use App\Http\Livewire\AssessmentCertification\NewStudentRegistration;
use App\Http\Livewire\AssessmentCertification\Reports\LearnerAchievementReports;
use App\Http\Livewire\AssessmentCertification\StudentAssessment;
use App\Http\Livewire\AssessmentCertification\ViewStudentRegistration;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Portal\ApplicationPayment;
use App\Http\Livewire\Portal\Institution\Applications\EditInterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Applications\InterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Applications\NewInterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Applications\ViewInterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Datacollection\StudentDatacollection;
use App\Http\Livewire\Portal\Trainer\EditTrainerAccreditation;
use App\Http\Livewire\Portal\Trainer\EditTrainerRegistration as TrainerEditTrainerRegistration;
use App\Http\Livewire\Portal\Trainer\NewTrainerAccreditation;
use App\Http\Livewire\Portal\Trainer\NewTrainerRegistration;
use App\Http\Livewire\RegistrationAccreditation\CreateTrainerRegistration;
use App\Http\Livewire\RegistrationAccreditation\EditTrainerRegistration;
use App\Http\Livewire\RegistrationAccreditation\Reports\LearningCentersReport;
use App\Http\Livewire\RegistrationAccreditation\Reports\TrainersReport;
use App\Http\Livewire\ResearchDevelopment\CreateJobvacancy;
use App\Http\Livewire\ResearchDevelopment\Datacollection\AddProgrammesOffered;
use App\Http\Livewire\ResearchDevelopment\Datacollection\EditProgrammesOffered;
use App\Http\Livewire\ResearchDevelopment\Datacollection\StudentDetailsImport;
use App\Http\Livewire\ResearchDevelopment\EditJobvacancy;
use App\Http\Livewire\ResearchDevelopment\Reports\EnrollmentReports;
use App\Http\Livewire\ResearchDevelopment\Reports\GraduatesReports;
use App\Http\Livewire\ResearchDevelopment\Reports\LabourMarketReports;
use App\Http\Livewire\ResearchDevelopment\Reports\ResearchSurveyReports;
use App\Http\Livewire\StandardsCurriculum\Reports\UnitStandardReports;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');
Route::redirect('/home', '/systemadmin/');


require __DIR__ . '/auth.php';


Route::group(['middleware' => 'auth'], function () {

  // sysadmin Routes
  Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:sysadmin'], function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // institution settings
    // Route::get('configurations', DirectoratesController::class)->name('configurations');

    // Users
    Route::get('users/getunitsbydirectorate/{directorate}', [UsersController::class, 'getUnitsByDirectorate'])->name('users.getunitsbydirectorate');
    Route::resource('users', UsersController::class)->except('destroy');

    // Permissions
    Route::resource('permissions', PermissionsController::class)->except('destroy');

    // Roles
    Route::resource('roles', RolesController::class)->except('destroy');

    // Directorates
    Route::resource('directorates', DirectoratesController::class)->except('destroy');

    // Units
    Route::resource('units', UnitsController::class)->except('destroy');

    // Designations
    Route::resource('designations', DesignationsController::class)->except('destroy');

    // Regions
    Route::resource('regions', RegionsController::class)->except('destroy');

    // Local goverment Areas
    Route::resource('localgovermentareas', LocalGovermentAreasController::class)->except('destroy');

    // Districts
    Route::resource('districts', DistrictsController::class)->except('destroy');

    // Towns/Villages
    Route::resource('towns-villages', TownsVilagesController::class)->except('destroy');

    // Predefined Settings Route
    Route::get('configurations', PredefinedSettingsController::class)->name('configurations');

    // Education Fields
    Route::resource('education-fields', EducationFieldsController::class)->except('show');

    // Education SubFields
    Route::resource('education-subfields', EducationSubFieldsController::class)->except('show');

    // Academic & Admin Staff Ranks
    Route::resource('training-provider-staff-ranks', TrainingProviderStaffsRankController::class)->except('show');

    // Academic & Admin Staff Roles
    Route::resource('training-provider-staff-roles', TrainingProviderStaffsRoleController::class)->except('show');

    // EntryLevel Qualifications
    Route::resource('qualification-levels', QualificationLevelsController::class)->except('show');

    // Training Provider classfications
    Route::resource('training-provider-classifications', TrainingProviderClassificationsController::class)->except('show');

    // Training Provider Ownerships
    Route::resource('training-provider-ownerships', TrainingProviderOwnershipsController::class)->except('show');

    Route::resource('training-provider-categories', TrainingProviderCategoryController::class);

    // Job vacancies category
    Route::resource('jobvacancies-category', JobVacanciesCategoryController::class);

    // Local languages
    Route::resource('local-languages', LocalLanguageController::class);

    // Application Fees Tariffs
    Route::resource('application-fees-tariffs', ApplicationFeeTarrifsController::class)->except('show');

    // Awarding bodies 
    Route::resource('awarding-bodies', AwardingBodiesController::class);

    // Manage Application Tokens
    Route::resource('application-tokens', ApplicationTokensController::class)->except(['edit', 'destroy']);

    // Audit Logs index route
    Route::get('activities', [ActivitiesController::class, 'index'])->name('activities.index');
    Route::get('show-activity/{id}', [ActivitiesController::class, 'show'])->name('activities.show');
    Route::post('filter-logs', [ActivitiesController::class, 'filterLogs'])->name('filter-logs');

    // Backup system
    Route::get('backup', [BackupsController::class, 'index'])->name('backup');
    Route::get('backup/manual', [BackupsController::class, 'manualDatabaseBackup'])->name('backup.manual');
  });

  // Research and Development module routes
  Route::group([
    'prefix' => 'researchdevelopment', 'as' => 'researchdevelopment.',
    'middleware' => 'role:research_and_development_module'
  ], function () {

    Route::redirect('/', 'researchdevelopment/dashboard');

    Route::get('/dashboard', ResearchdevelopmentDashboardController::class)->name('dashboard');

    // data collection routes
    Route::group(['prefix' => 'datacollection', 'as' => 'datacollection.'], function () {
      Route::resource('institution-details', InstitutionDetailsController::class)->except('destroy');

      Route::resource('program-details', ProgramOfferedController::class)->except('destroy');
      // route rendering a livewire component
      Route::get('add-programme-details', AddProgrammesOffered::class)->name('add-programme-details');
      Route::get('edit-programme-details/{id}', EditProgrammesOffered::class)->name('edit-programme-details');

      // Academic & Admin Staff
      Route::resource('academicadminstaff-details', AcademicAdminStaffDetailsController::class)->except('destroy');

      // Student details
      Route::resource('student-details', StudentDetailsController::class)->except('destroy');
    });

    // Research survey documentation
    Route::post('filter-research-survey', [JobVacanciesDataController::class, 'filterResearchSurvey'])->name('filter-research-survey');
    Route::resource('research-survey-documentation', ResearchSurveyDocumentationController::class)->except('destroy');

    // Job vacancy
    Route::post('filter-vacancies', [JobVacanciesDataController::class, 'filterJobVacancy'])->name('filter-vacancies');
    Route::resource('job-vacancies', JobVacanciesDataController::class)->except('destroy');
    Route::get('add-jobvacancy', CreateJobvacancy::class)->name('add-jobvacancy');
    Route::get('edit-jobvacancy/{id}', EditJobvacancy::class)->name('edit-jobvacancy');

    // Imports
    Route::get('datacollection-imports', StudentDetailsImport::class)->name('datacollection-imports');
    Route::post('store-datacollection-import', [DataCollectionsImportsController::class, 'store'])->name('datacollection-imports.store');

    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
      // Enrollment reports
      Route::get('enrollments', function () {
        return view('researchdevelopment.reports.enrollment');
      })->name('enrollments');
      Route::get('enrollment-reports/{report_type}', EnrollmentReports::class)->name('enrollment-reports');

      // Graduate reports
      Route::get('graduates', function () {
        return view('researchdevelopment.reports.graduates');
      })->name('graduates');
      Route::get('graduate-reports/{report_type}', GraduatesReports::class)->name('graduate-reports');

      Route::get('labour-market', LabourMarketReports::class)->name('labour-market');

      // Labour market reports
      Route::get('research-survey', function () {
        return view('researchdevelopment.reports.researchsurvey');
      })->name('research-survey');
      Route::get('research-survey-reports/{report_type}', ResearchSurveyReports::class)->name('research-survey-reports');
    });
  });

  // Standard and Curriculum module Routes
  Route::group([
    'prefix' => 'standardscurriculum', 'as' => 'standardscurriculum.',
    'middleware' => 'role:standards_development_module'
  ], function () {
    Route::redirect('/', 'standardscurriculum/dashboard');

    Route::get('/dashboard', StandardsCurriculumDashboardController::class)->name('dashboard');

    // Qualifications
    Route::post('update-review-date', [QualificationsController::class, 'updateReviewDate'])->name('update-review-date');
    Route::resource('qualifications', QualificationsController::class);

    // unit standards
    Route::resource('unit-standards', UnitStandardsController::class)->except('destroy');

    // Reports
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
      // Unit Standard reports view page
      Route::get('unit-standards', function () {
        return view('standardscurriculum.reports.unitstandards');
      })->name('unit-standards');

      // Unit standards reports livewire component
      Route::get('unit-standard-reports/{report_type}', UnitStandardReports::class)->name('unit-standard-reports');
    });
  });


  // Registration and Accreditation Module Routes
  Route::group([
    'prefix' => 'registration-accreditation', 'as' => 'registration-accreditation.',
    'middleware' => ['role:registration_and_accreditation_module']
  ], function () {

    Route::redirect('/', 'registration-accreditation/dashboard');

    // Dashboard route
    Route::get('/dashboard', RegistrationAccreditationDashboardController::class)->name('dashboard');

    //   Registration Routes
    Route::group(['prefix' => 'registration', 'as' => 'registration.'], function () {

      // Training providers
      Route::post('filter-trainingproviders', [TrainingProvidersRegistrationController::class, 'filterTrainingProviders'])
        ->name('filter-trainingproviders');
      Route::resource('trainingproviders', TrainingProvidersRegistrationController::class);

      // Trainers
      // remove this route
      Route::resource('trainers', TrainersRegistrationController::class);
      // new routes using livewire component
      Route::get('create-trainer-registration', CreateTrainerRegistration::class)->name('create-trainer-registration');
      Route::get('edit-trainer-registration/{id}', EditTrainerRegistration::class)->name('edit-trainer-registration');
    });

    //   Accreditation Routes
    Route::group(['prefix' => 'accreditation', 'as' => 'accreditation.'], function () {

      // Trainers
      Route::resource('trainers', TrainersAccreditationController::class);
      // programmes
      Route::resource('programmes', TrainingProviderProgramsAccreditationController::class);
    });

    // licences
    Route::group(['prefix' => 'licence', 'as' => 'licence.'], function () {

      // registration licences
      Route::get('registrations', [LicencesManagementController::class, 'registration'])->name('registrations');
      // accreditation licences
      Route::get('accreditations', [LicencesManagementController::class, 'accreditation'])->name('accreditations');
      // revoke licence
      Route::post('licence-status', [LicencesManagementController::class, 'updateLicenceStatus'])->name('licence-status');
      // licence renewal
      Route::get('licence-renewal/{id}', [LicencesManagementController::class, 'licenceRenewal'])->name('licence-renewal');
      Route::post('renewal', [LicencesManagementController::class, 'renewLicence'])->name('renewal');
    });

    // applications
    Route::resource('applications', ApplicationsController::class)->except('create');

    // checklists thematic area
    Route::resource('checklist-thematic-area', ChecklistThematicAreaController::class)
      ->except('show', 'destroy');

    // checklists
    Route::resource('checklists', ChecklistController::class)
      ->except('show', 'destroy');

    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
      Route::get('learning-centers', LearningCentersReport::class)->name('learning-centers');
      Route::get('trainers', TrainersReport::class)->name('trainers');
    });
  });


  // Assessment and certification Module routes
  Route::group([
    'prefix' => 'assessment-certification', 'as' => 'assessment-certification.',
    'middleware' => 'role:assessment_and_certification_module'
  ], function () {

    Route::redirect('/', 'assessment-certification/dashboard');

    // Dashboard route
    Route::get('/dashboard', AssessmentCertificationDashboardController::class)->name('dashboard');

    // student registrations
    Route::resource('registrations', StudentRegistrationsController::class);
    Route::get('new-student-registration', NewStudentRegistration::class)->name('new-student-registration');
    Route::get('edit-student-registration/{id}', EditStudentRegistration::class)->name('edit-student-registration');
    Route::get('view-student-registration/{id}', ViewStudentRegistration::class)->name('view-student-registration');

    // student assessments
    Route::group(['prefix' => 'assessment', 'as' => 'assessment.'], function () {
      Route::get('candidates', GenerateCandidates::class)->name('candidates');
      Route::get('student-assessment', StudentAssessment::class)->name('student-assessment');
    });

    // endorsement of certificates
    Route::resource('certificate-endorsements', CertificateEndorsementsController::class);

    // Assessor/Verifiers
    Route::get('assessor-verifiers', AssessorVerifiersController::class)->name('assessor-verifiers');

    // Reports
    Route::get('learner-achievements', function () {
      return view('assessmentcertification.reports.learner-achievements');
    })->name('learner-achievements');

    Route::get('learner-achievement-reports/{report_type}', LearnerAchievementReports::class)->name('learner-achievement-reports');
  });

  // Notifications
  Route::get('notifications', Notifications::class)->name('notifications');


  // Profiles Settings
  Route::get('settings', [ProfilesController::class, 'settings'])
    ->name('settings');

  Route::put('settings/updateprofile', [ProfilesController::class, 'updateProfile'])
    ->name('settings.updateprofile');

  Route::put('settings/changepassword', [ProfilesController::class, 'changePassword'])
    ->name('settings.changepassword');

  // change default sysadmin password
  Route::get('/change-default-password', [AuthenticatedSessionController::class, 'changeDefaultPassword'])
    ->name('change-default-password')
    ->middleware('auth');
  Route::put('/update-default-password', [AuthenticatedSessionController::class, 'updateDefaultPassword']);

  // Change to another module when user has multiple role
  Route::get('multiple-roles/{role}', MultipleRolesController::class)->name('multiple-roles');


  // Portal module routes

  Route::group(['prefix' => 'portal', 'as' => 'portal.'], function () {

    // Institutions
    Route::group(['prefix' => 'institution', 'as' => 'institution.'], function () {

      Route::redirect('/', 'institution/dashboard');

      Route::get('dashboard', InstitutionDashboardController::class)->name('dashboard');
      Route::get('interim-authorisation', InterimAuthorisation::class)->name('interim-authorisation');
      Route::get('new-interim-authorisation', NewInterimAuthorisation::class)->name('new-interim-authorisation');
      Route::get('edit-interim-authorisation/{id}', EditInterimAuthorisation::class)->name('edit-interim-authorisation');
      Route::get('view-interim-authorisation/{id}', ViewInterimAuthorisation::class)->name('view-interim-authorisation');
      Route::resource('registration', RegistrationController::class);
      Route::resource('accreditation', AccreditationController::class);
      Route::resource('certificate-endorsements', CertificateEndorsementController::class);
      Route::group(['prefix' => 'datacollection', 'as' => 'datacollection.'], function () {
        Route::resource('learningcenter', LearningCenterDataCollectionController::class);
        Route::resource('students', StudentsDataCollectionController::class);
        Route::get('import-students', StudentDatacollection::class)->name('import-students');
        Route::resource('trainers', TrainerDataCollectionController::class);
        Route::resource('programmes', ProgrammeDataCollectionController::class);
      });

      // training provider checklist
      Route::resource('checklist-evidence', TrainingProviderChecklistController::class)
        ->except(['destroy', 'show']);
      // Route::get('settings',)
    });

    // Trainers
    Route::group(['prefix' => 'trainer', 'as' => 'trainer.'], function () {

      Route::redirect('/', 'trainer/dashboard');

      Route::get('dashboard', TrainerDashboardController::class)->name('dashboard');

      // Trainer registratinons
      Route::resource('registrations', RegistrationsController::class);
      Route::get('new-trainer-registration', NewTrainerRegistration::class)->name('new-trainer-registration');
      Route::get('edit-trainer-registration/{id}', TrainerEditTrainerRegistration::class)->name('edit-trainer-registration');

      // Trainer accreditations
      Route::resource('accreditations', AccreditationsController::class)->except(['store', 'update', 'delete']);
      Route::get('new-trainer-accreditation', NewTrainerAccreditation::class)->name('new-trainer-accreditation');
      Route::get('edit-trainer-accreditation/{id}', EditTrainerAccreditation::class)->name('edit-trainer-accreditation');

      // Trainer checklist
      Route::resource('checklist-evidence', TrainerChecklistController::class)
        ->except(['destroy', 'show']);
    });

    // payments page
    Route::get('application-payment/{id}', ApplicationPayment::class)->name('application-payment');

    // Portal Profiles Settings
    Route::get('settings', [InstitutionProfilesController::class, 'settings'])
      ->name('settings');

    Route::put('updateprofile', [InstitutionProfilesController::class, 'updateProfile'])
      ->name('updateprofile');

    Route::put('changepassword', [InstitutionProfilesController::class, 'changePassword'])
      ->name('changepassword');
  });
});
