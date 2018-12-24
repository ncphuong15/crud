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
Route::group(['prefix' => 'cat'], function () {
	Route::get('list', 'Api\CategoryController@index');
	Route::post('create', 'Api\CategoryController@create');
	Route::post('update', 'Api\CategoryController@update');
	Route::post('delete', 'Api\CategoryController@destroy');
});

Route::group(['prefix' => 'news'], function () {
	Route::get('list', 'Api\NewsController@index');
	Route::post('create', 'Api\NewsController@create');
	Route::post('update', 'Api\NewsController@update');
	Route::post('delete', 'Api\NewsController@destroy');
});