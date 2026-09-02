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
                        <form action="{{ route('wishlist.toggle') }}" method="POST" style="display: inline-block;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="add-to-wishlist">
                                <i class="fa fa-heart-o"></i>
                                Yêu thích
                            </button>
                        </form>

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

            @php
    $reviews = $product->reviews;
    $reviewCount = $reviews->count();

    $averageRating = $reviewCount > 0
        ? round($reviews->avg('rating'), 1)
        : 0;

    $ratingCounts = [];

    for ($star = 5; $star >= 1; $star--) {
        $ratingCounts[$star] = $reviews
            ->where('rating', $star)
            ->count();
    }
@endphp

<div class="col-md-12 product-review-section">

    <div class="review-wrapper">

        <h2 class="review-main-title">
            Đánh giá và bình luận
        </h2>

        {{-- THỐNG KÊ ĐÁNH GIÁ --}}
        <div class="review-summary">

            {{-- BÊN TRÁI --}}
            <div class="review-score-box">

                <div class="review-average">
                    {{ $averageRating }}
                </div>

                <div class="review-count">
                    {{ $reviewCount }} lượt đánh giá
                </div>

                <div class="review-stars-big">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($averageRating))
                            <i class="fa fa-star"></i>
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
                    @endfor
                </div>

                <button
                    type="button"
                    class="review-product-btn"
                    onclick="document.getElementById('review-comment').focus()"
                >
                    Đánh giá sản phẩm
                </button>

            </div>


            {{-- BÊN PHẢI --}}
            <div class="review-rating-bars">

                @for($star = 5; $star >= 1; $star--)

                    @php
                        $count = $ratingCounts[$star];
                        $percentage = $reviewCount > 0
                            ? ($count / $reviewCount) * 100
                            : 0;
                    @endphp

                    <div class="rating-bar-row">

                        <div class="rating-label">
                            {{ $star }}
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="rating-progress">

                            <div
                                class="rating-progress-fill"
                                style="width: {{ $percentage }}%;"
                            ></div>

                        </div>

                        <div class="rating-number">
                            {{ $count }}
                        </div>

                    </div>

                @endfor

            </div>

        </div>


        {{-- THÔNG BÁO --}}
        @if(session('success'))
            <div class="alert alert-success review-alert">
                {{ session('success') }}
            </div>
        @endif


        {{-- FORM ĐÁNH GIÁ --}}
        <form
            action="{{ route('product.review.store', $product->id) }}"
            method="POST"
            class="review-form"
        >

            @csrf

            <div class="review-form-top">

                <div class="review-rating-select">

                    <label for="review-rating">
                        Đánh giá của bạn
                    </label>

                    <select
                        id="review-rating"
                        name="rating"
                        required
                    >

                        @for($rating = 5; $rating >= 1; $rating--)
                            <option value="{{ $rating }}">
                                {{ $rating }} sao
                            </option>
                        @endfor

                    </select>

                </div>

            </div>


            <div class="review-input-row">

                <div class="review-textarea-box">

                    <textarea
                        id="review-comment"
                        name="comment"
                        maxlength="2000"
                        required
                        placeholder="Nhập nội dung bình luận..."
                    >{{ old('comment') }}</textarea>

                    <span class="review-character-count">
                        <span id="comment-count">0</span>/2000
                    </span>

                </div>


                <button
                    type="submit"
                    class="review-submit-btn"
                >
                    Gửi bình luận
                </button>

            </div>

        </form>


        {{-- TAB --}}
        <div class="review-tabs">

            <button
                type="button"
                class="review-tab active"
                data-filter="all"
            >
                Tất cả
                <span>{{ $reviewCount }}</span>
            </button>


            <button
                type="button"
                class="review-tab"
                data-filter="rating"
            >
                Đánh giá
                <span>{{ $reviewCount }}</span>
            </button>


            <button
                type="button"
                class="review-tab"
                data-filter="comment"
            >
                Bình luận
                <span>{{ $reviewCount }}</span>
            </button>

        </div>


        {{-- BỘ LỌC SAO --}}
        <div class="review-filters">

            <button
                type="button"
                class="review-filter active"
                data-star="all"
            >
                Tất cả
            </button>


            @for($star = 5; $star >= 1; $star--)

                <button
                    type="button"
                    class="review-filter"
                    data-star="{{ $star }}"
                >
                    {{ $star }}
                    <i class="fa fa-star-o"></i>
                </button>

            @endfor

        </div>


        {{-- DANH SÁCH ĐÁNH GIÁ --}}
        <div class="review-list">

            @forelse($reviews as $review)

                <div
                    class="review-item"
                    data-rating="{{ $review->rating }}"
                >

                    <div class="review-avatar">

                        {{ strtoupper(substr($review->customer_name ?? 'K', 0, 1)) }}

                    </div>


                    <div class="review-content">

                        <div class="review-user-row">

                            <strong>
                                {{ $review->customer_name }}
                            </strong>


                            <div class="review-stars">

                                @for($i = 1; $i <= 5; $i++)

                                    @if($i <= $review->rating)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif

                                @endfor

                            </div>

                        </div>


                        <div class="review-comment-text">
                            {{ $review->comment }}
                        </div>

                    </div>

                </div>

            @empty

                <div class="review-empty">

                    <i class="fa fa-comment-o"></i>

                    <p>
                        Chưa có đánh giá nào cho sản phẩm này.
                    </p>

                    <span>
                        Hãy là người đầu tiên đánh giá sản phẩm.
                    </span>

                </div>

            @endforelse

        </div>

    </div>

