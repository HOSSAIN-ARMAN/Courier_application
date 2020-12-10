<?php
use Illuminate\Support\Facades\Route;

Route::prefix('merchent')->group(function (){
    Route::get('/profile', 'Merchent\ProfileController@index')->name('profile.index');
    Route::post('/profile/update', 'Merchent\ProfileController@update')->name('merchent.Info.update');
});

?>
