<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminAuth\AuthController@showLoginForm');
Route::post('/admin', 'AdminAuth\AuthController@login');


Route::group(['middleware' => ['admin'] , 'prefix' => '/admin' ], function () {

    Route::post('/dashboard', array(
        'as' => 'post.dashboard',
        'uses' => 'Admin\AdminController@dashboard'));


    Route::get('/dashboard', array(
        'as' => 'get.dashboard',
        'uses' => 'Admin\AdminController@dashboard'));


    Route::get('/dashboard/logout', array(
        'as' => 'logout',
        'uses' => 'AdminAuth\AuthController@logout'));


    ////////////////////////////////Category Routes///////////////////////////////////
    Route::get('/category', array(
        'as' => 'category.index',
        'uses' => 'Admin\CategoryController@index'));

      Route::post('/category/add', array(
          'as' => 'category.add',
          'uses' => 'Admin\CategoryController@store'));


    ////////////////////////////////Emails Routes///////////////////////////////////
    Route::get('/emails', array(
        'as' => 'email.index',
        'uses' => 'Admin\EmailController@index'));

    Route::post('/emails/add', array(
        'as' => 'email.add',
        'uses' => 'Admin\EmailController@store'));

    ////////////////////////////////Sent Emails Routes///////////////////////////////////
    Route::get('/sentemails', array(
        'as' => 'sentemail.index',
        'uses' => 'Admin\SentEmailController@index'));

    Route::get('/sendNew', array(
        'as' => 'sentemail.sendNew',
        'uses' => 'Admin\SentEmailController@create'));



});


Route::post( '/sendemail' , [
    'as' => 'send.email',
    'uses' => 'HomeController@sendEmail'
]);

