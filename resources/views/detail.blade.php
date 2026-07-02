@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="product-img">
                    @php
                        $imgPath = $product['img'] ?? 'img/product01.png';
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
                    <img src="{{ $imgSrc }}" alt="{{ $product['name'] }}" style="width: 100%; border: 1px solid #eee;" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
                </div>
            </div>
            <div class="col-md-7">
                <div class="product-details">
                    <h2 class="product-name">{{ $product['name'] }}</h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="product-price">
                            {{ number_format($product['price']) }} ₫
                        </h3>
                        <span class="product-available">Còn hàng</span>
                    </div>
                    <p>{{ $product['mota'] ?? 'Chưa có mô tả cho sản phẩm này.' }}</p>

                    <div class="add-to-cart" style="margin-top: 20px;">
                        <form action="{{ route('cart.add', ['idsp' => $product['id']]) }}" method="POST">
                            @csrf
                            <div class="qty-label">
                                Số lượng
                                <div class="input-number">
                                    <input type="number" name="soLuong" value="1" min="1">
                                </div>
                            </div>
                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                        </form>
                    </div>

                    <ul class="product-links">
                        <li>Danh mục:</li>
                        <li><a href="{{ route('shop') }}">{{ $product['category_name'] ?? 'Điện thoại' }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection