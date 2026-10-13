@if(isset($recent_program) && $recent_program->count())
<section class="pd-recommendations">
    <div class="pd-container">
        <div class="pd-rec-header">
            <h2>Continue Your Journey</h2>
            <p style="color: var(--pd-charcoal-soft);">Explore other programs that may fit your next step.</p>
        </div>
        <div class="pd-rec-grid">
            @foreach($recent_program as $program)
                @php
                    $recPlan = $program->effectiveProgramPlan[0] ?? null;
                @endphp
                <a href="{{ route('programs.detail', $program->id) }}" class="pd-rec-card">
                    <p class="pd-rec-tag">Program</p>
                    <h3>{{ $program->programtitle }}</h3>
                    @if($program->subtitle)
                        <p>{{ \Illuminate\Support\Str::limit($program->subtitle, 120) }}</p>
                    @endif
                    @if($recPlan)
                        <span class="pd-rec-price">From ${{ $recPlan->amount }}</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
