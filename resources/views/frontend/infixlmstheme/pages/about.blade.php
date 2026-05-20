@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('common.About') }}
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{-- 
<style>
    .custom_section_color {
        background-color: #eee !important;
    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    @media (width > 1650px) {
        .breadcrumb_area .breadcam_wrap h3 {
            font-size: 100px !important;
            font-weight: 900;
            line-height: 76px;
            color: #fff;
        }

        p {
            font-size: 20px !important;
        }

        h5 {
            font-size: 25px !important;
        }

        .responsive_card {
            height: 500px !important;
        }

        .about_gallery_area .about_gallery {
            display: grid !important;
            grid-gap: 30px !important;
            align-items: center !important;
        }
    }

    @media only screen and (min-width: 2000px) {
        .about_gallery_area .about_gallery {}
    }
</style> --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,700&family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">


<style>
    :root {
        --teal-mid: #1A8A6F;
        --teal-deep: #0F6E56;
        --teal-darkest: #0A4D3C;
        --darkest-teal: #0A4D3C;
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
    }

    /* Hero */
    .hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        /* padding: 110px 32px 130px; */
        height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -150px;
        left: -100px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(245, 237, 224, 0.06) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
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
        border-radius: 30px;
    }

    .hero h1 {
        font-size: clamp(40px, 5.5vw, 64px);
        color: var(--white) !important;
        margin-bottom: 24px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .hero h1 em {
        font-style: italic;
        color: var(--cream);
        font-weight: 400;
    }

    .hero-sub {
        font-size: 19px;
        line-height: 1.7;
        color: var(--cream-warm);
        max-width: 720px;
        margin: 0 auto 36px;
    }

    .hero-tag {
        font-family: var(--serif) !important;
        font-style: italic;
        font-size: 18px;
        color: var(--cream);
        opacity: 0.9;
        border-top: 1px solid rgba(245, 237, 224, 0.2);
        padding-top: 28px;
        margin-top: 36px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 32px;
    }

    section {
        padding: 90px 0;
    }

    /* Mission Section */
    .mission-section {
        background: var(--cream);
    }

    .mission-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 80px;
        align-items: center;
    }

    .mission-quote-block {
        background: var(--white);
        border-left: 5px solid var(--terracotta);
        padding: 50px 44px;
        border-radius: 0 16px 16px 0;
        box-shadow: var(--shadow-md);
        position: relative;
    }

    .mission-quote-block::before {
        content: '"';
        position: absolute;
        top: -10px;
        left: 28px;
        font-family: var(--serif) !important;
        font-size: 120px;
        color: var(--terracotta);
        opacity: 0.2;
        line-height: 1;
    }

    .mission-quote {
        font-family: var(--serif) !important;
        font-style: italic;
        font-size: 28px;
        line-height: 1.4;
        color: var(--teal-darkest);
        margin-bottom: 24px;
        position: relative;
        z-index: 1;
    }

    .mission-quote-source {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--terracotta);
        font-weight: 600;
    }

    .mission-text h2 {
        font-size: clamp(34px, 4vw, 46px) !important;
        margin-bottom: 24px;
        color: var(--teal-darkest) !important;
        letter-spacing: -0.5px;
    }

    .mission-text .eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 16px;
    }

    .mission-text p {
        font-size: 16.5px;
        color: var(--charcoal-soft);
        line-height: 1.8;
        margin-bottom: 18px;
    }

    p{
        font-family: var(--sans) !important;
    }

    .mission-text p:last-child {
        margin-bottom: 0;
    }

    /* Origin Story */
    .origin-section {
        background: var(--white);
    }

    .origin-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: start;
    }

    .origin-text .eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 16px;
    }

    .origin-text h2 {
        font-size: clamp(32px, 4vw, 44px);
        margin-bottom: 24px;
        letter-spacing: -0.5px;
        color: var(--teal-darkest) !important;

    }

    .origin-text p {
        font-size: 16px;
        color: var(--charcoal-soft);
        line-height: 1.8;
        margin-bottom: 18px;
    }

    .origin-text .pullout {
        font-family: var(--serif) !important;
        font-size: 24px;
        font-style: italic;
        color: var(--terracotta);
        line-height: 1.4;
        padding: 24px 0;
        border-top: 1px solid var(--gray-line);
        border-bottom: 1px solid var(--gray-line);
        margin: 28px 0;
    }

    .origin-photo {
        background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-darkest) 100%);
        aspect-ratio: 4/5;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(245, 237, 224, 0.6);
        font-size: 14px;
        text-align: center;
        padding: 30px;
        line-height: 1.6;
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }

    .origin-photo::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    /* Timeline */
    .timeline-section {
        background: var(--cream);
        position: relative;
    }

    .section-header {
        text-align: center;
        max-width: 720px;
        margin: 0 auto 70px;
    }

    .section-eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 16px;
    }

    .section-header h2 {
        font-size: clamp(34px, 4vw, 46px);
        margin-bottom: 16px;
        letter-spacing: -0.5px;
        color: var(--teal-darkest) !important;
    }

    .section-header p {
        font-size: 17px;
        color: var(--charcoal-soft);
        line-height: 1.6;
    }

    .timeline {
        max-width: 880px;
        margin: 0 auto;
        position: relative;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 110px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, transparent 0%, var(--terracotta) 8%, var(--terracotta) 92%, transparent 100%);
    }

    .timeline-item {
        display: grid;
        grid-template-columns: 100px 60px 1fr;
        gap: 0;
        margin-bottom: 50px;
        align-items: start;
        position: relative;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-year {
        font-family: var(--serif) !important;
        font-size: 32px;
        font-weight: 700;
        color: var(--teal-darkest);
        line-height: 1;
        padding-top: 6px;
        text-align: right;
        padding-right: 18px;
    }

    .timeline-dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: var(--terracotta);
        border: 4px solid var(--cream);
        box-shadow: 0 0 0 2px var(--terracotta);
        margin-left: 0;
        margin-top: 10px;
        position: relative;
        z-index: 1;
        justify-self: start;
        margin-left: 8px;
    }

    .timeline-content {
        background: var(--white);
        padding: 30px 36px;
        border-radius: 14px;
        border: 1px solid var(--gray-line);
        box-shadow: var(--shadow-sm);
        margin-left: 28px;
        transition: all 0.3s;
    }

    .timeline-content:hover {
        transform: translateX(4px);
        box-shadow: var(--shadow-md);
    }

    .timeline-content h3 {
        font-size: 22px;
        margin-bottom: 8px;
        line-height: 1.3;
        color: var(--teal-darkest) !important;
    }

    .timeline-location {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--terracotta);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .timeline-content p {
        font-size: 15px;
        color: var(--charcoal-soft);
        line-height: 1.7;
    }

    /* Track Record / Stats */
    .track-section {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        position: relative;
        overflow: hidden;
    }

    .track-section::before {
        content: '';
        position: absolute;
        top: -150px;
        left: -100px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .track-section::after {
        content: '';
        position: absolute;
        bottom: -150px;
        right: -100px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(245, 237, 224, 0.06) 0%, transparent 70%);
        border-radius: 50%;
    }

    .track-section .container {
        position: relative;
        z-index: 1;
    }

    .track-section .section-header h2 {
        color: var(--white) !important;
    }

    .track-section .section-header p {
        color: var(--cream-warm);
    }

    .track-section .section-eyebrow {
        color: var(--terracotta);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        max-width: 1100px;
        margin: 0 auto 60px;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(245, 237, 224, 0.15);
        border-radius: 14px;
        padding: 36px 24px;
        text-align: center;
        backdrop-filter: blur(10px);
        transition: all 0.3s;
    }

    .stat-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--terracotta);
        transform: translateY(-4px);
    }

    .stat-number {
        font-family: var(--serif) !important;
        font-size: 56px;
        font-weight: 700;
        color: var(--terracotta);
        line-height: 1;
        margin-bottom: 8px;
        letter-spacing: -1px;
    }

    .stat-number small {
        font-size: 30px;
    }

    .stat-label {
        font-size: 13px;
        color: var(--cream);
        font-weight: 500;
        line-height: 1.5;
    }

    .credentials-band {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(245, 237, 224, 0.15);
        border-radius: 14px;
        padding: 36px 40px;
        max-width: 900px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 32px;
        backdrop-filter: blur(10px);
    }

    .credentials-flag {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        background: var(--terracotta);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--serif) !important;
        font-size: 24px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .credentials-text h3 {
        color: var(--white);
        font-size: 22px;
        margin-bottom: 8px;
    }

    .credentials-text p {
        color: var(--cream-warm);
        font-size: 14.5px;
        line-height: 1.6;
        margin-bottom: 12px;
    }

    .credentials-link {
        color: var(--terracotta);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .credentials-link:hover {
        color: var(--cream);
    }

    /* Methodology */
    .method-section {
        background: var(--white);
    }

    .method-grid {
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 70px;
        align-items: start;
    }

    .method-text h2 {
        font-size: clamp(32px, 4vw, 44px);
        margin-bottom: 20px;
        letter-spacing: -0.5px;
        color: var(--teal-darkest) !important;
    }

    .method-text .eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 16px;
    }

    .method-text .tagline {
        font-family: var(--serif) !important;
        font-style: italic;
        font-size: 20px;
        color: var(--terracotta);
        margin-bottom: 24px;
    }

    .method-text p {
        font-size: 16px;
        color: var(--charcoal-soft);
        line-height: 1.8;
    }

    .method-pillars {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .pillar {
        background: var(--cream);
        border-radius: 14px;
        padding: 28px 32px;
        display: grid;
        grid-template-columns: 60px 1fr;
        gap: 24px;
        align-items: center;
        transition: all 0.3s;
        border: 1px solid var(--gray-line);
    }

    .pillar:hover {
        background: var(--cream-warm);
        transform: translateX(4px);
        border-color: var(--terracotta);
    }

    .pillar-mark {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--white);
        border: 2px solid var(--terracotta);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--serif) !important;
        font-size: 24px;
        font-weight: 700;
        color: var(--terracotta);
    }

    .pillar h4 {
        font-size: 19px;
        color: var(--teal-darkest);
        margin-bottom: 4px;
    }

    .pillar p {
        font-size: 14px;
        color: var(--charcoal-soft);
        margin: 0;
        line-height: 1.6;
    }

    /* Team Section */
    .team-section {
        background: var(--cream);
    }

    .team-band {
        background: var(--white);
        border-radius: 20px;
        padding: 60px 70px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-line);
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 60px;
        align-items: center;
    }

    .team-visual {
        background: linear-gradient(135deg, var(--terracotta) 0%, var(--terracotta-deep) 100%);
        border-radius: 14px;
        aspect-ratio: 1/1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--white);
        padding: 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .team-visual::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .team-visual-icon {
        font-family: var(--serif) !important;
        font-size: 80px;
        line-height: 1;
        margin-bottom: 14px;
        position: relative;
        z-index: 1;
    }

    .team-visual-text {
        font-family: var(--serif) !important;
        font-style: italic;
        font-size: 17px;
        line-height: 1.5;
        position: relative;
        z-index: 1;
    }

    .team-content .eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--terracotta);
        margin-bottom: 16px;
    }

    .team-content h2 {
        font-size: clamp(28px, 3.5vw, 38px);
        margin-bottom: 18px;
        letter-spacing: -0.5px;
        color: var(--teal-darkest) !important;
    }

    .team-content p {
        font-size: 16px;
        color: var(--charcoal-soft);
        line-height: 1.8;
        margin-bottom: 16px;
    }

    .team-content p:last-child {
        margin-bottom: 0;
    }

    .team-content .pullout {
        font-family: var(--serif) !important;
        font-style: italic;
        font-size: 18px;
        color: var(--teal-darkest);
        margin: 24px 0 8px;
        padding-left: 18px;
        border-left: 3px solid var(--terracotta);
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 100px 32px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .final-cta::before {
        content: '';
        position: absolute;
        top: -150px;
        left: 50%;
        transform: translateX(-50%);
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(198, 93, 58, 0.15) 0%, transparent 70%);
        border-radius: 50%;
    }

    .final-cta-inner {
        max-width: 720px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .final-cta h2 {
        color: var(--white);
        font-size: clamp(34px, 4vw, 46px);
        margin-bottom: 18px;
    }

    .final-cta h2 em {
        font-style: italic;
        color: var(--cream);
    }

    .final-cta p {
        font-size: 18px;
        color: var(--cream-warm);
        margin-bottom: 36px;
        line-height: 1.7;
    }

    .btn-primary {
        background: var(--terracotta);
        color: var(--white);
        padding: 16px 40px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.2s;
        display: inline-block;
        border: 2px solid var(--terracotta);
    }

    .btn-primary:hover {
        background: var(--terracotta-deep);
        border-color: var(--terracotta-deep);
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: transparent;
        color: var(--white);
        padding: 16px 40px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.2s;
        display: inline-block;
        border: 2px solid var(--cream);
        margin-left: 12px;
    }

    .btn-secondary:hover {
        background: var(--cream);
        color: var(--teal-darkest);
    }

    .final-cta-reassure {
        margin-top: 32px;
        font-family: var(--serif) !important;
        font-style: italic;
        color: var(--cream);
        font-size: 17px;
        opacity: 0.85;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .nav-links {
            display: none;
        }

        .mission-grid,
        .origin-grid,
        .method-grid {
            grid-template-columns: 1fr;
            gap: 50px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .credentials-band {
            flex-direction: column;
            text-align: center;
            padding: 28px;
        }

        .team-band {
            grid-template-columns: 1fr;
            padding: 40px 30px;
            gap: 36px;
        }

        .timeline::before {
            left: 20px;
        }

        .timeline-item {
            grid-template-columns: 50px 1fr;
            gap: 16px;
        }

        .timeline-year {
            grid-column: 1 / -1;
            text-align: left;
            padding-left: 50px;
            padding-right: 0;
            padding-top: 0;
            padding-bottom: 8px;
            font-size: 26px;
        }

        .timeline-dot {
            margin-left: 6px;
            margin-top: 8px;
        }

        .timeline-content {
            margin-left: 0;
            padding: 22px 24px;
        }

        .btn-secondary {
            margin-left: 0;
            margin-top: 12px;
        }
    }
</style>


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        (function($) {
            "use strict";

            var fullHeight = function() {
                $(".js-fullheight").css("height", $(window).height());
                $(window).resize(function() {
                    $(".js-fullheight").css("height", $(window).height());
                });
            };
            fullHeight();

            var carousel = function() {

                $(".owl-carousel").owlCarousel({
                    loop: true,
                    autoplay: false,
                    // autoplayTimeout: 4000,
                    // navigation : true,

                    margin: 30,
                    animateOut: "fadeOut",
                    animateIn: "fadeIn",
                    nav: true,
                    dots: false,
                    items: 3,
                    // navText: [
                    //   "<p><small>Prev</small><span class='ion-ios-arrow-round-back'></span></p>",
                    //   "<p><small>Next</small><span class='ion-ios-arrow-round-forward'></span></p>",
                    // ],

                    // responsive: {
                    //   0: {
                    //     items: 1,
                    //   },
                    //   600: {
                    //     items: 1,
                    //   },
                    //   1000: {
                    //     items: 1,
                    //   },
                    // },
                });
            };
            carousel();
        })(jQuery);
        jQuery(document).ready(function($) {
            // $('.owl-carousel').find('.owl-nav').removeClass('disabled');
            //     $('.owl-carousel').on('changed.owl.carousel', function(event) {
            //         $(this).find('.owl-nav').removeClass('disabled');
            //     });
        });
    </script>
    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const counterSections = document.querySelectorAll('.counter_area');

            counterSections.forEach((section) => {
                const counterItems = section.querySelectorAll('.single_counter');
                counterItems.forEach((item, index) => {
                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        opacity: 0,
                        x: -50,
                        duration: 0.9,
                        delay: index * 0.3,
                    });
                });
            });
        }
        handleScroll();
    </script>

    <script>
        function handleScroll() {
            gsap.registerPlugin(ScrollTrigger);
            const instructorSections = document.querySelectorAll('.service_cta_row');

            instructorSections.forEach((section) => {
                const instructorItems = section.querySelectorAll('.single_cta_service');
                instructorItems.forEach((item, index) => {
                    let animationProps = {
                        opacity: 0,
                        duration: 1,
                        delay: index * 0.4,
                    };

                    if (index === 0) {
                        animationProps.x = -200;
                    } else if (index === instructorItems.length - 1) {
                        animationProps.x = 200;
                    } else {
                        animationProps.y = -200;
                    }

                    gsap.from(item, {
                        scrollTrigger: {
                            trigger: item,
                            start: 'top 80%',
                            toggleActions: 'play none none none',
                        },
                        ...animationProps
                    });
                });
            });
        }
        handleScroll();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection

