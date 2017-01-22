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

//Static Routes - Unprotected/Authorized 
Route::get('/', function () { 
    return view('welcome');
});
Route::get('/about', function () { 
    return view('about');
});
Route::get('/contact', function () { 
    return view('contact');
});


Route::get('project/{id}', 'ProjectController@project'); //Route for individual project
Route::get('project_library', 'ProjectController@projects'); //Route for project library
Route::get('project_admin/{id}', 'ProjectController@admin'); //Route for project admin page
Route::post('/promote', 'ProjectController@promote');
Route::post('/demote', 'ProjectController@demote');
Route::post('/remove', 'ProjectController@removeMember');
Route::post('/acceptMember', 'ProjectController@acceptMember');
Route::post('/declineMember', 'ProjectController@declineMember');
Route::post('/pushRequest', 'ProjectController@pushRequest');
Route::post('/deleteProject', 'ProjectController@deleteProject');

Route::get('user/{id}', 'UserController@user')->middleware('auth');
Route::post('user', 'UserController@update_avatar');
Route::get('members/{id}', 'User_ProjectsController@project_members')->middleware('auth'); //Route for project members

Route::get('/news_post/{id}', 'PostController@post'); //For the specific post page.
Route::get('/editPost', 'PostController@getPostForEdit');
Route::post('/newComment', 'CommentController@createComment'); //For the specific post page.
Route::post('/deleteComment', 'CommentController@deleteComment');
Route::post('/createPost', 'PostController@createPost');
Route::post('/updatePost', 'PostController@updatePost');
Route::post('/deletePost', 'PostController@deletePost');

Auth::routes();

Route::get('/new_project', function () { //view for creating new project
    return view('new_project');
})->middleware('auth'); 

Route::post('/createproject', [ //new project creation
	'uses' => 'ProjectController@projectCreateProject',
	'as' => 'project.create'
	]);

Route::get('/home', 'HomeController@index'); //Home route

Route::get('/admin', 'AdminController@getAdmin')->middleware('admin');
Route::post('/deleteUser', 'UserController@deleteUser')->middleware('admin');