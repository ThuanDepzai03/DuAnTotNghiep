@extends('layouts.master')

@section('content')

{{-- 1. HERO SLIDER BANNER TRANG CHỦ --}}
<section class="home-hero">
    <div class="container">
        <div class="hero-slider" id="homeHeroSlider" aria-label="Banner khuyến mãi">

            @if ($banners->isNotEmpty())
                @foreach ($banners as $banner)
                    @php
                        $bannerImage = ltrim(str_replace('\\', '/', $banner->image), '/');
                    @endphp
                    <article
                        class="hero-slide hero-slide--managed {{ $loop->first ? 'is-active' : '' }}"
                        style="background-image: linear-gradient(90deg, rgba(21, 22, 29, .92) 0%, rgba(21, 22, 29, .45) 58%, rgba(21, 22, 29, .12) 100%), url('{{ asset($bannerImage) }}');"
                    >
                        <div class="hero-slide-content">
                            @if ($banner->title)
                                <span class="hero-eyebrow"><i class="fa fa-bolt"></i> AE PHOENIX STORE</span>
                                <h1>{{ $banner->title }}</h1>
                            @endif
                            <p>Khám phá những sản phẩm công nghệ nổi bật tại AE Phoenix Store.</p>
                            <a href="{{ $banner->link ?: route('shop') }}" class="hero-shop-btn">
                                Khám phá ngay <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @endforeach

                @if ($banners->count() > 1)
                    <button type="button" class="hero-arrow hero-arrow-prev" aria-label="Banner trước"><i class="fa fa-angle-left"></i></button>
                    <button type="button" class="hero-arrow hero-arrow-next" aria-label="Banner tiếp theo"><i class="fa fa-angle-right"></i></button>
                    <div class="hero-dots">
                        @foreach ($banners as $banner)
                            <button type="button" class="hero-dot {{ $loop->first ? 'is-active' : '' }}" aria-label="Banner {{ $loop->iteration }}"></button>
                        @endforeach
                    </div>
                @endif
            @else
            {{-- Slide 1: Apple --}}
            <article class="hero-slide hero-slide--apple is-active">
                <div class="hero-slide-content">
                    <span class="hero-eyebrow">
                        <i class="fa fa-bolt"></i> AE PHOENIX STORE
                    </span>
                    <h1>CÔNG NGHỆ CHÍNH HÃNG<br>GIÁ TỐT MỖI NGÀY</h1>
                    <p>Khám phá iPhone, máy tính bảng và phụ kiện công nghệ phù hợp với nhu cầu của bạn.</p>
                    <div class="hero-benefits">
                        <span><i class="fa fa-check"></i> Sản phẩm chính hãng</span>
                        <span><i class="fa fa-check"></i> Bảo hành rõ ràng</span>
                    </div>
                    <a href="{{ route('shop') }}" class="hero-shop-btn">
                        Khám phá cửa hàng <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="hero-visual hero-visual--apple">
                    <div class="hero-circle hero-circle-one"></div>
                    <div class="hero-circle hero-circle-two"></div>
                    <img src="{{ asset('image/iphone17promax_blue.jpg') }}" alt="iPhone 17 Pro Max" class="hero-device hero-device-main" onerror="this.src='{{ asset('img/product01.png') }}'">
                    <img src="{{ asset('image/iphone15_pink.jpg') }}" alt="iPhone 15" class="hero-device hero-device-sub" onerror="this.src='{{ asset('img/product01.png') }}'">
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
                        <i class="fa fa-star"></i> ƯU ĐÃI SAMSUNG
                    </span>
                    <h1>GALAXY CAO CẤP<br>ƯU ĐÃI ĐẾN 2 TRIỆU</h1>
                    <p>Lựa chọn Galaxy S, Z Fold hoặc Z Flip với hiệu năng mạnh mẽ và giá tốt nhất.</p>
                    <div class="hero-benefits">
                        <span><i class="fa fa-check"></i> Nhiều lựa chọn màu sắc</span>
                        <span><i class="fa fa-check"></i> Trả góp linh hoạt</span>
                    </div>
                    <a href="{{ route('shop') }}" class="hero-shop-btn">
                        Xem sản phẩm Samsung <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="hero-visual hero-visual--samsung">
                    <div class="hero-circle hero-circle-one"></div>
                    <div class="hero-circle hero-circle-two"></div>
                    <img src="{{ asset('image/samsung_s24_ultra_gray.jpg') }}" alt="Samsung Galaxy S24 Ultra" class="hero-device hero-device-main" onerror="this.src='{{ asset('img/product01.png') }}'">
                    <img src="{{ asset('image/samsung_zfold5_blue.jpg') }}" alt="Samsung Z Fold 5" class="hero-device hero-device-sub" onerror="this.src='{{ asset('img/product01.png') }}'">
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
                        <i class="fa fa-graduation-cap"></i> HỌC TẬP &amp; LÀM VIỆC
                    </span>
                    <h1>TABLET CHO<br>HỌC TẬP HIỆU QUẢ</h1>
                    <p>iPad và Samsung Galaxy Tab phục vụ ghi chú, học tập online và giải trí mượt mà.</p>
                    <div class="hero-benefits">
                        <span><i class="fa fa-check"></i> Màn hình lớn sắc nét</span>
                        <span><i class="fa fa-check"></i> Giá tốt cho học sinh/sinh viên</span>
                    </div>
                    <a href="{{ route('shop') }}" class="hero-shop-btn">
                        Khám phá tablet <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="hero-visual hero-visual--tablet">
                    <div class="hero-circle hero-circle-one"></div>
                    <div class="hero-circle hero-circle-two"></div>
                    <img src="{{ asset('image/ipad10_blue.jpg') }}" alt="iPad 10" class="hero-device hero-device-main" onerror="this.src='{{ asset('img/product01.png') }}'">
                    <img src="{{ asset('image/samsung_tab_s9_beige.jpg') }}" alt="Samsung Tab S9" class="hero-device hero-device-sub" onerror="this.src='{{ asset('img/product01.png') }}'">
                    <div class="hero-product-note">
                        <span>HỌC TẬP</span>
                        <strong>iPad 10 WiFi</strong>
                    </div>
                </div>
            </article>

            {{-- Nút chuyển Slide Hero --}}
            <button type="button" class="hero-arrow hero-arrow-prev" aria-label="Banner trước"><i class="fa fa-angle-left"></i></button>
            <button type="button" class="hero-arrow hero-arrow-next" aria-label="Banner tiếp theo"><i class="fa fa-angle-right"></i></button>

            <div class="hero-dots">
                <button type="button" class="hero-dot is-active"></button>
                <button type="button" class="hero-dot"></button>
                <button type="button" class="hero-dot"></button>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- 2. SECTION SẢN PHẨM MỚI (SLIDER 1 HÀNG VỚI NÚT 2 BÊN HÔNG) --}}
