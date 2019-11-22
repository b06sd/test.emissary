<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAdminOrCourierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->unit_id == 30 || Auth::user()->unit_id == 24)
        {
            return $next($request);
        }
        return abort(403);
    }
}
