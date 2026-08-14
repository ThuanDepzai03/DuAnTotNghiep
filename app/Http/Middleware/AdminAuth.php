<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $admin = session('admin');
        $customer = session('customer');

        $isAdmin = !empty($admin) || (!empty($customer) && (int) ($customer['role'] ?? 0) === 1);

        if (!$isAdmin) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
