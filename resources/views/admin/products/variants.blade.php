@extends('admin.layout')

@section('content')
@php
    $isEditing = !empty($editingVariant);

    $selectedAttributeValueIds = old(
        'attribute_value_ids',
        $isEditing
            ? $editingVariant->attributeValues->pluck('id')->all()
            : []
    );

    $makeImageUrl = function ($path) {
        $path = ltrim(str_replace('\\', '/', $path ?? ''), '/');

        if (!$path) {
            return asset('img/product01.png');
        }

        return asset($path);
    };
@endphp

<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý biến thể</h3>
            <p class="text-subtitle text-muted mb-0">
                Sản phẩm: <strong>{{ $product->name }}</strong>
            </p>
        </div>

        <a href="{{ route('admin.products.edit', $product->id) }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Quay lại sản phẩm
        </a>
    </div>
</div>

<div class="page-content">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        {{ $isEditing ? 'Cập nhật biến thể' : 'Thêm biến thể mới' }}
                    </h4>
                </div>

                <div class="card-body">
                    <form
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{ $isEditing
                            ? route('admin.products.variants.update', [$product->id, $editingVariant->id])
                            : route('admin.products.variants.store', $product->id)
                        }}"
                    >
                        @csrf

                        @if($isEditing)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label">
                                Mã biến thể <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="sku"
                                value="{{ old('sku', $editingVariant?->sku) }}"
                                class="form-control @error('sku') is-invalid @enderror"
                                placeholder="Ví dụ: AP3-WHITE"
                            >

                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @foreach($attributes as $attribute)
                            <div class="mb-3">
                                <label class="form-label">
                                    {{ $attribute->name }}
                                </label>

                                <select
                                    name="attribute_value_ids[{{ $attribute->id }}]"
                                    class="form-select"
                                >
                                    <option value="">
                                        -- Không chọn {{ $attribute->name }} --
                                    </option>

                                    @foreach($attribute->values as $value)
                                        <option
                                            value="{{ $value->id }}"
                                            {{ in_array($value->id, $selectedAttributeValueIds) ? 'selected' : '' }}
                                        >
                                            {{ $value->value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Giá gốc <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        min="0"
                                        step="1000"
                                        value="{{ old('price', $editingVariant?->price) }}"
                                        class="form-control @error('price') is-invalid @enderror"
                                    >

                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Giá khuyến mãi</label>

                                    <input
                                        type="number"
                                        name="sale_price"
                                        min="0"
                                        step="1000"
                                        value="{{ old('sale_price', $editingVariant?->sale_price) }}"
                                        class="form-control @error('sale_price') is-invalid @enderror"
                                    >

                                    @error('sale_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Tồn kho <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                name="stock"
                                min="0"
                                value="{{ old('stock', $editingVariant?->stock ?? 0) }}"
                                class="form-control @error('stock') is-invalid @enderror"
                            >

                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ảnh biến thể</label>

                            <input
                                type="file"
                                name="image"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="form-control"
                            >

                            <small class="text-muted">
                                Để trống sẽ dùng ảnh hiện tại hoặc ảnh sản phẩm.
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Trạng thái</label>

                            <select name="status" class="form-select">
                                <option value="1"
                                    {{ old('status', $editingVariant?->status ?? 1) == 1 ? 'selected' : '' }}>
                                    Hoạt động
                                </option>

                                <option value="0"
                                    {{ old('status', $editingVariant?->status ?? 1) == 0 ? 'selected' : '' }}>
                                    Tạm ẩn
                                </option>
                            </select>
                        </div>

                        <button class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>
                            {{ $isEditing ? 'Cập nhật biến thể' : 'Thêm biến thể' }}
                        </button>

                        @if($isEditing)
                            <a href="{{ route('admin.products.variants.index', $product->id) }}"
                               class="btn btn-light-secondary">
                                Hủy sửa
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Danh sách biến thể
                        <span class="badge bg-light-primary text-primary ms-2">
                            {{ $product->variants->count() }}
                        </span>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>SKU / Cấu hình</th>
                                    <th>Giá</th>
                                    <th>Tồn</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($product->variants as $variant)
                                    @php
                                        $attributesText = $variant->attributeValues
                                            ->map(function ($value) {
                                                return $value->attribute?->name . ': ' . $value->value;
                                            })
                                            ->implode(' | ');
                                    @endphp

                                    <tr>
                                        <td>
                                            <img
                                                src="{{ $makeImageUrl($variant->image ?? $product->thumbnail) }}"
                                                width="55"
                                                height="55"
                                                class="rounded border"
                                                style="object-fit:contain"
                                            >
                                        </td>

                                        <td>
                                            <strong class="d-block">{{ $variant->sku }}</strong>

                                            <small class="text-muted">
                                                {{ $attributesText ?: 'Chưa gắn cấu hình' }}
                                            </small>
                                        </td>

                                        <td>
                                            <strong class="text-danger">
                                                {{ number_format($variant->sale_price ?? $variant->price, 0, ',', '.') }} ₫
                                            </strong>

                                            @if($variant->sale_price)
                                                <br>
                                                <small class="text-muted text-decoration-line-through">
                                                    {{ number_format($variant->price, 0, ',', '.') }} ₫
                                                </small>
                                            @endif
                                        </td>

                                        <td>{{ $variant->stock }}</td>

                                        <td>
                                            @if($variant->status)
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Tạm ẩn</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-1">
                                                <a
                                                    href="{{ route('admin.products.variants.index', [
                                                        'product' => $product->id,
                                                        'edit' => $variant->id
                                                    ]) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    Sửa
                                                </a>

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.products.variants.destroy', [
                                                        $product->id,
                                                        $variant->id
                                                    ]) }}"
                                                    onsubmit="return confirm('Xóa biến thể này?')"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-sm btn-outline-danger">
                                                        Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            Chưa có biến thể nào.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
