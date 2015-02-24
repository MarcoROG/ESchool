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


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/','HomeController@index');

Route::group(['prefix'=>'users'],function(){
    Route::get('/','UserController@showAll');
    Route::post('/','UserController@register');
    Route::get('/add',['middleware'=>'secretaryOnly', //TODO Riattivare il controllo nel middleware
        'uses'=>'UserController@showSubscriptionInterface']);
    Route::get('/{id}','UserController@showUser');
});
