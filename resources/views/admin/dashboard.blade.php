@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1 text-primary">Hệ thống Mobile Mart</h3>
            <p class="text-subtitle text-muted mb-0">Dashboard tổng quan số liệu kinh doanh & quản trị cửa hàng</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-light-primary text-primary px-3 py-2 rounded-pill fs-7">
                <i class="bi bi-clock-history me-1"></i> Hôm nay: {{ date('d/m/Y') }}
            </span>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">

            {{-- 4 THẺ THỐNG KÊ CỐT LÕI --}}
            <div class="row g-3 mb-4">
                {{-- Đơn hàng --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-body p-3 d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3 bg-primary bg-opacity-10 text-primary" style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="bi bi-bag-check-fill fs-4"></i>
                            </div>
                            <div class="min-w-0">
                                <span class="text-muted small d-block">Đơn hàng</span>
                                <h5 class="fw-bold mb-0 text-truncate">{{ number_format($stats['orders']) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sản phẩm --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-body p-3 d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3 bg-info bg-opacity-10 text-info" style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="bi bi-phone-fill fs-4"></i>
                            </div>
                            <div class="min-w-0">
                                <span class="text-muted small d-block">Sản phẩm</span>
                                <h5 class="fw-bold mb-0 text-truncate">{{ number_format($stats['products']) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Thành viên --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-body p-3 d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3 bg-warning bg-opacity-10 text-warning" style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>
                            <div class="min-w-0">
                                <span class="text-muted small d-block">Khách hàng</span>
                                <h5 class="fw-bold mb-0 text-truncate">{{ number_format($stats['users']) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Doanh thu tra cứu --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-body p-3 d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3 bg-success bg-opacity-10 text-success" style="width: 48px; height: 48px; min-width: 48px;">
                                <i class="bi bi-cash-stack fs-4"></i>
                            </div>
                            <div class="min-w-0">
                                <span class="text-muted small d-block">Doanh thu lọc</span>
                                <h5 class="fw-bold mb-0 text-success text-truncate" title="{{ number_format($revenueTotal, 0, ',', '.') }} ₫">
                                    {{ number_format($revenueTotal, 0, ',', '.') }} ₫
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DOANH THU HÔM NAY VÀ THÁNG NÀY --}}
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100" style="border-radius: 14px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-success bg-opacity-25 text-success px-2 py-1 rounded-pill small">
                                    <i class="bi bi-calendar-event me-1"></i> Hôm nay
                                </span>
                                <i class="bi bi-graph-up-arrow text-success fs-5"></i>
                            </div>
                            <h6 class="text-muted mb-1">Doanh thu trong ngày</h6>
                            <h3 class="text-success fw-bold mb-0">
                                {{ number_format($revenueToday, 0, ',', '.') }} ₫
                            </h3>
                            <small class="text-muted d-block mt-2">Tổng giá trị các đơn hàng hoàn tất hôm nay</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100" style="border-radius: 14px; background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary bg-opacity-25 text-primary px-2 py-1 rounded-pill small">
                                    <i class="bi bi-calendar-month me-1"></i> Tháng {{ now()->month }}/{{ now()->year }}
                                </span>
                                <i class="bi bi-wallet2 text-primary fs-5"></i>
                            </div>
                            <h6 class="text-muted mb-1">Doanh thu tháng này</h6>
                            <h3 class="text-primary fw-bold mb-0">
                                {{ number_format($revenueMonth, 0, ',', '.') }} ₫
                            </h3>
                            <small class="text-muted d-block mt-2">Doanh thu lũy kế tháng hiện tại</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BỘ LỌC DOANH THU --}}
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-header bg-transparent py-3 border-0 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h5 class="card-title mb-0 d-flex align-items-center gap-2 fs-6 fw-bold">
                        <i class="bi bi-funnel text-primary"></i> Tra cứu doanh thu theo thời gian
                    </h5>
                    <div class="d-flex gap-1 flex-wrap">
                        <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="setPreset('today')">Hôm nay</button>
                        <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="setPreset('7days')">7 ngày qua</button>
                        <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1" onclick="setPreset('month')">Tháng này</button>
                        @if($from || $to)
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-xs btn-outline-danger rounded-pill px-2 py-1">Xóa lọc</a>
                        @endif
                    </div>
                </div>

                <div class="card-body pt-0">
                    <form method="GET" action="{{ route('admin.dashboard') }}" id="dateFilterForm" class="row g-3 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label small fw-semibold text-muted">Từ ngày</label>
                            <input
                                type="date"
                                id="date_from"
                                class="form-control form-control-sm rounded-3"
                                name="from"
                                value="{{ $from }}"
                            >
                        </div>

                        <div class="col-md-5">
                            <label class="form-label small fw-semibold text-muted">Đến ngày</label>
                            <input
                                type="date"
                                id="date_to"
                                class="form-control form-control-sm rounded-3"
                                name="to"
                                value="{{ $to }}"
                            >
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm w-100 rounded-3">
                                <i class="bi bi-search me-1"></i> Tra cứu
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- BIỂU ĐỒ DOANH THU --}}
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-header bg-transparent py-3 border-0 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-0 d-flex align-items-center gap-2 fs-6 fw-bold">
                            <i class="bi bi-bar-chart-line-fill text-danger"></i> Biểu đồ doanh thu (7 mốc thời gian gần nhất)
                        </h5>
                        <small class="text-muted">Đơn vị: VNĐ</small>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <canvas id="revenueChart" height="110"></canvas>
                </div>
            </div>

            {{-- TOP 5 SẢN PHẨM BÁN CHẠY --}}
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-header bg-transparent py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 d-flex align-items-center gap-2 fs-6 fw-bold">
                        <i class="bi bi-trophy-fill text-warning"></i> Top 5 sản phẩm bán chạy nhất
                    </h5>
                    <span class="badge bg-light-warning text-dark px-2 py-1 rounded-pill small">Đơn hoàn thành</span>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4" width="60">#</th>
                                    <th>Sản phẩm</th>
                                    <th>Mã biến thể / SKU</th>
                                    <th class="text-end pe-4" width="130">Số lượng bán</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($bestSellingProducts as $index => $item)
                                    <tr>
                                        <td class="ps-4">
                                            @if($index === 0)
                                                <span class="badge bg-warning text-dark rounded-circle" style="width: 24px; height: 24px; line-height: 18px; padding: 0;">1</span>
                                            @elseif($index === 1)
                                                <span class="badge bg-secondary text-white rounded-circle" style="width: 24px; height: 24px; line-height: 18px; padding: 0;">2</span>
                                            @elseif($index === 2)
                                                <span class="badge bg-danger bg-opacity-75 text-white rounded-circle" style="width: 24px; height: 24px; line-height: 18px; padding: 0;">3</span>
                                            @else
                                                <span class="text-muted fw-bold ps-2">{{ $index + 1 }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong class="d-block">{{ $item->variant->product->name ?? 'Sản phẩm đã đổi' }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-secondary text-secondary">
                                                {{ $item->variant->sku ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <span class="badge bg-light-success text-success fw-bold px-3 py-2 rounded-pill">
                                                {{ number_format($item->total_sold) }} máy
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            <i class="bi bi-inbox fs-3 d-block mb-1"></i>
                                            Chưa có dữ liệu bán hàng hoàn tất.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{-- CỘT PHẢI: QUẢN TRỊ VIÊN & PHÍM TẮT --}}
        <div class="col-12 col-lg-3">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-body p-4 text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <img src="{{ asset('admin-assets/images/faces/1.jpg') }}" alt="Avatar" class="rounded-circle shadow-sm border border-3 border-primary border-opacity-25" width="80" height="80" style="object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" style="width: 14px; height: 14px;" title="Online"></span>
                    </div>
                    <h5 class="fw-bold mb-1">Admin Mobile Mart</h5>
                    <p class="text-muted small mb-3">Quản trị viên hệ thống</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.chat') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                            <i class="bi bi-chat-dots me-1"></i> Hỗ trợ chat
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-header bg-transparent py-3 border-0">
                    <h5 class="card-title mb-0 fs-6 fw-bold d-flex align-items-center gap-2">
                        <i class="bi bi-lightning-charge-fill text-warning"></i> Thao tác nhanh
                    </h5>
                </div>

                <div class="card-body p-3 pt-0">
                    <div class="list-group list-group-flush rounded-3">
                        <a href="{{ route('admin.products.create') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3 border-0 rounded-2 mb-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-plus-circle text-primary"></i> Thêm sản phẩm
                            </span>
                            <i class="bi bi-chevron-right text-muted fs-7"></i>
                        </a>

                        <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3 border-0 rounded-2 mb-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-clock-history text-warning"></i> Đơn hàng chờ duyệt
                            </span>
                            <i class="bi bi-chevron-right text-muted fs-7"></i>
                        </a>

                        <a href="{{ route('admin.vouchers.create') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3 border-0 rounded-2 mb-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-tag text-success"></i> Tạo mã giảm giá
                            </span>
                            <i class="bi bi-chevron-right text-muted fs-7"></i>
                        </a>

                        <a href="{{ route('admin.inventory.imeis.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3 border-0 rounded-2 mb-1">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-upc-scan text-info"></i> Quản lý IMEI
                            </span>
                            <i class="bi bi-chevron-right text-muted fs-7"></i>
                        </a>

                        <a href="{{ route('admin.feedback.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3 border-0 rounded-2">
                            <span class="d-flex align-items-center gap-2">
                                <i class="bi bi-star text-danger"></i> Đánh giá & Liên hệ
                            </span>
                            <i class="bi bi-chevron-right text-muted fs-7"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function setPreset(type) {
        const today = new Date();
        const formatDate = (date) => date.toISOString().split('T')[0];
        const fromInput = document.getElementById('date_from');
        const toInput = document.getElementById('date_to');

        if (type === 'today') {
            fromInput.value = formatDate(today);
            toInput.value = formatDate(today);
        } else if (type === '7days') {
            const past7 = new Date();
            past7.setDate(today.getDate() - 6);
            fromInput.value = formatDate(past7);
            toInput.value = formatDate(today);
        } else if (type === 'month') {
            const startMonth = new Date(today.getFullYear(), today.getMonth(), 1);
            fromInput.value = formatDate(startMonth);
            toInput.value = formatDate(today);
        }

        document.getElementById('dateFilterForm').submit();
    }

    const revenueCanvas = document.getElementById('revenueChart');
    if (revenueCanvas) {
        const ctx = revenueCanvas.getContext('2d');

        // Tạo gradient đỏ thương hiệu Mobile Mart
        const gradient = ctx.createLinearGradient(0, 0, 0, 280);
        gradient.addColorStop(0, 'rgba(209, 0, 36, 0.45)');
        gradient.addColorStop(1, 'rgba(209, 0, 36, 0.00)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Doanh thu thực tế',
                    data: @json($chartData),
                    borderColor: '#d10024',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#d10024',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#111827',
                        titleColor: '#ffffff',
                        bodyColor: '#e5e7eb',
                        padding: 12,
                        cornerRadius: 10,
                        callbacks: {
                            label: function(context) {
                                return ' Doanh thu: ' + new Intl.NumberFormat('vi-VN').format(context.parsed.y) + ' ₫';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return (value / 1000000).toFixed(1) + ' tr';
                                }
                                return new Intl.NumberFormat('vi-VN').format(value) + ' ₫';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }
</script>
@endsection
