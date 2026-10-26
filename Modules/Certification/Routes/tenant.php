<?php

use Illuminate\Support\Facades\Route;

Route::get('/certifications', 'CertificationFrontendController@index')
    ->name('certifications.index');

Route::post('/certifications/enroll/checkout', 'CertificationCartController@checkout')
    ->name('certifications.enroll.checkout')
    ->middleware('auth');

Route::get('/certifications/enroll/{slug}', 'CertificationFrontendController@enroll')
    ->name('certifications.enroll')
    ->where('slug', '[A-Za-z0-9\-]+');

Route::get('/certifications/{slug}', 'CertificationFrontendController@show')
    ->name('certifications.show')
    ->where('slug', '[A-Za-z0-9\-]+');

Route::group([
    'prefix' => 'admin/life-support-certifications',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/offerings', 'CertificationOfferingController@index')
        ->name('certificationOfferings.index')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');

    Route::get('/offerings/create', 'CertificationOfferingController@create')
        ->name('certificationOfferings.create')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');

    Route::post('/offerings/store', 'CertificationOfferingController@store')
        ->name('certificationOfferings.store')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');

    Route::get('/offerings/edit/{id}', 'CertificationOfferingController@edit')
        ->name('certificationOfferings.edit')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');

    Route::post('/offerings/update/{id}', 'CertificationOfferingController@update')
        ->name('certificationOfferings.update')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');

    Route::get('/offerings/delete/{id}', 'CertificationOfferingController@destroy')
        ->name('certificationOfferings.destroy')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');

    Route::get('/offerings/status/{id}', 'CertificationOfferingController@status')
        ->name('certificationOfferings.status')
        ->middleware('RoutePermissionCheck:certificationOfferings.index');
});
