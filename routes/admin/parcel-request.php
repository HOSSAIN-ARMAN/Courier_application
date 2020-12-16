<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/parcel-request', 'Admin\ParcelRequestController@index')->name('parcel.request.index');
});

?>
