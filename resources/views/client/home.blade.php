@extends('layouts.master')

@section('content')

{{-- =========================================================================
     1. BANNER ĐỘNG (HERO SLIDER)
     ========================================================================= --}}
<section class="home-hero">
    <div class="container">
        <div class="hero-slider" id="homeHeroSlider" aria-label="Banner khuyến mãi">

            @php
                // Lọc banner động (nếu DB có cột type hoặc dùng chung $heroBanners / $banners)
                $dynamicBanners = isset($heroBanners) ? $heroBanners : (isset($banners) ? $banners->where('type', 'hero') : collect());
                if ($dynamicBanners->isEmpty() && isset($banners) && $banners->isNotEmpty() && !isset($banners->first()->type)) {
                    $dynamicBanners = $banners; // Fallback nếu chưa chia cột type
                }
            @endphp

            @if ($dynamicBanners->isNotEmpty())
                @foreach ($dynamicBanners as $banner)
                    @php
                        $bannerImage = ltrim(str_replace('\\', '/', $banner->image), '/');
                    @endphp
                    <article
                        class="hero-slide hero-slide--managed {{ $loop->first ? 'is-active' : '' }}"
                        style="background-image: linear-gradient(90deg, rgba(21, 22, 29, .92) 0%, rgba(21, 22, 29, .45) 58%, rgba(21, 22, 29, .12) 100%), url('{{ asset($bannerImage) }}');"
                    >
                        <div class="hero-slide-content">
                            <span class="hero-eyebrow"><i class="fa fa-bolt"></i> AE PHOENIX STORE</span>
                            @if ($banner->title)
                                <h1 style="font-size: {{ $banner->title_font_size ?? 37 }}px;">{{ $banner->title }}</h1>
                            @endif
                            @if ($banner->subtitle)
                                <p style="font-size: {{ $banner->subtitle_font_size ?? 16 }}px;">{{ $banner->subtitle }}</p>
                            @endif
                            <a href="{{ $banner->link ?: route('shop') }}" class="hero-shop-btn">
                                Khám phá ngay <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @endforeach

                @if ($dynamicBanners->count() > 1)
                    <button type="button" class="hero-arrow hero-arrow-prev" aria-label="Banner trước"><i class="fa fa-angle-left"></i></button>
                    <button type="button" class="hero-arrow hero-arrow-next" aria-label="Banner tiếp theo"><i class="fa fa-angle-right"></i></button>
                    <div class="hero-dots">
                        @foreach ($dynamicBanners as $banner)
                            <button type="button" class="hero-dot {{ $loop->first ? 'is-active' : '' }}" aria-label="Banner {{ $loop->iteration }}"></button>
                        @endforeach
                    </div>
                @endif
            @else
                {{-- Fallback Slide mặc định khi Admin chưa thêm banner động --}}
                <article class="hero-slide hero-slide--apple is-active">
                    <div class="hero-slide-content">
                        <span class="hero-eyebrow"><i class="fa fa-bolt"></i> AE PHOENIX STORE</span>
                        <h1>CÔNG NGHỆ CHÍNH HÃNG<br>GIÁ TỐT MỖI NGÀY</h1>
                        <p>Khám phá iPhone, máy tính bảng và phụ kiện công nghệ phù hợp với nhu cầu của bạn.</p>
                        <div class="hero-benefits">
                            <span><i class="fa fa-check"></i> Sản phẩm chính hãng</span>
                            <span><i class="fa fa-check"></i> Bảo hành rõ ràng</span>
                        </div>
                        <a href="{{ route('shop') }}" class="hero-shop-btn">Khám phá cửa hàng <i class="fa fa-arrow-right"></i></a>
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

                <article class="hero-slide hero-slide--samsung">
                    <div class="hero-slide-content">
                        <span class="hero-eyebrow"><i class="fa fa-star"></i> ƯU ĐÃI SAMSUNG</span>
                        <h1>GALAXY CAO CẤP<br>ƯU ĐÃI ĐẾN 2 TRIỆU</h1>
                        <p>Lựa chọn Galaxy S, Z Fold hoặc Z Flip với hiệu năng mạnh mẽ và giá tốt nhất.</p>
                        <div class="hero-benefits">
                            <span><i class="fa fa-check"></i> Nhiều lựa chọn màu sắc</span>
                            <span><i class="fa fa-check"></i> Trả góp linh hoạt</span>
                        </div>
                        <a href="{{ route('shop') }}" class="hero-shop-btn">Xem sản phẩm Samsung <i class="fa fa-arrow-right"></i></a>
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

                <button type="button" class="hero-arrow hero-arrow-prev" aria-label="Banner trước"><i class="fa fa-angle-left"></i></button>
                <button type="button" class="hero-arrow hero-arrow-next" aria-label="Banner tiếp theo"><i class="fa fa-angle-right"></i></button>
                <div class="hero-dots">
                    <button type="button" class="hero-dot is-active"></button>
                    <button type="button" class="hero-dot"></button>
                </div>
            @endif

        </div>
    </div>
</section>

@php
    $fullWidthBanners = isset($staticFullBanners)
        ? $staticFullBanners
        : (isset($banners) ? $banners->where('type', 'static_full')->values() : collect());
    $featuredBanner = $fullWidthBanners->first();
    $remainingFullWidthBanners = $fullWidthBanners->slice(1);
@endphp

@if ($featuredBanner)
    @php $featuredImage = ltrim(str_replace('\\', '/', $featuredBanner->image), '/'); @endphp
    <section class="featured-home-banner" aria-label="Banner nổi bật">
        <a href="{{ $featuredBanner->link ?: route('shop') }}">
            <img src="{{ asset($featuredImage) }}" alt="{{ $featuredBanner->title ?: 'Banner nổi bật' }}">
            @if($featuredBanner->title || $featuredBanner->subtitle)
                <div class="featured-home-banner__copy">
                    @if($featuredBanner->title)
                        <h2 style="font-size: {{ $featuredBanner->title_font_size ?? 42 }}px;">{{ $featuredBanner->title }}</h2>
                    @endif
                    @if($featuredBanner->subtitle)
                        <p style="font-size: {{ $featuredBanner->subtitle_font_size ?? 18 }}px;">{{ $featuredBanner->subtitle }}</p>
                    @endif
                </div>
            @endif
        </a>
    </section>
@endif

@php
    $showFeaturedProducts = isset($featuredProducts) ? $featuredProducts : collect();
@endphp

@if ($showFeaturedProducts->isNotEmpty())
    <div class="section home-products home-featured-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrap">
                        <h3 class="title">SẢN PHẨM NỔI BẬT</h3>
                        <p class="section-subtitle">Dựa trên số lượng khách hàng click xem sản phẩm</p>
                    </div>
                </div>
            </div>

            <div class="product-carousel-container">
                <button type="button" class="carousel-nav-btn prev-btn" id="featuredPrevBtn" aria-label="Lùi lại">
                    <i class="fa fa-chevron-left"></i>
                </button>

                <div class="product-carousel-track" id="featuredProductTrack">
                    @foreach ($showFeaturedProducts as $product)
                        @php
                            $featuredVariants = $product->variants
                                ->where('status', 1)
                                ->sortBy(fn($v) => $v->sale_price ?? $v->price)
                                ->values();
                            $featuredCheapest = $featuredVariants->first();
                            $featuredDisplayPrice = $featuredCheapest ? ($featuredCheapest->sale_price ?? $featuredCheapest->price) : 0;
                            $featuredOldPrice = ($featuredCheapest && $featuredCheapest->sale_price) ? $featuredCheapest->price : null;
                            $featuredImgPath = $product->thumbnail ?? 'img/product01.png';
                            $featuredImgPath = ltrim(str_replace('\\', '/', $featuredImgPath), '/');
                            if (preg_match('#^https?://#', $featuredImgPath)) {
                                $featuredImgSrc = $featuredImgPath;
                            } elseif (str_starts_with($featuredImgPath, 'public/')) {
                                $featuredImgSrc = asset(substr($featuredImgPath, 7));
                            } elseif (str_starts_with($featuredImgPath, 'img/') || str_starts_with($featuredImgPath, 'image/') || str_starts_with($featuredImgPath, 'admin/') || str_starts_with($featuredImgPath, 'products/') || str_starts_with($featuredImgPath, 'storage/')) {
                                $featuredImgSrc = asset($featuredImgPath);
                            } else {
                                $featuredImgSrc = asset('image/' . $featuredImgPath);
                            }
                        @endphp

                        <div class="product-item-wrapper">
                            <div class="product-card-custom">
                                <div class="product-card-thumb">
                                    <span class="badge-new">HOT</span>
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                        <img src="{{ $featuredImgSrc }}" alt="{{ $product->name }}" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
                                    </a>
                                </div>
                                <div class="product-card-info">
                                    <span class="cat-label">{{ $product->category?->name ?? 'Điện thoại' }}</span>
                                    <h4 class="prod-title">
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="prod-price-box">
                                        <span class="main-price">{{ number_format($featuredDisplayPrice, 0, ',', '.') }} ₫</span>
                                        @if ($featuredOldPrice)
                                            <del class="old-price">{{ number_format($featuredOldPrice, 0, ',', '.') }} ₫</del>
                                        @endif
                                    </div>
                                    <div class="prod-click-meta">
                                        <i class="fa fa-eye"></i> {{ $product->click_count ?? 0 }} lượt xem
                                    </div>
                                </div>
                                <div class="product-card-bottom">
                                    @if ($featuredCheapest && ($featuredCheapest->stock ?? 1) > 0)
                                        <form action="{{ route('cart.add') }}" method="POST" style="margin: 0; width: 100%;">
                                            @csrf
                                            <input type="hidden" name="product_variant_id" value="{{ $featuredCheapest->id }}">
                                            <button type="submit" class="btn-add-cart">THÊM VÀO GIỎ</button>
                                        </form>
                                    @else
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn-add-cart btn-view-detail">XEM CHI TIẾT</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="carousel-nav-btn next-btn" id="featuredNextBtn" aria-label="Tiếp theo">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- =========================================================================
     2. SECTION SẢN PHẨM MỚI (CAROUSEL 1 HÀNG, NÚT 2 BÊN HÔNG)
     ========================================================================= --}}
<div class="section home-products">
    <div class="container">

        {{-- Tiêu đề + Tab Danh mục --}}
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

        {{-- Slider Carousel --}}
        <div class="product-carousel-container">
            
            {{-- Nút Trái --}}
            <button type="button" class="carousel-nav-btn prev-btn" id="prodPrevBtn" aria-label="Lùi lại">
                <i class="fa fa-chevron-left"></i>
            </button>

            {{-- Danh sách cuộn ngang --}}
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

                            {{-- Thông tin chi tiết --}}
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

                            {{-- Nút giỏ hàng --}}
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

{{-- =========================================================================
     3. BANNER TĨNH: 
        - BANNER TO CHIỀU NGANG BẰNG WEB (FULL-WIDTH)
        - BANNER HÌNH CHỮ NHẬT (RECTANGLE / PROMO GRID)
     ========================================================================= --}}

{{-- A. BANNER TO FULL CHIỀU NGANG WEB (Admin thêm bao nhiêu lặp sinh ra bấy nhiêu) --}}
@if ($remainingFullWidthBanners->isNotEmpty())
    <section class="static-fullwidth-section">
        @foreach ($remainingFullWidthBanners as $fBanner)
            @php
                $fImg = ltrim(str_replace('\\', '/', $fBanner->image), '/');
            @endphp
            <div class="fullwidth-banner-item">
                <a href="{{ $fBanner->link ?: '#' }}" target="{{ $fBanner->link ? '_self' : '_blank' }}">
                    <img src="{{ asset($fImg) }}" alt="{{ $fBanner->title ?? 'Banner Quảng Cáo' }}">
                    @if($fBanner->title || $fBanner->subtitle)
                        <div class="managed-banner-copy managed-banner-copy--full">
                            @if($fBanner->title)<h2 style="font-size: {{ $fBanner->title_font_size ?? 37 }}px;">{{ $fBanner->title }}</h2>@endif
                            @if($fBanner->subtitle)<p style="font-size: {{ $fBanner->subtitle_font_size ?? 16 }}px;">{{ $fBanner->subtitle }}</p>@endif
                        </div>
                    @endif
                </a>
            </div>
        @endforeach
    </section>
@endif

{{-- B. BANNER TĨNH HÌNH CHỮ NHẬT (Trong Container, chia cột linh hoạt) --}}
@php
    $rectBanners = isset($staticRectBanners) 
        ? $staticRectBanners 
        : (isset($banners) ? $banners->where('type', 'static_rect') : collect());
@endphp

@if ($rectBanners->isNotEmpty())
    <section class="section static-rect-section">
        <div class="container">
            <div class="row static-rect-grid">
                @foreach ($rectBanners as $rBanner)
                    @php
                        $rImg = ltrim(str_replace('\\', '/', $rBanner->image), '/');
                        // Tự động tính class cột Bootstrap theo số lượng banner (1 -> 12, 2 -> 6, 3 -> 4, >=4 -> 3)
                        $count = $rectBanners->count();
                        $colClass = $count == 1 ? 'col-md-12' : ($count == 2 ? 'col-md-6 col-sm-6' : ($count == 3 ? 'col-md-4 col-sm-6' : 'col-md-3 col-sm-6'));
                    @endphp
                    <div class="{{ $colClass }} mb-4">
                        <div class="rect-banner-card">
                            <a href="{{ $rBanner->link ?: '#' }}">
                                <img src="{{ asset($rImg) }}" alt="{{ $rBanner->title ?? 'Banner Khuyến Mãi' }}">
                                @if($rBanner->title || $rBanner->subtitle)
                                    <div class="managed-banner-copy managed-banner-copy--rect">
                                        @if($rBanner->title)<h2 style="font-size: {{ $rBanner->title_font_size ?? 24 }}px;">{{ $rBanner->title }}</h2>@endif
                                        @if($rBanner->subtitle)<p style="font-size: {{ $rBanner->subtitle_font_size ?? 14 }}px;">{{ $rBanner->subtitle }}</p>@endif
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </section>
@endif
{{-- =========================================================
    FLASH SALE + VOUCHER SỰ KIỆN
    ========================================================= --}}

@include('client.flash-voucher')
<style>
    /* ===== 1. HERO SLIDER CSS ===== */
    .home-hero { padding: 25px 0 0; background: #fff; }
    .hero-slider { position: relative; min-height: 340px; overflow: hidden; border-radius: 12px; box-shadow: 0 14px 32px rgba(43, 45, 66, 0.16); }
    .hero-slide { position: absolute; inset: 0; display: flex; align-items: center; overflow: hidden; padding: 45px 55px; opacity: 0; pointer-events: none; transform: translateX(36px); transition: opacity 0.55s ease, transform 0.55s ease; }
    .hero-slide.is-active { opacity: 1; pointer-events: auto; transform: translateX(0); }
    .hero-slide--apple { background: linear-gradient(135deg, #15161d 0%, #2b2d42 100%); }
    .hero-slide--samsung { background: linear-gradient(135deg, #092448 0%, #165a88 100%); }
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
    .featured-home-banner { width: 100%; margin: 28px 0 8px; overflow: hidden; background: #15161d; }
    .featured-home-banner > a { position: relative; display: block; min-height: 300px; }
    .featured-home-banner img { display: block; width: 100%; max-height: 430px; object-fit: cover; }
    .featured-home-banner__copy { position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; max-width: 720px; padding: 40px 8%; color: #fff; background: linear-gradient(90deg, rgba(21, 22, 29, .86), rgba(21, 22, 29, .18) 75%, transparent); }
    .featured-home-banner__copy h2 { margin: 0; color: #fff; font-weight: 800; line-height: 1.12; }
    .featured-home-banner__copy p { margin: 14px 0 0; color: #fff; line-height: 1.5; }
    .hero-visual { position: absolute; top: 0; right: 0; width: 43%; height: 100%; overflow: hidden; }
    .hero-visual--apple { background: linear-gradient(135deg, #f7f7f7 0%, #e3e7ef 100%); }
    .hero-visual--samsung { background: linear-gradient(135deg, #e7f4ff 0%, #c8e7fa 100%); }
    .hero-circle { position: absolute; border-radius: 50%; }
    .hero-circle-one { width: 250px; height: 250px; top: -120px; right: -60px; background: rgba(209, 0, 36, 0.18); }
    .hero-circle-two { width: 180px; height: 180px; bottom: -85px; left: 30px; background: rgba(43, 45, 66, 0.13); }
    .hero-device { position: absolute; z-index: 2; object-fit: contain; mix-blend-mode: multiply; filter: drop-shadow(0 12px 12px rgba(43, 45, 66, 0.2)); }
    .hero-device-main { right: 35px; bottom: 10px; width: 250px; height: 285px; transform: rotate(-4deg); }
    .hero-device-sub { left: 54px; bottom: 31px; width: 185px; height: 215px; opacity: 0.86; transform: rotate(8deg); }
    .hero-product-note { position: absolute; z-index: 3; right: 30px; top: 27px; padding: 10px 13px; border-radius: 6px; background: #fff; box-shadow: 0 8px 18px rgba(43, 45, 66, 0.12); }
    .hero-product-note span { display: block; color: #d10024; font-size: 10px; font-weight: 700; }
    .hero-product-note strong { display: block; margin-top: 3px; color: #2b2d42; font-size: 12px; }
    .hero-arrow { position: absolute; z-index: 5; top: 50%; width: 38px; height: 38px; border: 0; border-radius: 50%; color: #2b2d42; background: rgba(255, 255, 255, 0.92); font-size: 24px; line-height: 38px; opacity: 0; transform: translateY(-50%); transition: 0.2s ease; cursor: pointer; }
    .hero-slider:hover .hero-arrow { opacity: 1; }
    .hero-arrow:hover { color: #fff; background: #d10024; }
    .hero-arrow-prev { left: 18px; }
    .hero-arrow-next { right: 18px; }
    .hero-dots { position: absolute; z-index: 6; left: 55px; bottom: 22px; display: flex; gap: 8px; }
    .hero-dot { width: 9px; height: 9px; padding: 0; border: 0; border-radius: 50%; background: rgba(255, 255, 255, 0.42); transition: 0.2s ease; cursor: pointer; }
    .hero-dot.is-active { width: 28px; border-radius: 10px; background: #d10024; }

    /* ===== 2. PRODUCT CAROUSEL & CARDS ===== */
    .home-products { padding-top: 35px; padding-bottom: 25px; }
    .section-title-wrap { border-bottom: 2px solid #f0f0f0; margin-bottom: 25px; padding-bottom: 8px; }
    .section-title-wrap .title { margin: 0 0 12px; font-size: 28px; font-weight: 800; color: #2b2d42; }
    .section-subtitle { margin: -5px 0 0; color: #8d99ae; font-size: 14px; }
    .custom-tab-nav { display: flex; flex-wrap: wrap; gap: 12px 25px; list-style: none; padding: 0; margin: 0; }
    .prod-click-meta { margin-top: 8px; font-size: 12px; color: #8d99ae; }
    .prod-click-meta i { color: #d10024; margin-right: 5px; }
    .custom-tab-nav li a { color: #8d99ae; font-size: 14px; font-weight: 600; text-decoration: none; padding-bottom: 6px; display: inline-block; border-bottom: 2px solid transparent; transition: 0.2s ease; }
    .custom-tab-nav li.active a, .custom-tab-nav li a:hover { color: #d10024; border-bottom-color: #d10024; }

    .product-carousel-container { position: relative; padding: 0 10px; }
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
    .carousel-nav-btn:hover { background: #d10024; color: #ffffff; border-color: #d10024; transform: translateY(-50%) scale(1.1); box-shadow: 0 6px 18px rgba(209, 0, 36, 0.35); }
    .carousel-nav-btn.prev-btn { left: -18px; }
    .carousel-nav-btn.next-btn { right: -18px; }

    .product-carousel-track { display: flex; overflow-x: auto; scroll-behavior: smooth; gap: 20px; padding: 10px 4px 25px; scrollbar-width: none; }
    .product-carousel-track::-webkit-scrollbar { display: none; }
    .product-item-wrapper { flex: 0 0 calc((100% - 60px) / 4); max-width: calc((100% - 60px) / 4); }

    .product-card-custom { height: 100%; background: #ffffff; border: 1px solid #ececec; border-radius: 14px; display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04); transition: all 0.3s ease; }
    .product-card-custom:hover { border-color: #fca5a5; box-shadow: 0 10px 25px rgba(209, 0, 36, 0.12); transform: translateY(-4px); }
    .product-card-thumb { position: relative; height: 220px; display: flex; align-items: center; justify-content: center; padding: 20px; background: #fafafa; }
    .product-card-thumb img { max-height: 100%; max-width: 100%; object-fit: contain; transition: transform 0.3s ease; }
    .product-card-custom:hover .product-card-thumb img { transform: scale(1.05); }
    .badge-new { position: absolute; top: 12px; right: 12px; background: #d10024; color: #fff; font-size: 10px; font-weight: 700; padding: 3px 8px; border-radius: 4px; }

    .product-card-info { padding: 15px 15px 10px; flex: 1; display: flex; flex-direction: column; text-align: center; }
    .cat-label { font-size: 11px; color: #8d99ae; font-weight: 600; text-transform: uppercase; margin-bottom: 5px; }
    .prod-title { font-size: 14px; font-weight: 700; margin: 0 0 8px; height: 38px; display: flex; align-items: center; justify-content: center; line-height: 1.35; }
    .prod-title a { color: #2b2d42; text-decoration: none; }
    .prod-title a:hover { color: #d10024; }
    .prod-price-box { margin-bottom: 8px; }
    .main-price { color: #d10024; font-size: 16px; font-weight: 700; }
    .old-price { font-size: 12px; color: #8d99ae; margin-left: 6px; }
    .prod-rating { color: #d10024; font-size: 11px; margin-top: auto; padding-top: 5px; }
    .prod-actions { display: flex; justify-content: center; gap: 12px; margin-top: 10px; padding-top: 8px; border-top: 1px solid #f2f2f2; }
    .btn-icon { background: transparent; border: none; color: #8d99ae; font-size: 13px; cursor: pointer; padding: 0 4px; transition: 0.2s; }
    .btn-icon:hover { color: #d10024; transform: scale(1.15); }
    .product-card-bottom { padding: 0 15px 15px; background: #ffffff; }
    .btn-add-cart { display: block; width: 100%; border: none; background: #d10024; color: #ffffff !important; padding: 10px 0; border-radius: 25px; font-weight: 700; font-size: 12px; text-align: center; text-decoration: none; transition: 0.25s ease; cursor: pointer; }
    .btn-add-cart:hover { background: #1e1f29; }
    .btn-view-detail { background: #2b2d42; }

    /* ===== 3. BANNER TĨNH TO CHIỀU NGANG WEB & CHỮ NHẬT ===== */
    /* Full-width Section */
    .static-fullwidth-section {
        width: 100%;
        margin: 25px 0 15px;
    }
    .fullwidth-banner-item {
        width: 100%;
        margin-bottom: 20px;
        overflow: hidden;
        position: relative;
    }
    .fullwidth-banner-item a { display: block; width: 100%; position: relative; }
    .fullwidth-banner-item img {
        width: 100%;
        height: auto;
        display: block;
        transition: filter 0.3s ease;
    }
    .fullwidth-banner-item:hover img {
        filter: brightness(0.95);
    }

    /* Rectangular Grid Section */
    .static-rect-section { padding-top: 10px; padding-bottom: 30px; }
    .static-rect-grid { display: flex; flex-wrap: wrap; }
    .rect-banner-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .rect-banner-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(209, 0, 36, 0.15);
    }
    .rect-banner-card a { display: block; position: relative; }
    .rect-banner-card img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }
    .managed-banner-copy {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 28px 32px 22px;
        color: #fff;
        background: linear-gradient(transparent, rgba(21, 22, 29, .88));
    }
    .managed-banner-copy h2,
    .managed-banner-copy p { margin: 0; color: #fff; }
    .managed-banner-copy h2 { font-weight: 800; line-height: 1.15; }
    .managed-banner-copy p { margin-top: 8px; line-height: 1.45; }
    .managed-banner-copy--rect { padding: 20px 18px 16px; }
    @media (max-width: 767px) {
        .featured-home-banner > a { min-height: 220px; }
        .featured-home-banner img { min-height: 220px; }
        .featured-home-banner__copy { padding: 24px; }
        .featured-home-banner__copy h2 { font-size: 28px !important; }
        .featured-home-banner__copy p { font-size: 14px !important; }
    }

    /* Responsive */
    @media (max-width: 991px) {
        .product-item-wrapper { flex: 0 0 calc((100% - 20px) / 2); max-width: calc((100% - 20px) / 2); }
        .carousel-nav-btn.prev-btn { left: -10px; }
        .carousel-nav-btn.next-btn { right: -10px; }
    }
    @media (max-width: 767px) {
        .product-item-wrapper { flex: 0 0 78%; max-width: 78%; }
        .carousel-nav-btn { display: none; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Hero Auto Slider
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

        // 2. Nút Trái / Phải Carousel Sản Phẩm Mới
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

        const featuredTrack = document.getElementById('featuredProductTrack');
        const featuredPrevBtn = document.getElementById('featuredPrevBtn');
        const featuredNextBtn = document.getElementById('featuredNextBtn');

        if (featuredTrack && featuredPrevBtn && featuredNextBtn) {
            featuredNextBtn.addEventListener('click', function () {
                const cardWidth = featuredTrack.querySelector('.product-item-wrapper')?.offsetWidth || 280;
                featuredTrack.scrollBy({ left: cardWidth + 20, behavior: 'smooth' });
            });

            featuredPrevBtn.addEventListener('click', function () {
                const cardWidth = featuredTrack.querySelector('.product-item-wrapper')?.offsetWidth || 280;
                featuredTrack.scrollBy({ left: -(cardWidth + 20), behavior: 'smooth' });
            });
        }
    });
</script>

@endsection
<!-- ádsdaas -->