@extends('customer.layout')

@section('customer-content')
<div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
        <h3 class="mb-1">Yêu cầu trả hàng và bảo hành</h3>
        <p class="text-muted mb-0">Theo dõi các yêu cầu dịch vụ của bạn.</p>
    </div>
    <a href="{{ route('warranty.lookup') }}" class="btn btn-outline-primary">Tạo yêu cầu bảo hành</a>
</div>

<form method="GET" action="{{ route('account.service-requests.index') }}" class="row g-2 align-items-end mb-4">
    <div class="col-sm-5 col-md-4">
        <label for="request-type" class="form-label">Loại yêu cầu</label>
        <select id="request-type" name="type" class="form-select">
            <option value="all" @selected($type === 'all')>Tất cả</option>
            <option value="return" @selected($type === 'return')>Trả hàng / hoàn tiền</option>
            <option value="warranty" @selected($type === 'warranty')>Bảo hành</option>
        </select>
    </div>
    <div class="col-sm-5 col-md-4">
        <label for="request-status" class="form-label">Trạng thái</label>
        <select id="request-status" name="status" class="form-select">
            <option value="">Tất cả trạng thái</option>
            @foreach($statusOptions as $statusCode => $label)
                <option value="{{ $statusCode }}" @selected($status === $statusCode)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-2 col-md-4 d-flex gap-2">
        <button class="btn btn-primary" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> Lọc</button>
        <a class="btn btn-outline-secondary" href="{{ route('account.service-requests.index') }}">Xóa lọc</a>
    </div>
</form>

@if($requests->count())
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Loại</th>
                    <th>Mã yêu cầu</th>
                    <th>Đơn hàng</th>
                    <th>Lý do</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th class="text-end">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $requestItem)
                    @php
                        $isReturn = $requestItem->request_type === 'return';
                        $workflowType = $requestItem->request_type;
                        $statusLabel = \App\Support\ServiceWorkflow::label($workflowType, $requestItem->status);
                        $isFailure = \App\Support\ServiceWorkflow::isFailure($workflowType, $requestItem->status);
                        $isComplete = \App\Support\ServiceWorkflow::isSuccessful($workflowType, $requestItem->status);
                        $detailUrl = $isReturn
                            ? route('orders.tracking.returns', $requestItem->order_id) . '#return-request-' . $requestItem->request_id
                            : route('account.warranties.show', $requestItem->request_id);
                    @endphp
                    <tr>
                        <td>{{ $isReturn ? 'Trả hàng / hoàn tiền' : 'Bảo hành' }}</td>
                        <td>#{{ $requestItem->request_id }}</td>
                        <td><a href="{{ route('orders.tracking.show', $requestItem->order_id) }}">#{{ $requestItem->order_id }}</a></td>
                        <td class="text-break">{{ $requestItem->reason_label }}</td>
                        <td>{{ \Illuminate\Support\Carbon::parse($requestItem->created_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            <span class="badge {{ $isFailure ? 'bg-danger' : ($isComplete ? 'bg-success' : 'bg-warning text-dark') }}">{{ $statusLabel }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ $detailUrl }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-3">{{ $requests->links() }}</div>
@else
    <div class="alert alert-info mb-0">Không tìm thấy yêu cầu nào phù hợp với bộ lọc.</div>
@endif
@endsection
