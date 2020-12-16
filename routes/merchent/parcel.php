<?php
use Illuminate\Support\Facades\Route;

Route::prefix('merchent')->group(function (){
    Route::get('/parcel', 'Merchent\ParcelController@index')->name('parcel.index');
    Route::post('/parcel/store', 'Merchent\ParcelController@store')->name('merchent.parcel.store');
    Route::get('/parcel/details', 'Merchent\ParcelController@details')->name('parcel.details');
    Route::get('/show/parcel/details', 'Merchent\ParcelController@display')->name('show.parcel.details');
    Route::get('/show/delivery/name/{id?}', 'Merchent\ParcelController@getDeliveryTypeName')->name('get.delivery.type.name');

});

?>
