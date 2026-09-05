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

    /* BREADCRUMB */
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

    /* ============ PRODUCT HEADER ============ */
    .product-header {
      background: var(--white);
      padding: 60px 32px 80px;
    }

    .product-header-grid {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 60px;
      align-items: start;
    }

    /* Image gallery */
    .product-gallery {}

    .product-main-image {
      aspect-ratio: 4/3;
      border-radius: 12px;
      overflow: hidden;
      background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-darkest) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--cream);
      font-family: var(--serif) !important;
      font-style: italic;
      font-size: 18px;
      text-align: center;
      padding: 40px;
      margin-bottom: 16px;
      position: relative;
    }

    .product-main-badge {
      position: absolute;
      top: 18px;
      left: 18px;
      background: var(--terracotta);
      color: var(--white);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 30px;
      font-family: var(--sans) !important;
      font-style: normal;
    }

    .product-thumbs {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
    }

    .product-thumb {
      aspect-ratio: 1;
      border-radius: 8px;
      overflow: hidden;
      background: var(--cream);
      border: 2px solid var(--gray-line);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      color: var(--charcoal-soft);
      cursor: pointer;
      transition: border-color 0.2s;
    }

    .product-thumb:hover,
    .product-thumb.active {
      border-color: var(--terracotta);
    }

    /* Purchase card */
    .purchase-card {
      position: sticky;
      top: 80px;
      background: var(--white);
      border: 2px solid var(--terracotta);
      border-radius: 14px;
      padding: 36px 32px;
      box-shadow: var(--shadow-lg);
    }

    .purchase-tag {
      font-size: 10px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-weight: 600;
      font-family: var(--sans) !important;
      margin-bottom: 8px;
    }

    .purchase-card h1 {
      font-size: 28px;
      color: var(--teal-darkest);
      margin-bottom: 8px;
      line-height: 1.2;
    }

    .purchase-author {
      font-size: 14px;
      color: var(--charcoal-soft);
      margin-bottom: 18px;
      font-family: var(--sans) !important;
    }

    .purchase-author a {
      color: var(--teal-mid);
      text-decoration: none;
      font-weight: 500;
    }

    .purchase-author a:hover {
      color: var(--terracotta);
    }

    .purchase-rating {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 22px;
      padding-bottom: 22px;
      border-bottom: 1px solid var(--gray-line);
    }

    .purchase-stars {
      color: var(--terracotta);
      font-size: 16px;
      letter-spacing: 2px;
    }

    .purchase-rating-text {
      font-size: 13px;
      color: var(--charcoal-soft);
    }

    .purchase-price-row {
      display: flex;
      align-items: baseline;
      gap: 10px;
      margin-bottom: 8px;
    }

    .purchase-price {
      font-family: var(--serif) !important;
      font-weight: 700;
      font-size: 42px;
      color: var(--teal-darkest);
    }

    .purchase-format {
      font-size: 13px;
      color: var(--charcoal-soft);
      margin-bottom: 24px;
      font-family: var(--sans) !important;
    }

    .purchase-features {
      list-style: none;
      margin-bottom: 28px;
    }

    .purchase-features li {
      padding: 8px 0 8px 24px;
      position: relative;
      font-size: 14px;
      color: var(--charcoal);
      border-bottom: 1px solid rgba(0, 0, 0, 0.04);
      font-family: var(--sans) !important;
    }

    .purchase-features li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: var(--teal-mid);
      font-weight: 700;
    }

    .purchase-features li:last-child {
      border-bottom: none;
    }
    
    .ck-content P{
    font-family: var(--sans) !important;
    }

    /* Quantity */
    .quantity-row {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 16px;
    }

    .quantity-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--charcoal);
    }

    .quantity-control {
      display: flex;
      align-items: center;
      border: 1px solid var(--gray-line);
      border-radius: 6px;
      overflow: hidden;
    }

    .qty-btn {
      width: 36px;
      height: 36px;
      border: none;
      background: var(--cream);
      font-size: 18px;
      cursor: pointer;
      color: var(--charcoal);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
    }

    .qty-btn:hover {
      background: var(--cream-warm);
    }

    .qty-value {
      width: 48px;
      height: 36px;
      border: none;
      text-align: center;
      font-family: var(--sans) !important;
      font-size: 15px;
      font-weight: 600;
      color: var(--charcoal);
      background: var(--white);
      border-left: 1px solid var(--gray-line);
      border-right: 1px solid var(--gray-line);
    }

    .purchase-cta {
      display: block;
      width: 100%;
      text-align: center;
      background: var(--terracotta);
      color: var(--white);
      padding: 16px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 700;
      transition: all 0.2s;
      margin-bottom: 10px;
      border: none;
      cursor: pointer;
      font-family: var(--sans) !important;
    }

    .purchase-cta:hover {
      background: var(--terracotta-deep);
      transform: translateY(-1px);
    }

    .purchase-secondary {
      display: block;
      width: 100%;
      text-align: center;
      font-size: 13px;
      color: var(--charcoal-soft);
      padding: 8px;
      text-decoration: none;
    }

    .purchase-secondary:hover {
      color: var(--teal-mid);
    }

    .purchase-trust {
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid var(--gray-line);
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      font-size: 12px;
      color: var(--charcoal-soft);
    }

    .purchase-trust-item {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .trust-check {
      color: var(--teal-mid);
      font-weight: 700;
    }

    /* ============ PRODUCT DETAILS TABS ============ */
    .details-section {
      background: var(--cream);
      padding: 80px 32px;
    }

    .details-inner {
      max-width: 820px;
      margin: 0 auto;
    }

    .details-tabs {
      display: flex;
      gap: 0;
      border-bottom: 2px solid var(--gray-line);
      margin-bottom: 40px;
    }

    .detail-tab {
      background: none;
      border: none;
      border-bottom: 3px solid transparent;
      padding: 14px 24px;
      font-family: var(--sans) !important;
      font-size: 14px;
      font-weight: 600;
      color: var(--charcoal-soft);
      cursor: pointer;
      transition: all 0.2s;
      margin-bottom: -2px;
    }

    .detail-tab:hover {
      color: var(--teal-mid);
    }

    .detail-tab.active {
      color: var(--terracotta);
      border-bottom-color: var(--terracotta);
    }

    .detail-panel {
      display: none;
    }

    .detail-panel.active {
      display: block;
    }

    .detail-prose {
      font-size: 15.5px;
      line-height: 1.8;
      color: var(--charcoal);
    }

    .detail-prose p {
      margin-bottom: 16px;
      font-family: var(--sans) !important;
    }

    .detail-prose h3 {
      font-size: 20px;
      color: var(--teal-deep);
      margin: 28px 0 14px;
    }

    /* What's inside grid */
    .contents-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-top: 24px;
    }

    .contents-item {
      background: var(--white);
      border-radius: 10px;
      padding: 22px 20px;
      border-left: 3px solid var(--teal-mid);
    }

    .contents-item h4 {
      font-size: 15px;
      color: var(--teal-darkest);
      margin-bottom: 6px;
    }

    .contents-item p {
      font-size: 13px;
      color: var(--charcoal-soft);
      line-height: 1.55;
      font-family: var(--sans) !important;
    }

    /* Reviews in tab */
    .review-summary {
      display: flex;
      align-items: center;
      gap: 24px;
      padding: 24px;
      background: var(--white);
      border-radius: 10px;
      margin-bottom: 28px;
    }

    .review-big-num {
      font-family: var(--serif) !important;
      font-weight: 700;
      font-size: 48px;
      color: var(--teal-darkest);
      line-height: 1;
    }

    .review-big-stars {
      color: var(--terracotta);
      font-size: 20px;
      letter-spacing: 2px;
      margin-bottom: 4px;
    }

    .review-count {
      font-size: 13px;
      color: var(--charcoal-soft);
    }

    .reviews-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .review-card {
      background: var(--white);
      border-radius: 10px;
      padding: 24px;
      border-left: 4px solid var(--terracotta);
    }

    .review-stars-sm {
      color: var(--terracotta);
      font-size: 13px;
      margin-bottom: 8px;
      letter-spacing: 2px;
    }

    .review-text {
      font-size: 14.5px;
      line-height: 1.7;
      color: var(--charcoal);
      margin-bottom: 10px;
      font-family: var(--sans) !important;
    }

    .review-attr {
      font-size: 12px;
      color: var(--charcoal-soft);
    }

    .review-name {
      font-weight: 600;
      color: var(--teal-deep);
    }

    /* ============ RELATED PRODUCTS ============ */
    .related-section {
      background: var(--white);
      padding: 80px 32px;
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
      font-family: var(--sans) !important;
      margin-bottom: 14px;
    }

    .section-title {
      font-size: clamp(28px, 3.5vw, 38px);
      color: var(--teal-darkest);
    }

    .related-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
      max-width: 1080px;
      margin: 0 auto;
    }

    .related-card {
      /* background: var(--cream); */
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid var(--gray-line);
      transition: all 0.25s;
    }

    .related-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }

    .related-image {
      aspect-ratio: 16/10;
      background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--cream);
      font-family: var(--serif) !important;
      font-style: italic;
      font-size: 14px;
      text-align: center;
      padding: 20px;
    }

    .related-body {
      padding: 22px;
      background: var(--white);
    }

    .related-tag {
      font-size: 10px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--terracotta);
      font-weight: 600;
      font-family: var(--sans) !important;
      margin-bottom: 6px;
    }

    .related-card h3 {
      font-size: 17px;
      color: var(--teal-darkest);
      margin-bottom: 10px;
    }

    .related-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 14px;
      border-top: 1px solid rgba(0, 0, 0, 0.06);
    }

    .related-price {
      font-family: var(--serif) !important;
      font-weight: 700;
      font-size: 20px;
      color: var(--terracotta);
    }

    .related-link {
      color: var(--teal-mid);
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
    }

    .related-link:hover {
      color: var(--terracotta);
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


    /* RESPONSIVE */
    @media (max-width: 1024px) {
      .product-header-grid {
        grid-template-columns: 1fr;
        gap: 40px;
      }

      .purchase-card {
        position: static;
        max-width: 520px;
      }
    }

    @media (max-width: 900px) {
      .contents-grid {
        grid-template-columns: 1fr;
      }

      .related-grid {
        grid-template-columns: 1fr;
        max-width: 420px;
        margin: 0 auto;
      }

      .details-tabs {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .detail-tab {
        white-space: nowrap;
        padding: 12px 18px;
      }
    }

    @media (max-width: 768px) {
      .product-thumbs {
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
      }

      .review-summary {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
