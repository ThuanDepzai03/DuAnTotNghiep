@extends('admin.layout')

@section('content')
<div class="container-fluid py-3">
    <h3>Quản lý bảo hành</h3>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Khách</th>
                    <th>Lý do</th>
                    <th>Phương pháp xử lý</th>
                    <th>Phương thức gửi trả cho khách hàng</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                    <th>Chuyển trả hàng</th>
                </tr>
            </thead>
            <tbody>
                @forelse($claims as $claim)
                    <tr>
                        <td>#{{ $claim->id }}</td>
                        <td>
                            {{ $claim->user?->name ?? $claim->order?->customer_name ?? 'Khách hàng' }}
                            <small class="d-block text-muted">{{ $claim->order?->phone }}</small>
                        </td>
                        <td>
                            {{ $claim->reason?->name ?? 'Lỗi kỹ thuật' }}
                            <small class="d-block text-muted">{{ $claim->issue_description }}</small>
                        </td>
                        <td>{{ $claim->technician_note ?: 'Chưa cập nhật' }}</td>
                        <td>{{ $claim->return_method ?: 'Chưa cập nhật' }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ $claim->status }}</span>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.warranties.update', $claim) }}">
                                @csrf
                                @method('PUT')

                                <select name="status" class="form-select form-select-sm mb-1">
                                    @foreach(['submitted', 'received', 'checking', 'repairing', 'ready', 'returned', 'rejected'] as $status)
                                        <option value="{{ $status }}" @selected($claim->status === $status)>{{ $status }}</option>
                                    @endforeach
                                </select>
                                <textarea name="technician_note" class="form-control form-control-sm mb-1" rows="2" maxlength="2000" placeholder="Phương pháp xử lý">{{ $claim->technician_note }}</textarea>
                                <select name="return_method" class="form-select form-select-sm mb-1">
                                    <option value="">Phương thức gửi trả</option>
                                    @foreach(['Giao hàng tận nơi', 'Khách nhận tại cửa hàng', 'Đơn vị vận chuyển'] as $method)
                                        <option value="{{ $method }}" @selected($claim->return_method === $method)>{{ $method }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-sm btn-primary" type="submit">Lưu</button>
                            </form>
                        </td>
                        <td>
                            @if(!$claim->returnRequest)
                                <form method="POST" action="{{ route('admin.warranties.to-return', $claim) }}">
                                    @csrf
                                    <select name="reason_id" class="form-select form-select-sm mb-1" required>
                                        <option value="">Lý do trả hàng</option>
                                        @foreach($reasons as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                        @endforeach
                                    </select>
                                    <input name="reason" class="form-control form-control-sm mb-1" placeholder="Tên lý do" required>
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Thêm trả hàng</button>
                                </form>
                            @else
                                <span class="text-muted">Đã chuyển trả hàng #{{ $claim->returnRequest->id }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Chưa có yêu cầu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $claims->links() }}
</div>
@endsection
