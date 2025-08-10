<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Role;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $requiredRole = Role::from($role);
        $userRole = $request->user()->role;

        // Admin has access to everything.
        if ($userRole === Role::Admin) {
            return $next($request);
        }

        // Manager has access to Manager and Employee routes.
        if ($userRole === Role::Manager && in_array($requiredRole, [Role::Manager, Role::Employee])) {
            return $next($request);
        }

        // Employee only has access to Employee routes.
        if ($userRole === Role::Employee && $requiredRole === Role::Employee) {
            return $next($request);
        }

        return response()->json(['message' => 'Forbidden.'], 403);
    }
}
