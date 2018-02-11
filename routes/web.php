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


Route::get('/', array(
    'as' => 'home',
    'uses' => 'AdminAuth\AuthController@showLoginForm'));

Route::get('/unsubscribe' ,function (){
    return view('admin.tempelates.unsubscribe');
})->name('email.unsubscribe');


Route::post('/unsubscribe/save', array(
    'as' => 'unsubscribe.save',
    'uses' => 'HomeController@unsubscribeSave'));


Route::get('/admin', 'AdminAuth\AuthController@showLoginForm');
Route::post('/admin', 'AdminAuth\AuthController@login');


Route::group(['middleware' => ['admin'] , 'prefix' => '/admin' ,'namespace' =>'Admin'], function () {

    Route::post('/dashboard', array(
        'as' => 'post.dashboard',
        'uses' => 'AdminController@dashboard'));


    Route::get('/dashboard', array(
        'as' => 'get.dashboard',
        'uses' => 'AdminController@dashboard'));


    Route::get('/dashboard/logout', array(
        'as' => 'logout',
        'uses' => 'AdminAuth\AuthController@logout'));


    ////////////////////////////////Customer Routes///////////////////////////////////
    Route::get('/customer', array(
        'as' => 'customer.index',
        'uses' => 'CustomerController@index'));

    Route::get('/customer/create', array(
        'as' => 'customer.create',
        'uses' => 'CustomerController@create'));

    Route::post('/customer-csv/upload', array(
        'as' => 'customer.csv.upload',
        'uses' => 'CustomerController@customersCsvUpload'));

    Route::post('/customer/add', array(
        'as' => 'customer.add',
        'uses' => 'CustomerController@store'));


    Route::get('/customer/{id}', array(
        'as' => 'customer.edit',
        'uses' => 'CustomerController@edit'));

    Route::post('/customer/{id}', array(
        'as' => 'customer.update',
        'uses' => 'CustomerController@update'));


    Route::get('/customer/delete/{id}', array(
        'as' => 'customer.delete',
        'uses' => 'CustomerController@destroy'));


    ////////////////////////////////Sent Emails Routes///////////////////////////////////
    Route::get('/sentemails', array(
        'as' => 'sentemail.index',
        'uses' => 'SentEmailController@index'));

    Route::get('/sentemails/show/{id}', array(
        'as' => 'sentemail.show',
        'uses' => 'SentEmailController@show'));

    Route::get('/sentemails/{id}', array(
        'as' => 'sentemail.delete',
        'uses' => 'SentEmailController@destroy'));


    ////////////////Send Emails Now////////////////////////
    Route::get('/send-new', array(
        'as' => 'sentemail.sendNew',
        'uses' => 'SentEmailController@create'));

    Route::post('/send-new/save', array(
        'as' => 'sentemail.sendNew.save',
        'uses' => 'SentEmailController@store'));



});


Route::post( '/sendemail' , [
    'as' => 'send.email',
    'uses' => 'HomeController@sendEmail'
]);

