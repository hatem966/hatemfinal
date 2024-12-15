<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth('api')->user();
     if (!$user) {
         return response()->json([
             "msg" => "Unauthorized. Please login with a valid token.",
             "status" => 401,
         ], 401);
     }

        return $next($request);
    }
}