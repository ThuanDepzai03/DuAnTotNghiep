@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý banner</h3>
            <p class="text-subtitle text-muted mb-0">Quản lý banner hero và banner quảng bá trên trang chủ.</p>
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
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.banners.index') }}" class="row g-3 align-items-end mb-4">
                        <div class="col-md-4">
                            <label for="type" class="form-label">Lọc theo loại banner</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">Tất cả loại</option>
                                <option value="hero" {{ request('type') === 'hero' ? 'selected' : '' }}>Hero</option>
                                <option value="static_full" {{ request('type') === 'static_full' ? 'selected' : '' }}>Static full</option>
                                <option value="static_rect" {{ request('type') === 'static_rect' ? 'selected' : '' }}>Static rect</option>
                            </select>
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-funnel"></i> Lọc</button>
                            <a class="btn btn-light-secondary" href="{{ route('admin.banners.index') }}">Xóa lọc</a>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Nội dung</th>
                                    <th>Loại</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banners as $banner)
                                    @php
                                        $typeLabels = [
                                            'hero' => ['Hero', 'bg-primary'],
                                            'static_full' => ['Static full', 'bg-info'],
                                            'static_rect' => ['Static rect', 'bg-warning text-dark'],
                                        ];
                                        [$typeLabel, $typeClass] = $typeLabels[$banner->type] ?? [$banner->type, 'bg-secondary'];
                                    @endphp
                                    <tr>
                                        <td>
                                            <img src="{{ asset($banner->image) }}" alt="{{ $banner->title ?: 'Banner' }}" style="width: 180px; height: 80px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <strong>{{ $banner->title ?: 'Không có tiêu đề' }}</strong>
                                            @if($banner->subtitle)
                                                <small class="d-block text-muted">{{ $banner->subtitle }}</small>
                                            @endif
                                            @if($banner->link)
                                                <a href="{{ $banner->link }}" target="_blank" rel="noopener" class="d-block small text-break">{{ $banner->link }}</a>
                                            @endif
                                        </td>
                                        <td><span class="badge {{ $typeClass }}">{{ $typeLabel }}</span></td>
                                        <td><span class="badge bg-light-secondary text-dark">{{ $banner->position }}</span></td>
                                        <td>
                                            @if($banner->status)
                                                <span class="badge bg-success">Bật</span>
                                            @else
                                                <span class="badge bg-secondary">Tắt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 flex-wrap">
                                                <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-sm btn-outline-primary" title="Sửa">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('admin.banners.toggle-status', $banner) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm {{ $banner->status ? 'btn-outline-warning' : 'btn-outline-success' }}" title="{{ $banner->status ? 'Tắt' : 'Bật' }}">
                                                        <i class="bi {{ $banner->status ? 'bi-eye-slash' : 'bi-eye' }}"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa banner này không? Ảnh cũng sẽ bị xóa khỏi hệ thống.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Xóa">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center py-5">Chưa có banner nào.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">{{ $banners->links() }}</div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
