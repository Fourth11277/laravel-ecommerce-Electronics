<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Ensure the authenticated user is flagged (or role-capable) as admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (! $user) {
            return $request->expectsJson()
                ? response()->json(['message' => 'Unauthenticated.'], Response::HTTP_UNAUTHORIZED)
                : redirect()->route('login');
        }

        $hasAdminRole = method_exists($user, 'hasRole') && $user->hasRole('admin');

        if (! (($user->is_admin ?? false) || $hasAdminRole)) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden'], Response::HTTP_FORBIDDEN);
            }

            abort(Response::HTTP_FORBIDDEN, 'Access denied.');
        }

        return $next($request);
    }
}


