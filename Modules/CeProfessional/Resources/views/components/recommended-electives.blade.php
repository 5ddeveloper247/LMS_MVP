<section class="ce-section ce-electives-section">
    @include('ceprofessional::components.section-header', [
        'title' => 'Recommended Electives for You',
        'link' => url('/prep-courses'),
        'linkLabel' => 'Browse All →',
    ])

    <div class="ce-electives-grid">
        @foreach ($recommended_electives as $elective)
            @include('ceprofessional::components.elective-card', ['elective' => $elective])
        @endforeach
    </div>
</section>
