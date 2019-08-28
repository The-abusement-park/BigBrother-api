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

Route::namespace('Api')->name('api.')->group(function () {
    Route::apiResource('users', 'UserController');
    Route::apiResource('locations', 'LocationController');
    Route::apiResource('requests', 'RequestController');
    Route::apiResource('items', 'ItemController');
    Route::apiResource('projects', 'ProjectController');
});
