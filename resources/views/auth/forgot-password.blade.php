@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;margin:60px auto">
    <h2>Quên mật khẩu</h2>
    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label for="email">Email tài khoản</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control">
        <button type="submit" class="btn btn-primary" style="margin-top:16px">Gửi liên kết đặt lại mật khẩu</button>
    </form>
</div>
@endsection
