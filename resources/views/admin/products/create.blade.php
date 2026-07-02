@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3 class="mb-1">Thêm sản phẩm</h3>
    <p class="text-subtitle text-muted mb-0">Thêm sản phẩm mới vào hệ thống bán hàng.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="mota" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục</label>
                            <select name="iddm" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
