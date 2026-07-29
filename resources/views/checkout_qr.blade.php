@extends('layouts.master')

@section('content')
@php
$tongTien = request('amount', 0);
$maDon = request('order', 'UNKNOWN');
$bank = "MB";
$stk  = "0981962874";
$qrUrl = "https://img.vietqr.io/image/{$bank}-{$stk}-compact2.png?amount={$tongTien}&addInfo=HOADON_{$maDon}";
@endphp

<div class="container my-5 text-center">
    <h2 class="mb-3">Thanh toán qua QR </h2>
    <p>Vui lòng quét mã QR để thanh toán đơn hàng:</p>
    <h4>Mã đơn hàng: <strong>{{ $maDon }}</strong></h4>
    <h4>Số tiền cần thanh toán: <strong class="text-danger">{{ number_format($tongTien) }}₫</strong></h4>
    <img src="{{ $qrUrl }}" alt="QR Thanh Toán" class="my-4" style="width:260px;">
    <p>Sau khi thanh toán, vui lòng nhấn nút bên dưới:</p>
    <a href="{{ route('checkout.success', ['order' => $maDon]) }}" class="btn btn-success btn-lg">
        Tôi đã thanh toán
    </a>
</div>
@endsection