@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3>Trả hàng và hoàn tiền</h3>
    <p class="text-muted">Quản lý các nhánh hoàn tiền hoặc gửi trả sản phẩm cho khách.</p>
</div>
<div class="page-content">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    @forelse($returns as $return)
        <article class="card shadow-sm mb-3">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <strong>Yêu cầu #{{ $return->id }} · Đơn #{{ $return->order_id }}</strong>
                <span class="badge {{ in_array($return->status, ['rejected', 'request_rejected', 'refund_rejected', 'return_failed']) ? 'bg-danger' : ($return->status === 'completed' ? 'bg-success' : 'bg-warning text-dark') }}">
                    {{ \App\Support\ServiceWorkflow::label('return', $return->status) }}
                </span>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <p><strong>Khách:</strong> {{ $return->order?->customer_name ?? 'Khách hàng' }} <small class="text-muted">{{ $return->order?->phone }}</small></p>
                        <p><strong>Lý do:</strong> {{ $return->serviceReason?->name ?? $return->reason }}</p>
                        @if($return->serviceReason?->condition_text)<p class="small text-muted">{{ $return->serviceReason->condition_text }}</p>@endif
                        <p><strong>Mô tả:</strong> {{ $return->description ?: 'Không có mô tả.' }}</p>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead><tr><th>Sản phẩm</th><th>IMEI</th><th>SL</th></tr></thead>
                                <tbody>
                                    @foreach($return->items as $item)
                                        <tr>
                                            <td>{{ $item->orderItem?->variant?->product?->name ?? 'Sản phẩm' }}</td>
                                            <td>{{ $item->imei?->imei ?? 'Không có' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($return->refund_rejection_reason)<div class="service-reason-box"><strong>Lý do không chấp nhận hoàn tiền</strong><p class="mb-0 mt-2">{{ $return->refund_rejection_reason }}</p></div>@endif
                        @if($return->return_failure_reason)<div class="service-reason-box"><strong>Lý do hoàn trả thất bại</strong><p class="mb-0 mt-2">{{ $return->return_failure_reason }}</p></div>@endif
                        @if($return->shop_return_tracking_number)<p><strong>Mã vận đơn shop gửi:</strong> {{ $return->shop_return_tracking_number }}</p>@endif
                    </div>
                    <div class="col-lg-6">
                        @include('shared.service-timeline', ['timeline' => $return->workflow_timeline])
                        @include('shared.service-history', ['history' => $return->statusHistory, 'type' => 'return'])

                        <form method="POST" action="{{ route('admin.returns.update', $return) }}" class="border rounded p-3 bg-light mt-3" data-service-transition-form>
                            @csrf
                            @method('PUT')
                            <label class="form-label" for="return-status-{{ $return->id }}">Chuyển sang bước</label>
                            <select id="return-status-{{ $return->id }}" name="status" class="form-select mb-3" data-status-select>
                                <option value="{{ $return->workflow_status }}">Giữ trạng thái: {{ \App\Support\ServiceWorkflow::label('return', $return->status) }}</option>
                                @foreach($return->next_workflow_statuses as $status)
                                    <option value="{{ $status }}">{{ $workflowSteps[$status]['label'] ?? $status }}</option>
                                @endforeach
                            </select>

                            <div class="row g-2" data-status-field="refund_approved,refunded">
                                <div class="col-md-6">
                                    <label class="form-label">Tiền hoàn (₫)</label>
                                    <input type="number" name="refund_amount" min="1" value="{{ old('refund_amount', $return->refund_amount) }}" class="form-control" data-required-status="refund_approved,refunded">
                                    @error('refund_amount')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phương thức hoàn</label>
                                    <select name="refund_method" class="form-select">
                                        <option value="">Chưa xác định</option>
                                        @foreach(['Chuyển khoản', 'Tiền mặt', 'Ví điện tử'] as $method)
                                            <option value="{{ $method }}" @selected($return->refund_method === $method)>{{ $method }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2" data-status-field="refund_rejected">
                                <label class="form-label">Lý do không chấp nhận hoàn tiền</label>
                                <textarea name="refund_rejection_reason" class="form-control" rows="3" maxlength="2000" data-required-status="refund_rejected">{{ old('refund_rejection_reason', $return->refund_rejection_reason) }}</textarea>
                            </div>
                            <div class="mt-2" data-status-field="return_failed">
                                <label class="form-label">Lý do hoàn trả thất bại</label>
                                <textarea name="return_failure_reason" class="form-control" rows="3" maxlength="2000" data-required-status="return_failed">{{ old('return_failure_reason', $return->return_failure_reason) }}</textarea>
                            </div>
                            <div class="mt-2" data-status-field="return_shipping">
                                <label class="form-label">Mã vận đơn gửi trả khách</label>
                                <input name="shop_return_tracking_number" class="form-control" maxlength="100" value="{{ old('shop_return_tracking_number', $return->shop_return_tracking_number) }}">
                            </div>
                            <div class="mt-2" data-status-field="default-note">
                                <label class="form-label">Ghi chú xử lý</label>
                                <textarea name="admin_note" class="form-control" rows="2" maxlength="2000" data-required-status="request_rejected">{{ old('admin_note', $return->admin_note) }}</textarea>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Lưu xử lý</button>
                        </form>

                        @if(!$return->warrantyClaim)
                            <form method="POST" action="{{ route('admin.returns.to-warranty', $return) }}" class="border rounded p-3 mt-3">
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
                            <p class="text-muted mt-3 mb-0">Đã liên kết yêu cầu bảo hành #{{ $return->warrantyClaim->id }}.</p>
                        @endif
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div class="alert alert-info">Chưa có yêu cầu trả hàng.</div>
    @endforelse
    {{ $returns->links() }}
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('[data-service-transition-form]').forEach((form) => {
        const select = form.querySelector('[data-status-select]');
        const refreshFields = () => {
            const status = select.value;
            form.querySelectorAll('[data-status-field]').forEach((field) => {
                const targets = field.dataset.statusField.split(',');
                const visible = targets.includes('default-note') || targets.includes(status);
                field.hidden = !visible;
            });
            form.querySelectorAll('[data-required-status]').forEach((input) => {
                input.required = input.dataset.requiredStatus.split(',').includes(status);
            });
        };
        select.addEventListener('change', refreshFields);
        refreshFields();
    });
</script>
@endpush
