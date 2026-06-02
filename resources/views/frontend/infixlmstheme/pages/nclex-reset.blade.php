@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('frontendmanage.Home') }}
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
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
        --shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 80px;
    }

    body {
        font-family: var(--sans);
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    h1,
    h2,
    h3,
    h4 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    /* ============ HERO ============ */
    .hero {
        background: linear-gradient(165deg, var(--teal-darkest) 0%, var(--teal-deep) 40%, var(--teal-mid) 100%);
        padding: 80px 32px 100px;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-inner {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .hero-content {}

    .hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: var(--cream);
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 30px;
        margin-bottom: 24px;
    }

    .hero h1 {
        font-size: clamp(32px, 4.5vw, 52px);
        color: var(--white);
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .hero h1 em {
        color: var(--terracotta);
        display: block;
        font-size: 0.85em;
    }

    .hero-sub {
        color: rgba(255, 255, 255, 0.85);
        font-size: 17px;
        line-height: 1.7;
        margin-bottom: 32px;
        max-width: 480px;
        font-family: var(--sans);
    }

    .hero-quote {
        color: rgba(255, 255, 255, 0.65);
        font-family: var(--serif);
        font-style: italic;
        font-size: 15px;
        border-left: 3px solid var(--terracotta);
        padding-left: 16px;
        margin-bottom: 36px;
    }

    .hero-stats {
        display: flex;
        gap: 32px;
        margin-bottom: 36px;
    }

    .hero-stat-item {
        text-align: left;
    }

    .hero-stat-num {
        font-family: var(--serif);
        font-size: 28px;
        font-weight: 700;
        color: var(--white);
    }

    .hero-stat-label {
        font-size: 12px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.6);
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Product image area */
    .hero-visual {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .planner-mockup {
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
        padding: 40px 36px;
        max-width: 420px;
        width: 100%;
        text-align: center;
        position: relative;
    }

    .planner-mockup::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 10%;
        right: 10%;
        height: 16px;
        background: rgba(10, 77, 60, 0.15);
        border-radius: 50%;
        filter: blur(8px);
    }

    .planner-mockup-eyebrow {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--teal-mid);
        margin-bottom: 12px;
        font-family: var(--sans);
    }

    .planner-mockup h3 {
        font-size: 24px;
        color: var(--teal-darkest);
        margin-bottom: 8px;
    }

    .planner-mockup-sub {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin-bottom: 24px;
        line-height: 1.5;
        font-family: var(--sans);
    }

    .planner-mockup-image {
        width: 100%;
        aspect-ratio: 3/4;
        background: linear-gradient(135deg, var(--cream-warm) 0%, var(--cream) 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--charcoal-soft);
        font-size: 14px;
        font-style: italic;
        border: 2px dashed var(--gray-line);
        margin-bottom: 20px;
    }

    .planner-mockup-format {
        font-size: 12px;
        color: var(--charcoal-soft);
        font-weight: 500;
        font-family: var(--sans);
    }

    .planner-mockup-format strong {
        color: var(--teal-deep);
    }

    /* ============ PURCHASE STRIP ============ */
    .purchase-strip {
        background: var(--white);
        border-top: 3px solid var(--terracotta);
        padding: 40px 32px;
    }

    .purchase-inner {
        max-width: 800px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
    }

    .purchase-pricing {}

    .price-early {
        display: flex;
        align-items: baseline;
        gap: 12px;
        margin-bottom: 4px;
    }

    .price-current {
        font-family: var(--serif);
        font-size: 42px;
        font-weight: 800;
        color: var(--teal-darkest);
    }

    .price-original {
        font-size: 20px;
        color: var(--charcoal-soft);
        text-decoration: line-through;
        opacity: 0.5;
    }

    .price-save {
        background: var(--terracotta);
        color: var(--white);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 4px;
        display: none;
    }

    .price-save.active {
        display: inline-block;
    }

    .price-note {
        font-size: 13px;
        color: var(--charcoal-soft);
        margin-top: 4px;
        font-family: var(--sans);
    }

    .price-note em {
        color: var(--terracotta);
        font-style: normal;
        font-weight: 600;
    }

    .price-after-note {
        font-size: 13px;
        color: var(--charcoal-soft);
        margin-top: 2px;
        display: none;
    }

    .purchase-action {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
        min-width: 260px;
    }

    .btn-buy {
        display: block;
        width: 100%;
        text-align: center;
        background: var(--terracotta);
        color: var(--white);
        padding: 18px 36px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 700;
        font-family: var(--sans);
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-buy:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(198, 93, 58, 0.3);
    }

    .purchase-trust-row {
        display: flex;
        justify-content: center;
        gap: 20px;
        font-size: 12px;
        color: var(--charcoal-soft);
    }

    .purchase-trust-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .trust-check {
        color: var(--teal-mid);
        font-weight: 700;
    }

    /* ============ WHAT'S INSIDE ============ */
    .inside-section {
        padding: 80px 32px;
        background: var(--cream);
    }

    .inside-inner {
        max-width: 1000px;
        margin: 0 auto;
    }

    .section-eyebrow {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 10px;
        text-align: center;
        font-family: var(--sans);
    }

    .section-title {
        font-size: clamp(26px, 3vw, 36px);
        text-align: center;
        margin-bottom: 12px;
    }

    .section-title em {
        color: var(--terracotta);
    }

    .section-sub {
        text-align: center;
        max-width: 600px;
        margin: 0 auto 50px;
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
        font-family: var(--sans);
    }

    .inside-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .inside-card {
        background: var(--white);
        border-radius: 12px;
        padding: 32px 28px;
        box-shadow: var(--shadow-sm);
        border-top: 3px solid var(--teal-mid);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .inside-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }

    .inside-card-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--teal-mid), var(--teal-deep));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-family: var(--serif);
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .inside-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: var(--teal-darkest);
    }

    .inside-card p {
        font-size: 14px;
        line-height: 1.7;
        color: var(--charcoal-soft);
        font-family: var(--sans);
    }

    /* ============ 30-DAY ROADMAP PREVIEW ============ */
    .roadmap-section {
        padding: 80px 32px;
        background: var(--white);
    }

    .roadmap-inner {
        max-width: 900px;
        margin: 0 auto;
    }

    .week-timeline {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 50px;
    }

    .week-card {
        background: var(--cream);
        border-radius: 12px;
        padding: 28px 22px;
        text-align: center;
        position: relative;
    }

    .week-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: var(--terracotta);
        border-radius: 0 0 3px 3px;
    }

    .week-num {
        font-family: var(--serif);
        font-size: 14px;
        font-weight: 700;
        color: var(--terracotta);
        margin-bottom: 8px;
    }

    .week-title {
        font-family: var(--serif);
        font-size: 17px;
        color: var(--teal-darkest);
        margin-bottom: 10px;
    }

    .week-desc {
        font-size: 13px;
        line-height: 1.6;
        color: var(--charcoal-soft);
        font-family: var(--sans);
    }

    .week-qs {
        margin-top: 12px;
        font-size: 12px;
        font-weight: 600;
        color: var(--teal-mid);
        letter-spacing: 0.5px;
        font-family: var(--sans);
    }

    /* ============ WHO IT'S FOR ============ */
    .audience-section {
        padding: 80px 32px;
        background: linear-gradient(165deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
    }

    .audience-inner {
        max-width: 900px;
        margin: 0 auto;
    }

    .audience-section .section-eyebrow {
        color: rgba(255, 255, 255, 0.5);
    }

    .audience-section .section-title {
        color: var(--white);
    }

    .audience-section .section-title em {
        color: var(--terracotta);
    }

    .audience-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 40px;
    }

    .audience-item {
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 24px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
    }

    .audience-check {
        width: 28px;
        height: 28px;
        background: var(--terracotta);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .audience-text {
        font-size: 15px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
    }

    .audience-not {
        margin-top: 40px;
        text-align: center;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.5);
        line-height: 1.7;
        font-family: var(--sans);
    }

    /* ============ SOCIAL PROOF / TESTIMONIALS ============ */
    .proof-section {
        padding: 80px 32px;
        background: var(--cream);
    }

    .proof-inner {
        max-width: 900px;
        margin: 0 auto;
    }

    .proof-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-top: 40px;
    }

    .proof-card {
        background: var(--white);
        border-radius: 12px;
        padding: 32px;
        box-shadow: var(--shadow-sm);
    }

    .proof-stars {
        color: var(--terracotta);
        font-size: 16px;
        letter-spacing: 2px;
        margin-bottom: 14px;
    }

    .proof-text {
        font-size: 15px;
        line-height: 1.7;
        color: var(--charcoal);
        font-style: italic;
        margin-bottom: 16px;
        font-family: var(--sans);
    }

    .proof-attr {
        font-size: 13px;
        color: var(--charcoal-soft);
        font-weight: 500;
        font-family: var(--sans);
    }

    .proof-attr strong {
        color: var(--teal-deep);
    }

    /* ============ FAQ ============ */
    .faq-section {
        padding: 80px 32px;
        background: var(--white);
    }

    .faq-inner {
        max-width: 700px;
        margin: 0 auto;
    }

    .faq-item {
        border-bottom: 1px solid var(--gray-line);
        padding: 24px 0;
    }

    .faq-q {
        font-family: var(--serif);
        font-size: 17px;
        font-weight: 600;
        color: var(--teal-darkest);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
    }

    .faq-q::after {
        content: '+';
        font-family: var(--sans);
        font-size: 22px;
        color: var(--terracotta);
        flex-shrink: 0;
        transition: transform 0.2s;
    }

    .faq-item.open .faq-q::after {
        content: '−';
    }

    .faq-a {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-item.open .faq-a {
        max-height: 300px;
    }

    .faq-a-text {
        padding-top: 14px;
        font-size: 14.5px;
        line-height: 1.7;
        color: var(--charcoal-soft);
        font-family: var(--sans);
    }

    /* ============ FINAL CTA ============ */
    .final-cta {
        padding: 80px 32px;
        background: linear-gradient(165deg, var(--teal-darkest) 0%, var(--teal-deep) 40%, var(--teal-mid) 100%);
        text-align: center;
        color: var(--white);
    }

    .final-cta h2 {
        color: var(--white);
        font-size: clamp(26px, 3.5vw, 38px);
        margin-bottom: 16px;
    }

    .final-cta h2 em {
        color: var(--terracotta);
    }

    .final-cta-sub {
        color: rgba(255, 255, 255, 0.75);
        font-size: 16px;
        margin-bottom: 12px;
        max-width: 520px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
        font-family: var(--sans);
    }

    .final-cta-quote {
        color: rgba(255, 255, 255, 0.5);
        font-family: var(--serif);
        font-style: italic;
        font-size: 15px;
        margin-bottom: 32px;
    }

    .final-price-display {
        margin-bottom: 28px;
    }

    .final-price {
        font-family: var(--serif);
        font-size: 48px;
        font-weight: 800;
        color: var(--white);
    }

    .final-price-orig {
        font-size: 22px;
        text-decoration: line-through;
        opacity: 0.4;
        margin-left: 10px;
    }

    .final-price-note {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.5);
        margin-top: 4px;
        font-family: var(--sans);
    }

    .btn-on-teal {
        display: inline-block;
        background: var(--terracotta);
        color: var(--white);
        padding: 18px 48px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 700;
        font-family: var(--sans);
        transition: all 0.2s;
        margin-bottom: 16px;
    }

    .btn-on-teal:hover {
        background: var(--terracotta-deep);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(198, 93, 58, 0.3);
    }

    .btn-outline-light {
        display: inline-block;
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        color: rgba(255, 255, 255, 0.8);
        padding: 12px 28px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s;
        margin-left: 12px;
    }

    .btn-outline-light:hover {
        border-color: rgba(255, 255, 255, 0.6);
        color: var(--white);
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 1024px) {
        .hero-inner {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .hero-sub {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-quote {
            text-align: left;
            display: inline-block;
        }

        .hero-stats {
            justify-content: center;
        }

        .hero-visual {
            order: -1;
        }

        .planner-mockup {
            max-width: 340px;
            margin: 0 auto;
        }

        .inside-grid {
            grid-template-columns: 1fr 1fr;
        }

        .week-timeline {
            grid-template-columns: 1fr 1fr;
        }

    }

    @media (max-width: 768px) {
        .hero {
            padding: 50px 24px 60px;
        }

        .inside-grid {
            grid-template-columns: 1fr;
        }

        .purchase-inner {
            flex-direction: column;
            text-align: center;
        }

        .purchase-action {
            width: 100%;
        }

        .audience-grid {
            grid-template-columns: 1fr;
        }

        .proof-grid {
            grid-template-columns: 1fr;
        }

        .week-timeline {
            grid-template-columns: 1fr;
        }
    }
</style>


@section('mainContent')
    <!-- HERO -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <span class="hero-badge">Digital Download · Instant Access</span>
                <h1>The NCLEX <em>Reset Planner</em></h1>
                <p class="hero-sub">A 30-day recovery and success planner built for repeat test-takers who are ready to stop
                    guessing and start studying with a system.</p>
                <p class="hero-quote">"A struggling student is not a failing student."</p>
                <div class="hero-stats">
                    <div class="hero-stat-item">
                        <div class="hero-stat-num">1,500+</div>
                        <div class="hero-stat-label">Students Served</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="hero-stat-num">95%</div>
                        <div class="hero-stat-label">Pass Rate</div>
                    </div>
                    <div class="hero-stat-item">
                        <div class="hero-stat-num">13</div>
                        <div class="hero-stat-label">Years in Nursing Ed</div>
                    </div>
                </div>
            </div>
            <div class="hero-visual">
                <div class="planner-mockup">
                    <p class="planner-mockup-eyebrow">Merkaii Xcellence Prep</p>
                    <h3>The NCLEX Reset Planner</h3>
                    <p class="planner-mockup-sub">30-Day Recovery & Success Planner<br>for NCLEX Repeat Test-Takers</p>
                    <div class="planner-mockup-image">
                        Product image<br>coming soon
                    </div>
                    <p class="planner-mockup-format"><strong>Digital Download</strong> · Print at home or use on any device
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PURCHASE STRIP -->
    <section class="purchase-strip" id="buy">
        <div class="purchase-inner">
            <div class="purchase-pricing">
                <div class="price-early">
                    <span class="price-current" id="priceDisplay">$37</span>
                    <span class="price-original" id="priceOriginal">$47</span>
                    <span class="price-save active" id="priceSave">Save $10</span>
                </div>
                <p class="price-note" id="priceNote">
                    <em>Early bird pricing</em> — available through <span id="ebEndDate"></span>
                </p>
                <p class="price-after-note" id="priceAfterNote">
                    Regular price.
                </p>
            </div>
            <div class="purchase-action">
                <a href="checkout.html?product=nclex-reset-planner" class="btn-buy" id="buyBtn">Get the NCLEX Reset
                    Planner →</a>
                <div class="purchase-trust-row">
                    <div class="purchase-trust-item"><span class="trust-check">✓</span> Instant download</div>
                    <div class="purchase-trust-item"><span class="trust-check">✓</span> Secure checkout</div>
                    <div class="purchase-trust-item"><span class="trust-check">✓</span> Printable PDF</div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHAT'S INSIDE -->
    <section class="inside-section">
        <div class="inside-inner">
            <p class="section-eyebrow">Everything You Need</p>
            <h2 class="section-title">What's Inside <em>the Planner</em></h2>
            <p class="section-sub">Six purposefully designed sections that work together to rebuild your study habits,
                strengthen weak areas, and restore your confidence — all in 30 days.</p>

            <div class="inside-grid">
                <div class="inside-card">
                    <div class="inside-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <h3>30-Day Study Roadmap</h3>
                    <p>Your day-by-day guide showing exactly what to study, when to practice questions, and when to rest.
                        Each day builds on the last with specific content focus areas and question goals.</p>
                </div>

                <div class="inside-card">
                    <div class="inside-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                    <h3>Weekly Study Schedules</h3>
                    <p>Detailed hour-by-hour templates for all 4 weeks — Foundation Rebuild, Content Deep Dive, Advanced
                        Application, and Exam Readiness. Customize the time blocks to fit your life.</p>
                </div>

                <div class="inside-card">
                    <div class="inside-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" y1="13" x2="8" y2="13" />
                            <line x1="16" y1="17" x2="8" y2="17" />
                        </svg>
                    </div>
                    <h3>NCLEX Confidence Journal</h3>
                    <p>Weekly journal pages to process your emotions, celebrate wins, and rebuild self-belief. Includes
                        guided prompts for reframing negative thoughts and tracking your confidence growth.</p>
                </div>

                <div class="inside-card">
                    <div class="inside-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                    </div>
                    <h3>Daily Motivation Pages</h3>
                    <p>30 days of affirmations, mindset resets, and encouragement designed for nursing students. Read one
                        each morning before studying to set the right tone for the day.</p>
                </div>

                <div class="inside-card">
                    <div class="inside-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 11 12 14 22 4" />
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                        </svg>
                    </div>
                    <h3>Priority & Delegation Cheat Sheet</h3>
                    <p>Quick-reference guide covering ABCs of priority, Maslow's hierarchy for NCLEX, nursing process order,
                        the 5 Rights of Delegation, and scope-of-practice breakdowns for RN, LPN, and UAP.</p>
                </div>

                <div class="inside-card">
                    <div class="inside-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                    </div>
                    <h3>SATA Strategy Mini Guide</h3>
                    <p>A step-by-step method for tackling Select All That Apply questions — the #1 question type that trips
                        up repeat test-takers. Includes common traps to avoid and a 4-week practice framework.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 30-DAY ROADMAP PREVIEW -->
    <section class="roadmap-section">
        <div class="roadmap-inner">
            <p class="section-eyebrow">Your 30-Day Structure</p>
            <h2 class="section-title">Four Weeks. <em>One Clear Path.</em></h2>
            <p class="section-sub">Each week has a distinct purpose. By Day 30, you'll have rebuilt your foundation,
                strengthened every weak area, and developed the confidence to walk into test day ready.</p>

            <div class="week-timeline">
                <div class="week-card">
                    <p class="week-num">Week 1</p>
                    <p class="week-title">Foundation Rebuild</p>
                    <p class="week-desc">Set your WHY. Take a diagnostic. Rebuild fundamentals in nursing process,
                        pharmacology, and cardiac/respiratory nursing.</p>
                    <p class="week-qs">~165 Practice Questions</p>
                </div>
                <div class="week-card">
                    <p class="week-num">Week 2</p>
                    <p class="week-title">Content Deep Dive</p>
                    <p class="week-desc">Endocrine, renal, maternity, pediatrics. Plus dedicated days for
                        priority/delegation and SATA strategy training.</p>
                    <p class="week-qs">~175 Practice Questions</p>
                </div>
                <div class="week-card">
                    <p class="week-num">Week 3</p>
                    <p class="week-title">Advanced Application</p>
                    <p class="week-desc">Mental health, infection control, fluids & electrolytes, pharmacology power day,
                        lab values, and a 75-question practice exam.</p>
                    <p class="week-qs">~235 Practice Questions</p>
                </div>
                <div class="week-card">
                    <p class="week-num">Week 4</p>
                    <p class="week-title">Exam Readiness</p>
                    <p class="week-desc">Weak area review, full 145-question simulation, error analysis, rapid review, test
                        strategies, and exam-day preparation.</p>
                    <p class="week-qs">~280 Practice Questions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- WHO IT'S FOR -->
    <section class="audience-section">
        <div class="audience-inner">
            <p class="section-eyebrow">Is This For You?</p>
            <h2 class="section-title">Built for <em>Repeat Test-Takers</em></h2>

            <div class="audience-grid">
                <div class="audience-item">
                    <div class="audience-check">✓</div>
                    <div class="audience-text">You've taken the NCLEX before and didn't pass — and you're ready to approach
                        it differently this time.</div>
                </div>
                <div class="audience-item">
                    <div class="audience-check">✓</div>
                    <div class="audience-text">You've been studying without a plan — doing questions randomly, watching
                        videos aimlessly, and not seeing improvement.</div>
                </div>
                <div class="audience-item">
                    <div class="audience-check">✓</div>
                    <div class="audience-text">You struggle with SATA, prioritization, and delegation questions and need a
                        strategy — not just more practice.</div>
                </div>
                <div class="audience-item">
                    <div class="audience-check">✓</div>
                    <div class="audience-text">Your confidence has taken a hit and you need something that addresses the
                        mindset side — not just the content.</div>
                </div>
                <div class="audience-item">
                    <div class="audience-check">✓</div>
                    <div class="audience-text">You're a first-time test-taker who wants to study smarter from the start and
                        avoid the mistakes most students make.</div>
                </div>
                <div class="audience-item">
                    <div class="audience-check">✓</div>
                    <div class="audience-text">You want structure and accountability but aren't ready to invest in a full
                        coaching program yet.</div>
                </div>
            </div>

            <p class="audience-not">This planner doesn't replace a full review course or coaching program — it gives you
                the structure, strategy, and daily accountability that most study plans are missing.</p>
        </div>
    </section>

    <!-- SOCIAL PROOF -->
    <section class="proof-section">
        <div class="proof-inner">
            <p class="section-eyebrow">What Students Say</p>
            <h2 class="section-title">Real Results. <em>Real Comebacks.</em></h2>

            <div class="proof-grid">
                <div class="proof-card">
                    <p class="proof-stars">★★★★★</p>
                    <p class="proof-text">"I failed twice and felt completely lost. This planner gave me a system — I
                        finally knew what to study each day instead of panicking. Passed on my third attempt."</p>
                    <p class="proof-attr"><strong>Repeat Test-Taker</strong> · Passed After 30-Day Reset</p>
                </div>
                <div class="proof-card">
                    <p class="proof-stars">★★★★★</p>
                    <p class="proof-text">"The confidence journal was the part I didn't know I needed. I'd been so focused
                        on content that I forgot how much my mindset was holding me back."</p>
                    <p class="proof-attr"><strong>NCLEX Coaching Student</strong> · Passed With 75 Questions</p>
                </div>
                <div class="proof-card">
                    <p class="proof-stars">★★★★★</p>
                    <p class="proof-text">"The SATA guide alone was worth it. I went from dreading those questions to
                        actually having a method. My practice scores jumped 15% in two weeks."</p>
                    <p class="proof-attr"><strong>Nursing Graduate</strong> · First-Time Passer</p>
                </div>
                <div class="proof-card">
                    <p class="proof-stars">★★★★★</p>
                    <p class="proof-text">"I printed it out and kept it next to my desk for 30 days straight. The daily
                        motivation pages kept me going on the days I wanted to quit."</p>
                    <p class="proof-attr"><strong>Repeat Test-Taker</strong> · Passed on Fourth Attempt</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section">
        <div class="faq-inner">
            <p class="section-eyebrow">Questions?</p>
            <h2 class="section-title" style="margin-bottom: 40px;">Frequently Asked <em>Questions</em></h2>

            <div class="faq-item open">
                <div class="faq-q" onclick="toggleFaq(this)">What format is the planner in?</div>
                <div class="faq-a">
                    <p class="faq-a-text">The NCLEX Reset Planner is a digital PDF download. After purchase, you'll receive
                        instant access to download and either print it at home or use it on your tablet, iPad, or computer.
                        We recommend printing it — writing by hand activates deeper memory processing than typing.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-q" onclick="toggleFaq(this)">Is this a full NCLEX review course?</div>
                <div class="faq-a">
                    <p class="faq-a-text">No — and it's not meant to be. The NCLEX Reset Planner is a study structure and
                        accountability tool. It tells you what to study each day, provides strategy guides for high-yield
                        question types, and builds your confidence through daily journaling. For a comprehensive coaching
                        experience, explore our <a href="programs.html" style="color: var(--teal-mid);">NCLEX Success
                            Coaching Program</a>.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-q" onclick="toggleFaq(this)">Do I need any other materials to use this planner?</div>
                <div class="faq-a">
                    <p class="faq-a-text">You'll want access to a question bank (like UWorld, Archer, or any NCLEX practice
                        question resource) and your nursing content review materials. The planner provides the structure and
                        strategy — your existing resources provide the content.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-q" onclick="toggleFaq(this)">Is this only for repeat test-takers?</div>
                <div class="faq-a">
                    <p class="faq-a-text">The planner was designed with repeat test-takers in mind, but first-time
                        test-takers benefit just as much. The 30-day study roadmap, confidence journal, and strategy guides
                        are valuable for anyone preparing for the NCLEX who wants a structured, proven approach.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-q" onclick="toggleFaq(this)">What's the difference between the early bird price and
                    regular price?</div>
                <div class="faq-a">
                    <p class="faq-a-text">The early bird price of $37 is available for the first 7 days after launch. After
                        that, the planner moves to its regular price of $47. The content is exactly the same — the early
                        bird pricing is simply a thank-you to our earliest supporters.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-q" onclick="toggleFaq(this)">Can I use this alongside an MXP coaching program?</div>
                <div class="faq-a">
                    <p class="faq-a-text">Absolutely. The planner works as a standalone tool or as a companion to any of
                        our coaching programs. Many students use it to stay organized between live sessions and to track
                        their daily progress throughout the program.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta" id="buy-bottom">
        <h2>Your Comeback <em>Starts Now.</em></h2>
        <p class="final-cta-sub">30 days. One planner. A clear path from where you are to where you're going.</p>
        <p class="final-cta-quote">"You didn't come this far to only come this far."</p>
        <div class="final-price-display">
            <span class="final-price" id="finalPriceDisplay">$37</span>
            <span class="final-price-orig" id="finalPriceOrig">$47</span>
            <p class="final-price-note" id="finalPriceNote">Early bird pricing — limited time</p>
        </div>
        <a href="checkout.html?product=nclex-reset-planner" class="btn-on-teal" id="buyBtnBottom">Get the NCLEX Reset
            Planner →</a>
        <a href="programs.html" class="btn-outline-light">Explore Full Programs</a>
    </section>



    @include(theme('partials._custom_footer'))

    <script>
        (function() {
            // ===== SET YOUR LAUNCH DATE HERE =====
            var launchDate = new Date('2026-06-05T00:00:00');
            // =====================================

            var earlyBirdDays = 7;
            var earlyPrice = 37;
            var regularPrice = 47;

            var endDate = new Date(launchDate);
            endDate.setDate(endDate.getDate() + earlyBirdDays);

            var now = new Date();
            var isEarlyBird = now < endDate;

            // Format end date
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            var endStr = months[endDate.getMonth()] + ' ' + endDate.getDate() + ', ' + endDate.getFullYear();

            if (isEarlyBird) {
                // Show early bird pricing
                document.getElementById('priceDisplay').textContent = '$' + earlyPrice;
                document.getElementById('priceOriginal').textContent = '$' + regularPrice;
                document.getElementById('priceOriginal').style.display = '';
                document.getElementById('priceSave').style.display = '';
                document.getElementById('priceNote').style.display = '';
                document.getElementById('priceAfterNote').style.display = 'none';
                document.getElementById('ebEndDate').textContent = endStr;

                // Banner
                var banner = document.getElementById('ebBanner');
                banner.classList.add('active');

                var daysLeft = Math.ceil((endDate - now) / (1000 * 60 * 60 * 24));
                var daysText = daysLeft === 1 ? '1 day left' : daysLeft + ' days left';
                document.getElementById('ebText').innerHTML = '🎉 <em>Early Bird Pricing — $' + earlyPrice +
                    '</em> (save $' + (regularPrice - earlyPrice) + ') · ' + daysText +
                    '<span class="eb-date">· Ends ' + endStr + '</span>';

                // Final CTA section
                document.getElementById('finalPriceDisplay').textContent = '$' + earlyPrice;
                document.getElementById('finalPriceOrig').textContent = '$' + regularPrice;
                document.getElementById('finalPriceOrig').style.display = '';
                document.getElementById('finalPriceNote').textContent = 'Early bird pricing — ends ' + endStr;
            } else {
                // Show regular pricing
                document.getElementById('priceDisplay').textContent = '$' + regularPrice;
                document.getElementById('priceOriginal').style.display = 'none';
                document.getElementById('priceSave').style.display = 'none';
                document.getElementById('priceNote').style.display = 'none';
                document.getElementById('priceAfterNote').style.display = '';

                // Final CTA section
                document.getElementById('finalPriceDisplay').textContent = '$' + regularPrice;
                document.getElementById('finalPriceOrig').style.display = 'none';
                document.getElementById('finalPriceNote').textContent = '';
            }
        })();

        // FAQ toggle
        function toggleFaq(el) {
            var item = el.parentElement;
            item.classList.toggle('open');
        }
    </script>
@endsection
