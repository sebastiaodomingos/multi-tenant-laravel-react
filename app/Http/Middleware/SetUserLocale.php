<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class SetUserLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->language) {
            App::setLocale('fr');//auth()->user()->language->code
        }

        return $next($request);
    }
}
