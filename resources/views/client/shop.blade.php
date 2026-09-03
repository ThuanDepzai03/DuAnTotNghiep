@extends('layouts.master')

@section('content')
<div class="section shop-page">
    <div class="container">
        @php
            $activeGroup = request('group');
            $activeTitle = match ($activeGroup) {
                'phone' => 'Điện thoại',
                'accessories' => 'Phụ kiện',
                default => 'Tất cả sản phẩm',
            };
        @endphp

        <section class="shop-heading" aria-label="Điều hướng cửa hàng">
            <span class="shop-eyebrow"><i class="fa fa-shopping-bag"></i> AE Phoenix Store</span>
            <h1>Cửa hàng</h1>
            <p>Khám phá {{ strtolower($activeTitle) }} chính hãng, giá tốt và luôn được cập nhật.</p>
            <nav class="shop-main-tabs" aria-label="Nhóm sản phẩm">
                <a href="{{ route('shop') }}" class="{{ ! $activeGroup ? 'is-active' : '' }}">Tất cả sản phẩm</a>
                <a href="{{ route('shop', ['group' => 'phone']) }}" class="{{ $activeGroup === 'phone' ? 'is-active' : '' }}">Điện thoại</a>
                <a href="{{ route('shop', ['group' => 'accessories']) }}" class="{{ $activeGroup === 'accessories' ? 'is-active' : '' }}">Phụ kiện</a>
            </nav>
        </section>

        @if ($activeGroup)
            <section class="shop-discovery-panel">
                <div class="shop-section-heading">
                    <div>
                        <span class="shop-section-kicker">Thương hiệu</span>
                        <h2>{{ $activeTitle }}</h2>
                    </div>
                    <span class="shop-result-note">{{ $brands->count() }} thương hiệu đang có sản phẩm</span>
                </div>

                <div class="brand-strip">
                    <a href="{{ route('shop', ['group' => $activeGroup]) }}" class="brand-item {{ !request('brand_id') ? 'is-active' : '' }}" title="Tất cả thương hiệu">
                        <img src="{{ asset('img/logo.png') }}" alt="Tất cả thương hiệu">
                        <span class="brand-item__name">Tất cả</span>
                    </a>

                    @foreach ($brands as $brand)
                @php
                    $brandLogo = $brand->logo
                        ? (str_starts_with($brand->logo, 'http')
                            ? $brand->logo
                            : asset($brand->logo))
                        : asset('img/logo.png');
                @endphp

                        <a href="{{ route('shop', ['group' => $activeGroup, 'brand_id' => $brand->id]) }}" class="brand-item {{ (string) request('brand_id') === (string) $brand->id ? 'is-active' : '' }}" title="{{ $brand->name }}">
                            <img src="{{ $brandLogo }}" alt="{{ $brand->name }}" onerror="this.onerror=null;this.src='{{ asset('img/logo.png') }}';">
                            <span class="brand-item__name">{{ $brand->name }}</span>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($activeGroup === 'accessories' && $accessoryCategories->isNotEmpty())
            <section class="shop-category-panel">
                <div class="shop-section-heading">
                    <div>
                        <span class="shop-section-kicker">Danh mục phụ kiện</span>
                        <h2>Mua theo nhu cầu</h2>
                    </div>
                </div>
                <div class="accessory-category-list">
                    @foreach ($accessoryCategories as $category)
                        <a href="{{ route('shop', ['group' => 'accessories', 'category_id' => $category->id]) }}" class="accessory-category {{ (string) request('category_id') === (string) $category->id ? 'is-active' : '' }}">
                            <i class="fa {{ str_contains($category->slug, 'tai-nghe') ? 'fa-headphones' : (str_contains($category->slug, 'dong-ho') ? 'fa-clock-o' : (str_contains($category->slug, 'sac') ? 'fa-bolt' : (str_contains($category->slug, 'cuong') ? 'fa-shield' : 'fa-mobile')) ) }}"></i>
                            <span>{{ $category->name }}</span>
                            @if ($category->children->isNotEmpty())
                                <small>{{ $category->children->pluck('name')->join(', ') }}</small>
                            @endif
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($featuredProducts->isNotEmpty())
            <section class="featured-products-panel">
                <div class="shop-section-heading">
                    <div>
                        <span class="shop-section-kicker">Được yêu thích nhiều nhất</span>
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <span class="shop-result-note">Xếp hạng theo lượt xem</span>
                </div>
                <div class="featured-product-grid">
                    @foreach ($featuredProducts as $product)
                        @php
                            $variant = $product->variants->where('status', 1)->sortBy(fn ($item) => $item->sale_price ?? $item->price)->first();
                            $image = $product->thumbnail ?: 'img/product01.png';
                            $image = ltrim(str_replace('\\', '/', $image), '/');
                            $image = preg_match('#^https?://#', $image) ? $image : asset(str_starts_with($image, 'image/') || str_starts_with($image, 'img/') ? $image : 'image/' . $image);
                        @endphp
                        <article class="featured-product-card">
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="featured-product-image">
                                <span class="featured-badge">Nổi bật</span>
                                <img src="{{ $image }}" alt="{{ $product->name }}" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
                            </a>
                            <div class="featured-product-body">
                                <span class="featured-product-category">{{ $product->category?->name ?? 'Sản phẩm' }}</span>
                                <h3><a href="{{ route('product.detail', ['id' => $product->id]) }}">{{ $product->name }}</a></h3>
                                @if ($variant)
                                    <strong>{{ number_format($variant->sale_price ?? $variant->price, 0, ',', '.') }} ₫</strong>
                                    @if ($variant->sale_price)
                                        <del>{{ number_format($variant->price, 0, ',', '.') }} ₫</del>
                                    @endif
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="shop-products-heading">
            <div>
                <span class="shop-section-kicker">{{ $activeTitle }}</span>
                <h2>{{ $activeGroup === 'accessories' ? 'Sản phẩm phụ kiện' : ($activeGroup === 'phone' ? 'Sản phẩm điện thoại' : 'Tất cả sản phẩm') }}</h2>
            </div>
            <span class="shop-result-note">{{ $products->total() }} sản phẩm</span>
        </div>

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
                                @foreach ($category->children as $child)
                                    <div class="input-radio" style="margin-top: 5px; padding-left: 18px;">
                                        <input
                                            type="radio"
                                            name="category_id"
                                            id="category-{{ $child->id }}"
                                            value="{{ $child->id }}"
                                            {{ (string) request('category_id') === (string) $child->id ? 'checked' : '' }}
                                        >
                                        <label for="category-{{ $child->id }}">
                                            <span></span> {{ $child->name }}
                                        </label>
                                    </div>
                                @endforeach
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
                        @if(isset($colors) && $colors->isNotEmpty())
                            <div class="config-filter-item">
                                <strong>Màu sắc</strong>

                                <div class="config-options">
                                    @foreach($colors as $color)
                                        <label class="config-option">
                                            <input
                                                type="checkbox"
                                                name="colors[]"
                                                value="{{ $color->id }}"
                                                {{ in_array($color->id, $selectedColors ?? []) ? 'checked' : '' }}
                                            >
                                            <span>{{ $color->value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- RAM --}}
                        @if(isset($rams) && $rams->isNotEmpty())
                            <div class="config-filter-item">
                                <strong>RAM</strong>

                                <div class="config-options">
                                    @foreach($rams as $ram)
                                        <label class="config-option">
                                            <input
                                                type="checkbox"
                                                name="rams[]"
                                                value="{{ $ram->id }}"
                                                {{ in_array($ram->id, $selectedRams ?? []) ? 'checked' : '' }}
                                            >
                                            <span>{{ $ram->value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Bộ nhớ --}}
                        @if(isset($storages) && $storages->isNotEmpty())
                            <div class="config-filter-item">
                                <strong>Bộ nhớ</strong>

                                <div class="config-options">
                                    @foreach($storages as $storage)
                                        <label class="config-option">
                                            <input
                                                type="checkbox"
                                                name="storages[]"
                                                value="{{ $storage->id }}"
                                                {{ in_array($storage->id, $selectedStorages ?? []) ? 'checked' : '' }}
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
                <div class="row product-grid">
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

                            $oldPrice = ($cheapestVariant && $cheapestVariant->sale_price)
                                ? $cheapestVariant->price
                                : null;

                            $imgPath = ltrim(str_replace('\\', '/', (string) $product->thumbnail), '/');

                            if ($imgPath === '') {
                                $imgSrc = asset('img/product01.png');
                            } elseif (preg_match('#^https?://#i', $imgPath)) {
                                $imgSrc = $imgPath;
                            } else {
                                $imgPath = preg_replace('#^public/#i', '', $imgPath);

                                if (preg_match('#^(image/|img/|admin/|storage/)#i', $imgPath)) {
                                    $imgSrc = asset($imgPath);
                                } else {
                                    $imgSrc = asset('image/' . $imgPath);
                                }
                            }
                        @endphp

                        <div class="product-item-wrapper product-column">
                            <div class="product-card-custom">
                                <div class="product-card-thumb">
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                        <img
                                            src="{{ $imgSrc }}"
                                            alt="{{ $product->name }}"
                                            onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                        >
                                    </a>

                                    <span class="badge-new">MỚI</span>
                                </div>

                                <div class="product-card-info">
                                    <span class="cat-label">
                                        {{ $product->category?->name ?? 'Danh mục' }}
                                    </span>

                                    <h4 class="prod-title">
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h4>

                                    <div class="prod-price-box">
                                        <span class="main-price">{{ number_format($displayPrice, 0, ',', '.') }} ₫</span>

                                        @if ($oldPrice)
                                            <del class="old-price">
                                                {{ number_format($oldPrice, 0, ',', '.') }} ₫
                                            </del>
                                        @endif
                                    </div>

                                    <div class="prod-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>

                                    <div class="prod-actions">
                                        <button type="button" class="btn-icon" title="Yêu thích">
                                            <i class="fa fa-heart-o"></i>
                                        </button>

                                        <button type="button" class="btn-icon" title="So sánh">
                                            <i class="fa fa-exchange"></i>
                                        </button>

                                        <a
                                            class="btn-icon"
                                            title="Xem nhanh"
                                            href="{{ route('product.detail', ['id' => $product->id]) }}"
                                        >
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="product-card-bottom">
                                    @if ($cheapestVariant && ($cheapestVariant->stock ?? 1) > 0)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="product_variant_id"
                                                value="{{ $cheapestVariant->id }}"
                                            >
                                            <button type="submit" class="btn-add-cart">
                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                            </button>
                                        </form>
                                    @else
                                        <a
                                            href="{{ route('product.detail', ['id' => $product->id]) }}"
                                            class="btn-add-cart btn-view-detail"
                                        >
                                            <i class="fa fa-eye"></i> Xem chi tiết
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

@endsection