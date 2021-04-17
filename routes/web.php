<?php

use App\Http\Controllers\Auth\ProfilesController;
use App\Http\Controllers\RegistrationAccreditation\InstitutionRegistrationController;
use App\Http\Controllers\RegistrationAccreditation\TrainerRegistrationController;
use App\Http\Controllers\researchdevelopment\DashboardController as ResearchdevelopmentDashboardController;
use App\Http\Controllers\researchdevelopment\DataCollections\AcademicAdminStaffDetailsController;
use App\Http\Controllers\researchdevelopment\DataCollections\DataCollectionsImportsController;
use App\Http\Controllers\researchdevelopment\DataCollections\InstitutionDetailsController;
use App\Http\Controllers\researchdevelopment\DataCollections\ProgramOfferedController;
use App\Http\Controllers\researchdevelopment\DataCollections\StudentDetailsController;
use App\Http\Controllers\researchdevelopment\ResearchSurveyDocumentationController;
use App\Http\Controllers\StandardsCurriculum\DashboardController as StandardsCurriculumDashboardController;
use App\Http\Controllers\StandardsCurriculum\UnitStandardsController;
use App\Http\Controllers\systemadmin\ActivitiesController;
use App\Http\Controllers\systemadmin\ApplicationFeeTarrifsController;
use App\Http\Controllers\systemadmin\BackupsController;
use App\Http\Controllers\systemadmin\DashboardController;
use App\Http\Controllers\systemadmin\DesignationsController;
use App\Http\Controllers\systemadmin\DirectoratesController;
use App\Http\Controllers\systemadmin\DistrictsController;
use App\Http\Controllers\systemadmin\EducationFieldsController;
use App\Http\Controllers\systemadmin\EducationSubFieldsController;
use App\Http\Controllers\systemadmin\EntryLevelQualificationsController;
use App\Http\Controllers\systemadmin\LocalGovermentAreasController;
use App\Http\Controllers\systemadmin\PermissionsController;
use App\Http\Controllers\systemadmin\PredefinedSettingsController;
use App\Http\Controllers\systemadmin\RegionsController;
use App\Http\Controllers\systemadmin\RolesController;
use App\Http\Controllers\systemadmin\TownsVilagesController;
use App\Http\Controllers\systemadmin\TrainingProviderClassificationsController;
use App\Http\Controllers\systemadmin\TrainingProviderOwnershipsController;
use App\Http\Controllers\systemadmin\TrainingProviderStaffsRankController;
use App\Http\Controllers\systemadmin\TrainingProviderStaffsRoleController;
use App\Http\Controllers\systemadmin\UnitsController;
use App\Http\Controllers\systemadmin\UsersController;
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


