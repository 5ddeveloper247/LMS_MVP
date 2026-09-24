<?php

namespace Modules\CeProfessional\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectCeProfessionalDashboard
{
    public function handle(Request $request, Closure $next)
    {
        if (
            Auth::check()
            && isModuleActive('CeProfessional')
            && (int) Auth::user()->role_id === (int) config('ceprofessional.role_id', 10)
            && ($request->routeIs('dashboard') || $request->routeIs('home'))
        ) {
            return redirect()->route('cePortal');
        }

        return $next($request);
    }
}
