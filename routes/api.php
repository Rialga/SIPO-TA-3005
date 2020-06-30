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


//Route::prefix ('auth')->group (function () {
//    Route::post('register', 'AuthController@register');
//    Route::post('login', 'AuthController@login');
//});
//
//Route::group(['middleware' => ['auth.jwt']], function(){
//
//    Route::prefix ('auth')->group (function () {
//        Route::get('refresh', 'AuthController@refresh');
//        Route::get('profile', 'AuthController@profile');
//        Route::get('logout', 'AuthController@logout');
//    });
//
//});


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('book', 'UserController@book');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout', 'AuthController@logout');
    Route::get('bookall', 'UserController@bookAuth');
    Route::get('user', 'AuthController@getAuthenticatedUser');
});
