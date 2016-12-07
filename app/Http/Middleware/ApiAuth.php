<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuth
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
        if($request->header('accessToken') != '1@#8924&63ghy^937!!'){
             return response()->json(['error' => 'token mismatch']);
        }
        return $next($request);
    }
}
