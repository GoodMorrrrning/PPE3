<?php

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

use App\Http\Controllers\AdminHome;
use App\Mission;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/missionlist', 'HomeController@show')->name('show');
Route::get('/home/admin', 'AdminController@index')->name('homeAdmin');
Route::resource('prat', 'PratController');
Route::resource('user', 'UserController');
Route::resource('mission', 'MissionController');
Route::post('mission/{id}', 'MissionController@stored')->name('givemissions');
Route::get('/home/missionlist/{n}', 'MissionDetail@detail')->name('missiondetail');
Route::post('mission/declare/{n}', 'MissionDetail@DeclareFrais')->name('declare');
Route::get('mission/page/{n}', 'MissionDetail@edit')->name('pagedeclare');
Route::get('/home/admin/fraisUser{n}', 'AdminController@FraisUser')->name('fraisuser');
