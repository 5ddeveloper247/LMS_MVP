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

    Route::get('/students', 'CeStudentsController@index')
        ->name('continuing-education.students.index')
        ->middleware('RoutePermissionCheck:continuing-education.students.index');

    Route::get('/students/data', 'CeStudentsController@getAllStudentData')
        ->name('continuing-education.students.data')
        ->middleware('RoutePermissionCheck:continuing-education.students.index');

    Route::get('/students/{id}', 'CeStudentsController@show')
        ->name('continuing-education.students.show')
        ->middleware('RoutePermissionCheck:continuing-education.students.index');
});
