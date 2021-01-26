<?php

use App\Http\Livewire\Systemadmin\Activities;
use App\Http\Livewire\Systemadmin\AddDepartment;
use App\Http\Livewire\Systemadmin\AddUser;
use App\Http\Livewire\Systemadmin\Departments;
use App\Http\Livewire\Systemadmin\EditUser;
use App\Http\Livewire\Systemadmin\Index as sysadmindashboard;
use App\Http\Livewire\Systemadmin\Institutions;
use App\Http\Livewire\Systemadmin\RolesPermissions;
use App\Http\Livewire\Systemadmin\Settings;
use App\Http\Livewire\Systemadmin\Subdivisions;
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


require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'systemadmin','as' => 'systemadmin.','middleware'=> 'role:systemadmin'], function(){
        Route::get('/', sysadmindashboard::class)->name('index');
        Route::get('users', Users::class)->name('users');
        Route::get('add-user', AddUser::class)->name('add-user');
        Route::get('edit-user/{id}', EditUser::class)->name('edit-user');
        Route::get('institutions', Institutions::class)->name('institutions');
        Route::get('departments', Departments::class)->name('departments');
        Route::get('add-department', AddDepartment::class)->name('add-department');
        Route::get('subdivisions', Subdivisions::class)->name('subdivisions');
        Route::get('roles-permissions', RolesPermissions::class)->name('roles-permissions');
        Route::get('activities', Activities::class)->name('activities');
        Route::get('settings', Settings::class)->name('settings');
    });
});
