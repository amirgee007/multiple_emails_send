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


Route::group(['middleware' => ['admin']], function () {
    Route::post('/admin/dashboard', 'Admin\AdminController@dashboard');
    Route::get('/admin/dashboard', 'Admin\AdminController@dashboard');

    Route::get('/admin/dashboard/logout', array(
        'as' => 'logout',
        'uses' => 'AdminAuth\AuthController@logout'));

});


Route::post( '/sendemail' , [
    'as' => 'send.email',
    'uses' => 'HomeController@sendEmail'
]);



Route::get('/create' , function (){

    App\User::create([
        'name' =>'amir',
        'email' =>'amirgee007@yahoo.com',
        'password' => bcrypt('123456'),
        'is_admin' => '1',
    ]);
});