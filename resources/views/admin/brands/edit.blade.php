@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Cập nhật thương hiệu</h3>
            <p class="text-subtitle text-muted mb-0">
                Chỉnh sửa thông tin: {{ $brand->name }}.
            </p>
        </div>

        <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin thương hiệu</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Tên thương hiệu <span class="text-danger">*</span></label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $brand->name) }}"
                                class="form-control @error('name') is-invalid @enderror"
                            >

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Logo hiện tại</label>

                            @if($brand->logo)
                                <div class="mb-2">
                                    <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" style="width: 80px; height: 80px; object-fit: contain; border: 1px solid #eaeaea; border-radius: 12px; background: #fff;">
                                </div>
                            @endif

                            <input
                                type="file"
                                name="logo"
                                accept="image/*"
                                class="form-control @error('logo') is-invalid @enderror"
                            >

                            <small class="text-muted d-block mt-2">
                                Chọn ảnh mới nếu muốn thay logo. Bỏ trống nếu giữ nguyên logo cũ.
                            </small>

                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $brand->slug }}"
                                disabled
                            >

                            <small class="text-muted">
                                Slug sẽ tự cập nhật theo tên thương hiệu.
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>

                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', $brand->status ? 1 : 0) == 1 ? 'selected' : '' }}>
                                    Hoạt động
                                </option>
                                <option value="0" {{ old('status', $brand->status ? 1 : 0) == 0 ? 'selected' : '' }}>
                                    Tạm ẩn
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i>
                            Cập nhật
                        </button>

                        <a href="{{ route('admin.brands.index') }}" class="btn btn-light-secondary">
                            Hủy
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
