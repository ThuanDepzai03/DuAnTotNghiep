<?php

namespace App\Http\Middleware;

use App\Support\CustomerTable;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCustomerSessionIsCurrent
{
    public function handle(Request $request, Closure $next): Response
    {
        $customer = $request->session()->get('customer');

        if (! is_array($customer) || empty($customer['id']) || ! CustomerTable::hasColumn('session_version')) {
            return $next($request);
        }

        $columns = ['session_version'];
        $hasPreferences = CustomerTable::hasColumn('preferences');
        if ($hasPreferences) {
            $columns[] = 'preferences';
        }

        $account = CustomerTable::query()
            ->where('id', $customer['id'])
            ->first($columns);

        if (! $account) {
            $request->session()->forget(['customer', 'customer_session_version', 'customer_preferences']);

            return redirect()->route('login')->with('error', 'Tài khoản không còn hoạt động. Vui lòng đăng nhập lại.');
        }

        $sessionVersion = $request->session()->get('customer_session_version');
        if ($sessionVersion === null || (int) $sessionVersion !== (int) $account->session_version) {
            $request->session()->forget(['customer', 'customer_session_version', 'customer_preferences']);

            return redirect()->route('login')->with('error', 'Phiên đăng nhập đã hết hiệu lực. Vui lòng đăng nhập lại.');
        }

        if ($hasPreferences && ! $request->session()->has('customer_preferences')) {
            $preferences = json_decode((string) ($account->preferences ?? ''), true) ?: [];
            $request->session()->put(
                'customer_preferences',
                array_merge([
                    'dark_mode' => false,
                    'interactive_sound' => false,
                    'promotional_notifications' => true,
                    'order_notifications' => true,
                ], $preferences)
            );
        }

        return $next($request);
    }
}
