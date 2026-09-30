@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
@endphp
<a href="{{ $ceCatalog->catalogUrl($course) }}"
    class="ce-cat-card {{ $ceCatalog->isAprnAudience($course) ? 'aprn-only' : '' }}">
    <div class="ce-cat-card-info">
        <h4>{{ $course->title }}</h4>
        @if ($ceCatalog->summary($course))
            <p>{{ $ceCatalog->summary($course) }}</p>
        @endif
    </div>
    <div class="ce-cat-card-right">
        @if ($ceCatalog->contactHoursLabel($course))
            <p class="ce-cat-card-hours">{{ $ceCatalog->contactHoursLabel($course) }}</p>
        @endif
        <p class="ce-cat-card-price">@include(theme('partials.ce-course-price'), ['course' => $course])</p>
    </div>
</a>
