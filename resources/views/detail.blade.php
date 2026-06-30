@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="product-img">
                <img src="{{ asset('admin/' . ($product['img'] ?? 'default.png')) }}" alt="{{ $product['name'] }}" class="img-fluid">
            </div>
        </div>
        <div class="col-md-7">
            <div class="product-details">
                <h2 class="product-name">{{ $product['name'] }}</h2>
                <div>
                    <div class="product-rating">
                        @php $rating = $product['rating'] ?? 5; @endphp
                        @for ($i=1; $i<=5; $i++)
                            @if ($i <= $rating) <i class="fa fa-star"></i> @else <i class="fa fa-star-o"></i> @endif
                        @endfor
                    </div>
                    <a class="review-link" href="#tab3">10 Review(s) | Add your review</a>
                </div>
                <div>
                    <h3 class="product-price">
                        {{ number_format($product['price']) }} ₫
                        @if (!empty($product['old_price']))
                            <del class="product-old-price">{{ number_format($product['old_price']) }} ₫</del>
                        @endif
                    </h3>
                    <span class="product-available">In Stock</span>
                </div>
                <p>{{ $product['mota'] ?? 'Chưa có mô tả' }}</p>

                <div class="add-to-cart">
                    <div class="qty-label">
                        Qty
                        <div class="input-number">
                            <input type="number" value="1">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                    <button class="add-to-cart-btn" onclick="location.href='{{ route('cart.add', ['idsp' => $product['id']]) }}'">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                </div>

                <ul class="product-links">
                    <li>Category:</li>
                    <li><a href="{{ route('shop') }}">{{ $product['category_name'] ?? 'Danh mục' }}</a></li>
                </ul>
                <ul class="product-links">
                    <li>Share:</li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-12">
            <div id="product-tab">
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                    <li><a data-toggle="tab" href="#tab2">Details</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active">
                        <div class="row"><div class="col-md-12"><p>{{ $product['mota'] ?? 'Chưa có mô tả' }}</p></div></div>
                    </div>
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row"><div class="col-md-12"><p>Thông tin chi tiết sản phẩm.</p></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection