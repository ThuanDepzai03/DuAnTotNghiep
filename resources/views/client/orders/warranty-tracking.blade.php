@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 820px">
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
        <div>
            <h2>Theo dõi bảo hành #{{ $warrantyClaim->id }}</h2>
            <p class="text-muted mb-0">{{ $warrantyClaim->imei?->variant?->product?->name ?? 'Thiết bị' }} · IMEI {{ $warrantyClaim->imei?->imei }}</p>
        </div>
        <span class="badge {{ in_array($warrantyClaim->status, ['rejected', 'return_failed']) ? 'bg-danger' : ($warrantyClaim->status === 'completed' ? 'bg-success' : 'bg-warning text-dark') }}">
            {{ \App\Support\ServiceWorkflow::label('warranty', $warrantyClaim->status) }}
        </span>
    </div>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    <section class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <p><strong>Lý do:</strong> {{ $warrantyClaim->reason?->name ?? 'Bảo hành' }}</p>
            <p class="mb-0"><strong>Mô tả lỗi:</strong> {{ $warrantyClaim->issue_description }}</p>
            @if($warrantyClaim->rejection_reason)
                <div class="service-reason-box"><strong><i class="fa fa-times-circle"></i> Từ chối bảo hành</strong><p class="mb-0 mt-2">{{ $warrantyClaim->rejection_reason }}</p></div>
            @endif
            @if($warrantyClaim->return_failure_reason)
                <div class="service-reason-box"><strong><i class="fa fa-exclamation-triangle"></i> Gửi trả thất bại</strong><p class="mb-0 mt-2">{{ $warrantyClaim->return_failure_reason }}</p></div>
            @endif

            @include('shared.service-timeline', ['timeline' => $timeline])

            @if($canCustomerMarkSent)
                <form method="POST" action="{{ route('account.warranties.sent', $warrantyClaim) }}" class="service-customer-action">
                    @csrf
                    <label for="warranty-tracking">Mã vận đơn gửi thiết bị (nếu có)</label>
                    <div class="d-flex gap-2">
                        <input id="warranty-tracking" name="tracking_number" class="form-control" maxlength="100">
                        <button class="btn btn-primary" type="submit">Xác nhận đã gửi bảo hành</button>
                    </div>
                </form>
            @endif
            @if($canCustomerConfirmReceived)
                <form method="POST" action="{{ route('account.warranties.confirm-received', $warrantyClaim) }}" class="service-customer-action">
                    @csrf
                    <button class="btn btn-primary" type="submit">Tôi đã nhận lại thiết bị</button>
                </form>
            @endif

            @if($warrantyClaim->customer_tracking_number)<p class="mt-3 mb-1"><strong>Mã vận đơn khách gửi:</strong> {{ $warrantyClaim->customer_tracking_number }}</p>@endif
            @if($warrantyClaim->shop_tracking_number)<p class="mb-1"><strong>Mã vận đơn shop gửi:</strong> {{ $warrantyClaim->shop_tracking_number }}</p>@endif
            @if($warrantyClaim->technician_note)<div class="alert alert-light mt-3 mb-0"><strong>Ghi chú kỹ thuật:</strong> {{ $warrantyClaim->technician_note }}</div>@endif
            @include('shared.service-history', ['history' => $warrantyClaim->statusHistory, 'type' => 'warranty'])
        </div>
    </section>
</div>
@endsection