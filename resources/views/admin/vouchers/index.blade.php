@extends('admin.layout')

@section('content')

<div class="page-heading">
    <h3>Quản lý Voucher</h3>
</div>

<div class="page-content">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Danh sách Voucher</h4>

            <a href="{{ route('admin.vouchers.create') }}"
               class="btn btn-success">
                <i class="bi bi-plus-circle"></i>
                Thêm Voucher
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Loại Voucher</th>
                            <th>Giảm (%)</th>
                            <th>Giảm tối đa</th>
                            <th>Số lượng</th>
                            <th>Đã dùng</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($vouchers as $voucher)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    {{ $voucher->id }}
                                </td>


                                {{-- Mã --}}
                                <td>
                                    <strong>
                                        {{ $voucher->code }}
                                    </strong>
                                </td>


                                {{-- Tên --}}
                                <td>
                                    {{ $voucher->name }}
                                </td>


                                {{-- Loại Voucher --}}
<td>

    @if($voucher->voucher_type === 'flash_sale')

        <span class="badge bg-danger">
            🔥 Flash Sale
        </span>

    @elseif($voucher->voucher_type === 'mid_autumn')

        <span class="badge bg-warning text-dark">
            🌕 Trung Thu
        </span>

    @else

        <span class="badge bg-primary">
            Voucher thường
        </span>

    @endif

</td>


                                {{-- Phần trăm giảm --}}
                                <td>
                                    <strong>
                                        {{ $voucher->discount_value }}%
                                    </strong>
                                </td>


                                {{-- Giảm tối đa --}}
                                <td>
                                    @if($voucher->max_discount)
                                        {{ number_format($voucher->max_discount, 0, ',', '.') }}đ
                                    @else
                                        Không giới hạn
                                    @endif
                                </td>


                                {{-- Số lượng --}}
                                <td>
                                    {{ $voucher->quantity }}
                                </td>


                                {{-- Đã sử dụng --}}
                                <td>
                                    {{ $voucher->used_quantity }}
                                </td>


                                {{-- Ngày bắt đầu --}}
                                <td>
                                    {{ \Carbon\Carbon::parse($voucher->start_date)->format('d/m/Y') }}
                                </td>


                                {{-- Ngày kết thúc --}}
                                <td>
                                    {{ \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') }}
                                </td>


                                {{-- Trạng thái --}}
                                <td>

                                    @if($voucher->status == 1)

                                        <span class="badge bg-success">
                                            Hoạt động
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Tạm khóa
                                        </span>

                                    @endif

                                </td>


                                {{-- Thao tác --}}
                                <td>

                                    <div class="d-flex gap-1">

                                        <a href="{{ route('admin.vouchers.edit', $voucher->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>
                                            Sửa

                                        </a>


                                        <form
                                            action="{{ route('admin.vouchers.destroy', $voucher->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bạn có chắc muốn xóa voucher này?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">

                                                <i class="bi bi-trash"></i>
                                                Xóa

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="12"
                                    class="text-center">

                                    Chưa có Voucher nào.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection