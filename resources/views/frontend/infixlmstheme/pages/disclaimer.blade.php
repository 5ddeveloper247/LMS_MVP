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
        font-size: 24px !important;
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
        color: var(--charcoal-soft);
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
    }

    .legal-contact p {
        margin-bottom: 4px;
    }

    .disclaimer-callout {
        background: var(--cream-warm);
        border-radius: 12px;
        padding: 28px 32px;
        margin: 30px 0;
        border-left: 5px solid var(--terracotta);
    }

    .disclaimer-callout p {
        font-weight: 500;
        color: var(--charcoal);
        margin-bottom: 0;
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
        <h1>Disclaimer</h1>
        <p>Last updated: May 2, 2026</p>
    </header>

    <section class="legal-content">
        <div class="legal-inner">

            <h2>Educational Services Disclaimer</h2>
            <p>Merkaii Xcellence Prep, operated by Merakii International Societe, Inc., provides educational coaching,
                tutoring, NCLEX preparation, nursing school academic support, and Florida Board of Nursing (FL BON)
                remediation
                services. The information and services provided through our website, programs, and consultations are
                intended
                for educational purposes only.</p>
            <div class="disclaimer-callout">
                <p>Our programs are educational in nature. We are not a nursing school, accredited academic institution,
                    medical
                    provider, or legal services firm. Nothing on this website or in our programs should be construed as
                    medical,
                    legal, or professional licensing advice.</p>
            </div>

            <h2>No Guarantee of Outcomes</h2>
            <p>While Merkaii Xcellence Prep has a strong track record of student success and maintains high standards across
                all of our programs, we cannot and do not guarantee specific outcomes. This includes but is not limited to:
            </p>
            <ul>
                <li>NCLEX examination pass rates or scores</li>
                <li>Nursing school grades, GPA improvements, or academic standing changes</li>
                <li>Readmission to nursing programs after academic dismissal</li>
                <li>Successful completion of FL BON remediation requirements</li>
                <li>Employment or licensure outcomes</li>
            </ul>
            <p>Individual results depend on many factors including personal effort, study habits, prior academic
                preparation,
                program adherence, test-day conditions, and institutional policies. Past student outcomes referenced on this
                site are based on real experiences but are not predictive of future results.</p>

            <h2>Not Medical Advice</h2>
            <p>Our services focus exclusively on academic preparation and educational coaching. Nothing provided through
                Merkaii Xcellence Prep — including content on our website, discussions during consultations, or materials
                within
                our programs — constitutes medical advice, clinical guidance, or healthcare recommendations.</p>
            <p>If you have questions about your health, a medical condition, or clinical practice, please consult a
                qualified
                healthcare provider.</p>

            <h2>Not Legal Advice</h2>
            <p>While our FL BON Remediation Program assists students in completing Board-ordered remediation, we do not
                provide legal advice. Our team is not composed of attorneys and cannot advise you on legal matters related
                to
                your nursing license, disciplinary proceedings, or regulatory compliance.</p>
            <p>If you have legal questions about a Board of Nursing action, licensing matter, or disciplinary proceeding,
                please consult a qualified attorney who specializes in professional licensing or healthcare law.</p>

            <h2>FL BON Remediation Specifics</h2>
            <p>Our FL BON Remediation Program is designed to help students fulfill remediation requirements as outlined by
                the
                Florida Board of Nursing. However:</p>
            <ul>
                <li>Merkaii Xcellence Prep does not represent the Florida Board of Nursing and cannot speak on behalf of the
                    Board</li>
                <li>Final acceptance of remediation completion is at the sole discretion of the FL BON</li>
                <li>Board requirements may change, and it is the student's responsibility to verify current requirements
                    with
                    the FL BON directly</li>
                <li>Enrollment in our program does not guarantee that the Board will accept our remediation plan or
                    documentation</li>
            </ul>

            <h2>Non-Remediation Programs</h2>
            <p>Our NCLEX Success Coaching Program™, Nursing School Success Program, and Nursing Comeback Program are
                educational support services. They are not state-mandated remediation programs and do not fulfill Florida
                Board
                of Nursing remediation orders. If you have been ordered to complete remediation by the FL BON, please see
                our
                dedicated <a href="remediation.html">FL BON Remediation Program</a>.</p>

            <h2>Proprietary Frameworks</h2>
            <p>Our proprietary educational frameworks — including the NCLEX PASS Method™, PRIORITY-X Framework, NCLEX Safety
                Pyramid, Clinical Decision Matrix, and others — are educational tools developed by Merkaii Xcellence Prep.
                They
                are designed to support learning and test preparation. These frameworks are not endorsed by, affiliated
                with, or
                approved by the National Council of State Boards of Nursing (NCSBN), any state Board of Nursing, or any
                nursing
                accreditation body.</p>

            <h2>Testimonials and Success Stories</h2>
            <p>Testimonials, reviews, and success stories displayed on our website reflect individual student experiences.
                They are shared with permission and may have been edited for clarity or length. These accounts are not
                guarantees of similar outcomes for other students. Every student's situation, effort level, and
                circumstances
                are different.</p>

            <h2>Third-Party Content and Links</h2>
            <p>Our website may contain links to third-party websites, resources, or tools. Merkaii Xcellence Prep is not
                responsible for the accuracy, content, or availability of external sites. Inclusion of a link does not imply
                endorsement of the linked site or its content.</p>

            <h2>Website Accuracy</h2>
            <p>We make every effort to keep the information on our website accurate and up to date. However, we do not
                warrant
                that all content is error-free, complete, or current. Program details, pricing, availability, and other
                information are subject to change without notice. For the most current information, please <a
                    href="contact.html">contact us directly</a>.</p>

            <h2>Limitation of Liability</h2>
            <p>To the fullest extent permitted by applicable law, Merkaii Xcellence Prep, Merakii International Societe,
                Inc.,
                and its officers, employees, agents, and affiliates shall not be held liable for any direct, indirect,
                incidental, special, or consequential damages resulting from the use of or inability to use our website,
                services, or educational materials.</p>

            <h2>Questions About This Disclaimer</h2>
            <p>If you have questions about this disclaimer or need clarification on any of our services, we encourage you to
                reach out. We're committed to transparency and want you to make informed decisions about your education.</p>

            <div class="legal-contact">
                <h3>Contact Us</h3>
                <p><strong>Merkaii Xcellence Prep</strong></p>
                <p>501 S. Florida Avenue, Lakeland, FL 33801</p>
                <p>Phone: <a href="tel:8632508764">(863) 250-8764</a></p>
                <p>Email: <a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a></p>
            </div>
        </div>
    </section>

    @include(theme('partials._custom_footer'))
@endsection
