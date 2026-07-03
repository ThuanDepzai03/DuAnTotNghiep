<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,shipping,completed,cancelled',
        ], [
            'status.required' => 'Vui lòng chọn trạng thái đơn hàng.',
            'status.in' => 'Trạng thái đơn hàng không hợp lệ.',
        ]);

        try {
            $result = DB::transaction(function () use ($id, $data) {
                $order = Order::with('items')
                    ->lockForUpdate()
                    ->findOrFail($id);

                $oldStatus = $order->status;
                $newStatus = $data['status'];

                if ($oldStatus === $newStatus) {
                    return 'same_status';
                }

                $allowedTransitions = [
                    'pending' => ['confirmed', 'cancelled'],
                    'confirmed' => ['shipping', 'cancelled'],
                    'shipping' => ['completed', 'cancelled'],
                    'completed' => [],
                    'cancelled' => [],
                ];

                if (!in_array($newStatus, $allowedTransitions[$oldStatus] ?? [])) {
                    throw ValidationException::withMessages([
                        'status' => 'Không thể chuyển từ trạng thái này sang trạng thái đã chọn.',
                    ]);
                }

                /*
                 * Khi xác nhận đơn:
                 * kiểm tra tồn kho rồi trừ kho đúng 1 lần.
                 */
                if ($oldStatus === 'pending' && $newStatus === 'confirmed') {
                    foreach ($order->items as $item) {
                        $variant = ProductVariant::with('product')
                            ->lockForUpdate()
                            ->findOrFail($item->product_variant_id);

                        if ($variant->stock < $item->quantity) {
                            $productName = $variant->product?->name ?? 'Sản phẩm';

                            throw ValidationException::withMessages([
                                'status' => "{$productName} không đủ tồn kho. Còn lại: {$variant->stock}.",
                            ]);
                        }

                        $variant->decrement('stock', $item->quantity);
                    }
                }

                /*
                 * Khi hủy đơn sau lúc đã xác nhận/giao:
                 * cộng lại số lượng đã trừ.
                 */
                if (
                    in_array($oldStatus, ['confirmed', 'shipping'])
                    && $newStatus === 'cancelled'
                ) {
                    foreach ($order->items as $item) {
                        ProductVariant::where('id', $item->product_variant_id)
                            ->lockForUpdate()
                            ->increment('stock', $item->quantity);
                    }
                }

                $order->update([
                    'status' => $newStatus,
                ]);

                return 'updated';
            });

            $message = $result === 'same_status'
                ? 'Đơn hàng đang ở trạng thái này.'
                : 'Cập nhật trạng thái đơn hàng thành công.';

            return redirect()
                ->route('admin.orders.show', $id)
                ->with('success', $message);

        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput();
        }
    }
}
