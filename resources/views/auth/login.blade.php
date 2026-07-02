<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.css') }}">
    <style>
        body { background: linear-gradient(135deg, #f4f7ff, #e9f2ff); min-height: 100vh; }
        .card { border: 0; border-radius: 1rem; box-shadow: 0 12px 35px rgba(0,0,0,.08); }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <h3 class="mb-3">Đăng nhập</h3>
                <p class="text-muted">Đăng nhập để vào trang quản trị hoặc xem thông tin khách hàng.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="pass" class="form-control" required>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
                    @endif
                    <button class="btn btn-primary w-100">Đăng nhập</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
