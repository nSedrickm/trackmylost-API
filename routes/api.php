<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 **Basic Routes for a RESTful service:
 **Route::get($uri, $callback);
 **Route::post($uri, $callback);
 **Route::put($uri, $callback);
 **Route::delete($uri, $callback);
 **
 */

// user route is protected
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/admin/user', function (Request $request) {
    return $request->user();
});

// admin auth routes
Route::post('/admin/login', 'AdminController@login');
Route::post('/admin/register', 'AdminController@register');
Route::get('/admin/logout', 'AdminController@logout');

// user/agent auth routes
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/logout', 'UserController@logout');

// item routes
Route::get('items', 'ItemsController@index');
Route::get('items/{item}', 'ItemsController@show');
Route::post('items', 'ItemsController@store');
Route::put('items/{item}', 'ItemsController@update');
Route::delete('items/{item}', 'ItemsController@delete');

//alett routes
Route::get('alerts', 'AlertsController@index');
Route::get('alerts/{alert}', 'AlertsController@show');
Route::post('alerts', 'AlertsController@store');
Route::put('alerts/{alert}', 'AlertsController@update');
Route::delete('alerts/{alert}', 'AlertsController@delete');
