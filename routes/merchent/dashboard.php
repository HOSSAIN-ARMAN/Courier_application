<?php
use Illuminate\Support\Facades\Route;

Route::prefix('merchent')->group(function (){
    Route::get('/login', 'Auth\MerchentLoginController@showLoginForm')->name('merchent.login');
    Route::post('/login', 'Auth\MerchentLoginController@login')->name('merchent.login.submit');
    Route::get('/', 'Merchent\MerchentController@index')->name('merchent.dashboard');
    Route::post('/logout', 'Auth\MerchentLoginController@logout')->name('merchent.logout');
    Route::post('/', 'Auth\MerchentRegistrationController@register')->name('merchent.register');
});


?>
