@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Thêm thương hiệu</h3>
            <p class="text-subtitle text-muted mb-0">
                Tạo thương hiệu mới và upload logo cho sản phẩm.
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
                    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Tên thương hiệu <span class="text-danger">*</span></label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Ví dụ: Apple"
                            >

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Logo thương hiệu</label>

                            <input
                                type="file"
                                name="logo"
                                accept="image/*"
                                class="form-control @error('logo') is-invalid @enderror"
                            >

                            <small class="text-muted d-block mt-2">
                                Hỗ trợ: JPG, PNG, WEBP, GIF. Kích thước đề xuất 256x256 hoặc vuông.
                            </small>

                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>

                            <select name="status" class="form-select @error('status') is-invalid @enderror">
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

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i>
                            Lưu thương hiệu
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
