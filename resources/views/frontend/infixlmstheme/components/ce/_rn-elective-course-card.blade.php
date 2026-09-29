@php
    /** @var \Modules\ContinuingEducation\Entities\CeCourse $course */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $summary = $ceCatalog->summary($course);
@endphp
<div class="ce-el-card">
    <a href="{{ $ceCatalog->catalogUrl($course) }}" class="ce-el-card-main">
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
    </a>
    <div class="ce-el-right">
        <p class="ce-el-price">{{ $ceCatalog->displayPrice($course) }}</p>
        @if ($ceCatalog->canPurchaseCourse($course))
            <a href="{{ $ceCatalog->cartUrl($course) }}" class="ce-el-add">Add to Cart</a>
        @endif
    </div>
</div>
