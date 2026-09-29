@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $summary = $ceCatalog->summary($course, 80);
    $cycleNote = $ceCatalog->courseCycleNote($course);
    $description = $summary ?: $cycleNote;
@endphp
<div class="ce-mand-card {{ $ceCatalog->isAprnSpecificCourse($course) ? 'aprn-specific' : '' }}">
    <a href="{{ $ceCatalog->catalogUrl($course) }}" class="ce-mc-info">
        <h4>{{ $course->title }}</h4>
        @if ($description)
            <p>{{ $description }}</p>
        @endif
    </a>
    <div class="ce-mc-right">
        @if ($ceCatalog->contactHoursLabel($course))
            <p class="ce-mc-hours">{{ $ceCatalog->contactHoursLabel($course) }}</p>
        @endif
        <p class="ce-mc-price">{{ $ceCatalog->displayPrice($course) }}</p>
        @if ($ceCatalog->canPurchaseCourse($course))
            <a href="{{ $ceCatalog->cartUrl($course) }}" class="ce-mc-add">Add to Cart</a>
        @endif
    </div>
</div>
