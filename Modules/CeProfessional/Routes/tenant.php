<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CE Professional public routes
|--------------------------------------------------------------------------
*/
Route::post('ce-register', 'CeRegistrationController@register')->name('ceRegister');

Route::middleware(['auth', 'ceProfessional'])->group(function () {
    Route::get('ce-portal', 'CeDashboardController@index')->name('cePortal');

    Route::get('ce-portal/profile', 'CeProfileController@show')->name('cePortal.profile');
    Route::post('ce-portal/profile', 'CeProfileController@update')->name('cePortal.profile.update');
    Route::post('ce-portal/profile/photo', 'CeProfileController@uploadPhoto')->name('cePortal.profile.photo');

    Route::get('ce-portal/account', 'CeAccountController@show')->name('cePortal.account');
    Route::post('ce-portal/account/password', 'CeAccountController@updatePassword')->name('cePortal.account.password');
});

/*
|--------------------------------------------------------------------------
| CE Professional admin routes (planned)
|--------------------------------------------------------------------------
|
| Uncomment when admin CRUD + views are implemented.
|
*/
// Route::group(['prefix' => 'frontend', 'as' => 'frontend.', 'middleware' => ['auth', 'admin']], function () {
//     Route::resource('/ce_professionals', 'CeProfessionalController')->except('show', 'update', 'destroy');
//     Route::post('/ce_professionals/update', 'CeProfessionalController@update')->name('ce_professionals.update');
//     Route::get('/ce_professionals/destroy/{id}', 'CeProfessionalController@destroy')->name('ce_professionals.destroy');
// });
