<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRolesEnum;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     * Usage: route middleware 'role:admin' | 'role:gor_admin' | 'role:customer'
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(403);
        }

        $allowed = match ($role) {
            'admin' => (int) $user->role_id === UserRolesEnum::Admin->value,
            'gor_admin' => (int) $user->role_id === UserRolesEnum::GorAdmin->value,
            'customer' => (int) $user->role_id === UserRolesEnum::Customer->value,
            default => false,
        };

        if (!$allowed) {
            abort(403);
        }

        return $next($request);
    }
}
