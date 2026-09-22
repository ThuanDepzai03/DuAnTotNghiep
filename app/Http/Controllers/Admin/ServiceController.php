<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnRequest;
use App\Models\WarrantyClaim;
use App\Models\ServiceReason;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function returns()
    {
        $returns = ReturnRequest::with('order', 'items.imei', 'items.orderItem.variant.product', 'serviceReason', 'warrantyClaim')->latest()->paginate(20);
        $reasons = ServiceReason::for('warranty')->get();
        return view('admin.service.returns', compact('returns', 'reasons'));
    }

    public function convertReturnToWarranty(Request $request, ReturnRequest $returnRequest)
    {
        $data = $request->validate(['reason_id' => ['required', 'exists:service_reasons,id'], 'issue_description' => ['required', 'string', 'max:3000']]);
        $item = $returnRequest->items()->with('imei', 'orderItem')->first();
        abort_unless($item?->product_imei_id, 422, 'Yêu cầu này chưa có IMEI để chuyển sang bảo hành.');
        abort_if($returnRequest->warrantyClaim()->exists(), 422, 'Yêu cầu đã liên kết bảo hành.');

        $claim = DB::transaction(function () use ($returnRequest, $item, $data) {
            $claim = WarrantyClaim::create([
                'product_imei_id' => $item->product_imei_id,
                'order_id' => $returnRequest->order_id,
                'user_id' => $returnRequest->user_id,
                'reason_id' => $data['reason_id'],
                'return_request_id' => $returnRequest->id,
                'issue_description' => $data['issue_description'],
            ]);
            $returnRequest->update(['warranty_claim_id' => $claim->id]);
            return $claim;
        });

        return back()->with('success', 'Đã chuyển yêu cầu trả hàng sang bảo hành #' . $claim->id . '.');
    }

    public function updateReturn(Request $request, ReturnRequest $returnRequest)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,approved,rejected,received,refunded,completed'],
            'refund_amount' => ['nullable', 'numeric', 'min:0'],
            'refund_method' => ['nullable', 'string', 'max:100'],
            'admin_note' => ['nullable', 'string', 'max:2000'],
        ]);

        $allowed = [
            'pending' => ['approved', 'rejected'],
            'approved' => ['received', 'rejected'],
            'received' => ['refunded', 'rejected'],
            'refunded' => ['completed'],
            'rejected' => [],
            'completed' => [],
        ];
        if ($data['status'] !== $returnRequest->status && !in_array($data['status'], $allowed[$returnRequest->status] ?? [], true)) {
            return back()->with('error', 'Trạng thái không thể chuyển theo quy trình hiện tại.');
        }
        if ($data['status'] === 'refunded' && (float) ($data['refund_amount'] ?? $returnRequest->refund_amount) <= 0) {
            return back()->with('error', 'Vui lòng nhập số tiền hoàn trước khi xác nhận hoàn tiền.');
        }

        $returnRequest->update([
            'status' => $data['status'],
            'refund_amount' => $data['refund_amount'] ?? $returnRequest->refund_amount,
            'refund_method' => $data['refund_method'] ?? $returnRequest->refund_method,
            'admin_note' => $data['admin_note'] ?? $returnRequest->admin_note,
        ]);
        return back()->with('success', 'Đã cập nhật yêu cầu trả hàng.');
    }

    public function warranties()
    {
        $claims = WarrantyClaim::with('imei.variant.product', 'user', 'reason', 'returnRequest')->latest()->paginate(20);
        $reasons = ServiceReason::for('return')->get();
        return view('admin.service.warranties', compact('claims', 'reasons'));
    }

    public function updateWarranty(Request $request, WarrantyClaim $warrantyClaim)
    {
        $data = $request->validate(['status' => ['required', 'in:submitted,received,checking,repairing,ready,returned,rejected'], 'technician_note' => ['nullable', 'string']]);
        if ($data['status'] === 'received' && ! $warrantyClaim->received_at) $data['received_at'] = now();
        if (in_array($data['status'], ['returned', 'rejected'], true)) $data['completed_at'] = now();
        $warrantyClaim->update($data);
        if (in_array($data['status'], ['returned', 'rejected'], true)) $warrantyClaim->imei()->update(['status' => 'sold']);
        return back()->with('success', 'Đã cập nhật bảo hành.');
    }

    public function convertWarrantyToReturn(Request $request, WarrantyClaim $warrantyClaim)
    {
        $data = $request->validate(['reason_id' => ['required', 'exists:service_reasons,id'], 'reason' => ['required', 'string', 'max:255']]);
        abort_if($warrantyClaim->returnRequest()->exists(), 422, 'Yêu cầu đã liên kết trả hàng.');
        $orderItem = $warrantyClaim->imei?->orderItems()->first();
        abort_unless($orderItem, 422, 'Không tìm thấy sản phẩm trong đơn hàng để tạo yêu cầu trả hàng.');

        $returnRequest = DB::transaction(function () use ($warrantyClaim, $data, $orderItem) {
            $returnRequest = ReturnRequest::create([
                'order_id' => $warrantyClaim->order_id,
                'user_id' => $warrantyClaim->user_id,
                'reason_id' => $data['reason_id'],
                'reason' => $data['reason'],
                'description' => $warrantyClaim->issue_description,
                'refund_amount' => 0,
            ]);
            $returnRequest->items()->create([
                'order_item_id' => $orderItem->id,
                'product_imei_id' => $warrantyClaim->product_imei_id,
                'quantity' => 1,
            ]);
            $warrantyClaim->update(['return_request_id' => $returnRequest->id]);
            return $returnRequest;
        });

        return back()->with('success', 'Đã chuyển yêu cầu bảo hành sang trả hàng #' . $returnRequest->id . '.');
    }
}
