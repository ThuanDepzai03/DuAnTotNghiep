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
    public function index()
    {
        $orders = Order::withCount('items')
            ->orderByDesc('id')
            ->get();

        return view('admin.orders.index', compact('orders'));
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

    if ($order->status !== 'confirmed' && $request->status === 'confirmed') {
        foreach ($order->items as $item) {
            $item->variant()->decrement('stock', $item->quantity);
        }
    }

    $order->update([
        'status' => $request->status
    ]);

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
