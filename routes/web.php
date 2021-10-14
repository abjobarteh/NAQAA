<?php

use App\Http\Controllers\AssessmentCertification\AssessorVerifiersController;
use App\Http\Controllers\AssessmentCertification\CertificateEndorsementsController;
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
use App\Http\Controllers\Portal\Trainer\AccreditationsController;
use App\Http\Controllers\Portal\Trainer\DashboardController as TrainerDashboardController;
use App\Http\Controllers\Portal\Trainer\RegistrationsController;
use App\Http\Controllers\RegistrationAccreditation\ApplicationsController;
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
use App\Http\Livewire\AssessmentCertification\GenerateCandidates;
use App\Http\Livewire\AssessmentCertification\StudentAssessment;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Portal\Institution\Applications\EditInterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Applications\InterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Applications\NewInterimAuthorisation;
use App\Http\Livewire\Portal\Institution\Datacollection\StudentDatacollection;
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

      // // check if institution is registered & accredited
      // Route::post('check-is-institution-registered', [ProgramOfferedController::class, 'checkIsInstitutionRegistered'])
      //   ->name('check-is-institution-registered');
      Route::resource('program-details', ProgramOfferedController::class)->except('destroy');
      // route rendering a livewire component
      Route::get('add-programme-details', AddProgrammesOffered::class)->name('add-programme-details');
      Route::get('edit-programme-details/{id}', EditProgrammesOffered::class)->name('edit-programme-details');
      Route::resource('academicadminstaff-details', AcademicAdminStaffDetailsController::class)->except('destroy');
      Route::get('add-graduate-details', [StudentDetailsController::class, 'addGraduateDetails'])->name('add-graduate-details');
      Route::get('get-admission-details', [StudentDetailsController::class, 'getAdmissionStudents'])->name('get-admission-details');
      Route::post('store-graduation-details', [StudentDetailsController::class, 'storeGraduationDetails'])->name('store-graduation-details');
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
      Route::get('enrollments', EnrollmentReports::class)->name('enrollments');
      Route::get('graduates', GraduatesReports::class)->name('graduates');
      Route::get('labour-market', LabourMarketReports::class)->name('labour-market');
      Route::get('research-survey', ResearchSurveyReports::class)->name('research-survey');
    });
  });

  // Standard and Curriculum module Routes
  Route::group([
    'prefix' => 'standardscurriculum', 'as' => 'standardscurriculum.',
    'middleware' => 'role:standards_development_module'
  ], function () {
    Route::redirect('/', 'standardscurriculum/dashboard');

    Route::get('/dashboard', StandardsCurriculumDashboardController::class)->name('dashboard');

    // unit standards
    Route::resource('unit-standards', UnitStandardsController::class)->except('destroy');
    Route::get('review-standards', [ReviewUnitStandardsController::class, 'index'])->name('review-standards');
    // Route::post('review-standards', [ReviewUnitStandardsController::class,'create'])->name('review-standards');
    // Route::get('retrieve-unit-standards', [ReviewUnitStandardsController::class,'retrieveUnitStandards'])->name('retrieve-unit-standards');

    // Qualifications
    Route::post('update-review-date', [QualificationsController::class, 'updateReviewDate'])->name('update-review-date');
    Route::resource('qualifications', QualificationsController::class);
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
      Route::resource('trainers', TrainersRegistrationController::class);
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

    Route::redirect('/', 'assessment-certification/registrations');

    Route::group(['prefix' => 'assessment', 'as' => 'assessment.'], function () {
      Route::get('candidates', GenerateCandidates::class)->name('candidates');
      Route::get('student-assessment', StudentAssessment::class)->name('student-assessment');
      Route::post('generate-candidates', [StudentAssessmentsController::class, 'generateCandidates'])->name('generate-candidates');
      Route::post('generate-assessment-candidates', [StudentAssessmentsController::class, 'generateCandidatesForAssessment'])
        ->name('generate-assessment-candidates');
      Route::post('assign-assessor', [StudentAssessmentsController::class, 'assessorAssignment'])->name('assign-assessor');
      Route::post('store-assessment-details', [StudentAssessmentsController::class, 'storeAssessmentDetails'])->name('store-assessment-details');
    });

    // student registrations
    Route::resource('registrations', StudentRegistrationsController::class);

    // student assessments

    // endorsement of certificates
    Route::resource('certificate-endorsements', CertificateEndorsementsController::class);

    // Assessor/Verifiers
    Route::get('assessor-verifiers', AssessorVerifiersController::class)->name('assessor-verifiers');
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

    Route::group(['prefix' => 'institution', 'as' => 'institution.'], function () {

      Route::redirect('/', 'institution/dashboard');

      Route::get('dashboard', InstitutionDashboardController::class)->name('dashboard');
      Route::get('interim-authorisation', InterimAuthorisation::class)->name('interim-authorisation');
      Route::get('new-interim-authorisation', NewInterimAuthorisation::class)->name('new-interim-authorisation');
      Route::get('edit-interim-authorisation/{id}', EditInterimAuthorisation::class)->name('edit-interim-authorisation');
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
      // Route::get('settings',)
    });
    Route::group(['prefix' => 'trainer', 'as' => 'trainer.'], function () {

      Route::redirect('/', 'trainer/dashboard');

      Route::get('dashboard', TrainerDashboardController::class)->name('dashboard');

      // Trainer registratinons
      Route::resource('registrations', RegistrationsController::class);

      // Trainer accreditations
      Route::resource('accreditations', AccreditationsController::class);
    });
    // Portal Profiles Settings
    Route::get('settings', [InstitutionProfilesController::class, 'settings'])
      ->name('settings');

    Route::put('updateprofile', [InstitutionProfilesController::class, 'updateProfile'])
      ->name('updateprofile');

    Route::put('changepassword', [InstitutionProfilesController::class, 'changePassword'])
      ->name('changepassword');
  });
});
