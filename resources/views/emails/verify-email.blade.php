@component('mail::message')
# Xin chào {{ $user->user }},

Cảm ơn bạn đã đăng ký tài khoản tại website của chúng tôi.

Mã xác thực email của bạn là: <strong>{{ $code }}</strong>

Vui lòng nhập mã này vào trang web để hoàn thành quá trình đăng ký.

Nếu bạn không thực hiện thao tác này, vui lòng bỏ qua email này.

Trân trọng,\n{{ config('app.name') }}
@endcomponent