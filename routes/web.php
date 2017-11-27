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

Route::get('/', function () use ($router) {
    return $router->app->version();
});

Route::get('/hello', function () {
    return 'hello';
});

Route::post('/cafe/create', 'CafeController@createCafe');
Route::get('/cafe/update/{id}', 'CafeController@updateCafe');
Route::get('/cafe/delete/{id}', 'CafeController@deleteCafe');
Route::get('/cafe/', 'CafeController@index');