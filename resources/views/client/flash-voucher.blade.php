{{-- =========================================================
    FLASH SALE VOUCHER
========================================================= --}}

<section class="flash-voucher-section">

    <div class="container">

        {{-- =====================================================
            HEADER
        ====================================================== --}}

        <div class="flash-voucher-header">

            <div>
                <span class="flash-label">
                    <i class="fa fa-bolt"></i>
                    FLASH SALE
                </span>

                <h2>
                    SĂN VOUCHER - GIẢM GIÁ CỰC SỐC
                </h2>

                <p>
                    Voucher số lượng có hạn - nhanh tay sử dụng!
                </p>
            </div>


            <div class="flash-countdown">

                <span>KẾT THÚC TRONG</span>

                <div class="countdown-box">

                    <strong id="flash-hours">00</strong>
                    <small>Giờ</small>

                    <strong>:</strong>

                    <strong id="flash-minutes">00</strong>
                    <small>Phút</small>

                    <strong>:</strong>

                    <strong id="flash-seconds">00</strong>
                    <small>Giây</small>

                </div>

            </div>

        </div>


        {{-- =====================================================
            VOUCHER
        ====================================================== --}}

        @if(isset($flashVouchers) && $flashVouchers->count() > 0)

            <div class="flash-voucher-list">

                @foreach($flashVouchers as $voucher)

                    <div class="flash-voucher-card">

                        <div class="flash-voucher-top">

                            <span class="flash-sale-badge">
                                FLASH SALE
                            </span>

                            <span class="flash-percent">
                                -{{ $voucher->discount_value }}%
                            </span>

                        </div>


                        <div class="flash-voucher-body">

                            <h3>
                                {{ $voucher->name }}
                            </h3>

                            <div class="voucher-code">
                                {{ $voucher->code }}
                            </div>

                            @if($voucher->max_discount)

                                <p>
                                    Giảm tối đa
                                    <strong>
                                        {{ number_format(
                                            $voucher->max_discount,
                                            0,
                                            ',',
                                            '.'
                                        ) }}₫
                                    </strong>
                                </p>

                            @endif

                            <p class="voucher-time">

                                <i class="fa fa-clock-o"></i>

                                {{ \Carbon\Carbon::parse(
                                    $voucher->start_date
                                )->format('d/m/Y') }}

                                -

                                {{ \Carbon\Carbon::parse(
                                    $voucher->end_date
                                )->format('d/m/Y') }}

                            </p>

                        </div>


                        <div class="flash-voucher-bottom">

                            <span>
                                Số lượng có hạn
                            </span>

                            <button
                                type="button"
                                class="flash-copy-btn"
                                onclick="copyVoucher('{{ $voucher->code }}')"
                            >
                                Lấy mã
                            </button>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="flash-empty">
                <i class="fa fa-ticket"></i>

                <p>
                    Hiện chưa có voucher Flash Sale.
                </p>
            </div>

        @endif


        {{-- =====================================================
            SỰ KIỆN TRUNG THU
        ====================================================== --}}

        <div class="mid-autumn-banner">

            <div class="mid-autumn-content">

                <span class="mid-autumn-small">
                    🌕 SỰ KIỆN ĐẶC BIỆT
                </span>

                <h2>
                    VOUCHER TRUNG THU
                </h2>

                <p>
                    Ưu đãi đặc biệt chỉ áp dụng trong thời gian sự kiện.
                </p>


                @if(isset($eventVouchers) && $eventVouchers->count() > 0)

                    <div class="mid-autumn-vouchers">

                        @foreach($eventVouchers as $voucher)

                            <div class="mid-autumn-voucher">

                                <div>

                                    <strong>
                                        {{ $voucher->code }}
                                    </strong>

                                    <span>
                                        Giảm
                                        {{ $voucher->discount_value }}%
                                    </span>

                                </div>

                                <button
                                    type="button"
                                    onclick="copyVoucher('{{ $voucher->code }}')"
                                >
                                    Lấy mã
                                </button>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="mid-autumn-no-voucher">
                        Voucher sự kiện sẽ sớm được mở!
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


<style>

.flash-voucher-section {
    padding: 45px 0;
    background: #f5f5f5;
}


/* HEADER */

.flash-voucher-header {
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-bottom: 25px;
    padding: 22px 25px;

    background: linear-gradient(
        135deg,
        #d10024,
        #ff3b30
    );

    border-radius: 12px;

    color: #fff;

    box-shadow:
        0 8px 25px rgba(209, 0, 36, 0.25);
}


.flash-label {
    display: inline-block;

    padding: 6px 12px;

    background: #fff;
    color: #d10024;

    border-radius: 20px;

    font-size: 12px;
    font-weight: 700;
}


.flash-voucher-header h2 {
    margin: 10px 0 5px;

    color: #fff;

    font-size: 28px;
    font-weight: 800;
}


.flash-voucher-header p {
    margin: 0;

    color: rgba(255,255,255,.9);
}


/* COUNTDOWN */

.flash-countdown {
    text-align: center;
}


.flash-countdown > span {
    display: block;

    margin-bottom: 8px;

    font-size: 12px;
    font-weight: 700;
}


.countdown-box {
    display: flex;
    align-items: center;
    gap: 6px;
}


.countdown-box strong {
    min-width: 42px;

    padding: 8px 5px;

    background: #fff;
    color: #d10024;

    border-radius: 5px;

    font-size: 18px;
}


.countdown-box small {
    font-size: 10px;
}


/* VOUCHER LIST */

.flash-voucher-list {
    display: grid;

    grid-template-columns:
        repeat(5, 1fr);

    gap: 15px;
}


.flash-voucher-card {
    background: #fff;

    border-radius: 10px;

    overflow: hidden;

    border: 1px solid #eee;

    box-shadow:
        0 5px 15px rgba(0,0,0,.08);

    transition: .25s;
}


.flash-voucher-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 10px 25px rgba(0,0,0,.15);
}


.flash-voucher-top {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 10px 12px;

    background: #fff3f3;
}


.flash-sale-badge {
    color: #d10024;

    font-size: 11px;
    font-weight: 700;
}


.flash-percent {
    padding: 5px 8px;

    background: #d10024;

    color: #fff;

    border-radius: 4px;

    font-size: 16px;
    font-weight: 800;
}


.flash-voucher-body {
    padding: 15px;
}


.flash-voucher-body h3 {
    min-height: 42px;

    margin: 0 0 10px;

    color: #2b2d42;

    font-size: 16px;
}


.voucher-code {
    display: inline-block;

    padding: 7px 12px;

    background: #fff5f5;

    border: 1px dashed #d10024;

    color: #d10024;

    border-radius: 5px;

    font-weight: 800;

    font-size: 14px;
}


.flash-voucher-body p {
    margin: 10px 0 0;

    color: #777;

    font-size: 12px;
}


.flash-voucher-body strong {
    color: #d10024;
}


.voucher-time {
    margin-top: 8px !important;
}


.flash-voucher-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 12px 15px;

    border-top: 1px solid #eee;
}


.flash-voucher-bottom span {
    color: #999;

    font-size: 11px;
}


.flash-copy-btn {
    border: 0;

    padding: 7px 12px;

    background: #d10024;
    color: #fff;

    border-radius: 4px;

    font-weight: 700;

    cursor: pointer;
}


.flash-copy-btn:hover {
    background: #a8001d;
}


/* TRUNG THU */

.mid-autumn-banner {
    position: relative;

    margin-top: 30px;

    padding: 35px;

    overflow: hidden;

    border-radius: 14px;

    background:
        linear-gradient(
            135deg,
            #15162b,
            #3b1d52,
            #8b1e3f
        );

    color: #fff;
}


.mid-autumn-content {
    position: relative;

    z-index: 2;
}


.mid-autumn-small {
    font-size: 13px;
    font-weight: 700;
}


