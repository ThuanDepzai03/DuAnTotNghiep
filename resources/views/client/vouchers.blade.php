@extends('layouts.master')

@section('content')
<div class="section" style="padding: 42px 0; background: #f8fafc;">
    <div class="container">
        <div class="section-title">
            <h3 class="title">Kho voucher</h3>
            <p>Chọn mã phù hợp và nhập mã tại trang thanh toán.</p>
        </div>

        <div class="row">
            @forelse($vouchers as $voucher)
                @php
                    $isShipping = $voucher->discount_type === 'free_shipping';
                    $description = $isShipping
                        ? 'Miễn phí vận chuyển'
                        : ($voucher->discount_type === 'fixed'
                            ? 'Giảm ' . number_format($voucher->discount_value, 0, ',', '.') . 'đ'
                            : 'Giảm ' . $voucher->discount_value . '%');
                @endphp
                <div class="col-md-6 col-lg-4" style="margin-bottom: 20px;">
                    <div class="voucher-card" style="height:100%; padding: 22px; background:#fff; border:1px solid #e5e7eb; border-radius:12px; box-shadow:0 8px 24px rgba(15,23,42,.06);">
                        <span class="label" style="display:inline-block; padding:5px 9px; border-radius:999px; background:{{ $isShipping ? '#dcfce7' : '#fee2e2' }}; color:{{ $isShipping ? '#15803d' : '#b91c1c' }}; font-size:12px;">
                            {{ $isShipping ? 'Phí vận chuyển' : 'Voucher đơn hàng' }}
                        </span>
                        <h3 style="margin:14px 0 6px;">{{ $voucher->code }}</h3>
                        <p style="font-weight:700; color:#d10024; margin-bottom:8px;">{{ $voucher->name }}</p>
                        <p style="margin-bottom:8px;">{{ $description }}</p>
                        @if($voucher->min_order > 0)
                            <small>Đơn tối thiểu: {{ number_format($voucher->min_order, 0, ',', '.') }}đ</small><br>
                        @endif
                        <small>Hạn dùng: {{ $voucher->end_date ? \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') : 'Không giới hạn' }}</small>
                        <div style="margin-top:18px;">
                            <a href="{{ route('vouchers.claim', $voucher->id) }}" class="primary-btn">Lấy mã</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><div class="alert alert-info">Hiện chưa có voucher khả dụng.</div></div>
            @endforelse
        </div>
    </div>
</div>
@endsection
<!-- ádsdaas -->
 <!-- ádsdaas -->