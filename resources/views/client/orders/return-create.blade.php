@extends('layouts.master')

@section('content')
<div class="section py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div><h3 class="mb-1">Yêu cầu trả hàng #{{ $order->id }}</h3><p class="text-muted mb-0">Gửi yêu cầu cho một sản phẩm trong đơn hàng.</p></div>
            <a href="{{ route('orders.tracking.show', $order->id) }}" class="btn btn-outline-secondary">Quay lại đơn hàng</a>
        </div>

        <div class="alert alert-warning"><strong>Điều kiện trả hàng</strong><ul class="mb-0 mt-2"><li>Đơn hàng phải ở trạng thái đã hoàn tất.</li><li>Yêu cầu trong vòng 7 ngày từ ngày hoàn tất đơn.</li><li>Sản phẩm cần còn đủ phụ kiện và thông tin IMEI nếu có.</li><li>Shop sẽ kiểm tra trước khi duyệt hoàn tiền.</li></ul></div>

        @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
        <div class="card shadow-sm border-0"><div class="card-body">
            <form method="POST" action="{{ route('account.order.return.store', $order) }}">
                @csrf
                <div class="mb-3"><label class="form-label">Sản phẩm cần trả</label><select name="order_item_id" class="form-select" required>@foreach($order->items as $item)<option value="{{ $item->id }}">{{ $item->variant->product->name ?? 'Sản phẩm' }} · SL {{ $item->quantity }} · {{ number_format($item->price, 0, ',', '.') }}₫</option>@endforeach</select></div>
                <div class="mb-3"><label class="form-label">IMEI thiết bị (nếu có)</label><select name="product_imei_id" class="form-select"><option value="">Không áp dụng</option>@foreach($order->items as $item)@foreach($item->imeis as $imei)<option value="{{ $imei->id }}">{{ $imei->imei }}</option>@endforeach @endforeach</select></div>
                <div class="mb-3"><label class="form-label">Lý do trả hàng <span class="text-danger">*</span></label><input name="reason" value="{{ old('reason') }}" class="form-control" maxlength="255" required placeholder="Ví dụ: Sản phẩm lỗi, giao sai sản phẩm..."></div>
                <div class="mb-3"><label class="form-label">Mô tả thêm</label><textarea name="description" rows="4" maxlength="2000" class="form-control" placeholder="Mô tả tình trạng sản phẩm hoặc yêu cầu hoàn tiền">{{ old('description') }}</textarea></div>
                <button class="btn btn-primary" type="submit">Gửi yêu cầu trả hàng</button>
            </form>
        </div></div>
    </div>
</div>
@endsection
