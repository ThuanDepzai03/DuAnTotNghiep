@extends('layouts.master')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER
    |--------------------------------------------------------------------------
    */

    $customer = session('customer');


    /*
    |--------------------------------------------------------------------------
    | CART
    |--------------------------------------------------------------------------
    */

    $cartKey = ($customer && !empty($customer['id']))
        ? 'cart.' . $customer['id']
        : 'cart.guest';

    $cart = session($cartKey, []);


    /*
    |--------------------------------------------------------------------------
    | TỔNG TIỀN
    |--------------------------------------------------------------------------
    */

    $totalPrice = 0;

    foreach ($cart as $item) {

        $price = isset($item['price'])
            ? (float) $item['price']
            : 0;

        $quantity = isset($item['quantity'])
            ? (int) $item['quantity']
            : 0;

        $totalPrice += $price * $quantity;
    }


    /*
    |--------------------------------------------------------------------------
    | THÔNG TIN KHÁCH HÀNG
    |--------------------------------------------------------------------------
    */

    $customerName = old(
        'customer_name',
        $defaultCustomer['customer_name'] ?? ''
    );

    $customerAddress = old(
        'address',
        $defaultCustomer['address'] ?? ''
    );

    $customerPhone = old(
        'phone',
        $defaultCustomer['phone'] ?? ''
    );


    /*
    |--------------------------------------------------------------------------
    | VOUCHER
    |--------------------------------------------------------------------------
    */

    $voucher = session('voucher');


    /*
    |--------------------------------------------------------------------------
    | TÍNH GIẢM
    |--------------------------------------------------------------------------
    */

    $discountAmount = 0;
    $shippingFee = 30000;

    if ($voucher && (($voucher['discount_type'] ?? '') === 'free_shipping' || ($voucher['is_free_shipping'] ?? false))) {
        $shippingFee = 0;
    } else {
        $shippingFee = 30000;

        if (($customerCity ?? '') === 'Hà Nội' || ($customerCity ?? '') === 'Hồ Chí Minh' || ($customerCity ?? '') === 'Đà Nẵng') {
            $shippingFee = 35000;
        }

        if (($customerCity ?? '') === 'Bình Dương' || ($customerCity ?? '') === 'Đồng Nai' || ($customerCity ?? '') === 'Khánh Hòa') {
            $shippingFee = 40000;
        }

        if (($customerWard ?? '') !== '') {
            $shippingFee += 5000;
        }
    }

    if ($voucher) {

        $discountValue = (float) ($voucher['discount_value'] ?? 0);

        if (($voucher['discount_type'] ?? '') !== 'free_shipping' && !($voucher['is_free_shipping'] ?? false)) {
            $discountAmount = $totalPrice * ($discountValue / 100);

            if (
                !empty($voucher['max_discount']) &&
                $discountAmount > (float) $voucher['max_discount']
            ) {

                $discountAmount =
                    (float) $voucher['max_discount'];
            }

            if ($discountAmount > $totalPrice) {

                $discountAmount = $totalPrice;
            }

            $discountAmount = round($discountAmount);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | TỔNG CUỐI
    |--------------------------------------------------------------------------
    */

    $finalTotal =
        $totalPrice + $shippingFee - $discountAmount;

    $defaultCustomer = [
        'customer_name' => $customer['user'] ?? '',
        'phone' => $customer['tel'] ?? '',
        'city' => $customer['city'] ?? '',
        'ward' => $customer['ward'] ?? '',
        'address_detail' => $customer['address_detail'] ?? $customer['address'] ?? '',
    ];

    $customerName = old('customer_name', $defaultCustomer['customer_name'] ?? '');
    $customerPhone = old('phone', $defaultCustomer['phone'] ?? '');
    $customerCity = old('city', $defaultCustomer['city'] ?? '');
    $customerWard = old('ward', $defaultCustomer['ward'] ?? '');
    $customerAddressDetail = old('address_detail', $defaultCustomer['address_detail'] ?? '');
    $cityOptions = [
        'Hà Nội', 'Hải Phòng', 'Đà Nẵng', 'Hồ Chí Minh', 'Bình Dương', 'Đồng Nai', 'Khánh Hòa', 'Cần Thơ'
    ];
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


{{-- =========================================================
    THÔNG BÁO
========================================================= --}}

<div class="container">

    @if(session('error'))

        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>

    @endif


    @if(session('voucher_success'))

        <div class="alert alert-success mt-3">
            {{ session('voucher_success') }}
        </div>

    @endif


    @if(session('voucher_error'))

        <div class="alert alert-danger mt-3">
            {{ session('voucher_error') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger mt-3">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

</div>



{{-- =========================================================
    CHECKOUT
========================================================= --}}

<div class="section">

    <div class="container">

        <form
            action="{{ route('checkout.submit') }}"
            method="POST"
        >

            @csrf


            <div
                class="row"
                style="
                    display:flex;
                    flex-wrap:wrap;
                    align-items:flex-start;
                "
            >


                {{-- =================================================
                    ĐỊA CHỈ GIAO HÀNG
                ================================================== --}}

                <div
                    class="col-md-7"
                    style="padding-right:15px;"
                >

                    <div class="checkout-panel">

                        <div class="panel-header">
                            <span class="panel-step">01</span>
                            <h3 class="title">Địa chỉ giao hàng</h3>
                        </div>

                        <div class="address-form-grid">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input class="input" type="text" name="customer_name" placeholder="Họ và tên" value="{{ $customerName }}" required>
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="input" type="tel" name="phone" placeholder="Số điện thoại" value="{{ $customerPhone }}" required>
                            </div>
                        </div>

                        <div class="address-form-grid">
                            <div class="form-group">
                                <label>Tỉnh / Thành phố</label>
                                <select class="input" name="city" id="checkout-city" required>
                                    <option value="">-- Chọn Thành phố --</option>
                                    @foreach ($cityOptions as $city)
                                        <option value="{{ $city }}" {{ old('city', $customerCity) == $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Quận / Huyện</label>
                                <select class="input" name="district" id="checkout-district" required>
                                    <option value="">-- Chọn Quận/Huyện --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Phường / Xã</label>
                                <select class="input" name="ward" id="checkout-ward" required>
                                    <option value="">-- Chọn Xã/Phường --</option>
                                    @foreach (($wardOptions[$customerCity] ?? []) as $ward)
                                        <option value="{{ $ward }}" {{ old('ward', $customerWard) == $ward ? 'selected' : '' }}>{{ $ward }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ chi tiết</label>
                            <input class="input" type="text" name="address_detail" placeholder="Số nhà, tên đường, khu vực..." value="{{ $customerAddressDetail }}" required>
                        </div>

                        <div class="delivery-block">
                            <div class="panel-header compact">
                                <span class="panel-step">02</span>
                                <h4>Cách nhận hàng</h4>
                            </div>

                            <div class="choice-grid">
                                <label class="choice-card selected">
                                    <input type="radio" name="delivery_method" value="home" checked>
                                    <span class="choice-icon">🚚</span>
                                    <span>
                                        <strong>Giao tận nơi</strong>
                                        <small>Nhận hàng tại nhà</small>
                                    </span>
                                </label>

                                <label class="choice-card">
                                    <input type="radio" name="delivery_method" value="store">
                                    <span class="choice-icon">🏬</span>
                                    <span>
                                        <strong>Nhận tại cửa hàng</strong>
                                        <small>Đến lấy trực tiếp</small>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="delivery-block">
                            <div class="panel-header compact">
                                <span class="panel-step">03</span>
                                <h4>Thời gian giao hàng dự kiến</h4>
                            </div>

                            <div class="delivery-info-card" id="delivery-estimate-box">
                                <div class="delivery-info-row">
                                    <span class="delivery-badge">Dự kiến</span>
                                    <strong id="delivery-estimate-text">1 - 2 ngày làm việc</strong>
                                </div>
                                <p id="delivery-estimate-note">Tính từ lúc đơn hàng được chuyển cho đơn vị vận chuyển đến khi hàng đến tay bạn.</p>
                            </div>
                        </div>

                        <div class="payment-block">
                            <div class="panel-header compact">
                                <span class="panel-step">04</span>
                                <h4>Phương thức thanh toán</h4>
                            </div>

                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="cod" checked>
                                    <span class="payment-box">
                                        <span class="payment-logo cash">💵</span>
                                        <span>
                                            <strong>Thanh toán khi nhận hàng</strong>
                                            <small>COD</small>
                                        </span>
                                    </span>
                                </label>

                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="vnpay">
                                    <span class="payment-box">
                                        <span class="payment-logo vnpay">V</span>
                                        <span>
                                            <strong>VNPay</strong>
                                            <small>Ví điện tử</small>
                                        </span>
                                    </span>
                                </label>

                            </div>
                        </div>

                    </div>

                </div>



                {{-- =================================================
                    ĐƠN HÀNG
                ================================================== --}}

                <div
                    class="col-md-5"
                    style="padding-left:15px;"
                >

                    <div class="order-details">

                        <div class="summary-header">
                            <div>
                                <span class="summary-badge">Giỏ hàng</span>
                                <h3 class="title">Đơn hàng của bạn</h3>
                            </div>
                            <span class="cart-count">{{ count($cart) }} sản phẩm</span>
                        </div>

                        <div class="order-summary">

                            <div class="product-list">
                                @foreach($cart as $item)
                                    @php
                                        $price = isset($item['price']) ? (float) $item['price'] : 0;
                                        $quantity = isset($item['quantity']) ? (int) $item['quantity'] : 0;
                                        $image = $item['image'] ?? null;
                                    @endphp

                                    <div class="product-item checkout-product-item" data-variant-id="{{ $item['variant_id'] ?? $loop->index }}" data-price="{{ $price }}">
                                        <div class="product-thumb">
                                            @if($image)
                                                <img src="{{ asset($image) }}" alt="{{ $item['name'] ?? 'Sản phẩm' }}">
                                            @else
                                                <div class="product-thumb-placeholder">📦</div>
                                            @endif
                                        </div>

                                        <div class="product-info">
                                            <div class="product-row">
                                                <strong>{{ $item['name'] ?? 'Sản phẩm' }}</strong>
                                                <span class="checkout-item-subtotal">{{ number_format($price * $quantity, 0, ',', '.') }}₫</span>
                                            </div>

                                            <div class="checkout-item-actions">
                                                <div class="checkout-qty-control">
                                                    <button type="button" class="checkout-qty-btn" data-action="minus" data-variant-id="{{ $item['variant_id'] ?? $loop->index }}">−</button>
                                                    <input
                                                        type="number"
                                                        min="1"
                                                        max="{{ $item['stock'] ?? 99 }}"
                                                        value="{{ $quantity }}"
                                                        class="checkout-qty-input"
                                                        data-variant-id="{{ $item['variant_id'] ?? $loop->index }}"
                                                        data-stock="{{ $item['stock'] ?? 99 }}"
                                                        data-price="{{ $price }}"
                                                    >
                                                    <button type="button" class="checkout-qty-btn" data-action="plus" data-variant-id="{{ $item['variant_id'] ?? $loop->index }}">+</button>
                                                </div>

                                                <button type="button" class="checkout-remove-btn" data-variant-id="{{ $item['variant_id'] ?? $loop->index }}">Xóa</button>
                                            </div>

                                            @if(!empty($item['attributes']))
                                                <small>{{ $item['attributes'] }}</small>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="voucher-box">
                                <div class="voucher-header">
                                    <h4>🎟 Voucher giảm giá</h4>
                                </div>

                                @if($voucher)
                                    <div class="voucher-applied">
                                        <div>
                                            <strong>{{ $voucher['code'] }}</strong>
                                            <small>{{ $voucher['name'] }}</small>
                                        </div>
                                        <button type="submit" form="remove-voucher-form" class="btn btn-danger btn-sm">Bỏ mã</button>
                                    </div>
                                @endif

                                <div class="voucher-input-row">
                                    <input type="text" id="voucher-code" class="input" placeholder="Nhập mã voucher" value="{{ old('voucher_code', $voucher['code'] ?? '') }}">
                                    <button type="button" class="primary-btn" onclick="applyVoucher()">Áp dụng</button>
                                </div>

                                @if(isset($vouchers) && $vouchers->count() > 0)
                                    <div class="voucher-list">
                                        @foreach($vouchers as $item)
                                            <div class="voucher-item">
                                                <div>
                                                    <strong>{{ $item->code }}</strong>
                                                    <small>{{ $item->name }}</small>
                                                    <small class="voucher-discount">
                                                        Giảm {{ $item->discount_value }}%
                                                        @if($item->max_discount)
                                                            - tối đa {{ number_format($item->max_discount, 0, ',', '.') }}₫
                                                        @endif
                                                    </small>
                                                </div>
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="chooseVoucher('{{ $item->code }}')">Chọn</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="summary-total-box">
                                <div class="order-col">
                                    <div><strong>Tạm tính</strong></div>
                                    <div>{{ number_format($totalPrice, 0, ',', '.') }}₫</div>
                                </div>

                                <div class="order-col" id="shipping-fee-row" data-free-shipping="{{ ($voucher && (($voucher['discount_type'] ?? '') === 'free_shipping' || ($voucher['is_free_shipping'] ?? false))) ? '1' : '0' }}" data-amount="{{ $shippingFee }}">
                                    <div><strong>Phí vận chuyển</strong></div>
                                    <div id="shipping-fee-value" data-amount="{{ $shippingFee }}" style="font-weight:600;">{{ number_format($shippingFee, 0, ',', '.') }}₫</div>
                                </div>

                                @if($discountAmount > 0)
                                    <div class="order-col" id="discount-amount-row" data-amount="{{ $discountAmount }}">
                                        <div><strong>Giảm giá Voucher</strong></div>
                                        <div id="discount-amount-value" data-amount="{{ $discountAmount }}" style="color:#dc3545;font-weight:bold;">-{{ number_format($discountAmount, 0, ',', '.') }}₫</div>
                                    </div>
                                @endif

                                @if($voucher && (($voucher['discount_type'] ?? '') === 'free_shipping' || ($voucher['is_free_shipping'] ?? false)))
                                    <div class="order-col">
                                        <div><strong>Voucher miễn phí ship</strong></div>
                                        <div style="color:#28a745;font-weight:bold;">Miễn phí</div>
                                    </div>
                                @endif

                                <div class="order-col total-row">
                                    <div><strong>Tổng thanh toán</strong></div>
                                    <div class="order-total">{{ number_format($finalTotal, 0, ',', '.') }}₫</div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="primary-btn order-submit">
                            Thanh toán ngay
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>



{{-- =========================================================
    FORM ÁP DỤNG VOUCHER
========================================================= --}}

<form
    id="voucher-form"
    action="{{ route('checkout.applyVoucher') }}"
    method="POST"
    style="display:none;"
>
    @csrf
    <input type="hidden" name="voucher_code" id="voucher-code-hidden">
</form>

<form
    id="remove-voucher-form"
    action="{{ route('checkout.removeVoucher') }}"
    method="POST"
    style="display:none;"
>
    @csrf
</form>

<style>
    .checkout-layout {
        display: flex;
        gap: 30px;
        align-items: flex-start;
        padding-top: 20px;
    }

    .checkout-left {
        flex: 1.35;
    }

    .checkout-right {
        flex: 0.95;
    }

    .checkout-panel,
    .order-details {
        background: #fff;
        border: 1px solid #ececec;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 6px 24px rgba(0,0,0,0.04);
    }

    .panel-header,
    .summary-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 18px;
    }

    .panel-header.compact {
        margin-bottom: 14px;
    }

    .panel-step {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f4f7ff;
        color: #1d4ed8;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
    }

    .panel-header h3,
    .panel-header h4,
    .summary-header h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #1f2937;
    }

    .panel-header.compact h4 {
        font-size: 18px;
    }

    .address-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 16px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-size: 13px;
        color: #4b5563;
        font-weight: 600;
    }

    .input {
        width: 100%;
        height: 46px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 0 14px;
        background: #fff;
        color: #1f2937;
    }

    .delivery-block,
    .payment-block {
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #f0f0f0;
    }

    .choice-grid,
    .payment-options {
        display: grid;
        gap: 12px;
    }

    .choice-card,
    .payment-option {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 14px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .choice-card input,
    .payment-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .choice-card.selected,
    .payment-option input:checked + .payment-box {
        border-color: #1d4ed8;
        background: #eef4ff;
        box-shadow: 0 0 0 1px rgba(29, 78, 216, 0.1);
    }

    .choice-card:has(input:checked) {
        border-color: #1d4ed8;
        background: #eef4ff;
        box-shadow: 0 0 0 1px rgba(29, 78, 216, 0.1);
    }

    .delivery-info-card {
        background: linear-gradient(135deg, #f8fbff, #eef4ff);
        border: 1px solid #dfe9ff;
        border-radius: 14px;
        padding: 16px 18px;
    }

    .delivery-info-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 8px;
    }

    .delivery-badge {
        display: inline-flex;
        align-items: center;
        background: #dbeafe;
        color: #1d4ed8;
        border-radius: 999px;
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.02em;
    }

    #delivery-estimate-text {
        color: #111827;
        font-size: 18px;
    }

    #delivery-estimate-note {
        margin: 0;
        color: #4b5563;
        line-height: 1.6;
        font-size: 14px;
    }

    .choice-icon,
    .payment-logo {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-weight: 700;
        font-size: 18px;
        color: #fff;
    }

    .choice-icon {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .choice-card span strong,
    .payment-box strong {
        display: block;
        color: #111827;
        font-size: 15px;
    }

    .choice-card span small,
    .payment-box small {
        display: block;
        color: #6b7280;
    }

    .payment-options {
        grid-template-columns: 1fr;
    }

    .payment-box {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
    }

    .payment-logo {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    .payment-logo.cash { background: #10b981; }
    .payment-logo.vnpay { background: #e11d48; }

    .method-inline {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .summary-badge {
        display: inline-block;
        background: #eef2ff;
        color: #4338ca;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        padding: 6px 8px;
        margin-bottom: 6px;
    }

    .cart-count {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
    }

    .order-summary {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .product-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .product-item {
        display: flex;
        gap: 12px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #e5e7eb;
    }

    .product-thumb {
        width: 72px;
        height: 72px;
        flex-shrink: 0;
        border-radius: 12px;
        overflow: hidden;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-thumb-placeholder {
        font-size: 24px;
    }

    .product-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .product-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .checkout-item-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 8px;
    }

    .checkout-qty-control {
        display: inline-flex;
        align-items: center;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        background: #fff;
        overflow: hidden;
    }

    .checkout-qty-btn {
        width: 30px;
        height: 32px;
        border: 0;
        background: #f3f4f6;
        color: #111827;
        font-size: 20px;
        cursor: pointer;
    }

    .checkout-qty-input {
        width: 52px;
        height: 32px;
        border: 0;
        text-align: center;
        font-weight: 600;
        color: #111827;
        background: #fff;
    }

    .checkout-remove-btn {
        border: 1px solid #fecaca;
        background: #fff5f5;
        color: #b91c1c;
        border-radius: 8px;
        padding: 6px 10px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .product-info strong {
        color: #111827;
        font-size: 15px;
    }

    .product-info small {
        color: #6b7280;
        display: block;
    }

    .voucher-box,
    .summary-total-box {
        background: #f9fafb;
        border: 1px solid #edf0f5;
        border-radius: 14px;
        padding: 16px;
    }

    .voucher-header h4 {
        margin: 0 0 12px;
        font-size: 17px;
    }

    .voucher-applied {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: #f0fff4;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        margin-bottom: 12px;
    }

    .voucher-applied strong {
        display: block;
        color: #166534;
    }

    .voucher-applied small {
        color: #166534;
    }

    .voucher-input-row {
        display: flex;
        gap: 8px;
    }

    .voucher-list {
        margin-top: 14px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .voucher-item {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 10px 12px;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        background: #fff;
    }

    .voucher-item strong,
    .voucher-item small {
        display: block;
    }

    .voucher-discount {
        color: #dc2626;
    }

    .summary-total-box {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .order-col {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 4px 0;
    }

    .total-row {
        border-top: 1px solid #e5e7eb;
        margin-top: 6px;
        padding-top: 12px;
    }

    .order-total {
        font-size: 22px;
        color: #111827;
        font-weight: 800;
    }

    .order-submit {
        width: 100%;
        margin-top: 18px;
        height: 52px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
    }

    .custom-confirm-overlay {
        position: fixed;
        inset: 0;
        background: rgba(17, 24, 39, 0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .custom-confirm-modal {
        width: min(420px, calc(100vw - 32px));
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
        padding: 24px 20px 18px;
        text-align: center;
    }

    .custom-confirm-modal h4 {
        margin: 0 0 10px;
        font-size: 22px;
        color: #111827;
    }

    .custom-confirm-modal p {
        margin: 0;
        color: #4b5563;
        line-height: 1.6;
        font-size: 15px;
    }

    .custom-confirm-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 20px;
    }

    .custom-confirm-btn {
        border: none;
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 700;
        cursor: pointer;
        min-width: 110px;
    }

    .custom-confirm-btn.cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .custom-confirm-btn.confirm {
        background: #dc2626;
        color: #fff;
    }

    @media (max-width: 991px) {
        .checkout-layout {
            flex-direction: column;
        }

        .address-form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    const cityMap = @json($wardOptions);
    const citySelect = document.getElementById('checkout-city');
    const districtSelect = document.getElementById('checkout-district');
    const wardSelect = document.getElementById('checkout-ward');
    const shippingFeeValue = document.getElementById('shipping-fee-value');
    const shippingFeeRow = document.getElementById('shipping-fee-row');
    const deliveryEstimateText = document.getElementById('delivery-estimate-text');
    const deliveryEstimateNote = document.getElementById('delivery-estimate-note');
    const deliveryMethodInputs = document.querySelectorAll('input[name="delivery_method"]');
    const checkoutTotalValue = document.querySelector('.order-total');
    const cartCountText = document.querySelector('.cart-count');
    const discountAmountValue = document.getElementById('discount-amount-value');
    const ghnAddressEndpoint = '{{ route('checkout.addressOptions') }}';
    const fallbackCityOptions = @json($cityOptions);
    const fallbackWardOptions = @json($wardOptions);
    const ghnEnabled = true;

    function formatMoney(value) {
        return new Intl.NumberFormat('vi-VN').format(value) + '₫';
    }

    function recalculateCheckoutSummary() {
        let subtotal = 0;
        let quantity = 0;

        document.querySelectorAll('.checkout-product-item').forEach(function (item) {
            const input = item.querySelector('.checkout-qty-input');
            if (!input) return;

            const itemQty = Number(input.value || 0);
            const itemPrice = Number(input.dataset.price || 0);
            const lineTotal = itemQty * itemPrice;

            subtotal += lineTotal;
            quantity += itemQty;

            const subtotalText = item.querySelector('.checkout-item-subtotal');
            if (subtotalText) {
                subtotalText.textContent = formatMoney(lineTotal);
            }
        });

        if (cartCountText) {
            cartCountText.textContent = quantity + ' sản phẩm';
        }

        const firstOrderCol = document.querySelector('.summary-total-box .order-col');
        if (firstOrderCol) {
            const valueNode = firstOrderCol.lastElementChild;
            if (valueNode) {
                valueNode.textContent = formatMoney(subtotal);
            }
        }

        const shippingFeeAmount = Number(shippingFeeRow?.dataset.amount || shippingFeeValue?.dataset.amount || 0);
        const discountAmount = Number(discountAmountValue?.dataset.amount || 0);
        const finalTotal = Math.max(0, subtotal + shippingFeeAmount - discountAmount);

        if (checkoutTotalValue) {
            checkoutTotalValue.textContent = formatMoney(finalTotal);
        }

        if (shippingFeeValue) {
            shippingFeeValue.textContent = formatMoney(shippingFeeAmount);
            shippingFeeValue.dataset.amount = String(shippingFeeAmount);
        }

        if (shippingFeeRow) {
            shippingFeeRow.dataset.amount = String(shippingFeeAmount);
        }
    }

    async function updateCartQuantity(variantId, quantity) {
        const response = await fetch('{{ route('cart.update') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({
                quantities: {
                    [variantId]: quantity
                }
            })
        });

        if (!response.ok) {
            alert('Không thể cập nhật số lượng.');
            return;
        }

        const result = await response.json();
        if (result.success) {
            recalculateCheckoutSummary();
        }
    }

    async function removeCartItem(variantId) {
        const response = await fetch('{{ route('cart.remove') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({
                product_variant_id: variantId
            })
        });

        if (!response.ok) {
            alert('Không thể xóa sản phẩm.');
            return;
        }

        const result = await response.json();
        if (result.success) {
            const item = document.querySelector('.checkout-product-item[data-variant-id="' + variantId + '"]');
            if (item) {
                item.remove();
            }

            const remainingItems = document.querySelectorAll('.checkout-product-item');
            if (remainingItems.length === 0) {
                window.location.reload();
                return;
            }

            recalculateCheckoutSummary();
        }
    }

    document.addEventListener('click', function (event) {
        const button = event.target.closest('.checkout-qty-btn');
        if (!button) return;

        const variantId = button.dataset.variantId;
        const input = document.querySelector('.checkout-qty-input[data-variant-id="' + variantId + '"]');
        if (!input) return;

        let value = Number(input.value || 1);
        const stock = Number(input.dataset.stock || 99);

        if (button.dataset.action === 'minus') {
            value = Math.max(1, value - 1);
        }

        if (button.dataset.action === 'plus') {
            value = Math.min(stock, value + 1);
        }

        input.value = value;
        updateCartQuantity(variantId, value);
    });

    document.addEventListener('change', function (event) {
        const input = event.target.closest('.checkout-qty-input');
        if (!input) return;

        let value = Number(input.value || 1);
        const stock = Number(input.dataset.stock || 99);
        value = Math.min(stock, Math.max(1, value));
        input.value = value;
        updateCartQuantity(input.dataset.variantId, value);
    });

    function showDeleteConfirm(productName, onConfirm) {
        const overlay = document.createElement('div');
        overlay.className = 'custom-confirm-overlay';

        const modal = document.createElement('div');
        modal.className = 'custom-confirm-modal';

        const title = document.createElement('h4');
        title.textContent = 'Xác nhận xóa';

        const message = document.createElement('p');
        message.textContent = 'Bạn có chắc chắn muốn xóa "' + productName + '" khỏi đơn hàng không?';

        const actions = document.createElement('div');
        actions.className = 'custom-confirm-actions';

        const cancelBtn = document.createElement('button');
        cancelBtn.type = 'button';
        cancelBtn.className = 'custom-confirm-btn cancel';
        cancelBtn.textContent = 'Hủy';

        const confirmBtn = document.createElement('button');
        confirmBtn.type = 'button';
        confirmBtn.className = 'custom-confirm-btn confirm';
        confirmBtn.textContent = 'Xóa';

        cancelBtn.addEventListener('click', function () {
            overlay.remove();
        });

        confirmBtn.addEventListener('click', function () {
            overlay.remove();
            onConfirm();
        });

        actions.appendChild(cancelBtn);
        actions.appendChild(confirmBtn);
        modal.appendChild(title);
        modal.appendChild(message);
        modal.appendChild(actions);
        overlay.appendChild(modal);
        document.body.appendChild(overlay);
    }

    document.addEventListener('click', function (event) {
        const button = event.target.closest('.checkout-remove-btn');
        if (!button) return;

        const variantId = button.dataset.variantId;
        const productName = button.closest('.checkout-product-item')?.querySelector('strong')?.textContent?.trim() || 'sản phẩm này';

        showDeleteConfirm(productName, function () {
            removeCartItem(variantId);
        });
    });

    function updateDeliveryEstimate() {
        if (!deliveryEstimateText || !deliveryEstimateNote) {
            return;
        }

        const selectedMethod = document.querySelector('input[name="delivery_method"]:checked')?.value || 'home';

        if (selectedMethod === 'store') {
            deliveryEstimateText.textContent = '1 ngày làm việc';
            deliveryEstimateNote.textContent = 'Tính từ lúc đơn hàng được chuyển cho đơn vị vận chuyển đến khi bạn nhận hàng tại cửa hàng.';
            return;
        }

        deliveryEstimateText.textContent = '1 - 2 ngày làm việc';
        deliveryEstimateNote.textContent = 'Tính từ lúc đơn hàng được chuyển cho đơn vị vận chuyển đến khi hàng đến tay bạn.';
    }

    function updateShippingFee() {
        if (!shippingFeeValue) {
            return;
        }

        const isFreeShipping = shippingFeeRow && shippingFeeRow.dataset.freeShipping === '1';
        const city = citySelect ? citySelect.value : '';
        const ward = wardSelect ? wardSelect.value : '';
        let shippingFee = 30000;

        if (isFreeShipping) {
            shippingFee = 0;
        } else {
            if (city === 'Hà Nội' || city === 'Hồ Chí Minh' || city === 'Đà Nẵng') {
                shippingFee = 35000;
            }

            if (city === 'Bình Dương' || city === 'Đồng Nai' || city === 'Khánh Hòa') {
                shippingFee = 40000;
            }

            if (ward !== '') {
                shippingFee += 5000;
            }
        }

        shippingFeeValue.textContent = formatMoney(shippingFee);
        shippingFeeValue.dataset.amount = String(shippingFee);
        if (shippingFeeRow) {
            shippingFeeRow.dataset.amount = String(shippingFee);
        }
    }

    function populateSelectByValues(selectElement, items, selectedValue) {
        if (!selectElement) return;

        selectElement.innerHTML = '<option value="">-- Chọn --</option>';
        items.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.value;
            option.textContent = item.label;
            option.dataset.ghnId = item.id || '';
            if (selectedValue && item.value === selectedValue) {
                option.selected = true;
            }
            selectElement.appendChild(option);
        });
    }

    function fallbackCityWard() {
        if (!citySelect || !wardSelect || !districtSelect) return;

        const currentCity = citySelect.value || '{{ old('city', $customerCity) }}';
        const wards = cityMap[currentCity] || [];

        districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
        wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
        wards.forEach(function (ward) {
            const option = document.createElement('option');
            option.value = ward;
            option.textContent = ward;
            if ('{{ old('ward', $customerWard) }}' === ward) {
                option.selected = true;
            }
            wardSelect.appendChild(option);
        });
    }

    async function loadGhnAddressData(type, parentId = null, selectedValue = '') {
        if (!citySelect || !wardSelect || !districtSelect) return;

        if (!ghnEnabled) {
            fallbackCityWard();
            return;
        }

        const url = new URL(ghnAddressEndpoint, window.location.origin);
        url.searchParams.set('type', type);
        if (parentId !== null) {
            url.searchParams.set('parent_id', parentId);
        }

        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('GHN request failed');
            }

            const data = await response.json();
            let rawItems = data.items || [];

            if (rawItems.length === 0) {
                const publicUrl = type === 'provinces'
                    ? 'https://provinces.open-api.vn/api/?depth=1'
                    : type === 'districts'
                        ? 'https://provinces.open-api.vn/api/p/' + parentId + '?depth=2'
                        : 'https://provinces.open-api.vn/api/d/' + parentId + '?depth=2';

                const publicResponse = await fetch(publicUrl);
                if (publicResponse.ok) {
                    const publicData = await publicResponse.json();
                    rawItems = type === 'provinces'
                        ? publicData
                        : (type === 'districts' ? (publicData.districts || []) : (publicData.wards || []));
                }
            }

            const items = rawItems.map(item => ({
                value: item.value || item.label || item.name || '',
                label: item.label || item.value || item.name || '',
                id: item.id || item.code || ''
            }));

            if (type === 'provinces') {
                populateSelectByValues(citySelect, items, selectedValue || '{{ old('city', $customerCity) }}');
                const selectedCity = citySelect.value;
                const selectedOption = citySelect.selectedOptions[0];
                const provinceId = selectedOption?.dataset?.ghnId || null;

                if (provinceId) {
                    await loadGhnAddressData('districts', provinceId, '{{ old('district', '') }}');
                } else {
                    const fallbackWards = cityMap[selectedCity] || [];
                    populateSelectByValues(districtSelect, [], '');
                    populateSelectByValues(wardSelect, fallbackWards.map(function (ward) {
                        return { value: ward, label: ward };
                    }), '{{ old('ward', $customerWard) }}');
                }
                return;
            }

            if (type === 'districts') {
                populateSelectByValues(districtSelect, items, selectedValue || '');
                wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
                return;
            }

            if (type === 'wards') {
                populateSelectByValues(wardSelect, items, selectedValue || '{{ old('ward', $customerWard) }}');
            }
        } catch (error) {
            fallbackCityWard();
        }
    }

    if (citySelect && districtSelect && wardSelect) {
        citySelect.addEventListener('change', function () {
            const city = this.value;
            const wards = cityMap[city] || [];

            if (ghnEnabled) {
                const selectedOption = this.selectedOptions[0];
                const provinceId = selectedOption?.dataset?.ghnId || null;
                if (provinceId) {
                    districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
                    wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
                    loadGhnAddressData('districts', provinceId);
                } else {
                    fallbackCityWard();
                }
            } else {
                wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
                wards.forEach(function (ward) {
                    const option = document.createElement('option');
                    option.value = ward;
                    option.textContent = ward;
                    wardSelect.appendChild(option);
                });
            }

            updateShippingFee();
        });

        districtSelect.addEventListener('change', function () {
            const selectedOption = this.selectedOptions[0];
            const districtId = selectedOption?.dataset?.ghnId || null;

            if (ghnEnabled && districtId) {
                loadGhnAddressData('wards', districtId);
            } else {
                const city = citySelect.value;
                const wards = cityMap[city] || [];
                wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
                wards.forEach(function (ward) {
                    const option = document.createElement('option');
                    option.value = ward;
                    option.textContent = ward;
                    wardSelect.appendChild(option);
                });
            }

            updateShippingFee();
        });

        wardSelect.addEventListener('change', updateShippingFee);

        if (typeof window !== 'undefined' && citySelect && wardSelect) {
            const currentCity = '{{ old('city', $customerCity) }}';
            if (currentCity) {
                const currentWards = cityMap[currentCity] || [];
                if (currentWards.length > 0) {
                    wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';
                    currentWards.forEach(function (ward) {
                        const option = document.createElement('option');
                        option.value = ward;
                        option.textContent = ward;
                        if ('{{ old('ward', $customerWard) }}' === ward) {
                            option.selected = true;
                        }
                        wardSelect.appendChild(option);
                    });
                }
            }
        }
    }

    deliveryMethodInputs.forEach(function (input) {
    input.addEventListener('change', updateDeliveryEstimate);
});

if (ghnEnabled) {
    loadGhnAddressData('provinces');
}

updateShippingFee();
updateDeliveryEstimate();

    function chooseVoucher(code) {
        const input = document.getElementById('voucher-code');
        if (input) {
            input.value = code;
            input.focus();
        }
    }

    function applyVoucher() {
        const input = document.getElementById('voucher-code');
        const hiddenInput = document.getElementById('voucher-code-hidden');
        const form = document.getElementById('voucher-form');

        if (!input || !hiddenInput || !form) {
            alert('Không tìm thấy form voucher.');
            return;
        }

        const code = input.value.trim();
        if (code === '') {
            alert('Vui lòng nhập mã voucher.');
            input.focus();
            return;
        }

        hiddenInput.value = code;
        form.submit();
    }
</script>
@endsection