<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Permission;

class Report
{
    public function handle($request, Closure $next)
    {        
        $user_permissions   = explode(",",Permission::where('role_name', auth()->user()->getRoleNames()->first() )->first()->access);
        $permission         = 'گزارش';

        if ( in_array( $permission , $user_permissions ) || in_array( 'همه' , $user_permissions ) ) {
            return $next($request);
        }

        abort(503, 'You Access Denied');
        
    }
}