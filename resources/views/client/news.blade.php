@extends('layouts.master')

@section('content')
<div class="news-page">

    {{-- Banner đầu trang --}}
    <section class="news-hero">
        <div class="container">
            <div class="news-hero-content">
                <span class="news-hero-subtitle">
                    <i class="fa fa-newspaper-o"></i>
                    AE PHOENIC STORE
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
                                    AE Phoenic Store
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

<style>
    .news-page {
        background: #fff;
    }

    /* Hero */
    .news-hero {
        padding: 72px 0;
        background: linear-gradient(135deg, #15161d, #2b2d42);
        color: #fff;
    }

    .news-hero-content {
        max-width: 780px;
        margin: 0 auto;
        text-align: center;
    }

    .news-hero-subtitle,
    .section-subtitle {
        display: inline-block;
        color: #d10024;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 14px;
    }

    .news-hero-subtitle i,
    .section-subtitle i {
        margin-right: 6px;
    }

    .news-hero h1 {
        margin: 0 0 15px;
        font-size: 40px;
        font-weight: 700;
        color: #fff;
    }

    .news-hero p {
        max-width: 650px;
        margin: 0 auto;
        color: #c8cad2;
        font-size: 16px;
        line-height: 1.8;
    }

    .news-category-nav {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 28px;
    }

    .news-category-nav a {
        padding: 9px 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .news-category-nav a:hover,
    .news-category-nav a.active {
        color: #fff;
        border-color: #d10024;
        background: #d10024;
    }

    /* Tiêu đề section */
    .news-section-title {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 30px;
        border: 0;
    }

    .news-section-title .title {
        margin: 0;
        color: #2b2d42;
    }

    .news-view-all {
        color: #d10024;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .news-view-all i {
        margin-left: 5px;
    }

    /* Tin nổi bật */
    .news-featured-section {
        padding: 65px 0 30px;
    }

    .featured-news-card {
        overflow: hidden;
        border: 1px solid #e7e7e7;
        border-radius: 8px;
        background: #fff;
    }

    .featured-news-image {
        position: relative;
        height: 350px;
        overflow: hidden;
        background: #f8f8f8;
    }

    .featured-news-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: 0.35s;
    }

    .featured-news-card:hover .featured-news-image img {
        transform: scale(1.05);
    }

    .featured-news-tag,
    .news-card-tag {
        position: absolute;
        top: 16px;
        left: 16px;
        padding: 6px 10px;
        background: #d10024;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .featured-news-content {
        padding: 25px;
    }

    .news-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        color: #8d99ae;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .news-meta i {
        color: #d10024;
        margin-right: 4px;
    }

    .featured-news-content h2 {
        margin: 0 0 14px;
        line-height: 1.4;
        font-size: 25px;
    }

    .featured-news-content h2 a,
    .news-card h3 a,
    .side-news-content h4 a {
        color: #2b2d42;
        text-decoration: none;
        transition: 0.2s;
    }

    .featured-news-content h2 a:hover,
    .news-card h3 a:hover,
    .side-news-content h4 a:hover {
        color: #d10024;
    }

    .featured-news-content p {
        margin-bottom: 18px;
        color: #777;
        line-height: 1.8;
    }

    .news-read-more {
        color: #d10024;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .news-read-more i {
        margin-left: 5px;
    }

    /* Tin bên phải */
    .news-side-list {
        border: 1px solid #e7e7e7;
        border-radius: 8px;
        overflow: hidden;
    }

    .side-news-item {
        display: flex;
        gap: 15px;
        padding: 18px;
        border-bottom: 1px solid #eeeeee;
    }

    .side-news-item:last-child {
        border-bottom: none;
    }

    .side-news-image {
        width: 110px;
        min-width: 110px;
        height: 95px;
        overflow: hidden;
        background: #f8f8f8;
    }

    .side-news-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .news-category-label {
        display: inline-block;
        margin-bottom: 6px;
        color: #d10024;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.8px;
    }

    .side-news-content h4 {
        margin: 0 0 8px;
        font-size: 15px;
        line-height: 1.45;
    }

    .side-news-content p {
        margin: 0;
        color: #8d99ae;
        font-size: 12px;
    }

    .side-news-content p i {
        color: #d10024;
        margin-right: 4px;
    }

    /* Danh sách tin */
    .news-list-section {
        padding: 45px 0 65px;
    }

    .news-card {
        height: 100%;
        margin-bottom: 30px;
        overflow: hidden;
        border: 1px solid #e7e7e7;
        border-radius: 8px;
        background: #fff;
        transition: 0.25s;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(43, 45, 66, 0.12);
    }

    .news-card-image {
        position: relative;
        height: 210px;
        overflow: hidden;
        background: #f8f8f8;
    }

    .news-card-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: 0.3s;
    }

    .news-card:hover .news-card-image img {
        transform: scale(1.05);
    }

    .news-card-content {
        padding: 20px;
    }

    .news-card h3 {
        min-height: 52px;
        margin: 0 0 12px;
        font-size: 18px;
        line-height: 1.45;
    }

    .news-card-content p {
        min-height: 75px;
        margin-bottom: 15px;
        color: #777;
        line-height: 1.7;
    }

    /* Sidebar */
    .news-sidebar {
        padding-left: 15px;
    }

    .sidebar-widget {
        margin-bottom: 28px;
        padding: 24px;
        border: 1px solid #e7e7e7;
        border-radius: 8px;
        background: #fff;
    }

    .sidebar-title {
        margin: 0 0 18px;
        color: #2b2d42;
        font-size: 16px;
        font-weight: 700;
    }

    .sidebar-title i {
        margin-right: 7px;
        color: #d10024;
    }

    .news-search-box {
        display: flex;
    }

    .news-search-box input {
        width: 100%;
        height: 42px;
        padding: 0 12px;
        border: 1px solid #e7e7e7;
        outline: none;
    }

    .news-search-box input:focus {
        border-color: #d10024;
    }

    .news-search-box button {
        width: 45px;
        border: 0;
        background: #d10024;
        color: #fff;
    }

    .news-category-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .news-category-list li {
        border-bottom: 1px solid #eeeeee;
    }

    .news-category-list li:last-child {
        border-bottom: 0;
    }

    .news-category-list a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 11px 0;
        color: #666;
        text-decoration: none;
        transition: 0.2s;
    }

    .news-category-list a:hover {
        color: #d10024;
    }

    .news-category-list span {
        min-width: 25px;
        padding: 2px 6px;
        border-radius: 12px;
        background: #f1f1f1;
        color: #8d99ae;
        font-size: 11px;
        text-align: center;
    }

    .newsletter-box {
        text-align: center;
        border-top: 3px solid #d10024;
    }

    .newsletter-box > i {
        display: inline-block;
        margin-bottom: 12px;
        color: #d10024;
        font-size: 35px;
    }

    .newsletter-box h3 {
        margin: 0 0 10px;
        color: #2b2d42;
        font-size: 18px;
        font-weight: 700;
    }

    .newsletter-box p {
        color: #777;
        line-height: 1.7;
        font-size: 14px;
    }

    .newsletter-box input {
        width: 100%;
        height: 42px;
        margin: 10px 0;
        padding: 0 12px;
        border: 1px solid #e7e7e7;
        outline: none;
    }

    .newsletter-box input:focus {
        border-color: #d10024;
    }

    .newsletter-box .primary-btn {
        width: 100%;
        border: 0;
    }

    @media (max-width: 991px) {
        .news-sidebar {
            padding-left: 0;
            margin-top: 15px;
        }
    }

    @media (max-width: 767px) {
        .news-hero {
            padding: 50px 0;
        }

        .news-hero h1 {
            font-size: 30px;
        }

        .news-section-title {
            display: block;
        }

        .news-view-all {
            display: inline-block;
            margin-top: 12px;
        }

        .featured-news-image {
            height: 250px;
        }

        .side-news-item {
            padding: 14px;
        }

        .side-news-image {
            width: 90px;
            min-width: 90px;
            height: 80px;
        }

        .news-card-image {
            height: 220px;
        }
    }
</style>
@endsection
