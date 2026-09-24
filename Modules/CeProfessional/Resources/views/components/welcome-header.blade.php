<div class="ce-welcome-row">
    <div class="ce-welcome-row-main">
        <h1>Welcome back, <em>{{ $first_name }}!</em></h1>
        <div class="ce-welcome-meta">
            <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                License Type: <strong>{{ $license_label }}</strong>
            </span>
            <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                License #: <strong>{{ $license_number }}</strong>
            </span>
            <span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                Renewal: <strong>{{ $renewal_date->format('M j, Y') }}</strong>
            </span>
        </div>
    </div>
    <div class="ce-welcome-actions">
        <a href="{{ url('/prep-courses') }}" class="ce-btn ce-btn-accent">+ Add Courses</a>
        <button type="button" class="ce-btn ce-btn-outline-dark" disabled title="Coming soon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Edit Profile
        </button>
    </div>
</div>
