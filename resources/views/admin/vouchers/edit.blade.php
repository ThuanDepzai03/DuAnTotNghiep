@extends('admin.layout')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Sửa Voucher</h2>

    <div class="card">

        <div class="card-header">
            <h4>Thông tin Voucher</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.vouchers.update', $voucher->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Mã Voucher</label>

                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code', $voucher->code) }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Tên Voucher</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $voucher->name) }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Loại giảm giá</label>

                    <input type="hidden"
                           name="discount_type"
                           value="percentage">

                    <input type="text"
                           class="form-control"
                           value="Giảm theo %"
                           readonly>
                </div>


                <div class="mb-3">
                    <label class="form-label">Phần trăm giảm (%)</label>

                    <input type="number"
                           name="discount_value"
                           class="form-control"
                           min="1"
                           max="100"
                           value="{{ old('discount_value', $voucher->discount_value) }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Giảm tối đa</label>

                    <input type="number"
                           name="max_discount"
                           class="form-control"
                           min="0"
                           value="{{ old('max_discount', $voucher->max_discount) }}"
                           placeholder="Ví dụ: 100000">
                </div>


                <div class="mb-3">
                    <label class="form-label">Số lượng</label>

                    <input type="number"
                           name="quantity"
                           class="form-control"
                           min="1"
                           value="{{ old('quantity', $voucher->quantity) }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Ngày bắt đầu</label>

                    <input type="date"
                           name="start_date"
                           class="form-control"
                           value="{{ old('start_date', $voucher->start_date) }}"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Ngày kết thúc</label>

                    <input type="date"
                           name="end_date"
                           class="form-control"
                           value="{{ old('end_date', $voucher->end_date) }}"
                           required>
                </div>


               <div class="mb-3">
    <label class="form-label">Trạng thái</label>

    <select name="status" class="form-select">

        <option value="1"
            {{ old('status', $voucher->status) == 1 ? 'selected' : '' }}>
            Hoạt động
        </option>

        <option value="0"
            {{ old('status', $voucher->status) == 0 ? 'selected' : '' }}>
            Tạm khóa
        </option>

    </select>
</div>


                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Cập nhật Voucher
                    </button>

                    <a href="{{ route('admin.vouchers.index') }}"
                       class="btn btn-secondary">
                        Quay lại
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection