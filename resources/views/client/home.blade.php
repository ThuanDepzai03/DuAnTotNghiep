@extends('layouts.master')

@section('content')

{{-- Banner động trang chủ --}}
<section class="home-hero">
    <div class="container">
        <div class="hero-slider" id="homeHeroSlider" aria-label="Banner khuyến mãi">

            {{-- Slide 1: Apple --}}
            <article class="hero-slide hero-slide--apple is-active">
                <div class="hero-slide-content">
                    <span class="hero-eyebrow">
                        <i class="fa fa-bolt"></i>
                        AE PHOENIC STORE
                    </span>

                    <h1>CÔNG NGHỆ CHÍNH HÃNG<br>GIÁ TỐT MỖI NGÀY</h1>

                    <p>
                        Khám phá iPhone, máy tính bảng và phụ kiện công nghệ
                        phù hợp với nhu cầu của bạn.
                    </p>

                    <div class="hero-benefits">
                        <span><i class="fa fa-check"></i> Sản phẩm chính hãng</span>
                        <span><i class="fa fa-check"></i> Bảo hành rõ ràng</span>
                    </div>

                    <a href="{{ route('shop') }}" class="hero-shop-btn">
                        Khám phá cửa hàng
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>

                <div class="hero-visual hero-visual--apple">
                    <div class="hero-circle hero-circle-one"></div>
                    <div class="hero-circle hero-circle-two"></div>

                    <img
                        src="{{ asset('image/iphone17promax_blue.jpg') }}"
                        alt="iPhone 17 Pro Max"
                        class="hero-device hero-device-main"
                    >

                    <img
                        src="{{ asset('image/iphone15_pink.jpg') }}"
                        alt="iPhone 15"
                        class="hero-device hero-device-sub"
                    >

                    <div class="hero-product-note">
                        <span>MỚI VỀ</span>
                        <strong>iPhone 17 Pro Max</strong>
                    </div>
                </div>
            </article>

            {{-- Slide 2: Samsung --}}
            <article class="hero-slide hero-slide--samsung">
                <div class="hero-slide-content">
                    <span class="hero-eyebrow">
                        <i class="fa fa-star"></i>
                        ƯU ĐÃI SAMSUNG
                    </span>

                    <h1>GALAXY CAO CẤP<br>ƯU ĐÃI ĐẾN 2 TRIỆU</h1>

                    <p>
                        Lựa chọn Galaxy S, Z Fold hoặc Z Flip với hiệu năng mạnh mẽ,
                        thiết kế hiện đại và nhiều phiên bản dung lượng.
                    </p>

                    <div class="hero-benefits">
                        <span><i class="fa fa-check"></i> Nhiều lựa chọn màu sắc</span>
                        <span><i class="fa fa-check"></i> Trả góp linh hoạt</span>
                    </div>

                    <a href="{{ route('shop') }}" class="hero-shop-btn">
                        Xem sản phẩm Samsung
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>

                <div class="hero-visual hero-visual--samsung">
                    <div class="hero-circle hero-circle-one"></div>
                    <div class="hero-circle hero-circle-two"></div>

                    <img
                        src="{{ asset('image/samsung_s24_ultra_gray.jpg') }}"
                        alt="Samsung Galaxy S24 Ultra"
                        class="hero-device hero-device-main"
                    >

                    <img
                        src="{{ asset('image/samsung_zfold5_blue.jpg') }}"
                        alt="Samsung Galaxy Z Fold5"
                        class="hero-device hero-device-sub"
                    >

                    <div class="hero-product-note">
                        <span>ƯU ĐÃI HOT</span>
                        <strong>Galaxy S24 Ultra</strong>
                    </div>
                </div>
            </article>

            {{-- Slide 3: Tablet --}}
            <article class="hero-slide hero-slide--tablet">
                <div class="hero-slide-content">
                    <span class="hero-eyebrow">
                        <i class="fa fa-graduation-cap"></i>
                        HỌC TẬP &amp; LÀM VIỆC
                    </span>

                    <h1>TABLET CHO<br>HỌC TẬP HIỆU QUẢ</h1>

                    <p>
                        iPad và Samsung Galaxy Tab là lựa chọn tiện lợi để ghi chú,
                        học online, xem phim và làm việc mọi lúc.
                    </p>

                    <div class="hero-benefits">
                        <span><i class="fa fa-check"></i> Màn hình lớn sắc nét</span>
                        <span><i class="fa fa-check"></i> Giá tốt cho sinh viên</span>
                    </div>

                    <a href="{{ route('shop') }}" class="hero-shop-btn">
                        Khám phá tablet
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>

                <div class="hero-visual hero-visual--tablet">
                    <div class="hero-circle hero-circle-one"></div>
                    <div class="hero-circle hero-circle-two"></div>

                    <img
                        src="{{ asset('image/ipad10_blue.jpg') }}"
                        alt="iPad 10"
                        class="hero-device hero-device-main"
                    >

                    <img
                        src="{{ asset('image/samsung_tab_s9_beige.jpg') }}"
                        alt="Samsung Galaxy Tab S9"
                        class="hero-device hero-device-sub"
                    >

                    <div class="hero-product-note">
                        <span>HỌC TẬP</span>
                        <strong>iPad 10 WiFi</strong>
                    </div>
                </div>
            </article>

            <button type="button" class="hero-arrow hero-arrow-prev" aria-label="Banner trước">
                <i class="fa fa-angle-left"></i>
            </button>

            <button type="button" class="hero-arrow hero-arrow-next" aria-label="Banner tiếp theo">
                <i class="fa fa-angle-right"></i>
            </button>

            <div class="hero-dots" aria-label="Chọn banner">
                <button type="button" class="hero-dot is-active" aria-label="Banner 1"></button>
                <button type="button" class="hero-dot" aria-label="Banner 2"></button>
                <button type="button" class="hero-dot" aria-label="Banner 3"></button>
            </div>
        </div>
    </div>
