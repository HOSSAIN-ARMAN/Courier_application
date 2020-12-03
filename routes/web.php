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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


Route::prefix('merchent')->group(function (){
    Route::get('/login', 'Auth\MerchentLoginController@showLoginForm')->name('merchent.login');
    Route::post('/login', 'Auth\MerchentLoginController@login')->name('merchent.login.submit');
    Route::get('/', 'Merchent\MerchentController@index')->name('merchent.dashboard');
    Route::post('/logout', 'Auth\MerchentLoginController@logout')->name('merchent.logout');
    Route::post('/', 'Auth\MerchentRegistrationController@register')->name('merchent.register');
});


