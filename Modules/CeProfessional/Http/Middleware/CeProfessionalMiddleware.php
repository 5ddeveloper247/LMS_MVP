<?php

namespace Modules\CeProfessional\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CeProfessionalMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if ((int) Auth::user()->role_id !== (int) config('ceprofessional.role_id', 10)) {
            abort(403);
        }

        return $next($request);
    }
}
