<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAdmin {
    public function handle(Request $request, Closure $next) {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        if (auth()->check()) {
            return back()->with('flash_warning', 'You are not authorized to view admin pages.');
        }

        return redirect()->guest('/login')->with('flash_message', 'Please log in with admin access to view this page');
    }
}