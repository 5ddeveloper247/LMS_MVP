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
