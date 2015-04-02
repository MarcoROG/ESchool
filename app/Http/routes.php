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
Route::get('/home','HomeController@authenticatedIndex');

Route::group(['prefix'=>'users', 'middleware'=>['acl']],function(){
    Route::group(['middleware'=>'auth'],function(){
        Route::get('/','UserController@getAll');//Does this make sense? everyone can view an user
        Route::post('/','UserController@register');//Does this make sense? the add page is blocked and has a csrf token
        Route::get('add',['uses'=>'UserController@getSubscriptionInterface','can'=>'create.users']);
        Route::get('unapproved',['uses'=>'UserController@getUnapproved','can'=>'approve.users']);
        Route::get('{hash}/profile',['uses'=>'UserController@getUser','can'=>'view.users']);
        Route::get('{hash}/edit',['uses'=>'UserController@getEditUser',/*'can'=>'edit.users'*/]);
        Route::patch('{hash}/edit','UserController@editUser');
        Route::patch('{hash}/approve/{value}','UserController@approveUser');
    });
    Route::patch('{hash}/verify','UserController@verifyUser');
});
