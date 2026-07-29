@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3 class="mb-1">Thêm người dùng</h3>
    <p class="text-subtitle text-muted mb-0">Tạo tài khoản mới cho khách hàng hoặc quản trị viên.</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Thông tin tài khoản</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Tài khoản</label>
                                <input type="text" name="user" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" name="tel" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Vai trò</label>
                                <select name="role" class="form-select">
                                    <option value="0">Khách hàng</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
