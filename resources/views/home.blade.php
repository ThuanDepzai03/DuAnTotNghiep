@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Mới</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a href="{{ route('home', ['iddm' => 'all']) }}">Tất cả</a></li>
                            @if(isset($danhmuc))
                                @foreach ($danhmuc as $dm)
                                    <li><a href="{{ route('home', ['iddm' => $dm['id']]) }}">{{ $dm['name'] }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (!empty($newProducts))
                    @foreach ($newProducts as $sp)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="product">
                                <div class="product-img">
                                    <a href="{{ route('product.detail', $sp['id']) }}">
                                        @php
                                            $imgPath = $sp['img'] ?? 'img/product01.png';
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
                                        <img src="{{ $imgSrc }}" alt="{{ $sp['name'] }}" style="width: 100%; height: 250px; object-fit: cover;" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
                                    </a>
                                    <div class="product-label"><span class="new">MỚI</span></div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $sp['category_name'] ?? 'Danh mục' }}</p>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.detail', $sp['id']) }}">{{ $sp['name'] }}</a>
                                    </h3>
                                    <h4 class="product-price">{{ number_format($sp['price']) }} ₫</h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i></button>
                                        <button class="quick-view"><i class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <form action="{{ route('cart.add', ['idsp' => $sp['id']]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <p>Hiện chưa có sản phẩm nào.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection