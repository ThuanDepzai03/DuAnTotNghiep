<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $customer = session('customer');

        if (!$customer || (int) $customer['role'] !== 1) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
