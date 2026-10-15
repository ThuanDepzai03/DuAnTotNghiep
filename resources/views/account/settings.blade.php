@extends('layouts.master')

@section('content')
@php
    $displayName = $user->name ?? $user->user ?? 'Khách hàng';
    $avatarUrl = !empty($user->avatar_path) ? \Illuminate\Support\Facades\Storage::url($user->avatar_path) : null;
    $preferenceDefaults = [
        'dark_mode' => false,
        'interactive_sound' => false,
        'promotional_notifications' => true,
        'order_notifications' => true,
    ];
    $preferences = array_merge($preferenceDefaults, $preferences ?? []);
@endphp

<section class="account-settings-page" data-theme="{{ $preferences['dark_mode'] ? 'dark' : 'light' }}">
    <div class="account-hub">
        <header class="account-hub__heading">
            <div>
                <span class="account-eyebrow">MOBILE MART STORE</span>
                <h1>Trung tâm tài khoản</h1>
                <p>Quản lý hồ sơ, địa chỉ giao hàng và trải nghiệm mua sắm của bạn.</p>
            </div>
            <a href="{{ route('orders.tracking') }}" class="account-orders-link">
                <i class="fa fa-clipboard" aria-hidden="true"></i> Đơn hàng của tôi
            </a>
        </header>

        @if(session('success'))
            <div class="account-toast account-toast--success" role="status" data-toast>
                <i class="fa fa-check-circle" aria-hidden="true"></i>{{ session('success') }}
                <button type="button" aria-label="Đóng thông báo" data-dismiss-toast>&times;</button>
            </div>
        @endif
        @if(session('error') || $errors->any())
            <div class="account-toast account-toast--error" role="alert" data-toast>
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ session('error') ?? $errors->first() }}
                <button type="button" aria-label="Đóng thông báo" data-dismiss-toast>&times;</button>
            </div>
        @endif

        <div class="account-layout">
            <aside class="account-sidebar">
                <div class="account-user-card">
                    <div class="account-avatar account-avatar--small">
                        @if($avatarUrl)
                            <img src="{{ $avatarUrl }}" alt="Ảnh đại diện của {{ $displayName }}">
                        @else
                            <span>{{ mb_strtoupper(mb_substr($displayName, 0, 1)) }}</span>
                        @endif
                    </div>
                    <div>
                        <strong>{{ $displayName }}</strong>
                        <span>{{ $user->email ?: 'Chưa cập nhật email' }}</span>
                    </div>
                </div>

                <nav class="account-tabs" aria-label="Cài đặt tài khoản" role="tablist" aria-orientation="vertical">
                    <button type="button" class="account-tab is-active" id="tab-profile" role="tab" aria-controls="panel-profile" aria-selected="true" data-tab="profile">
                        <i class="fa fa-user-o" aria-hidden="true"></i><span>Hồ sơ cá nhân</span><i class="fa fa-angle-right account-tab__arrow" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="account-tab" id="tab-addresses" role="tab" aria-controls="panel-addresses" aria-selected="false" data-tab="addresses">
                        <i class="fa fa-map-marker" aria-hidden="true"></i><span>Sổ địa chỉ</span><i class="fa fa-angle-right account-tab__arrow" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="account-tab" id="tab-security" role="tab" aria-controls="panel-security" aria-selected="false" data-tab="security">
                        <i class="fa fa-shield" aria-hidden="true"></i><span>Bảo mật</span><i class="fa fa-angle-right account-tab__arrow" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="account-tab" id="tab-experience" role="tab" aria-controls="panel-experience" aria-selected="false" data-tab="experience">
                        <i class="fa fa-sliders" aria-hidden="true"></i><span>Tùy chọn trải nghiệm</span><i class="fa fa-angle-right account-tab__arrow" aria-hidden="true"></i>
                    </button>
                </nav>

                <a href="{{ route('cart.index') }}" class="account-sidebar-link"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a>
                <a href="{{ route('account.service-requests.index') }}" class="account-sidebar-link account-sidebar-link--service"><i class="fa fa-refresh" aria-hidden="true"></i> Đổi trả / bảo hành</a>
                <form action="{{ route('logout') }}" method="POST" class="account-logout-form">
                    @csrf
                    <button type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</button>
                </form>
            </aside>

            <div class="account-content">
                <section class="account-panel is-active" id="panel-profile" role="tabpanel" aria-labelledby="tab-profile" data-panel="profile">
                    <div class="account-panel__heading">
                        <div><span class="account-eyebrow">THÔNG TIN CỦA BẠN</span><h2>Hồ sơ cá nhân</h2></div>
                    </div>
                    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data" class="account-form">
                        @csrf
                        <div class="account-profile-photo">
                            <div class="account-avatar account-avatar--large" data-avatar-preview>
                                @if($avatarUrl)
                                    <img src="{{ $avatarUrl }}" alt="Ảnh đại diện">
                                @else
                                    <span>{{ mb_strtoupper(mb_substr($displayName, 0, 1)) }}</span>
                                @endif
                            </div>
                            <div>
                                <strong>Ảnh đại diện</strong>
                                <p>Ảnh JPG, PNG hoặc WebP; dung lượng tối đa 2 MB.</p>
                                <label for="account-avatar" class="account-upload-button"><i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh</label>
                                <input id="account-avatar" class="account-visually-hidden" type="file" name="avatar" accept="image/jpeg,image/png,image/webp">
                                @error('avatar')<span class="account-field-error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="account-form-grid">
                            <label class="account-field">
                                <span>Họ và tên <b>*</b></span>
                                <input type="text" name="name" value="{{ old('name', $user->name ?? $user->user ?? '') }}" maxlength="255" autocomplete="name" required>
                                @error('name')<small class="account-field-error">{{ $message }}</small>@enderror
                            </label>
                            <label class="account-field">
                                <span>Tên đăng nhập</span>
                                <input type="text" value="{{ $user->user }}" disabled>
                            </label>
                            <label class="account-field">
                                <span>Email</span>
                                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" maxlength="255" autocomplete="email">
                                @error('email')<small class="account-field-error">{{ $message }}</small>@enderror
                            </label>
                            <label class="account-field">
                                <span>Số điện thoại</span>
                                <input type="tel" name="tel" value="{{ old('tel', $user->tel ?? '') }}" maxlength="20" autocomplete="tel" inputmode="tel">
                                @error('tel')<small class="account-field-error">{{ $message }}</small>@enderror
                            </label>
                            <label class="account-field">
                                <span>Giới tính</span>
                                <select name="gender">
                                    <option value="">Chọn giới tính</option>
                                    <option value="male" @selected(old('gender', $user->gender ?? '') === 'male')>Nam</option>
                                    <option value="female" @selected(old('gender', $user->gender ?? '') === 'female')>Nữ</option>
                                    <option value="other" @selected(old('gender', $user->gender ?? '') === 'other')>Khác</option>
                                </select>
                            </label>
                            <label class="account-field">
                                <span>Ngày sinh</span>
                                <input type="date" name="birth_date" value="{{ old('birth_date', !empty($user->birth_date) ? \Illuminate\Support\Carbon::parse($user->birth_date)->format('Y-m-d') : '') }}" max="{{ now()->format('Y-m-d') }}">
                                @error('birth_date')<small class="account-field-error">{{ $message }}</small>@enderror
                            </label>
                        </div>
                        <div class="account-form__footer">
                            <button type="submit" class="account-primary-button"><span>Lưu thay đổi</span><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </section>

                <section class="account-panel" id="panel-addresses" role="tabpanel" aria-labelledby="tab-addresses" data-panel="addresses" hidden>
                    <div class="account-panel__heading">
                        <div><span class="account-eyebrow">GIAO HÀNG THUẬN TIỆN</span><h2>Sổ địa chỉ nhận hàng</h2></div>
                        <button type="button" class="account-primary-button" data-open-address><i class="fa fa-plus" aria-hidden="true"></i><span>Thêm địa chỉ</span></button>
                    </div>
                    <p class="account-panel__description">Địa chỉ mặc định sẽ tự động được điền khi bạn thanh toán.</p>
                    <div class="account-address-list">
                        @forelse($addresses as $address)
                            <article class="account-address-card {{ $address->is_default ? 'is-default' : '' }}">
                                <div class="account-address-card__top">
                                    <span class="account-address-label"><i class="fa {{ $address->label === 'company' ? 'fa-briefcase' : 'fa-home' }}" aria-hidden="true"></i>{{ $address->label === 'company' ? 'Công ty' : 'Nhà riêng' }}</span>
                                    @if($address->is_default)<span class="account-default-badge"><i class="fa fa-check" aria-hidden="true"></i> Mặc định</span>@endif
                                </div>
                                <div class="account-address-card__body">
                                    <strong>{{ $address->recipient_name }}</strong><span>{{ $address->phone }}</span>
                                    <p>{{ $address->address_detail }}, {{ $address->ward }}, {{ $address->city }}</p>
                                </div>
                                <div class="account-address-card__actions">
                                    <button type="button" class="account-text-button" data-edit-address
                                        data-id="{{ $address->id }}" data-name="{{ $address->recipient_name }}"
                                        data-phone="{{ $address->phone }}" data-label="{{ $address->label }}"
                                        data-city="{{ $address->city }}" data-ward="{{ $address->ward }}"
                                        data-detail="{{ $address->address_detail }}" data-default="{{ $address->is_default ? '1' : '0' }}">Sửa</button>
                                    @unless($address->is_default)
                                        <form action="{{ route('account.addresses.default', $address->id) }}" method="POST">
                                            @csrf<button type="submit" class="account-text-button">Đặt mặc định</button>
                                        </form>
                                    @endunless
                                    <form action="{{ route('account.addresses.delete', $address->id) }}" method="POST" data-confirm-delete>
                                        @csrf @method('DELETE')<button type="submit" class="account-text-button account-text-button--danger">Xóa</button>
                                    </form>
                                </div>
                            </article>
                        @empty
                            <div class="account-empty-address"><i class="fa fa-map-o" aria-hidden="true"></i><strong>Chưa có địa chỉ nhận hàng</strong><span>Thêm địa chỉ để đặt hàng nhanh hơn trong lần mua sắm tiếp theo.</span></div>
                        @endforelse
                    </div>
                </section>

                <section class="account-panel" id="panel-security" role="tabpanel" aria-labelledby="tab-security" data-panel="security" hidden>
                    <div class="account-panel__heading"><div><span class="account-eyebrow">BẢO VỆ TÀI KHOẢN</span><h2>Cài đặt bảo mật</h2></div></div>
                    <div class="account-security-card">
                        <div class="account-section-title"><span class="account-section-icon"><i class="fa fa-key" aria-hidden="true"></i></span><div><h3>Đổi mật khẩu</h3><p>Sử dụng mật khẩu dài và khó đoán để bảo vệ tài khoản.</p></div></div>
                        <form action="{{ route('account.password.update') }}" method="POST" class="account-form account-password-form">
                            @csrf
                            <label class="account-field"><span>Mật khẩu hiện tại</span><input type="password" name="current_password" autocomplete="current-password" required>@error('current_password')<small class="account-field-error">{{ $message }}</small>@enderror</label>
                            <label class="account-field"><span>Mật khẩu mới</span><input type="password" name="password" minlength="8" autocomplete="new-password" required data-password-input></label>
                            <div class="account-password-strength" aria-live="polite"><span class="account-password-strength__bar"><i data-strength-bar></i></span><small data-strength-label>Độ mạnh mật khẩu</small></div>
                            @error('password')<small class="account-field-error">{{ $message }}</small>@enderror
                            <label class="account-field"><span>Xác nhận mật khẩu mới</span><input type="password" name="password_confirmation" minlength="8" autocomplete="new-password" required></label>
                            <button type="submit" class="account-primary-button"><span>Đổi mật khẩu</span><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="account-security-card account-security-card--devices">
                        <div class="account-section-title"><span class="account-section-icon"><i class="fa fa-laptop" aria-hidden="true"></i></span><div><h3>Thiết bị đăng nhập</h3><p>Đăng xuất các phiên khác; thiết bị hiện tại vẫn được giữ đăng nhập.</p></div></div>
                        <form action="{{ route('account.sessions.destroy-others') }}" method="POST" data-confirm-sessions>
                            @csrf<button type="submit" class="account-secondary-button">Đăng xuất khỏi các thiết bị khác</button>
                        </form>
                    </div>
                </section>

                <section class="account-panel" id="panel-experience" role="tabpanel" aria-labelledby="tab-experience" data-panel="experience" hidden>
                    <div class="account-panel__heading"><div><span class="account-eyebrow">CÁ NHÂN HÓA MUA SẮM</span><h2>Tùy chọn trải nghiệm</h2></div></div>
                    <form action="{{ route('account.preferences.update') }}" method="POST" class="account-preferences-form">
                        @csrf
                        <div class="account-preference-row">
                            <span class="account-preference-icon"><i class="fa fa-moon-o" aria-hidden="true"></i></span>
                            <span class="account-preference-copy"><strong>Giao diện tối</strong><small>Giảm độ sáng và dễ nhìn hơn trong môi trường thiếu sáng.</small></span>
                            <label class="account-switch"><input type="checkbox" name="dark_mode" value="1" @checked($preferences['dark_mode']) data-theme-toggle><span class="account-switch__track"></span><span class="account-visually-hidden">Bật giao diện tối</span></label>
                        </div>
                        <div class="account-preference-row">
                            <span class="account-preference-icon"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
                            <span class="account-preference-copy"><strong>Âm thanh tương tác</strong><small>Phát âm thanh nhẹ khi bạn nhấn các nút trên trang.</small></span>
                            <label class="account-switch"><input type="checkbox" name="interactive_sound" value="1" @checked($preferences['interactive_sound']) data-sound-toggle><span class="account-switch__track"></span><span class="account-visually-hidden">Bật âm thanh tương tác</span></label>
                        </div>
                        <div class="account-preference-row">
                            <span class="account-preference-icon"><i class="fa fa-tags" aria-hidden="true"></i></span>
                            <span class="account-preference-copy"><strong>Ưu đãi và khuyến mãi</strong><small>Nhận thông tin về voucher, sản phẩm mới và ưu đãi hấp dẫn.</small></span>
                            <label class="account-switch"><input type="checkbox" name="promotional_notifications" value="1" @checked($preferences['promotional_notifications'])><span class="account-switch__track"></span><span class="account-visually-hidden">Nhận thông báo khuyến mãi</span></label>
                        </div>
                        <div class="account-preference-row">
                            <span class="account-preference-icon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                            <span class="account-preference-copy"><strong>Cập nhật đơn hàng</strong><small>Nhận thông báo khi đơn hàng thay đổi trạng thái.</small></span>
                            <label class="account-switch"><input type="checkbox" name="order_notifications" value="1" @checked($preferences['order_notifications'])><span class="account-switch__track"></span><span class="account-visually-hidden">Nhận thông báo đơn hàng</span></label>
                        </div>
                        <div class="account-form__footer"><button type="submit" class="account-primary-button"><span>Lưu tùy chọn</span><i class="fa fa-arrow-right" aria-hidden="true"></i></button></div>
                    </form>
                </section>
            </div>
        </div>

        <section class="account-order-history">
            <div class="account-order-history__heading">
                <div><span class="account-eyebrow">THEO DÕI MUA SẮM</span><h2>Đơn hàng gần đây</h2></div>
                <a href="{{ route('orders.tracking') }}">Xem tất cả <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            @forelse($orders as $order)
                <a class="account-order-row" href="{{ route('account.order.detail', $order->id) }}">
                    <span class="account-order-row__id">#{{ $order->id }}</span>
                    <span class="account-order-row__date">{{ \Illuminate\Support\Carbon::parse($order->created_at)->format('d/m/Y') }}</span>
                    <span class="account-order-row__status">{{ match($order->status) {
                        'pending' => 'Đã nhận đơn',
                        'confirmed' => 'Đã xác nhận',
                        'shipping' => 'Đang giao',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Đã hủy',
                        'pending_payment' => 'Chờ thanh toán',
                        default => ucfirst((string) $order->status),
                    } }}</span>
                    <strong>{{ number_format($order->final_price ?? $order->total_price ?? 0, 0, ',', '.') }} ₫</strong>
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            @empty
                <p class="account-order-history__empty">Các đơn hàng gần đây của bạn sẽ xuất hiện tại đây.</p>
            @endforelse
        </section>
    </div>

    <dialog class="account-address-dialog" data-address-dialog
        data-open-on-error="{{ $errors->hasAny(['recipient_name', 'phone', 'label', 'city', 'ward', 'address_detail']) ? '1' : '0' }}"
        aria-labelledby="address-dialog-title">
        <form action="{{ route('account.addresses.store') }}" method="POST" class="account-form" data-address-form>
            @csrf
            <input type="hidden" name="_method" value="{{ old('_method') }}" data-address-method disabled>
            <input type="hidden" name="address_id" value="{{ old('address_id') }}" data-address-id>
            <div class="account-dialog-heading"><div><span class="account-eyebrow">SỔ ĐỊA CHỈ</span><h2 id="address-dialog-title">Thêm địa chỉ mới</h2></div><button type="button" class="account-dialog-close" aria-label="Đóng" data-close-address>&times;</button></div>
            <div class="account-form-grid">
                <label class="account-field"><span>Họ và tên người nhận *</span><input type="text" name="recipient_name" value="{{ old('recipient_name') }}" maxlength="255" required></label>
                <label class="account-field"><span>Số điện thoại *</span><input type="tel" name="phone" value="{{ old('phone') }}" maxlength="20" required></label>
                <label class="account-field"><span>Loại địa chỉ *</span><select name="label" required><option value="home" @selected(old('label', 'home') === 'home')>Nhà riêng</option><option value="company" @selected(old('label') === 'company')>Công ty</option></select></label>
                <label class="account-field"><span>Tỉnh / Thành phố *</span><input type="text" name="city" value="{{ old('city') }}" maxlength="255" required></label>
                <label class="account-field"><span>Phường / Xã *</span><input type="text" name="ward" value="{{ old('ward') }}" maxlength="255" required></label>
                <label class="account-field account-field--full"><span>Địa chỉ chi tiết *</span><input type="text" name="address_detail" value="{{ old('address_detail') }}" maxlength="500" placeholder="Số nhà, tên đường..." required></label>
            </div>
            <label class="account-checkbox-line"><input type="checkbox" name="is_default" value="1" @checked(old('is_default'))><span>Đặt làm địa chỉ mặc định</span></label>
            <div class="account-dialog-actions"><button type="button" class="account-secondary-button" data-close-address>Hủy</button><button type="submit" class="account-primary-button"><span>Lưu địa chỉ</span></button></div>
        </form>
    </dialog>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/account-settings.js') }}" defer></script>
@endpush