<div class="section home-products">
    <div class="container">

        {{-- Tiêu đề + Danh mục --}}
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrap">
                    <h3 class="title">SẢN PHẨM MỚI</h3>
                    <ul class="custom-tab-nav">
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

        {{-- Vùng Slider Sản Phẩm (Bao gồm Track + Nút Trái / Phải 2 bên) --}}
        <div class="product-carousel-container">
            
            {{-- Nút Trái --}}
            <button type="button" class="carousel-nav-btn prev-btn" id="prodPrevBtn" aria-label="Lùi lại">
                <i class="fa fa-chevron-left"></i>
            </button>

            {{-- Track cuộn ngang 1 hàng --}}
            <div class="product-carousel-track" id="productCarouselTrack">
                @forelse ($products as $product)
                    @php
                        $activeVariants = $product->variants
                            ->where('status', 1)
                            ->sortBy(fn($v) => $v->sale_price ?? $v->price)
                            ->values();

                        $cheapestVariant = $activeVariants->first();

                        $displayPrice = $cheapestVariant
                            ? ($cheapestVariant->sale_price ?? $cheapestVariant->price)
                            : 0;

                        $oldPrice = ($cheapestVariant && $cheapestVariant->sale_price)
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
                            str_starts_with($imgPath, 'products/') ||
                            str_starts_with($imgPath, 'storage/')
                        ) {
                            $imgSrc = asset($imgPath);
                        } else {
                            $imgSrc = asset('image/' . $imgPath);
                        }
                    @endphp

                    <div class="product-item-wrapper">
                        <div class="product-card-custom">
                            
                            {{-- Ảnh sản phẩm --}}
                            <div class="product-card-thumb">
                                <span class="badge-new">MỚI</span>
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                    <img
                                        src="{{ $imgSrc }}"
                                        alt="{{ $product->name }}"
                                        onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                    >
                                </a>
                            </div>

                            {{-- Thông tin sản phẩm --}}
                            <div class="product-card-info">
                                <span class="cat-label">
                                    {{ $product->category?->name ?? 'Điện thoại' }}
                                </span>

                                <h4 class="prod-title">
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                        {{ $product->name }}
                                    </a>
                                </h4>

                                <div class="prod-price-box">
                                    <span class="main-price">{{ number_format($displayPrice, 0, ',', '.') }} ₫</span>
                                    @if ($oldPrice)
                                        <del class="old-price">{{ number_format($oldPrice, 0, ',', '.') }} ₫</del>
                                    @endif
                                </div>

                                <div class="prod-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <div class="prod-actions">
                                    <button type="button" class="btn-icon" title="Yêu thích"><i class="fa fa-heart-o"></i></button>
                                    <button type="button" class="btn-icon" title="So sánh"><i class="fa fa-exchange"></i></button>
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn-icon" title="Xem nhanh">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Nút Thêm vào giỏ --}}
                            <div class="product-card-bottom">
                                @if ($cheapestVariant && ($cheapestVariant->stock ?? 1) > 0)
                                    <form action="{{ route('cart.add') }}" method="POST" style="margin: 0; width: 100%;">
                                        @csrf
                                        <input type="hidden" name="product_variant_id" value="{{ $cheapestVariant->id }}">
                                        <button type="submit" class="btn-add-cart">
                                            THÊM VÀO GIỎ
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn-add-cart btn-view-detail">
                                        XEM CHI TIẾT
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center" style="padding: 40px 0;">
                        <p>Hiện chưa có sản phẩm nào.</p>
                    </div>
                @endforelse
            </div>

            {{-- Nút Phải --}}
            <button type="button" class="carousel-nav-btn next-btn" id="prodNextBtn" aria-label="Tiếp theo">
                <i class="fa fa-chevron-right"></i>
            </button>

        </div>
    </div>
