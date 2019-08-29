<?php

namespace Liberty\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user()->tipo != 'administrador') {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
