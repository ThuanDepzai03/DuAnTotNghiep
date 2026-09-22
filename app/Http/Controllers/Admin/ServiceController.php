<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnRequest;
use App\Models\WarrantyClaim;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function returns()
    {
        $returns = ReturnRequest::with('order', 'items.imei', 'items.orderItem.variant.product')->latest()->paginate(20);
        return view('admin.service.returns', compact('returns'));
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
        $claims = WarrantyClaim::with('imei.variant.product', 'user')->latest()->paginate(20);
        return view('admin.service.warranties', compact('claims'));
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
}
