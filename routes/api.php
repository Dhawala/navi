<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/buildings','api\BuildingsApiController@index');
Route::get('/buildings/{id}','api\BuildingsApiController@show');
Route::post('/buildings','api\BuildingsApiController@store');
Route::put('/buildings','api\BuildingsApiController@store');
Route::delete('/buildings','api\BuildingsApiController@destroy');
