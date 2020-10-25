<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', 'App\Http\Controllers\UserController@index');
Route::get('user/{id}', 'App\Http\Controllers\UserController@show');

Route::get('user/{id}/schedule', 'App\Http\Controllers\ScheduleController@scheduleByUser');
Route::get('schedule', 'App\Http\Controllers\ScheduleController@index');
Route::get('schedule/{id}', 'App\Http\Controllers\ScheduleController@show');
