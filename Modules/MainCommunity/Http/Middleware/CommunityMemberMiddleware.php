<?php

namespace Modules\MainCommunity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityMemberMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            session(['redirectTo' => $request->getRequestUri()]);

            return redirect()->route('login');
        }

        $user = Auth::user();
        $roleId = (int) $user->role_id;
        $ceRoleId = (int) config('ceprofessional.role_id', 10);

        $allowed = in_array($roleId, [1, 2, 3], true) || $roleId === $ceRoleId;

        if (! $allowed) {
            abort(403);
        }

        return $next($request);
    }
}
 