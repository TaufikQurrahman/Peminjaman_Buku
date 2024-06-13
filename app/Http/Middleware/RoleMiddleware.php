<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's role is not the specified role and the request is not a read operation
            if (Auth::user()->role !== $role && !in_array($request->method(), ['GET', 'HEAD'])) {
                // Redirect or abort with 403 Forbidden response
                return response()->json(['error' => 'Unauthorized.'], 403);
            }
        } else {
            return redirect()->route('login'); // Adjust the route name if needed
        }

        return $next($request);
    }
}