<aside class="rotating-ad" id="rotating-ad" aria-label="Quảng cáo ưu đãi" hidden>
    <button class="rotating-ad__close" type="button" aria-label="Đóng quảng cáo">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>

    <a class="rotating-ad__link" href="{{ route('shop') }}">
        <span class="rotating-ad__eyebrow">ƯU ĐÃI HÔM NAY</span>
        <strong class="rotating-ad__title"></strong>
        <span class="rotating-ad__description"></span>
        <span class="rotating-ad__cta">Xem ngay <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
    </a>
</aside>

<style>
    .rotating-ad {
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
        animation: rotating-ad-slide-in 0.35s ease-out;
    }

    .rotating-ad[hidden] {
        display: none;
    }

    .rotating-ad__link {
        display: block;
        padding: 20px 22px;
        color: #fff;
        text-decoration: none;
    }

    .rotating-ad__link:hover,
    .rotating-ad__link:focus {
        color: #fff;
        text-decoration: none;
    }

    .rotating-ad__close {
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

    .rotating-ad__close:hover,
    .rotating-ad__close:focus {
        background: rgba(0, 0, 0, 0.45);
        outline: 2px solid rgba(255, 255, 255, 0.7);
        outline-offset: 2px;
    }

    .rotating-ad__eyebrow,
    .rotating-ad__description,
    .rotating-ad__cta {
        display: block;
    }

    .rotating-ad__eyebrow {
        margin-bottom: 8px;
        color: #ffccd5;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .rotating-ad__title {
        display: block;
        max-width: 245px;
        margin-bottom: 7px;
        font-size: 19px;
        line-height: 1.25;
    }

    .rotating-ad__description {
        min-height: 20px;
        color: #f8e6e9;
        font-size: 13px;
        line-height: 1.5;
    }

    .rotating-ad__cta {
        margin-top: 13px;
        font-size: 12px;
        font-weight: 700;
    }

    .rotating-ad__cta i {
        margin-left: 5px;
    }

    .rotating-ad.is-changing .rotating-ad__link {
        animation: rotating-ad-content-change 0.3s ease-out;
    }

    @keyframes rotating-ad-slide-in {
        from { opacity: 0; transform: translateY(14px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes rotating-ad-content-change {
        from { opacity: 0; transform: translateX(8px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 480px) {
        .rotating-ad {
            left: 16px;
            right: 16px;
            bottom: 16px;
            width: auto;
        }

        .rotating-ad__link {
            padding: 17px 20px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ad = document.getElementById('rotating-ad');

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
            ['Voucher thành viên AE Phoenic', 'Đăng nhập để nhận mã giảm giá dành riêng cho bạn.'],
            ['Điện thoại gập, trải nghiệm khác biệt', 'Khám phá các mẫu máy gập đang được yêu thích.'],
            ['Trả góp 0% lãi suất', 'Chia nhỏ chi phí, sở hữu sản phẩm bạn mong muốn.'],
            ['Flash sale công nghệ mỗi ngày', 'Cơ hội săn giá tốt với số lượng có hạn.']
        ];
        var title = ad.querySelector('.rotating-ad__title');
        var description = ad.querySelector('.rotating-ad__description');
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

        ad.querySelector('.rotating-ad__close').addEventListener('click', function () {
            window.clearInterval(rotationTimer);
            ad.hidden = true;
        });

        window.setTimeout(startRotation, 5000);
    });
</script>
