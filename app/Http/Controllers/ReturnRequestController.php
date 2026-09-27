<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ReturnRequest;
use App\Models\ServiceReason;
use App\Services\ServiceRequestWorkflowService;
use App\Support\ServiceWorkflow;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReturnRequestController extends Controller
{
    public function create(Order $order)
    {
        $this->authorizeOrder($order);
        abort_unless($this->isEligible($order), 422, $this->eligibilityMessage($order));
        $order->load('items.variant.product', 'items.imeis');
        $reasons = ServiceReason::for('return')->get();
        return view('client.orders.return-create', compact('order', 'reasons'));
    }

    public function tracking(Order $order)
    {
        $this->authorizeOrder($order);
        $order->load(['returnRequests.items.orderItem.variant.product', 'returnRequests.items.imei', 'returnRequests.statusHistory']);

        foreach ($order->returnRequests as $returnRequest) {
            $returnRequest->workflow_timeline = ServiceWorkflow::timeline(
                'return',
                $returnRequest->status,
                $returnRequest->statusHistory,
                $returnRequest->created_at
            );
            $returnRequest->can_customer_mark_sent = $returnRequest->status === 'approved';
            $returnRequest->can_customer_confirm_received = $returnRequest->status === 'return_shipping';
        }

        return view('client.orders.return-tracking', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $this->authorizeOrder($order);
        abort_unless($this->isEligible($order), 422, $this->eligibilityMessage($order));
        $data = $request->validate([
            'reason' => ['required', 'string', 'max:255'],
            'reason_id' => ['nullable', 'exists:service_reasons,id'],
            'description' => ['nullable', 'string', 'max:2000'],
            'order_item_id' => ['required', 'exists:order_items,id'],
            'product_imei_id' => ['nullable', 'exists:product_imeis,id'],
        ]);
        if (!empty($data['reason_id'])) {
            abort_unless(ServiceReason::for('return')->whereKey($data['reason_id'])->exists(), 422, 'Lý do trả hàng không còn khả dụng.');
        }

        $orderItem = $order->items()->whereKey($data['order_item_id'])->with('imeis')->first();
        abort_unless($orderItem, 422);
        $existingRequest = $order->returnRequests()
            ->whereNotIn('status', ['completed', 'request_rejected', 'rejected'])
            ->whereHas('items', fn ($query) => $query->where('order_item_id', $orderItem->id))
            ->latest()
            ->first();

        if ($existingRequest) {
            return redirect()
                ->route('orders.tracking.returns', $order)
                ->with('error', 'Sản phẩm này đã có yêu cầu trả hàng #' . $existingRequest->id . ' đang được xử lý. Bạn có thể theo dõi tiến độ tại đây.');
        }
        if (! empty($data['product_imei_id'])) {
            abort_unless($orderItem->imeis->contains('id', (int) $data['product_imei_id']), 422);
        }
        DB::transaction(function () use ($order, $data, $request) {
            $returnRequest = ReturnRequest::create([
                'order_id' => $order->id,
                'user_id' => session('customer.id'),
                'reason' => $data['reason'],
                'reason_id' => $data['reason_id'] ?? null,
                'description' => $data['description'] ?? null,
                'refund_amount' => 0,
            ]);
            $returnRequest->items()->create([
                'order_item_id' => $data['order_item_id'],
                'product_imei_id' => $data['product_imei_id'] ?? null,
                'quantity' => 1,
            ]);
            app(ServiceRequestWorkflowService::class)->recordInitial('return', $returnRequest, $returnRequest->reason, $request);
        });

        return redirect()->route('orders.tracking.returns', $order)->with('success', 'Đã gửi yêu cầu trả hàng.');
    }

    public function markSent(Request $request, ReturnRequest $returnRequest, ServiceRequestWorkflowService $workflow)
    {
        $this->authorizeOrder($returnRequest->order);
        $data = $request->validate(['tracking_number' => ['nullable', 'string', 'max:100']]);

        $workflow->transitionCustomer('return', $returnRequest, 'return_shipped', null, [
            'customer_return_tracking_number' => $data['tracking_number'] ?? null,
            'customer_sent_at' => now(),
        ], $request);

        return back()->with('success', 'Đã cập nhật: bạn đã gửi sản phẩm trả về shop.');
    }

    public function confirmReceived(Request $request, ReturnRequest $returnRequest, ServiceRequestWorkflowService $workflow)
    {
        $this->authorizeOrder($returnRequest->order);
        $workflow->transitionCustomer('return', $returnRequest, 'customer_received', null, [
            'customer_received_at' => now(),
        ], $request);

        return back()->with('success', 'Đã xác nhận nhận lại sản phẩm.');
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
