@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3 class="mb-1">Thêm danh mục</h3>
    <p class="text-subtitle text-muted mb-0">Tạo mới danh mục sản phẩm cho cửa hàng.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin danh mục</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" required>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
