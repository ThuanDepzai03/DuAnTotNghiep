@extends('layouts.master')

@section('content')
<div class="section shop-page">
    <div class="container">
        @php
            $activeGroup = request('group');
            $activeTitle = match ($activeGroup) {
                'phone' => 'Điện thoại',
                'tablet' => 'Máy tính bảng',
                'laptop' => 'Laptop',
                'accessories' => 'Phụ kiện',
                default => 'Tất cả sản phẩm',
            };

            // Active filter tracking
            $hasKeyword = request()->filled('keyword');
            $hasCategory = request()->filled('category_id');
            $hasBrand = request()->filled('brand_id');
            $hasMinPrice = request()->filled('min_price');
            $hasMaxPrice = request()->filled('max_price');
            $hasColors = !empty($selectedColors);
            $hasRams = !empty($selectedRams);
            $hasStorages = !empty($selectedStorages);

            $selectedCategoryModel = $hasCategory ? \App\Models\Category::find(request('category_id')) : null;
            $selectedBrandModel = $hasBrand ? \App\Models\Brand::find(request('brand_id')) : null;

            $hasAnyFilter = $hasKeyword || $hasCategory || $hasBrand || $hasMinPrice || $hasMaxPrice || $hasColors || $hasRams || $hasStorages;
        @endphp

        {{-- SHOP HEADER & TABS --}}
        <section class="shop-heading" aria-label="Điều hướng cửa hàng">
            <span class="shop-eyebrow"><i class="fa fa-shopping-bag"></i> MOBILE MART STORE</span>
            <h1>{{ $activeTitle }}</h1>
            <p>Khám phá hệ sinh thái {{ strtolower($activeTitle) }} chính hãng, bảo hành toàn diện và giá ưu đãi tốt nhất.</p>

            <nav class="shop-main-tabs" aria-label="Nhóm sản phẩm">
                <a href="{{ route('shop') }}" class="{{ ! $activeGroup ? 'is-active' : '' }}">
                    <i class="fa fa-th-large"></i> Tất cả
                </a>
                <a href="{{ route('shop', ['group' => 'phone']) }}" class="{{ $activeGroup === 'phone' ? 'is-active' : '' }}">
                    <i class="fa fa-mobile"></i> Điện thoại
                </a>
                <a href="{{ route('shop', ['group' => 'tablet']) }}" class="{{ $activeGroup === 'tablet' ? 'is-active' : '' }}">
                    <i class="fa fa-tablet"></i> Máy tính bảng
                </a>
                <a href="{{ route('shop', ['group' => 'laptop']) }}" class="{{ $activeGroup === 'laptop' ? 'is-active' : '' }}">
                    <i class="fa fa-laptop"></i> Laptop
                </a>
                <a href="{{ route('shop', ['group' => 'accessories']) }}" class="{{ $activeGroup === 'accessories' ? 'is-active' : '' }}">
                    <i class="fa fa-headphones"></i> Phụ kiện
                </a>
            </nav>
        </section>

        {{-- BRAND STRIP --}}
        @if ($brands->isNotEmpty())
            <section class="shop-discovery-panel">
                <div class="shop-section-heading">
                    <div>
                        <span class="shop-section-kicker">Thương hiệu</span>
                        <h2>{{ $activeGroup ? $activeTitle : 'Chọn theo hãng' }}</h2>
                    </div>
                    <span class="shop-result-note">{{ $brands->count() }} thương hiệu có sẵn</span>
                </div>

                <div class="brand-strip">
                    <a href="{{ route('shop', array_merge(request()->except(['brand_id', 'page']), $activeGroup ? ['group' => $activeGroup] : [])) }}"
                       class="brand-item {{ !request('brand_id') ? 'is-active' : '' }}"
                       title="Tất cả thương hiệu">
                        <span class="brand-item__icon"><i class="fa fa-th"></i></span>
                        <span class="brand-item__name">Tất cả</span>
                    </a>

                    @foreach ($brands as $brand)
                        @php
                            $brandLogo = $brand->logo
                                ? (str_starts_with($brand->logo, 'http')
                                    ? $brand->logo
                                    : asset($brand->logo))
                                : null;
                        @endphp

                        <a href="{{ route('shop', array_merge(request()->except(['page']), array_filter(['group' => $activeGroup, 'brand_id' => $brand->id]))) }}"
                           class="brand-item {{ (string) request('brand_id') === (string) $brand->id ? 'is-active' : '' }}"
                           title="{{ $brand->name }}">
                            @if ($brandLogo)
                                <img src="{{ $brandLogo }}" alt="{{ $brand->name }}" onerror="this.style.display='none';this.nextElementSibling.style.display='inline-flex';">
                                <span class="brand-item__icon brand-item__avatar" style="display: none;">{{ strtoupper(substr($brand->name, 0, 1)) }}</span>
                            @else
                                <span class="brand-item__icon brand-item__avatar">{{ strtoupper(substr($brand->name, 0, 1)) }}</span>
                            @endif
                            <span class="brand-item__name">{{ $brand->name }}</span>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- ACCESSORIES SUB-CATEGORIES --}}
        @if ($activeGroup === 'accessories' && $accessoryCategories->isNotEmpty())
            <section class="shop-category-panel">
                <div class="shop-section-heading">
                    <div>
                        <span class="shop-section-kicker">Danh mục phụ kiện</span>
                        <h2>Mua theo nhu cầu</h2>
                    </div>
                </div>
                <div class="accessory-category-list">
                    <a href="{{ route('shop', ['group' => 'accessories']) }}" class="accessory-category {{ !request('category_id') ? 'is-active' : '' }}">
                        <i class="fa fa-th-large"></i>
                        <span>Tất cả phụ kiện</span>
                    </a>
                    @foreach ($accessoryCategories as $category)
                        <a href="{{ route('shop', ['group' => 'accessories', 'category_id' => $category->id]) }}"
                           class="accessory-category {{ (string) request('category_id') === (string) $category->id ? 'is-active' : '' }}">
                            <i class="fa {{ str_contains($category->slug, 'tai-nghe') ? 'fa-headphones' : (str_contains($category->slug, 'dong-ho') ? 'fa-clock-o' : (str_contains($category->slug, 'sac') ? 'fa-bolt' : (str_contains($category->slug, 'cuong') ? 'fa-shield' : 'fa-mobile'))) }}"></i>
                            <span>{{ $category->name }}</span>
                            @if ($category->children->isNotEmpty())
                                <small>{{ $category->children->pluck('name')->join(', ') }}</small>
                            @endif
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- FEATURED PRODUCTS (Only on all products without filters) --}}
        @if ($featuredProducts->isNotEmpty())
            <section class="featured-products-panel">
                <div class="shop-section-heading">
                    <div>
                        <span class="shop-section-kicker">Được yêu thích nhiều nhất</span>
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <span class="shop-result-note">Gợi ý theo lượt quan tâm</span>
                </div>
                <div class="featured-product-grid">
                    @foreach ($featuredProducts as $product)
                        @php
                            $variant = $product->variants->where('status', 1)->sortBy(fn ($item) => $item->sale_price ?? $item->price)->first();
                            $image = ltrim(str_replace('\\', '/', (string) $product->thumbnail), '/');

                            if ($image === '') {
                                $imageSrc = asset('img/product01.png');
                            } elseif (preg_match('#^https?://#i', $image)) {
                                $imageSrc = $image;
                            } else {
                                $image = preg_replace('#^public/#i', '', $image);
                                $imageSrc = preg_match('#^(image/|img/|admin/|storage/)#i', $image)
                                    ? asset($image)
                                    : asset('image/' . $image);
                            }
                        @endphp
                        <article class="featured-product-card">
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="featured-product-image">
                                <span class="featured-badge">Nổi bật</span>
                                <img src="{{ $imageSrc }}" alt="{{ $product->name }}" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';">
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

        {{-- MAIN SHOP SECTION --}}
        <div class="row">

            {{-- SIDEBAR FILTER --}}
            <aside id="aside" class="col-md-3">
                <form action="{{ route('shop') }}" method="GET" id="shopFilterForm">
                    @if ($activeGroup)
                        <input type="hidden" name="group" value="{{ $activeGroup }}">
                    @endif
                    @if (request()->filled('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    @endif

                    {{-- Tìm kiếm tên sản phẩm --}}
                    <div class="aside-widget">
                        <h3 class="aside-title"><i class="fa fa-search text-danger"></i> Tìm kiếm</h3>
                        <div class="input-group" style="width: 100%;">
                            <input
                                type="text"
                                name="keyword"
                                class="form-control input"
                                placeholder="Tên sản phẩm, SKU..."
                                value="{{ request('keyword') }}"
                            >
                        </div>
                    </div>

                    {{-- Lọc theo giá --}}
                    <div class="aside-widget">
                        <h3 class="aside-title"><i class="fa fa-money text-danger"></i> Khoảng giá (₫)</h3>

                        <div class="price-filter">
                            <div class="input-group">
                                <span class="input-group-addon">Từ</span>
                                <input
                                    type="number"
                                    id="minPriceInput"
                                    name="min_price"
                                    class="form-control"
                                    placeholder="0"
                                    min="0"
                                    step="100000"
                                    value="{{ request('min_price') }}"
                                >
                            </div>

                            <div class="input-group" style="margin-top: 8px;">
                                <span class="input-group-addon">Đến</span>
                                <input
                                    type="number"
                                    id="maxPriceInput"
                                    name="max_price"
                                    class="form-control"
                                    placeholder="Không giới hạn"
                                    min="0"
                                    step="100000"
                                    value="{{ request('max_price') }}"
                                >
                            </div>

                            {{-- Quick price chips --}}
                            <div class="quick-price-chips">
                                <span class="quick-price-chip" onclick="setQuickPrice(0, 5000000)">Dưới 5 triệu</span>
                                <span class="quick-price-chip" onclick="setQuickPrice(5000000, 15000000)">5 - 15 triệu</span>
                                <span class="quick-price-chip" onclick="setQuickPrice(15000000, 25000000)">15 - 25 triệu</span>
                                <span class="quick-price-chip" onclick="setQuickPrice(25000000, null)">Trên 25 triệu</span>
                            </div>
                        </div>
                    </div>

                    {{-- Danh mục --}}
                    <div class="aside-widget">
                        <h3 class="aside-title"><i class="fa fa-tags text-danger"></i> Danh mục</h3>

                        <div class="category-tree-list">
                            <div class="category-tree-item">
                                <label class="category-tree-label">
                                    <span>
                                        <input
                                            type="radio"
                                            name="category_id"
                                            value=""
                                            {{ !request('category_id') ? 'checked' : '' }}
                                        >
                                        <strong>Tất cả danh mục</strong>
                                    </span>
                                </label>
                            </div>

                            @foreach ($categories as $cat)
                                <div class="category-tree-item">
                                    <label class="category-tree-label">
                                        <span>
                                            <input
                                                type="radio"
                                                name="category_id"
                                                value="{{ $cat->id }}"
                                                {{ (string) request('category_id') === (string) $cat->id ? 'checked' : '' }}
                                            >
                                            <strong>{{ $cat->name }}</strong>
                                        </span>
                                        <span class="category-tree-count">{{ $cat->products_count }}</span>
                                    </label>

                                    @if ($cat->children->isNotEmpty())
                                        <div class="category-tree-sub">
                                            @foreach ($cat->children as $child)
                                                <div class="category-tree-item">
                                                    <label class="category-tree-label">
                                                        <span>
                                                            <input
                                                                type="radio"
                                                                name="category_id"
                                                                value="{{ $child->id }}"
                                                                {{ (string) request('category_id') === (string) $child->id ? 'checked' : '' }}
                                                            >
                                                            {{ $child->name }}
                                                        </span>
                                                        <span class="category-tree-count">{{ $child->products_count }}</span>
                                                    </label>

                                                    @if ($child->children->isNotEmpty())
                                                        <div class="category-tree-sub">
                                                            @foreach ($child->children as $subChild)
                                                                <div class="category-tree-item">
                                                                    <label class="category-tree-label">
                                                                        <span>
                                                                            <input
                                                                                type="radio"
                                                                                name="category_id"
                                                                                value="{{ $subChild->id }}"
                                                                                {{ (string) request('category_id') === (string) $subChild->id ? 'checked' : '' }}
                                                                            >
                                                                            {{ $subChild->name }}
                                                                        </span>
                                                                        <span class="category-tree-count">{{ $subChild->products_count }}</span>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Thương hiệu --}}
                    @if ($brands->isNotEmpty())
                        <div class="aside-widget">
                            <h3 class="aside-title"><i class="fa fa-briefcase text-danger"></i> Thương hiệu</h3>
                            <select name="brand_id" class="form-control input">
                                <option value="">Tất cả thương hiệu ({{ $brands->count() }})</option>
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
                    @endif

                    {{-- Lọc cấu hình: RAM, Bộ nhớ, Màu sắc --}}
                    @if ($activeGroup !== 'accessories')
                        {{-- RAM --}}
                        @if(isset($rams) && $rams->isNotEmpty())
                            <div class="aside-widget">
                                <h3 class="aside-title"><i class="fa fa-microchip text-danger"></i> RAM</h3>
                                <div class="config-chip-list">
                                    @foreach($rams as $ram)
                                        <label class="config-chip-label">
                                            <input
                                                type="checkbox"
                                                name="rams[]"
                                                value="{{ $ram->id }}"
                                                {{ in_array($ram->id, $selectedRams ?? [], true) ? 'checked' : '' }}
                                            >
                                            <span>{{ $ram->value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Bộ nhớ trong --}}
                        @if(isset($storages) && $storages->isNotEmpty())
                            <div class="aside-widget">
                                <h3 class="aside-title"><i class="fa fa-hdd-o text-danger"></i> Bộ nhớ</h3>
                                <div class="config-chip-list">
                                    @foreach($storages as $storage)
                                        <label class="config-chip-label">
                                            <input
                                                type="checkbox"
                                                name="storages[]"
                                                value="{{ $storage->id }}"
                                                {{ in_array($storage->id, $selectedStorages ?? [], true) ? 'checked' : '' }}
                                            >
                                            <span>{{ $storage->value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    {{-- Màu sắc --}}
                    @if(isset($colors) && $colors->isNotEmpty())
                        <div class="aside-widget">
                            <h3 class="aside-title"><i class="fa fa-paint-brush text-danger"></i> Màu sắc</h3>
                            <div class="config-chip-list">
                                @foreach($colors as $color)
                                    <label class="config-chip-label">
                                        <input
                                            type="checkbox"
                                            name="colors[]"
                                            value="{{ $color->id }}"
                                            {{ in_array($color->id, $selectedColors ?? [], true) ? 'checked' : '' }}
                                        >
                                        <span>{{ $color->value }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Nút thao tác --}}
                    <div style="margin-top: 25px;">
                        <button type="submit" class="primary-btn btn-sm" style="width: 100%; border: none;">
                            <i class="fa fa-filter"></i> ÁP DỤNG BỘ LỌC
                        </button>

                        <a href="{{ route('shop', array_filter(['group' => $activeGroup])) }}"
                           class="btn btn-default btn-sm"
                           style="width: 100%; margin-top: 10px;">
                            <i class="fa fa-refresh"></i> Đặt lại bộ lọc
                        </a>
                    </div>
                </form>
            </aside>

            {{-- MAIN PRODUCTS CONTENT --}}
            <main class="col-md-9">

                {{-- ACTIVE FILTER TAGS CHIPS --}}
                @if ($hasAnyFilter)
                    <div class="shop-active-filters">
                        <span class="shop-active-filters-label"><i class="fa fa-sliders"></i> Đang lọc:</span>

                        @if ($hasKeyword)
                            <span class="filter-chip">
                                Từ khóa: "<strong>{{ request('keyword') }}</strong>"
                                <a href="{{ route('shop', request()->except(['keyword', 'page'])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                            </span>
                        @endif

                        @if ($selectedCategoryModel)
                            <span class="filter-chip">
                                Danh mục: <strong>{{ $selectedCategoryModel->name }}</strong>
                                <a href="{{ route('shop', request()->except(['category_id', 'page'])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                            </span>
                        @endif

                        @if ($selectedBrandModel)
                            <span class="filter-chip">
                                Hãng: <strong>{{ $selectedBrandModel->name }}</strong>
                                <a href="{{ route('shop', request()->except(['brand_id', 'page'])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                            </span>
                        @endif

                        @if ($hasMinPrice || $hasMaxPrice)
                            <span class="filter-chip">
                                Giá: <strong>{{ $hasMinPrice ? number_format(request('min_price'), 0, ',', '.') . '₫' : '0₫' }}</strong> - <strong>{{ $hasMaxPrice ? number_format(request('max_price'), 0, ',', '.') . '₫' : 'Max' }}</strong>
                                <a href="{{ route('shop', request()->except(['min_price', 'max_price', 'page'])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                            </span>
                        @endif

                        @if ($hasRams)
                            @foreach ($selectedRams as $ramId)
                                @php $ramVal = $rams->firstWhere('id', $ramId); @endphp
                                @if ($ramVal)
                                    <span class="filter-chip">
                                        RAM: <strong>{{ $ramVal->value }}</strong>
                                        <a href="{{ route('shop', array_merge(request()->except(['page']), ['rams' => array_diff($selectedRams, [$ramId])])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                                    </span>
                                @endif
                            @endforeach
                        @endif

                        @if ($hasStorages)
                            @foreach ($selectedStorages as $storageId)
                                @php $storageVal = $storages->firstWhere('id', $storageId); @endphp
                                @if ($storageVal)
                                    <span class="filter-chip">
                                        Bộ nhớ: <strong>{{ $storageVal->value }}</strong>
                                        <a href="{{ route('shop', array_merge(request()->except(['page']), ['storages' => array_diff($selectedStorages, [$storageId])])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                                    </span>
                                @endif
                            @endforeach
                        @endif

                        @if ($hasColors)
                            @foreach ($selectedColors as $colorId)
                                @php $colorVal = $colors->firstWhere('id', $colorId); @endphp
                                @if ($colorVal)
                                    <span class="filter-chip">
                                        Màu: <strong>{{ $colorVal->value }}</strong>
                                        <a href="{{ route('shop', array_merge(request()->except(['page']), ['colors' => array_diff($selectedColors, [$colorId])])) }}" class="filter-chip-remove" title="Xóa">&times;</a>
                                    </span>
                                @endif
                            @endforeach
                        @endif

                        <a href="{{ route('shop', array_filter(['group' => $activeGroup])) }}" class="filter-chip-clear-all" title="Xóa tất cả bộ lọc">
                            <i class="fa fa-trash"></i> Xóa tất cả
                        </a>
                    </div>
                @endif

                {{-- SHOP TOOLBAR (SORT & RESULT INFO) --}}
                <div class="shop-toolbar">
                    <div class="shop-toolbar-info">
                        Hiển thị <strong>{{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }}</strong> trên <strong>{{ $products->total() }}</strong> sản phẩm
                    </div>

                    <div class="shop-toolbar-sort">
                        <label for="shopSortSelect"><i class="fa fa-sort-amount-desc"></i> Sắp xếp:</label>
                        <select id="shopSortSelect" class="shop-sort-select" onchange="handleSortChange(this.value)">
                            <option value="popular" {{ ($sortBy ?? '') === 'popular' ? 'selected' : '' }}>Phổ biến nhất</option>
                            <option value="latest" {{ ($sortBy ?? '') === 'latest' ? 'selected' : '' }}>Mới nhất</option>
                            <option value="price_asc" {{ ($sortBy ?? '') === 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến Cao</option>
                            <option value="price_desc" {{ ($sortBy ?? '') === 'price_desc' ? 'selected' : '' }}>Giá: Cao đến Thấp</option>
                            <option value="name_asc" {{ ($sortBy ?? '') === 'name_asc' ? 'selected' : '' }}>Tên: A đến Z</option>
                        </select>
                    </div>
                </div>

                {{-- PRODUCT GRID --}}
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

                            $discountPercent = ($oldPrice && $oldPrice > $displayPrice)
                                ? round((($oldPrice - $displayPrice) / $oldPrice) * 100)
                                : 0;

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
                                            loading="lazy"
                                        >
                                    </a>

                                    @if ($discountPercent > 0)
                                        <span class="badge-new" style="background: #e11d48;">-{{ $discountPercent }}%</span>
                                    @else
                                        <span class="badge-new">MỚI</span>
                                    @endif
                                </div>

                                <div class="product-card-info">
                                    <span class="cat-label">
                                        {{ $product->category?->name ?? 'Sản phẩm' }}
                                    </span>

                                    <h4 class="prod-title">
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}" title="{{ $product->name }}">
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
                                        <form action="{{ route('wishlist.toggle') }}" method="POST" class="wishlist-inline-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn-icon wishlist-button" title="Yêu thích" aria-label="Thêm {{ $product->name }} vào yêu thích">
                                                <i class="fa {{ in_array((int) $product->id, array_map('intval', session('wishlist', [])), true) ? 'fa-heart text-danger' : 'fa-heart-o' }}"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('compare.index', ['product_id' => $product->id]) }}" class="btn-icon" title="So sánh sản phẩm">
                                            <i class="fa fa-exchange"></i>
                                        </a>

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
                            <div class="shop-empty-state">
                                <div class="shop-empty-state-icon">
                                    <i class="fa fa-search"></i>
                                </div>
                                <h3>Không tìm thấy sản phẩm phù hợp!</h3>
                                <p>Rất tiếc, chúng tôi không tìm thấy sản phẩm nào khớp với tiêu chí lọc hoặc từ khóa tìm kiếm của bạn.</p>
                                <a href="{{ route('shop', array_filter(['group' => $activeGroup])) }}" class="shop-empty-state-btn">
                                    <i class="fa fa-refresh"></i> Đặt lại bộ lọc
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- PAGINATION --}}
                @if ($products->hasPages())
                    <div class="store-filter clearfix" style="margin-top: 35px; text-align: center;">
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

<script>
    function setQuickPrice(min, max) {
        var minInput = document.getElementById('minPriceInput');
        var maxInput = document.getElementById('maxPriceInput');
        if (minInput) minInput.value = min !== null ? min : '';
        if (maxInput) maxInput.value = max !== null ? max : '';
        var form = document.getElementById('shopFilterForm');
        if (form) form.submit();
    }

    function handleSortChange(sortVal) {
        var url = new URL(window.location.href);
        url.searchParams.set('sort_by', sortVal);
        url.searchParams.delete('page');
        window.location.href = url.toString();
    }
</script>
@endsection
