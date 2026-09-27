<div class="mt-4">
    <h6>Lịch sử cập nhật</h6>
    <ol class="service-history">
        @forelse($history as $entry)
            <li>
                <strong>{{ $entry->old_status ? \App\Support\ServiceWorkflow::label($type, $entry->old_status) . ' → ' : '' }}{{ \App\Support\ServiceWorkflow::label($type, $entry->new_status) }}</strong>
                <small class="text-muted">{{ ($entry->changed_at ?? $entry->created_at)?->format('d/m/Y H:i') }} · {{ $entry->changed_by_name ?: ($entry->changed_by_type === 'system' ? 'Hệ thống' : 'Người dùng') }}</small>
                @if($entry->reason)<div class="small">{{ $entry->reason }}</div>@endif
            </li>
        @empty
            <li class="text-muted">Chưa có lịch sử cập nhật.</li>
        @endforelse
    </ol>
</div>