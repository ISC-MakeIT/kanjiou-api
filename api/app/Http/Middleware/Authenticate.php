<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware {
    public function handle($request, Closure $next, ...$guards) {
        if (auth()->check()) {
            if (request()->getPathInfo() === '/earthAdmin/login' || request()->getPathInfo() === '/earthAdmin/signIn') {
                return redirect('/earthAdmin/ranks/default');
            }

            return $next($request);
        }

        if (request()->getPathInfo() !== '/earthAdmin/login' && request()->getPathInfo() !== '/earthAdmin/signIn') {
            return redirect('/earthAdmin/login');
        }

        return $next($request);
    }
}
