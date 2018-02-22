<?php

namespace App\Http\Middleware;

use Closure;

class HttpsMiddleware
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
        if(! $request->secure() && !(str_contains(env('APP_URL'), 'localhost') || str_contains(env('APP_URL'), '127.0.0.1'))) {
            return redirect()->secure($request->path());
        }
        return $next($request);
    }
}
