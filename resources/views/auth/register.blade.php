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
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tên đăng nhập</label>
                            <input type="text" name="user" class="form-control" value="{{ old('user') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="tel" class="form-control" value="{{ old('tel') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tỉnh/Thành phố</label>
                            <select name="city" id="register-city" class="form-select" required>
                                <option value="">-- Chọn tỉnh/thành --</option>
                                @foreach ($cityOptions ?? [] as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phường/Xã</label>
                            <select name="ward" id="register-ward" class="form-select" required>
                                <option value="">-- Chọn phường/xã --</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Địa chỉ chi tiết</label>
                            <input type="text" name="address_detail" class="form-control" placeholder="Số nhà, tên đường..." required>
                        </div>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger mt-3 py-2">{{ $errors->first() }}</div>
                    @endif
                    <button class="btn btn-primary w-100 mt-4">Đăng ký</button>
                </form>
                <div class="d-flex align-items-center gap-2 my-3 text-muted">
                    <hr class="flex-grow-1"><span>hoặc</span><hr class="flex-grow-1">
                </div>
                <a href="{{ route('google.redirect') }}" class="btn btn-outline-dark w-100">
                    <strong class="me-2">G</strong> Đăng ký bằng Google
                </a>

                <script>
                    const registerCityMap = @json($wardOptions ?? []);
                    const registerCity = document.getElementById('register-city');
                    const registerWard = document.getElementById('register-ward');

                    if (registerCity && registerWard) {
                        registerCity.addEventListener('change', function () {
                            const city = this.value;
                            const wards = registerCityMap[city] || [];

                            registerWard.innerHTML = '<option value="">-- Chọn phường/xã --</option>';
                            wards.forEach(function (ward) {
                                const option = document.createElement('option');
                                option.value = ward;
                                option.textContent = ward;
                                registerWard.appendChild(option);
                            });
                        });
                    }
                </script>
                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
