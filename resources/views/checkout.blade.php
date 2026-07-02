@extends('layouts.master')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@php
$cart = session('cart', []);
$totalPrice = 0;

foreach ($cart as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
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
                        <div class="form-group"><input class="input" type="text" name="customer_name" placeholder="Họ và tên" required></div>
                        <div class="form-group"><input class="input" type="text" name="address" placeholder="Địa chỉ" required></div>
                        <div class="form-group"><input class="input" type="tel" name="phone" placeholder="Số điện thoại" required></div>
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
                                    <div>{{ $item['name'] }} x {{ $item['quantity'] }}</div>
                                    <div>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}₫</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div><strong>Tổng tiền</strong></div>
                            <div><strong class="order-total">{{ number_format($totalPrice) }}₫</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">

                        <div class="input-radio">
                            <input
                                type="radio"
                                id="payment-vnpay"
                                name="payment_method"
                                value="vnpay"
                                required
                            >
                            <label for="payment-vnpay">
                                <span></span>
                                Thanh toán VNPay
                            </label>
                        </div>

                        <div class="input-radio">
                            <input
                                type="radio"
                                id="payment-cod"
                                name="payment_method"
                                value="cod"
                            >
                            <label for="payment-cod">
                                <span></span>
                                Thanh toán khi nhận hàng
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="primary-btn order-submit" style="width:100%;">Xác nhận Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection