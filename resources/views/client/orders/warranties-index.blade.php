@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 920px">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h2>Yêu cầu bảo hành của tôi</h2>
            <p class="text-muted mb-0">Theo dõi tiến độ xử lý và giao trả thiết bị.</p>
        </div>
        <a href="{{ route('warranty.lookup') }}" class="btn btn-outline-secondary">Tra cứu IMEI</a>
    </div>

    @forelse($claims as $claim)
        <article class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                    <div>
                        <h5 class="mb-1">Bảo hành #{{ $claim->id }}</h5>
                        <p class="text-muted mb-0">{{ $claim->imei?->variant?->product?->name ?? 'Thiết bị' }} · IMEI {{ $claim->imei?->imei }}</p>
                    </div>
                    <span class="badge {{ \App\Support\ServiceWorkflow::isFailure('warranty', $claim->status) ? 'bg-danger' : ($claim->status === 'completed' ? 'bg-success' : 'bg-warning text-dark') }}">
                        {{ \App\Support\ServiceWorkflow::label('warranty', $claim->status) }}
                    </span>
                </div>
                @include('shared.service-timeline', ['timeline' => $claim->workflow_timeline])
                <a class="btn btn-sm btn-outline-primary mt-3" href="{{ route('account.warranties.show', $claim) }}">Chi tiết và thao tác</a>
            </div>
        </article>
    @empty
        <div class="alert alert-info">Bạn chưa có yêu cầu bảo hành.</div>
    @endforelse

    {{ $claims->links() }}
</div>
@endsection
