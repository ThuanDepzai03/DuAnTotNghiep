@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3>Quản lý bảo hành</h3>
    <p class="text-muted">Tiếp nhận, xử lý kỹ thuật và gửi thiết bị lại khách.</p>
</div>
<div class="page-content">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    @forelse($claims as $claim)
        <article class="card shadow-sm mb-3">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <strong>Bảo hành #{{ $claim->id }} · Đơn #{{ $claim->order_id }}</strong>
                <span class="badge {{ \App\Support\ServiceWorkflow::isFailure('warranty', $claim->status) ? 'bg-danger' : ($claim->status === 'completed' ? 'bg-success' : 'bg-warning text-dark') }}">
                    {{ \App\Support\ServiceWorkflow::label('warranty', $claim->status) }}
                </span>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <p><strong>Khách:</strong> {{ $claim->order?->customer_name ?? $claim->user?->name ?? 'Khách hàng' }}</p>
                        <p><strong>Liên hệ:</strong> {{ $claim->order?->phone }}</p>
                        <p><strong>Thiết bị:</strong> {{ $claim->imei?->variant?->product?->name ?? 'Thiết bị' }}</p>
                        <p><strong>IMEI:</strong> {{ $claim->imei?->imei }}</p>
                        <p><strong>Lý do:</strong> {{ $claim->reason?->name ?? 'Bảo hành' }}</p>
                        <p><strong>Mô tả:</strong> {{ $claim->issue_description }}</p>
                        @if($claim->customer_tracking_number)<p><strong>Mã vận đơn khách gửi:</strong> {{ $claim->customer_tracking_number }}</p>@endif
                        @if($claim->shop_tracking_number)<p><strong>Mã vận đơn shop gửi:</strong> {{ $claim->shop_tracking_number }}</p>@endif
                        @if($claim->rejection_reason)<div class="service-reason-box"><strong>Lý do từ chối bảo hành</strong><p class="mb-0 mt-2">{{ $claim->rejection_reason }}</p></div>@endif
                        @if($claim->return_failure_reason)<div class="service-reason-box"><strong>Lý do gửi trả thất bại</strong><p class="mb-0 mt-2">{{ $claim->return_failure_reason }}</p></div>@endif
                    </div>
                    <div class="col-lg-7">
                        @include('shared.service-timeline', ['timeline' => $claim->workflow_timeline])
                        @include('shared.service-history', ['history' => $claim->statusHistory, 'type' => 'warranty'])

                        <form method="POST" action="{{ route('admin.warranties.update', $claim) }}" class="border rounded p-3 bg-light mt-3" data-service-transition-form>
                            @csrf
                            @method('PUT')
                            <label class="form-label" for="warranty-status-{{ $claim->id }}">Chuyển sang bước</label>
                            <select id="warranty-status-{{ $claim->id }}" name="status" class="form-select mb-3" data-status-select>
                                <option value="{{ $claim->workflow_status }}">Giữ trạng thái: {{ \App\Support\ServiceWorkflow::label('warranty', $claim->status) }}</option>
                                @foreach($claim->next_workflow_statuses as $status)
                                    <option value="{{ $status }}">{{ $workflowSteps[$status]['label'] ?? $status }}</option>
                                @endforeach
                            </select>

                            <div data-status-field="rejected">
                                <label class="form-label">Lý do từ chối bảo hành</label>
                                <textarea name="rejection_reason" class="form-control" rows="3" maxlength="2000" data-required-status="rejected">{{ old('rejection_reason', $claim->rejection_reason) }}</textarea>
                            </div>
                            <div class="mt-2" data-status-field="return_failed">
                                <label class="form-label">Lý do gửi trả thất bại</label>
                                <textarea name="return_failure_reason" class="form-control" rows="3" maxlength="2000" data-required-status="return_failed">{{ old('return_failure_reason', $claim->return_failure_reason) }}</textarea>
                            </div>
                            <div class="mt-2" data-status-field="shipping">
                                <label class="form-label">Mã vận đơn gửi trả khách</label>
                                <input name="shop_tracking_number" class="form-control" maxlength="100" value="{{ old('shop_tracking_number', $claim->shop_tracking_number) }}">
                            </div>
                            <div class="mt-2" data-status-field="default-note">
                                <label class="form-label">Ghi chú kỹ thuật / phương pháp xử lý</label>
                                <textarea name="technician_note" class="form-control" rows="3" maxlength="2000">{{ old('technician_note', $claim->technician_note) }}</textarea>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Phương thức gửi trả</label>
                                <input name="return_method" class="form-control" maxlength="100" value="{{ old('return_method', $claim->return_method) }}" placeholder="Đơn vị vận chuyển hoặc nhận tại cửa hàng">
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Lưu xử lý</button>
                        </form>

                        @if(!$claim->returnRequest && $claim->order)
                            <form method="POST" action="{{ route('admin.warranties.to-return', $claim) }}" class="border rounded p-3 mt-3">
                                @csrf
                                <strong class="d-block mb-2">Chuyển sang trả hàng/hoàn tiền</strong>
                                <select name="reason_id" class="form-select mb-2" required>
                                    <option value="">Chọn lý do</option>
                                    @foreach($reasons as $reason)
                                        <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                    @endforeach
                                </select>
                                <input name="reason" class="form-control mb-2" maxlength="255" placeholder="Lý do chuyển" required>
                                <button class="btn btn-outline-danger" type="submit">Tạo yêu cầu trả hàng</button>
                            </form>
                        @elseif($claim->returnRequest)
                            <p class="text-muted mt-3 mb-0">Đã liên kết yêu cầu trả hàng #{{ $claim->returnRequest->id }}.</p>
                        @endif
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div class="alert alert-info">Chưa có yêu cầu bảo hành.</div>
    @endforelse
    {{ $claims->links() }}
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
                field.hidden = !targets.includes('default-note') && !targets.includes(status);
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
