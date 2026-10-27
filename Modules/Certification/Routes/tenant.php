<?php

use Illuminate\Support\Facades\Route;

Route::get('/certifications', 'CertificationFrontendController@index')
    ->name('certifications.index');

Route::post('/certifications/enroll/checkout', 'CertificationCartController@checkout')
    ->name('certifications.enroll.checkout')
    ->middleware(['auth', 'student']);

Route::get('/certifications/enroll/{slug}', 'CertificationFrontendController@enroll')
    ->name('certifications.enroll')
    ->where('slug', '[A-Za-z0-9\-]+')
    ->middleware(['auth', 'student']);

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

    Route::get('/training-schedule', 'CertificationTrainingScheduleController@index')
        ->name('certificationTrainingSchedules.index')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::get('/enrolled-students', 'CertificationEnrollmentController@index')
        ->name('certificationEnrollments.index')
        ->middleware('RoutePermissionCheck:certificationEnrollments.index');

    Route::get('/enrolled-students/offering/{offeringId}', 'CertificationEnrollmentController@offering')
        ->name('certificationEnrollments.offering')
        ->middleware('RoutePermissionCheck:certificationEnrollments.index');

    Route::get('/enrolled-students/offering/{offeringId}/data', 'CertificationEnrollmentController@offeringData')
        ->name('certificationEnrollments.offering.data')
        ->middleware('RoutePermissionCheck:certificationEnrollments.index');

    Route::get('/enrolled-students/record/{id}', 'CertificationEnrollmentController@show')
        ->name('certificationEnrollments.show')
        ->middleware('RoutePermissionCheck:certificationEnrollments.index');

    Route::get('/offerings/{offeringId}/sessions', 'CertificationOfferingSessionController@index')
        ->name('certificationOfferingSessions.index')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::get('/offerings/{offeringId}/sessions/create', 'CertificationOfferingSessionController@create')
        ->name('certificationOfferingSessions.create')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::post('/offerings/{offeringId}/sessions/store', 'CertificationOfferingSessionController@store')
        ->name('certificationOfferingSessions.store')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::get('/offerings/{offeringId}/sessions/edit/{sessionId}', 'CertificationOfferingSessionController@edit')
        ->name('certificationOfferingSessions.edit')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::post('/offerings/{offeringId}/sessions/update/{sessionId}', 'CertificationOfferingSessionController@update')
        ->name('certificationOfferingSessions.update')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::get('/offerings/{offeringId}/sessions/delete/{sessionId}', 'CertificationOfferingSessionController@destroy')
        ->name('certificationOfferingSessions.destroy')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');

    Route::get('/offerings/{offeringId}/sessions/status/{sessionId}', 'CertificationOfferingSessionController@status')
        ->name('certificationOfferingSessions.status')
        ->middleware('RoutePermissionCheck:certificationTrainingSchedules.index');
});
