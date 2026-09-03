@extends('admin.layout')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h3 class="mb-1">Quản lý danh sách tài khoản</h3>
            <p class="text-subtitle text-muted mb-0">Danh sách tài khoản khách hàng và quản trị viên.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Thêm tài khoản</a>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                            <h4 class="card-title mb-0">Danh sách tài khoản</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tài khoản</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Vai trò</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>#{{ $user->id }}</td>
                                    <td>{{ $user->user }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->tel ?: 'Chưa cập nhật' }}</td>
                                    <td style="min-width: 240px;">
                                        @php
                                            $addressParts = array_filter([
                                                $user->address_detail ?? null,
                                                $user->address ?? null,
                                                $user->ward ?? null,
                                                $user->city ?? null,
                                            ]);
                                        @endphp
                                        {{ $addressParts ? implode(', ', $addressParts) : 'Chưa cập nhật' }}
                                    </td>
                                    <td>
                                        <span class="badge {{ $user->role == 1 ? 'bg-primary' : 'bg-secondary' }}">
                                            {{ $user->role == 1 ? 'Admin' : 'Khách hàng' }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at ? date('d/m/Y H:i', strtotime($user->created_at)) : '---' }}</td>
                                    <td>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary">Sửa</a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Xóa</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
