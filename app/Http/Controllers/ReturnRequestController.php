<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ReturnRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReturnRequestController extends Controller
{
    public function create(Order $order)
    {
        $this->authorizeOrder($order);
        abort_unless($this->isEligible($order), 422, $this->eligibilityMessage($order));
        $order->load('items.variant.product', 'items.imeis');
        return view('client.orders.return-create', compact('order'));
    }

    public function tracking(Order $order)
    {
        $this->authorizeOrder($order);
        $order->load(['returnRequests.items.orderItem.variant.product', 'returnRequests.items.imei']);

        return view('client.orders.return-tracking', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $this->authorizeOrder($order);
        abort_unless($this->isEligible($order), 422, $this->eligibilityMessage($order));
        $data = $request->validate([
            'reason' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'order_item_id' => ['required', 'exists:order_items,id'],
            'product_imei_id' => ['nullable', 'exists:product_imeis,id'],
        ]);
        $orderItem = $order->items()->whereKey($data['order_item_id'])->with('imeis')->first();
        abort_unless($orderItem, 422);
        abort_if($order->returnRequests()->whereIn('status', ['pending', 'approved', 'received'])->whereHas('items', fn ($query) => $query->where('order_item_id', $orderItem->id))->exists(), 422, 'Sản phẩm này đã có yêu cầu trả hàng đang được xử lý.');
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
        return redirect()->route('orders.tracking.returns', $order)->with('success', 'Đã gửi yêu cầu trả hàng.');
    }

    private function isEligible(Order $order): bool
    {
        if ($order->status !== 'completed') {
            return false;
        }

        $completedAt = $order->completed_at ?? $order->updated_at;
        return $completedAt && Carbon::parse($completedAt)->gte(now()->subDays(7));
    }

    private function eligibilityMessage(Order $order): string
    {
        if ($order->status !== 'completed') {
            return 'Chỉ có thể trả hàng sau khi đơn hàng đã hoàn tất.';
        }

        return 'Thời hạn yêu cầu trả hàng là 7 ngày kể từ khi đơn hoàn tất.';
    }

    private function authorizeOrder(Order $order): void
    {
        $customer = session('customer');
        $owns = $customer && ((filled($customer['email'] ?? null) && filled($order->email) && strtolower($customer['email']) === strtolower($order->email))
            || (filled($customer['tel'] ?? null) && filled($order->phone) && (string) $customer['tel'] === (string) $order->phone));
        abort_unless($owns, 403);
    }
}
