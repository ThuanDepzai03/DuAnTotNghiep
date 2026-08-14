<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/bootstrap.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #111827 35%, #1d4ed8 100%);
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: min(100%, 440px);
            background: rgba(255,255,255,0.95);
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.35);
            padding: 32px 28px;
        }

        .login-title {
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #6b7280;
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
        }

        .btn-primary {
            width: 100%;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border: 0;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="login-title">Đăng nhập Admin</h3>
        <p class="login-subtitle">Chỉ tài khoản quản trị mới được truy cập khu vực quản lý.</p>

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="user">Tài khoản admin</label>
                <input id="user" type="text" name="user" class="form-control" value="{{ old('user') }}" placeholder="Nhập tên tài khoản admin" required>
                @error('user')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Mật khẩu</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            @if ($errors->any())
                <div class="alert alert-danger py-2 mb-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
