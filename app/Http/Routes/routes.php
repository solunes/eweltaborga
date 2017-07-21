<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@showIndex');
Route::get('registrate', 'ProcessController@getRegistrate');
Route::get('iniciar-sesion', 'ProcessController@getLogin');

Route::group(['prefix'=>'process'], function(){
    Route::get('/change-locale/{lang}', 'ProcessController@getChangeLocale');
    Route::get('/logout', 'ProcessController@getLogout');
    Route::post('/login', 'ProcessController@postLogin');
    Route::post('/registrate', 'ProcessController@postRegistrate');
    Route::post('/project-support', 'ProcessController@postProjectSupport');
    Route::post('/project-comment', 'ProcessController@postProjectComment');
    Route::post('/model', 'ProcessController@postModel');
});
Route::group(['prefix'=>'custom-admin'], function(){
    Route::get('/', 'CustomAdminController@getIndex');
});

Route::get('proyecto/{slug}', array('as' => 'MainController', 'uses' => 'MainController@findProject'));

Route::get('{slug}/{extra_slug?}', array('as' => 'MainController', 'uses' => 'MainController@showPage'));