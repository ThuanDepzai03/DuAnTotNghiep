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

                    <div class="billing-details">

                        <div class="section-title">
                            <h3 class="title">Địa chỉ giao hàng</h3>
                        </div>

                        <div class="form-group">
                            <input class="input" type="text" name="customer_name" placeholder="Họ và tên" value="{{ $customerName }}" required>
                        </div>

                        <div class="form-group">
                            <input class="input" type="tel" name="phone" placeholder="Số điện thoại" value="{{ $customerPhone }}" required>
                        </div>

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
================================================= --}}

@if(isset($vouchers) && $vouchers->count() > 0)

    <div class="voucher-list-wrapper">

        <div class="voucher-list-title">
            <span>🎟 Voucher khả dụng</span>
            <span class="voucher-count">
                {{ $vouchers->count() }}
            </span>
        </div>

        <div class="voucher-list">

            @foreach($vouchers as $item)

                <div class="voucher-item">

                    {{-- ICON --}}
                    <div class="voucher-left">
                        <div class="voucher-icon">
                            %
                        </div>
                    </div>

                    {{-- THÔNG TIN --}}
                    <div class="voucher-content">

                        <div class="voucher-code">
                            {{ $item->code }}
                        </div>

                        <div class="voucher-name">
                            {{ $item->name }}
                        </div>

                        <div class="voucher-discount">

                            Giảm {{ $item->discount_value }}%

                            @if($item->max_discount)

                                <span>
                                    · Tối đa
                                    {{ number_format(
                                        $item->max_discount,
                                        0,
                                        ',',
                                        '.'
                                    ) }}₫
                                </span>

                            @endif

                        </div>

                    </div>

                    {{-- NÚT CHỌN --}}
                    <div class="voucher-action">

                        <button
                            type="button"
                            class="voucher-select-btn"
                            onclick="chooseVoucher('{{ $item->code }}')"
                        >
                            Chọn
                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

@else

    <div class="voucher-empty">
        🎟 Hiện chưa có voucher khả dụng.
    </div>

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

<script>
    const cityMap = @json($wardOptions);
    const citySelect = document.getElementById('checkout-city');
    const wardSelect = document.getElementById('checkout-ward');

    if (citySelect && wardSelect) {
        citySelect.addEventListener('change', function () {
            const city = this.value;
            const wards = cityMap[city] || [];

            wardSelect.innerHTML =
                '<option value="">-- Chọn Xã/Phường --</option>';

            wards.forEach(function (ward) {
                const option = document.createElement('option');
                option.value = ward;
                option.textContent = ward;
                wardSelect.appendChild(option);
            });
        });
    }

    function chooseVoucher(code) {
        const input = document.getElementById('voucher-code');

        if (input) {
            input.value = code;
            input.focus();
        }
    }

    function applyVoucher() {
        const input = document.getElementById('voucher-code');
        const hiddenInput =
            document.getElementById('voucher-code-hidden');
        const form =
            document.getElementById('voucher-form');

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