<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductVariant;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('id')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.variant.product')->findOrFail($id);

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
                ProductVariant::where('id', $item->product_variant_id)
                    ->decrement('stock', $item->quantity);
            }
        }

        $order->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.orders.show', $order->id)
            ->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }
}