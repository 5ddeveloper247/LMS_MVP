@if(isset($courses) && $courses->count())
<section class="pd-courses-section">
    <div class="pd-container">
        <div class="pd-courses-header">
            <h2>Courses in This Program</h2>
            <p class="text-muted">These courses are included in {{ $program_detail->programtitle }}.</p>
        </div>
        <div class="pd-courses-grid">
            @foreach($courses as $course)
                @php
                    $courseUrl = ($is_allow ?? false)
                        ? courseDetailsUrl($course->id, $course->type, $course->slug) . '?program_id=' . $program_detail->id
                        : 'javascript:void(0)';
                @endphp
                <a href="{{ $courseUrl }}" class="pd-course-card">
                    <div class="pd-course-card-img">
                        <img src="{{ getCourseImage($course->thumbnail ?? $course->image) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="pd-course-card-body">
                        <h3>{{ $course->title }}</h3>
                        @if(!empty($course->about))
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($course->about), 120) }}</p>
                        @endif
                        <div class="pd-course-card-footer">
                            <span class="pd-course-card-price">${{ $course->price ?? $course->discount_price ?? '—' }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
