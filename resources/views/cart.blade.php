@extends('layouts.master')

@section('content')
@php 
$cart = session('cart', []);
$tongTien = 0;
foreach ($cart as $item) {
    $tongTien += $item['price'] * $item['soLuong'];
}
@endphp

<div class="section">
    <div class="container">
        <h2 class="text-center" style="margin-bottom: 30px;">Giỏ Hàng Của Bạn</h2>
        @if(count($cart) > 0)
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td style="vertical-align: middle;">
                            @php
                                $imgPath = $item['img'] ?? 'img/product01.png';
                                $imgPath = ltrim(str_replace('\\', '/', $imgPath), '/');
                                if (preg_match('#^https?://#', $imgPath)) {
                                    $imgSrc = $imgPath;
                                } elseif (str_starts_with($imgPath, 'public/')) {
                                    $imgSrc = asset(substr($imgPath, 7));
                                } elseif (str_starts_with($imgPath, 'img/') || str_starts_with($imgPath, 'image/') || str_starts_with($imgPath, 'admin/')) {
                                    $imgSrc = asset($imgPath);
                                } else {
                                    $imgSrc = asset('image/' . $imgPath);
                                }
                            @endphp
                            <img src="{{ $imgSrc }}" alt="{{ $item['name'] }}" style="width: 80px; height: 80px; object-fit: cover;" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
                        </td>
                        <td style="vertical-align: middle;"><strong>{{ $item['name'] }}</strong></td>
                        <td style="vertical-align: middle; color: #D10024; font-weight: bold;">{{ number_format($item['price']) }}₫</td>
                        <td style="vertical-align: middle;">{{ $item['soLuong'] }}</td>
                        <td style="vertical-align: middle; color: #D10024; font-weight: bold;">{{ number_format($item['price'] * $item['soLuong']) }}₫</td>
                        <td style="vertical-align: middle;">
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Tổng thanh toán:</strong></td>
                        <td colspan="2" class="text-left" style="color: #D10024; font-size: 20px; font-weight: bold;">{{ number_format($tongTien) }}₫</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right">
                <a href="{{ route('shop') }}" class="btn btn-default" style="padding: 10px 20px; font-weight: bold;">Tiếp tục mua hàng</a>
                <a href="{{ route('checkout.show') }}" class="primary-btn" style="padding: 10px 20px;">Thanh toán ngay</a>
            </div>
        @else
            <div class="alert alert-warning text-center">
                Giỏ hàng của bạn đang trống! <a href="{{ route('home') }}">Quay lại cửa hàng</a>
            </div>
        @endif
    </div>
</div>
@endsection