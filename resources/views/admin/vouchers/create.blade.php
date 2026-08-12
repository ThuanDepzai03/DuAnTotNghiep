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

                        <!-- DÁN ĐOẠN CODE MÃ VOUCHER NGAY TẠI ĐÂY -->

                        <div class="mb-3">

                            <label class="form-label">Mã Voucher</label>

                            <input
                                type="text"
                                name="code"
                                class="form-control"
                                value="{{ old('code') }}"
                            >

                        </div>
                        <div class="mb-3">

    <label class="form-label">Tên Voucher</label>

    <input
        type="text"
        name="name"
        class="form-control"
        value="{{ old('name') }}"
        placeholder="Ví dụ: Giảm 10% toàn bộ điện thoại"
    >

</div>
<div class="mb-3">

    <label class="form-label">Loại giảm giá</label>

    <select name="discount_type" class="form-select">

        <option value="percent">Giảm theo %</option>

        <option value="fixed">Giảm theo số tiền</option>

    </select>

</div>
<div class="mb-3">

    <label class="form-label">Giá trị giảm</label>

    <input
        type="number"
        name="discount_value"
        class="form-control"
        value="{{ old('discount_value') }}"
        placeholder="Ví dụ: 10 hoặc 100000"
    >

</div>
<div class="mb-3">

    <label class="form-label">Giảm tối đa</label>

    <input
        type="number"
        name="max_discount"
        class="form-control"
        value="{{ old('max_discount') }}"
        placeholder="Chỉ áp dụng khi giảm theo %"
    >

</div>
<div class="mb-3">

    <label class="form-label">Đơn tối thiểu</label>

    <input
        type="number"
        name="min_order"
        class="form-control"
        value="{{ old('min_order') }}"
        placeholder="Ví dụ 500000"
    >

</div>
<div class="mb-3">

    <label class="form-label">Số lượng</label>

    <input
        type="number"
        name="quantity"
        class="form-control"
        value="{{ old('quantity') }}"
    >

</div>
<div class="mb-3">

    <label class="form-label">Ngày bắt đầu</label>

    <input
        type="date"
        name="start_date"
        class="form-control"
        value="{{ old('start_date') }}"
    >

</div>
<div class="mb-3">

    <label class="form-label">Ngày kết thúc</label>

    <input
        type="date"
        name="end_date"
        class="form-control"
        value="{{ old('end_date') }}"
    >

</div>
<div class="mb-3">

    <label class="form-label">Trạng thái</label>

    <select name="status" class="form-select">

        <option value="1">
            Hoạt động
        </option>

        <option value="0">
            Tạm khóa
        </option>

    </select>

</div>
<div class="mt-4">

    <button class="btn btn-success">

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

@endsection