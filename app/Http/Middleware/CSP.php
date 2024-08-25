<?php

namespace App\Http\Middleware;

use Closure;

class CSP
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Content-Security-Policy', "script-src 'self' 'unsafe-eval'");

        return $response;
    }

    protected $except = [
       
    ];

}