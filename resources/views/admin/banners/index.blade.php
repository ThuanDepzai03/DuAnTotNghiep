@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý banner trang chủ</h3>
            <p class="text-subtitle text-muted mb-0">Thêm, sửa, ẩn và khôi phục banner hiển thị trên trang chủ.</p>
        </div>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Thêm banner
        </a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh sách banner ({{ $banners->count() }})</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Liên kết</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banners as $banner)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($banner->image) }}" alt="{{ $banner->title ?: 'Banner' }}" style="width: 180px; height: 80px; object-fit: cover;">
                                        </td>
                                        <td>{{ $banner->title ?: 'Không có tiêu đề' }}</td>
                                        <td class="text-break">{{ $banner->link ?: 'Không có' }}</td>
                                        <td>
                                            @if($banner->status)
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Đã ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 flex-wrap">
                                                <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil-square"></i> Sửa
                                                </a>
                                                @if($banner->status)
                                                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn ẩn banner này không?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-eye-slash"></i> Ẩn
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.banners.restore', $banner) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="bi bi-arrow-counterclockwise"></i> Khôi phục
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <i class="bi bi-images fs-2 text-muted d-block mb-2"></i>
                                            <strong>Chưa có banner nào</strong>
                                            <p class="text-muted mb-3">Hãy thêm banner đầu tiên cho trang chủ.</p>
                                            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Thêm banner</a>
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
