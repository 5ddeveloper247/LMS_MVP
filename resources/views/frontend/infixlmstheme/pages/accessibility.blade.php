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
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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
    h3 {
        font-family: var(--serif);
        font-weight: 700;
        line-height: 1.2;
        color: var(--teal-darkest);
    }

    .nav {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(245, 237, 224, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--gray-line);
        padding: 16px 0;
    }

    .nav-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
    }

    .nav-brand {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 20px;
        color: var(--teal-darkest);
        text-decoration: none;
    }

    .nav-brand-accent {
        color: var(--terracotta);
        font-style: italic;
    }

    .nav-links {
        display: flex;
        gap: 28px;
        list-style: none;
    }

    .nav-links a {
        font-size: 14px;
        font-weight: 500;
        color: var(--charcoal);
        text-decoration: none;
        transition: color 0.2s;
    }

    .nav-links a:hover {
        color: var(--teal-mid);
    }

    .nav-cta {
        background: var(--terracotta);
        color: var(--white);
        padding: 10px 22px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: background 0.2s;
    }

    .nav-cta:hover {
        background: var(--terracotta-deep);
    }

    .legal-hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 60px 32px 70px;
        text-align: center;
    }

    .legal-hero h1 {
        font-size: clamp(32px, 4vw, 48px);
        color: var(--white);
        margin-bottom: 10px;
    }

    .legal-hero p {
        font-size: 14px;
        color: var(--cream-warm);
    }

    .legal-content {
        max-width: 820px;
        margin: 0 auto;
        padding: 60px 32px 90px;
    }

    .legal-card {
        background: var(--white);
        border-radius: 16px;
        padding: 50px 48px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-line);
    }

    .legal-card h2 {
        font-size: 22px;
        margin: 36px 0 14px;
        padding-top: 28px;
        border-top: 1px solid var(--gray-line);
    }

    .legal-card h2:first-of-type {
        margin-top: 0;
        padding-top: 0;
        border-top: none;
    }

    .legal-card p {
        font-size: 15px;
        line-height: 1.8;
        color: var(--charcoal-soft);
        margin-bottom: 14px;
    }

    .legal-card ul {
        margin: 10px 0 14px 24px;
    }

    .legal-card li {
        font-size: 14.5px;
        line-height: 1.7;
        color: var(--charcoal-soft);
        margin-bottom: 8px;
    }

    .legal-card a {
        color: var(--teal-mid);
        text-decoration: underline;
    }

    .legal-card strong {
        color: var(--teal-darkest);
    }

    .footer-main {
        background: var(--teal-darkest);
        color: rgba(255, 255, 255, 0.85);
        padding: 70px 0 0;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
        gap: 40px;
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px 50px;
    }

    .footer-brand-col {
        padding-right: 20px;
    }

    .footer-logo-mark {
        display: flex;
        align-items: center;
        gap: 14px;
        text-decoration: none;
        margin-bottom: 20px;
    }

    .footer-seal-wrap {
        width: 56px;
        height: 56px;
        flex-shrink: 0;
    }

    .footer-seal-wrap svg {
        width: 100%;
        height: 100%;
        display: block;
    }

    .footer-logo-text {
        display: flex;
        flex-direction: column;
        line-height: 1.05;
    }

    .footer-logo-text .name {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 20px;
        color: var(--white);
    }

    .footer-logo-text .tag {
        font-family: var(--sans);
        font-size: 9.5px;
        letter-spacing: 1.8px;
        text-transform: uppercase;
        color: var(--terracotta);
        font-weight: 600;
        margin-top: 3px;
    }

    .footer-desc {
        font-size: 13.5px;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.72);
        margin-bottom: 22px;
        max-width: 340px;
    }

    .footer-tagline-motto {
        font-family: var(--serif);
        font-style: italic;
        font-size: 15px;
        color: var(--terracotta);
        margin-bottom: 10px;
    }

    .footer-tagline-quote {
        font-family: var(--serif);
        font-style: italic;
        font-size: 14px;
        color: var(--cream);
        opacity: 0.75;
        padding-top: 14px;
        margin-top: 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.12);
    }

    .footer-col-title {
        font-family: var(--serif);
        font-weight: 700;
        font-size: 16px;
        color: var(--cream);
        margin-bottom: 18px;
    }

    .footer-col ul {
        list-style: none;
    }

    .footer-col li {
        margin-bottom: 11px;
    }

    .footer-col a {
        color: rgba(255, 255, 255, 0.75);
        text-decoration: none;
        font-size: 13.5px;
        transition: color 0.2s;
    }

    .footer-col a:hover {
        color: var(--terracotta);
    }

    .footer-contact {
        background: rgba(0, 0, 0, 0.18);
        padding: 30px 0;
    }

    .footer-contact-inner {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 24px;
    }

    .footer-contact-info {
        font-size: 13.5px;
        line-height: 1.85;
        color: rgba(255, 255, 255, 0.82);
    }

    .footer-contact-info strong {
        color: var(--cream);
        font-size: 14.5px;
    }

    .footer-contact-info a {
        color: rgba(255, 255, 255, 0.82);
        text-decoration: none;
    }

    .footer-contact-info a:hover {
        color: var(--terracotta);
    }

    .footer-socials {
        display: flex;
        gap: 12px;
    }

    .social-icon {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--cream);
        text-decoration: none;
        transition: all 0.2s;
    }

    .social-icon:hover {
        background: var(--terracotta);
        border-color: var(--terracotta);
        color: var(--white);
        transform: translateY(-2px);
    }

    .social-icon svg {
        width: 16px;
        height: 16px;
    }

    .footer-legal {
        background: #052821;
        padding: 24px 0;
        font-size: 11.5px;
        color: rgba(255, 255, 255, 0.5);
        line-height: 1.7;
    }

    .footer-legal-inner {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .footer-legal-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 14px;
        padding-bottom: 14px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-legal-links {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .footer-legal a {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
    }

    .footer-legal a:hover {
        color: var(--terracotta);
    }

    .footer-disclaimer {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.38);
        line-height: 1.65;
        max-width: 1100px;
    }

    @media (max-width: 1024px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 36px;
        }

        .footer-brand-col {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 768px) {
        .nav-links {
            display: none;
        }

        .legal-card {
            padding: 32px 24px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
        }

        .footer-contact-inner {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-legal-top {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

@section('mainContent')
    <section class="legal-hero">
        <h1>Accessibility Statement</h1>
        <p>Last Updated: May 2026</p>
    </section>

    <div class="legal-content">
        <div class="legal-card">

            <h2>Our Commitment</h2>
            <p>Merkaii Xcellence Prep is committed to ensuring digital accessibility for people of all abilities. We believe
                that every nursing student — regardless of ability — deserves equal access to the educational resources,
                tools,
                and support that can help them achieve their goals.</p>
            <p>We are continually improving the user experience for everyone and applying the relevant accessibility
                standards
                to ensure we provide equal access to all users.</p>

            <h2>Standards We Follow</h2>
            <p>We aim to conform to the <strong>Web Content Accessibility Guidelines (WCAG) 2.1, Level AA</strong>
                standards.
                These guidelines explain how to make web content more accessible to people with a wide range of
                disabilities,
                including visual, auditory, physical, speech, cognitive, language, learning, and neurological disabilities.
            </p>

            <h2>Accessibility Features</h2>
            <p>Our website includes the following accessibility features:</p>
            <ul>
                <li><strong>Semantic HTML</strong> — We use proper heading hierarchy, landmarks, and semantic elements to
                    support screen readers and assistive technologies.</li>
                <li><strong>Keyboard Navigation</strong> — All interactive elements (links, buttons, forms, menus) are
                    navigable
                    using a keyboard alone.</li>
                <li><strong>Alt Text</strong> — Images include descriptive alternative text. Decorative images are marked as
                    presentational.</li>
                <li><strong>Color Contrast</strong> — Text and interactive elements meet minimum contrast ratios (4.5:1 for
                    normal text, 3:1 for large text) against their backgrounds.</li>
                <li><strong>Responsive Design</strong> — Our site adapts to all screen sizes and supports text resizing up
                    to
                    200% without loss of content or functionality.</li>
                <li><strong>Focus Indicators</strong> — Visible focus styles are provided for all interactive elements to
                    support keyboard and switch navigation.</li>
                <li><strong>Form Labels</strong> — All form fields include associated labels and clear instructions.</li>
                <li><strong>ARIA Attributes</strong> — We use ARIA landmarks and attributes where appropriate to supplement
                    semantic HTML.</li>
                <li><strong>Readable Fonts</strong> — Body text uses a minimum 15px font size with generous line spacing
                    (1.6+)
                    for readability.</li>
            </ul>

            <h2>Known Limitations</h2>
            <p>While we strive to meet WCAG 2.1 AA standards across the entire site, some areas may have temporary
                limitations:</p>
            <ul>
                <li><strong>Third-party content</strong> — Embedded widgets (calendar scheduling, payment processing, video
                    players) are provided by third-party services and may not meet all accessibility standards. We work with
                    vendors who prioritize accessibility and advocate for improvements.</li>
                <li><strong>PDF documents</strong> — Some downloadable study materials may not yet be fully tagged for
                    screen
                    reader access. We are working to remediate existing documents and ensure new documents meet
                    accessibility
                    standards.</li>
                <li><strong>Legacy content</strong> — Older blog posts or resources created before our current accessibility
                    standards may contain some non-conforming elements. We are auditing and updating this content on an
                    ongoing
                    basis.</li>
            </ul>

            <h2>Feedback & Accommodation Requests</h2>
            <p>We welcome your feedback on the accessibility of the Merkaii Xcellence Prep website. If you encounter an
                accessibility barrier, need content in an alternative format, or have suggestions for improvement, please
                contact us:</p>
            <ul>
                <li><strong>Email:</strong> <a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a>
                    (subject line: "Accessibility")</li>
                <li><strong>Phone:</strong> <a href="tel:8632508764">(863) 250-8764</a></li>
                <li><strong>Mail:</strong> Merkaii Xcellence Prep, 501 S. Florida Avenue, Lakeland, FL 33801</li>
            </ul>
            <p>We aim to respond to accessibility feedback within 3 business days and to resolve reported issues as quickly
                as
                possible.</p>

            <h2>Enforcement & Complaint Procedures</h2>
            <p>If you are not satisfied with our response to your accessibility concern, you may file a complaint with the
                <strong>U.S. Department of Justice, Civil Rights Division</strong> or the <strong>U.S. Department of
                    Education,
                    Office for Civil Rights</strong>. Information about filing complaints is available on their respective
                websites.
            </p>

            <h2>Ongoing Efforts</h2>
            <p>Accessibility is not a one-time project — it is an ongoing commitment. We regularly:</p>
            <ul>
                <li>Conduct accessibility audits on new and existing pages</li>
                <li>Train our content creators on accessible writing and formatting practices</li>
                <li>Test with assistive technologies including screen readers and keyboard-only navigation</li>
                <li>Review third-party tools and integrations for accessibility compliance</li>
            </ul>

        </div>
    </div>
    @include(theme('partials._custom_footer'))
@endsection
