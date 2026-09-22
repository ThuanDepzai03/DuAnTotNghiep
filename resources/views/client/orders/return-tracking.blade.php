@extends('layouts.master')

@section('content')
<div class="section py-4"><div class="container">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4"><div><h3 class="mb-1">Theo dõi trả hàng và hoàn tiền</h3><p class="text-muted mb-0">Đơn hàng #{{ $order->id }}</p></div><a href="{{ route('orders.tracking.show', $order->id) }}" class="btn btn-outline-secondary">Chi tiết đơn hàng</a></div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @forelse($order->returnRequests as $return)
        @php $labels = ['pending' => 'Đã gửi', 'approved' => 'Đã duyệt', 'rejected' => 'Từ chối', 'received' => 'Đã nhận hàng', 'refunded' => 'Đã hoàn tiền', 'completed' => 'Hoàn tất']; @endphp
        <div class="card border-0 shadow-sm mb-3"><div class="card-body">
            <div class="d-flex justify-content-between flex-wrap gap-2"><h5 class="mb-1">Yêu cầu #{{ $return->id }}</h5><span class="badge {{ in_array($return->status, ['rejected']) ? 'bg-danger' : (in_array($return->status, ['refunded','completed']) ? 'bg-success' : 'bg-warning text-dark') }}">{{ $labels[$return->status] ?? $return->status }}</span></div>
            <p class="mb-1"><strong>Lý do:</strong> {{ $return->reason }}</p><p class="text-muted">{{ $return->description }}</p>
            <div class="row g-2 mt-3">@foreach(['pending','approved','received','refunded','completed'] as $status)<div class="col-6 col-md"><div class="border rounded p-2 text-center small {{ $return->status === $status || (array_search($return->status, ['pending','approved','received','refunded','completed']) !== false && array_search($status, ['pending','approved','received','refunded','completed']) <= array_search($return->status, ['pending','approved','received','refunded','completed'])) ? 'border-success text-success' : 'text-muted' }}">{{ $labels[$status] }}</div></div>@endforeach</div>
            @if($return->refund_amount > 0)<p class="mt-3 mb-0"><strong>Số tiền hoàn:</strong> {{ number_format($return->refund_amount, 0, ',', '.') }}₫ @if($return->refund_method) · {{ $return->refund_method }} @endif</p>@endif
            @if($return->admin_note)<div class="alert alert-light mt-3 mb-0"><strong>Ghi chú từ shop:</strong> {{ $return->admin_note }}</div>@endif
        </div></div>
    @empty
        <div class="alert alert-info">Đơn hàng chưa có yêu cầu trả hàng nào.</div>
    @endforelse
</div></div>
@endsection
