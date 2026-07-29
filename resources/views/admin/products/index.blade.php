@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý sản phẩm</h3>
            <p class="text-subtitle text-muted mb-0">
                Danh sách sản phẩm, biến thể, giá bán và tồn kho trong cửa hàng.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Thêm sản phẩm
        </a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <h4 class="card-title mb-0">
                        Danh sách sản phẩm
                        <span class="badge bg-light-primary text-primary ms-2">
                            {{ $products->count() }}
                        </span>
                    </h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th width="75">ID</th>
                                    <th width="90">Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Thương hiệu</th>
                                    <th>Giá từ</th>
                                    <th>Tồn kho</th>
                                    <th>Trạng thái</th>
                                    <th width="190">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($products as $product)
                                    @php
                                        $activeVariants = $product->variants
                                            ->where('status', 1)
                                            ->sortBy(function ($variant) {
                                                return $variant->sale_price ?? $variant->price;
                                            })
                                            ->values();

                                        $firstVariant = $activeVariants->first();

                                        $displayPrice = $firstVariant
                                            ? ($firstVariant->sale_price ?? $firstVariant->price)
                                            : 0;

                                        $oldPrice = $firstVariant && $firstVariant->sale_price
                                            ? $firstVariant->price
                                            : null;

                                        $totalStock = $activeVariants->sum('stock');

                                        $imagePath = $product->thumbnail
                                            ?? $firstVariant?->image
                                            ?? 'img/product01.png';

                                        $imagePath = ltrim(str_replace('\\', '/', $imagePath), '/');

                                        if (preg_match('#^https?://#', $imagePath)) {
                                            $imageSrc = $imagePath;
                                        } elseif (str_starts_with($imagePath, 'public/')) {
                                            $imageSrc = asset(substr($imagePath, 7));
                                        } else {
                                            $imageSrc = asset($imagePath);
                                        }
                                    @endphp

                                    <tr>
                                        <td>
                                            <strong>#{{ $product->id }}</strong>
                                        </td>

                                        <td>
                                            <img
                                                src="{{ $imageSrc }}"
                                                alt="{{ $product->name }}"
                                                class="rounded border"
                                                width="58"
                                                height="58"
                                                style="object-fit: contain; background: #fff;"
                                                onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                            >
                                        </td>

                                        <td>
                                            <strong class="d-block">{{ $product->name }}</strong>

                                            <small class="text-muted">
                                                SKU: {{ $product->sku ?? 'Chưa có' }}
                                            </small>

                                            <br>

                                            <small class="text-primary">
                                                {{ $activeVariants->count() }} biến thể
                                            </small>
                                        </td>

                                        <td>
                                            {{ $product->category?->name ?? '---' }}
                                        </td>

                                        <td>
                                            {{ $product->brand?->name ?? '---' }}
                                        </td>

                                        <td>
                                            <strong class="text-danger">
                                                {{ number_format($displayPrice, 0, ',', '.') }} ₫
                                            </strong>

                                            @if($oldPrice)
                                                <br>
                                                <small class="text-muted text-decoration-line-through">
                                                    {{ number_format($oldPrice, 0, ',', '.') }} ₫
                                                </small>
                                            @endif
                                        </td>

                                        <td>
                                            @if($totalStock > 0)
                                                <span class="badge bg-light-success text-success">
                                                    {{ $totalStock }} sản phẩm
                                                </span>
                                            @else
                                                <span class="badge bg-light-danger text-danger">
                                                    Hết hàng
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($product->status)
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Hoạt động
                                                </span>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-eye-slash me-1"></i>
                                                    Đã ẩn
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 flex-wrap">
                                                 <a
                                                    href="{{ route('admin.products.variants.index', $product->id) }}"
                                                    class="btn btn-sm btn-outline-dark"
                                                >
                                                    <i class="bi bi-layers"></i>
                                                    Biến thể ({{ $product->variants->count() }})
                                                </a>
                                                <a
                                                    href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-pencil-square"></i>
                                                    Sửa
                                                </a>

                                                @if($product->status)
                                                    <form
                                                        action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc muốn ẩn sản phẩm này không?')"
                                                    >
                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="btn btn-sm btn-outline-danger"
                                                        >
                                                            <i class="bi bi-eye-slash"></i>
                                                            Ẩn
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin.products.restore', $product->id) }}"
                                                        method="POST"
                                                    >
                                                        @csrf

                                                        <button
                                                            type="submit"
                                                            class="btn btn-sm btn-success"
                                                        >
                                                            <i class="bi bi-arrow-counterclockwise"></i>
                                                            Khôi phục
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <i class="bi bi-box-seam fs-1 text-muted d-block mb-2"></i>

                                            <strong>Chưa có sản phẩm nào</strong>

                                            <p class="text-muted mb-3">
                                                Hãy thêm sản phẩm đầu tiên cho cửa hàng.
                                            </p>

                                            <a
                                                href="{{ route('admin.products.create') }}"
                                                class="btn btn-primary"
                                            >
                                                <i class="bi bi-plus-circle"></i>
                                                Thêm sản phẩm
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
