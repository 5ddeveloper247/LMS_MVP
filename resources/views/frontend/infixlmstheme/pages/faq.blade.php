@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('common.About') }}
@endsection

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
<style>
    :root {
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
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10)
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 80px
    }

    body {
        font-family: var(--sans) !important;
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased
    }

    h1,
    h2,
    h3,
    h4 {
        font-family: var(--serif) !important;
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest)
    }

    .breadcrumb {
        background: var(--cream-warm);
        padding: 12px 32px;
        font-size: 13px;
        color: var(--charcoal-soft)
    }

    .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto
    }

    .breadcrumb a {
        color: var(--teal-mid);
        text-decoration: none
    }

    .breadcrumb span {
        margin: 0 8px;
        opacity: 0.5
    }

    .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 80px 32px 90px;
        position: relative;
        overflow: hidden
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%
    }

    .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1
    }

    .hero-eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 24px;
        padding: 6px 16px;
        border: 1px solid var(--terracotta);
        border-radius: 30px
    }

    .hero h1 {
        font-size: clamp(38px, 5vw, 56px);
        color: var(--white);
        margin-bottom: 22px
    }

    .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400
    }

    .hero-sub {
        font-size: 18px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 640px;
        margin: 0 auto;
        font-family: var(--sans) !important;
        
    }

    /* Jump links */
    .jump-section {
        background: var(--white);
        padding: 40px 32px;
        border-bottom: 1px solid var(--gray-line)
    }

    .jump-inner {
        max-width: 820px;
        margin: 0 auto;
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap
    }

    .jump-link {
        background: var(--cream);
        border: 1px solid var(--gray-line);
        border-radius: 30px;
        padding: 8px 20px;
        font-size: 13px;
        font-weight: 500;
        color: var(--charcoal-soft);
        text-decoration: none;
        transition: all 0.2s
    }

    .jump-link:hover {
        background: var(--teal-darkest);
        color: var(--white);
        border-color: var(--teal-darkest)
    }

    /* FAQ categories */
    .faq-category {
        padding: 80px 32px
    }

    .faq-category:nth-child(odd) {
        background: var(--white)
    }

    .faq-category:nth-child(even) {
        background: var(--cream)
    }

    .faq-cat-header {
        max-width: 820px;
        margin: 0 auto 32px
    }

    .faq-cat-eyebrow {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 8px
    }

    .faq-cat-title {
        font-size: 28px;
        color: var(--teal-darkest)
    }

    .faq-list {
        max-width: 820px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 12px
    }

    .faq-item {
        background: var(--white);
        border-radius: 10px;
        border: 1px solid var(--gray-line);
        overflow: hidden
    }

    .faq-category:nth-child(even) .faq-item {
        background: var(--white)
    }

    .faq-item:hover {
        box-shadow: var(--shadow-sm)
    }

    .faq-item summary {
        padding: 20px 24px;
        font-weight: 600;
        font-size: 15px;
        color: var(--teal-darkest);
        cursor: pointer;
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px
    }

    .faq-item summary::-webkit-details-marker {
        display: none
    }

    .faq-item summary::after {
        content: '+';
        font-size: 22px;
        color: var(--terracotta);
        font-weight: 300;
        flex-shrink: 0
    }

    .faq-item[open] summary::after {
        content: '−'
    }

    .faq-item[open] summary {
        color: var(--terracotta)
    }

    .faq-body {
        padding: 0 24px 20px;
        font-size: 14.5px;
        line-height: 1.75;
        color: var(--charcoal-soft)
    }

    .faq-body a {
        color: var(--teal-mid);
        text-decoration: none;
        font-weight: 500
    }

    /* Still have questions */
    .contact-section {
        background: var(--white);
        padding: 80px 32px
    }

    .contact-card {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
        background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
        border-radius: 14px;
        padding: 48px;
        border: 1px solid var(--gray-line)
    }

    .contact-card h2 {
        font-size: 28px;
        color: var(--teal-darkest);
        margin-bottom: 12px
    }

    .contact-card p {
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        margin-bottom: 24px
    }

    .btn-primary {
        display: inline-block;
        background: var(--terracotta) !important;
        color: var(--white) !important;
        padding: 14px 32px !important;
        border-radius: 6px !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        transition: all 0.2s
    }

    .btn-primary:hover {
        background: var(--terracotta-deep) !important;
    }

    .contact-alt {
        display: block;
        margin-top: 14px;
        font-size: 13px;
        color: var(--charcoal-soft)
    }

    .contact-alt a {
        color: var(--teal-mid);
        text-decoration: none;
        font-weight: 600
    }

    .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        padding: 80px 32px;
        text-align: center;
        color: var(--white)
    }

    .final-cta h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        color: var(--white);
        margin-bottom: 18px
    }

    .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400
    }

    .final-cta p {
        font-size: 17px;
        color: var(--cream-warm);
        margin-bottom: 32px;
        max-width: 560px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7
    }

    .btn-on-teal {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white);
        padding: 14px 32px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600
    }
</style>

@section('mainContent')
    <div class="breadcrumb">
        <div class="breadcrumb-inner"><a href="{{url('/')}}">Home</a><span>›</span>FAQ</div>
    </div>

    <header class="hero">
        <div class="hero-inner"><span class="hero-eyebrow">FAQ</span>
            <h1>Questions? <em>We've got answers.</em></h1>
            <p class="hero-sub">Everything you need to know about Merkaii Xcellence Prep — our programs, the NCLEX,
                remediation, pricing, and how to get started.</p>
        </div>
    </header>

    @php
        $faqCategories = $categories ?? collect();
    @endphp

    @if($faqCategories->isNotEmpty())
        <div class="jump-section">
            <div class="jump-inner">
                @foreach($faqCategories as $category)
                    <a href="#{{ $category->slug }}" class="jump-link">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>

        @foreach($faqCategories as $category)
            <section class="faq-category" id="{{ $category->slug }}">
                <div class="faq-cat-header">
                    @if($category->eyebrow)
                        <p class="faq-cat-eyebrow">{{ $category->eyebrow }}</p>
                    @endif
                    <h2 class="faq-cat-title">{{ $category->section_title ?: $category->name }}</h2>
                </div>
                <div class="faq-list">
                    @foreach($category->faqs as $faq)
                        <details class="faq-item">
                            <summary>{{ $faq->question }}</summary>
                            <div class="faq-body">{!! $faq->answer !!}</div>
                        </details>
                    @endforeach
                </div>
            </section>
        @endforeach
    @else
        <section class="faq-category">
            <div class="faq-cat-header">
                <h2 class="faq-cat-title">FAQ</h2>
            </div>
            <div class="faq-list">
                <p class="faq-body" style="text-align:center;padding:24px;">No FAQs are published yet. Please check back soon.</p>
            </div>
        </section>
    @endif

    <!-- Still have questions -->
    <section class="contact-section">
        <div class="contact-card">
            <h2>Still have questions?</h2>
            <p>We're happy to help. Schedule a free consultation or send us a message — no pressure, no sales pitch, just
                honest answers.</p>
            <a href="{{ route('contact-us') }}" class="btn-primary">Schedule a Free Consultation →</a>
            <p class="contact-alt">Or email us at <a
                    href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a>
            </p>
        </div>
    </section>

    <section class="final-cta">
        <h2>Ready to get started? <em>We're here.</em></h2>
        <p>Every student's path is different. Let us help you find yours.</p><a href="{{ route('contact-us') }}"
            class="btn-on-teal">Book
            a Free Consultation →</a>
    </section>



    @include(theme('partials._custom_footer'))
@endsection
