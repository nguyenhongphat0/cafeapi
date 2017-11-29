<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () use ($router) {
    return $router->app->version();
});

Route::get('/hello', function () {
    return 'hello';
});

Route::group(['prefix' => '/api/user'], function () {
    Route::get('/', 'UserController@index');
    Route::get('/login', 'UserController@login');
    Route::get('/logout', 'UserController@logout');
});

Route::group(['prefix' => '/api/cafe'], function () {
    Route::get('/', 'CafeController@index');
    Route::get('/create', 'CafeController@createCafe');
    Route::put('/update/{id}', 'CafeController@updateCafe');
    Route::delete('/delete/{id}', 'CafeController@deleteCafe');
});