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
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('projects', 'ProjectController');
Route::get('/project-details/{id}', 'ProjectController@ProjectDetails');
Route::get('/add-projects-from-doc', 'ProjectController@addProjectsFromDocument');
Route::get('/search', 'ProjectController@search');