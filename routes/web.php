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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'VisitorController@create')->name('visitors.create');


Auth::routes();
// Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/units', 'UnitController@index')->name('units');
Route::get('/units/create', 'UnitController@create')->name('units.create');
Route::post('/units', 'UnitController@store')->name('units.store');
Route::get('/units/{id}', 'UnitController@show');
Route::put('/units/{id}', 'UnitController@update');
Route::delete('/units/{id}', 'UnitController@destroy');
Route::post('/units/search/', 'UnitController@search')->name('units.search');
Route::get('/units/current/{id}', 'UnitController@current');

Route::get('/visitors', 'VisitorController@index')->name('visitors')->middleware('auth');
Route::get('/visitors/create', 'VisitorController@create')->name('visitors.create');
Route::post('/visitors', 'VisitorController@store')->name('visitors.store');
Route::get('/visitors/{id}', 'VisitorController@show')->middleware('auth');
Route::put('/visitors/{id}', 'VisitorController@update')->middleware('auth');
Route::patch('/visitors/exit/{id}', 'VisitorController@exit')->middleware('auth');
Route::delete('/visitors/{id}', 'VisitorController@destroy')->middleware('auth');
Route::get('/visitors/detail/{name}&{nric}', 'VisitorController@detail');




