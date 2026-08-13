@extends('admin.layout')

@section('content')

<div class="page-heading">
    <h3>Thêm Voucher</h3>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-lg-8">
            <div class="card">

                <div class="card-header">
                    <h4>Thông tin Voucher</h4>
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.vouchers.store') }}" method="POST">

                        @csrf

                        {{-- Mã Voucher --}}
                        <div class="mb-3">
                            <label class="form-label">Mã Voucher</label>

                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                value="{{ old('code') }}"
                                placeholder="Ví dụ: GIAM10"
                                required
                            >
                        </div>


                        {{-- Tên Voucher --}}
                        <div class="mb-3">
                            <label class="form-label">Tên Voucher</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Ví dụ: Giảm 10% toàn bộ điện thoại"
                                required
                            >
                        </div>


                        {{-- Loại giảm giá --}}
                        <div class="mb-3">
                            <label class="form-label">Loại giảm giá</label>

                            <input
                                type="text"
                                class="form-control"
                                value="Giảm theo %"
                                readonly
                            >

                            {{-- Database lưu là percent --}}
                            <input
                                type="hidden"
                                name="discount_type"
                                value="percent"
                            >
                        </div>


                        {{-- Phần trăm giảm --}}
                        <div class="mb-3">
                            <label class="form-label">Phần trăm giảm (%)</label>

                            <input
                                type="number"
                                name="discount_value"
                                class="form-control"
                                value="{{ old('discount_value') }}"
                                min="1"
                                max="100"
                                placeholder="Ví dụ: 10"
                                required
                            >

                            <small class="text-muted">
                                Nhập từ 1% đến 100%.
                            </small>
                        </div>


                        {{-- Giảm tối đa --}}
                        <div class="mb-3">
                            <label class="form-label">Giảm tối đa</label>

                            <input
                                type="number"
                                name="max_discount"
                                class="form-control"
                                value="{{ old('max_discount') }}"
                                min="0"
                                placeholder="Ví dụ: 500000"
                            >

                            <small class="text-muted">
                                Để trống nếu không giới hạn số tiền giảm.
                            </small>
                        </div>


                        {{-- Số lượng --}}
                        <div class="mb-3">
                            <label class="form-label">Số lượng</label>

                            <input
                                type="number"
                                name="quantity"
                                class="form-control"
                                value="{{ old('quantity') }}"
                                min="1"
                                placeholder="Ví dụ: 100"
                                required
                            >
                        </div>


                        {{-- Ngày bắt đầu --}}
                        <div class="mb-3">
                            <label class="form-label">Ngày bắt đầu</label>

                            <input
                                type="date"
                                name="start_date"
                                class="form-control"
                                value="{{ old('start_date') }}"
                                required
                            >
                        </div>


                        {{-- Ngày kết thúc --}}
                        <div class="mb-3">
                            <label class="form-label">Ngày kết thúc</label>

                            <input
                                type="date"
                                name="end_date"
                                class="form-control"
                                value="{{ old('end_date') }}"
                                min="{{ old('start_date') ?? '' }}"
                                required
                            >
                        </div>


                        {{-- Trạng thái --}}
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>

                           <select name="status" class="form-select">

    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
        Hoạt động
    </option>

    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
        Tạm khóa
    </option>

</select>
                        </div>


                        {{-- Button --}}
                        <div class="mt-4">

                            <button type="submit" class="btn btn-success">
                                Lưu Voucher
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
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startInput = document.querySelector('input[name="start_date"]');
        const endInput = document.querySelector('input[name="end_date"]');

        if (!startInput || !endInput) {
            return;
        }

        const syncEndDate = function () {
            const startValue = startInput.value;
            if (startValue) {
                endInput.min = startValue;
                if (endInput.value && endInput.value <= startValue) {
                    endInput.value = '';
                }
            } else {
                endInput.min = '';
            }
        };

        startInput.addEventListener('change', syncEndDate);
        endInput.addEventListener('change', function () {
            if (startInput.value && endInput.value && endInput.value <= startInput.value) {
                endInput.setCustomValidity('Ngày kết thúc phải lớn hơn ngày bắt đầu.');
            } else {
                endInput.setCustomValidity('');
            }
        });

        syncEndDate();
    });
</script>

@endsection