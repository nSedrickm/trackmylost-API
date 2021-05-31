<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|Admin Routes
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

// Admin route is protected
Route::middleware('auth:admin')->get('/user', function (Request $request) {
    return $request->user();
});

// admin auth routes
Route::post('/login', 'AdminController@login');
Route::post('/register', 'AdminController@register');
Route::get('/logout', 'AdminController@logout');
