@extends('layouts.master')

@section('content')
<div class="section" style="padding: 42px 0; background: #f8fafc; min-height: 60vh;">
    <div class="container">
        <div class="section-title" style="margin-bottom: 30px;">
            <h3 class="title" style="display: flex; align-items: center; gap: 10px;">
                <i class="fa fa-ticket text-danger"></i> Kho Voucher & Ưu Đãi
            </h3>
            <p style="color: #64748b; margin-top: 4px;">Thu thập mã giảm giá độc quyền từ Mobile Mart để nhận ưu đãi vận chuyển và giảm giá khi đặt hàng.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success" style="border-radius: 12px; margin-bottom: 24px;">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @forelse($vouchers as $voucher)
                @php
                    $isShipping = $voucher->discount_type === 'free_shipping';
                    $description = $isShipping
                        ? 'Miễn phí 100% phí vận chuyển toàn quốc'
                        : ($voucher->discount_type === 'fixed'
                            ? 'Giảm ngay ' . number_format($voucher->discount_value, 0, ',', '.') . '₫ cho đơn hàng'
                            : 'Giảm ngay ' . $voucher->discount_value . '% (tối đa ' . ($voucher->max_discount ? number_format($voucher->max_discount, 0, ',', '.') . '₫' : 'không giới hạn') . ')');
                @endphp
                <div class="col-md-6 col-lg-4" style="margin-bottom: 24px;">
                    <div class="uiverse-coupon-ticket {{ $isShipping ? 'ticket-shipping' : 'ticket-order' }}" style="height: 100%;">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                                <span class="coupon-ticket-badge">
                                    <i class="fa {{ $isShipping ? 'fa-truck' : 'fa-percent' }}"></i>
                                    {{ $isShipping ? 'Vận chuyển' : 'Đơn hàng' }}
                                </span>

                                <small style="color: #94a3b8; font-size: 11.5px;">
                                    HSD: {{ $voucher->end_date ? \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') : 'Vô thời hạn' }}
                                </small>
                            </div>

                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                                <div class="coupon-code-pill">
                                    {{ $voucher->code }}
                                </div>

                                <button type="button" class="coupon-copy-btn" onclick="copyCouponCode('{{ $voucher->code }}', this)" title="Sao chép mã">
                                    <i class="fa fa-copy"></i> Chép mã
                                </button>
                            </div>

                            <h4 style="margin: 0 0 6px; font-size: 16px; font-weight: 700; color: #1e293b;">
                                {{ $voucher->name }}
                            </h4>

                            <p style="margin: 0 0 10px; font-size: 13.5px; color: #475569; line-height: 1.5;">
                                {{ $description }}
                            </p>

                            @if($voucher->min_order > 0)
                                <div style="display: inline-flex; align-items: center; gap: 4px; font-size: 12px; color: #64748b; background: #f1f5f9; padding: 3px 8px; border-radius: 6px;">
                                    <i class="fa fa-info-circle"></i> Đơn tối thiểu: <strong>{{ number_format($voucher->min_order, 0, ',', '.') }}₫</strong>
                                </div>
                            @endif
                        </div>

                        <div style="margin-top: 20px; display: flex; gap: 10px;">
                            <a href="{{ route('vouchers.claim', $voucher->id) }}" class="primary-btn" style="flex: 1; padding: 10px 14px; font-size: 13px; text-align: center;">
                                <i class="fa fa-check"></i> Lưu & Mua ngay
                            </a>
                            <a href="{{ route('shop') }}" class="btn-default" style="padding: 10px 14px; font-size: 13px;" title="Đi đến cửa hàng">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="uiverse-empty-box">
                        <div class="empty-icon-glow">
                            <i class="fa fa-ticket"></i>
                        </div>
                        <h3>Hiện chưa có voucher khả dụng!</h3>
                        <p>Các chương trình khuyến mãi và voucher giảm giá mới sẽ được cập nhật liên tục. Bạn hãy quay lại sau nhé!</p>
                        <a href="{{ route('shop') }}" class="primary-btn">
                            <i class="fa fa-shopping-bag"></i> Tiếp tục mua sắm
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
function copyCouponCode(code, btn) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(code).then(function() {
            var oldHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fa fa-check text-success"></i> Đã chép!';
            setTimeout(function() {
                btn.innerHTML = oldHtml;
            }, 2000);
        });
    } else {
        var input = document.createElement('input');
        input.value = code;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);
        var oldHtml = btn.innerHTML;
        btn.innerHTML = '<i class="fa fa-check text-success"></i> Đã chép!';
        setTimeout(function() {
            btn.innerHTML = oldHtml;
        }, 2000);
    }
}
</script>
@endsection