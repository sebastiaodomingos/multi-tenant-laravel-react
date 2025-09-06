<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnforceTenantDomain
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // allow super admins everywhere
        if ($user && $user->role === 'super_admin') {
            return $next($request);
        }

        // get current domain
        $currentDomain = $request->getHost();

        // resolve tenant from domain
        $tenant = \App\Models\Tenant::where('domain', $currentDomain)->first();

        if (! $tenant) {
            abort(403, 'Invalid domain.');
        }

        // check if user belongs to this tenant
        if ($user && $user->tenant_id !== $tenant->id) {
            auth()->logout();
            abort(403, 'You are not allowed to access this domain.');
        }

        // make tenant available globally
        app()->instance('currentTenant', $tenant);

        return $next($request);
    }
}
