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

Route::get('/', function () { //Welcome route
    return view('welcome');
});


Route::get('project/{id}', 'ProjectController@project'); //Route for individual project
Route::get('project_library', 'ProjectController@projects'); //Route for project library

Route::get('user/{id}', 'UserController@user'); //Route for individual project
Route::get('members/{id}', 'User_ProjectsController@project_members'); //Route for project members

Route::get('/news_post/{id}', 'PostController@post'); //For the specific post page.

Auth::routes();

Route::get('/new_project', function () { //view for creating new project
    return view('new_project');
});

Route::post('/createproject', [ //new project creation
	'uses' => 'ProjectController@projectCreateProject',
	'as' => 'project.create'
	]);

Route::get('/home', 'HomeController@index'); //Home route
