@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="billing-details">
                    <div class="section-title"><h3 class="title">GỬI TIN NHẮN CHO CHÚNG TÔI</h3></div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group"><input class="input" type="text" name="name" placeholder="Họ và tên"></div>
                        <div class="form-group"><input class="input" type="email" name="email" placeholder="Email của bạn"></div>
                        <div class="form-group"><input class="input" type="text" name="phone" placeholder="Số điện thoại"></div>
                        <div class="form-group"><textarea class="input" rows="6" placeholder="Nội dung tin nhắn"></textarea></div>
                        <button class="primary-btn">Gửi liên hệ</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-title"><h3 class="title">THÔNG TIN CỬA HÀNG</h3></div>
                <p><strong>Electro Store</strong> - Chuyên điện thoại & phụ kiện chính hãng.</p>
                <ul class="list-unstyled" style="line-height:2">
                    <li><i class="fa fa-map-marker"></i> Hải Phòng, Việt Nam</li>
                    <li><i class="fa fa-phone"></i> 0902079427</li>
                    <li><i class="fa fa-envelope"></i> electro@gmail.com</li>
                    <li><i class="fa fa-clock-o"></i> 09:00 - 22:00 (Hàng ngày)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center"><h3 class="title">VỊ TRÍ CỬA HÀNG</h3></div>
                <iframe src="https://maps.google.com/maps?q=Hải%20Phòng&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="400" style="border:0; border-radius:10px" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection