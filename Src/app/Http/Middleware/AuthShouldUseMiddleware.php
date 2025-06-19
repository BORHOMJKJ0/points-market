<?php

namespace App\Http\Middleware;

use Closure;

class AuthShouldUseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {

        auth()->shouldUse($guard);

        return $next($request);
    }
}
