@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $cycleNote = $ceCatalog->courseCycleNote($course);
    $summary = $ceCatalog->summary($course);
    $detailUrl = $ceCatalog->catalogUrl($course);
@endphp
<div class="ce-mand-card">
    <div class="ce-mand-card-top">
        <div class="ce-mand-card-hours">
            {{ $ceCatalog->contactHoursCardValue($course) }}<small>{{ $ceCatalog->contactHoursCardUnit($course) }}</small>
        </div>
        <div class="ce-mand-card-price">@include(theme('partials.ce-course-price'), ['course' => $course])</div>
    </div>
    <div class="ce-mand-card-body">
        <h3>{{ $course->title }}</h3>
        @if ($summary)
            <p>{{ $summary }}</p>
        @endif
        @if ($cycleNote)
            <span class="ce-mand-card-cycle">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                {{ $cycleNote }}
            </span>
        @endif
    </div>
    <a href="{{ $detailUrl }}" class="ce-mand-card-btn">View Course</a>
</div>
