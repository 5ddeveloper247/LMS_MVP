@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Success Stories') }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
    .mxp-success {
        --teal-mid: #1A8A6F;
        --teal-deep: #0F6E56;
        --teal-darkest: #0A4D3C;
        --terracotta: #C65D3A;
        --terracotta-deep: #A84B2D;
        --cream: #F5EDE0;
        --cream-warm: #EFE3D0;
        --charcoal: #2B2B2B;
        --charcoal-soft: #4A4A4A;
        --white: #FFFFFF;
        --gray-line: #E8DFD0;
        --serif: 'Playfair Display', Georgia, serif;
        --sans: 'Montserrat', system-ui, sans-serif;
        --shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
        --shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    .mxp-success h1,
    .mxp-success h2,
    .mxp-success h3,
    .mxp-success h4 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    .mxp-success .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .mxp-success .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto;
    }

    .mxp-success .breadcrumb a {
        color: var(--teal-mid);
        text-decoration: none;
    }

    .mxp-success .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .mxp-success .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 90px 32px 100px;
        position: relative;
        overflow: hidden;
    }

    .mxp-success .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .mxp-success .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .mxp-success .hero-eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 24px;
        padding: 6px 16px;
        border: 1px solid var(--terracotta);
        border-radius: 30px;
    }

    .mxp-success .hero h1 {
        font-size: clamp(38px, 5vw, 58px);
        color: var(--white);
        margin-bottom: 22px;
    }

    .mxp-success .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-success .hero-sub {
        font-size: 18px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 660px;
        margin: 0 auto;
    }

    .mxp-success .section-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .mxp-success .section-title {
        font-size: clamp(30px, 4vw, 44px);
        color: var(--teal-darkest);
        margin-bottom: 14px;
    }

    .mxp-success .section-header {
        text-align: center;
        margin-bottom: 56px;
    }

    .mxp-success .stats-band {
        background: var(--teal-mid);
        padding: 60px 32px;
        color: var(--white);
        border-top: 4px solid var(--terracotta);
        border-bottom: 4px solid var(--terracotta);
    }

    .mxp-success .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        max-width: 1080px;
        margin: 0 auto;
        text-align: center;
    }

    .mxp-success .stat-num {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 48px;
        color: var(--white);
        line-height: 1;
        margin-bottom: 8px;
    }

    .mxp-success .stat-label {
        font-size: 12px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--cream);
        font-weight: 500;
    }

    .mxp-success .featured-section {
        background: var(--white);
        padding: 100px 32px;
    }

    .mxp-success .featured-card {
        max-width: 900px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 48px;
        background: var(--cream);
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--gray-line);
    }

    .mxp-success .featured-photo {
        background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-darkest) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        font-family: var(--serif);
        font-style: italic;
        font-size: 15px;
        text-align: center;
        padding: 32px;
        min-height: 280px;
        background-size: cover;
        background-position: center;
    }

    .mxp-success .featured-photo.has-image {
        padding: 0;
    }

    .mxp-success .stories-empty {
        text-align: center;
        max-width: 520px;
        margin: 0 auto;
        font-size: 16px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-success .stories-filter-empty {
        display: none;
        text-align: center;
        max-width: 520px;
        margin: 24px auto 0;
        font-size: 16px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .mxp-success .stories-filter-empty.is-visible {
        display: block;
    }

    .mxp-success .featured-content {
        padding: 40px 40px 40px 0;
    }

    .mxp-success .featured-badge {
        display: inline-block;
        font-size: 10px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--white);
        background: var(--terracotta);
        padding: 4px 12px;
        border-radius: 30px;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .mxp-success .featured-quote {
        font-family: var(--serif);
        font-style: italic;
        font-size: 20px;
        line-height: 1.6;
        color: var(--teal-deep);
        margin-bottom: 20px;
    }

    .mxp-success .featured-attr {
        font-size: 14px;
        color: var(--charcoal-soft);
        line-height: 1.6;
    }

    .mxp-success .featured-name {
        font-weight: 700;
        color: var(--teal-deep);
    }

    .mxp-success .featured-outcome {
        display: inline-block;
        margin-top: 12px;
        background: var(--white);
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        color: var(--teal-mid);
    }

    .mxp-success .stories-section {
        background: var(--cream);
        padding: 100px 32px;
    }

    .mxp-success .filter-tabs {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 48px;
    }

    .mxp-success .filter-tab {
        background: var(--white);
        border: 1px solid var(--gray-line);
        border-radius: 30px;
        padding: 8px 20px;
        font-family: var(--sans);
        font-size: 13px;
        font-weight: 500;
        color: var(--charcoal-soft);
        cursor: pointer;
        transition: all 0.2s;
    }

    .mxp-success .filter-tab:hover {
        border-color: var(--teal-mid);
        color: var(--teal-mid);
    }

    .mxp-success .filter-tab.active {
        background: var(--teal-darkest);
        color: var(--white);
        border-color: var(--teal-darkest);
    }

    .mxp-success .stories-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 28px;
        max-width: 1080px;
        margin: 0 auto;
    }

    .mxp-success .story-card {
        background: var(--white);
        border-radius: 12px;
        padding: 36px 32px;
        border-left: 4px solid var(--terracotta);
        transition: all 0.2s;
    }

    .mxp-success .story-card:hover {
        box-shadow: var(--shadow-md);
    }

    .mxp-success .story-program {
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 12px;
    }

    .mxp-success .story-quote {
        font-family: var(--serif);
        font-style: italic;
        font-size: 16px;
        line-height: 1.65;
        color: var(--charcoal);
        margin-bottom: 18px;
    }

    .mxp-success .story-attr {
        font-size: 13px;
        color: var(--charcoal-soft);
        line-height: 1.6;
    }

    .mxp-success .story-name {
        font-weight: 700;
        color: var(--teal-deep);
    }

    .mxp-success .story-outcome {
        font-size: 12px;
        color: var(--teal-mid);
        font-weight: 600;
        margin-top: 4px;
    }

    .mxp-success .submit-section {
        background: var(--white);
        padding: 80px 32px;
    }

    .mxp-success .submit-card {
        max-width: 760px;
        margin: 0 auto;
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
        border-radius: 14px;
        padding: 48px;
        text-align: center;
        border: 1px solid var(--gray-line);
    }

    .mxp-success .submit-card h2 {
        font-size: 30px;
        color: var(--teal-darkest);
        margin-bottom: 12px;
    }

    .mxp-success .submit-card > p {
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 28px;
        max-width: 520px;
        margin-left: auto;
        margin-right: auto;
    }

    .mxp-success .story-form {
        text-align: left;
        margin-top: 8px;
    }

    .mxp-success .story-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px 20px;
    }

    .mxp-success .story-form-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .mxp-success .story-form-field.full {
        grid-column: 1 / -1;
    }

    .mxp-success .story-form-field label {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: var(--teal-darkest);
    }

    .mxp-success .story-form-field input,
    .mxp-success .story-form-field select,
    .mxp-success .story-form-field textarea {
        width: 100%;
        border: 1px solid var(--gray-line);
        border-radius: 8px;
        background: var(--white);
        padding: 12px 14px;
        font-family: var(--sans);
        font-size: 14px;
        color: var(--charcoal);
        outline: none;
        transition: border-color 0.2s;
    }

    .mxp-success .story-form-field textarea {
        min-height: 140px;
        resize: vertical;
    }

    .mxp-success .story-form-field input:focus,
    .mxp-success .story-form-field select:focus,
    .mxp-success .story-form-field textarea:focus {
        border-color: var(--teal-mid);
    }

    .mxp-success .story-form-field .field-error {
        font-size: 12px;
        color: var(--terracotta);
    }

    .mxp-success .story-form-actions {
        margin-top: 24px;
        text-align: center;
    }

    .mxp-success .story-form-actions .btn-primary {
        border: none;
        cursor: pointer;
    }

    .mxp-success .story-form-note {
        margin-top: 14px;
        font-size: 12px;
        color: var(--charcoal-soft);
        text-align: center;
    }

    .mxp-success .btn-primary {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white);
        padding: 14px 32px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-success .btn-primary:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        color: var(--white);
    }

    .mxp-success .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 80px 32px;
        text-align: center;
        color: var(--white);
    }

    .mxp-success .final-cta h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        color: var(--white);
        margin-bottom: 18px;
    }

    .mxp-success .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .mxp-success .final-cta p {
        font-size: 17px;
        color: var(--cream-warm);
        margin-bottom: 32px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    .mxp-success .btn-on-teal {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white);
        padding: 14px 32px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .mxp-success .btn-on-teal:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        color: var(--white);
    }

    @media (max-width: 900px) {
        .mxp-success .hero {
            padding: 70px 24px 80px;
        }

        .mxp-success .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .mxp-success .featured-card {
            grid-template-columns: 1fr;
        }

        .mxp-success .featured-photo {
            min-height: 200px;
        }

        .mxp-success .featured-content {
            padding: 32px;
        }

        .mxp-success .stories-grid {
            grid-template-columns: 1fr;
        }

        .mxp-success .story-form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('mainContent')
    <div class="mxp-success">
        <div class="breadcrumb">
            <div class="breadcrumb-inner">
                <a href="{{ url('/') }}">Home</a><span>›</span>Success Stories
            </div>
        </div>

        <header class="hero">
            <div class="hero-inner">
                <span class="hero-eyebrow">Real Students. Real Outcomes.</span>
                <h1>Trusted by Nurses Who <em>Almost Gave Up.</em></h1>
                <p class="hero-sub">Every story here is from a real student who walked through our doors unsure if
                    they'd ever practice nursing — and walked out with a passing score, a license, or a second chance.
                </p>
            </div>
        </header>

        <section class="stats-band">
            <div class="stats-grid">
                <div>
                    <p class="stat-num">1,500+</p>
                    <p class="stat-label">Students Served</p>
                </div>
                <div>
                    <p class="stat-num">95%</p>
                    <p class="stat-label">Pass Rate</p>
                </div>
                <div>
                    <p class="stat-num">13</p>
                    <p class="stat-label">Years Teaching</p>
                </div>
                <div>
                    <p class="stat-num">100%</p>
                    <p class="stat-label">FL BON Approved</p>
                </div>
            </div>
        </section>

        @if ($featured)
            <section class="featured-section">
                <div class="section-header">
                    <p class="section-eyebrow">Featured Story</p>
                    <h2 class="section-title">From three failures to 75 questions.</h2>
                </div>
                <div class="featured-card">
                    @php
                        $featuredImage = $featured->image ? getTestimonialImage($featured->image) : null;
                        $featuredProgram = $programTypes[$featured->program_type] ?? $featured->profession;
                    @endphp
                    <div class="featured-photo {{ $featuredImage ? 'has-image' : '' }}"
                        @if ($featuredImage) style="background-image: url('{{ $featuredImage }}');" @endif>
                        @unless ($featuredImage)
                            Student photo<br>coming soon
                        @endunless
                    </div>
                    <div class="featured-content">
                        @if ($featuredProgram)
                            <span class="featured-badge">{{ $featuredProgram }}</span>
                        @endif
                        <p class="featured-quote">"{{ $featured->body }}"</p>
                        <p class="featured-attr">
                            @if ($featured->author)
                                <span class="featured-name">{{ $featured->author }}</span>
                            @endif
                            @if ($featured->passing_year)
                                <br>Passed {{ $featured->passing_year }}
                            @endif
                        </p>
                    </div>
                </div>
            </section>
        @endif

        <section class="stories-section">
            <div class="section-header">
                <p class="section-eyebrow">All Stories</p>
                <h2 class="section-title">More comebacks.</h2>
            </div>
            @if ($gridStories->isNotEmpty())
                <div class="filter-tabs" id="success-stories-filters">
                    <button type="button" class="filter-tab active" data-filter="all">All Programs</button>
                    @foreach ($programTypes as $typeKey => $typeLabel)
                        <button type="button" class="filter-tab" data-filter="{{ $typeKey }}">{{ $typeLabel }}</button>
                    @endforeach
                </div>
                <div class="stories-grid" id="success-stories-grid">
                    @foreach ($gridStories as $story)
                        @php
                            $storyProgram = $programTypes[$story->program_type] ?? $story->profession;
                        @endphp
                        <div class="story-card" data-filters="{{ $story->program_type }}">
                            @if ($storyProgram)
                                <p class="story-program">{{ $storyProgram }}</p>
                            @endif
                            <p class="story-quote">"{{ $story->body }}"</p>
                            <p class="story-attr">
                                @if ($story->author)
                                    <span class="story-name">{{ $story->author }}</span>
                                @endif
                                @if ($story->passing_year)
                                    <br>Passed {{ $story->passing_year }}
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
                <p class="stories-filter-empty" id="success-stories-empty" aria-live="polite">
                    No records found for this category.
                </p>
            @elseif (!$featured)
                <p class="stories-empty">{{ __('Success stories from our students will appear here soon.') }}</p>
            @endif
        </section>

        <section class="submit-section" id="share-story">
            <div class="submit-card">
                <p class="section-eyebrow">Share Yours</p>
                <h2>Passed? Tell us about it.</h2>
                <p>If Merkaii helped you pass the NCLEX, complete remediation, survive nursing school, or get your career
                    back — we'd love to hear your story. With your permission, we'll share it to encourage the next
                    student who needs to know it's possible.</p>

                <form class="story-form" method="POST" action="{{ route('successStories.store') }}">
                    @csrf
                    <div class="story-form-grid">
                        <div class="story-form-field">
                            <label for="story_name">Name *</label>
                            <input type="text" id="story_name" name="name" value="{{ old('name') }}" required maxlength="191">
                            @error('name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="story-form-field">
                            <label for="story_email">Email *</label>
                            <input type="email" id="story_email" name="email" value="{{ old('email') }}" required maxlength="255">
                            @error('email')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="story-form-field">
                            <label for="story_passing_year">Passing Year *</label>
                            <input type="text" id="story_passing_year" name="passing_year" value="{{ old('passing_year') }}"
                                   placeholder="e.g. 2024" required maxlength="10">
                            @error('passing_year')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="story-form-field">
                            <label for="story_program_type">Program *</label>
                            <select id="story_program_type" name="program_type" required>
                                <option value="">Select program</option>
                                @foreach ($programTypes as $typeKey => $typeLabel)
                                    <option value="{{ $typeKey }}" {{ old('program_type') === $typeKey ? 'selected' : '' }}>
                                        {{ $typeLabel }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_type')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="story-form-field full">
                            <label for="story_body">Your Story *</label>
                            <textarea id="story_body" name="story" required maxlength="5000"
                                      placeholder="Share what you overcame and how Merkaii helped...">{{ old('story') }}</textarea>
                            @error('story')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="story-form-actions">
                        <button type="submit" class="btn-primary">Submit Your Story →</button>
                    </div>
                    <p class="story-form-note">Your story is reviewed by our team before it appears on this page.</p>
                </form>
            </div>
        </section>

        <section class="final-cta">
            <h2>Ready to write <em>your comeback story?</em></h2>
            <p>Every story on this page started with a free consultation. Yours can too.</p>
            <a href="{{ route('contact') }}" class="btn-on-teal">Schedule a Free Consultation →</a>
        </section>
    </div>

    <script>
        (function () {
            var filterRoot = document.getElementById('success-stories-filters');
            var grid = document.getElementById('success-stories-grid');
            var emptyMsg = document.getElementById('success-stories-empty');
            if (!filterRoot || !grid) {
                return;
            }

            function updateEmptyState() {
                if (!emptyMsg) {
                    return;
                }
                var hasVisible = false;
                grid.querySelectorAll('.story-card').forEach(function (card) {
                    if (card.style.display !== 'none') {
                        hasVisible = true;
                    }
                });
                emptyMsg.classList.toggle('is-visible', !hasVisible);
            }

            filterRoot.addEventListener('click', function (e) {
                var tab = e.target.closest('.filter-tab');
                if (!tab) {
                    return;
                }
                var filter = tab.getAttribute('data-filter');
                filterRoot.querySelectorAll('.filter-tab').forEach(function (btn) {
                    btn.classList.toggle('active', btn === tab);
                });
                grid.querySelectorAll('.story-card').forEach(function (card) {
                    if (filter === 'all') {
                        card.style.display = '';
                        return;
                    }
                    var tags = (card.getAttribute('data-filters') || '').trim();
                    card.style.display = tags === filter ? '' : 'none';
                });
                updateEmptyState();
            });
        })();
    </script>

    @include(theme('partials._custom_footer'))
@endsection
