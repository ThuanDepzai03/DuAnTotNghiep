@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-3">
                <form action="{{ route('shop') }}" method="GET">
                    <div class="aside-widget">
                        <h3 class="aside-title">Lọc theo giá</h3>
                        <div class="price-filter">
                            <div class="input-group">
                                <span class="input-group-addon">Từ:</span>
                                <input type="number" name="min_price" class="form-control" placeholder="0" value="{{ request('min_price') }}">
                            </div>
                            <div class="input-group mt-2" style="margin-top: 10px;">
                                <span class="input-group-addon">Đến:</span>
                                <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>
                    <div class="aside-widget">
                        <h3 class="aside-title">Danh mục</h3>
                        <div class="checkbox-filter">
                            <div class="input-radio">
                                <input type="radio" name="iddm" id="category-all" value="0" {{ (!request()->has('iddm') || request('iddm') == 0) ? 'checked' : '' }}>
                                <label for="category-all"><span></span>Tất cả</label>
                            </div>
                            @foreach ($danhmuc as $dm)
                                <div class="input-radio" style="margin-top: 5px;">
                                    <input type="radio" name="iddm" id="category-{{ $dm['id'] }}" value="{{ $dm['id'] }}" {{ (request('iddm') == $dm['id']) ? 'checked' : '' }}>
                                    <label for="category-{{ $dm['id'] }}"><span></span>{{ $dm['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="primary-btn btn-sm" style="width: 100%; margin-top: 20px; border: none;">
                        <i class="fa fa-filter"></i> ÁP DỤNG LỌC
                    </button>
                    <a href="{{ route('shop') }}" class="btn btn-default btn-sm" style="width: 100%; margin-top: 10px;">Bỏ lọc</a>
                </form>
            </div>
            
            <div class="col-md-9 row">
                @if (!empty($newProducts))
                    @foreach ($newProducts as $sp)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product">
                                <div class="product-img">
                                    <a href="{{ route('product.detail', $sp['id']) }}">
                                        <img src="{{ asset('admin/' . ($sp['img'] ?? 'default.png')) }}" alt="{{ $sp['name'] }}">
                                    </a>
                                    <div class="product-label"><span class="new">NEW</span></div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $sp['category_name'] ?? '' }}</p>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.detail', $sp['id']) }}">{{ $sp['name'] }}</a>
                                    </h3>
                                    <h4 class="product-price">
                                        {{ number_format($sp['price']) }} ₫
                                        <del class="product-old-price">{{ number_format($sp['price'] * 1.1) }} ₫</del>
                                    </h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
                                        <button class="quick-view"><i class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn" onclick="location.href='{{ route('cart.add', ['idsp' => $sp['id']]) }}'">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center">
                            <h4><i class="fa fa-search"></i> Không tìm thấy sản phẩm nào!</h4>
                            <p>Hãy thử thay đổi mức giá hoặc chọn danh mục khác.</p>
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="store-filter clearfix">
                <ul class="store-pagination">
                    <li class="active">1</li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .input-radio { display: flex; align-items: center; margin-bottom: 8px; cursor: pointer; }
    .input-radio input { margin-right: 10px; width: 16px; height: 16px; }
    .input-radio label { font-weight: 500; cursor: pointer; margin: 0; }
</style>
@endsection