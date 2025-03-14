<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Octane\Facades\Octane;
use Symfony\Component\HttpFoundation\Response;

class DisableOctaneCacheForGestion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('gestion/*')) {
            Octane::concurrently([]);
        }

        return $next($request);
    }
}
