@extends('layouts.master')

@section('content')
<div class="section contact-page">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="contact-heading text-center">
                    <span class="contact-subtitle">
                        <i class="fa fa-headphones"></i> AE PHOENIC STORE
                    </span>

                    <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>

                    <p>
                        Chúng tôi luôn sẵn sàng tư vấn sản phẩm, hỗ trợ đặt hàng
                        và giải đáp các chính sách bảo hành.
                    </p>
                </div>
            </div>
        </div>

        <div class="row contact-main-row">
            {{-- Thông tin liên hệ --}}
            <div class="col-md-5">
                <div class="contact-info">
                    <div class="contact-info-icon">
                        <i class="fa fa-mobile"></i>
                    </div>

                    <h3>AE PHOENIC STORE</h3>

                    <p class="contact-intro">
                        Liên hệ với chúng tôi để được tư vấn điện thoại,
                        máy tính bảng và phụ kiện phù hợp nhất.
                    </p>

                    <div class="contact-detail">
                        <div class="contact-detail-icon">
                            <i class="fa fa-phone"></i>
                        </div>

                        <div>
                            <span>Hotline</span>
                            <strong>0987 654 321</strong>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <div class="contact-detail-icon">
                            <i class="fa fa-envelope"></i>
                        </div>

                        <div>
                            <span>Email</span>
                            <strong>aephoenic@gmail.com</strong>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <div class="contact-detail-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>

                        <div>
                            <span>Địa chỉ</span>
                            <strong>Hải Phòng, Việt Nam</strong>
                        </div>
                    </div>

                    <div class="contact-buttons">
                        <a href="tel:0987654321" class="primary-btn">
                            <i class="fa fa-phone"></i>
                            Gọi ngay
                        </a>

                        <a
                            href="https://www.google.com/maps/search/?api=1&query=Hai+Phong,+Vietnam"
                            target="_blank"
                            rel="noopener"
                            class="contact-map-link"
                        >
                            <i class="fa fa-location-arrow"></i>
                            Chỉ đường
                        </a>
                    </div>
                </div>
            </div>

            {{-- Form liên hệ --}}
            <div class="col-md-7">
                <div class="contact-form">
                    <div class="contact-form-title">
                        <div>
                            <span>HỖ TRỢ NHANH</span>
                            <h3>GỬI YÊU CẦU TƯ VẤN</h3>
                        </div>

                        <i class="fa fa-paper-plane"></i>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input
                                        type="text"
                                        class="input"
                                        placeholder="Nhập họ và tên"
                                    >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input
                                        type="text"
                                        class="input"
                                        placeholder="Nhập số điện thoại"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input
                                type="email"
                                class="input"
                                placeholder="Nhập email của bạn"
                            >
                        </div>

                        <div class="form-group">
                            <label>Nội dung cần hỗ trợ</label>
                            <textarea
                                class="input"
                                rows="5"
                                placeholder="Ví dụ: Tôi cần tư vấn iPhone phù hợp với ngân sách..."
                            ></textarea>
                        </div>

                        <button type="button" class="primary-btn contact-submit-btn">
                            <i class="fa fa-paper-plane"></i>
                            Gửi yêu cầu
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Google Map --}}
        <div class="row">
            <div class="col-md-12">
                <div class="contact-map">
                    <div class="contact-map-header">
                        <div>
                            <span class="contact-subtitle">
                                <i class="fa fa-map-marker"></i> VỊ TRÍ CỬA HÀNG
                            </span>

                            <h3>AE PHOENIC STORE TẠI HẢI PHÒNG</h3>

                            <p>
                                Bản đồ khu vực Hải Phòng. Bạn có thể bấm “Chỉ đường”
                                để mở Google Maps.
                            </p>
                        </div>

                        <a
                            href="https://www.google.com/maps/search/?api=1&query=Hai+Phong,+Vietnam"
                            target="_blank"
                            rel="noopener"
                            class="map-open-btn"
                        >
                            <i class="fa fa-external-link"></i>
                            Mở Google Maps
                        </a>
                    </div>

                    <iframe
                        src="https://www.google.com/maps?q=Hai+Phong,+Vietnam&z=12&output=embed"
                        width="100%"
                        height="420"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .contact-page {
        padding: 65px 0;
        background: #ffffff;
    }

    .contact-heading {
        max-width: 700px;
        margin: 0 auto 42px;
    }

    .contact-subtitle {
        display: inline-block;
        color: #d10024;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .contact-subtitle i {
        margin-right: 6px;
    }

    .contact-heading h2 {
        margin: 0 0 14px;
        color: #2b2d42;
        font-size: 31px;
        font-weight: 700;
    }

    .contact-heading p {
        margin: 0;
        color: #777;
        font-size: 16px;
        line-height: 1.7;
    }

    .contact-main-row {
        display: flex;
        align-items: stretch;
        margin-bottom: 38px;
    }

    .contact-info,
    .contact-form {
        height: 100%;
        min-height: 470px;
        padding: 34px;
        border: 1px solid #e7e7e7;
        border-radius: 8px;
    }

    .contact-info {
        position: relative;
        overflow: hidden;
        background: #2b2d42;
        color: #ffffff;
    }

    .contact-info::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        right: -70px;
        bottom: -80px;
        border-radius: 50%;
        background: rgba(209, 0, 36, 0.18);
    }

    .contact-info-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        border-radius: 50%;
        background: #d10024;
        font-size: 25px;
    }

    .contact-info h3 {
        margin: 0 0 12px;
        color: #fff;
        font-size: 23px;
        font-weight: 700;
    }

    .contact-intro {
        color: #c8cad2;
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .contact-detail {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 18px;
    }

    .contact-detail-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        color: #d10024;
    }

    .contact-detail span {
        display: block;
        color: #aeb1bc;
        font-size: 12px;
        margin-bottom: 2px;
    }

    .contact-detail strong {
        color: #fff;
        font-size: 14px;
    }

    .contact-buttons {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 28px;
    }

    .contact-map-link {
        color: #fff;
        font-weight: 700;
        text-decoration: none;
    }

    .contact-map-link:hover {
        color: #d10024;
    }

    .contact-map-link i {
        margin-right: 5px;
    }

    .contact-form {
        background: #fff;
    }

    .contact-form-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .contact-form-title span {
        display: block;
        color: #d10024;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 6px;
    }

    .contact-form-title h3 {
        margin: 0;
        color: #2b2d42;
        font-size: 22px;
        font-weight: 700;
    }

    .contact-form-title > i {
        color: #d10024;
        font-size: 34px;
    }

    .contact-form label {
        display: block;
        color: #2b2d42;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .contact-form .input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e1e1e1;
        border-radius: 4px;
        outline: none;
        transition: 0.2s;
    }

    .contact-form .input:focus {
        border-color: #d10024;
    }

    .contact-form textarea.input {
        resize: vertical;
    }

    .contact-submit-btn {
        border: none;
    }

    .contact-map {
        padding: 30px;
        border: 1px solid #e7e7e7;
        border-radius: 8px;
        background: #fff;
    }

    .contact-map-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .contact-map-header h3 {
        margin: 0 0 8px;
        color: #2b2d42;
        font-size: 22px;
        font-weight: 700;
    }

    .contact-map-header p {
        margin: 0;
        color: #777;
        line-height: 1.6;
    }

    .map-open-btn {
        display: inline-block;
        padding: 11px 17px;
        border: 1px solid #d10024;
        border-radius: 4px;
        color: #d10024;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }

    .map-open-btn:hover {
        background: #d10024;
        color: #fff;
    }

    .map-open-btn i {
        margin-right: 6px;
    }

    .contact-map iframe {
        display: block;
        width: 100%;
        border-radius: 6px;
    }

    @media (max-width: 991px) {
        .contact-main-row {
            display: block;
        }

        .contact-info,
        .contact-form {
            margin-bottom: 28px;
        }
    }

    @media (max-width: 767px) {
        .contact-page {
            padding: 45px 0;
        }

        .contact-heading h2 {
            font-size: 26px;
        }

        .contact-info,
        .contact-form,
        .contact-map {
            padding: 22px;
        }

        .contact-map-header {
            display: block;
        }

        .map-open-btn {
            margin-top: 15px;
        }

        .contact-map iframe {
            height: 300px;
        }
    }
</style>
@endsection
