@php
    $statusClass = str_replace('_', '-', $course['status']);
    $statusLabel = match ($course['status']) {
        'completed' => 'Completed',
        'in_progress' => 'In Progress',
        default => 'Not Started',
    };
    $barClass = match ($course['status']) {
        'completed' => 'green',
        'in_progress' => 'orange',
        default => 'gray',
    };
@endphp

<article class="ce-course-card ce-course-{{ $statusClass }}">
    <div class="ce-course-card-top">
        <div>
            <h3>{{ $course['title'] }}</h3>
            <p class="ce-course-meta">{{ $course['type'] }} · {{ $course['hours'] }} Contact Hours</p>
        </div>
        <span class="ce-course-badge ce-course-badge-{{ $statusClass }}">{{ $statusLabel }}</span>
    </div>

    <div class="ce-course-progress">
        <div class="ce-course-progress-bar">
            <div class="ce-course-progress-fill {{ $barClass }}" style="width: {{ $course['progress'] }}%;"></div>
        </div>
        <div class="ce-course-progress-labels">
            <span>{{ $course['progress_label'] }}</span>
            <span>{{ $course['progress_detail'] }}</span>
        </div>
    </div>

    <div class="ce-course-card-actions">
        <button type="button" class="ce-btn {{ $course['action_style'] === 'outline' ? 'ce-btn-outline-dark' : 'ce-btn-accent' }}" disabled>
            @if ($course['status'] === 'in_progress')
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            @endif
            {{ $course['action_label'] }}
        </button>

        @if (! empty($course['broker_status']) && $course['broker_status'] === 'reported')
            <span class="ce-broker-reported">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                Reported to CE Broker
            </span>
        @elseif ($course['status'] === 'completed')
            <span class="ce-broker-pending">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Pending CE Broker Report
            </span>
        @endif
    </div>
</article>
