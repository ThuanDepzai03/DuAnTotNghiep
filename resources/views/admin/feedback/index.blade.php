@extends('admin.layout')

@section('content')
<div class="page-heading">
    <h3>Liên hệ và đánh giá</h3>
</div>

<div class="page-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Yêu cầu liên hệ</h4></div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead><tr><th>Khách hàng</th><th>Liên hệ</th><th>Nội dung</th><th>Trạng thái</th><th></th></tr></thead>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}<br><small>{{ $contact->email }}</small></td>
                                <td>{{ $contact->phone ?: 'N/A' }}</td>
                                <td><strong>{{ $contact->subject ?: 'Tư vấn' }}</strong><br>{{ $contact->message }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.feedback.contacts.update', $contact->id) }}">
                                        @csrf @method('PATCH')
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                            @foreach(['new' => 'Mới', 'processing' => 'Đang xử lý', 'resolved' => 'Đã xử lý'] as $value => $label)
                                                <option value="{{ $value }}" @selected($contact->status === $value)>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.feedback.contacts.destroy', $contact->id) }}" onsubmit="return confirm('Xóa yêu cầu này?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">Chưa có yêu cầu liên hệ.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </section>

    <section class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Đánh giá sản phẩm</h4></div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead><tr><th>Sản phẩm</th><th>Khách hàng</th><th>Đánh giá</th><th>Nội dung</th><th>Trạng thái</th><th></th></tr></thead>
                        <tbody>
                        @forelse($reviews as $review)
                            <tr>
                                <td>{{ $review->product?->name ?? 'Sản phẩm đã xóa' }}</td>
                                <td>{{ $review->customer_name }}</td>
                                <td class="text-warning">{{ str_repeat('★', $review->rating) }}</td>
                                <td>{{ $review->comment }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.feedback.reviews.update', $review->id) }}">
                                        @csrf @method('PATCH')
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                            <option value="approved" @selected($review->status === 'approved')>Hiển thị</option>
                                            <option value="hidden" @selected($review->status === 'hidden')>Ẩn</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.feedback.reviews.destroy', $review->id) }}" onsubmit="return confirm('Xóa đánh giá này?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">Chưa có đánh giá.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<!-- ádsdaas -->