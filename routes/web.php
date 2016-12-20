<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('project/{id}', 'ProjectController@project');


Auth::routes();

Route::get('/new_project', function () {
    return view('new_project');
});

Route::post('/createproject', [
	'uses' => 'ProjectController@projectCreateProject',
	'as' => 'project.create'
	]);

Route::get('/home', 'HomeController@index');
