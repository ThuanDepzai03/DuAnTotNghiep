<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Get total counts for statistics (before pagination)
        $baseQuery = Order::whereNotIn('status', ['pending_payment']);
        $totalOrders = $baseQuery->count();
        $pendingCount = $baseQuery->where('status', 'pending')->count();
        $confirmedCount = $baseQuery->where('status', 'confirmed')->count();
        $shippingCount = $baseQuery->where('status', 'shipping')->count();
        $completedCount = $baseQuery->where('status', 'completed')->count();

        $query = Order::withCount('items');

        // Exclude pending_payment orders (unpaid VNPay orders) - they should not be visible in admin
        $query->whereNotIn('status', ['pending_payment']);

        // Lọc theo trạng thái nếu người dùng có chọn trên giao diện
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query
            // Sort by status priority: pending → confirmed → shipping → completed → cancelled
            ->orderByRaw("CASE 
                WHEN status = 'pending' THEN 1
                WHEN status = 'confirmed' THEN 2
                WHEN status = 'shipping' THEN 3
                WHEN status = 'completed' THEN 4
                WHEN status = 'cancelled' THEN 5
                ELSE 6
            END")
            // Then sort by newest first
            ->orderByDesc('id')
            // Paginate with 10 items per page
            ->paginate(10);

        return view('admin.orders.index', compact('orders', 'pendingCount', 'confirmedCount', 'shippingCount', 'completedCount', 'totalOrders'));
    }

    public function show($id)
    {
        $order = Order::with([
            'items.variant.product',
            'items.variant.attributeValues.attribute',
        ])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,shipping,completed,cancelled'
        ]);

        $order = Order::with('items.variant')->findOrFail($id);

        // Define allowed status transitions (only forward, no reverting)
        $allowedTransitions = [
            'pending' => ['confirmed', 'cancelled'],
            'pending_payment' => ['pending', 'cancelled'], // VNPay waiting for payment
            'confirmed' => ['shipping', 'cancelled'],
            'shipping' => ['completed', 'cancelled'],
            'completed' => [], // Final state, can't change
            'cancelled' => [], // Final state, can't change
        ];

        $currentStatus = $order->status;
        $newStatus = $request->status;

        // Check if transition is allowed
        if (!isset($allowedTransitions[$currentStatus]) || !in_array($newStatus, $allowedTransitions[$currentStatus])) {
            return redirect()
                ->route('admin.orders.show', $order->id)
                ->with('error', "Không thể chuyển từ trạng thái '{$currentStatus}' sang '{$newStatus}'.");
        }

        // Deduct stock when admin confirms the order (status: pending -> confirmed)
        if ($currentStatus === 'pending' && $newStatus === 'confirmed') {
            foreach ($order->items as $item) {
                $item->variant()->decrement('stock', $item->quantity);
            }
        }

        // Set completed_at timestamp when order is completed
        $updateData = ['status' => $newStatus];
        if ($newStatus === 'completed') {
            $updateData['completed_at'] = now();
        }

        $order->update($updateData);

        return redirect()
            ->route('admin.orders.show', $order->id)
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

    public function revenue(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $ordersQuery = Order::query()
            ->where('status', 'completed');

        if ($from) {
            $ordersQuery->whereDate('created_at', '>=', $from);
        }

        if ($to) {
            $ordersQuery->whereDate('created_at', '<=', $to);
        }

        $orders = $ordersQuery->orderByDesc('created_at')->get();

        $totalRevenue = $orders->sum('total_price');
        $totalOrders = $orders->count();

        $bestSellingProducts = OrderItem::selectRaw('product_variant_id, SUM(quantity) as total_sold')
            ->whereHas('order', function ($query) use ($from, $to) {
                $query->where('status', 'completed');

                if ($from) {
                    $query->whereDate('created_at', '>=', $from);
                }

                if ($to) {
                    $query->whereDate('created_at', '<=', $to);
                }
            })
            ->groupBy('product_variant_id')
            ->orderByDesc('total_sold')
            ->with('variant.product')
            ->take(10)
            ->get();

        return view('admin.statistics.revenue', compact(
            'orders',
            'totalRevenue',
            'totalOrders',
            'bestSellingProducts',
            'from',
            'to'
        ));
    }
}