require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function(){

    // sysadmin Routes
    Route::group(['prefix' => 'admin','as' => 'admin.','middleware'=> 'role:sysadmin'], function(){
        Route::redirect('/', '/admin/dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // institution settings
        // Route::get('configurations', DirectoratesController::class)->name('configurations');

        // Users
        Route::get('users/getunitsbydirectorate/{directorate}', [UsersController::class, 'getUnitsByDirectorate'])->name('users.getunitsbydirectorate');
        Route::resource('users', UsersController::class)->except('destroy');

        // Permissions
        Route::resource('permissions',PermissionsController::class)->except('destroy');

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
        Route::resource('entry-level-qualifications', EntryLevelQualificationsController::class)->except('show');

        // Training Provider classfications
        Route::resource('training-provider-classifications', TrainingProviderClassificationsController::class)->except('show');

        // Training Provider Ownerships
        Route::resource('training-provider-ownerships', TrainingProviderOwnershipsController::class)->except('show');

        // Application Fees Tariffs
        Route::resource('application-fees-tariffs', ApplicationFeeTarrifsController::class)->except('show');

        // Audit Logs index route
        Route::get('activities', [ActivitiesController::class,'index'])->name('activities.index');
        Route::get('show-activity/{id}', [ActivitiesController::class, 'show'])->name('activities.show');
        Route::POST('activities/filter', [ActivitiesController::class,'activityLogsFilter'])->name('activities.filter');

        // Backup system
        Route::get('backup',[BackupsController::class, 'index'])->name('backup');
        Route::get('backup/manual',[BackupsController::class, 'manualDatabaseBackup'])->name('backup.manual');

    });

   // Research and Development routes
   Route::group(['prefix'=>'researchdevelopment','as'=>'researchdevelopment.',
   'middleware'=>'role:research_and_development_manager|research_and_development_officer'
  ],function(){

    Route::redirect('/','researchdevelopment/dashboard');

    Route::get('/dashboard', ResearchdevelopmentDashboardController::class)->name('dashboard');

    // data collection routes
    Route::group(['prefix' => 'datacollection','as'=>'datacollection.'], function(){
        Route::resource('institution-details', InstitutionDetailsController::class)->except('destroy');
        Route::resource('program-details', ProgramOfferedController::class)->except('destroy');
        Route::resource('academicadminstaff-details', AcademicAdminStaffDetailsController::class)->except('destroy');
        Route::resource('student-details', StudentDetailsController::class)->except('destroy');
        Route::get('datacollection-imports', [DataCollectionsImportsController::class, 'index'])->name('datacollection-imports.index');
        Route::post('store-datacollection-import',[DataCollectionsImportsController::class, 'store'])->name('datacollection-imports.store');
    });

    Route::resource('research-survey-documentation', ResearchSurveyDocumentationController::class)->except('destroy');

  });

  // Standard and Curriculum Unit Route
  Route::group(['prefix'=>'standardscurriculum','as'=>'standardscurriculum.',
  'middleware'=>'role:standards_development_manager|standards_development_officer'
    ],function(){
      Route::redirect('/','standardscurriculum/dashboard');

      Route::get('/dashboard', StandardsCurriculumDashboardController::class)->name('dashboard');

      // unit standards
      Route::resource('unit-standards', UnitStandardsController::class)->except('destroy');
  });


      // Registration and Accreditation Routes
      Route::group(['prefix'=>'registration-accreditation','as'=>'registration-accreditation.',
      'middleware'=> ['role:registration_and_accreditation_manager|registration_and_accreditation_officer']
      ],function(){
  
        Route::redirect('/','registration-accreditation/dashboard');
  
        // Dashboard route
        Route::get('/dashboard', [\App\Http\Controllers\RegistrationAccreditation\DashboardController::class, 'index'])->name('dashboard');
  
      //   Registration Routes
        Route::group(['prefix' => 'registration', 'as' => 'registration.'], function(){
              // Instiution registration routes
              Route::resource('institutions', InstitutionRegistrationController::class);
  
              // Trainer  Registration Routes
              Route::Resource('trainers', TrainerRegistrationController::class);
  
              // AssessorVerifeir  Registration Routes
              Route::Resource('assessor-verifiers', TrainerRegistrationController::class);
        });
  
      //   Accreditation Routes
        Route::group(['prefix' => 'accreditation', 'as' => 'accreditation.'], function(){
          // Instiution registration routes
          Route::resource('institutions', InstitutionRegistrationController::class);
  
          // Trainer  Registration Routes
          Route::Resource('trainers', TrainerRegistrationController::class);
  
          // AssessorVerifeir  Registration Routes
          Route::Resource('assessor-verifiers', TrainerRegistrationController::class);
        });
  
      });
  

  // Assessment and certification routes
  Route::group(['prefix'=>'assessment-certification','as'=>'assessment-certification.',
  'middleware'=>'role:assessment_and_certification_manager,assessment_and_certification_officer'
 ],function(){

 });


    // Profiles Settings
    Route::get('settings', [ProfilesController::class, 'settings'])
    ->name('settings');

    Route::put('settings/updateprofile', [ProfilesController::class, 'updateProfile'])
      ->name('settings.updateprofile');

    Route::put('settings/changepassword', [ProfilesController::class, 'changePassword'])
      ->name('settings.changepassword');

});
