@extends('layouts.master')

@section('content')
<style>
    /* Uiverse Galaxy Quantity Stepper */
    .quantity-control {
        display: inline-flex;
        align-items: center;
        border: 1.5px solid #e2e8f0;
        border-radius: 25px;
        background: #f8fafc;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: border-color 0.2s ease;
    }
    .quantity-control:hover {
        border-color: #cbd5e1;
    }
    .quantity-control .qty-btn {
        width: 36px;
        height: 36px;
        background: #f1f5f9;
        border: none;
        font-weight: 700;
        font-size: 15px;
        color: #475569;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        user-select: none;
    }
    .quantity-control .qty-btn:hover {
        background: #d10024;
        color: #ffffff;
    }
    .quantity-control .qty-btn:active {
        transform: scale(0.9);
    }
    .quantity-control .qty-input {
        width: 48px;
        height: 36px;
        border: none;
        background: transparent;
        text-align: center;
        font-weight: 700;
        font-size: 14px;
        color: #1e293b;
        outline: none;
        -moz-appearance: textfield;
        padding: 0;
    }
    .quantity-control .qty-input::-webkit-outer-spin-button,
    .quantity-control .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Uiverse Circular Trash Button */
    .btn-remove-cart-item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50% !important;
        background: #fee2e2 !important;
        border: none !important;
        color: #dc2626 !important;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-remove-cart-item:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
        transform: scale(1.12);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }
    .btn-remove-cart-item:active {
        transform: scale(0.92);
    }

    /* Modern Table Container */
    .cart-table-wrapper {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        margin-bottom: 20px;
    }

    .cart-summary-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
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
        font-size: 20px;
        font-weight: 700;
        color: #111827;
    }

    .custom-confirm-modal p {
        margin: 0;
        color: #4b5563;
        line-height: 1.6;
        font-size: 14.5px;
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
        transition: all 0.2s ease;
    }

    .custom-confirm-btn.cancel {
        background: #f3f4f6;
        color: #374151;
    }
    .custom-confirm-btn.cancel:hover {
        background: #e5e7eb;
    }

    .custom-confirm-btn.confirm {
        background: #dc2626;
        color: #fff;
    }
    .custom-confirm-btn.confirm:hover {
        background: #b91c1c;
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

                        <div class="cart-table-wrapper">
                            <div class="table-responsive" style="margin-bottom: 0;">
                                <table class="table table-hover" style="margin-bottom: 0;">
                                    <thead style="background: #f8fafc; border-bottom: 1.5px solid #e2e8f0;">
                                        <tr>
                                            <th style="padding: 14px 18px; font-weight: 700; color: #334155;">Sản phẩm</th>
                                            <th style="padding: 14px 18px; font-weight: 700; color: #334155;">Đơn giá</th>
                                            <th style="padding: 14px 18px; font-weight: 700; color: #334155;">Số lượng</th>
                                            <th style="padding: 14px 18px; font-weight: 700; color: #334155;">Tạm tính</th>
                                            <th style="padding: 14px 18px; text-align: center;"></th>
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

                                            <tr style="border-bottom: 1px solid #f1f5f9; vertical-align: middle;">
                                                <td style="min-width: 280px; padding: 16px 18px;">
                                                    <div style="display: flex; gap: 14px; align-items: center;">
                                                        <img
                                                            src="{{ $imgSrc }}"
                                                            alt="{{ $item['name'] }}"
                                                            style="width: 72px; height: 72px; object-fit: cover; border-radius: 12px; border: 1px solid #f1f5f9; background: #fff;"
                                                            onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                                        >

                                                        <div>
                                                            <strong style="font-size: 14.5px; color: #1e293b; display: block; line-height: 1.4;">{{ $item['name'] }}</strong>

                                                            @if(!empty($item['attributes']))
                                                                <span class="badge" style="margin-top: 6px; background: #f1f5f9; color: #475569; font-weight: 600; padding: 4px 8px; border-radius: 6px;">
                                                                    {{ $item['attributes'] }}
                                                                </span>
                                                            @endif

                                                            <div style="margin-top: 4px;">
                                                                <small style="color: #94a3b8; font-family: monospace;">SKU: {{ $item['sku'] }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td style="padding: 16px 18px; vertical-align: middle;">
                                                    <strong style="color: #D10024; font-size: 15px;" class="item-price" data-price="{{ $item['price'] }}">
                                                        {{ number_format($item['price'], 0, ',', '.') }} ₫
                                                    </strong>

                                                    @if ($item['old_price'])
                                                        <br>
                                                        <del style="color: #94a3b8; font-size: 12.5px;">
                                                            {{ number_format($item['old_price'], 0, ',', '.') }} ₫
                                                        </del>
                                                    @endif
                                                </td>

                                                <td style="width: 160px; padding: 16px 18px; vertical-align: middle;">
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

                                                <td style="padding: 16px 18px; vertical-align: middle;">
                                                    <strong class="item-subtotal" data-variant-id="{{ $item['variant_id'] }}" style="font-size: 15px; color: #1e293b; font-weight: 700;">
                                                        {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫
                                                    </strong>
                                                </td>

                                                <td style="padding: 16px 18px; vertical-align: middle; text-align: center;">
                                                    <button
                                                        type="button"
                                                        class="btn-remove-cart-item"
                                                        data-variant-id="{{ $item['variant_id'] }}"
                                                        data-product-name="{{ $item['name'] }}"
                                                        title="Xóa sản phẩm"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 15px;">
                            <button type="submit" class="primary-btn">
                                <i class="fa fa-refresh"></i> Cập nhật giỏ hàng
                            </button>

                            <a href="{{ route('shop') }}" class="btn-default">
                                <i class="fa fa-arrow-left"></i> Tiếp tục mua sắm
                            </a>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="aside cart-summary-card">
                        <h3 class="aside-title" style="margin-top: 0; font-size: 18px; font-weight: 700; border-bottom: 2px solid #f1f5f9; padding-bottom: 12px;">
                            <i class="fa fa-receipt text-danger"></i> Tóm tắt đơn hàng
                        </h3>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 14.5px; color: #475569;">
                            <span>Tổng số lượng:</span>
                            <strong class="cart-total-quantity" style="color: #1e293b;">{{ $totalQuantity }} sản phẩm</strong>
                        </div>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 18px; font-size: 14.5px; color: #475569;">
                            <span>Vận chuyển:</span>
                            <span style="color: #10b981; font-weight: 600;"><i class="fa fa-truck"></i> Tính khi thanh toán</span>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: baseline; padding-top: 14px; border-top: 1.5px dashed #e2e8f0; font-size: 18px;">
                            <span style="font-weight: 700; color: #1e293b;">Tổng cộng:</span>
                            <strong class="cart-total-price" style="color: #D10024; font-size: 22px; font-weight: 800;">
                                {{ number_format($totalPrice, 0, ',', '.') }} ₫
                            </strong>
                        </div>

                        <a
                            href="{{ route('checkout.show') }}"
                            class="primary-btn"
                            style="display: flex; text-align: center; margin-top: 22px; width: 100%; justify-content: center; font-size: 15px; padding: 14px;"
                        >
                            <i class="fa fa-credit-card"></i> Tiến hành thanh toán
                        </a>

                        <div style="display: flex; gap: 8px; justify-content: center; margin-top: 18px;">
                            <a href="{{ route('vouchers.index') }}" class="btn-uiverse-ghost" style="flex: 1; font-size: 12px; padding: 8px 10px; text-align: center;">
                                <i class="fa fa-ticket text-danger"></i> Mã giảm giá
                            </a>
                            <a href="{{ route('account.profile') }}" class="btn-uiverse-ghost" style="font-size: 12px; padding: 8px 12px; text-align: center;" title="Tài khoản của tôi">
                                <i class="fa fa-user"></i> Tôi
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="uiverse-empty-box">
                        <div class="empty-icon-glow">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                        <h3>Giỏ hàng của bạn đang trống!</h3>
                        <p>Bạn chưa thêm sản phẩm nào vào giỏ hàng. Hãy khám phá ngay các siêu phẩm công nghệ chính hãng giá tốt tại Mobile Mart!</p>
                        <a href="{{ route('shop') }}" class="primary-btn">
                            <i class="fa fa-shopping-bag"></i> Khám phá sản phẩm ngay
                        </a>

                        <div class="empty-shortcuts">
                            <a href="{{ route('shop', ['group' => 'phone']) }}" class="empty-shortcut-pill">📱 Điện thoại</a>
                            <a href="{{ route('shop', ['group' => 'laptop']) }}" class="empty-shortcut-pill">💻 Laptop</a>
                            <a href="{{ route('shop', ['group' => 'tablet']) }}" class="empty-shortcut-pill">📟 Máy tính bảng</a>
                            <a href="{{ route('shop', ['group' => 'accessories']) }}" class="empty-shortcut-pill">🎧 Phụ kiện</a>
                            <a href="{{ route('vouchers.index') }}" class="empty-shortcut-pill">🎟️ Mã giảm giá</a>
                        </div>
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

    function showDeleteConfirm(productName, onConfirm) {
        const overlay = document.createElement('div');
        overlay.className = 'custom-confirm-overlay';

        const modal = document.createElement('div');
        modal.className = 'custom-confirm-modal';

        const title = document.createElement('h4');
        title.textContent = 'Xác nhận xóa';

        const message = document.createElement('p');
        message.textContent = 'Bạn có chắc chắn muốn xóa \"' + productName + '\" khỏi giỏ hàng không?';

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

    document.addEventListener('click', function(e) {
        const removeButton = e.target.closest('.btn-remove-cart-item');

        if (!removeButton) {
            return;
        }

        const variantId = removeButton.getAttribute('data-variant-id');
        const productName = removeButton.getAttribute('data-product-name') || 'sản phẩm này';

        if (!variantId) {
            return;
        }

        showDeleteConfirm(productName, function () {
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
    });

    // Bắt sự kiện gõ trực tiếp vào ô input
    qtyInputs.forEach(input => {
        input.addEventListener('change', updateCartTotals);
        input.addEventListener('input', updateCartTotals);
    });
});
</script>
@endsection
