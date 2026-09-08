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

    <div class="jump-section">
        <div class="jump-inner"><a href="#programs" class="jump-link">Programs</a><a href="#nclex" class="jump-link">NCLEX
                Prep</a><a href="#remediation" class="jump-link">Remediation</a><a href="#pricing" class="jump-link">Pricing
                &amp; Enrollment</a><a href="#tutoring" class="jump-link">Tutoring</a><a href="#general"
                class="jump-link">General</a></div>
    </div>

    <!-- Programs -->
    <section class="faq-category" id="programs">
        <div class="faq-cat-header">
            <p class="faq-cat-eyebrow">Programs</p>
            <h2 class="faq-cat-title">About Our Programs</h2>
        </div>
        <div class="faq-list">
            <details class="faq-item">
                <summary>Which program is right for me?</summary>
                <div class="faq-body">It depends on where you are. If you're preparing for the NCLEX (first-time or retake),
                    the
                    <a href="nclex-coaching.html">NCLEX Success Coaching</a> program is the best fit. If the FL Board of
                    Nursing
                    has required you to complete remediation, you need the <a href="remediation.html">FL BON Remediation</a>
                    program. Currently in nursing school and struggling? Check out <a href="nursing-school.html">Nursing
                        School
                        Success</a>. Dismissed or considering re-entry? The <a href="nursing-comeback.html">Nursing
                        Comeback</a>
                    program is designed for you. Not sure? <a href="contact.html">Schedule a free consultation</a> and we'll
                    help
                    you decide.
                </div>
            </details>
            <details class="faq-item">
                <summary>What is the NCLEX PASS Method™?</summary>
                <div class="faq-body">It's our proprietary three-pillar framework: Content Mastery + Process &amp; Strategy
                    +
                    Confidence &amp; Mindset. Every program and course is built on this system. <a
                        href="nclex-pass-method.html">Read the full methodology deep-dive →</a></div>
            </details>
            <details class="faq-item">
                <summary>How long are the programs?</summary>
                <div class="faq-body">NCLEX Success Coaching runs 6–8 weeks. FL BON Remediation length varies by the Board's
                    requirements for your specific case. Nursing School Success and Nursing Comeback are flexible — built
                    around
                    your academic calendar. Tutoring is on-demand.</div>
            </details>
            <details class="faq-item">
                <summary>Are programs online or in-person?</summary>
                <div class="faq-body">All programs are available live online via video — accessible from anywhere. If you're
                    local to Lakeland, FL, in-person options are available at our location on S. Florida Avenue. Contact us
                    to
                    discuss your preference.</div>
            </details>
        </div>
    </section>

    <!-- NCLEX -->
    <section class="faq-category" id="nclex">
        <div class="faq-cat-header">
            <p class="faq-cat-eyebrow">NCLEX Prep</p>
            <h2 class="faq-cat-title">NCLEX Questions</h2>
        </div>
        <div class="faq-list">
            <details class="faq-item">
                <summary>I failed the NCLEX. Can you help me pass?</summary>
                <div class="faq-body">Yes — that's our specialty. The majority of our students are repeat test-takers. Our
                    95%
                    pass rate includes students who failed 2, 3, even 4+ times before finding the right system. The key is
                    addressing all three dimensions: content gaps, test-taking process, and test-day confidence.</div>
            </details>
            <details class="faq-item">
                <summary>Is your curriculum updated for the Next-Generation NCLEX (NGN)?</summary>
                <div class="faq-body">Yes. All programs and prep-courses are updated for the NGN clinical judgment
                    measurement
                    model — including extended drag-and-drop, matrix, highlight, and case study item types launched in 2023.
                </div>
            </details>
            <details class="faq-item">
                <summary>How is Merkaii different from other NCLEX prep programs?</summary>
                <div class="faq-body">Most prep programs focus only on content review — more material, more questions, more
                    flashcards. Our NCLEX PASS Method™ adds two pillars that most programs ignore: Process Training (how to
                    think
                    through questions under pressure) and Confidence Building (managing test anxiety and rebuilding
                    self-efficacy). The combination is what drives our 95% pass rate.</div>
            </details>
            <details class="faq-item">
                <summary>What if I've already tried other prep programs?</summary>
                <div class="faq-body">Many of our students come to us after trying 1–3 other prep programs. The fact that
                    those
                    programs didn't work doesn't mean you can't pass — it means you need a different approach. We start with
                    a
                    diagnostic to identify your specific gaps and build a personalized plan from there.</div>
            </details>
        </div>
    </section>

    <!-- Remediation -->
    <section class="faq-category" id="remediation">
        <div class="faq-cat-header">
            <p class="faq-cat-eyebrow">FL BON Remediation</p>
            <h2 class="faq-cat-title">Remediation Questions</h2>
        </div>
        <div class="faq-list">
            <details class="faq-item">
                <summary>Are you approved by the Florida Board of Nursing?</summary>
                <div class="faq-body">Yes. Merkaii Xcellence Prep operates as Merakii College of Health — a Florida Board of
                    Nursing-approved remedial course provider. You can verify our approval directly on the <a
                        href="https://floridasnursing.gov/florida-board-of-nursing-approved-remedial-courses/"
                        target="_blank">FL
                        BON website</a>. <a href="credentials.html">See our full credentials page →</a></div>
            </details>
            <details class="faq-item">
                <summary>What triggers FL BON remediation?</summary>
                <div class="faq-body">Remediation is typically required by the Board as a condition of licensure or license
                    reinstatement. Common triggers include multiple NCLEX failures, disciplinary actions, license lapse, or
                    practice deficiency findings. Your Board order will specify the required coursework.</div>
            </details>
            <details class="faq-item">
                <summary>Will my completion be accepted by the Board?</summary>
                <div class="faq-body">Yes. We produce all documentation required by the FL BON, including official
                    completion
                    certificates. Our documentation has been accepted by the Board for hundreds of nurses.</div>
            </details>
            <details class="faq-item">
                <summary>How long does remediation take?</summary>
                <div class="faq-body">It depends on the Board's requirements for your specific case. Some students complete
                    remediation in 4–6 weeks; others need longer depending on the number and type of courses required. We'll
                    review your Board order and give you a realistic timeline during your consultation.</div>
            </details>
        </div>
    </section>

    <!-- Pricing -->
    <section class="faq-category" id="pricing">
        <div class="faq-cat-header">
            <p class="faq-cat-eyebrow">Pricing &amp; Enrollment</p>
            <h2 class="faq-cat-title">Cost &amp; Enrollment</h2>
        </div>
        <div class="faq-list">
            <details class="faq-item">
                <summary>How much do programs cost?</summary>
                <div class="faq-body">Pricing varies by program and tier. NCLEX Success Coaching and FL BON Remediation
                    pricing
                    is discussed during your free consultation because the scope depends on your specific situation.
                    Tutoring
                    starts at $75/session with package discounts available. <a href="tutoring.html#pricing">See tutoring
                        pricing
                        →</a></div>
            </details>
            <details class="faq-item">
                <summary>Do you offer payment plans?</summary>
                <div class="faq-body">Yes. We offer flexible payment plans for all coaching programs. Details are discussed
                    during your consultation. We never want cost to be the reason a student can't get the help they need.
                </div>
            </details>
            <details class="faq-item">
                <summary>Is there a free option to try before I enroll?</summary>
                <div class="faq-body">Yes — two options. First, download the <a href="starter-kit.html">free NCLEX Comeback
                        Starter Kit</a> for an immediate taste of our approach. Second, <a href="contact.html">schedule a
                        free
                        consultation</a> to discuss your situation and get a personalized recommendation at no cost.</div>
            </details>
            <details class="faq-item">
                <summary>Can I apply tutoring costs toward a program?</summary>
                <div class="faq-body">Yes. If you enroll in a coaching program within 30 days of a tutoring session, we'll
                    credit the session cost toward your program enrollment. It's a risk-free way to experience our teaching
                    style.
                </div>
            </details>
        </div>
    </section>

    <!-- Tutoring -->
    <section class="faq-category" id="tutoring">
        <div class="faq-cat-header">
            <p class="faq-cat-eyebrow">Tutoring</p>
            <h2 class="faq-cat-title">Tutoring Questions</h2>
        </div>
        <div class="faq-list">
            <details class="faq-item">
                <summary>What's the difference between tutoring and a program?</summary>
                <div class="faq-body">Tutoring is on-demand, subject-specific support for a particular concept or exam.
                    Programs
                    are structured multi-week experiences with a curriculum, study plan, community access, and coaching.
                    Many
                    students use both — tutoring for targeted help and a program for the full system.</div>
            </details>
            <details class="faq-item">
                <summary>Can I choose my instructor?</summary>
                <div class="faq-body">Yes. Browse instructors by specialty on our <a href="tutoring.html">Tutoring
                        page</a> and
                    select the one that matches your needs. If your preferred instructor isn't available at your preferred
                    time,
                    we'll help find an alternative.</div>
            </details>
            <details class="faq-item">
                <summary>What subjects do you cover?</summary>
                <div class="faq-body">All pre-licensure nursing subjects — Fundamentals, Med-Surg, Pharmacology, Mental
                    Health,
                    OB/Maternal, Pediatrics, Community Health, Physical Assessment, Gerontological Nursing, Nursing
                    Management,
                    NCLEX Test Strategy, and FL BON Remedial subjects. <a href="tutoring.html">See the full subject list
                        →</a>
                </div>
            </details>
        </div>
    </section>

    <!-- General -->
    <section class="faq-category" id="general">
        <div class="faq-cat-header">
            <p class="faq-cat-eyebrow">General</p>
            <h2 class="faq-cat-title">General Questions</h2>
        </div>
        <div class="faq-list">
            <details class="faq-item">
                <summary>Where are you located?</summary>
                <div class="faq-body">501 S. Florida Avenue, Lakeland, FL 33801. We're open Monday–Thursday 8:30am–7:00pm
                    and
                    Saturday 10:00am–3:00pm. All programs are also available online via live video.</div>
            </details>
            <details class="faq-item">
                <summary>Who is behind Merkaii Xcellence Prep?</summary>
                <div class="faq-body">Merkaii was founded in 2019 by Paula Martin, LPN — a nurse and health educator with
                    13+
                    years of experience in nursing education. The organization operates under Merakii International Societe,
                    Inc.
                    <a href="about.html">Learn more about our story →</a>
                </div>
            </details>
            <details class="faq-item">
                <summary>What does "Merkaii" mean?</summary>
                <div class="faq-body">It's a variant of "meraki" — a Greek word meaning to do something with soul,
                    creativity,
                    and love; to put a piece of yourself into your work. It reflects our approach to nursing education:
                    every
                    student gets our full attention and care, not a generic program.</div>
            </details>
            <details class="faq-item">
                <summary>How do I get started?</summary>
                <div class="faq-body">Three options: (1) <a href="contact.html">Schedule a free consultation</a> to
                    discuss your
                    situation and get a personalized recommendation. (2) <a href="starter-kit.html">Download the free
                        Starter
                        Kit</a> to try our approach immediately. (3) <a href="tutoring.html">Book a tutoring session</a> to
                    experience our teaching style risk-free.</div>
            </details>
        </div>
    </section>

    <!-- Still have questions -->
    <section class="contact-section">
        <div class="contact-card">
            <h2>Still have questions?</h2>
            <p>We're happy to help. Schedule a free consultation or send us a message — no pressure, no sales pitch, just
                honest answers.</p>
            <a href="contact.html" class="btn-primary">Schedule a Free Consultation →</a>
            <p class="contact-alt">Or email us at <a
                    href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a>
            </p>
        </div>
    </section>

    <section class="final-cta">
        <h2>Ready to get started? <em>We're here.</em></h2>
        <p>Every student's path is different. Let us help you find yours.</p><a href="contact.html"
            class="btn-on-teal">Book
            a Free Consultation →</a>
    </section>



    @include(theme('partials._custom_footer'))
@endsection
