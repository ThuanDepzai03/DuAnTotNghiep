@extends('admin.layout')

@section('content')
<div class="page-heading"><div class="d-flex justify-content-between align-items-center flex-wrap gap-2"><div><h3 class="mb-1">Trả hàng và hoàn tiền</h3><p class="text-subtitle text-muted mb-0">Tiếp nhận, kiểm tra và xử lý yêu cầu trả hàng của khách.</p></div></div></div>
<div class="page-content">
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
    @php $labels=['pending'=>'Chờ xử lý','approved'=>'Đã duyệt','rejected'=>'Từ chối','received'=>'Đã nhận hàng','refunded'=>'Đã hoàn tiền','completed'=>'Hoàn tất']; @endphp
    @forelse($returns as $return)
        <div class="card shadow-sm mb-3"><div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2"><div><strong>Yêu cầu #{{ $return->id }}</strong><span class="text-muted ms-2">Đơn #{{ $return->order_id }}</span><div class="small text-muted">{{ $return->order->customer_name ?? 'Khách hàng' }} · {{ $return->order->phone ?? '' }}</div></div><span class="badge {{ $return->status === 'rejected' ? 'bg-danger' : (in_array($return->status, ['refunded','completed']) ? 'bg-success' : 'bg-warning text-dark') }}">{{ $labels[$return->status] ?? $return->status }}</span></div>
            <div class="card-body"><div class="row g-4"><div class="col-lg-6"><h6>Thông tin yêu cầu</h6><p class="mb-1"><strong>Lý do:</strong> {{ $return->reason }}</p><p class="mb-3"><strong>Mô tả:</strong> {{ $return->description ?: 'Không có mô tả.' }}</p><div class="table-responsive"><table class="table table-sm"><thead><tr><th>Sản phẩm</th><th>IMEI</th><th>SL</th></tr></thead><tbody>@foreach($return->items as $item)<tr><td>{{ $item->orderItem->variant->product->name ?? 'Sản phẩm' }}</td><td>{{ $item->imei->imei ?? 'Không có' }}</td><td>{{ $item->quantity }}</td></tr>@endforeach</tbody></table></div></div><div class="col-lg-6"><form method="POST" action="{{ route('admin.returns.update', $return) }}" class="border rounded p-3 bg-light">@csrf @method('PUT')<div class="mb-3"><label class="form-label">Cập nhật trạng thái</label><select name="status" class="form-select">@foreach($labels as $status => $label)<option value="{{ $status }}" @selected($return->status === $status)>{{ $label }}</option>@endforeach</select></div><div class="row g-2"><div class="col-md-6"><label class="form-label">Số tiền hoàn</label><input type="number" name="refund_amount" min="0" step="1000" value="{{ $return->refund_amount }}" class="form-control"></div><div class="col-md-6"><label class="form-label">Phương thức hoàn</label><select name="refund_method" class="form-select"><option value="" @selected(!$return->refund_method)>Chưa xác định</option><option value="Chuyển khoản" @selected($return->refund_method === 'Chuyển khoản')>Chuyển khoản</option><option value="Tiền mặt" @selected($return->refund_method === 'Tiền mặt')>Tiền mặt</option><option value="Ví điện tử" @selected($return->refund_method === 'Ví điện tử')>Ví điện tử</option></select></div></div><div class="mt-3 mb-3"><label class="form-label">Ghi chú xử lý</label><textarea name="admin_note" rows="3" maxlength="2000" class="form-control">{{ $return->admin_note }}</textarea></div><button class="btn btn-primary">Lưu xử lý</button></form></div></div></div>
        </div>
    @empty
        <div class="alert alert-info">Chưa có yêu cầu trả hàng.</div>
    @endforelse
    {{ $returns->links() }}
</div>
@endsection
