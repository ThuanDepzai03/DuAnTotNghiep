@extends('layouts.master')

@section('content')
@php 
$cart = session('cart', []);
$tongTien = 0;
foreach ($cart as $item) {
    $tongTien += $item['price'] * $item['soLuong'];
}
@endphp

<div class="section">
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout.submit') }}" method="POST" class="col-md-12" style="display:flex; gap:30px;">
                @csrf
                <div class="col-md-7">
                    <div class="billing-details">
                        <div class="section-title"><h3 class="title">Địa chỉ giao hàng</h3></div>
                        <div class="form-group"><input class="input" type="text" name="ten" placeholder="Họ và tên" required></div>
                        <div class="form-group"><input class="input" type="text" name="diachi" placeholder="Địa chỉ" required></div>
                        <div class="form-group"><input class="input" type="tel" name="sdt" placeholder="Số điện thoại" required></div>
                    </div>
                </div>

                <div class="col-md-5 order-details">
                    <div class="section-title text-center"><h3 class="title">Đơn hàng của bạn</h3></div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>Sản phẩm</strong></div>
                            <div><strong>Số tiền</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach($cart as $item)
                                <div class="order-col">
                                    <div>{{ $item['name'] }} x {{ $item['soLuong'] }}</div>
                                    <div>{{ number_format($item['price'] * $item['soLuong']) }}₫</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div><strong>Tổng tiền</strong></div>
                            <div><strong class="order-total">{{ number_format($tongTien) }}₫</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="pttt" value="1" id="payment-1" required>
                            <label for="payment-1"><span></span>Thanh toán online (Momo/QR)</label>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="pttt" value="0" id="payment-2">
                            <label for="payment-2"><span></span>Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                    <button type="submit" class="primary-btn order-submit" style="width:100%;">Xác nhận Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection