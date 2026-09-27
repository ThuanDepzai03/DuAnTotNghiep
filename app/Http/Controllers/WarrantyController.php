<?php

namespace App\Http\Controllers;

use App\Models\ProductImei;
use App\Models\WarrantyClaim;
use App\Services\ServiceRequestWorkflowService;
use App\Support\ServiceWorkflow;
use Illuminate\Http\Request;
use App\Models\ServiceReason;
use Illuminate\Support\Facades\DB;

class WarrantyController extends Controller
{
    public function lookup(Request $request)
    {
        $imei = null;
        if ($request->filled('imei')) {
            $imei = ProductImei::with('variant.product')->where('imei', trim($request->imei))->first();
        }
        $reasons = ServiceReason::for('warranty')->get();
        return view('warranty.lookup', compact('imei', 'reasons'));
    }

    public function store(Request $request)
    {
        abort_unless(session('customer'), 403);
        $data = $request->validate([
            'imei' => ['required', 'string', 'max:30'],
            'issue_description' => ['required', 'string', 'max:3000'],
            'reason_id' => ['nullable', 'exists:service_reasons,id'],
        ]);
        if (!empty($data['reason_id'])) {
            abort_unless(ServiceReason::for('warranty')->whereKey($data['reason_id'])->exists(), 422, 'Lý do bảo hành không còn khả dụng.');
        }
        $customer = session('customer');
        $email = strtolower(trim((string) ($customer['email'] ?? '')));
        $phone = trim((string) ($customer['tel'] ?? ''));
        $imei = ProductImei::with('orderItems.order')
            ->where('imei', trim($data['imei']))
            ->whereHas('orderItems.order', function ($query) use ($email, $phone) {
                $query->where('status', 'completed')->where(function ($owner) use ($email, $phone) {
                    if ($phone !== '') {
                        $owner->where('phone', $phone);
                    }
                    if ($email !== '') {
                        $phone === '' ? $owner->where('email', $email) : $owner->orWhere('email', $email);
                    }
                    if ($phone === '' && $email === '') {
                        $owner->whereRaw('1 = 0');
                    }
                });
            })
            ->firstOrFail();
        abort_unless(in_array($imei->status, ['sold', 'returned', 'warranty'], true), 422, 'IMEI chưa có lịch sử bán hợp lệ.');
        abort_if($imei->warranty_expired_at && $imei->warranty_expired_at->isPast(), 422, 'IMEI đã hết hạn bảo hành.');
        abort_if($imei->warrantyClaims()->whereNotIn('status', ['completed', 'returned'])->exists(), 422, 'IMEI đang có yêu cầu bảo hành chưa hoàn tất.');
        $order = $imei->orderItems->map->order->filter(fn ($order) => $order?->status === 'completed')->first();
        $claim = DB::transaction(function () use ($imei, $order, $data, $request) {
            $claim = WarrantyClaim::create([
                'product_imei_id' => $imei->id,
                'order_id' => $order?->id,
                'user_id' => session('customer.id'),
                'reason_id' => $data['reason_id'] ?? null,
                'issue_description' => $data['issue_description'],
            ]);
            $imei->update(['status' => 'warranty']);
            app(ServiceRequestWorkflowService::class)->recordInitial('warranty', $claim, $claim->issue_description, $request);

            return $claim;
        });

        return redirect()->route('account.warranties.show', $claim)->with('success', 'Đã tiếp nhận yêu cầu bảo hành #' . $claim->id . '.');
    }

    public function show(Request $request, WarrantyClaim $warrantyClaim)
    {
        $this->authorizeClaim($request, $warrantyClaim);
        $warrantyClaim->load(['imei.variant.product', 'order', 'reason', 'statusHistory']);
        $timeline = ServiceWorkflow::timeline('warranty', $warrantyClaim->status, $warrantyClaim->statusHistory, $warrantyClaim->created_at);
        $canCustomerMarkSent = $warrantyClaim->status === 'approved';
        $canCustomerConfirmReceived = $warrantyClaim->status === 'shipping';

        return view('client.orders.warranty-tracking', compact('warrantyClaim', 'timeline', 'canCustomerMarkSent', 'canCustomerConfirmReceived'));
    }

    public function markSent(Request $request, WarrantyClaim $warrantyClaim, ServiceRequestWorkflowService $workflow)
    {
        $this->authorizeClaim($request, $warrantyClaim);
        $data = $request->validate(['tracking_number' => ['nullable', 'string', 'max:100']]);
        $workflow->transitionCustomer('warranty', $warrantyClaim, 'customer_shipped', null, [
            'customer_tracking_number' => $data['tracking_number'] ?? null,
            'customer_sent_at' => now(),
        ], $request);

        return back()->with('success', 'Đã cập nhật: bạn đã gửi thiết bị bảo hành.');
    }

    public function confirmReceived(Request $request, WarrantyClaim $warrantyClaim, ServiceRequestWorkflowService $workflow)
    {
        $this->authorizeClaim($request, $warrantyClaim);
        $workflow->transitionCustomer('warranty', $warrantyClaim, 'customer_received', null, [
            'customer_received_at' => now(),
        ], $request);

        return back()->with('success', 'Đã xác nhận nhận lại thiết bị.');
    }

    private function authorizeClaim(Request $request, WarrantyClaim $claim): void
    {
        $customer = $request->session()->get('customer');
        abort_unless($customer, 403);
        $order = $claim->order;
        $email = strtolower(trim((string) ($customer['email'] ?? '')));
        $phone = trim((string) ($customer['tel'] ?? ''));
        $owns = $order && (
            ($email !== '' && strtolower((string) $order->email) === $email)
            || ($phone !== '' && (string) $order->phone === $phone)
        );
        abort_unless($owns, 403);
    }
}
