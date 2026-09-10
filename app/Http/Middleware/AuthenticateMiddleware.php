<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
            session(['url.intended' => $request->fullUrl()]);
            return redirect()->route('login')->with('warning', 'Please sign in or register to place your order.');
        }

        return $next($request);
    }
}
