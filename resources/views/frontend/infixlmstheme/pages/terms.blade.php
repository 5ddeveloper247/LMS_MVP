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
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: var(--sans) !important;
        color: var(--charcoal);
        background: var(--cream);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    h1,
    h2,
    h3,
    h4 {
        font-family: var(--serif) !important;
        font-weight: 700 !important;
        line-height: 1.2 !important;
        color: var(--teal-darkest);
    }

    .breadcrumb {
        background: var(--cream-warm);
        padding: 14px 32px;
        border-bottom: 1px solid var(--gray-line);
    }

    .breadcrumb-inner {
        max-width: 1200px;
        margin: 0 auto;
        font-size: 13px;
        color: var(--charcoal-soft);
    }

    .breadcrumb-inner a {
        color: var(--teal-mid);
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb-inner a:hover {
        color: var(--terracotta);
    }

    .breadcrumb-inner span {
        margin: 0 8px;
        opacity: 0.5;
    }

    .legal-hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 70px 32px 80px;
        text-align: center;
    }

    .legal-hero h1 {
        font-size: clamp(32px, 4vw, 48px);
        color: var(--white);
        margin-bottom: 14px;
    }

    .legal-hero p {
        font-size: 15px;
        color: var(--cream-warm);
        font-family: var(--sans) !important;
    }

    .legal-content {
        background: var(--white);
        padding: 60px 32px;
    }

    .legal-inner {
        max-width: 800px;
        margin: 0 auto;
    }

    .legal-inner h2 {
        font-size: 24px;
        margin: 40px 0 16px;
        padding-top: 24px;
        border-top: 1px solid var(--gray-line);
        color: var(--teal-darkest) !important;
    }

    .legal-inner h2:first-of-type {
        margin-top: 0;
        padding-top: 0;
        border-top: none;
    }

    .legal-inner p {
        font-size: 15px;
        color: var(--charcoal-soft) !important;
        line-height: 1.8;
        margin-bottom: 16px;
            font-family: var(--sans) !important;

    }

    .legal-inner ul {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .legal-inner ul li {
        padding: 6px 0 6px 24px;
        position: relative;
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    .legal-inner ul li::before {
        content: '•';
        position: absolute;
        left: 8px;
        color: var(--teal-mid);
        font-weight: 700;
    }

    .legal-inner a {
        color: var(--terracotta);
        font-weight: 500;
    }

    .legal-inner strong {
        color: var(--charcoal);
    }

    .legal-contact {
        background: var(--cream);
        border-radius: 12px;
        padding: 28px 32px;
        margin-top: 40px;
        border: 1px solid var(--gray-line);
    }

    .legal-contact h3 {
        font-size: 18px;
        margin-bottom: 10px;
                color: var(--teal-darkest) !important;
    }

    .legal-contact p {
        margin-bottom: 4px;
    }


    @media (max-width: 900px) {
        .nav-links {
            display: none;
        }

        .legal-hero {
            padding: 50px 24px 60px;
        }

        .legal-content {
            padding: 40px 24px;
        }

    }
</style>

@section('mainContent')
    <header class="legal-hero">
        <h1>Terms of Service</h1>
        <p>Last updated: May 2, 2026</p>
    </header>

    <section class="legal-content">
        <div class="legal-inner">

            <h2>Agreement to Terms</h2>
            <p>By accessing or using the Merkaii Xcellence Prep website and services (operated by Merakii International
                Societe, Inc.), you agree to be bound by these Terms of Service. If you do not agree to these terms, please
                do
                not use our website or services.</p>

            <h2>Services Description</h2>
            <p>Merkaii Xcellence Prep provides educational coaching, tutoring, NCLEX preparation, nursing school academic
                support, and Florida Board of Nursing remediation services. Our services include online and in-person
                programs,
                digital courses, study materials, and educational consultations.</p>

            <h2>Eligibility</h2>
            <p>Our services are intended for individuals who are 18 years of age or older. By using our services, you
                represent that you meet this age requirement and have the legal capacity to enter into these terms.</p>

            <h2>Enrollment and Payment</h2>
            <p><strong>Program enrollment:</strong> Enrollment in coaching programs requires a consultation and may be
                subject
                to availability. We reserve the right to determine program fit during the consultation process.</p>
            <p><strong>Payment terms:</strong> All program fees are due as outlined at the time of enrollment. Payment
                plans,
                where available, are subject to the specific terms provided at enrollment. Late or missed payments may
                result in
                suspension of program access.</p>
            <p><strong>Refund policy:</strong> Refund eligibility varies by program and will be outlined in your enrollment
                agreement. Digital course purchases may be non-refundable after access has been granted. Please contact us
                to
                discuss specific refund requests.</p>

            <h2>User Conduct</h2>
            <p>When using our website and services, you agree not to:</p>
            <ul>
                <li>Reproduce, distribute, or share proprietary course materials, frameworks, or content (including the
                    NCLEX
                    PASS Method™ and related materials) without written permission</li>
                <li>Use our services for any unlawful purpose</li>
                <li>Impersonate another person or misrepresent your affiliation</li>
                <li>Interfere with the proper functioning of our website or services</li>
                <li>Harass, intimidate, or disrupt other students or staff members</li>
                <li>Share your account credentials with others</li>
            </ul>

            <h2>Intellectual Property</h2>
            <p>All content on this website — including text, graphics, logos, course materials, frameworks (NCLEX PASS
                Method™, PRIORITY-X Framework, NCLEX Safety Pyramid, and others), images, and software — is the property of
                Merakii International Societe, Inc. or its content creators and is protected by applicable intellectual
                property
                laws.</p>
            <p>You may not reproduce, distribute, modify, or create derivative works from our content without express
                written
                permission.</p>

            <h2>Disclaimer of Guarantees</h2>
            <p>While we are committed to providing high-quality educational services and have a strong track record of
                student
                outcomes, we cannot and do not guarantee specific results, including exam pass rates, academic grades, or
                program readmission. Individual outcomes depend on many factors including effort, study habits, prior
                preparation, and test-day conditions.</p>

            <h2>Limitation of Liability</h2>
            <p>To the maximum extent permitted by law, Merkaii Xcellence Prep, Merakii International Societe, Inc., and its
                officers, employees, and agents shall not be liable for any indirect, incidental, special, consequential, or
                punitive damages arising from your use of our services.</p>
            <p>Our total liability for any claim arising from these terms or our services shall not exceed the amount you
                paid
                for the specific service giving rise to the claim.</p>

            <h2>Third-Party Links</h2>
            <p>Our website may contain links to third-party websites or services. We are not responsible for the content,
                privacy practices, or terms of any third-party sites. Your use of third-party services is at your own risk.
            </p>

            <h2>Termination</h2>
            <p>We reserve the right to suspend or terminate your access to our services at any time for violations of these
                terms, disruptive behavior, or non-payment. You may terminate your use of our services at any time by
                contacting
                us, subject to any applicable refund policies.</p>

            <h2>Governing Law</h2>
            <p>These terms shall be governed by and construed in accordance with the laws of the State of Florida, without
                regard to conflict of law principles. Any disputes arising from these terms shall be resolved in the courts
                of
                Polk County, Florida.</p>

            <h2>Changes to Terms</h2>
            <p>We may update these Terms of Service from time to time. Changes will be posted on this page with an updated
                revision date. Your continued use of our services after changes are posted constitutes acceptance of the
                revised
                terms.</p>

            <div class="legal-contact">
                <h3>Questions About These Terms</h3>
                <p><strong>Merkaii Xcellence Prep</strong></p>
                <p>501 S. Florida Avenue, Lakeland, FL 33801</p>
                <p>Phone: <a href="tel:8632508764">(863) 250-8764</a></p>
                <p>Email: <a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a></p>
            </div>
        </div>
    </section>

    @include(theme('partials._custom_footer'))
@endsection
