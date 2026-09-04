@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý thương hiệu</h3>
            <p class="text-subtitle text-muted mb-0">
                Thêm, sửa, ẩn và quản lý logo thương hiệu sản phẩm.
            </p>
        </div>

        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Thêm thương hiệu
        </a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        Danh sách thương hiệu
                        <span class="badge bg-light-primary text-primary ms-2">
                            {{ $brands->count() }}
                        </span>
                    </h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="GET" action="{{ route('admin.brands.index') }}" class="row g-3 align-items-end mb-4">
                        <div class="col-md-5">
                            <label for="brand-filter-category" class="form-label">Theo danh mục sản phẩm</label>
                            <select id="brand-filter-category" name="category_id" class="form-select">
                                <option value="">Tất cả danh mục</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>{{ $category->name }}</option>
                                    @foreach($category->children as $child)
                                        <option value="{{ $child->id }}" @selected((string) request('category_id') === (string) $child->id)>— {{ $child->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-funnel me-1"></i>Lọc</button>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-light-secondary">Xóa lọc</a>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th width="100">Logo</th>
                                    <th>Tên thương hiệu</th>
                                    <th>Slug</th>
                                    <th width="150">Trạng thái</th>
                                    <th width="200">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($brands as $brand)
                                    <tr>
                                        <td>
                                            @if($brand->logo)
                                                <img
                                                    src="{{ asset($brand->logo) }}"
                                                    alt="{{ $brand->name }}"
                                                    style="width: 52px; height: 52px; object-fit: contain; border-radius: 8px; background: #fff; border: 1px solid #eaeaea;"
                                                >
                                            @else
                                                <div
                                                    style="width: 52px; height: 52px; border-radius: 8px; display:flex; align-items:center; justify-content:center; background:#f4f5f7; color:#666; font-weight:700; border:1px solid #eaeaea;"
                                                >
                                                    {{ strtoupper(substr($brand->name, 0, 1)) }}
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <strong>{{ $brand->name }}</strong>
                                        </td>

                                        <td>
                                            <code>{{ $brand->slug }}</code>
                                        </td>

                                        <td>
                                            @if($brand->status)
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Hoạt động
                                                </span>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-eye-slash me-1"></i>
                                                    Đã ẩn
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2 flex-wrap">
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                    Sửa
                                                </a>

                                                @if($brand->status)
                                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn ẩn thương hiệu này không?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-eye-slash"></i>
                                                            Ẩn
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.brands.restore', $brand->id) }}" method="POST">
                                                        @csrf

                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="bi bi-arrow-counterclockwise"></i>
                                                            Khôi phục
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <i class="bi bi-tags fs-2 text-muted d-block mb-2"></i>
                                            <strong>Chưa có thương hiệu nào</strong>
                                            <p class="text-muted mb-3">
                                                Hãy tạo thương hiệu đầu tiên cho cửa hàng.
                                            </p>

                                            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
                                                <i class="bi bi-plus-circle"></i>
                                                Thêm thương hiệu
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
