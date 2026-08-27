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

                            <select name="discount_type" class="form-select" id="voucher-discount-type" required>
                                <option value="percent" {{ old('discount_type', 'percent') === 'percent' ? 'selected' : '' }}>
                                    Giảm theo %
                                </option>
                                <option value="fixed" {{ old('discount_type') === 'fixed' ? 'selected' : '' }}>
                                    Giảm theo số tiền
                                </option>
                                <option value="free_shipping" {{ old('discount_type') === 'free_shipping' ? 'selected' : '' }}>
                                    Miễn phí vận chuyển
                                </option>
                            </select>
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
                                                        min="1"
                                                        max="100"
{{-- Loại Voucher --}}
<div class="mb-3">
    <label class="form-label">Loại Voucher</label>

    <select name="voucher_type" class="form-select" required>
        <option value="normal" {{ old('voucher_type', 'normal') == 'normal' ? 'selected' : '' }}>
            Voucher thường
        </option>

        <option value="flash_sale" {{ old('voucher_type') == 'flash_sale' ? 'selected' : '' }}>
            Flash Sale
        </option>

        <option value="mid_autumn" {{ old('voucher_type') == 'mid_autumn' ? 'selected' : '' }}>
            Voucher Trung Thu
        </option>
    </select>
</div>


{{-- Loại giảm giá --}}
<div class="mb-3">
    <label class="form-label">Loại giảm giá</label>

    <select name="discount_type" class="form-select" id="voucher-discount-type" required>
        <option value="percent" {{ old('discount_type', 'percent') === 'percent' ? 'selected' : '' }}>
            Giảm theo %
        </option>
        <option value="fixed" {{ old('discount_type') === 'fixed' ? 'selected' : '' }}>
            Giảm theo số tiền
        </option>
        <option value="free_shipping" {{ old('discount_type') === 'free_shipping' ? 'selected' : '' }}>
            Miễn phí vận chuyển
        </option>
    </select>
</div>


                        {{-- Phần trăm giảm --}}
                        <div class="mb-3" id="discount-value-wrapper">
                            <label class="form-label" id="discount-value-label">Phần trăm giảm (%)</label>

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

                            <small class="text-muted" id="discount-value-help">
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
        const typeSelect = document.getElementById('voucher-discount-type');
        const discountValueInput = document.querySelector('input[name="discount_value"]');
        const discountValueLabel = document.getElementById('discount-value-label');
        const discountValueHelp = document.getElementById('discount-value-help');

        const syncDiscountType = function () {
            if (!typeSelect || !discountValueInput || !discountValueLabel || !discountValueHelp) {
                return;
            }

            const type = typeSelect.value;

            if (type === 'free_shipping') {
                discountValueInput.value = 0;
                discountValueInput.setAttribute('min', '0');
                discountValueInput.setAttribute('max', '0');
                discountValueInput.setAttribute('readonly', 'readonly');
                discountValueLabel.textContent = 'Giá trị giảm';
                discountValueHelp.textContent = 'Voucher miễn phí vận chuyển sẽ tự động áp dụng 0đ giảm cho đơn hàng.';
                return;
            }

            discountValueInput.removeAttribute('readonly');
            discountValueInput.setAttribute('min', type === 'fixed' ? '1' : '1');
            discountValueInput.setAttribute('max', type === 'fixed' ? '1000000000' : '100');
            discountValueLabel.textContent = type === 'fixed' ? 'Số tiền giảm (đ)' : 'Phần trăm giảm (%)';
            discountValueHelp.textContent = type === 'fixed' ? 'Nhập số tiền giảm trực tiếp, ví dụ: 50000.' : 'Nhập từ 1% đến 100%.';
        };

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

        typeSelect.addEventListener('change', syncDiscountType);
        syncDiscountType();
        syncEndDate();
    });
</script>

@endsection