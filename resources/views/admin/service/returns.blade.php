@extends('admin.layout')

@section('content')
<div class="page-heading d-flex justify-content-between align-items-start flex-wrap gap-2">
    <div>
        <h3>Yêu cầu trả hàng và hoàn tiền</h3>
        <p class="text-muted">Danh sách yêu cầu mới nhất của khách hàng.</p>
    </div>
</div>

<div class="page-content">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h4 class="card-title mb-0">Danh sách yêu cầu</h4>
            <span class="text-muted small">{{ $returns->total() }} yêu cầu</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Số đơn</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Lý do</th>
                            <th scope="col">Ngày giờ tạo yêu cầu</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-end">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($returns as $return)
                            <tr>
                                <td>{{ $returns->firstItem() + $loop->index }}</td>
                                <td><a href="{{ route('admin.orders.show', $return->order_id) }}">#{{ $return->order_id }}</a></td>
                                <td>{{ $return->order?->customer_name ?? 'Khách hàng' }}</td>
                                <td>{{ $return->serviceReason?->name ?? $return->reason }}</td>
                                <td>{{ $return->created_at?->format('d/m/Y H:i') }}</td>
                                <td>
                                    @php
                                        $statusClass = \App\Support\ServiceWorkflow::isFailure('return', $return->status)
                                            ? 'bg-danger'
                                            : (\App\Support\ServiceWorkflow::isSuccessful('return', $return->status)
                                                ? 'bg-success'
                                                : 'bg-warning text-dark');
                                    @endphp
                                    <span class="badge {{ $statusClass }}">{{ \App\Support\ServiceWorkflow::label('return', $return->status) }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.returns.show', $return) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye me-1" aria-hidden="true"></i> Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 text-center text-muted">Chưa có yêu cầu trả hàng nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $returns->links() }}
            </div>
        </div>
    </div>
</div>
@endsection