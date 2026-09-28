<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\RolePermission\Entities\Role;

class SharePermissionListMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !app()->bound('permission_list')) {
            $domain = function_exists('SaasDomain') ? SaasDomain() : 'main';

            app()->instance(
                'permission_list',
                Cache::remember('PermissionList_' . $domain, now()->addHour(), function () {
                    return Role::with('permissions')->get();
                })
            );
        }

        return $next($request);
    }
}
