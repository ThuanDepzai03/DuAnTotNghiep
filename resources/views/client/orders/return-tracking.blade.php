@extends('layouts.master')

@section('content')
<div class="section py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Theo dõi trả hàng và hoàn tiền</h3>
                <p class="text-muted mb-0">Đơn hàng #{{ $order->id }}</p>
            </div>
            <a href="{{ route('orders.tracking.show', $order->id) }}" class="btn btn-outline-secondary">Chi tiết đơn hàng</a>
        </div>

        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-warning">{{ session('error') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

        @forelse($order->returnRequests as $return)
            <article class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <h5 class="mb-1">Yêu cầu #{{ $return->id }}</h5>
                        <span class="badge {{ \App\Support\ServiceWorkflow::isFailure('return', $return->status) ? 'bg-danger' : (\App\Support\ServiceWorkflow::isSuccessful('return', $return->status) ? 'bg-success' : 'bg-warning text-dark') }}">
                            {{ \App\Support\ServiceWorkflow::label('return', $return->status) }}
                        </span>
                    </div>
                    <p class="mb-1"><strong>Lý do:</strong> {{ $return->serviceReason?->name ?? $return->reason }}</p>
                    @if($return->description)<p class="text-muted">{{ $return->description }}</p>@endif

                    @if($return->refund_rejection_reason)
                        <div class="service-reason-box"><strong>Không chấp nhận hoàn tiền</strong><p class="mb-0 mt-2">{{ $return->refund_rejection_reason }}</p></div>
                    @endif
                    @if($return->return_failure_reason)
                        <div class="service-reason-box"><strong>Hoàn trả thất bại</strong><p class="mb-0 mt-2">{{ $return->return_failure_reason }}</p></div>
                    @endif

                    @include('shared.service-timeline', ['timeline' => $return->workflow_timeline])

                    @if($return->can_customer_mark_sent)
                        <form method="POST" action="{{ route('account.returns.sent', $return) }}" class="service-customer-action">
                            @csrf
                            <label for="return-tracking-{{ $return->id }}">Mã vận đơn gửi về shop (nếu có)</label>
                            <div class="d-flex gap-2">
                                <input id="return-tracking-{{ $return->id }}" name="tracking_number" class="form-control" maxlength="100">
                                <button class="btn btn-primary" type="submit">Xác nhận đã gửi trả</button>
                            </div>
                        </form>
                    @endif
                    @if($return->can_customer_confirm_received)
                        <form method="POST" action="{{ route('account.returns.confirm-received', $return) }}" class="service-customer-action">
                            @csrf
                            <button class="btn btn-primary" type="submit">Tôi đã nhận lại hàng</button>
                        </form>
                    @endif

                    @if($return->customer_return_tracking_number)
                        <p class="mt-3 mb-1"><strong>Mã vận đơn khách gửi:</strong> {{ $return->customer_return_tracking_number }}</p>
                    @endif
                    @if($return->shop_return_tracking_number)
                        <p class="mb-1"><strong>Mã vận đơn shop gửi:</strong> {{ $return->shop_return_tracking_number }}</p>
                    @endif
                    @if($return->refund_amount > 0)
                        <p class="mt-3 mb-0"><strong>Số tiền hoàn:</strong> {{ number_format($return->refund_amount, 0, ',', '.') }}₫ @if($return->refund_method) · {{ $return->refund_method }} @endif</p>
                    @endif
                    @if($return->admin_note)
                        <div class="alert alert-light mt-3 mb-0"><strong>Ghi chú từ shop:</strong> {{ $return->admin_note }}</div>
                    @endif
                    @include('shared.service-history', ['history' => $return->statusHistory, 'type' => 'return'])
                </div>
            </article>
        @empty
            <div class="alert alert-info">Đơn hàng chưa có yêu cầu trả hàng nào.</div>
        @endforelse
    </div>
</div>
@endsection
