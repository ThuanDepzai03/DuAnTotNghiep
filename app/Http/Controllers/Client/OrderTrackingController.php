<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    public function index(Request $request)
    {
        $customer = session('customer');

        if (!$customer) {
            return redirect()->route('login');
        }

        $orders = Order::where(function ($query) use ($customer) {
            $query->where('phone', $customer['tel'] ?? '')
                ->orWhere('email', $customer['email'] ?? '');
        })
            ->orderByDesc('created_at')
            ->get();

        foreach ($orders as $order) {
            $this->applyStatusTimeline($order);
        }

        return view('client.orders.tracking', compact('orders'));
    }

    public function show($id)
    {
        $customer = session('customer');

        if (!$customer) {
            return redirect()->route('login');
        }

        $order = Order::with(['items.variant.product'])
            ->where('id', $id)
            ->where(function ($query) use ($customer) {
                $query->where('phone', $customer['tel'] ?? '')
                    ->orWhere('email', $customer['email'] ?? '');
            })
            ->firstOrFail();

        $this->applyStatusTimeline($order);

        return view('client.orders.tracking-detail', compact('order'));
    }

    protected function applyStatusTimeline(Order $order): void
    {
        $statusOrder = ['pending', 'confirmed', 'shipping', 'completed', 'cancelled'];
        $currentIndex = array_search($order->status, $statusOrder, true);
        $currentIndex = $currentIndex === false ? 0 : $currentIndex;

        $timeline = [];
        foreach ($statusOrder as $index => $status) {
            $timeline[] = [
                'status' => $status,
                'label' => $this->statusLabel($status),
                'active' => $index <= $currentIndex,
                'done' => $index < $currentIndex,
            ];
        }

        if ($order->status === 'pending' && $order->created_at) {
            $createdAt = $order->created_at->copy()->addMinutes(2);
            if (now()->gte($createdAt)) {
                $order->status = 'confirmed';
                $order->save();
                $timeline = $this->buildTimeline($order->fresh());
            }
        }

        $order->tracking_timeline = $timeline;
    }

    protected function buildTimeline(Order $order): array
    {
        $statusOrder = ['pending', 'confirmed', 'shipping', 'completed', 'cancelled'];
        $currentIndex = array_search($order->status, $statusOrder, true);
        $currentIndex = $currentIndex === false ? 0 : $currentIndex;

        $timeline = [];
        foreach ($statusOrder as $index => $status) {
            $timeline[] = [
                'status' => $status,
                'label' => $this->statusLabel($status),
                'active' => $index <= $currentIndex,
                'done' => $index < $currentIndex,
            ];
        }

        return $timeline;
    }

    protected function statusLabel(string $status): string
    {
        return match ($status) {
            'pending' => 'Đã đặt',
            'confirmed' => 'Đang chuẩn bị đơn hàng',
            'shipping' => 'Đang giao hàng',
            'completed' => 'Đã giao / Hoàn tất',
            'cancelled' => 'Đã hủy',
            default => 'Đang xử lý',
        };
    }
}
