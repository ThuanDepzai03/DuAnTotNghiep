@extends('layouts.master')

@section('content')
<div class="section py-4">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h3 class="mb-1">Yêu cầu trả hàng #{{ $order->id }}</h3>
                <p class="text-muted mb-0">
                    Gửi yêu cầu cho một sản phẩm trong đơn hàng.
                </p>
            </div>

            <a href="{{ route('orders.tracking.show', $order->id) }}"
               class="btn btn-outline-secondary">
                Quay lại đơn hàng
            </a>
        </div>

        <div class="alert alert-warning">
            <strong>Điều kiện trả hàng</strong>

            <ul class="mb-0 mt-2">
                <li>Đơn hàng phải ở trạng thái đã hoàn tất.</li>
                <li>Yêu cầu trong vòng 7 ngày từ ngày hoàn tất đơn.</li>
                <li>Sản phẩm cần còn đủ phụ kiện và thông tin IMEI nếu có.</li>
                <li>Shop sẽ kiểm tra trước khi duyệt hoàn tiền.</li>
            </ul>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form method="POST"
                      action="{{ route('account.order.return.store', $order) }}">
                    @csrf

                    {{-- SẢN PHẨM --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Sản phẩm cần trả
                        </label>

                        <select name="order_item_id"
                                id="return-order-item"
                                class="form-select"
                                required>

                            @foreach($order->items as $item)
                                <option value="{{ $item->id }}"
                                        data-imeis='@json(
                                            $item->imeis->map(fn ($imei) => [
                                                "id" => $imei->id,
                                                "imei" => $imei->imei
                                            ])->values()
                                        )'>

                                    {{ $item->variant->product->name ?? 'Sản phẩm' }}
                                    · SL {{ $item->quantity }}
                                    · {{ number_format($item->price, 0, ',', '.') }}₫

                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- IMEI --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            IMEI thiết bị <span class="text-muted"></span>
                        </label>

                        <div id="return-imei-list"
                             class="border rounded p-3">

                            <div class="text-muted small">
                                Đang tải danh sách IMEI...
                            </div>

                        </div>

                        <div class="form-text mt-2">
                            Chỉ hiển thị IMEI thuộc sản phẩm đã chọn.
                        </div>
                    </div>

                    {{-- LÝ DO --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Lý do trả hàng
                            <span class="text-danger">*</span>
                        </label>

                        <select name="reason_id"
                                id="return-reason"
                                class="form-select mb-2">

                            <option value="">Chọn lý do</option>

                            @foreach($reasons as $reason)
                                <option value="{{ $reason->id }}"
                                        data-condition="{{ $reason->condition_text }}">

                                    {{ $reason->name }}

                                </option>
                            @endforeach

                        </select>

                        <div id="return-condition"
                             class="small text-muted mb-2">
                        </div>

                        <input name="reason"
                               value="{{ old('reason') }}"
                               class="form-control"
                               maxlength="255"
                               required
                               placeholder="Hoặc nhập lý do khác">
                    </div>

                    {{-- MÔ TẢ --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Mô tả thêm
                        </label>

                        <textarea name="description"
                                  rows="4"
                                  maxlength="2000"
                                  class="form-control"
                                  placeholder="Mô tả tình trạng sản phẩm hoặc yêu cầu hoàn tiền">{{ old('description') }}</textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        Gửi yêu cầu trả hàng
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const itemSelect = document.getElementById('return-order-item');
    const imeiList = document.getElementById('return-imei-list');
    const reasonSelect = document.getElementById('return-reason');
    const conditionText = document.getElementById('return-condition');

    function updateImeis() {
        const option = itemSelect?.selectedOptions[0];

        let imeis = [];

        try {
            imeis = option?.dataset.imeis
                ? JSON.parse(option.dataset.imeis)
                : [];
        } catch (error) {
            console.error('Lỗi đọc IMEI:', error);
        }

        if (!imeiList) return;

        imeiList.innerHTML = '';

        if (imeis.length === 0) {
            imeiList.innerHTML = `
                <span class="text-muted small">
                    Sản phẩm này không có IMEI.
                </span>
            `;
            return;
        }

        imeis.forEach(function (item) {
            const div = document.createElement('div');
                            const input = document.createElement('input');
                            const label = document.createElement('label');

                            div.className = 'border-bottom py-2 form-check';
                            input.type = 'radio';
                            input.name = 'product_imei_id';
                            input.value = item.id;
                            input.className = 'form-check-input';
                            input.required = true;
                            label.className = 'form-check-label';
                            label.textContent = 'IMEI: ' + item.imei;

                            div.appendChild(input);
                            div.appendChild(label);

            imeiList.appendChild(div);
        });
    }

    itemSelect?.addEventListener('change', updateImeis);

    reasonSelect?.addEventListener('change', function () {
        conditionText.textContent =
            this.selectedOptions[0]?.dataset.condition || '';
    });

    updateImeis();

});
</script>
@endpush