<section class="ce-tabs-panel">
    <div class="ce-tabs-nav" role="tablist">
        <button type="button" class="ce-tab-btn active" data-ce-tab="renewal" role="tab" aria-selected="true">
            Florida Renewal
        </button>
        <button type="button" class="ce-tab-btn" data-ce-tab="sync" role="tab" aria-selected="false">
            CE Broker Sync
        </button>
    </div>

    <div class="ce-tab-panels">
        <div class="ce-tab-panel active" data-ce-panel="renewal" role="tabpanel">
            <div class="ce-renewal-card">
                <span class="ce-renewal-label">Next Florida Renewal</span>
                <h3>{{ $ce_broker['renewal_date'] }}</h3>
                <p class="ce-renewal-countdown"><strong>{{ $ce_broker['days_remaining'] }}</strong> days remaining</p>
                <p class="ce-renewal-note">Track mandatory and elective hours in your compliance tracker above to stay on schedule for licensure renewal.</p>
            </div>
        </div>

        <div class="ce-tab-panel" data-ce-panel="sync" role="tabpanel">
            <div class="ce-sync-card">
                <div class="ce-sync-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
                </div>
                <div class="ce-sync-body">
                    <h3>Sync Transcript with CE Broker</h3>
                    <p>Push your completed course hours and certificate data to CE Broker for Florida Board of Nursing compliance tracking.</p>
                    <button type="button" class="ce-btn ce-btn-sync" disabled title="Coming soon">
                        Sync Transcript with CE Broker
                    </button>
                    <span class="ce-sync-last">Last synced: {{ $ce_broker['last_synced'] }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
