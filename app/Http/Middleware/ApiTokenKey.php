<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasHeader('token')) {
            return response()->json(
                [
                    'message' => "token required"
                ],
                200
            );
        };

        if (!$request->header('token') == 111) {
            return response()->json(
                [
                    'message' => "token invalide"
                ],
                200
            );
        };

        return $next($request);
    }
}
