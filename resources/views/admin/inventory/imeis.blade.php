@extends('admin.layout')
@section('content')
<div class="container-fluid py-3">
    <h3>Kho IMEI</h3>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <form method="POST" action="{{ route('admin.inventory.imeis.store') }}" class="row g-2 mb-4">
        @csrf
        <div class="col-md-3"><select id="imei-variant-select" name="product_variant_id" class="form-select" required><option value="">Chọn phiên bản</option>@foreach($variants as $variant)<option value="{{ $variant->id }}" @selected($selectedVariantId === $variant->id)>{{ $variant->product->name }} - {{ $variant->sku }}</option>@endforeach</select></div>
        <div class="col-md-2"><input id="imei-input" name="imei" class="form-control" placeholder="IMEI mới (nếu nhập thêm)"></div>
        <div class="col-md-2"><input name="imei2" class="form-control" placeholder="IMEI 2"></div>
        <div class="col-md-2"><input name="warehouse_location" class="form-control" placeholder="Vị trí kho"></div>
        <div class="col-md-2"><input type="date" name="warranty_expired_at" class="form-control"></div>
        <div class="col-md-1"><button id="imei-submit" class="btn btn-primary w-100" disabled>Nhập</button></div>
    </form>
    <div id="variant-imei-summary" class="alert alert-info d-none"></div>
    <form class="row g-2 mb-3"><div class="col-md-3"><select name="variant_id" class="form-select"><option value="">Tất cả phiên bản</option>@foreach($variants as $variant)<option value="{{ $variant->id }}" @selected($selectedVariantId === $variant->id)>{{ $variant->product->name }} - {{ $variant->sku }}</option>@endforeach</select></div><div class="col-md-3"><input name="q" value="{{ request('q') }}" class="form-control" placeholder="Tìm IMEI hoặc SKU"></div><div class="col-md-2"><select name="status" class="form-select"><option value="">Tất cả trạng thái</option>@foreach(['in_stock','reserved','sold','returned','warranty','retired'] as $status)<option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>@endforeach</select></div><div class="col-md-2"><select name="per_page" class="form-select"><option value="all" @selected($perPage === 'all')>Tất cả</option><option value="10" @selected($perPage === '10')>10</option><option value="50" @selected($perPage === '50')>50</option><option value="100" @selected($perPage === '100')>100</option></select></div><div class="col-md-1"><button class="btn btn-secondary">Lọc</button></div></form>
    <div class="table-responsive"><table class="table table-striped align-middle"><thead><tr><th>IMEI</th><th>IMEI 2</th><th>Sản phẩm / SKU</th><th>Trạng thái</th><th>Vị trí kho</th><th>Ngày nhập</th><th>Ngày bán</th><th>Hạn bảo hành</th><th>Cập nhật</th></tr></thead><tbody>@forelse($imeis as $imei)<tr><td><code>{{ $imei->imei }}</code></td><td>{{ $imei->imei2 ?: '—' }}</td><td>{{ $imei->variant->product->name ?? '' }}<small class="d-block text-muted">{{ $imei->variant->sku ?? '' }}</small></td><td><form method="POST" action="{{ route('admin.inventory.imeis.update', $imei) }}">@csrf @method('PUT')<select name="status" class="form-select form-select-sm" onchange="this.form.submit()">@foreach(['in_stock','reserved','sold','returned','warranty','retired'] as $status)<option value="{{ $status }}" @selected($imei->status === $status)>{{ $status }}</option>@endforeach</select><input type="hidden" name="warehouse_location" value="{{ $imei->warehouse_location }}"><input type="hidden" name="warranty_expired_at" value="{{ $imei->warranty_expired_at?->toDateString() }}"></form></td><td>{{ $imei->warehouse_location ?: '—' }}</td><td>{{ $imei->received_at?->format('d/m/Y H:i') ?: '—' }}</td><td>{{ $imei->sold_at?->format('d/m/Y H:i') ?: '—' }}</td><td>{{ $imei->warranty_expired_at?->format('d/m/Y') ?: '—' }}</td><td>{{ $imei->updated_at?->format('d/m/Y H:i') }}</td></tr>@empty<tr><td colspan="9">Chưa có IMEI.</td></tr>@endforelse</tbody></table></div>
    @if(method_exists($imeis, 'links'))
        <div class="d-flex justify-content-center mt-3">{{ $imeis->onEachSide(1)->links() }}</div>
    @endif
</div>
<script>
(() => {
    const variantSelect = document.getElementById('imei-variant-select');
    const imeiInput = document.getElementById('imei-input');
    const summary = document.getElementById('variant-imei-summary');
    const submitButton = document.getElementById('imei-submit');
    const lookupUrl = @json(route('admin.inventory.imeis.lookup'));
    let timer;

    function showVariantData(data) {
        if (!data.variant) {
            summary.classList.add('d-none');
            return;
        }

        if (variantSelect.value !== String(data.variant.id)) {
            variantSelect.value = data.variant.id;
        }

        const numbers = data.imeis.map(item => item.imei).join(', ');
        summary.textContent = `${data.variant.name}: ${data.imeis.length} IMEI${data.imeis.length === 1 ? '' : 's'}${numbers ? ' | ' + numbers : ''}`;
        summary.classList.remove('d-none');
    }

    function lookup(params) {
        const query = new URLSearchParams(params);
        fetch(`${lookupUrl}?${query}`)
            .then(response => response.json())
            .then(showVariantData)
            .catch(() => summary.classList.add('d-none'));
    }

    variantSelect.addEventListener('change', () => {
        if (variantSelect.value) {
            lookup({ variant_id: variantSelect.value });
        } else {
            summary.classList.add('d-none');
        }
    });

    imeiInput.addEventListener('input', () => {
        clearTimeout(timer);
        const imei = imeiInput.value.trim();
        submitButton.disabled = imei === '';
        if (imei.length < 8) {
            return;
        }
        timer = setTimeout(() => lookup({ imei }), 250);
    });

    if (variantSelect.value) {
        lookup({ variant_id: variantSelect.value });
    }
})();
</script>
@endsection
