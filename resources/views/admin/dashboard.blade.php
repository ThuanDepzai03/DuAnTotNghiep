@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3>Hệ thống AE STORE</h3>
    <p class="text-subtitle text-muted">Dashboard quản trị bán hàng</p>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">

            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <h6 class="text-muted font-semibold">Đơn hàng</h6>
                            <h6 class="font-extrabold mb-0">{{ number_format($stats['orders']) }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <h6 class="text-muted font-semibold">Sản phẩm</h6>
                            <h6 class="font-extrabold mb-0">{{ number_format($stats['products']) }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <h6 class="text-muted font-semibold">Thành viên</h6>
                            <h6 class="font-extrabold mb-0">{{ number_format($stats['users']) }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <h6 class="text-muted font-semibold">Doanh thu tra cứu</h6>
                            <h6 class="font-extrabold mb-0">
                                {{ number_format($revenueTotal, 0, ',', '.') }} ₫
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Doanh thu hôm nay</h5>
                            <h3 class="text-success">
                                {{ number_format($revenueToday, 0, ',', '.') }} ₫
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Doanh thu tháng này</h5>
                            <h3 class="text-primary">
                                {{ number_format($revenueMonth, 0, ',', '.') }} ₫
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Tra cứu doanh thu</h4>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('admin.dashboard') }}" class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Từ ngày</label>
                            <input
                                type="date"
                                class="form-control"
                                name="from"
                                value="{{ $from }}"
                            >
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Đến ngày</label>
                            <input
                                type="date"
                                class="form-control"
                                name="to"
                                value="{{ $to }}"
                            >
                        </div>

                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-primary w-100">
                                Tra cứu
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Biểu đồ doanh thu</h4>
                </div>

                <div class="card-body">
                    <canvas id="revenueChart" height="120"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Top 5 sản phẩm bán chạy</h4>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>SKU</th>
                                <th>Đã bán</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($bestSellingProducts as $item)
                                <tr>
                                    <td>{{ $item->variant->product->name ?? 'Không có' }}</td>
                                    <td>{{ $item->variant->sku ?? 'Không có' }}</td>
                                    <td>{{ $item->total_sold }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Chưa có dữ liệu
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('admin-assets/images/faces/1.jpg') }}" alt="avatar">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Admin AE Store</h5>
                            <h6 class="text-muted mb-0">Quản trị hệ thống</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Truy cập nhanh</h4>
                </div>

                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1">
                                <a href="{{ route('admin.categories.index') }}">Quản lý danh mục</a>
                            </h5>
                        </div>
                    </div>

                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1">
                                <a href="{{ route('admin.products.index') }}">Quản lý sản phẩm</a>
                            </h5>
                        </div>
                    </div>

                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1">
                                <a href="{{ route('admin.orders.index') }}">Quản lý đơn hàng</a>
                            </h5>
                        </div>
                    </div>

                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1">
                                <a href="{{ route('admin.users.index') }}">Quản lý người dùng</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const revenueChart = document.getElementById('revenueChart');

    new Chart(revenueChart, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Doanh thu',
                data: @json($chartData),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN').format(value) + ' ₫';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection