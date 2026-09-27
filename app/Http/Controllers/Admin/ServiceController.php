<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnRequest;
use App\Models\WarrantyClaim;
use App\Models\ServiceReason;
use App\Services\ServiceRequestWorkflowService;
use App\Support\ServiceWorkflow;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function returns()
    {
        $returns = ReturnRequest::with(['order', 'serviceReason'])
            ->latest()
            ->paginate(20);

        return view('admin.service.returns', compact('returns'));
    }

    public function returnDetail(ReturnRequest $returnRequest)
    {
        $returnRequest->load([
            'order',
            'items.imei',
            'items.orderItem.variant.product',
            'serviceReason',
            'warrantyClaim',
            'statusHistory',
        ]);

        $returnRequest->workflow_timeline = ServiceWorkflow::timeline(
            'return',
            $returnRequest->status,
            $returnRequest->statusHistory,
            $returnRequest->created_at
        );
        $returnRequest->next_workflow_statuses = ServiceWorkflow::adminTransitions('return', $returnRequest->status);
        $returnRequest->workflow_status = ServiceWorkflow::legacyStatus('return', $returnRequest->status);

        $reasons = ServiceReason::for('warranty')->get();
        $workflowSteps = ServiceWorkflow::steps('return');

        return view('admin.service.return-detail', compact('returnRequest', 'reasons', 'workflowSteps'));
    }

    public function convertReturnToWarranty(Request $request, ReturnRequest $returnRequest)
    {
        $data = $request->validate(['reason_id' => ['required', 'exists:service_reasons,id'], 'issue_description' => ['required', 'string', 'max:3000']]);
        abort_unless(ServiceReason::for('warranty')->whereKey($data['reason_id'])->exists(), 422, 'Lý do bảo hành không còn khả dụng.');
        $item = $returnRequest->items()->with('imei', 'orderItem.imeis')->first();
        $imeiId = $item?->product_imei_id;
        if (! $imeiId && $item?->orderItem?->imeis?->count() === 1) {
            $imeiId = $item->orderItem->imeis->first()->id;
        }
        abort_unless($imeiId, 422, 'Yêu cầu này chưa có IMEI để chuyển sang bảo hành.');
        abort_if($returnRequest->warrantyClaim()->exists(), 422, 'Yêu cầu đã liên kết bảo hành.');

        $claim = DB::transaction(function () use ($returnRequest, $item, $imeiId, $data, $request) {
            if (! $item->product_imei_id) {
                $returnRequest->items()->whereKey($item->id)->update(['product_imei_id' => $imeiId]);
            }
            $claim = WarrantyClaim::create([
                'product_imei_id' => $imeiId,
                'order_id' => $returnRequest->order_id,
                'user_id' => $returnRequest->user_id,
                'reason_id' => $data['reason_id'],
                'return_request_id' => $returnRequest->id,
                'issue_description' => $data['issue_description'],
            ]);
            $returnRequest->update(['warranty_claim_id' => $claim->id]);
            app(ServiceRequestWorkflowService::class)->recordInitial('warranty', $claim, 'Chuyển từ yêu cầu trả hàng #' . $returnRequest->id, $request);
            return $claim;
        });

        return back()->with('success', 'Đã chuyển yêu cầu trả hàng sang bảo hành #' . $claim->id . '.');
    }

    public function updateReturn(Request $request, ReturnRequest $returnRequest, ServiceRequestWorkflowService $workflow)
    {
        $data = $request->validate([
            'status' => ['required', \Illuminate\Validation\Rule::in(ServiceWorkflow::adminStatusOptions('return'))],
            'refund_amount' => ['nullable', 'numeric', 'min:0'],
            'refund_method' => ['nullable', 'string', 'max:100'],
            'admin_note' => ['nullable', 'string', 'max:2000'],
            'refund_rejection_reason' => ['nullable', 'string', 'max:2000'],
            'return_failure_reason' => ['nullable', 'string', 'max:2000'],
            'shop_return_tracking_number' => ['nullable', 'string', 'max:100'],
        ]);

        if ($data['status'] === 'refund_rejected' && blank($data['refund_rejection_reason'] ?? null)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['refund_rejection_reason' => 'Nhập lý do không chấp nhận hoàn tiền.']);
        }
        if ($data['status'] === 'return_failed' && blank($data['return_failure_reason'] ?? null)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['return_failure_reason' => 'Nhập lý do giao trả hàng thất bại.']);
        }
        if ($data['status'] === 'request_rejected' && blank($data['admin_note'] ?? null)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['admin_note' => 'Nhập lý do từ chối yêu cầu.']);
        }
        if (in_array($data['status'], ['refund_approved', 'refunded'], true)
            && (float) ($data['refund_amount'] ?? $returnRequest->refund_amount) <= 0) {
            throw \Illuminate\Validation\ValidationException::withMessages(['refund_amount' => 'Nhập số tiền hoàn lớn hơn 0.']);
        }

        $attributes = [
            'admin_note' => $data['admin_note'] ?? $returnRequest->admin_note,
            'refund_amount' => $data['refund_amount'] ?? $returnRequest->refund_amount,
            'refund_method' => $data['refund_method'] ?? $returnRequest->refund_method,
        ];
        if ($data['status'] === 'refund_rejected') {
            $attributes['refund_rejection_reason'] = $data['refund_rejection_reason'];
        }
        if ($data['status'] === 'return_failed') {
            $attributes['return_failure_reason'] = $data['return_failure_reason'];
        }
        if ($data['status'] === 'return_shipping') {
            $attributes['shop_return_tracking_number'] = $data['shop_return_tracking_number'] ?? null;
        }
        if ($data['status'] === 'received') {
            $attributes['shop_received_at'] = $returnRequest->shop_received_at ?? now();
        }

        $reason = match ($data['status']) {
            'refund_rejected' => $data['refund_rejection_reason'],
            'return_failed' => $data['return_failure_reason'],
            'request_rejected' => $data['admin_note'],
            default => $data['admin_note'] ?? null,
        };
        $workflow->transitionAdmin('return', $returnRequest, $data['status'], $reason, $attributes, $request);

        return redirect()
            ->route('admin.returns.show', $returnRequest)
            ->with('success', 'Cập nhật trạng thái thành công.');
    }

    public function warranties()
    {
        $claims = WarrantyClaim::with('imei.variant.product', 'user', 'order', 'reason', 'returnRequest', 'statusHistory')->latest()->paginate(20);
        foreach ($claims as $claim) {
            $claim->workflow_timeline = ServiceWorkflow::timeline('warranty', $claim->status, $claim->statusHistory, $claim->created_at);
            $claim->next_workflow_statuses = ServiceWorkflow::adminTransitions('warranty', $claim->status);
            $claim->workflow_status = ServiceWorkflow::legacyStatus('warranty', $claim->status);
        }
        $reasons = ServiceReason::for('return')->get();
        $workflowSteps = ServiceWorkflow::steps('warranty');
        return view('admin.service.warranties', compact('claims', 'reasons', 'workflowSteps'));
    }

    public function updateWarranty(Request $request, WarrantyClaim $warrantyClaim, ServiceRequestWorkflowService $workflow)
    {
        $data = $request->validate([
            'status' => ['required', \Illuminate\Validation\Rule::in(ServiceWorkflow::adminStatusOptions('warranty'))],
            'technician_note' => ['nullable', 'string', 'max:2000'],
            'return_method' => ['nullable', 'string', 'max:100'],
            'rejection_reason' => ['nullable', 'string', 'max:2000'],
            'return_failure_reason' => ['nullable', 'string', 'max:2000'],
            'shop_tracking_number' => ['nullable', 'string', 'max:100'],
        ]);

        if ($data['status'] === 'rejected' && blank($data['rejection_reason'] ?? null)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['rejection_reason' => 'Nhập lý do từ chối bảo hành.']);
        }
        if ($data['status'] === 'return_failed' && blank($data['return_failure_reason'] ?? null)) {
            throw \Illuminate\Validation\ValidationException::withMessages(['return_failure_reason' => 'Nhập lý do gửi trả thất bại.']);
        }

        $attributes = [
            'technician_note' => $data['technician_note'] ?? $warrantyClaim->technician_note,
            'return_method' => $data['return_method'] ?? $warrantyClaim->return_method,
        ];
        if ($data['status'] === 'received') {
            $attributes['received_at'] = $warrantyClaim->received_at ?? now();
        }
        if ($data['status'] === 'completed') {
            $attributes['completed_at'] = $warrantyClaim->completed_at ?? now();
        }
        if ($data['status'] === 'rejected') {
            $attributes['rejection_reason'] = $data['rejection_reason'];
        }
        if ($data['status'] === 'return_failed') {
            $attributes['return_failure_reason'] = $data['return_failure_reason'];
        }
        if ($data['status'] === 'shipping') {
            $attributes['shop_tracking_number'] = $data['shop_tracking_number'] ?? null;
        }

        $reason = $data['status'] === 'rejected'
            ? $data['rejection_reason']
            : ($data['status'] === 'return_failed' ? $data['return_failure_reason'] : ($data['technician_note'] ?? null));
        $workflow->transitionAdmin('warranty', $warrantyClaim, $data['status'], $reason, $attributes, $request);

        if ($data['status'] === 'completed') {
            $warrantyClaim->imei()->update(['status' => 'sold']);
        }

        return back()->with('success', 'Đã cập nhật bảo hành.');
    }

    public function convertWarrantyToReturn(Request $request, WarrantyClaim $warrantyClaim)
    {
        $data = $request->validate(['reason_id' => ['required', 'exists:service_reasons,id'], 'reason' => ['required', 'string', 'max:255']]);
        abort_unless(ServiceReason::for('return')->whereKey($data['reason_id'])->exists(), 422, 'Lý do trả hàng không còn khả dụng.');
        abort_if($warrantyClaim->returnRequest()->exists(), 422, 'Yêu cầu đã liên kết trả hàng.');
        $orderItem = $warrantyClaim->imei?->orderItems()->first();
        abort_unless($orderItem, 422, 'Không tìm thấy sản phẩm trong đơn hàng để tạo yêu cầu trả hàng.');

        $returnRequest = DB::transaction(function () use ($warrantyClaim, $data, $orderItem, $request) {
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
            app(ServiceRequestWorkflowService::class)->recordInitial('return', $returnRequest, 'Chuyển từ yêu cầu bảo hành #' . $warrantyClaim->id, $request);
            return $returnRequest;
        });

        return back()->with('success', 'Đã chuyển yêu cầu bảo hành sang trả hàng #' . $returnRequest->id . '.');
    }
}
