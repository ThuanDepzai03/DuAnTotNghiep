@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý đơn hàng</h3>
            <p class="text-subtitle text-muted mb-0">Danh sách các đơn hàng trong hệ thống.</p>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh sách đơn hàng</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                            <tr>

                                <td>#{{ $order->id }}</td>

                                <td>{{ $order->customer_name }}</td>

                                <td>{{ $order->phone }}</td>

                                <td>
                                    {{ number_format($order->total_price) }} ₫
                                </td>

                                <td>

                                    @switch($order->status)

                                        @case('pending')
                                            <span class="badge bg-warning">Nhận đơn</span>
                                            @break

                                        @case('confirmed')
                                            <span class="badge bg-info">Đã xác nhận</span>
                                            @break

                                        @case('shipping')
                                            <span class="badge bg-primary">Đang giao</span>
                                            @break

                                        @case('completed')
                                            <span class="badge bg-success">Hoàn thành</span>
                                            @break

                                        @case('cancelled')
                                            <span class="badge bg-danger">Đã hủy</span>
                                            @break

                                    @endswitch

                                </td>

                                <td>

                                    <a href="{{ route('admin.orders.show',$order->id) }}"
                                        class="btn btn-primary btn-sm">

                                        Chi tiết

                                    </a>

                                </td>

                            </tr>
                            @empty

                            <tr>

                                <td colspan="6" class="text-center">

                                    Chưa có đơn hàng

                                </td>

                            </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
