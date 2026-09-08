<?php

if (!function_exists('app_url')) {
    function app_url()
    {
        return rtrim(config('app.url', env('APP_URL', 'http://127.0.0.1:8000')), '/');
    }
}

if (!function_exists('active_progress_bar')) {
    function active_progress_bar($routes)
    {
        return request()->routeIs($routes) ? 'active' : '';
    }
}

if (!function_exists('active_link')) {
    function active_link($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

if (!function_exists('envu')) {
    function envu($key, $default = null)
    {
        return env($key, $default);
    }
}
