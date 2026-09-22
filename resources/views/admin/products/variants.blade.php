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

    $customAttributeValues = $isEditing
        ? $editingVariant->attributeEntries->keyBy('attribute_id')
        : collect();

    $makeImageUrl = function ($path) {
        $path = ltrim(str_replace('\\', '/', $path ?? ''), '/');

        if (!$path) {
            return asset('img/product01.png');
        }

        return asset($path);
    };
    $attributeJson = $attributes->map(function ($attribute) {
        return [
            'id' => $attribute->id,
            'name' => $attribute->name,
            'input_type' => $attribute->input_type,
            'display_type' => $attribute->display_type,
            'attribute_type' => $attribute->attribute_type,
            'values' => $attribute->values->map(function ($value) {
                return ['id' => $value->id, 'value' => $value->value];
            })->values()->all(),
        ];
    })->values();
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
                            <label class="form-label">Mã biến thể</label>

                            @if($isEditing)
                                <input
                                    type="text"
                                    readonly
                                    class="form-control @error('sku') is-invalid @enderror"
                                    value="{{ old('sku', $editingVariant?->sku) }}"
                                >

                                <div class="form-text">Mã biến thể không thể chỉnh sửa.</div>
                            @else
                                <input
                                    type="text"
                                    readonly
                                    class="form-control-plaintext"
                                    value="Mã sẽ được sinh tự động khi thêm"
                                >

                                <div class="form-text">Mã biến thể được tạo tự động.</div>
                            @endif

                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @foreach($attributes as $attribute)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label mb-0">{{ $attribute->name }}</label>
                                    <span class="badge bg-light-primary text-primary">{{ $attribute->attribute_type ?? 'variation' }}</span>
                                </div>

                                @if($attribute->values->isNotEmpty())
                                    <select name="attribute_value_ids[{{ $attribute->id }}]" class="form-select">
                                        <option value="">-- Không chọn {{ $attribute->name }} --</option>
                                        @foreach($attribute->values as $value)
                                            <option value="{{ $value->id }}" @selected(in_array($value->id, $selectedAttributeValueIds))>{{ $value->value }}</option>
                                        @endforeach
                                    </select>
                                @elseif(($attribute->input_type ?? $attribute->display_type) === 'boolean')
                                    <select name="attribute_custom_values[{{ $attribute->id }}]" class="form-select">
                                        <option value="">-- Chọn --</option>
                                        <option value="Có" @selected($customAttributeValues->get($attribute->id)?->custom_value === 'Có')>Có</option>
                                        <option value="Không" @selected($customAttributeValues->get($attribute->id)?->custom_value === 'Không')>Không</option>
                                    </select>
                                @else
                                    <input type="{{ ($attribute->input_type ?? $attribute->display_type) === 'number' ? 'number' : 'text' }}" name="attribute_custom_values[{{ $attribute->id }}]" value="{{ $customAttributeValues->get($attribute->id)?->custom_value ?? '' }}" class="form-control" placeholder="Nhập {{ strtolower($attribute->name) }}">
                                @endif
                            </div>
                        @endforeach

                        <button type="button" class="btn btn-outline-secondary mb-3" id="create-new-attribute" data-bs-toggle="modal" data-bs-target="#new-attribute-modal">
                            <i class="bi bi-lightning-charge me-1"></i>Tạo thuộc tính mới
                        </button>

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

<div class="modal fade" id="new-attribute-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tạo thuộc tính mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <form id="new-attribute-form">
                <div class="modal-body">
                    <div id="new-attribute-alert"></div>
                    <div class="mb-3"><label class="form-label">Tên thuộc tính</label><input name="name" class="form-control" required maxlength="100"></div>
                    <div class="mb-3"><label class="form-label">Slug</label><input name="slug" class="form-control" maxlength="100"></div>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Loại thuộc tính</label><select name="attribute_type" class="form-select"><option value="variation">Variation</option><option value="information">Information</option></select></div>
                        <div class="col-md-6"><label class="form-label">Kiểu hiển thị</label><select name="display_type" class="form-select">@foreach(['select','radio','checkbox','color','button','text','number','textarea'] as $type)<option value="{{ $type }}">{{ $type }}</option>@endforeach</select></div>
                    </div>
                    <div class="mt-3"><label class="form-label">Giá trị ban đầu</label><input name="values" class="form-control" placeholder="128GB, 256GB, 512GB"></div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Hủy</button><button type="submit" class="btn btn-primary" id="new-attribute-submit">Tạo thuộc tính</button></div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('new-attribute-form');
    const modal = document.getElementById('new-attribute-modal');
    const attributesContainer = document.querySelector('.card-body form[action*="/variants"]');
    const attributes = @json($attributeJson);
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || @json(csrf_token());
    const alertBox = document.getElementById('new-attribute-alert');

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>'"]/g, character => ({'&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;'}[character]));
    }

    form?.addEventListener('submit', async function (event) {
        event.preventDefault();
        const button = document.getElementById('new-attribute-submit');
        button.disabled = true;
        try {
            const response = await fetch(@json(route('admin.attributes.ajax.store')), {
                method: 'POST',
                headers: {'Accept': 'application/json', 'X-CSRF-TOKEN': csrf},
                body: new FormData(form)
            });
            const result = await response.json();
            if (!response.ok) throw new Error(result.message || 'Không thể tạo thuộc tính.');

            const attribute = result.attribute;
            attributes.push(attribute);
            const wrapper = document.createElement('div');
            wrapper.className = 'mb-3 new-attribute-field';
            wrapper.dataset.attributeId = attribute.id;
            const inputType = attribute.input_type || attribute.display_type;
            const valueField = (attribute.values || []).length
                ? `<select name="attribute_value_ids[${attribute.id}]" class="form-select"><option value="">-- Không chọn ${escapeHtml(attribute.name)} --</option>${attribute.values.map(value => `<option value="${value.id}">${escapeHtml(value.value)}</option>`).join('')}</select>`
                : `<input type="${inputType === 'number' ? 'number' : 'text'}" name="attribute_custom_values[${attribute.id}]" class="form-control" placeholder="Nhập ${escapeHtml(attribute.name)}">`;
            wrapper.innerHTML = `<label class="form-label">${escapeHtml(attribute.name)} <span class="badge bg-light-primary text-primary">Mới</span></label>${valueField}`;
            const trigger = document.getElementById('create-new-attribute');
            trigger.parentNode.insertBefore(wrapper, trigger);
            form.reset();
            window.bootstrap?.Modal.getOrCreateInstance(modal).hide();
        } catch (error) {
            alertBox.innerHTML = `<div class="alert alert-danger py-2">${escapeHtml(error.message)}</div>`;
        } finally {
            button.disabled = false;
        }
    });
});
</script>
@endsection