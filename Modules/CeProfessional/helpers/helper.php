<?php

if (! function_exists('ceAuthDashboardUrl')) {
    function ceAuthDashboardUrl(): string
    {
        if (! auth()->check()) {
            return url('/');
        }

        $user = auth()->user();

        if ((int) $user->role_id === 3) {
            return route('studentDashboard');
        }

        if (
            isModuleActive('CeProfessional')
            && (int) $user->role_id === (int) config('ceprofessional.role_id', 10)
            && routeIsExist('cePortal')
        ) {
            return route('cePortal');
        }

        return route('dashboard');
    }
}

if (! function_exists('ceAuthProfileUrl')) {
    function ceAuthProfileUrl(): string
    {
        if (
            auth()->check()
            && isModuleActive('CeProfessional')
            && (int) auth()->user()->role_id === (int) config('ceprofessional.role_id', 10)
            && routeIsExist('cePortal.profile')
        ) {
            return route('cePortal.profile');
        }

        if (auth()->check() && (int) auth()->user()->role_id === 3) {
            return route('myProfile');
        }

        return route('changePassword');
    }
}

if (! function_exists('ceAuthAccountUrl')) {
    function ceAuthAccountUrl(): string
    {
        if (
            auth()->check()
            && isModuleActive('CeProfessional')
            && (int) auth()->user()->role_id === (int) config('ceprofessional.role_id', 10)
            && routeIsExist('cePortal.account')
        ) {
            return route('cePortal.account');
        }

        if (auth()->check() && (int) auth()->user()->role_id === 3) {
            return route('myAccount');
        }

        return route('changePassword');
    }
}
