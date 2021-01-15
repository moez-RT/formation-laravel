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
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

//route for controller with resource
//Route::resource('comments', 'CommentController');



   /* Route::post('create' ,'ArticleController@store');
    Route::get('articles', 'ArticleController@articles');
    Route::get('all', 'ArticleController@getAll');
    Route::get('details/{id}', 'ArticleController@details');
    Route::put('update/{id}', 'ArticleController@update');
    Route::delete('delete/{id}', 'ArticleController@delete'); */
    
Route::group(['middleware' => 'auth.jwt'], function () { 

    Route::post('create' ,'ArticleController@store');
    Route::get('articles', 'ArticleController@articles');
    Route::get('all', 'ArticleController@getAll');
    Route::get('details/{id}', 'ArticleController@details');
    Route::put('update/{id}', 'ArticleController@update');
    Route::delete('delete/{id}', 'ArticleController@delete');
});
