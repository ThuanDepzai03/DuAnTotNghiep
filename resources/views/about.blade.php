@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="title" style="margin-bottom:15px">VỀ CHÚNG TÔI</h3>
                <p>Chào mừng bạn đến với <strong>Electro Store</strong> – cửa hàng chuyên cung cấp các sản phẩm điện tử như điện thoại, laptop, phụ kiện công nghệ chính hãng với giá tốt nhất.</p>
                <p>Chúng tôi luôn mong muốn đem lại cho khách hàng trải nghiệm mua sắm hiện đại, an toàn và thuận tiện nhất.</p>
                <ul class="list-unstyled" style="line-height: 2">
                    <li>✅ Sản phẩm chính hãng 100%</li>
                    <li>✅ Bảo hành đầy đủ</li>
                    <li>✅ Giá cạnh tranh trên thị trường</li>
                    <li>✅ Hỗ trợ khách hàng 24/7</li>
                    <li>✅ Giao hàng toàn quốc</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('image/about.jpg') }}" alt="About us" style="border-radius:10px" width="300px">
            </div>
        </div>
    </div>
</div>

<div class="section" style="background:#f9f9f9">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-title"><h3 class="title">TẠI SAO CHỌN CHÚNG TÔI?</h3></div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="fa fa-check-circle fa-2x" style="color:#D10024"></i>
                    <h4>Uy tín</h4>
                    <p>Hoạt động minh bạch, rõ ràng, đảm bảo quyền lợi cho khách hàng.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="fa fa-star fa-2x" style="color:#D10024"></i>
                    <h4>Chất lượng</h4>
                    <p>Sản phẩm được kiểm tra kỹ lưỡng trước khi đến tay khách hàng.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="fa fa-headphones fa-2x" style="color:#D10024"></i>
                    <h4>Hỗ trợ</h4>
                    <p>Luôn sẵn sàng hỗ trợ khi khách hàng cần.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection