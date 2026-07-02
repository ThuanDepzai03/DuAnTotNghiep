@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3>Hệ thống AE STORE</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2"><i class="iconly-boldShow"></i></div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Đơn hàng</h6>
                                    <h6 class="font-extrabold mb-0">{{ number_format($stats['orders']) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2"><i class="iconly-boldProfile"></i></div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Sản phẩm</h6>
                                    <h6 class="font-extrabold mb-0">{{ number_format($stats['products']) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2"><i class="iconly-boldAdd-User"></i></div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Thành viên</h6>
                                    <h6 class="font-extrabold mb-0">{{ number_format($stats['users']) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2"><i class="iconly-boldBookmark"></i></div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Doanh thu</h6>
                                    <h6 class="font-extrabold mb-0">{{ number_format($revenueTotal) }} ₫</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Biểu đồ doanh thu 6 tháng gần nhất</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="300"></canvas>
                        </div>
                    </div>
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
                            <h5 class="mb-1"><a href="{{ route('admin.categories.index') }}">Quản lý danh mục</a></h5>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1"><a href="{{ route('admin.products.index') }}">Quản lý sản phẩm</a></h5>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1"><a href="{{ route('admin.orders.index') }}">Quản lý đơn hàng</a></h5>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h5 class="mb-1"><a href="{{ route('admin.users.index') }}">Quản lý người dùng</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($chartData['labels']);
    const values = @json($chartData['values']);

    if (labels.length && values.length) {
        const ctx = document.getElementById('revenueChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: values,
                    borderColor: '#435ebe',
                    backgroundColor: 'rgba(67, 94, 190, 0.15)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => value.toLocaleString('vi-VN')
                        }
                    }
                }
            }
        });
    }
</script>
@endsection
