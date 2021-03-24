<?php

use App\Http\Controllers\Auth\ProfilesController;
use App\Http\Controllers\RegistrationAccreditation\InstitutionRegistrationController;
use App\Http\Controllers\RegistrationAccreditation\TrainerRegistrationController;
use App\Http\Controllers\systemadmin\ActivitiesController;
use App\Http\Controllers\systemadmin\BackupsController;
use App\Http\Controllers\systemadmin\ComplianceLevelController;
use App\Http\Controllers\systemadmin\DashboardController;
use App\Http\Controllers\systemadmin\DesignationsController;
use App\Http\Controllers\systemadmin\DirectoratesController;
use App\Http\Controllers\systemadmin\DistrictsController;
use App\Http\Controllers\systemadmin\InstitutionCategoryController;
use App\Http\Controllers\systemadmin\InstitutionControllerSettings;
use App\Http\Controllers\systemadmin\InstitutionTypeController;
use App\Http\Controllers\systemadmin\LocalGovermentAreasController;
use App\Http\Controllers\systemadmin\PermissionsController;
use App\Http\Controllers\systemadmin\ProgramCategoryController;
use App\Http\Controllers\systemadmin\ProgramLevelController;
use App\Http\Controllers\systemadmin\RegionsController;
use App\Http\Controllers\systemadmin\RolesController;
use App\Http\Controllers\systemadmin\StandardsController;
use App\Http\Controllers\systemadmin\SubdivisionsController;
use App\Http\Controllers\systemadmin\TownsVilagesController;
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

  // Profiles Settings
    Route::get('settings', [ProfilesController::class, 'settings'])
            ->name('settings');

    Route::put('settings/updateprofile', [ProfilesController::class, 'updateProfile'])
            ->name('settings.updateprofile');

    Route::put('settings/changepassword', [ProfilesController::class, 'changePassword'])
            ->name('settings.changepassword');

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

        // Institution Standards routes
        Route::resource('standards', StandardsController::class);

        // Compliance Level routes
        Route::resource('compliance-levels', ComplianceLevelController::class);

        // Audit Logs index route
        Route::get('activities', [ActivitiesController::class,'index'])->name('activities.index');
        Route::POST('activities/filter', [ActivitiesController::class,'activityLogsFilter'])->name('activities.filter');

        // Backup system
        Route::get('backup',[BackupsController::class, 'index'])->name('backup');
        Route::get('backup/manual',[BackupsController::class, 'manualDatabaseBackup'])->name('backup.manual');

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

});
