@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Thêm sản phẩm</h3>
            <p class="text-subtitle text-muted mb-0">
                Tạo sản phẩm mới và thêm biến thể đầu tiên cho cửa hàng.
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
        action="{{ route('admin.products.store') }}"
        enctype="multipart/form-data"
    >
        @csrf

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
                                        value="{{ old('name') }}"
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
                                        value="{{ old('sku') }}"
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
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}
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
                                placeholder="Nhập thông tin, đặc điểm nổi bật của sản phẩm..."
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Ảnh đại diện sản phẩm</label>

                            <input
                                type="file"
                                name="thumbnail"
                                accept=".jpg,.jpeg,.png,.webp"
                                class="form-control @error('thumbnail') is-invalid @enderror"
                            >

                            <small class="text-muted">
                                Chấp nhận JPG, JPEG, PNG, WEBP. Dung lượng tối đa 2MB.
                            </small>

                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                    Hoạt động
                                </option>

                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    Tạm ẩn
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-light-info mb-0">
                            <i class="bi bi-info-circle me-1"></i>
                            Sau khi tạo sản phẩm, bạn có thể bổ sung thêm nhiều biến thể
                            màu sắc, RAM và dung lượng.
                        </div>
                    </div>
                </div>
            </div>

            {{-- Biến thể đầu tiên --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-layers me-1"></i>
                            Biến thể đầu tiên
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-light-primary">
                            Mỗi sản phẩm cần ít nhất một biến thể để có giá bán và số lượng tồn kho.
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Mã biến thể <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="variant_sku"
                                        value="{{ old('variant_sku') }}"
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
                                        value="{{ old('price') }}"
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
                                        value="{{ old('sale_price') }}"
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
                                        value="{{ old('stock', 0) }}"
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
                                    <label class="form-label">Ảnh của biến thể</label>

                                    <input
                                        type="file"
                                        name="variant_image"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        class="form-control @error('variant_image') is-invalid @enderror"
                                    >

                                    <small class="text-muted">
                                        Ví dụ: ảnh iPhone màu Đen. Nếu để trống sẽ dùng ảnh đại diện sản phẩm.
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

            {{-- Nút lưu --}}
            <div class="col-12">
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light-secondary">
                        Hủy
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Lưu sản phẩm
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
