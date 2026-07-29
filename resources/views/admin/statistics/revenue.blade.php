@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3>Thống kê doanh thu</h3>
    <p class="text-subtitle text-muted">Tra cứu doanh thu theo khoảng ngày.</p>
</div>

<div class="page-content">
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.statistics.revenue') }}" class="row g-3">
                <div class="col-md-4">
                    <label>Từ ngày</label>
                    <input type="date" name="from" value="{{ $from }}" class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Đến ngày</label>
                    <input type="date" name="to" value="{{ $to }}" class="form-control">
                </div>

                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-primary">Tra cứu</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Tổng doanh thu</h5>
                    <h3 class="text-success">{{ number_format($totalRevenue, 0, ',', '.') }} ₫</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Số đơn hoàn thành</h5>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Top sản phẩm bán chạy</h4>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>SKU</th>
                        <th>Số lượng bán</th>
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
                            <td colspan="3" class="text-center">Chưa có dữ liệu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Danh sách đơn hoàn thành</h4>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }} ₫</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Không có đơn hoàn thành trong khoảng này</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection