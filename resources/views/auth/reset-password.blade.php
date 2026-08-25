@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;margin:60px auto">
    <h2>Đặt lại mật khẩu</h2>
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Email tài khoản</label>
        <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required class="form-control">
        <label for="password" style="display:block;margin-top:14px">Mật khẩu mới</label>
        <input id="password" type="password" name="password" required minlength="6" class="form-control">
        <label for="password_confirmation" style="display:block;margin-top:14px">Nhập lại mật khẩu</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required minlength="6" class="form-control">
        <button type="submit" class="btn btn-primary" style="margin-top:16px">Đổi mật khẩu</button>
    </form>
</div>
@endsection
