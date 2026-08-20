@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Thêm banner trang chủ</h3>
            <p class="text-subtitle text-muted mb-0">Tải lên hình ảnh banner và cấu hình liên kết.</p>
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
                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tiêu đề</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Ví dụ: Ưu đãi iPhone tháng 8">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh banner <span class="text-danger">*</span></label>
                            <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="form-control @error('image') is-invalid @enderror" required>
                            <div class="form-text">Định dạng JPG, PNG hoặc WEBP, tối đa 4MB.</div>
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Liên kết khi nhấn</label>
                            <input type="url" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" placeholder="https://example.com hoặc {{ route('shop') }}">
                            @error('link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Trạng thái</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tạm ẩn</option>
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Lưu banner</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-light-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