.mid-autumn-banner h2 {
    margin: 8px 0;

    color: #ffd54f;

    font-size: 32px;
    font-weight: 800;
}


.mid-autumn-banner p {
    margin-bottom: 20px;

    color: rgba(255,255,255,.85);
}


.mid-autumn-vouchers {
    display: flex;

    flex-wrap: wrap;

    gap: 12px;
}


.mid-autumn-voucher {
    display: flex;
    justify-content: space-between;
    align-items: center;

    min-width: 230px;

    padding: 12px 15px;

    background: rgba(255,255,255,.12);

    border: 1px solid rgba(255,255,255,.2);

    border-radius: 8px;
}


.mid-autumn-voucher strong {
    display: block;

    color: #ffd54f;

    font-size: 17px;
}


.mid-autumn-voucher span {
    font-size: 12px;
}


.mid-autumn-voucher button {
    border: 0;

    padding: 7px 12px;

    background: #ffd54f;
    color: #3b1d52;

    border-radius: 5px;

    font-weight: 700;

    cursor: pointer;
}


.mid-autumn-no-voucher {
    display: inline-block;

    padding: 10px 15px;

    background: rgba(255,255,255,.1);

    border-radius: 6px;
}


/* EMPTY */

.flash-empty {
    padding: 40px;

    text-align: center;

    background: #fff;

    border-radius: 10px;
}


.flash-empty i {
    color: #d10024;

    font-size: 35px;
}


.flash-empty p {
    margin-top: 10px;

    color: #777;
}


/* RESPONSIVE */

@media (max-width: 991px) {

    .flash-voucher-list {
        grid-template-columns:
            repeat(2, 1fr);
    }

}


@media (max-width: 767px) {

    .flash-voucher-header {
        display: block;
    }

    .flash-countdown {
        margin-top: 20px;
        text-align: left;
    }

    .flash-voucher-list {
        grid-template-columns:
            1fr;
    }

    .mid-autumn-voucher {
        min-width: 100%;
    }

}

</style>


<script>

function copyVoucher(code)
{
    navigator.clipboard.writeText(code)
        .then(function () {

            alert(
                'Đã sao chép mã voucher: ' + code
            );

        })
        .catch(function () {

            alert(
                'Mã voucher: ' + code
            );

        });
}


/*
|--------------------------------------------------------------------------
| COUNTDOWN
|--------------------------------------------------------------------------
|
| Lấy thời gian kết thúc của voucher đầu tiên
|
*/

@php

    $flashEndTime = null;

    if (isset($flashVouchers) && $flashVouchers->count() > 0) {

        $flashEndTime =
            \Carbon\Carbon::parse(
                $flashVouchers->first()->end_date
            )->endOfDay()->timestamp * 1000;
    }

@endphp


let flashEndTime = @json($flashEndTime);


function updateFlashCountdown()
{

    if (!flashEndTime) {
        return;
    }


    const now =
        new Date().getTime();

    const distance =
        flashEndTime - now;


    if (distance <= 0) {

        document.getElementById(
            'flash-hours'
        ).innerText = '00';

        document.getElementById(
            'flash-minutes'
        ).innerText = '00';

        document.getElementById(
            'flash-seconds'
        ).innerText = '00';

        return;
    }


    const hours =
        Math.floor(
            distance /
            (1000 * 60 * 60)
        );


    const minutes =
        Math.floor(
            (
                distance %
                (1000 * 60 * 60)
            ) /
            (1000 * 60)
        );


    const seconds =
        Math.floor(
            (
                distance %
                (1000 * 60)
            ) /
            1000
        );


    document.getElementById(
        'flash-hours'
    ).innerText =
        String(hours).padStart(2, '0');


    document.getElementById(
        'flash-minutes'
    ).innerText =
        String(minutes).padStart(2, '0');


    document.getElementById(
        'flash-seconds'
    ).innerText =
        String(seconds).padStart(2, '0');
}


updateFlashCountdown();

setInterval(
    updateFlashCountdown,
    1000
);

</script>