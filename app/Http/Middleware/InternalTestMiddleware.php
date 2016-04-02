<?php

namespace App\Http\Middleware;

use Closure;

class InternalTestMiddleware
{
    /**
     * Handle an incoming request.
     * Temporary controller for internal user
     * only internal user can view project
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('internal'))
            return $next($request);
        else
            return redirect('signin');
    }
}
