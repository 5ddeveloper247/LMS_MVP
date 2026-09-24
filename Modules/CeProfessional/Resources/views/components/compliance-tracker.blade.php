<div class="ce-compliance-card">
    <div class="ce-compliance-head">
        <h2>Compliance Status Tracker</h2>
        <p>CE Broker — Florida Board of Nursing</p>
    </div>

    <div class="ce-compliance-gauge-wrap">
        <div class="ce-compliance-gauge" style="--pct: {{ $compliance['percent'] }};">
            <div class="ce-compliance-gauge-inner">
                <strong>{{ $compliance['percent'] }}%</strong>
                <span>Complete</span>
            </div>
        </div>
        <p class="ce-compliance-summary">
            {{ $compliance['hours_completed'] }} of {{ $compliance['hours_required'] }} contact hours completed
        </p>
    </div>

    <ul class="ce-compliance-list">
        @foreach ($compliance['requirements'] as $item)
            <li class="{{ $item['completed'] ? 'done' : 'pending' }}">
                <span class="ce-compliance-check">
                    @if ($item['completed'])
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    @endif
                </span>
                <span class="ce-compliance-label">{{ $item['label'] }}</span>
                <span class="ce-compliance-hours">{{ $item['hours'] }}</span>
            </li>
        @endforeach
    </ul>
</div>
