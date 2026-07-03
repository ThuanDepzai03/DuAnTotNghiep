@extends('admin.layout')

@section('content')
@php
    $statusLabels = [
        'pending' => [
            'text' => 'Chờ xác nhận',
            'class' => 'bg-warning text-dark',
            'icon' => 'bi-hourglass-split',
        ],
        'confirmed' => [
            'text' => 'Đã xác nhận',
            'class' => 'bg-info text-dark',
            'icon' => 'bi-check-circle',
        ],
        'shipping' => [
            'text' => 'Đang giao',
            'class' => 'bg-primary',
            'icon' => 'bi-truck',
        ],
        'completed' => [
            'text' => 'Hoàn thành',
            'class' => 'bg-success',
            'icon' => 'bi-check2-circle',
        ],
        'cancelled' => [
            'text' => 'Đã hủy',
            'class' => 'bg-danger',
            'icon' => 'bi-x-circle',
        ],
    ];

    $pendingCount = $orders->where('status', 'pending')->count();
    $confirmedCount = $orders->where('status', 'confirmed')->count();
    $shippingCount = $orders->where('status', 'shipping')->count();
    $completedCount = $orders->where('status', 'completed')->count();
@endphp

<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý đơn hàng</h3>
            <p class="text-subtitle text-muted mb-0">
                Theo dõi thông tin khách hàng, sản phẩm và trạng thái giao hàng.
            </p>
        </div>

        <div class="text-muted">
            Tổng số đơn: <strong>{{ $orders->count() }}</strong>
        </div>
    </div>
</div>

<div class="page-content">
    {{-- Thống kê đơn hàng --}}
    <section class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-warning bg-opacity-25 text-warning p-3">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Chờ xác nhận</small>
                        <h4 class="mb-0">{{ $pendingCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-info bg-opacity-25 text-info p-3">
                        <i class="bi bi-check-circle fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Đã xác nhận</small>
                        <h4 class="mb-0">{{ $confirmedCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary bg-opacity-25 text-primary p-3">
                        <i class="bi bi-truck fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Đang giao</small>
                        <h4 class="mb-0">{{ $shippingCount }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-success bg-opacity-25 text-success p-3">
                        <i class="bi bi-check2-circle fs-4"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Hoàn thành</small>
                        <h4 class="mb-0">{{ $completedCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <h4 class="card-title mb-0">
                        Danh sách đơn hàng
                        <span class="badge bg-light-primary text-primary ms-2">
                            {{ $orders->count() }}
                        </span>
                    </h4>

                    <div class="input-group" style="max-width: 280px;">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input
                            type="text"
                            id="order-search"
                            class="form-control"
                            placeholder="Tìm mã đơn, tên, SĐT..."
                        >
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="orders-table">
                            <thead>
                                <tr>
                                    <th width="100">Mã đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Liên hệ</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt</th>
                                    <th width="130">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($orders as $order)
                                    @php
                                        $status = $statusLabels[$order->status] ?? [
                                            'text' => 'Không xác định',
                                            'class' => 'bg-secondary',
                                            'icon' => 'bi-question-circle',
                                        ];

                                        $paymentText = match ($order->payment_method) {
                                            'cod' => 'Thanh toán khi nhận hàng',
                                            'banking' => 'Chuyển khoản',
                                            default => $order->payment_method ?? 'Chưa xác định',
                                        };
                                    @endphp

                                    <tr class="order-row">
                                        <td>
                                            <strong class="text-primary">
                                                #DH{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                                            </strong>
                                        </td>

                                        <td>
                                            <strong class="d-block">
                                                {{ $order->customer_name }}
                                            </strong>

                                            @if($order->email)
                                                <small class="text-muted">
                                                    {{ $order->email }}
                                                </small>
                                            @endif
                                        </td>

                                        <td>
                                            <a
                                                href="tel:{{ $order->phone }}"
                                                class="text-decoration-none"
                                            >
                                                <i class="bi bi-telephone me-1"></i>
                                                {{ $order->phone }}
                                            </a>
                                        </td>

                                        <td>
                                            <span class="badge bg-light-secondary text-secondary">
                                                <i class="bi bi-box me-1"></i>
                                                {{ $order->items_count }} sản phẩm
                                            </span>
                                        </td>

                                        <td>
                                            <strong class="text-danger">
                                                {{ number_format($order->total_price, 0, ',', '.') }} ₫
                                            </strong>
                                        </td>

                                        <td>
                                            @if($order->payment_method === 'cod')
                                                <span class="badge bg-light-warning text-warning">
                                                    <i class="bi bi-cash-coin me-1"></i>
                                                    COD
                                                </span>
                                            @elseif($order->payment_method === 'banking')
                                                <span class="badge bg-light-info text-info">
                                                    <i class="bi bi-bank me-1"></i>
                                                    Chuyển khoản
                                                </span>
                                            @else
                                                <small class="text-muted">{{ $paymentText }}</small>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="badge {{ $status['class'] }}">
                                                <i class="bi {{ $status['icon'] }} me-1"></i>
                                                {{ $status['text'] }}
                                            </span>
                                        </td>

                                        <td>
                                            <small class="d-block">
                                                {{ $order->created_at?->format('d/m/Y') }}
                                            </small>

                                            <small class="text-muted">
                                                {{ $order->created_at?->format('H:i') }}
                                            </small>
                                        </td>

                                        <td>
                                            <a
                                                href="{{ route('admin.orders.show', $order->id) }}"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                <i class="bi bi-eye me-1"></i>
                                                Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            <i class="bi bi-receipt fs-1 text-muted d-block mb-3"></i>
                                            <strong>Chưa có đơn hàng nào</strong>
                                            <p class="text-muted mb-0">
                                                Đơn đặt hàng của khách sẽ hiển thị tại đây.
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div id="no-search-result" class="text-center py-4 d-none">
                        <i class="bi bi-search fs-3 text-muted d-block mb-2"></i>
                        Không tìm thấy đơn hàng phù hợp.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const searchInput = document.getElementById('order-search');
    const orderRows = document.querySelectorAll('.order-row');
    const noResult = document.getElementById('no-search-result');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            orderRows.forEach(function (row) {
                const content = row.innerText.toLowerCase();
                const matched = content.includes(keyword);

                row.style.display = matched ? '' : 'none';

                if (matched) {
                    visibleCount++;
                }
            });

            if (noResult) {
                noResult.classList.toggle(
                    'd-none',
                    visibleCount > 0 || keyword === ''
                );
            }
        });
    }
</script>
@endsection
