@extends('layouts.master')

@section('content')
<div class="section" style="padding: 40px 0; min-height: 60vh;">
    <div class="container">
        <div class="section-title" style="margin-bottom: 28px;">
            <h3 class="title" style="display: flex; align-items: center; gap: 10px;">
                <i class="fa fa-heart text-danger"></i> Sản phẩm yêu thích
            </h3>
            <p style="color: #64748b; margin-top: 4px;">Danh sách các sản phẩm bạn đã lưu lại để theo dõi và mua sắm sau.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success" style="border-radius: 12px; margin-bottom: 24px;">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @forelse($products as $product)
                @php
                    $variant = $product->variants->where('status', 1)->sortBy(fn ($item) => $item->sale_price ?? $item->price)->first();
                    $displayPrice = $variant ? ($variant->sale_price ?? $variant->price) : 0;
                    $oldPrice = ($variant && $variant->sale_price) ? $variant->price : null;
                    $discountPercent = ($oldPrice && $oldPrice > $displayPrice) ? round((($oldPrice - $displayPrice) / $oldPrice) * 100) : 0;

                    $image = ltrim(str_replace('\\', '/', $product->thumbnail ?? 'img/product01.png'), '/');
                    if (preg_match('#^https?://#', $image)) {
                        $imageSrc = $image;
                    } else {
                        $image = preg_replace('#^public/#i', '', $image);
                        $imageSrc = preg_match('#^(image/|img/|admin/|storage/)#i', $image) ? asset($image) : asset('image/' . $image);
                    }
                @endphp

                <div class="col-md-3 col-sm-6" style="margin-bottom: 30px;">
                    <div class="product-card-custom" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div class="product-card-thumb">
                                <a href="{{ route('product.detail', $product->id) }}">
                                    <img src="{{ $imageSrc }}" alt="{{ $product->name }}" onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';" loading="lazy">
                                </a>

                                @if ($discountPercent > 0)
                                    <span class="badge-new" style="background: #e11d48;">-{{ $discountPercent }}%</span>
                                @else
                                    <span class="badge-new">YÊU THÍCH</span>
                                @endif
                            </div>

                            <div class="product-card-info" style="padding: 16px;">
                                <span class="cat-label">{{ $product->category?->name ?? 'Sản phẩm' }}</span>
                                <h4 class="prod-title" style="margin: 6px 0 10px;">
                                    <a href="{{ route('product.detail', $product->id) }}" title="{{ $product->name }}">
                                        {{ $product->name }}
                                    </a>
                                </h4>

                                <div class="prod-price-box">
                                    <span class="main-price">{{ number_format($displayPrice, 0, ',', '.') }} ₫</span>
                                    @if ($oldPrice)
                                        <del class="old-price">{{ number_format($oldPrice, 0, ',', '.') }} ₫</del>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="product-card-bottom" style="padding: 0 16px 16px; display: flex; flex-direction: column; gap: 8px;">
                            @if ($variant && ($variant->stock ?? 1) > 0)
                                <form action="{{ route('cart.add') }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <input type="hidden" name="product_variant_id" value="{{ $variant->id }}">
                                    <button type="submit" class="primary-btn" style="width: 100%; padding: 10px; font-size: 13px;">
                                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('product.detail', $product->id) }}" class="btn-default" style="width: 100%; padding: 10px; font-size: 13px; text-align: center;">
                                    <i class="fa fa-eye"></i> Xem chi tiết
                                </a>
                            @endif

                            <form action="{{ route('wishlist.toggle') }}" method="POST" style="margin: 0;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn-uiverse-ghost" style="width: 100%; padding: 8px; font-size: 12px; color: #dc2626 !important; border-color: #fecdd3;">
                                    <i class="fa fa-trash text-danger"></i> Bỏ yêu thích
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="uiverse-empty-box">
                        <div class="empty-icon-glow">
                            <i class="fa fa-heart-o"></i>
                        </div>
                        <h3>Danh sách yêu thích đang trống!</h3>
                        <p>Bạn chưa lưu sản phẩm nào vào danh sách yêu thích. Hãy bấm vào biểu tượng trái tim ở các sản phẩm yêu thích để xem lại sau bất cứ lúc nào!</p>
                        <a href="{{ route('shop') }}" class="primary-btn">
                            <i class="fa fa-shopping-bag"></i> Khám phá sản phẩm ngay
                        </a>

                        <div class="empty-shortcuts">
                            <a href="{{ route('shop', ['group' => 'phone']) }}" class="empty-shortcut-pill">📱 Điện thoại</a>
                            <a href="{{ route('shop', ['group' => 'laptop']) }}" class="empty-shortcut-pill">💻 Laptop</a>
                            <a href="{{ route('shop', ['group' => 'accessories']) }}" class="empty-shortcut-pill">🎧 Phụ kiện</a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection