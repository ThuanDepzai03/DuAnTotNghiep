@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-title">
            <h3 class="title">Sản phẩm yêu thích</h3>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @forelse($products as $product)
                @php
                    $variant = $product->variants->where('status', 1)->sortBy(fn ($item) => $item->sale_price ?? $item->price)->first();
                    $image = ltrim(str_replace('\\', '/', $product->thumbnail ?? 'img/product01.png'), '/');
                    $image = preg_match('#^https?://#', $image) ? $image : asset($image);
                @endphp
                <div class="col-md-3 col-sm-6">
                    <div class="product">
                        <div class="product-img">
                            <a href="{{ route('product.detail', $product->id) }}">
                                <img src="{{ $image }}" alt="{{ $product->name }}" style="width:100%; height:220px; object-fit:cover;">
                            </a>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $product->category?->name ?? 'Sản phẩm' }}</p>
                            <h3 class="product-name"><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                            <h4 class="product-price">{{ number_format($variant?->sale_price ?? $variant?->price ?? 0, 0, ',', '.') }} ₫</h4>
                            <form action="{{ route('wishlist.toggle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-link">Bỏ yêu thích</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>Danh sách yêu thích đang trống.</p>
                    <a href="{{ route('shop') }}" class="primary-btn">Xem sản phẩm</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
<!-- ádsdaas -->