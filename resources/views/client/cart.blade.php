@extends('layouts.master')

@section('content')
<style>
    /* CSS cho bộ tăng giảm số lượng custom */
    .quantity-control {
        display: inline-flex;
        align-items: center;
        border: 1px solid #e4e6eb;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
    }
    .quantity-control .qty-btn {
        width: 32px;
        height: 32px;
        background: #f8f9fa;
        border: none;
        font-weight: bold;
        font-size: 14px;
        color: #333;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
        user-select: none;
    }
    .quantity-control .qty-btn:hover {
        background: #e9ecef;
    }
    .quantity-control .qty-input {
        width: 45px;
        height: 32px;
        border: none;
        border-left: 1px solid #e4e6eb;
        border-right: 1px solid #e4e6eb;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        outline: none;
        -moz-appearance: textfield;
        padding: 0;
    }
    .quantity-control .qty-input::-webkit-outer-spin-button,
    .quantity-control .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Giỏ hàng của bạn</h3>
                </div>
            </div>

            @if (session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if (count($cart) > 0)
                <div class="col-md-8">
                    <form action="{{ route('cart.update') }}" method="POST" id="cart-update-form">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tạm tính</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart as $item)
                                        @php
                                            $imgPath = $item['image'] ?? 'img/product01.png';

                                            if (preg_match('#^https?://#', $imgPath)) {
                                                $imgSrc = $imgPath;
                                            } else {
                                                $imgSrc = asset($imgPath);
                                            }
                                        @endphp

                                        <tr>
                                            <td style="min-width: 280px;">
                                                <div style="display: flex; gap: 12px; align-items: center;">
                                                    <img
                                                        src="{{ $imgSrc }}"
                                                        alt="{{ $item['name'] }}"
                                                        style="width: 70px; height: 70px; object-fit: cover;"
                                                        onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                                    >

                                                    <div>
                                                        <strong>{{ $item['name'] }}</strong>

                                                        <p style="margin: 5px 0 0; font-size: 12px;">
                                                            {{ $item['attributes'] }}
                                                        </p>

                                                        <small>Mã SP: {{ $item['sku'] }}</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <strong style="color: #D10024;" class="item-price" data-price="{{ $item['price'] }}">
                                                    {{ number_format($item['price'], 0, ',', '.') }} ₫
                                                </strong>

                                                @if ($item['old_price'])
                                                    <br>
                                                    <del>
                                                        {{ number_format($item['old_price'], 0, ',', '.') }} ₫
                                                    </del>
                                                @endif
                                            </td>

                                            <td style="width: 160px;">
                                                <div class="quantity-control">
                                                    <button type="button" class="qty-btn qty-minus" data-variant-id="{{ $item['variant_id'] }}">-</button>
                                                    <input
                                                        type="number"
                                                        min="1"
                                                        max="{{ $item['stock'] }}"
                                                        name="quantities[{{ $item['variant_id'] }}]"
                                                        value="{{ $item['quantity'] }}"
                                                        class="qty-input"
                                                        data-stock="{{ $item['stock'] }}"
                                                        data-variant-id="{{ $item['variant_id'] }}"
                                                        data-price="{{ $item['price'] }}"
                                                    >
                                                    <button type="button" class="qty-btn qty-plus" data-variant-id="{{ $item['variant_id'] }}">+</button>
                                                </div>
                                            </td>

                                            <td>
                                                <strong class="item-subtotal" data-variant-id="{{ $item['variant_id'] }}">
                                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫
                                                </strong>
                                            </td>

                                            <td>
                                                <button
                                                    type="button"
                                                    class="btn btn-danger btn-sm btn-remove-cart-item"
                                                    data-variant-id="{{ $item['variant_id'] }}"
                                                    onclick="return confirm('Bạn muốn xóa sản phẩm này?')"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="primary-btn">
                            <i class="fa fa-refresh"></i> Cập nhật giỏ hàng
                        </button>

                        <a href="{{ route('shop') }}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Tiếp tục mua hàng
                        </a>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="aside">
                        <h3 class="aside-title">Tổng đơn hàng</h3>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                            <span>Số lượng:</span>
                            <strong class="cart-total-quantity">{{ $totalQuantity }} sản phẩm</strong>
                        </div>

                        <div style="display: flex; justify-content: space-between; font-size: 18px;">
                            <span>Tổng tiền:</span>
                            <strong class="cart-total-price" style="color: #D10024;">
                                {{ number_format($totalPrice, 0, ',', '.') }} ₫
                            </strong>
                        </div>

                        <a
                            href="{{ route('checkout.show') }}"
                            class="primary-btn"
                            style="display: block; text-align: center; margin-top: 20px;"
                        >
                            Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        <h4>Giỏ hàng của bạn đang trống.</h4>

                        <a href="{{ route('shop') }}" class="primary-btn">
                            Đi mua sắm ngay
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const qtyInputs = document.querySelectorAll('.qty-input');
    
    // Hàm cập nhật tổng tiền & tạm tính
    function updateCartTotals() {
        let totalAmount = 0;
        let totalQuantity = 0;

        qtyInputs.forEach(input => {
            const quantity = parseInt(input.value) || 0;
            const price = parseFloat(input.getAttribute('data-price')) || 0;
            const variantId = input.getAttribute('data-variant-id');
            const stock = parseInt(input.getAttribute('data-stock')) || 999;

            const safeQuantity = Math.max(1, Math.min(quantity, stock));
            if (Number.isFinite(safeQuantity) && safeQuantity !== quantity) {
                input.value = safeQuantity;
            }

            const subtotal = price * safeQuantity;
            const subtotalElement = document.querySelector(`.item-subtotal[data-variant-id="${variantId}"]`);

            if (subtotalElement) {
                subtotalElement.textContent = new Intl.NumberFormat('vi-VN').format(Math.floor(subtotal)) + ' ₫';
            }

            totalAmount += subtotal;
            totalQuantity += safeQuantity;
        });

        const totalQuantityDisplay = document.querySelector('.cart-total-quantity');
        if (totalQuantityDisplay) {
            totalQuantityDisplay.textContent = `${totalQuantity} sản phẩm`;
        }

        const totalPriceDisplay = document.querySelector('.cart-total-price');
        if (totalPriceDisplay) {
            totalPriceDisplay.textContent = new Intl.NumberFormat('vi-VN').format(Math.floor(totalAmount)) + ' ₫';
        }
    }

    // Bắt sự kiện click nút Tăng / Giảm
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('qty-minus')) {
            const container = e.target.closest('.quantity-control');
            const input = container.querySelector('.qty-input');
            let val = parseInt(input.value) || 1;
            if (val > 1) {
                input.value = val - 1;
                updateCartTotals();
            }
        }

        if (e.target.classList.contains('qty-plus')) {
            const container = e.target.closest('.quantity-control');
            const input = container.querySelector('.qty-input');
            let val = parseInt(input.value) || 1;
            let stock = parseInt(input.getAttribute('data-stock')) || 999;
            if (val < stock) {
                input.value = val + 1;
                updateCartTotals();
            }
        }
    });

    document.addEventListener('click', function(e) {
        const removeButton = e.target.closest('.btn-remove-cart-item');

        if (!removeButton) {
            return;
        }

        const variantId = removeButton.getAttribute('data-variant-id');
        if (!variantId) {
            return;
        }

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('cart.remove') }}';

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';

        const variantInput = document.createElement('input');
        variantInput.type = 'hidden';
        variantInput.name = 'product_variant_id';
        variantInput.value = variantId;

        form.appendChild(csrfInput);
        form.appendChild(variantInput);
        document.body.appendChild(form);
        form.submit();
    });

    // Bắt sự kiện gõ trực tiếp vào ô input
    qtyInputs.forEach(input => {
        input.addEventListener('change', updateCartTotals);
        input.addEventListener('input', updateCartTotals);
    });
});
</script>
@endsection
