@extends('layouts.master')

@section('content')
<div class="container my-5 text-center" style="padding: 100px 0;">
    <h2 class="text-success" style="color: #28a745; margin-bottom: 20px;">🎉 Thanh Toán Thành Công!</h2>
    <p style="font-size: 16px; margin-bottom: 30px;">Cảm ơn bạn đã mua sắm. Đơn hàng của bạn đã được xử lý thành công.</p>
    <a href="{{ route('home') }}" class="primary-btn" style="padding: 10px 30px; text-decoration: none;">Về trang chủ</a>
</div>
@endsection