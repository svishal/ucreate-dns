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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::resource('projects', 'ProjectController');
Route::get('/project-details/{id}', 'ProjectController@ProjectDetails');
Route::get('/add-projects-from-doc', 'ProjectController@addProjectsFromDocument');
Route::get('/search', 'ProjectController@search');
Route::get('/get-additional-domain-details/{url}', 'ProjectController@getAdditionDomainDetails');
Route::post('password/update', 'UserController@updatePassword');