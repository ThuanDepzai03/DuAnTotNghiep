<div class="service-timeline {{ $timelineClass ?? '' }}">
    @foreach($timeline as $step)
        <div class="service-timeline__step {{ $step['done'] ? 'is-done' : '' }} {{ $step['current'] ? 'is-current' : '' }} {{ in_array($step['status'], ['refund_rejected', 'request_rejected', 'rejected', 'return_failed']) && $step['current'] ? 'is-error' : '' }}">
            <span class="service-timeline__icon" aria-hidden="true"><i class="fa {{ $step['icon'] }}"></i></span>
            <div class="service-timeline__body">
                <strong>{{ $step['label'] }}</strong>
                <p>{{ $step['description'] }}</p>
                <small>{{ $step['time'] ? \Illuminate\Support\Carbon::parse($step['time'])->format('d/m/Y H:i') : ($step['current'] ? 'Đang xử lý' : 'Chưa thực hiện') }}</small>
                @if(!empty($step['reason']) && $step['current'])
                    <div class="service-timeline__reason">{{ $step['reason'] }}</div>
                @endif
            </div>
        </div>
    @endforeach
</div>