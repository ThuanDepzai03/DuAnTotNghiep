@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý danh mục</h3>
            <p class="text-subtitle text-muted mb-0">
                Thêm, sửa, ẩn và khôi phục danh mục sản phẩm.
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Thêm danh mục
        </a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        Danh sách danh mục
                        <span class="badge bg-light-primary text-primary ms-2">
                            {{ $categories->count() }}
                        </span>
                    </h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th width="90">ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Slug</th>
                                    <th width="150">Trạng thái</th>
                                    <th width="190">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            <strong>#{{ $category->id }}</strong>
                                        </td>

                                        <td>
                                            <strong>{{ $category->name }}</strong>
                                        </td>

                                        <td>
                                            <code>{{ $category->slug }}</code>
                                        </td>

                                        <td>
                                            @if($category->status)
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
                                                <a
                                                    href="{{ route('admin.categories.edit', $category->id) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                >
                                                    <i class="bi bi-pencil-square"></i>
                                                    Sửa
                                                </a>

                                                @if($category->status)
                                                    <form
                                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc muốn ẩn danh mục này không?')"
                                                    >
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-eye-slash"></i>
                                                            Ẩn
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin.categories.restore', $category->id) }}"
                                                        method="POST"
                                                    >
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
                                            <i class="bi bi-folder-x fs-2 text-muted d-block mb-2"></i>
                                            <strong>Chưa có danh mục nào</strong>
                                            <p class="text-muted mb-3">
                                                Hãy tạo danh mục đầu tiên cho cửa hàng.
                                            </p>

                                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                                <i class="bi bi-plus-circle"></i>
                                                Thêm danh mục
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
