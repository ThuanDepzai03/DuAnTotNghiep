@extends('admin.layout')

@section('content')
@php
    $makeImageUrl = function ($path) {
        $path = ltrim(str_replace('\\', '/', $path ?? ''), '/');

        if (!$path) {
            return asset('img/product01.png');
        }

        if (preg_match('#^https?://#', $path)) {
            return $path;
        }

        if (str_starts_with($path, 'public/')) {
            return asset(substr($path, 7));
        }

        return asset($path);
    };

    $productImageSrc = $makeImageUrl($product->thumbnail);
    $variantImageSrc = $makeImageUrl($firstVariant?->image ?? $product->thumbnail);
@endphp

<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Cập nhật sản phẩm</h3>
            <p class="text-subtitle text-muted mb-0">
                Chỉnh sửa thông tin, ảnh, giá và tồn kho của sản phẩm.
            </p>
        </div>

        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Quay lại
        </a>
    </div>
</div>

<div class="page-content">
    <form
        method="POST"
        action="{{ route('admin.products.update', $product->id) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Thông tin sản phẩm --}}
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-box-seam me-1"></i>
                            Thông tin sản phẩm
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Tên sản phẩm <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $product->name) }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Ví dụ: iPhone 16 Pro Max"
                                    >

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Mã sản phẩm</label>

                                    <input
                                        type="text"
                                        name="sku"
                                        value="{{ old('sku', $product->sku) }}"
                                        class="form-control @error('sku') is-invalid @enderror"
                                        placeholder="Ví dụ: IP16PM"
                                    >

                                    @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Danh mục <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        name="category_id"
                                        class="form-select @error('category_id') is-invalid @enderror"
                                    >
                                        <option value="">-- Chọn danh mục --</option>

                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Thương hiệu</label>

                                    <select
                                        name="brand_id"
                                        class="form-select @error('brand_id') is-invalid @enderror"
                                    >
                                        <option value="">-- Chưa chọn thương hiệu --</option>

                                        @foreach($brands as $brand)
                                            <option
                                                value="{{ $brand->id }}"
                                                {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}
                                            >
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả sản phẩm</label>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Nhập mô tả, thông số hoặc đặc điểm nổi bật..."
                            >{{ old('description', $product->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Cập nhật ảnh đại diện</label>

                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <img
                                    id="thumbnail-preview"
                                    src="{{ $productImageSrc }}"
                                    alt="{{ $product->name }}"
                                    width="90"
                                    height="90"
                                    class="rounded border p-1"
                                    style="object-fit: contain; background: #fff;"
                                    onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                >

                                <div class="flex-grow-1">
                                    <input
                                        type="file"
                                        id="thumbnail-input"
                                        name="thumbnail"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        class="form-control @error('thumbnail') is-invalid @enderror"
                                    >

                                    <small class="text-muted">
                                        Để trống nếu muốn giữ ảnh hiện tại. Tối đa 2MB.
                                    </small>

                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Trạng thái --}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-gear me-1"></i>
                            Trạng thái
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">
                                Trạng thái hiển thị <span class="text-danger">*</span>
                            </label>

                            <select
                                name="status"
                                class="form-select @error('status') is-invalid @enderror"
                            >
                                <option
                                    value="1"
                                    {{ old('status', $product->status ? '1' : '0') == '1' ? 'selected' : '' }}
                                >
                                    Hoạt động
                                </option>

                                <option
                                    value="0"
                                    {{ old('status', $product->status ? '1' : '0') == '0' ? 'selected' : '' }}
                                >
                                    Tạm ẩn
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-light-info mb-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Khi chuyển sang “Tạm ẩn”, sản phẩm sẽ không hiển thị ngoài trang khách.
                        </div>
                    </div>
                </div>
            </div>

            {{-- Biến thể đầu tiên --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-layers me-1"></i>
                            Biến thể cơ bản
                        </h4>

                        <span class="badge bg-light-primary text-primary">
                            {{ $firstVariant ? 'Đang chỉnh sửa biến thể đầu tiên' : 'Chưa có biến thể' }}
                        </span>
                    </div>
                    <div class="row mb-3">
    <div class="col-12">
        <label class="form-label fw-bold">
            Thuộc tính biến thể
        </label>

        <div class="row">
            @foreach($attributes as $attribute)
                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        {{ $attribute->name }}
                    </label>

                    <select name="attribute_value_ids[]" class="form-select">
                        <option value="">
                            -- Chọn {{ $attribute->name }} --
                        </option>

                        @foreach($attribute->values as $value)
                            <option
                                value="{{ $value->id }}"
                                {{ in_array($value->id, old('attribute_value_ids', $selectedAttributeValueIds)) ? 'selected' : '' }}
                            >
                                {{ $value->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
    </div>
</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Mã biến thể <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="variant_sku"
                                        value="{{ old('variant_sku', $firstVariant?->sku) }}"
                                        class="form-control @error('variant_sku') is-invalid @enderror"
                                        placeholder="Ví dụ: IP16PM-256-BLACK"
                                    >

                                    @error('variant_sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Giá gốc <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        value="{{ old('price', $firstVariant?->price) }}"
                                        min="0"
                                        step="1000"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Ví dụ: 24990000"
                                    >

                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Giá khuyến mãi</label>

                                    <input
                                        type="number"
                                        name="sale_price"
                                        value="{{ old('sale_price', $firstVariant?->sale_price) }}"
                                        min="0"
                                        step="1000"
                                        class="form-control @error('sale_price') is-invalid @enderror"
                                        placeholder="Để trống nếu không giảm giá"
                                    >

                                    @error('sale_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-0">
                                    <label class="form-label">
                                        Số lượng tồn kho <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="stock"
                                        value="{{ old('stock', $firstVariant?->stock ?? 0) }}"
                                        min="0"
                                        class="form-control @error('stock') is-invalid @enderror"
                                    >

                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-0">
                                    <label class="form-label">Ảnh biến thể</label>

                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                        <img
                                            id="variant-preview"
                                            src="{{ $variantImageSrc }}"
                                            alt="Ảnh biến thể"
                                            width="80"
                                            height="80"
                                            class="rounded border p-1"
                                            style="object-fit: contain; background: #fff;"
                                            onerror="this.onerror=null;this.src='{{ asset('img/product01.png') }}';"
                                        >

                                        <div class="flex-grow-1">
                                            <input
                                                type="file"
                                                id="variant-image-input"
                                                name="variant_image"
                                                accept=".jpg,.jpeg,.png,.webp"
                                                class="form-control @error('variant_image') is-invalid @enderror"
                                            >

                                            <small class="text-muted">
                                                Để trống nếu muốn giữ ảnh biến thể hiện tại.
                                            </small>

                                            @error('variant_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Nút lưu --}}
            <div class="col-12">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light-secondary">
                        Hủy
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Cập nhật sản phẩm
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);

        if (!input || !preview) {
            return;
        }

        input.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) {
                return;
            }

            preview.src = URL.createObjectURL(file);
        });
    }

    previewImage('thumbnail-input', 'thumbnail-preview');
    previewImage('variant-image-input', 'variant-preview');
</script>
@endsection
