<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin/continuing-education',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/courses', 'CeCourseController@index')
        ->name('continuing-education.courses.index')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/courses/create', 'CeCourseController@create')
        ->name('continuing-education.courses.create')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::post('/courses/store', 'CeCourseController@store')
        ->name('continuing-education.courses.store')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/courses/edit/{id}', 'CeCourseController@edit')
        ->name('continuing-education.courses.edit')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::post('/courses/update/{id}', 'CeCourseController@update')
        ->name('continuing-education.courses.update')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/courses/delete/{id}', 'CeCourseController@destroy')
        ->name('continuing-education.courses.destroy')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/courses/status/{id}', 'CeCourseController@status')
        ->name('continuing-education.courses.status')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/courses/{id}/students', 'CeCourseController@enrolledStudents')
        ->name('continuing-education.courses.enrolled_students')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/courses/{id}/students/data', 'CeCourseController@enrolledStudentsData')
        ->name('continuing-education.courses.enrolled_students.data')
        ->middleware('RoutePermissionCheck:continuing-education.courses.index');

    Route::get('/students', 'CeStudentsController@index')
        ->name('continuing-education.students.index')
        ->middleware('RoutePermissionCheck:continuing-education.students.index');

    Route::get('/students/data', 'CeStudentsController@getAllStudentData')
        ->name('continuing-education.students.data')
        ->middleware('RoutePermissionCheck:continuing-education.students.index');

    Route::get('/students/{id}', 'CeStudentsController@show')
        ->name('continuing-education.students.show')
        ->middleware('RoutePermissionCheck:continuing-education.students.index');

    Route::get('/licenses', 'CeLicenseController@index')
        ->name('continuing-education.licenses.index')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::get('/licenses/create', 'CeLicenseController@create')
        ->name('continuing-education.licenses.create')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::post('/licenses/store', 'CeLicenseController@store')
        ->name('continuing-education.licenses.store')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::get('/licenses/edit/{id}', 'CeLicenseController@edit')
        ->name('continuing-education.licenses.edit')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::post('/licenses/update/{id}', 'CeLicenseController@update')
        ->name('continuing-education.licenses.update')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::get('/licenses/delete/{id}', 'CeLicenseController@destroy')
        ->name('continuing-education.licenses.destroy')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::get('/licenses/status/{id}', 'CeLicenseController@status')
        ->name('continuing-education.licenses.status')
        ->middleware('RoutePermissionCheck:continuing-education.licenses.index');

    Route::get('/bundles', 'CeBundleController@index')
        ->name('continuing-education.bundles.index')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::get('/bundles/mandatory-courses', 'CeBundleController@mandatoryCourses')
        ->name('continuing-education.bundles.mandatory-courses')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::get('/bundles/create', 'CeBundleController@create')
        ->name('continuing-education.bundles.create')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::post('/bundles/store', 'CeBundleController@store')
        ->name('continuing-education.bundles.store')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::get('/bundles/edit/{id}', 'CeBundleController@edit')
        ->name('continuing-education.bundles.edit')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::post('/bundles/update/{id}', 'CeBundleController@update')
        ->name('continuing-education.bundles.update')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::get('/bundles/delete/{id}', 'CeBundleController@destroy')
        ->name('continuing-education.bundles.destroy')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');

    Route::get('/bundles/status/{id}', 'CeBundleController@status')
        ->name('continuing-education.bundles.status')
        ->middleware('RoutePermissionCheck:continuing-education.bundles.index');
});
