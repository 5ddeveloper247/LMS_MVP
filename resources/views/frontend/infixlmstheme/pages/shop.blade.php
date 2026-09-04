@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('courses.Courses') }}
@endsection
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
{{-- @section('css') --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .accent-color {
        accent-color: #ff7600 !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 37px !important;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 36px !important;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 37px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
    }

    .footerbox h4 {
        font-weight: 700;
        color: white;
        font-size: 35px;
    }

    .footerbox {

        padding: 25px;

        margin-left: 0%;

    }

    .breadcam_wrap {
        max-width: unset !important;
    }

    .rounded-card {
        border-radius: 25px !important;
    }

    .rounded-card-header {
        border-radius: 25px !important;
    }

    .rounded-card-img {
        border-top-left-radius: 25px !important;
        border-top-right-radius: 25px !important;
    }

    .section-margin-y {
        margin: 60px auto !important;
    }

    #filter_btn {
        color: #ff7600 !important;
    }

    .bs-canvas-overlay {
        opacity: 0.85;
        z-index: 1000;
    }

    .bs-canvas {
        top: 0;
        z-index: 1000;
        padding: 130px 30px 40px 40px;
        overflow-x: hidden;
        overflow-y: auto;
        width: 330px;
        transition: margin .4s ease-out;
        -webkit-transition: margin .4s ease-out;
        -moz-transition: margin .4s ease-out;
        -ms-transition: margin .4s ease-out;
    }

    .bs-canvas-left {
        left: 0;
        margin-left: -330px;
    }

    .bs-canvas-right {
        right: 0;
        margin-right: -330px;
    }

    .img-thumb {
        object-fit: none;
    }

    @media only screen and (max-width: 350px) {

        h2,
        h3 {
            font-size: 14px !important;
        }

        .filter_btn {
            font-size: 12px !important;
        }

        .course-small {
            font-size: 12px !important;
        }
    }

    @media only screen and (min-width: 359px) and (max-width: 767px) {

        h2,
        h3 {
            font-size: 17px !important;
        }

        .course-small {
            font-size: 13px !important;
        }
    }

    @media only screen and (min-width: 1800px) {
        .thumb-height {
            height: 400px;
        }

        .img-thumb {
            object-fit: cover;
        }
    }
</style>
<style>
    .object-fit-cover {
        object-fit: cover
    }

    .fw-bold {
        font-weight: 700;
    }

    h6 {
        font-weight: 600;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }

    @media (min-width: 1800px) {
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
    }
</style> --}}
{{-- @endsection --}}



   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link  href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
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

    /* ============ HERO ============ */
    .hero {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
      color: var(--white);
      padding: 80px 32px 90px;
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
      font-size: clamp(38px, 5vw, 56px);
      color: var(--white);
      margin-bottom: 22px;
      font-weight: 700;
      letter-spacing: -1px;
    }

    .hero h1 em {
      font-style: italic;
      color: var(--cream);
      font-weight: 400;
    }

    .hero-sub {
      font-size: 18px;
      line-height: 1.7;
      color: var(--cream-warm);
      max-width: 620px;
      margin: 0 auto;
      font-family: var(--sans) !important;
    }
    .hero-tag{
        display: none;
    }

    /* ============ BREADCRUMB ============ */
    .breadcrumb {
      background: var(--cream-warm);
      padding: 12px 32px;
      font-size: 13px;
      color: var(--charcoal-soft);
    }

    .breadcrumb-inner {
      max-width: 1200px;
      margin: 0 auto;
    }

    .breadcrumb a {
      color: var(--teal-mid);
      text-decoration: none;
    }

    .breadcrumb a:hover {
      color: var(--terracotta);
    }

    .breadcrumb span {
      margin: 0 8px;
      opacity: 0.5;
    }

    /* ============ CATEGORY TABS ============ */
    .tabs-section {
      background: var(--white);
      padding: 0 32px;
      border-bottom: 1px solid var(--gray-line);
      position: sticky;
      top: 56px;
      z-index: 50;
    }

    .tabs-inner {
      max-width: 1080px;
      margin: 0 auto;
      display: flex;
      gap: 0;
    }

    .tab-btn {
      background: none;
      border: none;
      border-bottom: 3px solid transparent;
      padding: 18px 28px;
      font-family: var(--sans);
      font-size: 14px;
      font-weight: 600;
      color: var(--charcoal-soft);
      cursor: pointer;
      transition: all 0.2s;
      letter-spacing: 0.3px;
    }

    .tab-btn:hover {
      color: var(--teal-mid);
    }

    .tab-btn.active {
      color: var(--terracotta);
      border-bottom-color: var(--terracotta);
    }

    /* ============ PRODUCTS SECTION ============ */
    .products-section {
      background: var(--white);
      padding: 60px 32px 100px;
    }

    .products-inner {
      max-width: 1080px;
      margin: 0 auto;
    }

    .category-group {
      margin-bottom: 60px;
    }

    .category-group:last-child {
      margin-bottom: 0;
    }

    .category-header {
      margin-bottom: 32px;
    }

    .category-header h2 {
      font-size: 30px !important;
      color: var(--teal-darkest) !important;
      margin-bottom: 8px !important;
    }

    .category-header p {
      font-size: 15px;
      color: var(--charcoal-soft);
      line-height: 1.65;
      font-family: var(--sans) !important;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .shop-card-hidden {
      display: none !important;
    }

    .shop-load-more-wrap {
      text-align: center;
      margin-top: 36px;
    }

    .shop-load-more {
      background: var(--terracotta);
      color: var(--white);
      border: none;
      padding: 12px 28px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      font-family: var(--sans);
      cursor: pointer;
      transition: background 0.2s;
    }

    .shop-load-more:hover {
      background: var(--terracotta-deep);
    }

    .product-card {
      background: var(--cream);
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid var(--gray-line);
      transition: all 0.25s;
      display: flex;
      flex-direction: column;
    }

    .product-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }

    .product-card.featured-product {
      border: 2px solid var(--terracotta);
    }

    .product-image {
      aspect-ratio: 4/3;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      font-family: var(--serif);
      font-style: italic;
      font-size: 15px;
      text-align: center;
      padding: 24px;
      position: relative;
    }

    .product-image.guides {
      background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-darkest) 100%);
    }

    .product-image.books {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, #063D2F 50%, var(--teal-deep) 100%);
    }

    .product-image.tools {
      background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
    }

    .product-image.merch {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, #063D2F 100%);
    }

    .product-image.coming-soon {
      background: linear-gradient(135deg, #7BA99C 0%, #5C8F80 100%);
      opacity: 0.7;
    }

    .product-badge {
      position: absolute;
      top: 14px;
      left: 14px;
      background: var(--terracotta);
      color: var(--white);
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 30px;
      font-family: var(--sans);
      font-style: normal;
    }

    .product-badge.soon {
      background: var(--charcoal-soft);
    }

    .product-body {
      padding: 24px;
      flex: 1;
      display: flex;
      flex-direction: column;
      background: var(--white);
    }

    .product-tag {
      font-size: 10px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-weight: 600;
      margin-bottom: 8px;
    }

    .product-card h3 {
      font-size: 18px;
      color: var(--teal-darkest);
      margin-bottom: 8px;
    }

    .product-card p {
      font-size: 13.5px;
      line-height: 1.6;
      color: var(--charcoal-soft);
      margin-bottom: 18px;
      flex: 1;
      font-family: var(--sans) !important;
    }

    .product-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 16px;
      border-top: 1px solid rgba(0, 0, 0, 0.06);
    }

    .product-price {
      font-family: var(--serif);
      font-weight: 700;
      font-size: 22px;
      color: var(--terracotta);
    }

    .product-price-original {
      font-size: 14px;
      color: var(--charcoal-soft);
      text-decoration: line-through;
      margin-left: 8px;
      opacity: 0.5;
    }

    .product-action {
      color: var(--teal-mid);
      text-decoration: none;
      font-weight: 600;
      font-size: 13px;
      transition: color 0.2s;
    }

    .product-action:hover {
      color: var(--terracotta);
    }

    .product-action.buy-now {
      background: var(--terracotta);
      color: var(--white);
      padding: 8px 18px;
      border-radius: 6px;
      font-size: 13px;
    }

    .product-action.buy-now:hover {
      background: var(--terracotta-deep);
    }

    .product-highlights {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      margin-bottom: 14px;
    }

    .product-highlight {
      font-size: 11px;
      color: var(--teal-mid);
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .product-highlight::before {
      content: '✓';
      font-weight: 700;
    }

    /* ============ FEATURED PRODUCT BANNER ============ */
    .featured-section {
      background: var(--cream);
      padding: 60px 32px;
      border-bottom: 1px solid var(--gray-line);
    }

    .featured-inner {
      max-width: 1000px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 48px;
      align-items: center;
    }

    .featured-visual {
      background: linear-gradient(135deg, var(--teal-deep), var(--teal-darkest));
      border-radius: 14px;
      padding: 40px;
      text-align: center;
      color: var(--white);
      aspect-ratio: 4/3;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow-md);
      position: relative;
    }

    .featured-visual-badge {
      position: absolute;
      top: 16px;
      left: 16px;
      background: var(--terracotta);
      color: var(--white);
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 30px;
    }

    .featured-visual-eyebrow {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.5);
      margin-bottom: 10px;
      font-family: var(--sans) !important;
    }

    .featured-visual h3 {
      font-family: var(--serif);
      font-size: 26px;
      color: var(--white);
      margin-bottom: 8px;
    }

    .featured-visual p {
      font-size: 14px;
      color: rgba(255, 255, 255, 0.7);
      font-family: var(--sans) !important;
    }

    .featured-visual .placeholder {
      margin-top: 24px;
      width: 80%;
      aspect-ratio: 3/4;
      background: rgba(255, 255, 255, 0.08);
      border: 2px dashed rgba(255, 255, 255, 0.15);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-style: italic;
      color: rgba(255, 255, 255, 0.4);
    }

    .featured-content {}

    .featured-eyebrow {
      font-size: 12px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-weight: 600;
      margin-bottom: 12px;
      font-family: var(--sans) !important;
    }

    .featured-content h2 {
      font-size: clamp(26px, 3.5vw, 36px);
      margin-bottom: 16px;
    }

    .featured-content h2 em {
      color: var(--terracotta);
    }

    .featured-desc {
      font-size: 15px;
      line-height: 1.75;
      color: var(--charcoal-soft);
      margin-bottom: 24px;
      font-family: var(--sans) !important;
    }

    .featured-includes {
      list-style: none;
      margin-bottom: 28px;
    }

    .featured-includes li {
      padding: 7px 0 7px 24px;
      position: relative;
      font-size: 14px;
      color: var(--charcoal);
    }

    .featured-includes li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: var(--teal-mid);
      font-weight: 700;
    }

    .featured-price-row {
      display: flex;
      align-items: baseline;
      gap: 14px;
      margin-bottom: 20px;
    }

    .featured-price {
      font-family: var(--serif);
      font-weight: 800;
      font-size: 38px;
      color: var(--teal-darkest);
    }

    .featured-price-orig {
      font-size: 18px;
      color: var(--charcoal-soft);
      text-decoration: line-through;
      opacity: 0.5;
    }

    .featured-price-save {
      font-size: 12px;
      color: var(--terracotta);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .featured-cta {
      display: inline-block;
      background: var(--terracotta);
      color: var(--white);
      padding: 16px 36px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 700;
      transition: all 0.2s;
    }

    .featured-cta:hover {
      background: var(--terracotta-deep);
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(198, 93, 58, 0.3);
    }

    .featured-trust {
      display: flex;
      gap: 20px;
      margin-top: 14px;
      font-size: 12px;
      color: var(--charcoal-soft);
    }

    .featured-trust span::before {
      content: '✓ ';
      color: var(--teal-mid);
      font-weight: 700;
    }

    /* ============ BUNDLES ============ */
    .bundles-section {
      background: var(--cream);
      padding: 100px 32px;
    }

    .section-header {
      text-align: center;
      margin-bottom: 48px;
    }

    .section-eyebrow {
      font-size: 12px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-weight: 600;
      margin-bottom: 14px;
      font-family: var(--sans) !important;
    }

    .section-title {
      font-size: clamp(28px, 3.5vw, 40px);
      color: var(--teal-darkest);
      margin-bottom: 14px;
    }

    .section-subtitle {
      font-size: 16px;
      color: var(--charcoal-soft);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.7;
      font-family: var(--sans) !important;
    }

    .bundles-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
      max-width: 1080px;
      margin: 0 auto;
    }

    .bundle-card {
      background: var(--white);
      border-radius: 14px;
      padding: 36px 32px;
      border: 1px solid var(--gray-line);
      box-shadow: var(--shadow-sm);
      position: relative;
      transition: all 0.25s;
      display: flex;
      flex-direction: column;
    }

    .bundle-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .bundle-card.featured {
      border: 2px solid var(--terracotta);
    }

    .bundle-badge {
      position: absolute;
      top: -12px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--terracotta);
      color: var(--white);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 4px 16px;
      border-radius: 30px;
    }

    .bundle-name {
      font-family: var(--serif);
      font-size: 22px;
      font-weight: 700;
      color: var(--teal-darkest);
      margin-bottom: 10px;
    }

    .bundle-desc {
      font-size: 14px;
      color: var(--charcoal-soft);
      line-height: 1.65;
      margin-bottom: 20px;
      font-family: var(--sans) !important;
    }

    .bundle-includes {
      list-style: none;
      margin-bottom: 24px;
      flex: 1;
    }

    .bundle-includes li {
      padding: 6px 0 6px 24px;
      position: relative;
      font-size: 13.5px;
      color: var(--charcoal);
    }

    .bundle-includes li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: var(--teal-mid);
      font-weight: 700;
    }

    .bundle-includes li.coming {
      color: var(--charcoal-soft);
      font-style: italic;
    }

    .bundle-includes li.coming::before {
      content: '◇';
      color: var(--charcoal-soft);
    }

    .bundle-price-row {
      display: flex;
      align-items: baseline;
      gap: 12px;
      margin-bottom: 18px;
    }

    .bundle-price {
      font-family: var(--serif);
      font-weight: 700;
      font-size: 36px;
      color: var(--teal-darkest);
    }

    .bundle-original {
      font-size: 16px;
      color: var(--charcoal-soft);
      text-decoration: line-through;
    }

    .bundle-savings {
      font-size: 12px;
      color: var(--terracotta);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .bundle-cta {
      display: block;
      text-align: center;
      padding: 14px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 15px;
      font-weight: 600;
      transition: all 0.2s;
    }

    .bundle-cta.primary {
      background: var(--terracotta);
      color: var(--white);
    }

    .bundle-cta.primary:hover {
      background: var(--terracotta-deep);
    }

    .bundle-cta.secondary {
      background: transparent;
      color: var(--teal-darkest);
      border: 2px solid var(--teal-darkest);
    }

    .bundle-cta.secondary:hover {
      background: var(--teal-darkest);
      color: var(--white);
    }

    /* ============ NEWSLETTER BAND ============ */
    .newsletter-section {
      background: var(--white);
      padding: 80px 32px;
    }

    .newsletter-inner {
      max-width: 700px;
      margin: 0 auto;
      text-align: center;
    }

    .newsletter-inner h2 {
      font-size: 30px;
      margin-bottom: 12px;
      color: var(--teal-darkest) !important;

    }

    .newsletter-inner p {
      font-size: 15px;
      color: var(--charcoal-soft);
      line-height: 1.7;
      margin-bottom: 28px;
      font-family: var(--sans) !important;
    }

    .newsletter-form {
      display: flex;
      gap: 12px;
      max-width: 480px;
      margin: 0 auto;
    }

    .newsletter-form input {
      flex: 1;
      padding: 14px 18px;
      border: 1.5px solid var(--gray-line);
      border-radius: 6px;
      font-size: 14.5px;
      font-family: var(--sans);
    }

    .newsletter-form input:focus {
      outline: none;
      border-color: var(--teal-mid);
    }

    .newsletter-form button {
      background: var(--terracotta);
      color: var(--white);
      padding: 14px 24px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      font-family: var(--sans);
      cursor: pointer;
      transition: background 0.2s;
      white-space: nowrap;
    }

    .newsletter-form button:hover {
      background: var(--terracotta-deep);
    }

    /* ============ FINAL CTA ============ */
    .final-cta {
      background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
      padding: 80px 32px;
      text-align: center;
      color: var(--white);
    }

    .final-cta h2 {
      font-size: clamp(28px, 3.5vw, 40px);
      color: var(--white);
      margin-bottom: 18px;
    }

    .final-cta h2 em {
      font-style: italic;
      color: var(--cream);
      font-weight: 400;
    }

    .final-cta p {
      font-size: 17px;
      color: var(--cream-warm);
      margin-bottom: 32px;
      max-width: 560px;
      margin-left: auto;
      margin-right: auto;
      line-height: 1.7;
      font-family: var(--sans) !important;
    }

    .btn-on-teal {
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

    .btn-on-teal:hover {
      background: var(--terracotta-deep);
      transform: translateY(-1px);
    }

    .btn-outline-light {
      display: inline-block;
      background: transparent;
      color: var(--white);
      padding: 14px 32px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 15px;
      font-weight: 600;
      border: 2px solid rgba(255, 255, 255, 0.4);
      transition: all 0.2s;
      margin-left: 12px;
    }

    .btn-outline-light:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: var(--white);
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 1024px) {
      .featured-inner {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .featured-visual {
        max-width: 400px;
        margin: 0 auto;
      }

      .featured-includes {
        text-align: left;
        display: inline-block;
      }

      .featured-trust {
        justify-content: center;
      }

      .bundles-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 900px) {

      .hero {
        padding: 70px 24px 80px;
      }

      .products-grid {
        grid-template-columns: 1fr 1fr;
      }

      .bundles-grid {
        grid-template-columns: 1fr;
        max-width: 460px;
      }

      .bundle-card.featured {
        transform: none;
      }

      .tabs-inner {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .tab-btn {
        white-space: nowrap;
        padding: 16px 20px;
      }

      .newsletter-form {
        flex-direction: column;
      }
    }

    @media (max-width: 768px) {
      .products-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
        margin: 0 auto;
      }

      .bundles-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>

@section('js')
    <script src="{{ asset('public/frontend/infixlmstheme/js/classes.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#categories').select2();
            $('#sub_categories').select2();
            $(document).on('click', '.pull-bs-canvas-left', function() {
                $('body').prepend(
                    '<div class="bs-canvas-overlay bg-dark position-fixed w-100 h-100"></div>');
                console.log(this);
                if ($(this).hasClass('pull-bs-canvas-right'))
                    $('.bs-canvas-right').addClass('mr-0');
                else
                    $('.bs-canvas-left').addClass('ml-0');
                return false;
            });

            $(document).on('click', '.bs-canvas-close, .bs-canvas-overlay', function() {
                var elm = $(this).hasClass('bs-canvas-close') ? $(this).closest('.bs-canvas') : $(
                    '.bs-canvas');
                elm.removeClass('mr-0 ml-0');
                $('.bs-canvas-overlay').remove();
                return false;
            });

            // Shop sections: show 3 cards, Load More reveals next 3
            $(document).on('click', '.shop-load-more', function() {
                var gridId = $(this).data('grid');
                var $grid = $('#' + gridId);
                var $hidden = $grid.find('.product-card.shop-card-hidden, .bundle-card.shop-card-hidden');
                $hidden.slice(0, 3).removeClass('shop-card-hidden');
                if ($grid.find('.product-card.shop-card-hidden, .bundle-card.shop-card-hidden').length === 0) {
                    $(this).closest('.shop-load-more-wrap').hide();
                }
            });
        });
    </script>
@endsection
@section('mainContent')
    @php
        $frontendContent->quiz_page_title = 'Shop';
    @endphp
    <x-breadcrumb :banner="$frontendContent->quiz_page_banner" :title="$frontendContent->quiz_page_title" :subTitle="$frontendContent->quiz_page_sub_title" />

    <x-shop-product-card-section :request="@$request" :products="@$products" :bundles="@$bundles" />

    @include(theme('partials._custom_footer'))
@endsection
