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

    $customerCity = old('city', $defaultCustomer['city'] ?? '');
    $customerDistrict = old('district', $defaultCustomer['district'] ?? '');
    $customerWard = old('ward', $defaultCustomer['ward'] ?? '');


    /*
    |--------------------------------------------------------------------------
    | VOUCHER
    |--------------------------------------------------------------------------
    */

    $shippingVoucher = $shippingVoucher ?? session('shipping_voucher');
    $orderVoucher = $orderVoucher ?? session('order_voucher');
    $voucher = $orderVoucher ?: $shippingVoucher;


    /*
    |--------------------------------------------------------------------------
    | TÍNH GIẢM
    |--------------------------------------------------------------------------
    */

    $discountAmount = 0;
    $shippingFee = 30000;

    if ($shippingVoucher) {
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

    if ($orderVoucher) {

        $discountValue = (float) ($orderVoucher['discount_value'] ?? 0);

        if (($orderVoucher['discount_type'] ?? '') !== 'free_shipping' && !($orderVoucher['is_free_shipping'] ?? false)) {
            $discountAmount = $totalPrice * ($discountValue / 100);

            if (
                !empty($orderVoucher['max_discount']) &&
                $discountAmount > (float) $orderVoucher['max_discount']
            ) {

                $discountAmount =
                    (float) $orderVoucher['max_discount'];
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

    $customerName = old('customer_name', $defaultCustomer['customer_name'] ?? '');
    $customerPhone = old('phone', $defaultCustomer['phone'] ?? '');
    $customerCity = old('city', $defaultCustomer['city'] ?? '');
    $customerWard = old('ward', $defaultCustomer['ward'] ?? '');
    $customerAddressDetail = old('address_detail', $defaultCustomer['address_detail'] ?? '');
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
                                    @if($customerDistrict)
                                        <option value="{{ $customerDistrict }}" selected>{{ $customerDistrict }}</option>
                                    @endif
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

                                    <div class="product-item checkout-product-item checkout-product-card" data-variant-id="{{ $item['variant_id'] ?? $loop->index }}" data-price="{{ $price }}">
                                        <div class="product-thumb checkout-product-card__image">
                                            @if($image)
                                                <img src="{{ asset($image) }}" alt="{{ $item['name'] ?? 'Sản phẩm' }}">
                                            @else
                                                <div class="product-thumb-placeholder">📦</div>
                                            @endif
                                        </div>

                                        <div class="product-info checkout-product-card__info">
                                            <div class="product-row">
                                                <strong>{{ $item['name'] ?? 'Sản phẩm' }}</strong>
                                                <span class="checkout-item-subtotal">{{ number_format($price * $quantity, 0, ',', '.') }}₫</span>
                                            </div>

                                            <div class="checkout-item-actions checkout-product-card__meta">
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
                                    <h4>1. Voucher đã áp dụng</h4>
                                </div>
                                @if($shippingVoucher || $orderVoucher)
                                    @if($shippingVoucher)
                                        <div class="voucher-applied voucher-applied--shipping">
                                            <div><strong>{{ $shippingVoucher['code'] }}</strong><small>Phí vận chuyển: {{ $shippingVoucher['name'] }}</small></div>
                                            <span class="voucher-choice">Lựa chọn hợp lý</span>
                                        </div>
                                    @endif
                                    @if($orderVoucher)
                                        <div class="voucher-applied voucher-applied--order">
                                            <div><strong>{{ $orderVoucher['code'] }}</strong><small>Đơn hàng: {{ $orderVoucher['name'] }}</small></div>
                                            <span class="voucher-choice">Lựa chọn hợp lý</span>
                                        </div>
                                    @endif
                                @else
                                    <small>Chưa có voucher nào được áp dụng.</small>
                                @endif
                            </div>

                            <div class="voucher-box">
                                <div class="voucher-header">
                                    <h4>2. Kho voucher</h4>
                                </div>
                                @forelse($availableVouchers as $availableVoucher)
                                    @php $isShippingVoucher = $availableVoucher->discount_type === 'free_shipping'; @endphp
                                    <div class="voucher-item {{ $isShippingVoucher ? 'voucher-item--shipping' : 'voucher-item--order' }} {{ ($shippingVoucher && $isShippingVoucher && $shippingVoucher['id'] == $availableVoucher->id) || ($orderVoucher && !$isShippingVoucher && $orderVoucher['id'] == $availableVoucher->id) ? 'is-applied' : '' }}">
                                        <div>
                                            <strong>{{ $availableVoucher->code }}</strong>
                                            <small>{{ $availableVoucher->name }}</small>
                                            <small>{{ $isShippingVoucher ? 'Miễn phí vận chuyển' : ($availableVoucher->discount_type === 'fixed' ? 'Giảm ' . number_format($availableVoucher->discount_value, 0, ',', '.') . '₫' : 'Giảm ' . $availableVoucher->discount_value . '%') }}</small>
                                        </div>
                                        @if(($shippingVoucher && $isShippingVoucher && $shippingVoucher['id'] == $availableVoucher->id) || ($orderVoucher && !$isShippingVoucher && $orderVoucher['id'] == $availableVoucher->id))
                                            <span class="voucher-choice">Đã áp dụng</span>
                                        @else
                                            <a href="{{ route('vouchers.claim', $availableVoucher->id) }}" class="btn btn-outline-primary btn-sm">Lấy mã</a>
                                        @endif
                                    </div>
                                @empty
                                    <small>Hiện chưa có voucher khả dụng.</small>
                                @endforelse
                            </div>

                            <div class="summary-total-box">
                                <div class="order-col">
                                    <div><strong>Tạm tính</strong></div>
                                    <div>{{ number_format($totalPrice, 0, ',', '.') }}₫</div>
                                </div>

                                <div class="order-col" id="shipping-fee-row" data-free-shipping="{{ $shippingVoucher ? '1' : '0' }}" data-amount="{{ $shippingFee }}">
                                    <div><strong>Phí vận chuyển</strong></div>
                                    <div id="shipping-fee-value" data-amount="{{ $shippingFee }}" style="font-weight:600;">{{ number_format($shippingFee, 0, ',', '.') }}₫</div>
                                </div>

                                @if($discountAmount > 0)
                                    <div class="order-col" id="discount-amount-row" data-amount="{{ $discountAmount }}">
                                        <div><strong>Giảm giá Voucher</strong></div>
                                        <div id="discount-amount-value" data-amount="{{ $discountAmount }}" style="color:#dc3545;font-weight:bold;">-{{ number_format($discountAmount, 0, ',', '.') }}₫</div>
                                    </div>
                                @endif

                                @if($shippingVoucher)
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

<form id="shipping-voucher-form" action="{{ route('checkout.applyVoucher') }}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="voucher_code" id="shipping-voucher-code-hidden">
    <input type="hidden" name="voucher_kind" value="shipping">
</form>

<form id="order-voucher-form" action="{{ route('checkout.applyVoucher') }}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="voucher_code" id="order-voucher-code-hidden">
    <input type="hidden" name="voucher_kind" value="order">
</form>

<form id="remove-shipping-voucher-form" action="{{ route('checkout.removeVoucher') }}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="voucher_kind" value="shipping">
</form>

<form id="remove-order-voucher-form" action="{{ route('checkout.removeVoucher') }}" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="voucher_kind" value="order">
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

{{-- =================================================
    DANH SÁCH VOUCHER

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
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        background: linear-gradient(90deg, rgba(255,255,255,.98), rgba(255,255,255,.72));
        align-items: center;
        margin-top: 8px;
    }

    .voucher-item--shipping {
        border-left: 4px solid #00ff00;
        background: linear-gradient(90deg, rgba(0,255,0,.14), rgba(255,255,255,.95) 76%);
    }

    .voucher-item--order {
        border-left: 4px solid #FF6633;
        background: linear-gradient(90deg, rgba(255,102,51,.16), rgba(255,255,255,.95) 76%);
    }

    .voucher-item.is-applied {
        opacity: .48;
        filter: saturate(.55);
    }

    .voucher-applied {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 11px 12px;
        margin-top: 8px;
        border-radius: 10px;
        opacity: .62;
        background: linear-gradient(90deg, rgba(255,255,255,.92), rgba(255,255,255,.3));
    }

    .voucher-applied--shipping {
        border-left: 4px solid #00ff00;
        background: linear-gradient(90deg, rgba(0,255,0,.12), rgba(255,255,255,.65) 78%);
    }

    .voucher-applied--order {
        border-left: 4px solid #FF6633;
        background: linear-gradient(90deg, rgba(255,102,51,.13), rgba(255,255,255,.65) 78%);
    }

    .voucher-applied strong,
    .voucher-applied small,
    .voucher-item strong,
    .voucher-item small {
        display: block;
    }

    .voucher-choice {
        flex-shrink: 0;
        padding: 4px 8px;
        border: 1px solid rgba(17, 24, 39, .15);
        border-radius: 999px;
        color: #374151;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
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
        gap: 0;
        margin-top: 18px;
        padding: 16px;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        background: linear-gradient(135deg, #fff, #f8fafc);
        box-shadow: 0 8px 22px rgba(15, 23, 42, .06);
    }

    .order-col {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 0;
        color: #4b5563;
        font-size: 13px;
    }

    .order-col strong {
        color: #1f2937;
    }

    .total-row {
        border-top: 1px solid #dbe3ee;
        margin-top: 6px;
        padding-top: 15px;
    }

    .order-total {
        font-size: 24px;
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

        const normalizeAddressName = function (value) {
            return String(value || '')
                .toLowerCase()
                .replace(/^(thành phố|tỉnh|quận|huyện|thị xã|phường|xã)\s+/i, '')
                .trim();
        };

        selectElement.innerHTML = '<option value="">-- Chọn --</option>';
        items.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.value;
            option.textContent = item.label;
            option.dataset.ghnId = item.id || '';
            if (selectedValue && normalizeAddressName(item.value) === normalizeAddressName(selectedValue)) {
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
                const provinceId = selectedOption?.dataset?.ghnId || await resolveProvinceId(selectedCity);

                if (provinceId) {
                    await loadGhnAddressData('districts', provinceId, '{{ $customerDistrict }}');
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

    async function resolveProvinceId(cityName) {
        const knownProvinceIds = {
            'Hà Nội': 1,
            'Hải Phòng': 31,
            'Đà Nẵng': 48,
            'Hồ Chí Minh': 79,
            'Bình Dương': 74,
            'Đồng Nai': 75,
            'Khánh Hòa': 56,
            'Cần Thơ': 92
        };

        const selectedOption = citySelect?.selectedOptions[0];
        if (selectedOption?.dataset?.ghnId) {
            return selectedOption.dataset.ghnId;
        }

        if (knownProvinceIds[cityName]) {
            return knownProvinceIds[cityName];
        }

        try {
            const response = await fetch('https://provinces.open-api.vn/api/?depth=2');
            if (!response.ok) return null;

            const provinces = await response.json();
            const province = provinces.find(item => item.name === cityName);

            return province?.code || null;
        } catch (error) {
            return null;
        }
    }

    if (citySelect && districtSelect && wardSelect) {
        citySelect.addEventListener('change', async function () {
            const city = this.value;

            districtSelect.innerHTML = '<option value="">Đang tải Quận/Huyện...</option>';
            wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';

            if (ghnEnabled) {
                const provinceId = await resolveProvinceId(city);
                if (provinceId) {
                    await loadGhnAddressData('districts', provinceId);
                    updateShippingFee();
                    return;
                }
            }

            districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
            const wards = cityMap[city] || [];
            wards.forEach(function (ward) {
                const option = document.createElement('option');
                option.value = ward;
                option.textContent = ward;
                wardSelect.appendChild(option);
            });
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
            const currentCity = '{{ $customerCity }}';
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

// Thay vì phụ thuộc API ngoài dễ bị lỗi, ta nạp trực tiếp danh sách thành phố từ dữ liệu có sẵn
if (citySelect) {
    const currentCityVal = citySelect.value || '{{ old('city', $customerCity) }}';
    
    // Đổ danh sách Tỉnh/Thành phố nếu ô đang trống
    if (citySelect.options.length <= 1) {
        citySelect.innerHTML = '<option value="">-- Chọn Thành phố --</option>';
        Object.keys(cityMap).forEach(cityName => {
            const opt = document.createElement('option');
            opt.value = cityName;
            opt.textContent = cityName;
            if (cityName === currentCityVal) {
                opt.selected = true;
            }
            citySelect.appendChild(opt);
        });
    }

    // Nếu đã có tỉnh được chọn (ví dụ: Hải Phòng), tự động load Quận/Huyện tương ứng
    if (currentCityVal && cityMap[currentCityVal]) {
        const districts = Object.keys(cityMap[currentCityVal]);
        districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
        districts.forEach(distName => {
            const opt = document.createElement('option');
            opt.value = distName;
            opt.textContent = distName;
            if (distName === '{{ old('district', $customerDistrict) }}') {
                opt.selected = true;
            }
            districtSelect.appendChild(opt);
        });
    }
}

// Lắng nghe sự kiện thay đổi Tỉnh/Thành phố
if (citySelect) {
    citySelect.addEventListener('change', function() {
        const selectedCity = this.value;
        districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
        wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';

        if (selectedCity && cityMap[selectedCity]) {
            const districts = Object.keys(cityMap[selectedCity]);
            districts.forEach(distName => {
                const opt = document.createElement('option');
                opt.value = distName;
                opt.textContent = distName;
                districtSelect.appendChild(opt);
            });
        }
        updateShippingFee();
    });
}

// Lắng nghe sự kiện thay đổi Quận/Huyện để load Xã/Phường tương ứng
if (districtSelect) {
    districtSelect.addEventListener('change', function() {
        const selectedCity = citySelect.value;
        const selectedDistrict = this.value;
        wardSelect.innerHTML = '<option value="">-- Chọn Xã/Phường --</option>';

        if (selectedCity && selectedDistrict && cityMap[selectedCity][selectedDistrict]) {
            const wards = cityMap[selectedCity][selectedDistrict];
            wards.forEach(wardName => {
                const opt = document.createElement('option');
                opt.value = wardName;
                opt.textContent = wardName;
                wardSelect.appendChild(opt);
            });
        }
        updateShippingFee();
    });
}

updateShippingFee();
updateDeliveryEstimate();

    function chooseVoucher(code, kind = 'order') {
        const input = document.getElementById(kind + '-voucher-code');
        if (input) {
            input.value = code;
            input.focus();
        }
    }

    function applyVoucher(kind) {
        const input = document.getElementById(kind + '-voucher-code');
        const hiddenInput = document.getElementById(kind + '-voucher-code-hidden');
        const form = document.getElementById(kind + '-voucher-form');

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


{{-- =========================================================
    CSS VOUCHER
========================================================= --}}

<style>

.voucher-list-wrapper {
    margin-top: 18px;
}

.voucher-list-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #333;
}

.voucher-count {
    min-width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e31837;
    color: white;
    border-radius: 50%;
    font-size: 12px;
}

.voucher-list {
    max-height: 250px;
    overflow-y: auto;
    padding-right: 5px;
}

.voucher-list::-webkit-scrollbar {
    width: 6px;
}

.voucher-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.voucher-list::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 10px;
}

.voucher-list::-webkit-scrollbar-thumb:hover {
    background: #999;
}

.voucher-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    margin-bottom: 10px;
    border: 1px dashed #ccc;
    border-radius: 8px;
    background: #fff;
    transition: all 0.2s ease;
}

.voucher-item:hover {
    border-color: #e31837;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    transform: translateY(-1px);
}

.voucher-left {
    flex-shrink: 0;
}

.voucher-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff0f2;
    color: #e31837;
    border-radius: 50%;
    font-size: 20px;
    font-weight: 700;
}

.voucher-content {
    flex: 1;
    min-width: 0;
}

.voucher-code {
    font-size: 15px;
    font-weight: 700;
    color: #222;
    margin-bottom: 2px;
}

.voucher-name {
    font-size: 13px;
    color: #777;
    margin-bottom: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.voucher-discount {
    font-size: 13px;
    color: #e31837;
    font-weight: 600;
}

.voucher-discount span {
    color: #777;
    font-weight: 400;
}

.voucher-action {
    flex-shrink: 0;
}

.voucher-select-btn {
    border: none;
    background: #e31837;
    color: #fff;
    padding: 8px 16px;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.voucher-select-btn:hover {
    background: #c8102e;
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(227, 24, 55, 0.25);
}

.voucher-select-btn:active {
    transform: scale(0.96);
}

.voucher-empty {
    margin-top: 15px;
    padding: 14px;
    text-align: center;
    background: #f8f8f8;
    border-radius: 6px;
    color: #888;
    font-size: 13px;
}

@media (max-width: 576px) {

    .voucher-item {
        gap: 8px;
        padding: 10px;
    }

    .voucher-icon {
        width: 36px;
        height: 36px;
        font-size: 17px;
    }

    .voucher-select-btn {
        padding: 7px 11px;
        font-size: 12px;
    }

}

</style>

@endsection