@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3 class="mb-1">Sửa danh mục</h3>
    <p class="text-subtitle text-muted mb-0">Cập nhật thông tin danh mục sản phẩm.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin danh mục</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
