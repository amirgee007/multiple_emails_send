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

Route::get('/admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


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


    Route::get('/category/{id}', array(
        'as' => 'category.edit',
        'uses' => 'Admin\CategoryController@edit'));

    Route::post('/category/{id}', array(
        'as' => 'category.update',
        'uses' => 'Admin\CategoryController@update'));


    Route::get('/category/delete/{id}', array(
        'as' => 'category.delete',
        'uses' => 'Admin\CategoryController@destroy'));




    ////////////////////////////////Emails Routes///////////////////////////////////
    Route::get('/emails', array(
        'as' => 'email.index',
        'uses' => 'Admin\EmailController@index'));


    Route::post('/emails/add', array(
        'as' => 'email.add',
        'uses' => 'Admin\EmailController@store'));


    Route::get('/emails/{id}', array(
        'as' => 'email.edit',
        'uses' => 'Admin\EmailController@edit'));

    Route::post('/emails/{id}', array(
        'as' => 'email.update',
        'uses' => 'Admin\EmailController@update'));



    Route::get('/emails/delete/{id}', array(
        'as' => 'email.delete',
        'uses' => 'Admin\EmailController@destroy'));







    ////////////////////////////////Sent Emails Routes///////////////////////////////////
    Route::get('/sentemails', array(
        'as' => 'sentemail.index',
        'uses' => 'Admin\SentEmailController@index'));

    Route::get('/sentemails/show/{id}', array(
        'as' => 'sentemail.show',
        'uses' => 'Admin\SentEmailController@show'));

    Route::get('/sentemails/{id}', array(
        'as' => 'sentemail.delete',
        'uses' => 'Admin\SentEmailController@destroy'));


    Route::get('/sendNew', array(
        'as' => 'sentemail.sendNew',
        'uses' => 'Admin\SentEmailController@create'));

    Route::post('/sendNew/save', array(
        'as' => 'sentemail.sendNew.save',
        'uses' => 'Admin\SentEmailController@store'));




});


Route::post( '/sendemail' , [
    'as' => 'send.email',
    'uses' => 'HomeController@sendEmail'
]);

