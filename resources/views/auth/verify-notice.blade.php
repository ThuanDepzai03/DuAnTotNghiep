@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Xác thực email</h4>
                </div>
                <div class="card-body">
                    <p>Chúng tôi đã gửi một mã xác thực đến địa chỉ email:</p>
                    <h5 class="text-primary">{{ $email }}</h5>
                    <p>Vui lòng kiểm tra hộp thư đến và nhập mã xác thực ở dưới để hoàn thành việc đăng ký.</p>

                    <form method="POST" action="{{ route('verify.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Mã xác thực</label>
                            <input type="text" name="code" class="form-control" maxlength="6" placeholder="Nhập mã 6 chữ số" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Xác thực</button>
                    </form>

                    @if(session('resend'))
                        <div class="mt-3">
                            <a href="{{ route('verify.resend') }}" class="btn btn-link btn-sm">Gửi lại mã xác thực</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
