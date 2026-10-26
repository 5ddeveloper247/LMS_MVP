<?php

use Illuminate\Support\Facades\Route;

if (isModuleActive('LmsSaas') || isModuleActive('LmsSaasMD')) {
    Route::group(['middleware' => ['subdomain']], function () {
        require 'tenant.php';
    });
} else {
    require 'tenant.php';
}
