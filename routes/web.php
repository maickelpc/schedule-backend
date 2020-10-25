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
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', 'App\Http\Controllers\UserController@index');
Route::get('user/{id}', 'App\Http\Controllers\UserController@show');

Route::get('user/{id}/schedule', 'App\Http\Controllers\ScheduleController@scheduleByUser');
Route::get('schedule', 'App\Http\Controllers\ScheduleController@index');
Route::get('schedule/{id}', 'App\Http\Controllers\ScheduleController@show');
