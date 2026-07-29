@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Cập nhật danh mục</h3>
            <p class="text-subtitle text-muted mb-0">
                Chỉnh sửa thông tin: {{ $category->name }}.
            </p>
        </div>

        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i>
            Quay lại
        </a>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin danh mục</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $category->name) }}"
                                class="form-control @error('name') is-invalid @enderror"
                            >

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $category->slug }}"
                                disabled
                            >

                            <small class="text-muted">
                                Slug sẽ tự cập nhật theo tên danh mục.
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>

                            <select
                                name="status"
                                class="form-select @error('status') is-invalid @enderror"
                            >
                                <option value="1" {{ old('status', $category->status ? 1 : 0) == 1 ? 'selected' : '' }}>
                                    Hoạt động
                                </option>

                                <option value="0" {{ old('status', $category->status ? 1 : 0) == 0 ? 'selected' : '' }}>
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

                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light-secondary">
                            Hủy
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
