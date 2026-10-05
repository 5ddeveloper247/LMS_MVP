@extends('ceprofessional::layouts.dashboard')

@section('mainContent')
@php
    $formatHours = function ($hours) {
        return rtrim(rtrim(number_format((float) $hours, 1, '.', ''), '0'), '.');
    };
@endphp
<div class="ce-portal-section">
    <div class="mb-4">
        <a href="{{ route('cePortal.courses') }}" class="text-muted">&larr; Back to My Courses</a>
        <h3 class="mt-2 mb-1">{{ $bundle->name ?? $purchase->item_name }}</h3>
        <p class="text-muted mb-0">
            Choose additional electives anytime. Admin-included electives stay locked.
            @if ($electiveHoursAllowed > 0)
                Elective progress:
                <strong>{{ $formatHours($enrolledElectiveHours) }}h</strong>
                / {{ $formatHours($electiveHoursAllowed) }}h
                @if ($remainingElectiveHours > 0)
                    ({{ $formatHours($remainingElectiveHours) }}h remaining)
                @endif
            @endif
        </p>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-3">Mandatory (included)</h5>
            @forelse ($mandatoryCourses as $course)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <strong>{{ $course->title }}</strong>
                        <div class="small text-muted">{{ $ceCatalog->summary($course, 100) }}</div>
                    </div>
                    <div class="text-right">
                        <div class="small">{{ $formatHours($course->contact_hours) }}h</div>
                        @if ($course->slug)
                            <a href="{{ $ceCatalog->catalogUrl($course) }}" target="_blank" rel="noopener">View</a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-muted mb-0">No mandatory courses found.</p>
            @endforelse
        </div>
    </div>

    @if ($lockedElectiveCourses->isNotEmpty() || $enrolledElectiveItems->isNotEmpty())
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="mb-3">Included / selected electives</h5>
                @foreach ($lockedElectiveCourses as $course)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <strong>{{ $course->title }}</strong>
                            <div class="small text-muted">Admin included · locked</div>
                        </div>
                        <div class="small">{{ $formatHours($course->contact_hours) }}h</div>
                    </div>
                @endforeach
                @foreach ($enrolledElectiveItems as $item)
                    @if ($lockedElectiveCourses->contains('id', $item->ce_course_id))
                        @continue
                    @endif
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <div>
                            <strong>{{ $item->course_title }}</strong>
                            <div class="small text-muted">Already in your package</div>
                        </div>
                        <div class="small">{{ $formatHours($item->contact_hours) }}h</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Add more electives</h5>
            @if ($optionalElectiveCourses->isEmpty())
                <p class="text-muted mb-0">No additional elective courses are available right now.</p>
            @else
                <form method="POST" action="{{ route('cePortal.bundles.electives', $purchase->id) }}">
                    @csrf
                    @foreach ($optionalElectiveCourses as $course)
                        <label class="d-flex justify-content-between align-items-center border-bottom py-2" style="cursor:pointer;">
                            <div class="d-flex align-items-start">
                                <input type="checkbox" name="elective_course_ids[]" value="{{ $course->id }}" class="mt-1 mr-2">
                                <div>
                                    <strong>{{ $course->title }}</strong>
                                    <div class="small text-muted">{{ $ceCatalog->summary($course, 100) }}</div>
                                    @if ($course->slug)
                                        <a href="{{ $ceCatalog->catalogUrl($course) }}" target="_blank" rel="noopener" onclick="event.stopPropagation()">View details</a>
                                    @endif
                                </div>
                            </div>
                            <div class="small ml-3">{{ $formatHours($course->contact_hours) }}h</div>
                        </label>
                    @endforeach
                    <button type="submit" class="theme_btn mt-3">Add Selected Electives</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
