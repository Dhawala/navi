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
    //return "hello World";
    return view('welcome');
});

Route::get('/index','PagesController@index');

Route::resource('/posts', 'postsController');
Route::resource('/activities', 'ActivitiesController');
Route::resource('/buildings', 'BuildingsController');
Route::resource('/courses', 'CoursesController');
Route::resource('/enrollments', 'EnrollmentsController');
Route::resource('/lecturers', 'LecturersController');
Route::resource('/locations', 'LocationsController');
Route::resource('/rooms', 'RoomsController');
Route::resource('/schedules', 'SchedulesController');
Route::resource('/students', 'StudentsController');
Route::resource('/allocations', 'AllocationsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cancel','ScheduleCancellationController@cancellationForm');
