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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group([
    'prefix' => 'person'
], function ($router) {
    Route::get('/','PersonController@getAllPersons');
    Route::post('/','PersonController@create');
    Route::put('/{id}','PersonController@update');
    Route::delete('/{id}','PersonController@delete');
});

Route::group([
    'prefix' => 'country'
], function($router){
    Route::get('/','CountryController@getCountrys');
});

