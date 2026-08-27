@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;margin:60px auto">
    <h2>Quên mật khẩu</h2>
    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label for="user">Tên đăng nhập</label>
        <input id="user" type="text" name="user" value="{{ old('user') }}" required class="form-control">
        <label for="email" style="display:block;margin-top:14px">Email tài khoản</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control">
        <label for="tel" style="display:block;margin-top:14px">Số điện thoại</label>
        <input id="tel" type="tel" name="tel" value="{{ old('tel') }}" required class="form-control">
        <button type="submit" class="btn btn-primary" style="margin-top:16px">Gửi mã OTP</button>
    </form>

    @if(session('password_reset_pending_email'))
        <hr>
        <h4>Nhập mã OTP</h4>
        <form method="POST" action="{{ route('password.otp.verify') }}">
            @csrf
            <label for="otp">Mã OTP trong email</label>
            <input id="otp" type="text" name="otp" inputmode="numeric" maxlength="6" required class="form-control">
            <button type="submit" class="btn btn-success" style="margin-top:16px">Xác nhận OTP</button>
        </form>
    @endif
</div>
@endsection
