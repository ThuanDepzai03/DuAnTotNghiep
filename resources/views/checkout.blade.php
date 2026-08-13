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

    if ($voucher) {

        $discountValue = (float) $voucher['discount_value'];

        /*
        | Chỉ giảm %
        */
        $discountAmount =
            $totalPrice * ($discountValue / 100);


        /*
        | Giảm tối đa
        */
        if (
            !empty($voucher['max_discount']) &&
            $discountAmount > (float) $voucher['max_discount']
        ) {

            $discountAmount =
                (float) $voucher['max_discount'];
        }


        /*
        | Không vượt quá tiền hàng
        */
        if ($discountAmount > $totalPrice) {

            $discountAmount = $totalPrice;
        }


        $discountAmount = round($discountAmount);
    }


    /*
    |--------------------------------------------------------------------------
    | TỔNG CUỐI
    |--------------------------------------------------------------------------
    */

    $finalTotal =
        $totalPrice - $discountAmount;

<<<<<<< HEAD
=======
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
>>>>>>> origin/main
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

                    <div class="billing-details">
<<<<<<< HEAD

                        <div class="section-title">

                            <h3 class="title">
                                Địa chỉ giao hàng
                            </h3>

                        </div>


                        <div class="form-group">
=======
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
>>>>>>> origin/main

                            <input
                                class="input"
                                type="text"
                                name="customer_name"
                                placeholder="Họ và tên"
                                value="{{ $customerName }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <input
                                class="input"
                                type="text"
                                name="address"
                                placeholder="Địa chỉ"
                                value="{{ $customerAddress }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <input
                                class="input"
                                type="tel"
                                name="phone"
                                placeholder="Số điện thoại"
                                value="{{ $customerPhone }}"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <input
                                class="input"
                                type="email"
                                name="email"
                                placeholder="Email"
                                value="{{ old('email') }}"
                            >

                        </div>


                        <div class="form-group">

                            <textarea
                                class="input"
                                name="note"
                                rows="5"
                                placeholder="Ghi chú đơn hàng (không bắt buộc)"
                            >{{ old('note') }}</textarea>

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

                        <div class="section-title text-center">

                            <h3 class="title">
                                Đơn hàng của bạn
                            </h3>

                        </div>


                        <div class="order-summary">


                            {{-- HEADER --}}

                            <div class="order-col">

                                <div>
                                    <strong>Sản phẩm</strong>
                                </div>

                                <div>
                                    <strong>Số tiền</strong>
                                </div>

                            </div>


                            {{-- SẢN PHẨM --}}

                            <div class="order-products">

                                @foreach($cart as $item)

                                    @php

                                        $price = isset($item['price'])
                                            ? (float) $item['price']
                                            : 0;

                                        $quantity = isset($item['quantity'])
                                            ? (int) $item['quantity']
                                            : 0;

                                    @endphp

                                    <div class="order-col">

                                        <div>

                                            {{ $item['name'] ?? 'Sản phẩm' }}

                                            x {{ $quantity }}

                                        </div>

                                        <div>

                                            {{ number_format(
                                                $price * $quantity,
                                                0,
                                                ',',
                                                '.'
                                            ) }}₫

                                        </div>

                                    </div>

                                @endforeach

                            </div>



                            {{-- =================================================
                                VOUCHER
                            ================================================== --}}

                            <div
                                style="
                                    margin-top:20px;
                                    margin-bottom:20px;
                                    padding:15px;
                                    border:1px solid #ddd;
                                    border-radius:6px;
                                "
                            >

                                <h4
                                    style="
                                        font-size:17px;
                                        margin-bottom:15px;
                                    "
                                >
                                    🎟 Mã giảm giá
                                </h4>


                                {{-- VOUCHER ĐÃ ÁP DỤNG --}}

                                @if($voucher)

                                    <div
                                        style="
                                            padding:12px;
                                            border:1px solid #28a745;
                                            background:#f0fff4;
                                            border-radius:6px;
                                            margin-bottom:12px;
                                        "
                                    >

                                        <div
                                            style="
                                                display:flex;
                                                justify-content:space-between;
                                                align-items:center;
                                            "
                                        >

                                            <div>

                                                <strong
                                                    style="
                                                        color:#28a745;
                                                        font-size:16px;
                                                    "
                                                >
                                                    {{ $voucher['code'] }}
                                                </strong>

                                                <br>

                                                <small>
                                                    {{ $voucher['name'] }}
                                                </small>

                                                <br>

                                                <small>
                                                    Giảm
                                                    {{ $voucher['discount_value'] }}%
                                                </small>

                                            </div>


                                            <button
                                                type="submit"
                                                form="remove-voucher-form"
                                                class="btn btn-danger btn-sm"
                                            >
                                                Bỏ mã
                                            </button>

                                        </div>

                                    </div>

                                @endif



                                {{-- NHẬP MÃ --}}

                                <div
                                    style="
                                        display:flex;
                                        gap:8px;
                                    "
                                >

                                    <input
                                        type="text"
                                        id="voucher-code"
                                        class="input"
                                        placeholder="Nhập mã voucher"
                                        value="{{ old(
                                            'voucher_code',
                                            $voucher['code'] ?? ''
                                        ) }}"
                                        style="
                                            height:45px;
                                            flex:1;
                                        "
                                    >


                                    <button
                                        type="button"
                                        class="primary-btn"
                                        onclick="applyVoucher()"
                                        style="
                                            height:45px;
                                            white-space:nowrap;
                                        "
                                    >
                                        Áp dụng
                                    </button>

                                </div>



                                {{-- =================================================
                                    DANH SÁCH VOUCHER
                                ================================================== --}}

                                @if(isset($vouchers) && $vouchers->count() > 0)

                                    <div style="margin-top:18px;">

                                        <strong>
                                            Voucher khả dụng
                                        </strong>


                                        <div
                                            style="
                                                margin-top:10px;
                                                max-height:220px;
                                                overflow-y:auto;
                                            "
                                        >

                                            @foreach($vouchers as $item)

                                                <div
                                                    style="
                                                        display:flex;
                                                        justify-content:space-between;
                                                        align-items:center;
                                                        gap:10px;
                                                        padding:10px;
                                                        margin-bottom:8px;
                                                        border:1px dashed #ccc;
                                                        border-radius:6px;
                                                    "
                                                >

                                                    <div>

                                                        <strong>
                                                            {{ $item->code }}
                                                        </strong>

                                                        <br>

                                                        <small>
                                                            {{ $item->name }}
                                                        </small>

                                                        <br>

                                                        <small
                                                            style="
                                                                color:#dc3545;
                                                            "
                                                        >

                                                            Giảm
                                                            {{ $item->discount_value }}%

                                                            @if($item->max_discount)

                                                                - tối đa
                                                                {{ number_format(
                                                                    $item->max_discount,
                                                                    0,
                                                                    ',',
                                                                    '.'
                                                                ) }}₫

                                                            @endif

                                                        </small>

                                                    </div>


                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-primary btn-sm"
                                                        onclick="chooseVoucher('{{ $item->code }}')"
                                                    >
                                                        Chọn
                                                    </button>

                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                @else

                                    <small
                                        style="
                                            display:block;
                                            margin-top:12px;
                                            color:#888;
                                        "
                                    >
                                        Không có voucher khả dụng.
                                    </small>

                                @endif

                            </div>



                            {{-- TẠM TÍNH --}}

                            <div class="order-col">

                                <div>
                                    <strong>Tạm tính</strong>
                                </div>

                                <div>

                                    {{ number_format(
                                        $totalPrice,
                                        0,
                                        ',',
                                        '.'
                                    ) }}₫

                                </div>

                            </div>



                            {{-- GIẢM GIÁ --}}

                            @if($discountAmount > 0)

                                <div class="order-col">

                                    <div>
                                        <strong>
                                            Giảm giá Voucher
                                        </strong>
                                    </div>

                                    <div
                                        style="
                                            color:#dc3545;
                                            font-weight:bold;
                                        "
                                    >

                                        -{{ number_format(
                                            $discountAmount,
                                            0,
                                            ',',
                                            '.'
                                        ) }}₫

                                    </div>

                                </div>

                            @endif



                            {{-- TỔNG THANH TOÁN --}}

                            <div
                                class="order-col"
                                style="
                                    border-top:1px solid #ddd;
                                    padding-top:15px;
                                    margin-top:10px;
                                "
                            >

                                <div>

                                    <strong>
                                        Tổng thanh toán
                                    </strong>

                                </div>

                                <div>

                                    <strong
                                        class="order-total"
                                        style="font-size:20px;"
                                    >

                                        {{ number_format(
                                            $finalTotal,
                                            0,
                                            ',',
                                            '.'
                                        ) }}₫

                                    </strong>

                                </div>

                            </div>

                        </div>



                        {{-- =================================================
                            PHƯƠNG THỨC THANH TOÁN
                        ================================================== --}}

                        <div
                            class="payment-method"
                            style="margin-top:20px;"
                        >

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



                        {{-- ĐẶT HÀNG --}}

                        <button
                            type="submit"
                            class="primary-btn order-submit"
                            style="
                                width:100%;
                                margin-top:15px;
                            "
                        >
                            Xác nhận Đặt hàng
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

<<<<<<< HEAD


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

    <input
        type="hidden"
        name="voucher_code"
        id="voucher-code-hidden"
    >

</form>



{{-- =========================================================
    FORM BỎ VOUCHER
========================================================= --}}

<form
    id="remove-voucher-form"
    action="{{ route('checkout.removeVoucher') }}"
    method="POST"
    style="display:none;"
>

    @csrf

</form>



{{-- =========================================================
    JAVASCRIPT
========================================================= --}}

<script>

function chooseVoucher(code)
{
    const input = document.getElementById('voucher-code');

    if (input) {

        input.value = code;

        input.focus();
    }
}


function applyVoucher()
{
    const input =
        document.getElementById('voucher-code');

    const hiddenInput =
        document.getElementById('voucher-code-hidden');

    const form =
        document.getElementById('voucher-form');


    if (!input || !hiddenInput || !form) {

        alert('Không tìm thấy form voucher.');

        return;
    }


    const code =
        input.value.trim();


    if (code === '') {

        alert('Vui lòng nhập mã voucher.');

        input.focus();

        return;
    }


    hiddenInput.value = code;

    form.submit();
}

</script>

=======
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
>>>>>>> origin/main
@endsection