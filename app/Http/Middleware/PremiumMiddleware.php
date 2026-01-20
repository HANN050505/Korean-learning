<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PremiumMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_premium) {
            return redirect('/upgrade')->with('error', 'Fitur premium');
        }

        return $next($request);
    }
}
