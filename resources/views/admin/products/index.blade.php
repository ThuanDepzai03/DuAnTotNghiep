@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý sản phẩm</h3>
            <p class="text-subtitle text-muted mb-0">Danh sách sản phẩm hiện có trong cửa hàng.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Thêm sản phẩm</a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh sách sản phẩm</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>#{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }} ₫</td>
                                    <td>{{ $product->category_name ?? '---' }}</td>
                                    <td>
                                        <span class="badge {{ $product->deleted ? 'bg-warning' : 'bg-success' }}">
                                            {{ $product->deleted ? 'Đã ẩn' : 'Hoạt động' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary">Sửa</a>
                                            @if($product->deleted)
                                                <form action="{{ route('admin.products.restore', $product->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-sm btn-success">Khôi phục</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Xóa</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
