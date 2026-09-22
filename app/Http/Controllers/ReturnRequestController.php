<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ReturnRequest;
use Illuminate\Http\Request;

class ReturnRequestController extends Controller
{
    public function create(Order $order)
    {
        $this->authorizeOrder($order);
        abort_unless(in_array($order->status, ['confirmed', 'shipping', 'completed'], true), 404);
        $order->load('items.variant.product', 'items.imeis');
        return view('account.returns.create', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $this->authorizeOrder($order);
        $data = $request->validate([
            'reason' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'order_item_id' => ['required', 'exists:order_items,id'],
            'product_imei_id' => ['nullable', 'exists:product_imeis,id'],
        ]);
        $orderItem = $order->items()->whereKey($data['order_item_id'])->with('imeis')->first();
        abort_unless($orderItem, 422);
        if (! empty($data['product_imei_id'])) {
            abort_unless($orderItem->imeis->contains('id', (int) $data['product_imei_id']), 422);
        }
        ReturnRequest::create([
            'order_id' => $order->id,
            'user_id' => session('customer.id'),
            'reason' => $data['reason'],
            'description' => $data['description'] ?? null,
            'refund_amount' => 0,
        ])->items()->create([
            'order_item_id' => $data['order_item_id'],
            'product_imei_id' => $data['product_imei_id'] ?? null,
            'quantity' => 1,
        ]);
        return redirect()->route('account.profile')->with('success', 'Đã gửi yêu cầu trả hàng.');
    }

    private function authorizeOrder(Order $order): void
    {
        $customer = session('customer');
        $owns = $customer && ((filled($customer['email'] ?? null) && filled($order->email) && strtolower($customer['email']) === strtolower($order->email))
            || (filled($customer['tel'] ?? null) && filled($order->phone) && (string) $customer['tel'] === (string) $order->phone));
        abort_unless($owns, 403);
    }
}
