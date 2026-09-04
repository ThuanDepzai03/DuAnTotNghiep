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

                    {{-- Hiển thị lỗi --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
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
                                maxlength="255"
                                required
                            >

                            <small class="text-muted">
                                Nhập mã voucher để khách hàng sử dụng, ví dụ: GIAM10, AE2026.
                            </small>
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
                                maxlength="255"
                                required
                            >
                        </div>


                        {{-- Loại Voucher --}}
                        <div class="mb-3">
                            <label class="form-label">Loại Voucher</label>

                            <select
                                name="voucher_type"
                                class="form-select"
                                required
                            >
                                <option value="normal"
                                    {{ old('voucher_type', 'normal') == 'normal' ? 'selected' : '' }}>
                                    Voucher thường
                                </option>

                                <option value="flash_sale"
                                    {{ old('voucher_type') == 'flash_sale' ? 'selected' : '' }}>
                                    Flash Sale
                                </option>

                                <option value="mid_autumn"
                                    {{ old('voucher_type') == 'mid_autumn' ? 'selected' : '' }}>
                                    Voucher Trung Thu
                                </option>
                            </select>
                        </div>


                        {{-- Hình thức giảm giá --}}
                        <div class="mb-3">
                            <label class="form-label">Hình thức giảm giá</label>

                            <select
                                name="discount_type"
                                class="form-select"
                                id="voucher-discount-type"
                                required
                            >
                                <option value="percent"
                                    {{ old('discount_type', 'percent') == 'percent' ? 'selected' : '' }}>
                                    Giảm theo %
                                </option>

                                <option value="fixed"
                                    {{ old('discount_type') == 'fixed' ? 'selected' : '' }}>
                                    Giảm theo số tiền
                                </option>

                                <option value="free_shipping"
                                    {{ old('discount_type') == 'free_shipping' ? 'selected' : '' }}>
                                    Miễn phí vận chuyển
                                </option>
                            </select>
                        </div>


                        {{-- Giá trị giảm --}}
                        <div class="mb-3" id="discount-value-wrapper">

                            <label
                                class="form-label"
                                id="discount-value-label"
                            >
                                Phần trăm giảm (%)
                            </label>

                            <input
                                type="number"
                                name="discount_value"
                                id="discount-value"
                                class="form-control"
                                value="{{ old('discount_value') }}"
                                min="1"
                                max="100"
                                step="0.01"
                                placeholder="Ví dụ: 10"
                                required
                            >

                            <small
                                class="text-muted"
                                id="discount-value-help"
                            >
                                Nhập từ 1% đến 100%.
                            </small>

                        </div>


                        {{-- Giảm tối đa --}}
                        <div
                            class="mb-3"
                            id="max-discount-wrapper"
                        >
                            <label class="form-label">Giảm tối đa</label>

                            <input
                                type="number"
                                name="max_discount"
                                class="form-control"
                                value="{{ old('max_discount') }}"
                                min="0"
                                step="0.01"
                                placeholder="Ví dụ: 500000"
                            >

                            <small class="text-muted">
                                Áp dụng cho voucher giảm theo %. Để trống nếu không giới hạn.
                            </small>
                        </div>


                        {{-- Đơn tối thiểu --}}
                        <div class="mb-3">
                            <label class="form-label">Đơn hàng tối thiểu</label>

                            <input
                                type="number"
                                name="min_order"
                                class="form-control"
                                value="{{ old('min_order', 0) }}"
                                min="0"
                                step="0.01"
                                placeholder="Ví dụ: 500000"
                            >

                            <small class="text-muted">
                                Nhập 0 nếu voucher không yêu cầu giá trị đơn tối thiểu.
                            </small>
                        </div>


                        {{-- Số lượng --}}
                        <div class="mb-3">
                            <label class="form-label">Số lượng Voucher</label>

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
                                id="start-date"
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
                                id="end-date"
                                class="form-control"
                                value="{{ old('end_date') }}"
                                required
                            >
                        </div>


                        {{-- Trạng thái --}}
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>

                            <select
                                name="status"
                                class="form-select"
                                required
                            >
                                <option value="1"
                                    {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                    Hoạt động
                                </option>

                                <option value="0"
                                    {{ old('status') == '0' ? 'selected' : '' }}>
                                    Tạm khóa
                                </option>
                            </select>
                        </div>


                        {{-- Button --}}
                        <div class="mt-4">

                            <button
                                type="submit"
                                class="btn btn-success"
                            >
                                Lưu Voucher
                            </button>

                            <a
                                href="{{ route('admin.vouchers.index') }}"
                                class="btn btn-secondary"
                            >
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

    const typeSelect = document.getElementById('voucher-discount-type');

    const discountValue = document.getElementById('discount-value');

    const discountValueLabel =
        document.getElementById('discount-value-label');

    const discountValueHelp =
        document.getElementById('discount-value-help');

    const maxDiscountWrapper =
        document.getElementById('max-discount-wrapper');

    const maxDiscountInput =
        document.querySelector('input[name="max_discount"]');

    const startDate =
        document.getElementById('start-date');

    const endDate =
        document.getElementById('end-date');


    // ================================
    // Thay đổi hình thức giảm giá
    // ================================

    function updateDiscountType() {

        const type = typeSelect.value;


        // Giảm theo %
        if (type === 'percent') {

            discountValueLabel.textContent =
                'Phần trăm giảm (%)';

            discountValueHelp.textContent =
                'Nhập từ 1% đến 100%.';

            discountValue.placeholder =
                'Ví dụ: 10';

            discountValue.min = '1';

            discountValue.max = '100';

            discountValue.step = '0.01';

            discountValue.required = true;

            discountValue.readOnly = false;

            maxDiscountWrapper.style.display = 'block';

            maxDiscountInput.disabled = false;

        }


        // Giảm theo số tiền
        else if (type === 'fixed') {

            discountValueLabel.textContent =
                'Số tiền giảm (VNĐ)';

            discountValueHelp.textContent =
                'Nhập số tiền được giảm, ví dụ: 50000.';

            discountValue.placeholder =
                'Ví dụ: 50000';

            discountValue.min = '1';

            discountValue.max = '1000000000';

            discountValue.step = '1';

            discountValue.required = true;

            discountValue.readOnly = false;

            maxDiscountWrapper.style.display = 'none';

            maxDiscountInput.value = '';

            maxDiscountInput.disabled = true;

        }


        // Miễn phí vận chuyển
        else if (type === 'free_shipping') {

            discountValueLabel.textContent =
                'Giá trị giảm';

            discountValueHelp.textContent =
                'Voucher miễn phí vận chuyển không cần nhập giá trị giảm.';

            discountValue.value = '0';

            discountValue.min = '0';

            discountValue.max = '0';

            discountValue.required = false;

            discountValue.readOnly = true;

            maxDiscountWrapper.style.display = 'none';

            maxDiscountInput.value = '';

            maxDiscountInput.disabled = true;
        }
    }


    typeSelect.addEventListener(
        'change',
        updateDiscountType
    );


    // Chạy khi mở trang
    updateDiscountType();


    // ================================
    // Ngày bắt đầu / kết thúc
    // ================================

    function updateEndDate() {

        if (startDate.value) {

            endDate.min = startDate.value;

            if (
                endDate.value &&
                endDate.value < startDate.value
            ) {
                endDate.value = '';
            }
        }
    }


    startDate.addEventListener(
        'change',
        updateEndDate
    );


    updateEndDate();

});
</script>

@endsection