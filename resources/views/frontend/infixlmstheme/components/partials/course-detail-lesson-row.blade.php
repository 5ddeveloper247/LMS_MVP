@php
    $isLocked = (int) $lesson->is_lock === 1;
    $canAccess = !$isLocked || $studentIsEnrolled;
    $isQuiz = (int) $lesson->is_quiz === 1;
    $fsProgramId = (int) ($request->program_id ?? 0);
    $fsCourseType = (int) ($request->courseType ?? 0);
    $fsPlanId = (int) ($enrollmentRecord->plan_id ?? optional($enrollmentRecord->plan ?? null)->id ?? 0);
    $fsArgs = $course->id . ', ' . $lesson->id . ', ' . $fsProgramId . ', ' . $fsCourseType;
    if ($fsPlanId > 0) {
        $fsArgs .= ', ' . $fsPlanId;
    }
    $fsOnClick = 'goFullScreen(' . $fsArgs . ')';
    $actionLabel = $isQuiz
        ? __('frontend.Start')
        : ($isLocked ? __('common.View') : __('frontend.Preview'));
@endphp

<div class="lesson-row">
    <div class="lesson-row-main">
        @if ($canAccess)
            @if ($isQuiz)
                <span class="lesson-icon lesson-icon--quiz" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                </span>
            @else
                <span class="lesson-icon lesson-icon--play" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                </span>
            @endif
            <span class="lesson-name is-clickable" onclick="{{ $fsOnClick }}" role="button" tabindex="0">
                {{ $lessonNumber }}. {{ $lesson->name }}@if ($isQuiz) <span class="lesson-tag">Quiz</span>@endif
            </span>
        @else
            <span class="lesson-icon lesson-icon--lock" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </span>
            <span class="lesson-name is-locked">
                {{ $lessonNumber }}. {{ $lesson->name }}@if ($isQuiz) <span class="lesson-tag">Quiz</span>@endif
            </span>
        @endif
    </div>

    @if ($canAccess)
        <button type="button" class="lesson-action-btn {{ $isLocked ? '' : 'is-preview' }}" onclick="{{ $fsOnClick }}">
            {{ $actionLabel }}
        </button>
    @endif
</div>
