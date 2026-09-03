<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    public function index(Request $request)
    {
        $customer = session('customer');

        if (!$customer) {
            return redirect()->route('login');
        }

        $orders = Order::with(['items.variant.product'])
            ->where(function ($query) use ($customer) {
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

        $productIds = $order->items->pluck('variant.product_id')->filter()->unique();
        $reviews = Review::whereIn('product_id', $productIds)
            ->where('customer_id', $customer['id'] ?? 0)
            ->get()
            ->keyBy('product_id');

        return view('client.orders.tracking-detail', compact('order', 'reviews'));
    }

    public function submitReview(Request $request, $id)
    {
        $customer = session('customer');
        if (!$customer) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'product_id' => ['required', 'integer'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        $order = Order::with('items.variant')
            ->where('id', $id)
            ->where(function ($query) use ($customer) {
                $query->where('phone', $customer['tel'] ?? '')
                    ->orWhere('email', $customer['email'] ?? '');
            })->firstOrFail();

        $hasProduct = $order->items->contains(fn ($item) =>
            (int) ($item->variant?->product_id) === (int) $data['product_id']
        );

        abort_unless($hasProduct, 403);

        Review::updateOrCreate(
            ['product_id' => $data['product_id'], 'customer_id' => $customer['id']],
            [
                'customer_name' => $customer['user'] ?? 'Khách hàng',
                'rating' => $data['rating'],
                'comment' => $data['comment'],
                'status' => 'approved',
            ]
        );

        return back()->with('success', 'Đã lưu đánh giá sản phẩm.');
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
