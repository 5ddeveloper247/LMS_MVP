@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $summary = $ceCatalog->summary($course, 80);
    $cycleNote = $ceCatalog->courseCycleNote($course);
    $description = $summary ?: $cycleNote;
    $detailUrl = $ceCatalog->catalogUrl($course);
@endphp
<a href="{{ $detailUrl }}"
    class="ce-mand-card {{ $ceCatalog->isAprnSpecificCourse($course) ? 'aprn-specific' : '' }}">
    <div class="ce-mc-info">
        <h4>{{ $course->title }}</h4>
        @if ($description)
            <p>{{ $description }}</p>
        @endif
    </div>
    <div class="ce-mc-right">
        @if ($ceCatalog->contactHoursLabel($course))
            <p class="ce-mc-hours">{{ $ceCatalog->contactHoursLabel($course) }}</p>
        @endif
        <p class="ce-mc-price">@include(theme('partials.ce-course-price'), ['course' => $course])</p>
        <span class="ce-mc-add">View Course</span>
    </div>
</a>
