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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectsController@index');

Route::post('/projects', 'ProjectsController@store');

Route::post('/department', 'ProjectsController@saveDepartment');
Route::get('/register', 'ProjectsController@register');
Route::post('/register', 'ProjectsController@register');

Route::post('/timeline-data', 'ProjectsController@showTimeline');