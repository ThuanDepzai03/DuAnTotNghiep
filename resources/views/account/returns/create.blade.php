@extends('layouts.app')
@section('content')
<div class="container py-4"><h2>Yêu cầu trả hàng #{{ $order->id }}</h2><form method="POST" action="{{ route('account.order.return.store', $order) }}">@csrf
<div class="mb-3"><label>Sản phẩm</label><select name="order_item_id" class="form-select" required>@foreach($order->items as $item)<option value="{{ $item->id }}">{{ $item->variant->product->name ?? 'Sản phẩm' }} - SL {{ $item->quantity }}</option>@endforeach</select></div>
<div class="mb-3"><label>IMEI nếu có</label><select name="product_imei_id" class="form-select"><option value="">Không áp dụng</option>@foreach($order->items as $item)@foreach($item->imeis as $imei)<option value="{{ $imei->id }}">{{ $imei->imei }}</option>@endforeach @endforeach</select></div>
<div class="mb-3"><label>Lý do</label><input name="reason" class="form-control" required></div><div class="mb-3"><label>Mô tả</label><textarea name="description" class="form-control"></textarea></div><button class="btn btn-primary">Gửi yêu cầu</button></form></div>
@endsection
