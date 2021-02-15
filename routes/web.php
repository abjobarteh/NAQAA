<?php

use App\Http\Controllers\systemadmin\ActivitiesController;
use App\Http\Controllers\systemadmin\InstitutionCategoryController;
use App\Http\Controllers\systemadmin\InstitutionControllerSettings;
use App\Http\Controllers\systemadmin\InstitutionTypeController;
use App\Http\Controllers\systemadmin\PermissionsController;
use App\Http\Controllers\systemadmin\ProgramCategoryController;
use App\Http\Controllers\systemadmin\ProgramLevelController;
use App\Http\Controllers\systemadmin\RolesController;
use App\Http\Controllers\systemadmin\UsersController;
use App\Http\Livewire\Systemadmin\Activities;
use App\Http\Livewire\Systemadmin\AddDirectorate;
use App\Http\Livewire\Systemadmin\AddUser;
use App\Http\Livewire\Systemadmin\Departments;
use App\Http\Livewire\Systemadmin\Designations;
use App\Http\Livewire\Systemadmin\Directorates;
use App\Http\Livewire\Systemadmin\EditUser;
use App\Http\Livewire\Systemadmin\Index as sysadmindashboard;
use App\Http\Livewire\Systemadmin\Institutions;
use App\Http\Livewire\Systemadmin\Settings;
use App\Http\Livewire\Systemadmin\Subdivisions;
use App\Http\Livewire\Systemadmin\Units;
use App\Http\Livewire\Systemadmin\Users;
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
    
    // systemadmin
    Route::group(['prefix' => 'systemadmin','as' => 'systemadmin.','middleware'=> 'role:systemadmin'], function(){
        Route::redirect('/', '/systemadmin/');
        Route::get('/', sysadmindashboard::class)->name('index');
        // Route::get('users', Users::class)->name('users');
        // Route::get('add-user', AddUser::class)->name('add-user');
        // Route::get('edit-user/{id}', EditUser::class)->name('edit-user');
        Route::get('institutions', Institutions::class)->name('institutions');
        Route::get('directorates', Directorates::class)->name('directorates');
        Route::get('add-directorate', AddDirectorate::class)->name('add-directorate');
        Route::get('units', Units::class)->name('units');
        Route::get('designations', Designations::class)->name('designations');
        Route::get('subdivisions', Subdivisions::class)->name('subdivisions');

        // institution settings
        Route::get('institution-settings', InstitutionControllerSettings::class)->name('institution-settings');

        Route::resource('users', UsersController::class);

        // Permissions
        Route::resource('permissions',PermissionsController::class);

        // Roles
        Route::resource('roles', RolesController::class);

        // Audit Logs
        Route::resource('auditlogs', ActivitiesController::class);

        // Institution category
        Route::resource('institution-categories', InstitutionCategoryController::class);

        // Institution Type
        Route::resource('institution-types', InstitutionTypeController::class);

        // Program levels
        Route::resource('program-levels', ProgramLevelController::class);

        // Program Categories
        Route::resource('program-categories', ProgramCategoryController::class);

        Route::get('settings', Settings::class)->name('settings');
    });
});
