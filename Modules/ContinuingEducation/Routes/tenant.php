<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin/continuing-education',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/courses', 'CeCourseController@index')
        ->name('continuing-education.courses.index')
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
