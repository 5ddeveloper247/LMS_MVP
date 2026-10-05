@extends('ceprofessional::layouts.dashboard')

@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Merkaii Xcellence Prep' }} | My CE Courses
@endsection

@section('mainContent')
    @include('ceprofessional::components.section-header', [
        'title' => 'My Courses & Bundles',
        'link' => route('continuingEducationRnLpn'),
        'linkLabel' => 'Browse CE Catalog →',
    ])

    @php
        $activeView = $activeView ?? 'courses';
        $courses = $courses ?? [];
        $purchasedBundles = $purchasedBundles ?? [];
    @endphp

    <section class="ce-tabs-panel mb-4">
        <div class="ce-tabs-nav" role="tablist">
            <button type="button"
                class="ce-tab-btn {{ $activeView === 'courses' ? 'active' : '' }}"
                data-ce-tab="ce-main-courses"
                role="tab"
                aria-selected="{{ $activeView === 'courses' ? 'true' : 'false' }}">
                My Courses
            </button>
            <button type="button"
                class="ce-tab-btn {{ $activeView === 'bundles' ? 'active' : '' }}"
                data-ce-tab="ce-main-bundles"
                role="tab"
                aria-selected="{{ $activeView === 'bundles' ? 'true' : 'false' }}">
                My Bundles
            </button>
        </div>

        <div class="ce-tab-panels">
            <div class="ce-tab-panel {{ $activeView === 'courses' ? 'active' : '' }}" id="ce-main-courses" role="tabpanel">
                @if (count($courses) > 0)
                    <div class="ce-course-list mt-3">
                        @foreach ($courses as $course)
                            @include('ceprofessional::components.active-course-card', ['course' => $course])
                        @endforeach
                    </div>
                @else
                    @include('ceprofessional::components.empty-state', [
                        'title' => 'No courses yet',
                        'message' => 'Courses from individual purchases and bundles will appear here with launch and progress tracking.',
                        'buttonLabel' => 'Browse CE Courses',
                        'buttonUrl' => route('continuingEducationRnLpn'),
                    ])
                @endif
            </div>

            <div class="ce-tab-panel {{ $activeView === 'bundles' ? 'active' : '' }}" id="ce-main-bundles" role="tabpanel">
                @if (count($purchasedBundles) > 0)
                    <div class="ce-course-list mt-3">
                        @foreach ($purchasedBundles as $bundle)
                            <article class="ce-course-card">
                                <div class="ce-course-card-top">
                                    <div>
                                        <h3>{{ $bundle['name'] }}</h3>
                                        <p class="ce-course-meta">
                                            {{ $bundle['mandatory_count'] }} mandatory course{{ $bundle['mandatory_count'] === 1 ? '' : 's' }}
                                            @if ((float) ($bundle['allowed_hours'] ?? 0) > 0)
                                                · {{ $bundle['enrolled_elective_hours'] }}h / {{ $bundle['allowed_hours'] }}h electives chosen
                                            @endif
                                            @if (! empty($bundle['purchased_label']))
                                                · Purchased {{ $bundle['purchased_label'] }}
                                            @endif
                                        </p>
                                        @if ($bundle['needs_electives'])
                                            <p class="ce-course-meta" style="color: var(--ce-terracotta, #C65D3A); margin-top: 6px;">
                                                {{ $bundle['remaining_hours'] }}h elective hours still available to choose.
                                            </p>
                                        @endif
                                    </div>
                                    @if ($bundle['needs_electives'])
                                        <span class="ce-course-badge ce-course-badge-in-progress">Action needed</span>
                                    @else
                                        <span class="ce-course-badge ce-course-badge-completed">Complete</span>
                                    @endif
                                </div>
                                <div class="ce-course-card-actions">
                                    <a href="{{ $bundle['url'] }}" class="ce-btn ce-btn-accent">
                                        {{ $bundle['needs_electives'] ? 'Choose Electives' : 'View Bundle' }}
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    @include('ceprofessional::components.empty-state', [
                        'title' => 'No bundles yet',
                        'message' => 'When you purchase a CE bundle, it will appear here so you can finish elective selection and track your package.',
                        'buttonLabel' => 'Browse CE Bundles',
                        'buttonUrl' => route('continuingEducationRnLpn'),
                    ])
                @endif
            </div>
        </div>
    </section>
@endsection
