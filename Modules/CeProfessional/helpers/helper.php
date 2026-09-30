<?php

if (! function_exists('userIsCeProfessional')) {
    function userIsCeProfessional($user = null): bool
    {
        $user = $user ?? auth()->user();

        if (! $user) {
            return false;
        }

        return (int) $user->role_id === (int) config('ceprofessional.role_id', 10);
    }
}

if (! function_exists('isCeCartRedirectUrl')) {
    function isCeCartRedirectUrl(?string $url): bool
    {
        if (! $url) {
            return false;
        }

        return stripos($url, '/ce/cart/') !== false;
    }
}

if (! function_exists('pullPendingCeCartRedirectUrl')) {
    function pullPendingCeCartRedirectUrl(): ?string
    {
        $redirectTo = session('redirectTo');

        if (! isCeCartRedirectUrl($redirectTo)) {
            return null;
        }

        session()->forget('redirectTo');
        session()->forget('url.intended');

        return $redirectTo;
    }
}

if (! function_exists('normalizeInternalRedirectPath')) {
    function normalizeInternalRedirectPath(string $url): string
    {
        $url = trim($url);

        if ($url === '') {
            return '/';
        }

        if (preg_match('#^https?://#i', $url)) {
            $path = parse_url($url, PHP_URL_PATH) ?: '/';
            $query = parse_url($url, PHP_URL_QUERY);

            return $query ? $path . '?' . $query : $path;
        }

        return str_starts_with($url, '/') ? $url : '/' . ltrim($url, '/');
    }
}

if (! function_exists('rememberCeCartRedirectUrl')) {
    function rememberCeCartRedirectUrl(string $attemptRoute): void
    {
        session([
            'redirectTo' => normalizeInternalRedirectPath($attemptRoute),
        ]);
        session()->save();
    }
}

if (! function_exists('ceCartLoginUrl')) {
    function ceCartLoginUrl(string $attemptRoute): string
    {
        $path = normalizeInternalRedirectPath($attemptRoute);
        rememberCeCartRedirectUrl($path);

        return route('login', ['redirect' => $path]);
    }
}

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
