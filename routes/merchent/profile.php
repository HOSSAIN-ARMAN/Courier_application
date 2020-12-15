<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'merchent','middleware' => ['auth:merchent']], function() {
    Route::get('/profile', 'Merchent\ProfileController@index')->name('profile.index');
    Route::post('/profile/update', 'Merchent\ProfileController@update')->name('merchent.Info.update');
    Route::post('/profile/store', 'Merchent\ProfileController@store')->name('mobile.bank.info.store');
    Route::get('/profile/edit/{id?}', 'Merchent\ProfileController@edit')->name('mobile.bank.info.edit');
    Route::post('/profile/destroy', 'Merchent\ProfileController@destroy')->name('mobile.bank.info.destroy');
    Route::get('/profile/display', 'Merchent\ProfileController@display')->name('mobile.bank.info.display');
    Route::post('/profile/bankInfo/store', 'Merchent\ProfileBankInfoControlller@store')->name('bank.info.store');
    Route::get('/profile/bankInfo/show/{id?}', 'Merchent\ProfileBankInfoControlller@show')->name('bank.info.show');
    Route::post('/profile/bankInfo/destroy', 'Merchent\ProfileBankInfoControlller@destroy')->name('bank.info.destroy');
});


//Route::prefix('merchent')->group(function (){
//    Route::get('/profile', 'Merchent\ProfileController@index')->name('profile.index');
//    Route::post('/profile/update', 'Merchent\ProfileController@update')->name('merchent.Info.update');
//}); // if i use this need to create __construct() { $this->>middleware('auth:merchent')}

?>
