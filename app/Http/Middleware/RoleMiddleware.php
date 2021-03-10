<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles, $permission = null)
    { 
        
        $roles = explode('|', $roles);

        if(!$request->user()->hasRole(...$roles)) {

            abort(404);

        }

        if($permission !== null && !$request->user()->can($permission)) {

                abort(404);
        }
        
        return $next($request);
    }
}
