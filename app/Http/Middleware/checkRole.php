<?php

namespace App\Http\Middleware;

use App\Http\Traits\UserRoleTrait;
use Closure;
use Illuminate\Http\Request;

class checkRole
{
    use UserRoleTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $role)
    {
        if($role == 'systemadmin' && $this->getRole(auth()->user()->role_id)[0]->role_name != $role) {
            abort(403);
        }
        return $next($request);
    }
}
