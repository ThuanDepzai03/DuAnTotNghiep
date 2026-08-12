@extends('layouts.master')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@php
$customer = session('customer');
$cartKey = $customer && !empty($customer['id']) ? 'cart.' . $customer['id'] : 'cart.guest';
$cart = session($cartKey, []);
$totalPrice = 0;

foreach ($cart as $item) {
    $price = isset($item['price']) ? (float) $item['price'] : 0;
    $quantity = isset($item['quantity']) ? (int) $item['quantity'] : 0;
    $totalPrice += $price * $quantity;
}

$customerName = old('customer_name', $defaultCustomer['customer_name'] ?? '');
$customerPhone = old('phone', $defaultCustomer['phone'] ?? '');
$customerCity = old('city', $defaultCustomer['city'] ?? '');
$customerWard = old('ward', $defaultCustomer['ward'] ?? '');
$customerAddressDetail = old('address_detail', $defaultCustomer['address_detail'] ?? '');
$cityOptions = ['Hà Nội', 'Hải Phòng', 'Đà Nẵng', 'Hồ Chí Minh', 'Bình Dương', 'Đồng Nai', 'Khánh Hòa', 'Cần Thơ'];
$wardOptions = [
    'Hà Nội' => ['Phường Cống Vị', 'Phường Đội Cấn', 'Phường Liễu Giai', 'Phường Kim Liên', 'Phường Thanh Xuân Trung'],
    'Hải Phòng' => ['Phường Máy Chai', 'Phường Hạ Long', 'Phường Lê Chân', 'Phường Tràng Cát', 'Phường Đồng Hoà'],
    'Đà Nẵng' => ['Phường Hòa Cường Bắc', 'Phường Thanh Khê Đông', 'Phường Hải Châu I', 'Phường Nam Dương', 'Phường An Khê'],
    'Hồ Chí Minh' => ['Phường Bến Nghé', 'Phường Tân Bình', 'Phường 7', 'Phường Phú Nhuận', 'Phường Thủ Đức'],
    'Bình Dương' => ['Phường Thủ Dầu Một', 'Phường Chánh Nghĩa', 'Phường Hiệp An', 'Phường Bình Chuẩn', 'Phường Phú Hòa'],
    'Đồng Nai' => ['Phường Tân Biên', 'Phường Long Bình', 'Phường Trảng Dài', 'Phường Long Tân', 'Phường Xuân Hòa'],
    'Khánh Hòa' => ['Phường Lộc Thọ', 'Phường Vĩnh Hải', 'Phường Ngọc Hiển', 'Phường Xuân Hà', 'Phường Nha Trang'],
    'Cần Thơ' => ['Phường Cái Khế', 'Phường Bãi H L', 'Phường Tân An', 'Phường Ninh Kiều', 'Phường Hưng Lợi'],
];
@endphp

<div class="section">
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout.submit') }}" method="POST" class="col-md-12" style="display:flex; gap:30px;">
                @csrf
                <div class="col-md-7">
                    <div class="billing-details">
                        <div class="section-title"><h3 class="title">Địa chỉ giao hàng</h3></div>
                        <div class="form-group"><input class="input" type="text" name="customer_name" placeholder="Họ và tên" value="{{ $customerName }}" required></div>
                        <div class="form-group"><input class="input" type="tel" name="phone" placeholder="Số điện thoại" value="{{ $customerPhone }}" required></div>

                        <div class="form-group">
                            <select class="input" name="city" id="checkout-city" required>
                                <option value="">-- Chọn Thành phố --</option>
                                @foreach ($cityOptions as $city)
                                    <option value="{{ $city }}" {{ old('city', $customerCity) == $city ? 'selected' : '' }}>{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="input" name="ward" id="checkout-ward" required>
                                <option value="">-- Chọn Xã/Phường --</option>
                                @foreach (($wardOptions[$customerCity] ?? []) as $ward)
                                    <option value="{{ $ward }}" {{ old('ward', $customerWard) == $ward ? 'selected' : '' }}>{{ $ward }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="input" type="text" name="address_detail" placeholder="Địa chỉ chi tiết (Số nhà, tên đường...)" value="{{ $customerAddressDetail }}" required>
                        </div>
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
                                @php
                                    $price = isset($item['price']) ? (float) $item['price'] : 0;
                                    $quantity = isset($item['quantity']) ? (int) $item['quantity'] : 0;
                                @endphp
                                <div class="order-col">
                                    <div>{{ $item['name'] ?? 'Sản phẩm' }} x {{ $quantity }}</div>
                                    <div>{{ number_format($price * $quantity, 0, ',', '.') }}₫</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div><strong>Tổng tiền</strong></div>
                            <div><strong class="order-total">{{ number_format($totalPrice) }}₫</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="form-group" style="margin-bottom:15px;">
                            <label for="voucher-code" style="display:block; font-weight:600; margin-bottom:8px;">Mã giảm giá</label>
                            <div style="display:flex; gap:8px;">
                                <input class="input" type="text" id="voucher-code" name="voucher_code" placeholder="Nhập mã voucher" value="{{ old('voucher_code') }}">
                            </div>
                        </div>

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

<script>
    const cityMap = @json($wardOptions);
    const citySelect = document.getElementById('checkout-city');
    const wardSelect = document.getElementById('checkout-ward');

    if (citySelect && wardSelect) {
        citySelect.addEventListener('change', function () {
            const city = this.value;
            const wards = cityMap[city] || [];

            wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
            wards.forEach(function (ward) {
                const option = document.createElement('option');
                option.value = ward;
                option.textContent = ward;
                wardSelect.appendChild(option);
            });
        });
    }
</script>
@endsection