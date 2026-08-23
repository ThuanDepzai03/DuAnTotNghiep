@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container" style="max-width: 620px;">
        <div class="card" style="padding: 32px;">
            <h2>Xác thực email</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <p>Kiểm tra hộp thư của bạn và bấm liên kết xác thực để kích hoạt tài khoản.</p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <label for="verification-email">Email</label>
                <input
                    id="verification-email"
                    type="email"
                    name="email"
                    class="input"
                    value="{{ old('email', $email) }}"
                    required
                >
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                <button type="submit" class="primary-btn" style="margin-top: 14px;">Gửi lại email xác thực</button>
            </form>
        </div>
    </div>
</div>
@endsection
