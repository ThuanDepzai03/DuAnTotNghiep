@extends('admin.layout')

@section('content')
<div class="page-heading d-flex justify-content-between align-items-start flex-wrap gap-2">
    <div>
        <h3>Chi tiết yêu cầu trả hàng #{{ $returnRequest->id }}</h3>
        <p class="text-muted">Đơn hàng #{{ $returnRequest->order_id }} · {{ $returnRequest->created_at?->format('d/m/Y H:i') }}</p>
    </div>
    <a href="{{ route('admin.returns.index') }}" class="btn btn-outline-secondary">Quay lại danh sách</a>
</div>
<div class="page-content">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    <article class="card shadow-sm mb-3">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <strong>Yêu cầu #{{ $returnRequest->id }} · Đơn #{{ $returnRequest->order_id }}</strong>
            <span class="badge {{ \App\Support\ServiceWorkflow::isFailure('return', $returnRequest->status) ? 'bg-danger' : (\App\Support\ServiceWorkflow::isSuccessful('return', $returnRequest->status) ? 'bg-success' : 'bg-warning text-dark') }}">
                {{ \App\Support\ServiceWorkflow::label('return', $returnRequest->status) }}
            </span>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-lg-6">
                    <p><strong>Khách:</strong> {{ $returnRequest->order?->customer_name ?? 'Khách hàng' }} <small class="text-muted">{{ $returnRequest->order?->phone }}</small></p>
                    <p><strong>Email:</strong> {{ $returnRequest->order?->email ?: 'Chưa có' }}</p>
                    <p><strong>Lý do:</strong> {{ $returnRequest->serviceReason?->name ?? $returnRequest->reason }}</p>
                    @if($returnRequest->serviceReason?->condition_text)<p class="small text-muted">{{ $returnRequest->serviceReason->condition_text }}</p>@endif
                    <p><strong>Mô tả:</strong> {{ $returnRequest->description ?: 'Không có mô tả.' }}</p>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle">
                            <thead><tr><th>Sản phẩm</th><th>IMEI</th><th>SL</th></tr></thead>
                            <tbody>
                                @foreach($returnRequest->items as $item)
                                    <tr>
                                        <td>{{ $item->orderItem?->variant?->product?->name ?? 'Sản phẩm' }}</td>
                                        <td>{{ $item->imei?->imei ?? 'Không có' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($returnRequest->customer_return_tracking_number)<p><strong>Mã vận đơn khách gửi:</strong> {{ $returnRequest->customer_return_tracking_number }}</p>@endif
                    @if($returnRequest->shop_return_tracking_number)<p><strong>Mã vận đơn shop gửi:</strong> {{ $returnRequest->shop_return_tracking_number }}</p>@endif
                    @if($returnRequest->refund_rejection_reason)<div class="service-reason-box"><strong>Lý do không chấp nhận hoàn tiền</strong><p class="mb-0 mt-2">{{ $returnRequest->refund_rejection_reason }}</p></div>@endif
                    @if($returnRequest->return_failure_reason)<div class="service-reason-box"><strong>Lý do hoàn trả thất bại</strong><p class="mb-0 mt-2">{{ $returnRequest->return_failure_reason }}</p></div>@endif
                </div>
                <div class="col-lg-6">
                    @include('shared.service-timeline', ['timeline' => $returnRequest->workflow_timeline])
                    @include('shared.service-history', ['history' => $returnRequest->statusHistory, 'type' => 'return'])

                    <form method="POST" action="{{ route('admin.returns.update', $returnRequest) }}" class="border rounded p-3 bg-light mt-3" data-service-transition-form>
                        @csrf
                        @method('PUT')
                            <label class="form-label" for="return-status-{{ $returnRequest->id }}">Chọn bước xử lý tiếp theo</label>
                            <p class="small text-muted mb-2">Chọn bước tiếp theo, kiểm tra thông tin rồi nhấn nút xác nhận để cập nhật.</p>
                        <div class="d-flex flex-wrap align-items-start gap-2 mb-2">
                            <select id="return-status-{{ $returnRequest->id }}" name="status" class="form-select flex-grow-1" data-status-select>
                                <option value="{{ $returnRequest->workflow_status }}">Giữ trạng thái: {{ \App\Support\ServiceWorkflow::label('return', $returnRequest->status) }}</option>
                                @foreach($returnRequest->next_workflow_statuses as $status)
                                    <option value="{{ $status }}">{{ $workflowSteps[$status]['label'] ?? $status }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit" data-transition-submit>Lưu xử lý</button>
                        </div>
                        <div class="alert alert-info py-2 mb-3" role="status" data-transition-feedback hidden></div>

                        <div class="row g-2" data-status-field="refund_approved,refunded">
                            <div class="col-md-6">
                                <label class="form-label">Tiền hoàn (₫)</label>
                                <input type="number" name="refund_amount" min="1" value="{{ old('refund_amount', $returnRequest->refund_amount) }}" class="form-control" data-required-status="refund_approved,refunded">
                                @error('refund_amount')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phương thức hoàn</label>
                                <select name="refund_method" class="form-select">
                                    <option value="">Chưa xác định</option>
                                    @foreach(['Chuyển khoản', 'Tiền mặt', 'Ví điện tử'] as $method)
                                        <option value="{{ $method }}" @selected($returnRequest->refund_method === $method)>{{ $method }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-2" data-status-field="refund_rejected">
                            <label class="form-label">Lý do không chấp nhận hoàn tiền</label>
                            <textarea name="refund_rejection_reason" class="form-control" rows="3" maxlength="2000" data-required-status="refund_rejected">{{ old('refund_rejection_reason', $returnRequest->refund_rejection_reason) }}</textarea>
                        </div>
                        <div class="mt-2" data-status-field="return_failed">
                            <label class="form-label">Lý do hoàn trả thất bại</label>
                            <textarea name="return_failure_reason" class="form-control" rows="3" maxlength="2000" data-required-status="return_failed">{{ old('return_failure_reason', $returnRequest->return_failure_reason) }}</textarea>
                        </div>
                        <div class="mt-2" data-status-field="return_shipping">
                            <label class="form-label">Mã vận đơn gửi trả khách</label>
                            <input name="shop_return_tracking_number" class="form-control" maxlength="100" value="{{ old('shop_return_tracking_number', $returnRequest->shop_return_tracking_number) }}">
                        </div>
                        <div class="mt-2" data-status-field="default-note">
                            <label class="form-label">Ghi chú xử lý</label>
                            <textarea name="admin_note" class="form-control" rows="2" maxlength="2000" data-required-status="request_rejected">{{ old('admin_note', $returnRequest->admin_note) }}</textarea>
                        </div>
                    </form>

                    @if(!$returnRequest->warrantyClaim)
                        <form method="POST" action="{{ route('admin.returns.to-warranty', $returnRequest) }}" class="border rounded p-3 mt-3">
                            @csrf
                            <strong class="d-block mb-2">Chuyển sang bảo hành</strong>
                            <select name="reason_id" class="form-select mb-2" required>
                                <option value="">Chọn lý do bảo hành</option>
                                @foreach($reasons as $reason)
                                    <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                @endforeach
                            </select>
                            <textarea name="issue_description" class="form-control mb-2" rows="2" maxlength="3000" placeholder="Mô tả lỗi" required></textarea>
                            <button class="btn btn-outline-primary" type="submit">Tạo yêu cầu bảo hành</button>
                        </form>
                    @else
                        <p class="text-muted mt-3 mb-0">Đã liên kết yêu cầu bảo hành #{{ $returnRequest->warrantyClaim->id }}.</p>
                    @endif
                </div>
            </div>
        </div>
    </article>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('[data-service-transition-form]').forEach((form) => {
        const select = form.querySelector('[data-status-select]');
        const submit = form.querySelector('[data-transition-submit]');
        const feedback = form.querySelector('[data-transition-feedback]');
        const originalLabel = submit.textContent.trim();
        const refreshFields = () => {
            const status = select.value;
            form.querySelectorAll('[data-status-field]').forEach((field) => {
                const targets = field.dataset.statusField.split(',');
                field.hidden = !targets.includes('default-note') && !targets.includes(status);
            });
            form.querySelectorAll('[data-required-status]').forEach((input) => {
                input.required = input.dataset.requiredStatus.split(',').includes(status);
            });

            const selectedOption = select.selectedOptions[0];
            const isCurrentStatus = selectedOption?.textContent.trim().startsWith('Giữ trạng thái:');
            feedback.hidden = isCurrentStatus;
            submit.textContent = isCurrentStatus
                ? originalLabel
                : 'Xác nhận: ' + selectedOption.textContent.trim();
            feedback.textContent = isCurrentStatus
                ? ''
                : 'Bạn đã chọn bước này nhưng chưa lưu. Nhấn nút "' + submit.textContent + '" ngay bên dưới.';
        };
        select.addEventListener('change', refreshFields);
        form.addEventListener('submit', function () {
            submit.disabled = true;
            submit.textContent = 'Đang lưu...';
        });
        refreshFields();
    });
</script>
@endpush