{{-- @section('mainContent')
    <x-breadcrumb :banner="$frontendContent->about_page_banner" :title="$frontendContent->about_page_title" :subTitle="$frontendContent->about_page_title" />
    @include('frontend.infixlmstheme.pages.stepper')

    @if ($about->show_become_instructor)
        <x-about-page-become-instructor :frontendContent="$frontendContent" />
    @endif


    <x-about-page-gallery :about="$about" />

    <x-about-page-students-work />

    <div class="container px-xl-5 px-lg-4 px-3 py-5">
        <div class="row gap-3 px-lg-5">
            <div class="col-lg-4 text-center" style="background-color: #f6f4ee6f; padding: 5rem 2rem">
                <h1 class="mb-4 fw-semibold">
                    We
                    are
                    better
                    together
                </h1>
                <p>Drop Your Contact Details Into the form, and we'll reach out to you</p>
            </div>
            <div class="col-lg" style="background-color: #F6F4EE; padding: 5rem 0; border-radius: 15px">
                <div class="row gx-0 gy-4 px-5 py-4">
                    <div class="form-floating col-lg-6 ps-0">
                        <input type="name" class="form-control input_shadow" id="name" placeholder="Name">
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating col-lg-6 ps-0">
                        <input type="email" class="form-control input_shadow" id="phone" placeholder="Phone No">
                        <label for="phone">Phone No</label>
                    </div>

                    <div class="form-floating col-lg-12 ps-0">
                        <input type="email" class="form-control input_shadow" id="email"
                            placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>

                    <div class="form-floating col-lg-6 ps-0">
                        <input type="email" class="form-control input_shadow" id="subject"
                            placeholder="name@example.com">
                        <label for="subject">Subject</label>
                    </div>

                    <div class="form-floating col-lg-6 ps-0">
                        <input type="text" class="form-control input_shadow" id="message"
                            placeholder="name@example.com">
                        <label for="message">Message</label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($about->show_brand)
        <x-about-page-brand />
    @endif

    @include(theme('partials._custom_footer'))
@endsection --}}