</div>

            @if(!empty($recentProducts) && $recentProducts->count())
                <div class="col-md-12" style="margin-top: 35px;">
                    <div class="section-title">
                        <h3 class="title">Sản phẩm đã xem</h3>
                    </div>

                    <div class="row">
                        @foreach($recentProducts as $recentProduct)
                            @php
                                $recentActiveVariants = $recentProduct->variants->where('status', 1)->sortBy(fn($variant) => $variant->sale_price ?? $variant->price)->values();
                                $recentVariant = $recentActiveVariants->first();
                                $recentPrice = $recentVariant ? ($recentVariant->sale_price ?? $recentVariant->price) : 0;
                                $recentImg = $recentProduct->thumbnail ?? 'img/product01.png';
                                $recentImg = ltrim(str_replace('\\', '/', $recentImg), '/');
                                $recentImgSrc = preg_match('#^https?://#', $recentImg) ? $recentImg : asset($recentImg);
                            @endphp

                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="product-img">
                                        <a href="{{ route('product.detail', ['id' => $recentProduct->id]) }}">
                                            <img src="{{ $recentImgSrc }}" alt="{{ $recentProduct->name }}" style="width:100%; height:220px; object-fit:cover;">
                                        </a>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $recentProduct->category?->name ?? 'Sản phẩm' }}</p>
                                        <h3 class="product-name"><a href="{{ route('product.detail', ['id' => $recentProduct->id]) }}">{{ $recentProduct->name }}</a></h3>
                                        <h4 class="product-price">{{ number_format($recentPrice, 0, ',', '.') }} ₫</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
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
    /* =========================================
   PRODUCT REVIEW - AE PHOENIC STORE
========================================= */

.product-review-section {
    margin-top: 45px;
}

.review-wrapper {
    background: #fff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
}

.review-main-title {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #1f2937;
}


/* ================= SUMMARY ================= */

.review-summary {
    display: flex;
    gap: 60px;
    align-items: center;
    padding-bottom: 30px;
    border-bottom: 1px solid #eeeeee;
}

.review-score-box {
    width: 250px;
    text-align: center;
}

.review-average {
    font-size: 58px;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
}

.review-count {
    margin-top: 10px;
    color: #6b7280;
    font-size: 15px;
}

.review-stars-big {
    margin-top: 10px;
    color: #f5b301;
    font-size: 24px;
    letter-spacing: 3px;
}

.review-product-btn {
    width: 100%;
    margin-top: 20px;
    border: none;
    border-radius: 30px;
    padding: 13px 20px;
    background: #e52b2b;
    color: white;
    font-size: 17px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
}

.review-product-btn:hover {
    background: #c91f1f;
    transform: translateY(-2px);
}


/* ================= RATING BAR ================= */

.review-rating-bars {
    flex: 1;
    max-width: 800px;
}

.rating-bar-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
}

.rating-label {
    width: 40px;
    font-size: 15px;
    color: #4b5563;
}

.rating-label i {
    color: #f5b301;
}

.rating-progress {
    flex: 1;
    height: 15px;
    background: #e5e7eb;
    border-radius: 20px;
    overflow: hidden;
}

.rating-progress-fill {
    height: 100%;
    background: #e52b2b;
    border-radius: 20px;
    transition: width 0.4s ease;
}

.rating-number {
    width: 30px;
    color: #6b7280;
}


/* ================= FORM ================= */

.review-form {
    margin-top: 30px;
    background: #f8fafc;
    padding: 15px;
    border-radius: 16px;
}

.review-form-top {
    margin-bottom: 12px;
}

.review-rating-select {
    display: flex;
    align-items: center;
    gap: 12px;
}

.review-rating-select label {
    margin: 0;
    font-weight: 600;
    color: #374151;
}

.review-rating-select select {
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 8px 12px;
    outline: none;
}

.review-input-row {
    display: flex;
    gap: 12px;
    align-items: stretch;
}

.review-textarea-box {
    flex: 1;
    position: relative;
}

