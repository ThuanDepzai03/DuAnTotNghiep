@extends('layouts.master')

@section('content')
@php
    $thumbnail = $product->thumbnail ?? 'img/product01.png';
    $thumbnail = ltrim(str_replace('\\', '/', $thumbnail), '/');

    if (preg_match('#^https?://#', $thumbnail)) {
        $mainImage = $thumbnail;
    } else {
        $mainImage = asset($thumbnail);
    }
@endphp

<div class="section">
    <div class="container">
        <div class="row">
            {{-- Ảnh sản phẩm --}}
            <div class="col-md-5">
                <div class="product-preview">
                    <img
                        id="main-product-image"
                        src="{{ $mainImage }}"
                        alt="{{ $product->name }}"
                        style="width: 100%; max-height: 450px; object-fit: contain;"
                        onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                    >
                </div>
            </div>

            {{-- Thông tin sản phẩm --}}
            <div class="col-md-7">
                <div class="product-details">
                    <h2 class="product-name">{{ $product->name }}</h2>

                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <div class="product-price" style="margin: 20px 0;">
                        <span id="variant-price"></span>
                        <del id="variant-old-price" class="product-old-price" style="display: none;"></del>
                    </div>

                    <p id="variant-message" style="margin-bottom: 15px;">
                        Hãy chọn đầy đủ thuộc tính sản phẩm.
                    </p>

                    <p>
                        <strong>Danh mục:</strong>
                        {{ $product->category?->name ?? 'Đang cập nhật' }}
                    </p>

                    <p>
                        <strong>Thương hiệu:</strong>
                        {{ $product->brand?->name ?? 'Đang cập nhật' }}
                    </p>

                    <p>
                        <strong>Mã sản phẩm:</strong>
                        <span id="variant-sku">{{ $product->sku }}</span>
                    </p>

                    <p>
                        <strong>Tình trạng:</strong>
                        <span id="variant-stock">Chưa chọn sản phẩm</span>
                    </p>

                    <hr>

                    {{-- Thuộc tính biến thể --}}
                    @foreach ($attributeGroups as $group)
                        <div class="variant-group">
                            <h4>
                                {{ $group['name'] }}:
                                <span id="selected-attribute-{{ $group['id'] }}">
                                    Chưa chọn
                                </span>
                            </h4>

                            <div class="variant-values">
                                @foreach ($group['values'] as $value)
                                    <button
                                        type="button"
                                        class="variant-value"
                                        data-attribute-id="{{ $group['id'] }}"
                                        data-value-id="{{ $value['id'] }}"
                                        data-value-name="{{ $value['value'] }}"
                                    >
                                        {{ $value['value'] }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <form
                        id="add-to-cart-form"
                        action="{{ route('cart.add') }}"
                        method="POST"
                        style="margin-top: 25px;"
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="product_variant_id"
                            id="selected-variant-id"
                            value=""
                        >

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Số lượng
                                <div class="input-number">
                                    <input
                                        type="number"
                                        name="quantity"
                                        id="quantity"
                                        value="1"
                                        min="1"
                                        max="1"
                                    >
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>

                            <button
                                type="submit"
                                id="add-to-cart-button"
                                class="add-to-cart-btn"
                                disabled
                            >
                                <i class="fa fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </div>
                    </form>

                    <div class="product-btns" style="margin-top: 20px;">
                        <button type="button" class="add-to-wishlist">
                            <i class="fa fa-heart-o"></i>
                            Yêu thích
                        </button>

                        <button type="button" class="add-to-compare">
                            <i class="fa fa-exchange"></i>
                            So sánh
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mô tả --}}
            <div class="col-md-12" style="margin-top: 35px;">
                <div class="section-title">
                    <h3 class="title">Mô tả sản phẩm</h3>
                </div>

                <div class="product-description">
                    {!! nl2br(e($product->description ?? 'Thông tin sản phẩm đang được cập nhật.')) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .variant-group {
        margin-bottom: 18px;
    }

    .variant-group h4 {
        font-size: 15px;
        margin-bottom: 10px;
    }

    .variant-values {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .variant-value {
        background: #fff;
        border: 1px solid #d1d1d1;
        border-radius: 3px;
        padding: 8px 14px;
        cursor: pointer;
        transition: 0.2s;
    }

    .variant-value:hover,
    .variant-value.active {
        color: #d10024;
        border-color: #d10024;
    }

    .variant-value.disabled {
        opacity: 0.45;
        cursor: not-allowed;
        text-decoration: line-through;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const variants = @json($variantData);

    const selected = {};
    const buttons = document.querySelectorAll('.variant-value');

    const priceElement = document.getElementById('variant-price');
    const oldPriceElement = document.getElementById('variant-old-price');
    const stockElement = document.getElementById('variant-stock');
    const skuElement = document.getElementById('variant-sku');
    const messageElement = document.getElementById('variant-message');
    const imageElement = document.getElementById('main-product-image');

    const variantInput = document.getElementById('selected-variant-id');
    const quantityInput = document.getElementById('quantity');
    const addToCartButton = document.getElementById('add-to-cart-button');

    const attributeIds = [
        ...new Set(
            Array.from(buttons).map(button => button.dataset.attributeId)
        )
    ];

    function formatMoney(number) {
        return new Intl.NumberFormat('vi-VN').format(number) + ' ₫';
    }

    function variantMatches(variant, selectedValues) {
        return Object.entries(selectedValues).every(([attributeId, valueId]) => {
            return variant.attribute_value_ids.includes(Number(valueId));
        });
    }

    function findSelectedVariant() {
        if (Object.keys(selected).length !== attributeIds.length) {
            return null;
        }

        return variants.find(variant => variantMatches(variant, selected));
    }

    function updateAvailableOptions() {
        buttons.forEach(button => {
            const attributeId = button.dataset.attributeId;
            const valueId = Number(button.dataset.valueId);

            const candidate = {
                ...selected,
                [attributeId]: valueId,
            };

            const isAvailable = variants.some(variant => {
                return variant.stock > 0 && variantMatches(variant, candidate);
            });

            button.disabled = !isAvailable;
            button.classList.toggle('disabled', !isAvailable);
        });
    }

    function updateVariantInformation() {
        const variant = findSelectedVariant();

        if (!variant) {
            priceElement.textContent = '';
            oldPriceElement.style.display = 'none';
            stockElement.textContent = 'Chưa chọn sản phẩm';
            messageElement.textContent = 'Hãy chọn đầy đủ thuộc tính sản phẩm.';
            variantInput.value = '';
            addToCartButton.disabled = true;
            addToCartButton.setAttribute('aria-disabled', 'true');
            return;
        }

        variantInput.value = variant.id;
        skuElement.textContent = variant.sku;
        priceElement.textContent = formatMoney(variant.final_price);

        if (variant.sale_price) {
            oldPriceElement.textContent = formatMoney(variant.price);
            oldPriceElement.style.display = 'inline';
        } else {
            oldPriceElement.style.display = 'none';
        }

        quantityInput.max = variant.stock;

        if (Number(quantityInput.value) > variant.stock) {
            quantityInput.value = variant.stock;
        }

        if (variant.stock > 0) {
            stockElement.textContent = 'Còn ' + variant.stock + ' sản phẩm';
            messageElement.textContent = 'Sản phẩm đang có sẵn.';
            messageElement.style.color = 'green';
            addToCartButton.disabled = false;
            addToCartButton.removeAttribute('disabled');
            addToCartButton.setAttribute('aria-disabled', 'false');
        } else {
            stockElement.textContent = 'Hết hàng';
            messageElement.textContent = 'Sản phẩm này hiện đã hết hàng.';
            messageElement.style.color = '#d10024';
            addToCartButton.disabled = true;
            addToCartButton.setAttribute('aria-disabled', 'true');
        }

        if (variant.image) {
            imageElement.src = variant.image;
        }
    }

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            if (button.disabled) {
                return;
            }

            const attributeId = button.dataset.attributeId;
            const valueId = button.dataset.valueId;
            const valueName = button.dataset.valueName;

            selected[attributeId] = valueId;

            document
                .querySelectorAll(`[data-attribute-id="${attributeId}"]`)
                .forEach(item => item.classList.remove('active'));

            button.classList.add('active');

            const selectedText = document.getElementById(
                `selected-attribute-${attributeId}`
            );

            if (selectedText) {
                selectedText.textContent = valueName;
            }

            updateAvailableOptions();
            updateVariantInformation();
        });
    });

    updateAvailableOptions();
    updateVariantInformation();
});
</script>
@endsection
