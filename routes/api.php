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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 ** Basic Routes for a RESTful service:
 **
 ** Route::get($uri, $callback);
 ** Route::post($uri, $callback);
 ** Route::put($uri, $callback);
 ** Route::delete($uri, $callback);
 **
 **/

Route::get('products', function () {
    return response(['Product 1', 'Product 2', 'Product 3'], 200);
});

Route::get('products/{product}', function ($productId) {
    return response()->json(['productId' => "{$productId}"], 200);
});


Route::post('products', function () {
    return  response()->json([
        'message' => 'Create success'
    ], 201);
});

Route::put('products/{product}', function () {
    return  response()->json([
        'message' => 'Update success'
    ], 200);
});

Route::delete('products/{product}', function () {
    return  response()->json(null, 204);
});
