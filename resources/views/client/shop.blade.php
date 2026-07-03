@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">

            {{-- Bộ lọc --}}
            <aside id="aside" class="col-md-3">
                <form action="{{ route('shop') }}" method="GET">

                    <div class="aside-widget">
                        <h3 class="aside-title">Tìm kiếm</h3>
                        <input
                            type="text"
                            name="keyword"
                            class="input"
                            placeholder="Nhập tên sản phẩm..."
                            value="{{ request('keyword') }}"
                        >
                    </div>

                    <div class="aside-widget">
                        <h3 class="aside-title">Lọc theo giá</h3>

                        <div class="price-filter">
                            <div class="input-group">
                                <span class="input-group-addon">Từ:</span>
                                <input
                                    type="number"
                                    name="min_price"
                                    class="form-control"
                                    placeholder="0"
                                    min="0"
                                    value="{{ request('min_price') }}"
                                >
                            </div>

                            <div class="input-group" style="margin-top: 10px;">
                                <span class="input-group-addon">Đến:</span>
                                <input
                                    type="number"
                                    name="max_price"
                                    class="form-control"
                                    placeholder="Max"
                                    min="0"
                                    value="{{ request('max_price') }}"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="aside-widget">
                        <h3 class="aside-title">Danh mục</h3>

                        <div class="checkbox-filter">
                            <div class="input-radio">
                                <input
                                    type="radio"
                                    name="category_id"
                                    id="category-all"
                                    value=""
                                    {{ !request('category_id') ? 'checked' : '' }}
                                >
                                <label for="category-all">
                                    <span></span> Tất cả
                                </label>
                            </div>

                            @foreach ($categories as $category)
                                <div class="input-radio" style="margin-top: 5px;">
                                    <input
                                        type="radio"
                                        name="category_id"
                                        id="category-{{ $category->id }}"
                                        value="{{ $category->id }}"
                                        {{ (string) request('category_id') === (string) $category->id ? 'checked' : '' }}
                                    >
                                    <label for="category-{{ $category->id }}">
                                        <span></span> {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="aside-widget">
                        <h3 class="aside-title">Thương hiệu</h3>

                        <select name="brand_id" class="input">
                            <option value="">Tất cả thương hiệu</option>

                            @foreach ($brands as $brand)
                                <option
                                    value="{{ $brand->id }}"
                                    {{ (string) request('brand_id') === (string) $brand->id ? 'selected' : '' }}
                                >
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Lọc theo cấu hình --}}
<div class="shop-filter-group config-filter-group">
    <h3 class="shop-filter-title">Cấu hình</h3>

    {{-- Màu sắc --}}
    @if($colors->isNotEmpty())
        <div class="config-filter-item">
            <strong>Màu sắc</strong>

            <div class="config-options">
                @foreach($colors as $color)
                    <label class="config-option">
                        <input
                            type="checkbox"
                            name="colors[]"
                            value="{{ $color->id }}"
                            {{ in_array($color->id, $selectedColors) ? 'checked' : '' }}
                        >

                        <span>{{ $color->value }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    {{-- RAM --}}
    @if($rams->isNotEmpty())
        <div class="config-filter-item">
            <strong>RAM</strong>

            <div class="config-options">
                @foreach($rams as $ram)
                    <label class="config-option">
                        <input
                            type="checkbox"
                            name="rams[]"
                            value="{{ $ram->id }}"
                            {{ in_array($ram->id, $selectedRams) ? 'checked' : '' }}
                        >

                        <span>{{ $ram->value }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Bộ nhớ --}}
    @if($storages->isNotEmpty())
        <div class="config-filter-item">
            <strong>Bộ nhớ</strong>

            <div class="config-options">
                @foreach($storages as $storage)
                    <label class="config-option">
                        <input
                            type="checkbox"
                            name="storages[]"
                            value="{{ $storage->id }}"
                            {{ in_array($storage->id, $selectedStorages) ? 'checked' : '' }}
                        >

                        <span>{{ $storage->value }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    @endif
</div>

                    <button
                        type="submit"
                        class="primary-btn btn-sm"
                        style="width: 100%; margin-top: 20px; border: none;"
                    >
                        <i class="fa fa-filter"></i> ÁP DỤNG LỌC
                    </button>

                    <a
                        href="{{ route('shop') }}"
                        class="btn btn-default btn-sm"
                        style="width: 100%; margin-top: 10px;"
                    >
                        Bỏ lọc
                    </a>
                </form>
            </aside>

            {{-- Danh sách sản phẩm --}}
            <main class="col-md-9">
                <div class="row">
                    @forelse ($products as $product)
                        @php
                            $activeVariants = $product->variants
                                ->where('status', 1)
                                ->sortBy(fn ($variant) => $variant->sale_price ?? $variant->price)
                                ->values();

                            $cheapestVariant = $activeVariants->first();

                            $displayPrice = $cheapestVariant
                                ? ($cheapestVariant->sale_price ?? $cheapestVariant->price)
                                : 0;

                            $oldPrice = $cheapestVariant?->sale_price
                                ? $cheapestVariant->price
                                : null;

                            $imgPath = $product->thumbnail ?? 'img/product01.png';
                            $imgPath = ltrim(str_replace('\\', '/', $imgPath), '/');

                            if (preg_match('#^https?://#', $imgPath)) {
                                $imgSrc = $imgPath;
                            } elseif (str_starts_with($imgPath, 'public/')) {
                                $imgSrc = asset(substr($imgPath, 7));
                            } elseif (
                                str_starts_with($imgPath, 'img/') ||
                                str_starts_with($imgPath, 'image/') ||
                                str_starts_with($imgPath, 'admin/') ||
                                str_starts_with($imgPath, 'products/') ||
                                str_starts_with($imgPath, 'storage/')
                            ) {
                                $imgSrc = asset($imgPath);
                            } else {
                                $imgSrc = asset('image/' . $imgPath);
                            }
                        @endphp

                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product">
                                <div class="product-img">
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                        <img
                                            src="{{ $imgSrc }}"
                                            alt="{{ $product->name }}"
                                            style="width: 100%; height: 250px; object-fit: cover;"
                                            onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                        >
                                    </a>

                                    <div class="product-label">
                                        <span class="new">MỚI</span>
                                    </div>
                                </div>

                                <div class="product-body">
                                    <p class="product-category">
                                        {{ $product->category?->name ?? 'Danh mục' }}
                                    </p>

                                    <h3 class="product-name">
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h3>

                                    <h4 class="product-price">
                                        Từ {{ number_format($displayPrice, 0, ',', '.') }} ₫

                                        @if ($oldPrice)
                                            <del class="product-old-price">
                                                {{ number_format($oldPrice, 0, ',', '.') }} ₫
                                            </del>
                                        @endif
                                    </h4>

                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <div class="product-btns">
                                        <button type="button" class="add-to-wishlist">
                                            <i class="fa fa-heart-o"></i>
                                        </button>

                                        <a
                                            class="quick-view"
                                            href="{{ route('product.detail', ['id' => $product->id]) }}"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="add-to-cart">
                                    @if ($cheapestVariant)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf

                                            <input
                                                type="hidden"
                                                name="product_variant_id"
                                                value="{{ $cheapestVariant->id }}"
                                            >

                                            <button type="submit" class="add-to-cart-btn">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm vào giỏ
                                            </button>
                                        </form>
                                    @else
                                        <a
                                            href="{{ route('product.detail', ['id' => $product->id]) }}"
                                            class="add-to-cart-btn"
                                        >
                                            <i class="fa fa-eye"></i>
                                            Xem chi tiết
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="alert alert-warning text-center">
                                <h4>
                                    <i class="fa fa-search"></i>
                                    Không tìm thấy sản phẩm nào!
                                </h4>
                                <p>Hãy thử thay đổi từ khóa, giá hoặc bộ lọc danh mục.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Phân trang --}}
                @if ($products->hasPages())
                    <div class="store-filter clearfix">
                        <ul class="store-pagination">
                            @if ($products->onFirstPage())
                                <li class="disabled">
                                    <span><i class="fa fa-angle-left"></i></span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $products->previousPageUrl() }}">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                            @endif

                            @for ($page = 1; $page <= $products->lastPage(); $page++)
                                <li class="{{ $products->currentPage() === $page ? 'active' : '' }}">
                                    <a href="{{ $products->url($page) }}">{{ $page }}</a>
                                </li>
                            @endfor

                            @if ($products->hasMorePages())
                                <li>
                                    <a href="{{ $products->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="disabled">
                                    <span><i class="fa fa-angle-right"></i></span>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
            </main>
        </div>
    </div>
</div>

<style>
    .input-radio {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        cursor: pointer;
    }

    .input-radio input {
        margin-right: 10px;
        width: 16px;
        height: 16px;
    }

    .input-radio label {
        font-weight: 500;
        cursor: pointer;
        margin: 0;
    }
</style>
<style>
    .config-filter-group {
        margin-top: 20px;
        padding-top: 5px;
        border-top: 1px solid #eeeeee;
    }

    .config-filter-item {
        margin-bottom: 18px;
    }

    .config-filter-item > strong {
        display: block;
        margin-bottom: 9px;
        color: #2b2d42;
        font-size: 14px;
    }

    .config-options {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        max-height: 125px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .config-option {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin: 0;
        padding: 6px 9px;
        border: 1px solid #e5e5e5;
        border-radius: 4px;
        background: #fff;
        color: #555;
        font-size: 13px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .config-option:hover {
        border-color: #d10024;
        color: #d10024;
    }

    .config-option input {
        width: 14px;
        height: 14px;
        margin: 0;
        accent-color: #d10024;
        cursor: pointer;
    }

    .config-option:has(input:checked) {
        border-color: #d10024;
        background: #fff1f3;
        color: #d10024;
        font-weight: 600;
    }
</style>
@endsection
