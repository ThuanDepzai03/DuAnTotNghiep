@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Thêm banner</h3>
            <p class="text-subtitle text-muted mb-0">Tạo banner mới cho trang chủ.</p>
        </div>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Quay lại</a>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Thông tin banner</h4></div>
                <div class="card-body">
                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.banners._form', ['banner' => null, 'submitLabel' => 'Lưu banner'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
