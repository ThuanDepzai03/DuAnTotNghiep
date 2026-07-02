@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3 class="mb-1">Sửa sản phẩm</h3>
    <p class="text-subtitle text-muted mb-0">Cập nhật thông tin sản phẩm hiện có.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="mota" class="form-control" rows="4">{{ $product->mota }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục</label>
                            <select name="iddm" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->iddm == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
