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
        Route::get('/','UserController@getAll');
        Route::post('/','UserController@create');
        Route::get('add',['uses'=>'UserController@getSubscriptionInterface','can'=>'create.users']);
        Route::get('unapproved',['uses'=>'UserController@getUnapproved','can'=>'approve.users']);
        Route::get('{hash}/profile',['uses'=>'UserController@getProfile','can'=>'view.specific.users']);
        Route::get('{hash}/edit',['uses'=>'UserController@getEdit',/*'can'=>'edit.users'*/]);
        Route::patch('{hash}/edit','UserController@edit');
        Route::patch('{hash}/approve/{value}','UserController@approve');
    });
    Route::patch('{hash}/verify','UserController@verify');
});

Route::group(['prefix'=>'schoolyears','middleware'=>['auth','acl']],function(){
    Route::get('/',['uses'=>'SchoolYearsController@getAll','can'=>'view.schoolyears']);
    Route::get('current',['uses'=>'SchoolYearsController@getCurrent','can'=>'view.schoolyears']);
    Route::post('/',['uses'=>'SchoolYearsController@create']);
    Route::get('add',['uses'=>'SchoolYearsController@getInsertionInterface','can'=>'create.schoolyears']);
    Route::get('{hash}',['uses'=>'SchoolYearsController@get','can'=>'view.specific.schoolyears']);
    Route::get('{hash}/edit',['uses'=>'SchoolYearsController@getEdit','can'=>'edit.schoolyears']);
    Route::patch('{hash}/edit',['uses'=>'SchoolYearsController@edit']);
});