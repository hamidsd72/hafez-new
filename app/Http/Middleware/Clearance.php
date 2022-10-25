<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Clearance
{
    public function handle($request, Closure $next)
    {

        if (Auth::user()->hasRole('administrator')) {
            return $next($request);
        } else {

            // Menus
            if ($request->is('admin/menu-create')) {
                if (!Auth::user()->hasPermissionTo('admin-menu-create')) {
                    return abort(403);
                } else {
                    return $next($request);
                }
            }

        }

    }
}