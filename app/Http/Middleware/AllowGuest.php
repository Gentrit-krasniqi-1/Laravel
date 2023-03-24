<?php

namespace App\Http\Middleware;

use Closure;


class AllowGuest
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
        return app(RedirectIfAuthenticatedUser::class)->handle($request, function($request) use ($next) {
            return $next($request);
        });
    }
}