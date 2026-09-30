@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $summary = $ceCatalog->summary($course);
    $detailUrl = $ceCatalog->catalogUrl($course);
@endphp
<a href="{{ $detailUrl }}" class="ce-el-card">
    <div>
        <h4>{{ $course->title }}</h4>
        @if ($summary)
            <p>{{ $summary }}</p>
        @endif
        @if ($ceCatalog->contactHoursLabel($course))
            <div class="ce-el-meta">
                <span class="ce-el-hours">{{ $ceCatalog->contactHoursLabel($course) }}</span>
            </div>
        @endif
    </div>
    <div class="ce-el-right">
        <p class="ce-el-price">@include(theme('partials.ce-course-price'), ['course' => $course])</p>
        <span class="ce-el-add">View Course</span>
    </div>
</a>
