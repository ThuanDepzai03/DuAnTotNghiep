<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\Voucher;
use App\Services\InventoryService;
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
        $pendingCount = (clone $baseQuery)->where('status', 'pending')->count();
        $confirmedCount = (clone $baseQuery)->where('status', 'confirmed')->count();
        $shippingCount = (clone $baseQuery)->where('status', 'shipping')->count();
        $completedCount = (clone $baseQuery)->where('status', 'completed')->count();

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
            'items.imeis',
        ])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $statusInput = $request->input('status');
        if (is_array($statusInput)) {
            $statusInput = count($statusInput) === 1 ? reset($statusInput) : null;
        }

        $request->merge(['status' => $statusInput]);
        $request->validate([
            'status' => 'required|in:pending,confirmed,shipping,completed,cancelled',
        ]);

        $order = Order::with('items.variant')->findOrFail($id);

        // Define allowed status transitions (only forward, no reverting)
        $allowedTransitions = [
            'pending' => ['confirmed', 'cancelled'],
            'pending_payment' => ['pending', 'cancelled'], // VNPay waiting for payment
            'confirmed' => ['shipping', 'completed', 'cancelled'],
            'shipping' => ['completed', 'cancelled'],
            'completed' => [], // Final state, can't change
            'cancelled' => [], // Final state, can't change
        ];

        $currentStatus = $order->status;
        $newStatus = $statusInput;

        // Check if transition is allowed
        if (!isset($allowedTransitions[$currentStatus]) || !in_array($newStatus, $allowedTransitions[$currentStatus])) {
            return redirect()
                ->route('admin.orders.show', $order->id)
                ->with('error', "Không thể chuyển từ trạng thái '{$currentStatus}' sang '{$newStatus}'.");
        }

        // Deduct stock when admin confirms the order (status: pending -> confirmed)
        if ($currentStatus === 'pending' && $newStatus === 'confirmed') {
            app(InventoryService::class)->markOrderSold($order);
        }

        if ($currentStatus === 'pending_payment' && $newStatus === 'cancelled') {
            app(InventoryService::class)->releaseOrder($order);
        }

        if (in_array($currentStatus, ['confirmed', 'shipping'], true) && $newStatus === 'cancelled') {
            app(InventoryService::class)->restoreSoldOrder($order);
        }

        if ($newStatus === 'cancelled' && $order->payment_method === 'cod') {
            $voucherCodes = array_filter(array_map('trim', explode(',', (string) $order->voucher_code)));
            if ($voucherCodes !== []) {
                Voucher::whereIn('code', $voucherCodes)
                    ->where('used_quantity', '>', 0)
                    ->decrement('used_quantity');
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

        $totalRevenue = $orders->sum(fn ($order) => $order->final_price ?? $order->total_price);
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