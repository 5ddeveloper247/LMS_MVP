@if(!empty($programReview))
<section class="pd-reviews-section">
    <div class="pd-container">
        <div class="pd-reviews-header">
            <h2>What Students Are Saying</h2>
        </div>
        <div class="pd-review-card">
            @php
                $stars = (int) ($programReview->star ?? 0);
            @endphp
            <div class="mb-2">
                @for($i = 0; $i < $stars; $i++)
                    <i class="fas fa-star" style="color: var(--pd-gold-star);"></i>
                @endfor
                @for($i = $stars; $i < 5; $i++)
                    <i class="far fa-star" style="color: var(--pd-gold-star);"></i>
                @endfor
            </div>
            <p class="pd-review-text">{{ $programReview->comment }}</p>
            <p class="mb-0 mt-3" style="font-size: 14px; font-weight: 600; color: var(--pd-teal-darkest);">
                {{ $programReview->user->name ?? __('Student') }}
                @if(!empty($programReview->course->title))
                    · {{ $programReview->course->title }}
                @endif
            </p>
        </div>
    </div>
</section>
@endif
