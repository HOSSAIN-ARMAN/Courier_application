<?php
use Illuminate\Support\Facades\Route;

Route::prefix('merchent')->group(function (){
    Route::get('/parcel', 'Merchent\ParcelController@index')->name('parcel.index');
    Route::post('/parcel/store', 'Merchent\ParcelController@store')->name('merchent.parcel.store');
});

?>
