<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('hq', function () {
    return view('hq/welcome');
});

// Authentication routes
Route::get('hq/login', 'Auth\AuthController@showLoginForm');
Route::post('hq/login', 'Auth\AuthController@login');
Route::get('hq/logout', 'Auth\AuthController@logout');

// Registration routes
Route::get('hq/register', 'Auth\AuthController@showRegistrationForm');
Route::post('hq/register', 'Auth\AuthController@register');

// Password Reset routes
Route::get('hq/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('hq/password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('hq/password/reset', 'Auth\PasswordController@reset');

// Hq routes
Route::get('hq/home', 'Hq\HomeController@index');

Route::get('hq/project/{project}/bulk', 'Hq\ProjectsController@bulkPhotosView');
Route::post('hq/project/{project}/bulk', 'Hq\ProjectsController@bulkPhotosUpload');
Route::post('hq/project/change_status/{project}', 'Hq\ProjectsController@changeStatus');
Route::post('hq/project/change_frontman/{project}', 'Hq\ProjectsController@changeFrontman');
Route::resource('hq/project', 'Hq\ProjectsController');

Route::delete('hq/bulk/{photo}', 'Hq\PhotosController@destroy');

// Front routes
Route::get('/', 'Front\IndexController@index');
Route::get('/about', 'Front\AboutController@index');
Route::get('/projects', 'Front\ProjectsController@allProjects');
Route::get('/project/{project}', 'Front\ProjectsController@selectedProject');
Route::get('/contacts', 'Front\ContactsController@index');
Route::post('/contacts', 'Front\ContactsController@contactMe');
