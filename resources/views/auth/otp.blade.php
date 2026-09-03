@extends('layouts.master')

@section('content')
<div class="container" style="max-width:520px;margin:60px auto">
    <h2>Nhập mã OTP</h2>
    <p>Mã OTP đã được gửi đến email {{ $email }}.</p>
    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

    <form method="POST" action="{{ route('password.otp.verify') }}">
        @csrf
        <label for="otp">Mã OTP trong email</label>
        <input id="otp" type="text" name="otp" inputmode="numeric" maxlength="6" required class="form-control" autofocus>
        <button type="submit" class="btn btn-success" style="margin-top:16px">Xác nhận OTP</button>
    </form>

    <p style="margin-top:16px"><a href="{{ route('password.request') }}">Yêu cầu mã OTP mới</a></p>
</div>
@endsection