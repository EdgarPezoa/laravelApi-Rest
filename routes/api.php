<?php

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

Route::prefix('auth')->group(function () {
    Route::name('auth_')->group(function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
});

Route::namespace('api')->group(function () {
    Route::prefix('prueba')->group(function () {
        Route::name('prueba_')->group(function () {
            Route::post('/crear-usuario', 'PruebaController@crearUsuario')->name('crearUsuario');
            Route::post('/usuarios', 'PruebaController@index')->name('usuarios');
            Route::post('/data', 'PruebaController@data')->name('data');
            
        });
    });

});