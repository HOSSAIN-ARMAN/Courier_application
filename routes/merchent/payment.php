<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'merchent','middleware' => ['auth:merchent']], function(){
    route::get('/payment', 'Merchent\PaymentController@index')->name('merchant.payment.index');
});
?>
