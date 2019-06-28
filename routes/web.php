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
use \App\Events\EventTrigger;

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
Route::post('/excel', 'EnrollmentsController@excel_upload');
Route::resource('/lecturers', 'LecturersController');
Route::resource('/locations', 'LocationsController');
Route::resource('/rooms', 'RoomsController');
Route::resource('/schedules', 'SchedulesController');
Route::resource('/students', 'StudentsController');
Route::resource('/allocations', 'AllocationsController');
Route::resource('/file', 'FileController');
Route::resource('/test', 'TestController');
Route::resource('/announcements', 'AnnouncementController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cancel','ScheduleCancellationController@index');
Route::get('/cancel/{id}','ScheduleCancellationController@cancellationForm');
Route::put('/cancel/{id}','ScheduleCancellationController@cancelRequest');

Route::get('/approval','ScheduleCancellationController@approval_index');
Route::get('/approval/{id}','ScheduleCancellationController@approvalForm');
Route::put('/approval/{id}','ScheduleCancellationController@approvalRequest');


//data table routes
Route::get('/data/schedules', 'SchedulesController@data');
Route::get('/data/students', 'StudentsController@data');
Route::get('/data/enrollments', 'EnrollmentsController@data');
Route::get('/data/allocations', 'AllocationsController@data');
Route::get('/data/cancellation_requests', 'AllocationsController@cancellationRequests');

//test routes

Route::get('/alertbox',function (){
    return view('test.s1');
});

Route::get('/firstevent',function (){
    event(new EventTrigger());
});