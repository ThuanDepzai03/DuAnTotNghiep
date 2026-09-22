@extends('admin.layout')

@section('content')

@php

    $isEdit = isset($product);

    /*
    |--------------------------------------------------------------------------
    | IMAGE URL HELPER
    |--------------------------------------------------------------------------
    */

    $makeImageUrl = function ($path) {

        $path = ltrim(
            str_replace('\\', '/', $path ?? ''),
            '/'
        );

        if (!$path) {
            return asset('img/product01.png');
        }

        if (preg_match('#^https?://#', $path)) {
            return $path;
        }

        if (str_starts_with($path, 'public/')) {
            $path = substr($path, 7);
        }

        return asset($path);
    };


    /*
    |--------------------------------------------------------------------------
    | PRODUCT IMAGE
    |--------------------------------------------------------------------------
    */

    $productImageSrc = $isEdit
        ? $makeImageUrl($product->thumbnail)
        : asset('img/product01.png');


    /*
    |--------------------------------------------------------------------------
    | VARIANT IMAGE
    |--------------------------------------------------------------------------
    */

    $variantImageSrc = $isEdit
        ? $makeImageUrl(
            $firstVariant?->image
            ?? $product->thumbnail
        )
        : asset('img/product01.png');


    /*
    |--------------------------------------------------------------------------
    | SELECTED ATTRIBUTES
    |--------------------------------------------------------------------------
    */

    $selectedAttributeValueIds = old(
        'attribute_value_ids',
        $selectedAttributeValueIds ?? []
    );

    $productAttributeRows = ($product->attributes ?? collect())->map(function ($productAttribute) {
        return [
            'attribute_id' => $productAttribute->attribute_id,
            'attribute_type' => $productAttribute->attribute_type,
            'show_on_product' => (bool) $productAttribute->show_on_product,
            'values' => $productAttribute->values->pluck('attribute_value_id')->filter()->values()->all(),
            'custom_value' => $productAttribute->values->pluck('custom_value')->filter()->implode(', '),
        ];
    })->values();

    if ($productAttributeRows->isEmpty() && $isEdit && $firstVariant) {
        $productAttributeRows = $firstVariant->attributeValues
            ->groupBy('attribute_id')
            ->map(function ($values) use ($firstVariant) {
                $attribute = $values->first()->attribute;
                return [
                    'attribute_id' => $attribute->id,
                    'attribute_type' => $attribute->attribute_type ?: 'variation',
                    'show_on_product' => true,
                    'values' => $values->pluck('id')->values()->all(),
                    'custom_value' => $firstVariant->attributeEntries
                        ->where('attribute_id', $attribute->id)
                        ->pluck('custom_value')
                        ->filter()
                        ->implode(', '),
                ];
            })->values();
    }

    $attributeOptions = $attributes->map(function ($attribute) {
        return [
            'id' => $attribute->id,
            'name' => $attribute->name,
            'display_type' => $attribute->display_type ?: $attribute->input_type,
            'attribute_type' => $attribute->attribute_type ?: 'variation',
            'values' => $attribute->values->map(fn ($value) => [
                'id' => $value->id,
                'value' => $value->value,
                'color_hex' => $value->color_hex,
            ])->values()->all(),
        ];
    })->values();

@endphp


{{-- =========================================================
    PAGE HEADING
========================================================= --}}

