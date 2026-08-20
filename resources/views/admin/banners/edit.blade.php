@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Sửa banner trang chủ</h3>
            <p class="text-subtitle text-muted mb-0">Cập nhật nội dung hoặc thay ảnh banner.</p>
        </div>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Thông tin banner</h4></div>
                <div class="card-body">
                    <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Tiêu đề</label>
                            <input type="text" name="title" value="{{ old('title', $banner->title) }}" class="form-control @error('title') is-invalid @enderror">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh hiện tại</label>
                            <div class="mb-2">
                                <img src="{{ asset($banner->image) }}" alt="{{ $banner->title ?: 'Banner' }}" style="width: 100%; max-width: 620px; height: 180px; object-fit: cover;">
                            </div>
                            <label class="form-label">Thay ảnh mới</label>
                            <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="form-control @error('image') is-invalid @enderror">
                            <div class="form-text">Để trống nếu muốn giữ ảnh hiện tại. Tối đa 4MB.</div>
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Liên kết khi nhấn</label>
                            <input type="url" name="link" value="{{ old('link', $banner->link) }}" class="form-control @error('link') is-invalid @enderror">
                            @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', $banner->status) == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ old('status', $banner->status) == '0' ? 'selected' : '' }}>Tạm ẩn</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Cập nhật</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-light-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
