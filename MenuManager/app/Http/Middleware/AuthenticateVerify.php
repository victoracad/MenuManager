<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login', ['locale'=>'pt']); // {{{{ route('routeName', ['id'=>1]) }}}}
        }
    }
}
