@extends('layouts.master')

@section('content')
<div class="section">
    <div class="container" style="max-width: 620px;">
        <div class="card" style="padding: 32px;">
            <h2>Xác thực email</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <p>Kiểm tra Gmail, lấy mã 6 số và nhập vào đây. Mã có hiệu lực trong 10 phút.</p>

            <form method="POST" action="{{ route('verification.code') }}">
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
                <label for="verification-code" style="margin-top: 14px;">Mã xác thực 6 số</label>
                <input
                    id="verification-code"
                    type="text"
                    name="code"
                    class="input"
                    inputmode="numeric"
                    pattern="[0-9]{6}"
                    maxlength="6"
                    required
                >
                @error('code')<div class="text-danger">{{ $message }}</div>@enderror
                <button type="submit" class="primary-btn" style="margin-top: 14px;">Xác thực email</button>
            </form>

            <form method="POST" action="{{ route('verification.resend') }}" style="margin-top: 12px;">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email) }}">
                <button type="submit" class="btn btn-link">Gửi lại mã</button>
            </form>
        </div>
    </div>
</div>
@endsection
