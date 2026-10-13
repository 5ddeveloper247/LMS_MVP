@if(isset($faqs) && $faqs->count())
<section class="pd-faq-section">
    <div class="pd-container">
        <div class="pd-faq-header">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="pd-faq-list">
            @foreach($faqs as $faq)
                <details class="pd-faq-item">
                    <summary>{{ $faq->question }}</summary>
                    <div class="pd-faq-body ck-content">{!! $faq->answer !!}</div>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif
