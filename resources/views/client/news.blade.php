@extends('layouts.master')

@section('content')
<div class="news-page">

    {{-- Banner đầu trang --}}
    <section class="news-hero">
        <div class="container">
            <div class="news-hero-content">
                <span class="news-hero-subtitle">
                    <i class="fa fa-newspaper-o"></i>
                    MOBILE MART STORE
                </span>

                <h1>TIN TỨC CÔNG NGHỆ</h1>

                <p>
                    Cập nhật thông tin điện thoại, máy tính bảng, xu hướng công nghệ
                    và kinh nghiệm chọn sản phẩm phù hợp.
                </p>

                <div class="news-category-nav">
                    <a href="#featured" class="active">Nổi bật</a>
                    <a href="#iphone-news">Apple</a>
                    <a href="#samsung-news">Samsung</a>
                    <a href="#tablet-news">Máy tính bảng</a>
                    <a href="#tips-news">Mẹo công nghệ</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Tin nổi bật --}}
    <section class="section news-featured-section" id="featured">
        <div class="container">
            <div class="section-title news-section-title">
                <div>
                    <span class="section-subtitle">
                        <i class="fa fa-fire"></i> BÀI VIẾT NỔI BẬT
                    </span>

                    <h3 class="title">TIN TỨC MỚI NHẤT</h3>
                </div>

                <a href="#all-news" class="news-view-all">
                    Xem tất cả <i class="fa fa-arrow-right"></i>
                </a>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <article class="featured-news-card">
                        <div class="featured-news-image">
                            <img
                                src="{{ asset('image/iphone17promax_blue.jpg') }}"
                                alt="iPhone 17 Pro Max"
                            >

                            <span class="featured-news-tag">
                                NỔI BẬT
                            </span>
                        </div>

                        <div class="featured-news-content">
                            <div class="news-meta">
                                <span>
                                    <i class="fa fa-calendar"></i>
                                    02/07/2026
                                </span>

                                <span>
                                    <i class="fa fa-user"></i>
                                    Mobile Mart Store
                                </span>
                            </div>

                            <h2>
                                <a href="#">
                                    iPhone 17 Pro Max có gì đáng chú ý?
                                </a>
                            </h2>

                            <p>
                                iPhone 17 Pro Max thu hút với thiết kế cao cấp,
                                hiệu năng mạnh mẽ cùng nhiều lựa chọn màu sắc và dung lượng
                                phù hợp cho từng nhu cầu sử dụng.
                            </p>

                            <a href="#" class="news-read-more">
                                Đọc bài viết
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-md-5">
                    <div class="news-side-list">

                        <article class="side-news-item">
                            <div class="side-news-image">
                                <img
                                    src="{{ asset('image/samsung_s24_ultra_gray.jpg') }}"
                                    alt="Samsung Galaxy S24 Ultra"
                                >
                            </div>

                            <div class="side-news-content">
                                <span class="news-category-label">SAMSUNG</span>

                                <h4>
                                    <a href="#">
                                        Samsung Galaxy S24 Ultra phù hợp với ai?
                                    </a>
                                </h4>

                                <p>
                                    <i class="fa fa-clock-o"></i>
                                    01/07/2026
                                </p>
                            </div>
                        </article>

                        <article class="side-news-item">
                            <div class="side-news-image">
                                <img
                                    src="{{ asset('image/ipad10_blue.jpg') }}"
                                    alt="iPad 10"
                                >
                            </div>

                            <div class="side-news-content">
                                <span class="news-category-label">MÁY TÍNH BẢNG</span>

                                <h4>
                                    <a href="#">
                                        iPad 10 có phù hợp cho sinh viên?
                                    </a>
                                </h4>

                                <p>
                                    <i class="fa fa-clock-o"></i>
                                    30/06/2026
                                </p>
                            </div>
                        </article>

                        <article class="side-news-item">
                            <div class="side-news-image">
                                <img
                                    src="{{ asset('image/samsung_zfold5_blue.jpg') }}"
                                    alt="Samsung Galaxy Z Fold5"
                                >
                            </div>

                            <div class="side-news-content">
                                <span class="news-category-label">ĐIỆN THOẠI GẬP</span>

                                <h4>
                                    <a href="#">
                                        Có nên chọn điện thoại màn hình gập?
                                    </a>
                                </h4>

                                <p>
                                    <i class="fa fa-clock-o"></i>
                                    29/06/2026
                                </p>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Danh sách bài viết --}}
    <section class="section news-list-section" id="all-news">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="section-title news-section-title">
                        <div>
                            <span class="section-subtitle">
                                <i class="fa fa-list"></i> KHÁM PHÁ
                            </span>

                            <h3 class="title">BÀI VIẾT MỚI</h3>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6" id="iphone-news">
                            <article class="news-card">
                                <div class="news-card-image">
                                    <img
                                        src="{{ asset('image/iphone16_black.jpg') }}"
                                        alt="iPhone 16"
                                    >

                                    <span class="news-card-tag">APPLE</span>
                                </div>

                                <div class="news-card-content">
                                    <div class="news-meta">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            28/06/2026
                                        </span>
                                    </div>

                                    <h3>
                                        <a href="#">
                                            Cách chọn iPhone theo ngân sách phù hợp
                                        </a>
                                    </h3>

                                    <p>
                                        Gợi ý lựa chọn iPhone theo nhu cầu học tập,
                                        làm việc, chụp ảnh và giải trí.
                                    </p>

                                    <a href="#" class="news-read-more">
                                        Xem thêm <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6" id="samsung-news">
                            <article class="news-card">
                                <div class="news-card-image">
                                    <img
                                        src="{{ asset('image/samsung_s24_plus_black.jpg') }}"
                                        alt="Samsung Galaxy S24 Plus"
                                    >

                                    <span class="news-card-tag">SAMSUNG</span>
                                </div>

                                <div class="news-card-content">
                                    <div class="news-meta">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            27/06/2026
                                        </span>
                                    </div>

                                    <h3>
                                        <a href="#">
                                            So sánh Samsung Galaxy S24 và S24 Plus
                                        </a>
                                    </h3>

                                    <p>
                                        Những điểm khác biệt quan trọng giúp bạn chọn
                                        đúng phiên bản Samsung Galaxy phù hợp.
                                    </p>

                                    <a href="#" class="news-read-more">
                                        Xem thêm <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6" id="tablet-news">
                            <article class="news-card">
                                <div class="news-card-image">
                                    <img
                                        src="{{ asset('image/samsung_tab_s9_beige.jpg') }}"
                                        alt="Samsung Galaxy Tab S9"
                                    >

                                    <span class="news-card-tag">TABLET</span>
                                </div>

                                <div class="news-card-content">
                                    <div class="news-meta">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            26/06/2026
                                        </span>
                                    </div>

                                    <h3>
                                        <a href="#">
                                            Máy tính bảng nào phù hợp để học tập?
                                        </a>
                                    </h3>

                                    <p>
                                        Tổng hợp các tiêu chí quan trọng khi chọn máy tính bảng
                                        phục vụ học online và ghi chú.
                                    </p>

                                    <a href="#" class="news-read-more">
                                        Xem thêm <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6" id="tips-news">
                            <article class="news-card">
                                <div class="news-card-image">
                                    <img
                                        src="{{ asset('image/samsung_zflip5_mint.jpg') }}"
                                        alt="Samsung Galaxy Z Flip5"
                                    >

                                    <span class="news-card-tag">MẸO CÔNG NGHỆ</span>
                                </div>

                                <div class="news-card-content">
                                    <div class="news-meta">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            25/06/2026
                                        </span>
                                    </div>

                                    <h3>
                                        <a href="#">
                                            Cách bảo quản điện thoại bền hơn mỗi ngày
                                        </a>
                                    </h3>

                                    <p>
                                        Một số mẹo nhỏ giúp điện thoại duy trì hiệu năng,
                                        pin tốt và hạn chế trầy xước.
                                    </p>

                                    <a href="#" class="news-read-more">
                                        Xem thêm <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>

                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="col-md-4">
                    <div class="news-sidebar">

                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">
                                <i class="fa fa-search"></i>
                                TÌM KIẾM BÀI VIẾT
                            </h3>

                            <form>
                                <div class="news-search-box">
                                    <input
                                        type="text"
                                        placeholder="Nhập từ khóa..."
                                    >

                                    <button type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">
                                <i class="fa fa-tags"></i>
                                CHUYÊN MỤC
                            </h3>

                            <ul class="news-category-list">
                                <li>
                                    <a href="#iphone-news">
                                        Apple <span>05</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#samsung-news">
                                        Samsung <span>06</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#tablet-news">
                                        Máy tính bảng <span>04</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#tips-news">
                                        Mẹo công nghệ <span>08</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget newsletter-box">
                            <i class="fa fa-envelope-o"></i>

                            <h3>NHẬN TIN MỚI</h3>

                            <p>
                                Đăng ký để nhận tin công nghệ, ưu đãi và sản phẩm mới.
                            </p>

                            <form>
                                <input
                                    type="email"
                                    placeholder="Nhập email của bạn"
                                >

                                <button type="button" class="primary-btn">
                                    Đăng ký
                                </button>
                            </form>
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </section>
</div>

@if (false)
<aside class="news-rotating-ad" id="news-rotating-ad" aria-label="Quảng cáo ưu đãi" hidden>
    <button class="news-rotating-ad__close" type="button" aria-label="Đóng quảng cáo">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>

    <a class="news-rotating-ad__link" href="{{ route('shop') }}">
        <span class="news-rotating-ad__eyebrow">ƯU ĐÃI HÔM NAY</span>
        <strong class="news-rotating-ad__title"></strong>
        <span class="news-rotating-ad__description"></span>
        <span class="news-rotating-ad__cta">Xem ngay <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
    </a>
</aside>

<style>
    .news-rotating-ad {
        position: fixed;
        left: 24px;
        bottom: 24px;
        z-index: 1100;
        width: min(320px, calc(100vw - 32px));
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 8px;
        background: linear-gradient(135deg, #15161d, #d10024);
        box-shadow: 0 12px 32px rgba(21, 22, 29, 0.28);
        color: #fff;
        animation: news-ad-slide-in 0.35s ease-out;
    }

    .news-rotating-ad[hidden] {
        display: none;
    }

    .news-rotating-ad__link {
        display: block;
        padding: 20px 22px;
        color: #fff;
        text-decoration: none;
    }

    .news-rotating-ad__link:hover,
    .news-rotating-ad__link:focus {
        color: #fff;
        text-decoration: none;
    }

    .news-rotating-ad__close {
        position: absolute;
        top: 8px;
        right: 8px;
        z-index: 1;
        width: 28px;
        height: 28px;
        border: 0;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.24);
        color: #fff;
        cursor: pointer;
    }

    .news-rotating-ad__close:hover,
    .news-rotating-ad__close:focus {
        background: rgba(0, 0, 0, 0.45);
        outline: 2px solid rgba(255, 255, 255, 0.7);
        outline-offset: 2px;
    }

    .news-rotating-ad__eyebrow,
    .news-rotating-ad__description,
    .news-rotating-ad__cta {
        display: block;
    }

    .news-rotating-ad__eyebrow {
        margin-bottom: 8px;
        color: #ffccd5;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .news-rotating-ad__title {
        display: block;
        max-width: 245px;
        margin-bottom: 7px;
        font-size: 19px;
        line-height: 1.25;
    }

    .news-rotating-ad__description {
        min-height: 20px;
        color: #f8e6e9;
        font-size: 13px;
        line-height: 1.5;
    }

    .news-rotating-ad__cta {
        margin-top: 13px;
        font-size: 12px;
        font-weight: 700;
    }

    .news-rotating-ad__cta i {
        margin-left: 5px;
    }

    .news-rotating-ad.is-changing .news-rotating-ad__link {
        animation: news-ad-content-change 0.3s ease-out;
    }

    @keyframes news-ad-slide-in {
        from { opacity: 0; transform: translateY(14px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes news-ad-content-change {
        from { opacity: 0; transform: translateX(8px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 480px) {
        .news-rotating-ad {
            left: 16px;
            right: 16px;
            bottom: 16px;
            width: auto;
        }

        .news-rotating-ad__link {
            padding: 17px 20px;
        }
    }

    .news-page {
        background: linear-gradient(180deg, #f7f8fc 0%, #ffffff 160px, #ffffff 100%);
        color: #1f2430;
    }

    .news-page .container {
        position: relative;
    }

    .news-hero {
        position: relative;
        padding: 78px 0 64px;
        background:
            radial-gradient(circle at top left, rgba(209, 0, 36, 0.2), transparent 30%),
            linear-gradient(135deg, #100f14 0%, #171b2a 42%, #21273a 100%);
        color: #fff;
        overflow: hidden;
    }

    .news-hero::before,
    .news-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
    }

    .news-hero::before {
        width: 480px;
        height: 480px;
        right: -150px;
        top: -180px;
    }

    .news-hero::after {
        width: 260px;
        height: 260px;
        left: -60px;
        bottom: -100px;
    }

    .news-hero-content {
        position: relative;
        z-index: 1;
        max-width: 820px;
        margin: 0 auto;
        text-align: center;
    }

    .news-hero-subtitle,
    .section-subtitle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffdde3;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.4px;
        margin-bottom: 18px;
        text-transform: uppercase;
    }

    .news-hero-subtitle i,
    .section-subtitle i {
        margin-right: 2px;
        color: #ffd7de;
    }

    .news-hero h1 {
        margin: 0 0 16px;
        font-size: clamp(30px, 4vw, 52px);
        line-height: 1.08;
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.04em;
    }

    .news-hero p {
        max-width: 670px;
        margin: 0 auto;
        color: rgba(255, 255, 255, 0.78);
        font-size: 16px;
        line-height: 1.8;
    }

    .news-category-nav {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 30px;
    }

    .news-category-nav a {
        padding: 10px 16px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        background: rgba(255, 255, 255, 0.02);
    }

    .news-category-nav a:hover,
    .news-category-nav a.active {
        background: linear-gradient(135deg, #d10024, #ef3857);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 10px 24px rgba(209, 0, 36, 0.35);
    }

    .news-section-title {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 26px;
        border: 0;
    }

    .news-section-title .title {
        margin: 0;
        color: #1a1d2b;
        font-size: clamp(24px, 2vw, 34px);
        line-height: 1.2;
        font-weight: 800;
        letter-spacing: -0.04em;
    }

    .news-view-all {
        color: #d10024;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .news-view-all i {
        margin-left: 6px;
    }

    .news-featured-section {
        padding: 72px 0 24px;
    }

    .featured-news-card {
        overflow: hidden;
        border: 1px solid #eef0f5;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 14px 40px rgba(16, 20, 31, 0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .featured-news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 48px rgba(16, 20, 31, 0.12);
    }

    .featured-news-image {
        position: relative;
        height: 360px;
        overflow: hidden;
        background: #f5f6fa;
    }

    .featured-news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    .featured-news-card:hover .featured-news-image img {
        transform: scale(1.05);
    }

    .featured-news-tag,
    .news-card-tag {
        position: absolute;
        top: 18px;
        left: 18px;
        padding: 7px 12px;
        border-radius: 999px;
        background: linear-gradient(135deg, #d10024, #ef3857);
        color: #fff;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }

    .featured-news-content {
        padding: 26px 26px 24px;
    }

    .news-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 14px;
        color: #677084;
        font-size: 12px;
        margin-bottom: 14px;
    }

    .news-meta i {
        color: #d10024;
        margin-right: 5px;
    }

    .featured-news-content h2 {
        margin: 0 0 14px;
        line-height: 1.35;
        font-size: clamp(22px, 2vw, 30px);
        letter-spacing: -0.03em;
    }

    .featured-news-content h2 a,
    .news-card h3 a,
    .side-news-content h4 a {
        color: #1d2230;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .featured-news-content h2 a:hover,
    .news-card h3 a:hover,
    .side-news-content h4 a:hover {
        color: #d10024;
    }

    .featured-news-content p {
        margin-bottom: 20px;
        color: #667084;
        line-height: 1.8;
    }

    .news-read-more {
        color: #d10024;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .news-read-more i {
        margin-left: 6px;
    }

    .news-side-list {
        height: 100%;
        border: 1px solid #edf0f6;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 12px 28px rgba(16, 20, 31, 0.04);
        overflow: hidden;
    }

    .side-news-item {
        display: flex;
        gap: 15px;
        padding: 18px 18px 16px;
        border-bottom: 1px solid #eef1f6;
        transition: background 0.2s ease;
    }

    .side-news-item:last-child {
        border-bottom: none;
    }

    .side-news-item:hover {
        background: #fafbff;
    }

    .side-news-image {
        width: 120px;
        min-width: 120px;
        height: 100px;
        overflow: hidden;
        border-radius: 12px;
        background: #f5f6fa;
    }

    .side-news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .news-category-label {
        display: inline-block;
        margin-bottom: 8px;
        color: #d10024;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }

    .side-news-content h4 {
        margin: 0 0 8px;
        font-size: 16px;
        line-height: 1.45;
    }

    .side-news-content p {
        margin: 0;
        color: #7b8394;
        font-size: 12px;
        font-weight: 600;
    }

    .side-news-content p i {
        color: #d10024;
        margin-right: 5px;
    }

    .news-list-section {
        padding: 48px 0 72px;
    }

    .news-card {
        height: 100%;
        margin-bottom: 28px;
        overflow: hidden;
        border: 1px solid #eef0f4;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 14px 32px rgba(18, 24, 35, 0.04);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 42px rgba(18, 24, 35, 0.12);
    }

    .news-card-image {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: #f5f6fa;
    }

    .news-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-card-image img {
        transform: scale(1.05);
    }

    .news-card-content {
        padding: 20px 20px 22px;
    }

    .news-card h3 {
        min-height: 52px;
        margin: 0 0 12px;
        font-size: 20px;
        line-height: 1.45;
        letter-spacing: -0.02em;
    }

    .news-card-content p {
        min-height: 78px;
        margin-bottom: 16px;
        color: #656f82;
        line-height: 1.75;
    }

    .news-sidebar {
        padding-left: 12px;
    }

    .sidebar-widget {
        margin-bottom: 26px;
        padding: 22px 20px;
        border: 1px solid #edf0f6;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 12px 28px rgba(16, 20, 31, 0.04);
    }

    .sidebar-title {
        margin: 0 0 18px;
        color: #1a1d2b;
        font-size: 17px;
        font-weight: 800;
        letter-spacing: -0.02em;
    }

    .sidebar-title i {
        margin-right: 8px;
        color: #d10024;
    }

    .news-search-box {
        display: flex;
        overflow: hidden;
        border-radius: 12px;
        border: 1px solid #edf0f6;
        background: #fff;
    }

    .news-search-box input {
        width: 100%;
        height: 44px;
        padding: 0 14px;
        border: 0;
        outline: none;
        color: #1d2230;
    }

    .news-search-box input:focus {
        border-color: #d10024;
    }

    .news-search-box button {
        width: 46px;
        border: 0;
        background: linear-gradient(135deg, #d10024, #ef3857);
        color: #fff;
        cursor: pointer;
    }

    .news-category-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .news-category-list li {
        border-bottom: 1px solid #eef1f6;
    }

    .news-category-list li:last-child {
        border-bottom: 0;
    }

    .news-category-list a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
        color: #5f6679;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .news-category-list a:hover {
        color: #d10024;
    }

    .news-category-list span {
        min-width: 28px;
        padding: 4px 8px;
        border-radius: 999px;
        background: #f4f5f8;
        color: #677084;
        font-size: 11px;
        text-align: center;
        font-weight: 700;
    }

    .newsletter-box {
        text-align: center;
        border-top: 4px solid #d10024;
    }

    .newsletter-box > i {
        display: inline-block;
        margin-bottom: 12px;
        color: #d10024;
        font-size: 36px;
    }

    .newsletter-box h3 {
        margin: 0 0 10px;
        color: #1a1d2b;
        font-size: 18px;
        font-weight: 800;
    }

    .newsletter-box p {
        color: #667084;
        line-height: 1.7;
        font-size: 14px;
    }

    .newsletter-box input {
        width: 100%;
        height: 44px;
        margin: 12px 0 10px;
        padding: 0 12px;
        border: 1px solid #edf0f6;
        border-radius: 12px;
        outline: none;
    }

    .newsletter-box input:focus {
        border-color: #d10024;
    }

    .newsletter-box .primary-btn {
        width: 100%;
        border: 0;
        border-radius: 12px;
    }

    @media (max-width: 991px) {
        .news-sidebar {
            padding-left: 0;
            margin-top: 14px;
        }
    }

    @media (max-width: 767px) {
        .news-hero {
            padding: 58px 0 44px;
        }

        .news-section-title {
            display: block;
        }

        .news-view-all {
            display: inline-block;
            margin-top: 12px;
        }

        .featured-news-image {
            height: 240px;
        }

        .side-news-item {
            padding: 14px;
        }

        .side-news-image {
            width: 94px;
            min-width: 94px;
            height: 82px;
        }

        .news-card-image {
            height: 220px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ad = document.getElementById('news-rotating-ad');

        if (!ad) {
            return;
        }

        var ads = [
            ['iPhone chính hãng giảm đến 2 triệu', 'Sắm iPhone mới với giá tốt hôm nay.'],
            ['Samsung Galaxy ưu đãi cực hời', 'Tiết kiệm ngay khi chọn Galaxy chính hãng.'],
            ['Thu cũ đổi mới, lên đời dễ dàng', 'Đổi máy cũ nhận ưu đãi cho sản phẩm mới.'],
            ['Giảm 15% phụ kiện công nghệ', 'Bảo vệ và nâng cấp thiết bị với phụ kiện chính hãng.'],
            ['iPad cho mùa học tập mới', 'Mua iPad kèm quà tặng thiết thực cho việc học.'],
            ['Miễn phí giao hàng toàn quốc', 'Đơn hàng từ 500.000đ được hỗ trợ phí vận chuyển.'],
            ['Voucher thành viên Mobile Mart', 'Đăng nhập để nhận mã giảm giá dành riêng cho bạn.'],
            ['Điện thoại gập, trải nghiệm khác biệt', 'Khám phá các mẫu máy gập đang được yêu thích.'],
            ['Trả góp 0% lãi suất', 'Chia nhỏ chi phí, sở hữu sản phẩm bạn mong muốn.'],
            ['Flash sale công nghệ mỗi ngày', 'Cơ hội săn giá tốt với số lượng có hạn.']
        ];
        var title = ad.querySelector('.news-rotating-ad__title');
        var description = ad.querySelector('.news-rotating-ad__description');
        var currentIndex = 0;
        var rotationTimer;

        function renderAd() {
            title.textContent = ads[currentIndex][0];
            description.textContent = ads[currentIndex][1];
            ad.hidden = false;
            ad.classList.remove('is-changing');
            void ad.offsetWidth;
            ad.classList.add('is-changing');
        }

        function rotateAd() {
            currentIndex = (currentIndex + 1) % ads.length;
            renderAd();
        }

        function startRotation() {
            renderAd();
            rotationTimer = window.setInterval(rotateAd, 5000);
        }

        ad.querySelector('.news-rotating-ad__close').addEventListener('click', function () {
            window.clearInterval(rotationTimer);
            ad.hidden = true;
        });

        window.setTimeout(startRotation, 5000);
    });
</script>
@endif
@endsection
<!-- ádsdaas -->
      <!-- ádsdaas -->
