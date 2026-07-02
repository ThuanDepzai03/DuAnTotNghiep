@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý danh mục</h3>
            <p class="text-subtitle text-muted mb-0">Danh sách danh mục sản phẩm trong hệ thống.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Thêm danh mục</a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Danh sách danh mục</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>#{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <span class="badge {{ $category->deleted ? 'bg-warning' : 'bg-success' }}">
                                            {{ $category->deleted ? 'Đã ẩn' : 'Hoạt động' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-secondary">Sửa</a>
                                            @if($category->deleted)
                                                <form action="{{ route('admin.categories.restore', $category->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-sm btn-success">Khôi phục</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