</div>

{{-- 3. BANNER QUẢNG CÁO / SALE LỚN (CHỈ HIỆN KHI ADMIN THÊM / CÓ DỮ LIỆU) --}}
@if(isset($saleBanner) && $saleBanner)
    <section class="section big-promo-section">
        <div class="container">
            <div class="big-promo-banner">
                <a href="{{ $saleBanner->link ?? route('shop') }}">
                    <img
                        src="{{ asset($saleBanner->image ?? 'image/big_sale_banner.jpg') }}"
                        alt="{{ $saleBanner->title ?? 'Khuyến mãi đặc biệt' }}"
                    >
                </a>
            </div>
        </div>
    </section>
@endif

<style>
    /* ===== 1. HERO SLIDER CSS ===== */
    .home-hero { padding: 25px 0 0; background: #fff; }
    .hero-slider { position: relative; min-height: 340px; overflow: hidden; border-radius: 12px; box-shadow: 0 14px 32px rgba(43, 45, 66, 0.16); }
    .hero-slide { position: absolute; inset: 0; display: flex; align-items: center; overflow: hidden; padding: 45px 55px; opacity: 0; pointer-events: none; transform: translateX(36px); transition: opacity 0.55s ease, transform 0.55s ease; }
    .hero-slide.is-active { opacity: 1; pointer-events: auto; transform: translateX(0); }
    .hero-slide--apple { background: linear-gradient(135deg, #15161d 0%, #2b2d42 100%); }
    .hero-slide--samsung { background: linear-gradient(135deg, #092448 0%, #165a88 100%); }
    .hero-slide--tablet { background: linear-gradient(135deg, #37194e 0%, #6b3b87 100%); }
    .hero-slide--managed { background-position: center; background-size: cover; background-repeat: no-repeat; }
    .hero-slide::before { content: ""; position: absolute; width: 420px; height: 420px; top: -225px; left: 37%; border-radius: 50%; background: rgba(255, 255, 255, 0.08); }
    .hero-slide-content { position: relative; z-index: 2; max-width: 570px; }
    .hero-eyebrow { display: inline-block; margin-bottom: 14px; color: #ffb7c2; font-size: 13px; font-weight: 700; letter-spacing: 1.2px; }
    .hero-eyebrow i { color: #d10024; margin-right: 6px; }
    .hero-slide-content h1 { margin: 0 0 15px; color: #fff; font-size: 37px; font-weight: 800; line-height: 1.25; }
    .hero-slide-content p { max-width: 500px; margin: 0; color: #e3e6eb; font-size: 16px; line-height: 1.75; }
    .hero-benefits { display: flex; flex-wrap: wrap; gap: 10px 20px; margin: 22px 0 27px; color: #fff; font-size: 13px; font-weight: 600; }
    .hero-benefits i { color: #ff526b; margin-right: 5px; }
    .hero-shop-btn { display: inline-block; padding: 13px 22px; border-radius: 4px; background: #d10024; color: #fff !important; font-size: 14px; font-weight: 700; text-decoration: none; transition: 0.2s ease; }
    .hero-shop-btn:hover { background: #ef233c; transform: translateY(-2px); }
    .hero-visual { position: absolute; top: 0; right: 0; width: 43%; height: 100%; overflow: hidden; }
    .hero-visual--apple { background: linear-gradient(135deg, #f7f7f7 0%, #e3e7ef 100%); }
    .hero-visual--samsung { background: linear-gradient(135deg, #e7f4ff 0%, #c8e7fa 100%); }
    .hero-visual--tablet { background: linear-gradient(135deg, #f6eaff 0%, #e7cdf7 100%); }
    .hero-visual::before { content: ""; position: absolute; top: 0; left: -70px; width: 140px; height: 100%; background: inherit; filter: brightness(0.46); clip-path: polygon(0 0, 100% 0, 20% 100%, 0 100%); }
    .hero-circle { position: absolute; border-radius: 50%; }
    .hero-circle-one { width: 250px; height: 250px; top: -120px; right: -60px; background: rgba(209, 0, 36, 0.18); }
    .hero-circle-two { width: 180px; height: 180px; bottom: -85px; left: 30px; background: rgba(43, 45, 66, 0.13); }
    .hero-device { position: absolute; z-index: 2; object-fit: contain; mix-blend-mode: multiply; filter: drop-shadow(0 12px 12px rgba(43, 45, 66, 0.2)); }
    .hero-device-main { right: 35px; bottom: 10px; width: 250px; height: 285px; transform: rotate(-4deg); }
    .hero-device-sub { left: 54px; bottom: 31px; width: 185px; height: 215px; opacity: 0.86; transform: rotate(8deg); }
    .hero-product-note { position: absolute; z-index: 3; right: 30px; top: 27px; padding: 10px 13px; border-radius: 6px; background: #fff; box-shadow: 0 8px 18px rgba(43, 45, 66, 0.12); }
    .hero-product-note span { display: block; color: #d10024; font-size: 10px; font-weight: 700; letter-spacing: 0.8px; }
    .hero-product-note strong { display: block; margin-top: 3px; color: #2b2d42; font-size: 12px; }
    .hero-arrow { position: absolute; z-index: 5; top: 50%; width: 38px; height: 38px; border: 0; border-radius: 50%; color: #2b2d42; background: rgba(255, 255, 255, 0.92); font-size: 24px; line-height: 38px; opacity: 0; transform: translateY(-50%); transition: 0.2s ease; }
    .hero-slider:hover .hero-arrow { opacity: 1; }
    .hero-arrow:hover { color: #fff; background: #d10024; }
    .hero-arrow-prev { left: 18px; }
    .hero-arrow-next { right: 18px; }
    .hero-dots { position: absolute; z-index: 6; left: 55px; bottom: 22px; display: flex; gap: 8px; }
    .hero-dot { width: 9px; height: 9px; padding: 0; border: 0; border-radius: 50%; background: rgba(255, 255, 255, 0.42); transition: 0.2s ease; }
    .hero-dot.is-active { width: 28px; border-radius: 10px; background: #d10024; }

    /* ===== 2. SECTION SẢN PHẨM MỚI & SLIDER 2 BÊN ===== */
    .home-products { padding-top: 35px; padding-bottom: 25px; }
    .section-title-wrap {
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 25px;
        padding-bottom: 8px;
    }
    .section-title-wrap .title {
        margin: 0 0 12px;
        font-size: 28px;
        font-weight: 800;
        letter-spacing: 0.5px;
        color: #2b2d42;
    }
    .custom-tab-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 12px 25px;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .custom-tab-nav li a {
        color: #8d99ae;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        padding-bottom: 6px;
        display: inline-block;
        border-bottom: 2px solid transparent;
        transition: 0.2s ease;
    }
    .custom-tab-nav li.active a,
    .custom-tab-nav li a:hover {
        color: #d10024;
        border-bottom-color: #d10024;
    }

    /* Container chứa carousel và 2 nút mũi tên */
    .product-carousel-container {
        position: relative;
        padding: 0 10px;
    }

    /* Nút Trái / Phải ở 2 bên hông */
    .carousel-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid #e0e0e0;
        background: #ffffff;
        color: #2b2d42;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .carousel-nav-btn:hover {
        background: #d10024;
        color: #ffffff;
        border-color: #d10024;
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 6px 18px rgba(209, 0, 36, 0.35);
    }
    .carousel-nav-btn.prev-btn { left: -18px; }
    .carousel-nav-btn.next-btn { right: -18px; }

    /* Track lướt sản phẩm */
    .product-carousel-track {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        gap: 20px;
        padding: 10px 4px 25px;
        scrollbar-width: none; /* Ẩn thanh cuộn trên FF */
    }
    .product-carousel-track::-webkit-scrollbar {
        display: none; /* Ẩn thanh cuộn Chrome */
    }

    /* Độ rộng mỗi Card (4 Card trên màn Desktop) */
    .product-item-wrapper {
        flex: 0 0 calc((100% - 60px) / 4);
        max-width: calc((100% - 60px) / 4);
    }

    /* Card thiết kế chuẩn đẹp */
    .product-card-custom {
        height: 100%;
        background: #ffffff;
        border: 1px solid #ececec;
        border-radius: 14px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    .product-card-custom:hover {
        border-color: #fca5a5;
        box-shadow: 0 10px 25px rgba(209, 0, 36, 0.12);
        transform: translateY(-4px);
    }

    .product-card-thumb {
        position: relative;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: #fafafa;
    }
    .product-card-thumb img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .product-card-custom:hover .product-card-thumb img {
        transform: scale(1.05);
    }

    .badge-new {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #d10024;
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 4px;
        letter-spacing: 0.5px;
    }

    .product-card-info {
        padding: 15px 15px 10px;
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
    }
    .cat-label {
        font-size: 11px;
        color: #8d99ae;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    .prod-title {
        font-size: 14px;
        font-weight: 700;
        margin: 0 0 8px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.35;
    }
    .prod-title a {
        color: #2b2d42;
        text-decoration: none;
        transition: 0.2s;
    }
    .prod-title a:hover { color: #d10024; }

    .prod-price-box { margin-bottom: 8px; }
    .main-price {
        color: #d10024;
        font-size: 16px;
        font-weight: 700;
    }
    .old-price {
        font-size: 12px;
        color: #8d99ae;
        margin-left: 6px;
    }

    .prod-rating {
        color: #d10024;
        font-size: 11px;
        margin-top: auto;
        padding-top: 5px;
    }

    .prod-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 10px;
        padding-top: 8px;
        border-top: 1px solid #f2f2f2;
    }
    .btn-icon {
        background: transparent;
        border: none;
        color: #8d99ae;
        font-size: 13px;
        cursor: pointer;
        padding: 0 4px;
        transition: 0.2s;
    }
    .btn-icon:hover { color: #d10024; transform: scale(1.15); }

    /* Nút thêm vào giỏ dạng pill bo tròn */
    .product-card-bottom {
        padding: 0 15px 15px;
        background: #ffffff;
    }
    .btn-add-cart {
        display: block;
        width: 100%;
        border: none;
        background: #d10024;
        color: #ffffff !important;
        padding: 10px 0;
        border-radius: 25px;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 0.5px;
        text-align: center;
        text-decoration: none;
        transition: all 0.25s ease;
        cursor: pointer;
    }
    .btn-add-cart:hover {
        background: #1e1f29;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
    .btn-view-detail { background: #2b2d42; }

    /* ===== 3. BANNER SALE TO BÊN DƯỚI ===== */
    .big-promo-section { padding-top: 20px; padding-bottom: 40px; }
    .big-promo-banner {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }
    .big-promo-banner:hover { transform: translateY(-3px); }
    .big-promo-banner img {
        width: 100%;
        height: auto;
        max-height: 280px;
        object-fit: cover;
        display: block;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .product-item-wrapper {
            flex: 0 0 calc((100% - 20px) / 2);
            max-width: calc((100% - 20px) / 2);
        }
        .carousel-nav-btn.prev-btn { left: -10px; }
        .carousel-nav-btn.next-btn { right: -10px; }
    }
    @media (max-width: 767px) {
        .product-item-wrapper {
            flex: 0 0 78%;
            max-width: 78%;
        }
        .carousel-nav-btn { display: none; } /* Trên mobile người dùng vuốt ngón tay */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 1. Hero Auto Slider ---
        const slider = document.getElementById('homeHeroSlider');
        if (slider) {
            const slides = Array.from(slider.querySelectorAll('.hero-slide'));
            const dots = Array.from(slider.querySelectorAll('.hero-dot'));
            const prevButton = slider.querySelector('.hero-arrow-prev');
            const nextButton = slider.querySelector('.hero-arrow-next');
            let currentIndex = 0;
            let autoPlay;

            function showSlide(index) {
                currentIndex = (index + slides.length) % slides.length;
                slides.forEach((slide, i) => slide.classList.toggle('is-active', i === currentIndex));
                dots.forEach((dot, i) => dot.classList.toggle('is-active', i === currentIndex));
            }

            function startAutoPlay() {
                stopAutoPlay();
                autoPlay = setInterval(() => showSlide(currentIndex + 1), 4500);
            }

            function stopAutoPlay() {
                if (autoPlay) clearInterval(autoPlay);
            }

            if (prevButton) prevButton.addEventListener('click', () => { showSlide(currentIndex - 1); startAutoPlay(); });
            if (nextButton) nextButton.addEventListener('click', () => { showSlide(currentIndex + 1); startAutoPlay(); });
            dots.forEach((dot, idx) => dot.addEventListener('click', () => { showSlide(idx); startAutoPlay(); }));

            slider.addEventListener('mouseenter', stopAutoPlay);
            slider.addEventListener('mouseleave', startAutoPlay);
            startAutoPlay();
        }

        // --- 2. Nút Trái / Phải trượt Carousel Sản Phẩm Mới ---
        const track = document.getElementById('productCarouselTrack');
        const prodPrevBtn = document.getElementById('prodPrevBtn');
        const prodNextBtn = document.getElementById('prodNextBtn');

        if (track && prodPrevBtn && prodNextBtn) {
            prodNextBtn.addEventListener('click', function () {
                const cardWidth = track.querySelector('.product-item-wrapper')?.offsetWidth || 280;
                track.scrollBy({ left: cardWidth + 20, behavior: 'smooth' });
            });

            prodPrevBtn.addEventListener('click', function () {
                const cardWidth = track.querySelector('.product-item-wrapper')?.offsetWidth || 280;
                track.scrollBy({ left: -(cardWidth + 20), behavior: 'smooth' });
            });
        }
    });
</script>

@endsection