@section('mainContent')
    <x-breadcrumb :banner="$frontendContent->about_page_banner" :title="$frontendContent->about_page_title" :subTitle="$frontendContent->about_page_title" />
    {{-- @include('frontend.infixlmstheme.pages.stepper') --}}


    <!-- MISSION -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-quote-block">
                    <p class="mission-quote">We don't believe a failed attempt is a verdict on your future. We believe it's
                        the beginning of a better strategy.</p>
                    <p class="mission-quote-source">— The Merkaii Mission</p>
                </div>
                <div class="mission-text">
                    <span class="eyebrow">Our Mission</span>
                    <h2>To rebuild what the system breaks.</h2>
                    <p>Nursing education in the United States produces brilliant, capable students who fail standardized
                        exams not because they aren't ready to be nurses — but because they were never taught how to think
                        under the pressure of those exams. The system has a content problem, a process problem, and a
                        confidence problem. Most prep programs fix one of those, charge for it, and call it a day.</p>
                    <p>Merkaii Xcellence Prep was built to fix all three. Our work begins where most programs end: with the
                        student who has already tried, already failed, and already been told — explicitly or quietly — that
                        maybe nursing isn't for them.</p>
                    <p>It is. We've seen it 1,500 times.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ORIGIN STORY -->
    <section class="origin-section">
        <div class="container">
            <div class="origin-grid">
                <div class="origin-text">
                    <span class="eyebrow">How It Began</span>
                    <h2>It started in a basement.</h2>
                    <p>In 2015, a single nurse educator in New York opened her home basement to nursing students who had
                        nowhere else to turn. There was no school, no curriculum brand, no marketing — just one tutor who
                        had failed the NCLEX herself, refused to let that be the ending of her own story, and decided that
                        other students deserved someone who understood that fear from the inside.</p>
                    <p>One student turned into five. Five turned into a steady stream of nurses passing exams that had
                        defeated them once before. Word traveled — across boroughs, across states, across the kind of
                        underground network that nursing students rely on when the official channels have stopped working
                        for them.</p>
                    <p class="pullout">By 2019, what had begun in a basement had grown into something that needed a real
                        home — and a much bigger vision.</p>
                    <p>That vision was Florida: a state with one of the largest nursing populations in the country, a Board
                        with rigorous remediation requirements, and thousands of nurses who needed exactly the kind of
                        program that had been quietly rebuilt one student at a time in New York.</p>
                    <p>The journey from basement to Board approval took three years of curriculum development, regulatory
                        review, and refusing to compromise on the methodology that had worked from the very first session.
                        In 2022, the Florida Board of Nursing granted approval. Today, that same student-first methodology
                        serves nurses across every pathway — and the basement origin still shapes everything we do.</p>
                </div>
                <div class="origin-photo">
                    [Founder portrait or origin imagery<br>Recommended: warm, candid<br>700 × 875px]
                </div>
            </div>
        </div>
    </section>

    <!-- TIMELINE -->
    <section class="timeline-section">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow">The Journey</span>
                <h2>A decade of building.</h2>
                <p>From private tutoring to Florida Board of Nursing approval — the milestones that shaped Merkaii Xcellence
                    Prep.</p>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-year">2015</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>The Basement Begins</h3>
                        <div class="timeline-location">New York</div>
                        <p>Private NCLEX tutoring opens out of a home basement in NY. The first cohort of students — most of
                            them repeat test-takers turned away by larger programs — quietly begin to pass. The methodology
                            that would become the NCLEX PASS Method™ takes shape, one student at a time.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2019</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>The Florida Vision</h3>
                        <div class="timeline-location">Lakeland, FL</div>
                        <p>Four years of basement-tested results spark a bigger idea: a formal nursing prep school in
                            Florida, built to serve the state's enormous and underserved population of repeat test-takers,
                            IENs, and students navigating Board of Nursing requirements. The curriculum is documented. The
                            vision is filed. The work begins.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2022</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>Florida Board of Nursing Approval</h3>
                        <div class="timeline-location">Lakeland, FL</div>
                        <p>After three years of curriculum review and regulatory diligence, the Florida Board of Nursing
                            grants approval to operate as Merakii College of Health — a recognized provider of remedial
                            coursework for Registered Nurses. What started in a basement is now listed on the official .gov
                            page.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">Today</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3>Where We Stand</h3>
                        <div class="timeline-location">Serving Nurses Nationwide</div>
                        <p>Over 1,500 students served. A 95% pass rate. Programs spanning FL BON Remediation, NCLEX Success
                            Coaching, Nursing School Success, and the Nursing Comeback Program. The student-first conviction
                            that filled a basement in 2015 still drives every decision — only now, it's backed by a
                            Board-approved curriculum, a coaching team, and a community of nurses who refuse to give up on
                            themselves.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRACK RECORD -->
    <section class="track-section">
        <div class="container">
            <div class="section-header">
                <span class="section-eyebrow">By the Numbers</span>
                <h2>A track record built on real students.</h2>
                <p>The most important credential we hold is the trust of the nurses who let us walk with them through the
                    hardest stretch of their careers.</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">1,500<small>+</small></div>
                    <div class="stat-label">Nursing students served since 2019</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">95<small>%</small></div>
                    <div class="stat-label">Pass rate across all programs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">13<small>+</small></div>
                    <div class="stat-label">Years of nurse-led education</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">2022</div>
                    <div class="stat-label">FL Board of Nursing approval granted</div>
                </div>
            </div>

            <div class="credentials-band">
                <div class="credentials-flag">FL</div>
                <div class="credentials-text">
                    <h3>Florida Board of Nursing-Approved Provider</h3>
                    <p>Operating as <strong>Merakii College of Health</strong> — listed on the official Florida Board of
                        Nursing approved providers page under Registered Nurse Courses. A regulated, verifiable credential,
                        not a marketing claim.</p>
                    <a href="https://floridasnursing.gov/florida-board-of-nursing-approved-remedial-courses/"
                        target="_blank" rel="noopener" class="credentials-link">
                        Verify on FL BON Website →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- METHODOLOGY -->
    <section class="method-section">
        <div class="container">
            <div class="method-grid">
                <div class="method-text">
                    <span class="eyebrow">Our Methodology</span>
                    <h2>The NCLEX PASS Method™</h2>
                    <p class="tagline">Content + Process + Confidence</p>
                    <p>Most prep programs sell content and call it done. The NCLEX PASS Method™ is built on three layers
                        because passing a licensing exam — and staying passed — requires all three working in concert. Every
                        Merkaii program is engineered around this framework, from FL BON Remediation to Nursing School
                        Success.</p>
                </div>
                <div class="method-pillars">
                    <div class="pillar">
                        <div class="pillar-mark">C</div>
                        <div>
                            <h4>Content Mastery</h4>
                            <p>Strategic, prioritized review of the high-yield content that actually appears on the exam —
                                not a 600-page textbook dump.</p>
                        </div>
                    </div>
                    <div class="pillar">
                        <div class="pillar-mark">P</div>
                        <div>
                            <h4>Process & Strategy</h4>
                            <p>The PRIORITY-X Framework, NCLEX Safety Pyramid, and Question Analysis System — how to
                                <em>think</em> on test day, not just what to know.</p>
                        </div>
                    </div>
                    <div class="pillar">
                        <div class="pillar-mark">C</div>
                        <div>
                            <h4>Confidence & Mindset</h4>
                            <p>The mental side of testing — coaching that addresses anxiety, second-guessing, and the
                                residue of past failed attempts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section class="team-section">
        <div class="container">
            <div class="team-band">
                <div class="team-visual">
                    <div class="team-visual-icon">M</div>
                    <div class="team-visual-text">A founder, a coaching team, and a community of nurses who didn't give up.
                    </div>
                </div>
                <div class="team-content">
                    <span class="eyebrow">The People Behind the Program</span>
                    <h2>Founder-led. Team-supported. Student-driven.</h2>
                    <p>Merkaii Xcellence Prep is led by its founder — a nurse, health educator, and college instructor whose
                        own NCLEX failure became the methodology's first proof of concept. Her name is on the Florida Board
                        of Nursing's official approved providers page because regulated remediation requires a real, named,
                        accountable administrator. That accountability is the floor, not the ceiling.</p>
                    <p>Behind every cohort is a coaching team of licensed nurse educators and learning specialists who
                        deliver the live sessions, run the Decision Labs, and provide the 1-on-1 support our higher tiers
                        offer. Behind them is a growing community of past students who continue to mentor, encourage, and
                        quietly refer the next nurse who needs a way back in.</p>
                    <p class="pullout">The program isn't one person. It's a methodology, a team, and a community — built on
                        a single conviction that hasn't changed since 2015.</p>
                    <a href="programs.html" class="btn-primary" style="margin-top: 24px;">Explore Our Programs →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta" id="consult">
        <div class="final-cta-inner">
            <h2>Ready to start <em>your</em> comeback?</h2>
            <p>Whether you're staring down a remediation order, a failed attempt, or a nursing program that's pushing you to
                your edge — there's a path here. Book a free consultation and we'll walk it with you.</p>
            <a href="contact.html" class="btn-primary">Book a Free Consultation →</a>
            <a href="programs.html" class="btn-secondary">View Programs</a>
            <p class="final-cta-reassure">"A struggling student is not a failing student."</p>
        </div>
    </section>



    @include(theme('partials._custom_footer'))
@endsection