<div class="page-heading">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>

            <h3 class="mb-1">

                {{ $isEdit
                    ? 'Cập nhật sản phẩm'
                    : 'Thêm sản phẩm'
                }}

            </h3>

            <p class="text-subtitle text-muted mb-0">

                {{ $isEdit
                    ? 'Chỉnh sửa thông tin, mô tả, ảnh, giá và tồn kho của sản phẩm.'
                    : 'Tạo sản phẩm mới và thêm biến thể đầu tiên.'
                }}

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
        id="product-form"
        method="POST"
        action="{{ $isEdit ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
        enctype="multipart/form-data"
    >
        @csrf

        @if($isEdit)
            @method('PUT')
        @endif

        <div class="row g-4">

            <div class="col-lg-8">

                <div class="card mb-4">

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
                                        value="{{ old('name', $product->name ?? '') }}"
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
                                        readonly
                                        class="form-control"
                                        value="{{ $isEdit ? old('sku', $product->sku) : 'Mã sẽ được sinh tự động' }}"
                                    >
                                    <div class="form-text">Mã sản phẩm được tạo tự động và không thể chỉnh sửa.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                                    <select
                                        name="category_id"
                                        class="form-select @error('category_id') is-invalid @enderror"
                                    >
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}
                                            >{{ $category->name }}</option>
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
                                                {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}
                                            >{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    {{-- =================================================
                        DESCRIPTION EDITOR
                    ================================================== --}}

                    <div class="mb-4">

                        <label class="form-label fw-bold">

                            Mô tả sản phẩm

                        </label>


                        {{-- Hidden textarea gửi dữ liệu lên Laravel --}}

                        <textarea
                            id="description"
                            name="description"
                            class="d-none"
                        >{{ old(
                            'description',
                            $product->description ?? ''
                        ) }}</textarea>


                        {{-- =================================================
                            EDITOR
                        ================================================== --}}

                        <div class="description-editor-wrapper">


                            {{-- TOOLBAR --}}

                            <div
                                class="description-toolbar"
                                id="description-toolbar"
                            >


                                {{-- HISTORY --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="undo"
                                        title="Hoàn tác"
                                    >
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="redo"
                                        title="Làm lại"
                                    >
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>

                                </div>



                                {{-- FORMAT --}}

                                <div class="toolbar-group">

                                    <select
                                        id="formatBlock"
                                        class="toolbar-select"
                                        title="Kiểu chữ"
                                    >

                                        <option value="P">
                                            Đoạn văn
                                        </option>

                                        <option value="H1">
                                            Tiêu đề 1
                                        </option>

                                        <option value="H2">
                                            Tiêu đề 2
                                        </option>

                                        <option value="H3">
                                            Tiêu đề 3
                                        </option>

                                        <option value="H4">
                                            Tiêu đề 4
                                        </option>

                                        <option value="BLOCKQUOTE">
                                            Trích dẫn
                                        </option>

                                    </select>

                                </div>



                                {{-- TEXT FORMAT --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="bold"
                                        title="In đậm"
                                    >
                                        <i class="bi bi-type-bold"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="italic"
                                        title="In nghiêng"
                                    >
                                        <i class="bi bi-type-italic"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="underline"
                                        title="Gạch chân"
                                    >
                                        <i class="bi bi-type-underline"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="strikeThrough"
                                        title="Gạch ngang"
                                    >
                                        <i class="bi bi-type-strikethrough"></i>
                                    </button>

                                </div>



                                {{-- COLOR --}}

                                <div class="toolbar-group">

                                    <label
                                        class="toolbar-color"
                                        title="Màu chữ"
                                    >

                                        <i class="bi bi-palette"></i>

                                        <input
                                            type="color"
                                            id="textColor"
                                            value="#000000"
                                        >

                                    </label>


                                    <label
                                        class="toolbar-color"
                                        title="Màu nền chữ"
                                    >

                                        <i class="bi bi-highlighter"></i>

                                        <input
                                            type="color"
                                            id="highlightColor"
                                            value="#ffff00"
                                        >

                                    </label>

                                </div>



                                {{-- ALIGN --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="justifyLeft"
                                        title="Căn trái"
                                    >
                                        <i class="bi bi-text-left"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="justifyCenter"
                                        title="Căn giữa"
                                    >
                                        <i class="bi bi-text-center"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="justifyRight"
                                        title="Căn phải"
                                    >
                                        <i class="bi bi-text-right"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="justifyFull"
                                        title="Căn đều"
                                    >
                                        <i class="bi bi-justify"></i>
                                    </button>

                                </div>



                                {{-- LIST --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="insertUnorderedList"
                                        title="Danh sách"
                                    >
                                        <i class="bi bi-list-ul"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="insertOrderedList"
                                        title="Danh sách đánh số"
                                    >
                                        <i class="bi bi-list-ol"></i>
                                    </button>

                                </div>



                                {{-- INDENT --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="outdent"
                                        title="Giảm thụt lề"
                                    >
                                        <i class="bi bi-text-indent-left"></i>
                                    </button>


                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="indent"
                                        title="Tăng thụt lề"
                                    >
                                        <i class="bi bi-text-indent-right"></i>
                                    </button>

                                </div>



                                {{-- LINK --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        id="insert-link"
                                        class="toolbar-btn"
                                        title="Thêm liên kết"
                                    >
                                        <i class="bi bi-link-45deg"></i>
                                    </button>


                                    <button
                                        type="button"
                                        id="remove-link"
                                        class="toolbar-btn"
                                        title="Xóa liên kết"
                                    >
                                        <i class="bi bi-link-45deg"></i>
                                        <span class="unlink-x">×</span>
                                    </button>

                                </div>



                                {{-- IMAGE --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        id="upload-description-image"
                                        class="toolbar-btn toolbar-image-btn"
                                        title="Tải ảnh lên"
                                    >

                                        <i class="bi bi-image"></i>

                                    </button>


                                    <input
                                        type="file"
                                        id="description-image-input"
                                        accept="image/*"
                                        multiple
                                        hidden
                                    >

                                </div>



                                {{-- CLEAR --}}

                                <div class="toolbar-group">

                                    <button
                                        type="button"
                                        class="toolbar-btn"
                                        data-command="removeFormat"
                                        title="Xóa định dạng"
                                    >

                                        <i class="bi bi-eraser"></i>

                                    </button>

                                </div>


                            </div>



                            {{-- EDITOR CONTENT --}}

                            <div
                                id="description-editor"
                                class="description-editor"
                                contenteditable="true"
                                spellcheck="true"
                                data-placeholder="Nhập mô tả chi tiết sản phẩm..."
                            ></div>


                        </div>


                        @error('description')

                            <div class="text-danger small mt-2">
                                {{ $message }}
                            </div>

                        @enderror


                        <div class="form-text mt-2">

                            Bạn có thể định dạng văn bản, tạo danh sách,
                            thêm liên kết và upload ảnh trực tiếp vào mô tả.

                        </div>

                    </div>



                    {{-- =================================================
                        THUMBNAIL
                    ================================================== --}}

                    <div>

                        <label class="form-label">

                            {{ $isEdit
                                ? 'Cập nhật ảnh đại diện'
                                : 'Ảnh đại diện sản phẩm'
                            }}

                        </label>


                        <div class="d-flex align-items-center gap-3 flex-wrap">


                            <img
                                id="thumbnail-preview"
                                src="{{ $productImageSrc }}"
                                alt="Ảnh sản phẩm"
                                width="110"
                                height="110"
                                class="rounded border p-1 product-image-preview"
                                onerror="
                                    this.onerror=null;
                                    this.src='{{ asset('img/product01.png') }}';
                                "
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

                                    {{ $isEdit
                                        ? 'Để trống nếu muốn giữ ảnh hiện tại.'
                                        : 'Chọn ảnh đại diện cho sản phẩm.'
                                    }}

                                    Tối đa 2MB.

                                </small>


                                @error('thumbnail')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =====================================================
                VARIANT
            ====================================================== --}}

            <div class="card mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4 class="card-title mb-0">

                        <i class="bi bi-layers me-1"></i>

                        {{ $isEdit
                            ? 'Biến thể cơ bản'
                            : 'Biến thể đầu tiên'
                        }}

                    </h4>


                    @if($isEdit)

                        <span class="badge bg-light-primary text-primary">

                            {{ $firstVariant
                                ? 'Đang chỉnh sửa'
                                : 'Chưa có biến thể'
                            }}

                        </span>

                    @endif

                </div>



                <div class="card-body">

                    <div class="border rounded p-3 mb-4 bg-light" id="product-attributes-card">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div>
                                <h5 class="mb-1"><i class="bi bi-sliders me-1"></i>Thuộc tính biến thể</h5>
                                <small class="text-muted">Chọn thuộc tính sẵn có, thêm giá trị hoặc tạo thuộc tính mới ngay trong biến thể đầu tiên.</small>
                            </div>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn btn-sm btn-outline-primary" id="add-product-attribute"><i class="bi bi-plus-circle me-1"></i>Thêm thuộc tính</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="create-new-attribute" data-bs-toggle="modal" data-bs-target="#new-attribute-modal"><i class="bi bi-lightning-charge me-1"></i>Tạo thuộc tính mới</button>
                                <button type="button" class="btn btn-sm btn-primary" id="save-product-attributes"><i class="bi bi-save me-1"></i>Lưu thuộc tính</button>
                            </div>
                        </div>
                        <div id="product-attributes-alert"></div>
                        <div id="product-attributes-list" class="vstack gap-3"></div>
                        <div id="product-attributes-empty" class="text-center text-muted border rounded p-3">Chưa có thuộc tính cho sản phẩm.</div>
                        <input type="hidden" name="product_attributes_payload" id="product-attributes-payload">
                    </div>


                    @if(!$isEdit)

                        <div class="alert alert-light-primary">

                            <i class="bi bi-info-circle me-1"></i>

                            Lưu sản phẩm trước, sau đó vào danh sách biến thể và bấm
                            <strong>IMEI</strong> để nhập từng máy điện thoại.

                        </div>

                    @endif



                    {{-- SKU + PRICE --}}

                    <div class="row">

                        <div class="col-md-4">

                            <div class="mb-3">

                                <label class="form-label">
                                    Mã biến thể
                                </label>


                                <input
                                    type="text"
                                    readonly
                                    class="form-control"
                                    value="{{ $isEdit && $firstVariant
                                        ? old(
                                            'variant_sku',
                                            $firstVariant->sku
                                        )
                                        : 'Mã sẽ được sinh tự động'
                                    }}"
                                >

                            </div>

                        </div>

                        <div class="col-12 mb-3">
                            @if($isEdit && $firstVariant)
                                <a href="{{ route('admin.inventory.imeis.index', ['variant_id' => $firstVariant->id]) }}" class="btn btn-outline-success">
                                    <i class="bi bi-upc-scan me-1"></i> Quản lý IMEI của biến thể này
                                </a>
                            @else
                                <div class="alert alert-light-primary mb-0">Lưu sản phẩm trước, sau đó quản lý IMEI theo từng biến thể.</div>
                            @endif
                        </div>



                        <div class="col-md-4">

                            <div class="mb-3">

                                <label class="form-label">

                                    Giá gốc

                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="number"
                                    name="price"
                                    value="{{ old(
                                        'price',
                                        $firstVariant?->price ?? ''
                                    ) }}"
                                    min="0"
                                    step="1000"
                                    class="form-control @error('price') is-invalid @enderror"
                                    placeholder="Ví dụ: 24990000"
                                >


                                @error('price')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>



                        <div class="col-md-4">

                            <div class="mb-3">

                                <label class="form-label">
                                    Giá khuyến mãi
                                </label>


                                <input
                                    type="number"
                                    name="sale_price"
                                    value="{{ old(
                                        'sale_price',
                                        $firstVariant?->sale_price ?? ''
                                    ) }}"
                                    min="0"
                                    step="1000"
                                    class="form-control @error('sale_price') is-invalid @enderror"
                                    placeholder="Để trống nếu không giảm giá"
                                >


                                @error('sale_price')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>



                    {{-- STOCK + IMAGE --}}

                    <div class="row">

                        <div class="col-md-4">

                            <div class="mb-3">

                                <label class="form-label">

                                    Số lượng tồn kho

                                    <span class="text-danger">*</span>

                                </label>


                                <input
                                    type="number"
                                    name="stock"
                                    value="{{ old(
                                        'stock',
                                        $firstVariant?->stock ?? 0
                                    ) }}"
                                    min="0"
                                    class="form-control @error('stock') is-invalid @enderror"
                                >


                                @error('stock')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>



                        <div class="col-md-8">

                            <label class="form-label">

                                Ảnh biến thể

                            </label>


                            <div class="d-flex align-items-center gap-3 flex-wrap">


                                <img
                                    id="variant-preview"
                                    src="{{ $variantImageSrc }}"
                                    alt="Ảnh biến thể"
                                    width="90"
                                    height="90"
                                    class="rounded border p-1 product-image-preview"
                                    onerror="
                                        this.onerror=null;
                                        this.src='{{ asset('img/product01.png') }}';
                                    "
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

                                        {{ $isEdit
                                            ? 'Để trống nếu muốn giữ ảnh hiện tại.'
                                            : 'Có thể để trống.'
                                        }}

                                    </small>


                                    @error('variant_image')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
            RIGHT
        ====================================================== --}}

        <div class="col-lg-4">


            {{-- STATUS --}}

            <div class="card mb-4">

                <div class="card-header">

                    <h4 class="card-title mb-0">

                        <i class="bi bi-gear me-1"></i>

                        Trạng thái

                    </h4>

                </div>


                <div class="card-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Trạng thái hiển thị

                            <span class="text-danger">*</span>

                        </label>


                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                        >

                            <option
                                value="1"
                                {{ old(
                                    'status',
                                    $product->status ?? '1'
                                ) == '1'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Hoạt động
                            </option>


                            <option
                                value="0"
                                {{ old(
                                    'status',
                                    $product->status ?? '1'
                                ) == '0'
                                    ? 'selected'
                                    : ''
                                }}
                            >
                                Tạm ẩn
                            </option>

                        </select>


                        @error('status')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="alert alert-light-info mb-0">

                        <i class="bi bi-info-circle me-1"></i>

                        Sản phẩm ở trạng thái
                        <strong>Tạm ẩn</strong>
                        sẽ không hiển thị ngoài trang khách.

                    </div>

                </div>

            </div>



            {{-- GUIDE --}}

            <div class="card mb-4">

                <div class="card-header">

                    <h4 class="card-title mb-0">

                        <i class="bi bi-lightbulb me-1"></i>

                        Hướng dẫn mô tả

                    </h4>

                </div>


                <div class="card-body">

                    <p class="mb-2">
                        Nên nhập:
                    </p>


                    <ul class="mb-0 ps-3">

                        <li>Thông tin sản phẩm</li>

                        <li>Thông số kỹ thuật</li>

                        <li>Tính năng nổi bật</li>

                        <li>Phụ kiện đi kèm</li>

                        <li>Chính sách bảo hành</li>

                    </ul>

                </div>

            </div>

        </div>



        {{-- =====================================================
            BUTTONS
        ====================================================== --}}

        <div class="col-12">

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('admin.products.index') }}"
                    class="btn btn-light-secondary"
                >

                    Hủy

                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-save me-1"></i>

                    {{ $isEdit
                        ? 'Cập nhật sản phẩm'
                        : 'Lưu sản phẩm'
                    }}

                </button>

            </div>

        </div>

    </div>

</form>

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
                        <div class="col-md-6"><label class="form-label">Loại</label><select name="attribute_type" class="form-select"><option value="variation">Variation</option><option value="information">Information</option></select></div>
                        <div class="col-md-6"><label class="form-label">Kiểu nhập</label><select name="display_type" class="form-select">@foreach(['select','radio','checkbox','color','button','text','number','textarea'] as $type)<option value="{{ $type }}">{{ $type }}</option>@endforeach</select></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">Hủy</button><button type="submit" class="btn btn-primary" id="new-attribute-submit">Tạo thuộc tính</button></div>
            </form>
        </div>
    </div>
</div>

{{-- =========================================================
    EDITOR CSS
========================================================= --}}

<style>

    /*
    |--------------------------------------------------------------------------
    | EDITOR WRAPPER
    |--------------------------------------------------------------------------
    */

    .description-editor-wrapper {
        width: 100%;
        border: 1px solid #dfe3e7;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        position: relative;
    }


    /*
    |--------------------------------------------------------------------------
    | TOOLBAR
    |--------------------------------------------------------------------------
    */

    .description-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 3px;
        padding: 8px;
        background: #f8f9fa;
        border-bottom: 1px solid #dfe3e7;
    }


    .toolbar-group {
        display: flex;
        align-items: center;
        gap: 2px;
        padding-right: 6px;
        margin-right: 3px;
        border-right: 1px solid #dee2e6;
    }


    .toolbar-group:last-child {
        border-right: none;
    }


    /*
    |--------------------------------------------------------------------------
    | BUTTON
    |--------------------------------------------------------------------------
    */

    .toolbar-btn {
        position: relative;
        width: 34px;
        height: 34px;
        padding: 0;
        border: 1px solid transparent;
        border-radius: 5px;
        background: transparent;
        color: #343a40;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all .15s ease;
        font-size: 16px;
    }


    .toolbar-btn:hover {
        background: #e9ecef;
        border-color: #ced4da;
    }


    .toolbar-btn.active {
        background: #d10024;
        color: #fff;
        border-color: #d10024;
    }


    .toolbar-image-btn {
        color: #d10024;
    }


    .toolbar-image-btn:hover {
        background: #d10024;
        color: #fff;
    }


    /*
    |--------------------------------------------------------------------------
    | SELECT
    |--------------------------------------------------------------------------
    */

    .toolbar-select {
        height: 34px;
        min-width: 125px;
        padding: 0 8px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background: #fff;
        color: #343a40;
        font-size: 13px;
        cursor: pointer;
    }


    .toolbar-select:focus {
        outline: none;
        border-color: #86b7fe;
    }


    /*
    |--------------------------------------------------------------------------
    | COLOR PICKER
    |--------------------------------------------------------------------------
    */

    .toolbar-color {
        width: 34px;
        height: 34px;
        border: 1px solid transparent;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        color: #343a40;
    }


    .toolbar-color:hover {
        background: #e9ecef;
        border-color: #ced4da;
    }


    .toolbar-color input[type="color"] {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }


    /*
    |--------------------------------------------------------------------------
    | UNLINK ICON
    |--------------------------------------------------------------------------
    */

    .unlink-x {
        position: absolute;
        right: 3px;
        bottom: 1px;
        font-size: 11px;
        line-height: 1;
    }


    /*
    |--------------------------------------------------------------------------
    | EDITOR
    |--------------------------------------------------------------------------
    */

    .description-editor {
        min-height: 420px;
        max-height: 800px;
        overflow-y: auto;
        padding: 18px;
        background: #fff;
        color: #212529;
        font-size: 15px;
        line-height: 1.75;
        outline: none;
    }


    .description-editor:focus {
        box-shadow: inset 0 0 0 1px rgba(209, 0, 36, .12);
    }


    .description-editor:empty::before {
        content: attr(data-placeholder);
        color: #adb5bd;
        pointer-events: none;
    }


    /*
    |--------------------------------------------------------------------------
    | CONTENT
    |--------------------------------------------------------------------------
    */

    .description-editor h1 {
        font-size: 30px;
        margin: 20px 0 12px;
    }


    .description-editor h2 {
        font-size: 25px;
        margin: 18px 0 10px;
    }


    .description-editor h3 {
        font-size: 21px;
        margin: 16px 0 8px;
    }


    .description-editor h4 {
        font-size: 18px;
        margin: 14px 0 8px;
    }


    .description-editor p {
        margin: 0 0 12px;
    }


    .description-editor ul,
    .description-editor ol {
        margin: 10px 0 15px;
        padding-left: 30px;
    }


    .description-editor ul {
        list-style: disc;
    }


    .description-editor ol {
        list-style: decimal;
    }


    .description-editor li {
        margin-bottom: 5px;
    }


    .description-editor blockquote {
        margin: 15px 0;
        padding: 12px 18px;
        border-left: 4px solid #d10024;
        background: #f8f9fa;
        color: #6c757d;
    }


    .description-editor a {
        color: #d10024;
        text-decoration: underline;
    }


    .description-editor img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 15px 0;
        border-radius: 6px;
    }


    .description-editor img.description-image {
        cursor: pointer;
    }


    .description-editor img.description-image.image-selected {
        outline: 2px solid #d10024;
        outline-offset: 3px;
    }


    .image-resize-overlay {
        position: absolute;
        z-index: 10;
        display: none;
        pointer-events: none;
        border: 1px dashed #d10024;
    }


    .image-resize-overlay.visible {
        display: block;
    }


    .image-resize-handle {
        position: absolute;
        width: 10px;
        height: 10px;
        border: 1px solid #fff;
        border-radius: 2px;
        background: #d10024;
        pointer-events: auto;
    }


    .image-resize-handle[data-corner="nw"] {
        top: -6px;
        left: -6px;
        cursor: nwse-resize;
    }


    .image-resize-handle[data-corner="ne"] {
        top: -6px;
        right: -6px;
        cursor: nesw-resize;
    }


    .image-resize-handle[data-corner="sw"] {
        bottom: -6px;
        left: -6px;
        cursor: nesw-resize;
    }


    .image-resize-handle[data-corner="se"] {
        right: -6px;
        bottom: -6px;
        cursor: nwse-resize;
    }


    .image-delete-btn {
        position: absolute;
        top: -34px;
        right: -1px;
        pointer-events: auto;
        border: 0;
        border-radius: 4px;
        padding: 4px 8px;
        background: #d10024;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
    }


    /*
    |--------------------------------------------------------------------------
    | MOBILE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 768px) {

        .description-toolbar {
            gap: 2px;
        }

        .toolbar-group {
            border-right: none;
            padding-right: 2px;
            margin-right: 2px;
        }

        .toolbar-btn {
            width: 32px;
            height: 32px;
        }

        .toolbar-select {
            min-width: 105px;
        }

        .description-editor {
            min-height: 350px;
        }

    }

</style>



{{-- =========================================================
    EDITOR JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | ELEMENTS
    |--------------------------------------------------------------------------
    */

    const editor =
        document.getElementById('description-editor');

    const descriptionInput =
        document.getElementById('description');

    const productForm =
        document.getElementById('product-form');

    const thumbnailInput =
        document.getElementById('thumbnail-input');

    const thumbnailPreview =
        document.getElementById('thumbnail-preview');

    if (thumbnailInput && thumbnailPreview) {
        thumbnailInput.addEventListener('change', function () {
            const file = this.files && this.files[0];

            if (!file) {
                return;
            }

            if (thumbnailPreview.dataset.objectUrl) {
                URL.revokeObjectURL(thumbnailPreview.dataset.objectUrl);
            }

            const objectUrl = URL.createObjectURL(file);
            thumbnailPreview.dataset.objectUrl = objectUrl;
            thumbnailPreview.src = objectUrl;
        });
    }

    const variantImageInput =
        document.getElementById('variant-image-input');

    const variantImagePreview =
        document.getElementById('variant-preview');

    if (variantImageInput && variantImagePreview) {
        variantImageInput.addEventListener('change', function () {
            const file = this.files && this.files[0];

            if (!file) {
                return;
            }

            if (variantImagePreview.dataset.objectUrl) {
                URL.revokeObjectURL(variantImagePreview.dataset.objectUrl);
            }

            const objectUrl = URL.createObjectURL(file);
            variantImagePreview.dataset.objectUrl = objectUrl;
            variantImagePreview.src = objectUrl;
        });
    }



    /*
    |--------------------------------------------------------------------------
    | LOAD OLD DESCRIPTION
    |--------------------------------------------------------------------------
    */

    if (
        editor &&
        descriptionInput
    ) {

        editor.innerHTML =
            descriptionInput.value || '';

    }



    /*
    |--------------------------------------------------------------------------
    | FOCUS EDITOR
    |--------------------------------------------------------------------------
    */

    function focusEditor() {

        if (editor) {
            editor.focus();
        }

    }



    /*
    |--------------------------------------------------------------------------
    | EXECUTE COMMAND
    |--------------------------------------------------------------------------
    */

    function executeCommand(command, value = null) {

        focusEditor();

        if (selectedImage && ['justifyLeft', 'justifyCenter', 'justifyRight'].includes(command)) {
            selectedImage.style.margin = command === 'justifyCenter'
                ? '15px auto'
                : command === 'justifyRight'
                    ? '15px 0 15px auto'
                    : '15px 0';
            syncDescription();
            updateResizeOverlay();
            return;
        }

        document.execCommand(
            command,
            false,
            value
        );

        syncDescription();

    }



    /*
    |--------------------------------------------------------------------------
    | TOOLBAR BUTTONS
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            '#description-toolbar [data-command]'
        )
        .forEach(function (button) {

            button.addEventListener(
                'mousedown',
                function (event) {

                    event.preventDefault();

                }
            );


            button.addEventListener(
                'click',
                function () {

                    const command =
                        this.dataset.command;

                    executeCommand(command);

                }
            );

        });



    /*
    |--------------------------------------------------------------------------
    | FORMAT BLOCK
    |--------------------------------------------------------------------------
    */

    const formatBlock =
        document.getElementById('formatBlock');


    if (formatBlock) {

        formatBlock.addEventListener(
            'change',
            function () {

                executeCommand(
                    'formatBlock',
                    this.value
                );

                focusEditor();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | TEXT COLOR
    |--------------------------------------------------------------------------
    */

    const textColor =
        document.getElementById('textColor');


    if (textColor) {

        textColor.addEventListener(
            'change',
            function () {

                executeCommand(
                    'foreColor',
                    this.value
                );

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | HIGHLIGHT COLOR
    |--------------------------------------------------------------------------
    */

    const highlightColor =
        document.getElementById('highlightColor');


    if (highlightColor) {

        highlightColor.addEventListener(
            'change',
            function () {

                focusEditor();

                try {

                    document.execCommand(
                        'hiliteColor',
                        false,
                        this.value
                    );

                } catch (error) {

                    document.execCommand(
                        'backColor',
                        false,
                        this.value
                    );

                }

                syncDescription();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | INSERT LINK
    |--------------------------------------------------------------------------
    */

    const insertLink =
        document.getElementById('insert-link');


    if (insertLink) {

        insertLink.addEventListener(
            'click',
            function () {

                focusEditor();


                const selection =
                    window.getSelection();


                if (
                    !selection ||
                    selection.rangeCount === 0
                ) {

                    alert(
                        'Hãy bôi đen đoạn văn bản cần chèn liên kết.'
                    );

                    return;

                }


                const url =
                    prompt(
                        'Nhập đường dẫn liên kết:',
                        'https://'
                    );


                if (!url) {
                    return;
                }


                document.execCommand(
                    'createLink',
                    false,
                    url
                );


                syncDescription();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | REMOVE LINK
    |--------------------------------------------------------------------------
    */

    const removeLink =
        document.getElementById('remove-link');


    if (removeLink) {

        removeLink.addEventListener(
            'click',
            function () {

                executeCommand(
                    'unlink'
                );

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | IMAGE UPLOAD
    |--------------------------------------------------------------------------
    */

    let selectedImage = null;
    let resizeState = null;
    const resizeOverlay = document.createElement('div');
    resizeOverlay.className = 'image-resize-overlay editor-only';
    resizeOverlay.contentEditable = 'false';
    resizeOverlay.innerHTML = '<button type="button" class="image-delete-btn">Xóa ảnh</button>'
        + '<span class="image-resize-handle" data-corner="nw"></span>'
        + '<span class="image-resize-handle" data-corner="ne"></span>'
        + '<span class="image-resize-handle" data-corner="sw"></span>'
        + '<span class="image-resize-handle" data-corner="se"></span>';
    editor.parentElement.appendChild(resizeOverlay);

    function isEditorImage(image) {
        return image && image.tagName === 'IMG' && editor.contains(image);
    }

    function updateResizeOverlay() {
        if (!isEditorImage(selectedImage)) {
            resizeOverlay.classList.remove('visible');
            return;
        }

        const editorRect = editor.parentElement.getBoundingClientRect();
        const imageRect = selectedImage.getBoundingClientRect();
        resizeOverlay.style.left = imageRect.left - editorRect.left + 'px';
        resizeOverlay.style.top = imageRect.top - editorRect.top + 'px';
        resizeOverlay.style.width = imageRect.width + 'px';
        resizeOverlay.style.height = imageRect.height + 'px';
        resizeOverlay.classList.add('visible');
    }

    function selectDescriptionImage(image) {
        selectedImage?.classList.remove('image-selected');
        selectedImage = isEditorImage(image) ? image : null;
        selectedImage?.classList.add('image-selected');
        updateResizeOverlay();
    }

    function insertImageAtSelection(image) {
        const selection = window.getSelection();
        let range = selection?.rangeCount && editor.contains(selection.anchorNode)
            ? selection.getRangeAt(0)
            : null;

        if (!range) {
            range = document.createRange();
            range.selectNodeContents(editor);
            range.collapse(false);
        }

        range.deleteContents();
        range.insertNode(image);
        const paragraph = document.createElement('p');
        paragraph.innerHTML = '<br>';
        image.parentNode.insertBefore(paragraph, image.nextSibling);
        range.setStart(paragraph, 0);
        range.collapse(true);
        selection.removeAllRanges();
        selection.addRange(range);
    }

    function uploadDescriptionImage(file) {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!allowedTypes.includes(file.type)) {
            alert('Chỉ chấp nhận ảnh JPG, JPEG, PNG hoặc WEBP.');
            return;
        }

        if (file.size > 4 * 1024 * 1024) {
            alert('Ảnh không được vượt quá 4MB.');
            return;
        }

        const data = new FormData();
        data.append('upload', file);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("admin.products.upload-description-image") }}');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]')?.content || '');
        xhr.responseType = 'json';
        xhr.onload = function () {
            const response = xhr.response;

            if (xhr.status < 200 || xhr.status >= 300 || !response?.uploaded || !response.url) {
                alert(response?.message || 'Upload ảnh thất bại.');
                return;
            }

            const image = document.createElement('img');
            image.src = response.url;
            image.alt = file.name;
            image.className = 'description-image';
            image.draggable = true;
            image.style.maxWidth = '100%';
            image.style.height = 'auto';
            image.style.display = 'block';
            image.style.margin = '15px 0';
            insertImageAtSelection(image);
            selectDescriptionImage(image);
            syncDescription();
        };
        xhr.onerror = () => alert('Không thể kết nối tới máy chủ để upload ảnh.');
        xhr.send(data);
    }

    const activeUploadImageButton = document.getElementById('upload-description-image');
    const activeImageInput = document.getElementById('description-image-input');
    activeUploadImageButton?.addEventListener('mousedown', event => event.preventDefault());
    activeUploadImageButton?.addEventListener('click', () => activeImageInput?.click());
    activeImageInput?.addEventListener('change', function () {
        Array.from(this.files || []).forEach(uploadDescriptionImage);
        this.value = '';
    });

    editor.addEventListener('click', function (event) {
        if (resizeOverlay.contains(event.target)) {
            return;
        }

        selectDescriptionImage(event.target.tagName === 'IMG' ? event.target : null);
    });

    editor.addEventListener('dragstart', function (event) {
        if (event.target.tagName === 'IMG') {
            selectDescriptionImage(event.target);
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', 'description-image');
        }
    });

    editor.addEventListener('dragover', function (event) {
        if (selectedImage && event.dataTransfer.types.includes('text/plain')) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        }
    });

    editor.addEventListener('drop', function (event) {
        if (!selectedImage || !event.dataTransfer.types.includes('text/plain')) {
            return;
        }

        event.preventDefault();
        const range = document.caretRangeFromPoint
            ? document.caretRangeFromPoint(event.clientX, event.clientY)
            : (() => {
                const position = document.caretPositionFromPoint?.(event.clientX, event.clientY);

                if (!position) {
                    return null;
                }

                const fallbackRange = document.createRange();
                fallbackRange.setStart(position.offsetNode, position.offset);
                fallbackRange.collapse(true);
                return fallbackRange;
            })();

        if (range && editor.contains(range.startContainer)) {
            if (selectedImage.contains(range.startContainer)) {
                range.setStartAfter(selectedImage);
                range.collapse(true);
            } else {
                range.deleteContents();
                range.insertNode(selectedImage);
            }

            selectDescriptionImage(selectedImage);
            syncDescription();
        }
    });

    resizeOverlay.querySelector('.image-delete-btn').addEventListener('click', function () {
        if (isEditorImage(selectedImage)) {
            selectedImage.remove();
            selectDescriptionImage(null);
            syncDescription();
        }
    });

    resizeOverlay.querySelectorAll('.image-resize-handle').forEach(handle => {
        handle.addEventListener('mousedown', function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (isEditorImage(selectedImage)) {
                resizeState = {
                    corner: this.dataset.corner,
                    startX: event.clientX,
                    startY: event.clientY,
                    startWidth: selectedImage.getBoundingClientRect().width,
                    ratio: selectedImage.naturalWidth && selectedImage.naturalHeight
                        ? selectedImage.naturalWidth / selectedImage.naturalHeight
                        : selectedImage.getBoundingClientRect().width / selectedImage.getBoundingClientRect().height
                };
            }
        });
    });

    document.addEventListener('mousemove', function (event) {
        if (!resizeState || !isEditorImage(selectedImage)) {
            return;
        }

        const horizontalDirection = resizeState.corner.includes('e') ? 1 : -1;
        const verticalDirection = resizeState.corner.includes('s') ? 1 : -1;
        const deltaX = (event.clientX - resizeState.startX) * horizontalDirection;
        const deltaY = (event.clientY - resizeState.startY) * verticalDirection;
        const delta = resizeState.corner.includes('e') || resizeState.corner.includes('w')
            ? deltaX
            : deltaY * resizeState.ratio;
        const maxWidth = Math.max(80, editor.clientWidth - 36);
        const width = Math.min(maxWidth, Math.max(80, resizeState.startWidth + delta));

        selectedImage.style.width = width + 'px';
        selectedImage.style.height = 'auto';
        updateResizeOverlay();
        syncDescription();
    });

    document.addEventListener('mouseup', () => resizeState = null);
    editor.addEventListener('keydown', function (event) {
        if (selectedImage && (event.key === 'Delete' || event.key === 'Backspace')) {
            event.preventDefault();
            selectedImage.remove();
            selectDescriptionImage(null);
            syncDescription();
        }
    });

    editor.querySelectorAll('img').forEach(image => {
        image.classList.add('description-image');
        image.draggable = true;
        image.style.maxWidth = '100%';
    });

    editor.addEventListener('scroll', updateResizeOverlay);
    window.addEventListener('resize', updateResizeOverlay);

    /*
    |--------------------------------------------------------------------------
    | SYNC EDITOR -> TEXTAREA
    |--------------------------------------------------------------------------
    */

    function syncDescription() {

        if (
            editor &&
            descriptionInput
        ) {
            const content = editor.cloneNode(true);
            content.querySelectorAll('.editor-only').forEach(element => element.remove());
            content.querySelectorAll('.image-selected').forEach(element => element.classList.remove('image-selected'));

            descriptionInput.value = content.innerHTML;

        }

    }



    /*
    |--------------------------------------------------------------------------
    | EDITOR EVENTS
    |--------------------------------------------------------------------------
    */

    if (editor) {

        editor.addEventListener(
            'input',
            function () {

                syncDescription();

            }
        );


        editor.addEventListener(
            'keyup',
            function () {

                syncDescription();

            }
        );


        editor.addEventListener(
            'blur',
            function () {

                syncDescription();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | SUBMIT
    |--------------------------------------------------------------------------
    */

    if (productForm) {

        productForm.addEventListener(
            'submit',
            function () {

                syncDescription();

            }
        );

    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE ACTIVE BUTTON
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            '#description-toolbar [data-command]'
        )
        .forEach(function (button) {

            button.addEventListener(
                'click',
                function () {

                    setTimeout(function () {

                        updateToolbarState();

                    }, 10);

                }
            );

        });


    function updateToolbarState() {

        const commands = [
            'bold',
            'italic',
            'underline',
            'strikeThrough',
            'justifyLeft',
            'justifyCenter',
            'justifyRight',
            'insertUnorderedList',
            'insertOrderedList'
        ];


        commands.forEach(function (command) {

            const button =
                document.querySelector(
                    '#description-toolbar [data-command="' +
                    command +
                    '"]'
                );


            if (!button) {
                return;
            }


            try {

                if (
                    document.queryCommandState(
                        command
                    )
                ) {

                    button.classList.add(
                        'active'
                    );

                } else {

                    button.classList.remove(
                        'active'
                    );

                }

            } catch (error) {

                // Không làm gì nếu browser không hỗ trợ.

            }

        });

    }



    /*
    |--------------------------------------------------------------------------
    | SELECTION CHANGE
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'selectionchange',
        function () {

            if (
                document.activeElement === editor
            ) {

                updateToolbarState();

            }

        }
    );

});

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('product-attributes-list');
    const empty = document.getElementById('product-attributes-empty');
    const alertBox = document.getElementById('product-attributes-alert');
    const attributes = @json($attributeOptions);
    const initialRows = @json($productAttributeRows);
    const saveUrl = @json($isEdit ? route('admin.products.attributes.update', $product) : null);
    const attributeCreateUrl = @json(route('admin.attributes.ajax.store'));
    const valueCreateBaseUrl = @json(url('/admin/attributes'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || @json(csrf_token());

    if (!list) return;

    const escapeHtml = value => String(value ?? '').replace(/[&<>'"]/g, character => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#039;', '"': '&quot;'
    }[character]));

    const getAttribute = id => attributes.find(attribute => Number(attribute.id) === Number(id));
    const selectedValues = select => Array.from(select.selectedOptions).map(option => Number(option.value));

    function showAlert(message, type = 'success') {
        alertBox.innerHTML = `<div class="alert alert-${type} py-2 mb-0">${escapeHtml(message)}</div>`;
        window.setTimeout(() => { alertBox.innerHTML = ''; }, 4500);
    }

    function updateEmptyState() {
        empty.classList.toggle('d-none', list.children.length > 0);
    }

    function renderRow(row = {}) {
        const attribute = getAttribute(row.attribute_id) || attributes[0];
        if (!attribute) return;

        const values = Array.isArray(row.values) ? row.values.map(Number) : [];
        const wrapper = document.createElement('div');
        wrapper.className = 'product-attribute-row border rounded p-3';
        wrapper.dataset.attributeId = attribute.id;
        wrapper.innerHTML = `
            <div class="row g-3 align-items-start">
                <div class="col-lg-3">
                    <label class="form-label fw-semibold">Thuộc tính</label>
                    <select class="form-select product-attribute-select">
                        ${attributes.map(item => `<option value="${item.id}" ${Number(item.id) === Number(attribute.id) ? 'selected' : ''}>${escapeHtml(item.name)}</option>`).join('')}
                    </select>
                    <span class="small text-muted attribute-type-label"></span>
                </div>
                <div class="col-lg-5">
                    <label class="form-label fw-semibold">Giá trị</label>
                    <select class="form-select product-attribute-values" multiple size="3"></select>
                    <div class="input-group input-group-sm mt-2">
                        <input class="form-control new-attribute-value" placeholder="Giá trị mới, nhấn Enter">
                        <input class="form-control new-attribute-color d-none" type="color" value="#d10024" style="max-width:52px">
                        <button class="btn btn-outline-secondary add-attribute-value" type="button">Thêm giá trị</button>
                    </div>
                    <input class="form-control form-control-sm mt-2 product-attribute-custom d-none" placeholder="Giá trị riêng của sản phẩm" value="${escapeHtml(row.custom_value || '')}">
                </div>
                <div class="col-lg-3 pt-lg-4">
                    <div class="form-check mb-2"><input class="form-check-input use-for-variation" type="checkbox" ${row.attribute_type === 'variation' ? 'checked' : ''}><label class="form-check-label">Dùng để tạo biến thể</label></div>
                    <div class="form-check"><input class="form-check-input show-on-product" type="checkbox" ${row.show_on_product !== false ? 'checked' : ''}><label class="form-check-label">Hiển thị trên trang sản phẩm</label></div>
                </div>
                <div class="col-lg-1 pt-lg-4 text-lg-end"><button type="button" class="btn btn-sm btn-outline-danger remove-product-attribute" title="Xóa thuộc tính"><i class="bi bi-trash"></i></button></div>
            </div>`;

        list.appendChild(wrapper);
        refreshRow(wrapper, values);
        updateEmptyState();
    }

    function refreshRow(rowElement, keepValues = []) {
        const attribute = getAttribute(rowElement.querySelector('.product-attribute-select').value);
        const valueSelect = rowElement.querySelector('.product-attribute-values');
        const customInput = rowElement.querySelector('.product-attribute-custom');
        const colorInput = rowElement.querySelector('.new-attribute-color');
        const typeLabel = rowElement.querySelector('.attribute-type-label');
        const allowedValues = attribute?.values || [];
        const selected = new Set(keepValues.map(Number));

        rowElement.dataset.attributeId = attribute?.id || '';
        valueSelect.innerHTML = allowedValues.map(value => `<option value="${value.id}" ${selected.has(Number(value.id)) ? 'selected' : ''}>${escapeHtml(value.value)}</option>`).join('');
        typeLabel.textContent = attribute ? `${attribute.attribute_type} · ${attribute.display_type}` : '';
        customInput.classList.toggle('d-none', !['text', 'number', 'textarea'].includes(attribute?.display_type));
        colorInput.classList.toggle('d-none', attribute?.display_type !== 'color');
    }

    function collectRows() {
        return Array.from(list.querySelectorAll('.product-attribute-row')).map(row => ({
            attribute_id: Number(row.dataset.attributeId),
            values: selectedValues(row.querySelector('.product-attribute-values')),
            custom_value: row.querySelector('.product-attribute-custom').value.trim(),
            attribute_type: row.querySelector('.use-for-variation').checked ? 'variation' : 'information',
            show_on_product: row.querySelector('.show-on-product').checked ? 1 : 0,
        }));
    }

    function syncProductAttributesPayload() {
        const payload = document.getElementById('product-attributes-payload');
        if (payload) {
            payload.value = JSON.stringify(collectRows());
        }
    }

    initialRows.forEach(renderRow);
    updateEmptyState();

    document.getElementById('add-product-attribute')?.addEventListener('click', () => renderRow());

    document.getElementById('save-product-attributes')?.addEventListener('click', async function () {
        if (!saveUrl) {
            syncProductAttributesPayload();
            showAlert('Thuộc tính đã sẵn sàng và sẽ được lưu cùng sản phẩm.', 'success');
            return;
        }

        const button = this;
        button.disabled = true;
        button.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Đang lưu';
        try {
            const response = await fetch(saveUrl, {
                method: 'PUT',
                headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken},
                body: JSON.stringify({attributes: collectRows()})
            });
            const result = await response.json();
            if (!response.ok) throw new Error(result.message || 'Không thể lưu thuộc tính.');
            showAlert(result.message);
        } catch (error) {
            showAlert(error.message, 'danger');
        } finally {
            button.disabled = false;
            button.innerHTML = '<i class="bi bi-save me-1"></i>Lưu thuộc tính';
        }
    });
                        syncProductAttributesPayload();

    list.addEventListener('change', event => {
        if (event.target.classList.contains('product-attribute-select')) {
            refreshRow(event.target.closest('.product-attribute-row'));
        }
    });

    list.addEventListener('click', async event => {
        const row = event.target.closest('.product-attribute-row');
        if (!row) return;
        if (event.target.closest('.remove-product-attribute')) {
            row.remove();
            updateEmptyState();
            return;
        }
        if (!event.target.closest('.add-attribute-value')) return;

        const input = row.querySelector('.new-attribute-value');
        const value = input.value.trim();
        const attributeId = Number(row.dataset.attributeId);
        if (!value) return;
        const button = event.target.closest('.add-attribute-value');
        button.disabled = true;
        try {
            const response = await fetch(`${valueCreateBaseUrl}/${attributeId}/values/ajax`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken},
                body: JSON.stringify({value, color_hex: row.querySelector('.new-attribute-color').value})
            });
            const result = await response.json();
            if (!response.ok) throw new Error(result.message || 'Không thể thêm giá trị.');
            const option = new Option(result.value.value, result.value.id, true, true);
            row.querySelector('.product-attribute-values').add(option);
            input.value = '';
            showAlert(result.message);
        } catch (error) {
            showAlert(error.message, 'danger');
        } finally {
            button.disabled = false;
        }
    });

    list.addEventListener('keydown', event => {
        if (event.key === 'Enter' && event.target.classList.contains('new-attribute-value')) {
            event.preventDefault();
            event.target.closest('.product-attribute-row').querySelector('.add-attribute-value').click();
        }
    });

    const modalElement = document.getElementById('new-attribute-modal');
    document.getElementById('create-new-attribute')?.addEventListener('click', () => {
        if (!modalElement || !window.bootstrap) {
            showAlert('Giao diện Bootstrap chưa sẵn sàng. Vui lòng thử lại.', 'danger');
            return;
        }

        window.bootstrap.Modal.getOrCreateInstance(modalElement).show();
    });
    document.getElementById('new-attribute-form')?.addEventListener('submit', async event => {
        event.preventDefault();
        const form = event.currentTarget;
        const button = document.getElementById('new-attribute-submit');
        button.disabled = true;
        try {
            const response = await fetch(attributeCreateUrl, {
                method: 'POST',
                headers: {'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken},
                body: new FormData(form)
            });
            const result = await response.json();
            if (!response.ok) throw new Error(result.message || 'Không thể tạo thuộc tính.');
            const attribute = result.attribute;
            attributes.push(attribute);
            renderRow({attribute_id: attribute.id, attribute_type: attribute.attribute_type, show_on_product: true, values: []});
            form.reset();
            if (modalElement && window.bootstrap) {
                window.bootstrap.Modal.getOrCreateInstance(modalElement).hide();
            }
            showAlert(result.message);
        } catch (error) {
            document.getElementById('new-attribute-alert').innerHTML = `<div class="alert alert-danger py-2">${escapeHtml(error.message)}</div>`;
        } finally {
            button.disabled = false;
        }
    });
});
</script>

@endsection