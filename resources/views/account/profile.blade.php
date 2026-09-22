@extends('customer.layout')

@section('customer-content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Thông tin khách hàng</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('account.update') }}">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
            @endif

            <div class="mb-3">
                <label class="form-label">Họ và tên</label>
                <input class="form-control" type="text" name="name" value="{{ old('name', $user->name ?? $user->user ?? '') }}" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input class="form-control" value="{{ $user->user }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="tel" class="form-control" value="{{ $user->tel }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Tỉnh/Thành phố</label>
                <select name="city" id="profile-city" class="form-select">
                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                    @foreach($cities ?? [] as $city)
                        <option value="{{ $city }}" @selected(old('city', $user->city ?? '') === $city)>{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Phường/Xã</label>
                <select name="ward" id="profile-ward" class="form-select">
                    <option value="">-- Chọn Phường/Xã --</option>
                    @foreach($wards ?? [] as $ward)
                        <option value="{{ $ward }}" @selected(old('ward', $user->ward ?? '') === $ward)>{{ $ward }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Địa chỉ chi tiết</label>
                <input type="text" name="address_detail" class="form-control" value="{{ $user->address_detail ?? '' }}">
            </div>

            @if(session('success'))
                <div class="alert alert-success py-2">
                    {{ session('success') }}
                </div>
            @endif

            <button class="btn btn-primary">
                Lưu thay đổi
            </button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">Đổi mật khẩu</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('account.password.update') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Mật khẩu hiện tại</label>
                <input type="password" name="current_password" class="form-control" required>
                @error('current_password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control" minlength="8" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nhập lại mật khẩu mới</label>
                <input type="password" name="password_confirmation" class="form-control" minlength="8" required>
            </div>
            <button class="btn btn-primary">Đổi mật khẩu</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">Đơn hàng của tôi</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Phương thức</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{ strtoupper($order->payment_method) }}
                            </td>

                            <td>
                                {{ number_format($order->final_price ?? $order->total_price, 0, ',', '.') }} ₫
                            </td>

                            <td>
    @switch($order->status)
        @case('pending')
            <span class="badge bg-warning">Đã nhận đơn</span>
            @break

        @case('confirmed')
            <span class="badge bg-info">Đã xác nhận</span>
            @break

        @case('shipping')
            <span class="badge bg-primary">Đang giao</span>
            @break

        @case('completed')
            <span class="badge bg-success">Hoàn thành</span>
            @break

        @case('cancelled')
            <span class="badge bg-danger">Đã hủy</span>
            @break

        @default
            <span class="badge bg-secondary">{{ $order->status }}</span>
    @endswitch
</td>
                            <td>

    <a href="{{ route('account.order.detail',$order->id) }}"
        class="btn btn-sm btn-primary">

        Chi tiết

    </a>

    <a href="{{ route('orders.tracking.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
        Theo dõi
    </a>

    @if($order->status === 'completed')
        <a href="{{ route('orders.tracking.returns', $order->id) }}" class="btn btn-sm btn-outline-danger">
            Trả hàng / hoàn tiền
        </a>
    @endif

    @if($order->status=='pending')

        <form
            action="{{ route('account.order.cancel',$order->id) }}"
            method="POST"
            style="display:inline">

            @csrf
            @method('PUT')

            <button
                onclick="return confirm('Bạn chắc chắn muốn hủy đơn?')"
                class="btn btn-sm btn-danger">

                Hủy

            </button>

        </form>

    @endif

</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted text-center">
                                Bạn chưa có đơn hàng nào.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async function () {
    const city = document.getElementById('profile-city');
    const ward = document.getElementById('profile-ward');
    const currentCity = @json(old('city', $user->city ?? ''));
    const currentWard = @json(old('ward', $user->ward ?? ''));
    const addressApiUrl = @json(route('checkout.addressOptions'));

    if (!city || !ward) return;

    function normalize(value) {
        return String(value || '').toLowerCase().normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/^(tinh|thanh pho|phuong|xa|thi tran)\s+/i, '').trim();
    }

    function fillSelect(select, items, selectedValue, placeholder) {
        select.innerHTML = `<option value="">${placeholder}</option>`;
        let matched = false;
        (Array.isArray(items) ? items : []).forEach(item => {
            const option = document.createElement('option');
            option.value = item.value || '';
            option.textContent = item.label || item.value || '';
            if (normalize(option.value) === normalize(selectedValue)) {
                option.selected = true;
                matched = true;
            }
            if (item.id) option.dataset.addressId = item.id;
            select.appendChild(option);
        });
        if (!matched) select.selectedIndex = 0;
    }

    async function getAddressData(params) {
        const response = await fetch(addressApiUrl + '?' + new URLSearchParams(params), {
            headers: {'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest'},
            cache: 'no-store'
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.message || 'Không thể tải dữ liệu địa chỉ.');
        return Array.isArray(data.items) ? data.items : [];
    }

    async function loadWards(provinceId, selectedValue = '') {
        if (!provinceId) {
            ward.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';
            ward.disabled = false;
            return;
        }

        ward.disabled = true;
        ward.innerHTML = '<option value="">Đang tải Phường/Xã...</option>';
        try {
            const wards = await getAddressData({type: 'wards', parent_id: provinceId});
            fillSelect(ward, wards, selectedValue, '-- Chọn Phường/Xã --');
        } catch (error) {
            ward.innerHTML = '<option value="">Không tải được Phường/Xã</option>';
            console.error(error);
        } finally {
            ward.disabled = false;
        }
    }

    city.disabled = true;
    ward.disabled = true;
    try {
        const provinces = await getAddressData({type: 'provinces'});
        fillSelect(city, provinces, currentCity, '-- Chọn Tỉnh/Thành phố --');
        city.disabled = false;
        const selected = city.options[city.selectedIndex];
        if (selected?.dataset.addressId) await loadWards(selected.dataset.addressId, currentWard);
        else ward.disabled = false;
    } catch (error) {
        console.error(error);
        city.disabled = false;
        ward.disabled = false;
    }

    city.addEventListener('change', function () {
        const selected = city.options[city.selectedIndex];
        loadWards(selected?.dataset.addressId || '', '');
    });
});
</script>
@endpush