<?php

use App\Http\Livewire\Systemadmin\Departments;
use App\Http\Livewire\Systemadmin\Districts;
use App\Http\Livewire\Systemadmin\Index as sysadmindashboard;
use App\Http\Livewire\Systemadmin\Institutions;
use App\Http\Livewire\Systemadmin\Regions;
use App\Http\Livewire\Systemadmin\Settings;
use App\Http\Livewire\Systemadmin\TownsVillages;
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
        Route::get('institutions', Institutions::class)->name('institutions');
        Route::get('departments', Departments::class)->name('departments');
        Route::get('regions', Regions::class)->name('regions');
        Route::get('districts', Districts::class)->name('districts');
        Route::get('towns-villages', TownsVillages::class)->name('towns-villages');
        Route::get('settings', Settings::class)->name('settings');
    });
});
