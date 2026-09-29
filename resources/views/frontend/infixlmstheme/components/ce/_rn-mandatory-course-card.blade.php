@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $cycleNote = $ceCatalog->courseCycleNote($course);
    $summary = $ceCatalog->summary($course);
@endphp
<div class="ce-mand-card">
    <div class="ce-mand-card-top">
        <div class="ce-mand-card-hours">
            {{ $ceCatalog->contactHoursCardValue($course) }}<small>{{ $ceCatalog->contactHoursCardUnit($course) }}</small>
        </div>
        <div class="ce-mand-card-price">{{ $ceCatalog->displayPrice($course) }}</div>
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
    @if ($ceCatalog->canPurchaseCourse($course))
        <a href="{{ $ceCatalog->cartUrl($course) }}" class="ce-mand-card-btn">Add to Cart</a>
    @else
        <a href="{{ $ceCatalog->catalogUrl($course) }}" class="ce-mand-card-btn">View Course</a>
    @endif
</div>