.review-textarea-box textarea {
    width: 100%;
    height: 75px;
    resize: none;
    border: 1px solid #d1d5db;
    border-radius: 12px;
    padding: 15px 70px 15px 15px;
    font-size: 16px;
    outline: none;
}

.review-textarea-box textarea:focus {
    border-color: #e52b2b;
}

.review-character-count {
    position: absolute;
    right: 15px;
    bottom: 12px;
    color: #9ca3af;
    font-size: 13px;
}

.review-submit-btn {
    border: none;
    border-radius: 30px;
    padding: 0 28px;
    background: #182230;
    color: white;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
}

.review-submit-btn:hover {
    background: #000;
}


/* ================= TABS ================= */

.review-tabs {
    display: flex;
    gap: 35px;
    border-bottom: 1px solid #e5e7eb;
    margin-top: 30px;
}

.review-tab {
    position: relative;
    padding: 15px 5px;
    border: none;
    background: transparent;
    color: #6b7280;
    font-size: 17px;
    font-weight: 600;
    cursor: pointer;
}

.review-tab.active {
    color: #d92323;
}

.review-tab.active::after {
    content: "";
    position: absolute;
    height: 3px;
    background: #d92323;
    left: 0;
    right: 0;
    bottom: -1px;
    border-radius: 10px;
}

.review-tab span {
    display: inline-block;
    margin-left: 5px;
    padding: 2px 8px;
    border-radius: 20px;
    background: #9ca3af;
    color: white;
    font-size: 13px;
}

.review-tab.active span {
    background: #d92323;
}


/* ================= FILTER ================= */

.review-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 18px 0;
    border-bottom: 1px solid #e5e7eb;
}

.review-filter {
    padding: 8px 20px;
    border-radius: 25px;
    border: 1px solid #d1d5db;
    background: white;
    color: #374151;
    cursor: pointer;
    transition: 0.2s;
}

.review-filter:hover,
.review-filter.active {
    border-color: #e52b2b;
    color: #e52b2b;
    background: #fff5f5;
}


/* ================= REVIEW ITEM ================= */

.review-list {
    margin-top: 10px;
}

.review-item {
    display: flex;
    gap: 15px;
    padding: 22px 0;
    border-bottom: 1px solid #eeeeee;
}

.review-avatar {
    width: 45px;
    height: 45px;
    min-width: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e5e7eb;
    color: #4b5563;
    font-size: 18px;
    font-weight: 600;
}

.review-content {
    flex: 1;
}

.review-user-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.review-stars {
    color: #f5b301;
}

.review-comment-text {
    margin-top: 10px;
    color: #4b5563;
    line-height: 1.6;
}

.review-empty {
    padding: 50px 20px;
    text-align: center;
    color: #9ca3af;
}

.review-empty i {
    font-size: 45px;
}

.review-empty p {
    margin: 15px 0 5px;
    color: #4b5563;
    font-size: 18px;
}


/* ================= MOBILE ================= */

@media (max-width: 768px) {

    .review-wrapper {
        padding: 20px;
    }

    .review-main-title {
        font-size: 24px;
    }

    .review-summary {
        flex-direction: column;
        gap: 25px;
    }

    .review-score-box {
        width: 100%;
    }

    .review-input-row {
        flex-direction: column;
    }

    .review-submit-btn {
        padding: 14px;
    }

    .review-tabs {
        gap: 15px;
        overflow-x: auto;
    }

    .review-user-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
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
document.addEventListener('DOMContentLoaded', function () {

    // Code JavaScript cũ của bạn ở đây

});
</script>


<!-- THÊM CODE BƯỚC 3 Ở ĐÂY -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const reviewFilters = document.querySelectorAll('.review-filter');
    const reviewItems = document.querySelectorAll('.review-item');

    reviewFilters.forEach(function (filter) {

        filter.addEventListener('click', function () {

            reviewFilters.forEach(function (item) {
                item.classList.remove('active');
            });

            filter.classList.add('active');

            const selectedStar = filter.dataset.star;

            reviewItems.forEach(function (review) {

                if (
                    selectedStar === 'all' ||
                    review.dataset.rating === selectedStar
                ) {
                    review.style.display = 'flex';
                } else {
                    review.style.display = 'none';
                }

            });

        });

    });


    const comment = document.getElementById('review-comment');
    const commentCount = document.getElementById('comment-count');

    if (comment && commentCount) {

        commentCount.textContent = comment.value.length;

        comment.addEventListener('input', function () {
            commentCount.textContent = comment.value.length;
        });

    }


    const reviewTabs = document.querySelectorAll('.review-tab');

    reviewTabs.forEach(function (tab) {

        tab.addEventListener('click', function () {

            reviewTabs.forEach(function (item) {
                item.classList.remove('active');
            });

            tab.classList.add('active');

        });

    });

});
</script>
@endsection
<!-- ádsdaas -->