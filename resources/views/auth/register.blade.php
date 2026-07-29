<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.css') }}">
    <style>
        body { background: linear-gradient(135deg, #f4f7ff, #e9f2ff); min-height: 100vh; }
        .card { border: 0; border-radius: 1rem; box-shadow: 0 12px 35px rgba(0,0,0,.08); }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="mb-3">Đăng ký tài khoản</h3>
                <p class="text-muted">Tạo tài khoản khách hàng để theo dõi đơn hàng và cập nhật thông tin.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tên đăng nhập</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="tel" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger mt-3 py-2">{{ $errors->first() }}</div>
                    @endif
                    <button class="btn btn-primary w-100 mt-4">Đăng ký</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
