@extends('layouts.master')

@section('content')
<div class="section about-page">
    <div class="container">

        {{-- Phần giới thiệu --}}
        <div class="row about-intro-row">
            <div class="col-md-6">
                <div class="about-content">
                    <span class="about-subtitle">
                        <i class="fa fa-heart"></i> AE PHOENIC STORE
                    </span>

                    <h1 class="about-title">Công nghệ tốt hơn cho cuộc sống hiện đại</h1>

                    <p class="about-desc">
                        Chào mừng bạn đến với <strong>AE Phoenic Store</strong> – cửa hàng
                        chuyên cung cấp điện thoại, máy tính bảng và phụ kiện công nghệ
                        với trải nghiệm mua sắm tiện lợi, rõ ràng và an tâm.
                    </p>

                    <p class="about-desc">
                        Chúng tôi mong muốn giúp khách hàng lựa chọn đúng sản phẩm theo
                        nhu cầu sử dụng, màu sắc, dung lượng bộ nhớ và mức giá phù hợp.
                    </p>

                    <div class="about-features">
                        <div class="about-feature">
                            <div class="feature-icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div>
                                <h4>Sản phẩm chính hãng</h4>
                                <p>Thông tin sản phẩm và biến thể được hiển thị rõ ràng.</p>
                            </div>
                        </div>

                        <div class="about-feature">
                            <div class="feature-icon">
                                <i class="fa fa-shield"></i>
                            </div>
                            <div>
                                <h4>Bảo hành minh bạch</h4>
                                <p>Chính sách hỗ trợ rõ ràng trong suốt quá trình mua sắm.</p>
                            </div>
                        </div>

                        <div class="about-feature">
                            <div class="feature-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div>
                                <h4>Giao hàng tiện lợi</h4>
                                <p>Hỗ trợ giao hàng nhanh và kiểm tra thông tin đơn hàng.</p>
                            </div>
                        </div>
                    </div>

                    <div class="about-actions">
                        <a href="{{ route('shop') }}" class="primary-btn">
                            <i class="fa fa-shopping-bag"></i>
                            Khám phá sản phẩm
                        </a>

                        <a href="{{ route('contact') }}" class="about-contact-btn">
                            Liên hệ tư vấn
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-image-box">
                    <img
                        src="{{ asset('image/about.jpg') }}"
                        alt="AE Phoenic Store"
                        class="about-image"
                        onerror="this.onerror=null;this.src='{{ asset('image/ipad10_blue.jpg') }}';"
                    >

                    <div class="about-image-label">
                        <i class="fa fa-mobile"></i>
                        <div>
                            <strong>Công nghệ chính hãng</strong>
                            <span>Giá tốt · Dễ lựa chọn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Lý do chọn cửa hàng --}}
<div class="section about-service-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="about-subtitle">
                    <i class="fa fa-star"></i> CAM KẾT CỦA CHÚNG TÔI
                </span>

                <h2 class="service-heading">TẠI SAO CHỌN AE PHOENIC STORE?</h2>

                <p class="service-heading-desc">
                    Không chỉ là nơi bán sản phẩm, chúng tôi muốn mang đến trải nghiệm
                    mua sắm công nghệ đơn giản và đáng tin cậy.
                </p>
            </div>
        </div>

        <div class="row service-list">
            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa fa-check-circle"></i>
                    </div>

                    <h4>Uy tín và minh bạch</h4>

                    <p>
                        Thông tin sản phẩm, giá bán và các phiên bản màu sắc,
                        dung lượng được hiển thị rõ ràng.
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa fa-star"></i>
                    </div>

                    <h4>Chất lượng sản phẩm</h4>

                    <p>
                        Sản phẩm được lựa chọn kỹ lưỡng để phù hợp với nhu cầu
                        học tập, làm việc và giải trí.
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa fa-headphones"></i>
                    </div>

                    <h4>Hỗ trợ tận tâm</h4>

                    <p>
                        Đội ngũ hỗ trợ luôn sẵn sàng tư vấn sản phẩm và giải đáp
                        các vấn đề liên quan đến đơn hàng.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Banner liên hệ --}}
<div class="section about-cta-section">
    <div class="container">
        <div class="about-cta">
            <div>
                <h3>Bạn cần tư vấn chọn sản phẩm?</h3>
                <p>Liên hệ AE Phoenic Store để được hỗ trợ nhanh chóng.</p>
            </div>

            <a href="{{ route('contact') }}" class="about-cta-btn">
                Liên hệ ngay
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<style>
    .about-page {
        padding: 70px 0;
        background: #fff;
    }

    .about-intro-row {
        display: flex;
        align-items: center;
    }

    .about-subtitle {
        display: inline-block;
        color: #d10024;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }

    .about-subtitle i {
        margin-right: 6px;
    }

    .about-title {
        color: #2b2d42;
        font-size: 34px;
        line-height: 1.3;
        font-weight: 700;
        margin: 0 0 22px;
    }

    .about-desc {
        color: #666;
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 16px;
    }

    .about-features {
        margin-top: 28px;
    }

    .about-feature {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 20px;
    }

    .feature-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #fff1f3;
        color: #d10024;
        font-size: 20px;
    }

    .about-feature h4 {
        margin: 0 0 5px;
        color: #2b2d42;
        font-size: 16px;
        font-weight: 700;
    }

    .about-feature p {
        margin: 0;
        color: #777;
        line-height: 1.6;
    }

    .about-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        margin-top: 30px;
    }

    .about-contact-btn {
        color: #2b2d42;
        font-weight: 700;
        text-decoration: none;
    }

    .about-contact-btn:hover {
        color: #d10024;
    }

    .about-contact-btn i {
        margin-left: 6px;
    }

    .about-image-box {
        position: relative;
        padding: 15px;
        margin-left: 20px;
    }

    .about-image-box::before {
        content: "";
        position: absolute;
        width: 85%;
        height: 85%;
        top: 0;
        right: 0;
        background: #fff1f3;
        border-radius: 14px;
        z-index: 0;
    }

    .about-image {
        position: relative;
        z-index: 1;
        width: 100%;
        height: 390px;
        object-fit: cover;
        border-radius: 14px;
        box-shadow: 0 12px 35px rgba(43, 45, 66, 0.15);
    }

    .about-image-label {
        position: absolute;
        z-index: 2;
        left: -5px;
        bottom: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 18px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 8px 25px rgba(43, 45, 66, 0.15);
    }

    .about-image-label > i {
        color: #d10024;
        font-size: 27px;
    }

    .about-image-label strong {
        display: block;
        color: #2b2d42;
        font-size: 14px;
    }

    .about-image-label span {
        display: block;
        color: #8d99ae;
        font-size: 12px;
        margin-top: 3px;
    }

    .about-service-section {
        padding: 70px 0;
        background: #f8f9fb;
    }

    .service-heading {
        color: #2b2d42;
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .service-heading-desc {
        max-width: 680px;
        margin: 0 auto;
        color: #777;
        line-height: 1.7;
    }

    .service-list {
        margin-top: 42px;
    }

    .service-card {
        height: 100%;
        padding: 32px 25px;
        text-align: center;
        background: #fff;
        border: 1px solid #eeeeee;
        border-radius: 8px;
        transition: 0.25s ease;
        margin-bottom: 25px;
    }

    .service-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 30px rgba(43, 45, 66, 0.12);
        border-color: #d10024;
    }

    .service-icon {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: #fff1f3;
        color: #d10024;
        font-size: 28px;
    }

    .service-card h4 {
        color: #2b2d42;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .service-card p {
        color: #777;
        line-height: 1.7;
        margin: 0;
    }

    .about-cta-section {
        padding: 55px 0;
        background: #fff;
    }

    .about-cta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
        padding: 35px 42px;
        border-radius: 10px;
        background: #2b2d42;
    }

    .about-cta h3 {
        color: #fff;
        margin: 0 0 8px;
        font-size: 24px;
        font-weight: 700;
    }

    .about-cta p {
        margin: 0;
        color: #b9babc;
        font-size: 15px;
    }

    .about-cta-btn {
        display: inline-block;
        padding: 13px 24px;
        border-radius: 4px;
        background: #d10024;
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }

    .about-cta-btn:hover {
        color: #fff;
        background: #ef233c;
    }

    .about-cta-btn i {
        margin-left: 8px;
    }

    @media (max-width: 991px) {
        .about-intro-row {
            display: block;
        }

        .about-image-box {
            margin: 45px 0 0;
        }
    }

    @media (max-width: 767px) {
        .about-page,
        .about-service-section {
            padding: 45px 0;
        }

        .about-title {
            font-size: 27px;
        }

        .about-image {
            height: 290px;
        }

        .about-image-label {
            left: 10px;
        }

        .about-cta {
            display: block;
            padding: 28px;
        }

        .about-cta-btn {
            margin-top: 20px;
        }
    }
</style>
@endsection