</section>

<div class="section home-products">
    <div class="container">

        {{-- Tiêu đề + menu danh mục --}}
        <div class="row">
            <div class="col-md-12">
                <div class="section-title custom-section-title">
                    <h3 class="title">SẢN PHẨM MỚI</h3>

                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav custom-tab-nav">
                            <li class="{{ !request('category_id') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">Tất cả</a>
                            </li>

                            @foreach ($categories as $category)
                                <li class="{{ (string) request('category_id') === (string) $category->id ? 'active' : '' }}">
                                    <a href="{{ route('home', ['category_id' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Danh sách sản phẩm --}}
        <div class="row product-grid">
            @forelse ($products as $product)
                @php
                    $activeVariants = $product->variants
                        ->where('status', 1)
                        ->sortBy(function ($variant) {
                            return $variant->sale_price ?? $variant->price;
                        })
                        ->values();

                    $cheapestVariant = $activeVariants->first();

                    $displayPrice = $cheapestVariant
                        ? ($cheapestVariant->sale_price ?? $cheapestVariant->price)
                        : 0;

                    $oldPrice = $cheapestVariant && $cheapestVariant->sale_price
                        ? $cheapestVariant->price
                        : null;

                    $imgPath = $product->thumbnail ?? 'img/product01.png';
                    $imgPath = ltrim(str_replace('\\', '/', $imgPath), '/');

                    if (preg_match('#^https?://#', $imgPath)) {
                        $imgSrc = $imgPath;
                    } elseif (str_starts_with($imgPath, 'public/')) {
                        $imgSrc = asset(substr($imgPath, 7));
                    } elseif (
                        str_starts_with($imgPath, 'img/') ||
                        str_starts_with($imgPath, 'image/') ||
                        str_starts_with($imgPath, 'admin/') ||
                        str_starts_with($imgPath, 'storage/')
                    ) {
                        $imgSrc = asset($imgPath);
                    } else {
                        $imgSrc = asset('image/' . $imgPath);
                    }
                @endphp

                <div class="col-md-3 col-sm-6 product-column">
                    <div class="product">

                        <div class="product-img">
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                <img
                                    src="{{ $imgSrc }}"
                                    alt="{{ $product->name }}"
                                    onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                >
                            </a>

                            <div class="product-label">
                                <span class="new">MỚI</span>
                            </div>
                        </div>

                        <div class="product-body">
                            <p class="product-category">
                                {{ $product->category?->name ?? 'Danh mục' }}
                            </p>

                            <h3 class="product-name">
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>

                            <h4 class="product-price">
                                {{ number_format($displayPrice, 0, ',', '.') }} ₫

                                @if ($oldPrice)
                                    <del class="product-old-price">
                                        {{ number_format($oldPrice, 0, ',', '.') }} ₫
                                    </del>
                                @endif
                            </h4>

                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            <div class="product-btns">
                                <button type="button" class="add-to-wishlist">
                                    <i class="fa fa-heart-o"></i>
                                </button>

                                <button type="button" class="add-to-compare">
                                    <i class="fa fa-exchange"></i>
                                </button>

                                <a
                                    href="{{ route('product.detail', ['id' => $product->id]) }}"
                                    class="quick-view"
                                >
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="add-to-cart">
                            @if ($cheapestVariant && $cheapestVariant->stock > 0)
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf

                                    <input
                                        type="hidden"
                                        name="product_variant_id"
                                        value="{{ $cheapestVariant->id }}"
                                    >

                                    <button type="submit" class="add-to-cart-btn">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ
                                    </button>
                                </form>
                            @else
                                <a
                                    href="{{ route('product.detail', ['id' => $product->id]) }}"
                                    class="add-to-cart-btn"
                                >
                                    <i class="fa fa-eye"></i>
                                    Xem chi tiết
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <p>Hiện chưa có sản phẩm nào.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>

    /* ===== Banner động trang chủ ===== */
    .home-hero {
        padding: 28px 0 0;
        background: #fff;
    }

    .hero-slider {
        position: relative;
        min-height: 340px;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 14px 32px rgba(43, 45, 66, 0.16);
    }

    .hero-slide {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        overflow: hidden;
        padding: 45px 55px;
        opacity: 0;
        pointer-events: none;
        transform: translateX(36px);
        transition: opacity 0.55s ease, transform 0.55s ease;
    }

    .hero-slide.is-active {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }

    .hero-slide--apple {
        background: linear-gradient(135deg, #15161d 0%, #2b2d42 100%);
    }

    .hero-slide--samsung {
        background: linear-gradient(135deg, #092448 0%, #165a88 100%);
    }

    .hero-slide--tablet {
        background: linear-gradient(135deg, #37194e 0%, #6b3b87 100%);
    }

    .hero-slide::before {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        top: -225px;
        left: 37%;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .hero-slide-content {
        position: relative;
        z-index: 2;
        max-width: 570px;
    }

    .hero-eyebrow {
        display: inline-block;
        margin-bottom: 14px;
        color: #ffb7c2;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1.2px;
    }

    .hero-eyebrow i {
        color: #d10024;
        margin-right: 6px;
    }

    .hero-slide-content h1 {
        margin: 0 0 15px;
        color: #fff;
        font-size: 37px;
        font-weight: 800;
        line-height: 1.25;
    }

    .hero-slide-content p {
        max-width: 500px;
        margin: 0;
        color: #e3e6eb;
        font-size: 16px;
        line-height: 1.75;
    }

    .hero-benefits {
        display: flex;
        flex-wrap: wrap;
        gap: 10px 20px;
        margin: 22px 0 27px;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
    }

    .hero-benefits i {
        color: #ff526b;
        margin-right: 5px;
    }

    .hero-shop-btn {
        display: inline-block;
        padding: 13px 22px;
        border-radius: 4px;
        background: #d10024;
        color: #fff !important;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .hero-shop-btn:hover {
        color: #fff !important;
        background: #ef233c;
        text-decoration: none;
        transform: translateY(-2px);
    }

    .hero-shop-btn i {
        margin-left: 8px;
    }

    .hero-visual {
        position: absolute;
        top: 0;
        right: 0;
        width: 43%;
        height: 100%;
        overflow: hidden;
    }

    .hero-visual--apple {
        background: linear-gradient(135deg, #f7f7f7 0%, #e3e7ef 100%);
    }

    .hero-visual--samsung {
        background: linear-gradient(135deg, #e7f4ff 0%, #c8e7fa 100%);
    }

    .hero-visual--tablet {
        background: linear-gradient(135deg, #f6eaff 0%, #e7cdf7 100%);
    }

    .hero-visual::before {
        content: "";
        position: absolute;
        top: 0;
        left: -70px;
        width: 140px;
        height: 100%;
        background: inherit;
        filter: brightness(0.46);
        clip-path: polygon(0 0, 100% 0, 20% 100%, 0 100%);
    }

    .hero-circle {
        position: absolute;
        border-radius: 50%;
    }

    .hero-circle-one {
        width: 250px;
        height: 250px;
        top: -120px;
        right: -60px;
        background: rgba(209, 0, 36, 0.18);
    }

    .hero-circle-two {
        width: 180px;
        height: 180px;
        bottom: -85px;
        left: 30px;
        background: rgba(43, 45, 66, 0.13);
    }

    .hero-device {
        position: absolute;
        z-index: 2;
        object-fit: contain;
        mix-blend-mode: multiply;
        filter: drop-shadow(0 12px 12px rgba(43, 45, 66, 0.2));
    }

    .hero-device-main {
        right: 35px;
        bottom: 10px;
        width: 250px;
        height: 285px;
        transform: rotate(-4deg);
    }

    .hero-device-sub {
        left: 54px;
        bottom: 31px;
        width: 185px;
        height: 215px;
        opacity: 0.86;
        transform: rotate(8deg);
    }

    .hero-product-note {
        position: absolute;
        z-index: 3;
        right: 30px;
        top: 27px;
        padding: 10px 13px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 8px 18px rgba(43, 45, 66, 0.12);
    }

    .hero-product-note span {
        display: block;
        color: #d10024;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.8px;
    }

    .hero-product-note strong {
        display: block;
        margin-top: 3px;
        color: #2b2d42;
        font-size: 12px;
    }

    .hero-arrow {
        position: absolute;
        z-index: 5;
        top: 50%;
        width: 38px;
        height: 38px;
        border: 0;
        border-radius: 50%;
        color: #2b2d42;
        background: rgba(255, 255, 255, 0.92);
        font-size: 24px;
        line-height: 38px;
        opacity: 0;
        transform: translateY(-50%);
        transition: 0.2s ease;
    }

    .hero-slider:hover .hero-arrow {
        opacity: 1;
    }

    .hero-arrow:hover {
        color: #fff;
        background: #d10024;
    }

    .hero-arrow-prev {
        left: 18px;
    }

    .hero-arrow-next {
        right: 18px;
    }

    .hero-dots {
        position: absolute;
        z-index: 6;
        left: 55px;
        bottom: 22px;
        display: flex;
        gap: 8px;
    }

    .hero-dot {
        width: 9px;
        height: 9px;
        padding: 0;
        border: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.42);
        transition: 0.2s ease;
    }

    .hero-dot.is-active {
        width: 28px;
        border-radius: 10px;
        background: #d10024;
    }

    /* ===== Tiêu đề + menu danh mục ===== */
    .home-products .custom-section-title {
        display: block;
        margin-bottom: 30px;
        border-bottom: none;
    }

    .home-products .custom-section-title .title {
        margin: 0 0 18px;
        font-size: 30px;
        line-height: 1.2;
    }

    .home-products .custom-section-title .section-nav {
        position: static !important;
        float: none !important;
        width: 100%;
        margin: 0 !important;
    }

    .home-products .custom-tab-nav {
        display: flex !important;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        gap: 10px 22px;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .home-products .custom-tab-nav li {
        margin: 0 !important;
        padding: 0;
    }

    .home-products .custom-tab-nav li a {
        display: inline-block;
        padding: 7px 0;
        color: #8d99ae;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        border-bottom: 2px solid transparent;
        transition: 0.2s ease;
    }

    .home-products .custom-tab-nav li a::after {
        display: none !important;
    }

    .home-products .custom-tab-nav li.active a,
    .home-products .custom-tab-nav li a:hover {
        color: #d10024;
        border-bottom-color: #d10024;
    }

    /* ===== Grid sản phẩm ===== */
    .product-grid {
        display: flex;
        flex-wrap: wrap;
    }

    .product-grid .product-column {
        display: flex;
        margin-bottom: 30px;
    }

    .product-grid .product {
        width: 100%;
        min-height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #e7e7e7;
        background: #fff;
    }

    .product-grid .product-img {
        height: 260px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
        overflow: hidden;
    }

    .product-grid .product-img img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .product-grid .product-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
        padding: 12px 15px 16px;
    }

    .product-grid .product-category {
        min-height: 20px;
        margin: 0 0 8px;
    }

    .product-grid .product-name {
        min-height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 0 10px;
    }

    .product-grid .product-price {
        min-height: 28px;
        margin: 0 0 12px;
    }

    .product-grid .product-rating {
        margin-top: auto;
        padding-top: 10px;
    }

    .product-grid .product-btns {
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid #eeeeee;
    }

    .product-grid .quick-view {
        display: inline-block;
        margin-left: 12px;
        color: inherit;
    }

    .product-grid .add-to-cart {
        position: static;
        transform: none;
        padding: 0 15px 15px;
        margin-top: auto;
        background: transparent;
    }

    .product-grid .product:hover .add-to-cart {
        transform: none;
    }

    .product-grid .add-to-cart form {
        margin: 0;
    }

    .product-grid .add-to-cart-btn {
        display: block;
        width: 100%;
        border: none;
        text-align: center;
    }

    @media (max-width: 767px) {
        .home-products .custom-section-title .title {
            font-size: 26px;
        }

        .home-products .custom-tab-nav {
            gap: 8px 15px;
        }

        .home-products .custom-tab-nav li a {
            font-size: 14px;
        }

        .product-grid .product-img {
            height: 220px;
        }
    }


    @media (max-width: 991px) {
        .hero-slide {
            padding: 38px 34px;
        }

        .hero-slide-content {
            max-width: 52%;
        }

        .hero-slide-content h1 {
            font-size: 31px;
        }

        .hero-visual {
            width: 47%;
        }

        .hero-device-main {
            right: 18px;
            width: 220px;
        }

        .hero-device-sub {
            left: 30px;
            width: 155px;
        }

        .hero-dots {
            left: 34px;
        }
    }

    @media (max-width: 767px) {
        .home-hero {
            padding-top: 18px;
        }

        .hero-slider {
            min-height: 445px;
            border-radius: 8px;
        }

        .hero-slide {
            display: block;
            padding: 30px 24px;
        }

        .hero-slide::before {
            left: auto;
            right: -240px;
        }

        .hero-slide-content {
            max-width: 100%;
        }

        .hero-slide-content h1 {
            font-size: 26px;
        }

        .hero-slide-content p {
            font-size: 14px;
        }

        .hero-benefits {
            margin: 17px 0 20px;
            font-size: 12px;
        }

        .hero-visual {
            top: auto;
            bottom: 0;
            width: 100%;
            height: 190px;
        }

        .hero-visual::before {
            top: -38px;
            left: 0;
            width: 100%;
            height: 75px;
            clip-path: polygon(0 0, 100% 55%, 100% 100%, 0 100%);
        }

        .hero-device-main {
            right: 28px;
            bottom: 2px;
            width: 160px;
            height: 185px;
        }

        .hero-device-sub {
            left: 35px;
            bottom: 15px;
            width: 120px;
            height: 145px;
        }

        .hero-product-note {
            top: 18px;
            right: 18px;
        }

        .hero-arrow {
            display: none;
        }

        .hero-dots {
            left: 24px;
            bottom: 205px;
        }
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.getElementById('homeHeroSlider');

        if (!slider) {
            return;
        }

        const slides = Array.from(slider.querySelectorAll('.hero-slide'));
        const dots = Array.from(slider.querySelectorAll('.hero-dot'));
        const prevButton = slider.querySelector('.hero-arrow-prev');
        const nextButton = slider.querySelector('.hero-arrow-next');
        let currentIndex = 0;
        let autoPlay;

        function showSlide(index) {
            currentIndex = (index + slides.length) % slides.length;

            slides.forEach(function (slide, slideIndex) {
                slide.classList.toggle('is-active', slideIndex === currentIndex);
            });

            dots.forEach(function (dot, dotIndex) {
                dot.classList.toggle('is-active', dotIndex === currentIndex);
            });
        }

        function startAutoPlay() {
            stopAutoPlay();
            autoPlay = setInterval(function () {
                showSlide(currentIndex + 1);
            }, 4500);
        }

        function stopAutoPlay() {
            if (autoPlay) {
                clearInterval(autoPlay);
            }
        }

        prevButton.addEventListener('click', function () {
            showSlide(currentIndex - 1);
            startAutoPlay();
        });

        nextButton.addEventListener('click', function () {
            showSlide(currentIndex + 1);
            startAutoPlay();
        });

        dots.forEach(function (dot, index) {
            dot.addEventListener('click', function () {
                showSlide(index);
                startAutoPlay();
            });
        });

        slider.addEventListener('mouseenter', stopAutoPlay);
        slider.addEventListener('mouseleave', startAutoPlay);

        startAutoPlay();
    });
</script>
@endsection
