<?php

use App\Http\Livewire\Systemadmin\Index as sysadmindashboard;
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
    });
});
