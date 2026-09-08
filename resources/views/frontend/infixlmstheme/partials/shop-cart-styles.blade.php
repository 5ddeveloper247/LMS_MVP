{{-- Scoped cart redesign styles (cart page only). Do not load globally. --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  .mxp-cart {
    --mxp-teal-mid: #1A8A6F;
    --mxp-teal-deep: #0F6E56;
    --mxp-teal-darkest: #0A4D3C;
    --mxp-terracotta: #C65D3A;
    --mxp-terracotta-deep: #A84B2D;
    --mxp-cream: #F5EDE0;
    --mxp-cream-warm: #EFE3D0;
    --mxp-charcoal: #2B2B2B;
    --mxp-charcoal-soft: #4A4A4A;
    --mxp-white: #FFFFFF;
    --mxp-gray-line: #E8DFD0;
    --mxp-red: #C0392B;
    --mxp-serif: 'Playfair Display', Georgia, serif;
    --mxp-sans: 'Montserrat', system-ui, sans-serif;
    --mxp-shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
    --mxp-shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    font-family: var(--mxp-sans);
    color: var(--mxp-charcoal);
    background: var(--mxp-cream);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }
  .mxp-cart * { box-sizing: border-box; }
  .mxp-cart h1, .mxp-cart h2, .mxp-cart h3 {
    font-family: var(--mxp-serif);
    font-weight: 700;
    line-height: 1.2;
    color: var(--mxp-teal-darkest);
    margin: 0;
  }

  .mxp-cart .mxp-breadcrumb {
    background: var(--mxp-cream-warm);
    padding: 12px 32px;
    font-size: 13px;
    color: var(--mxp-charcoal-soft);
  }
  .mxp-cart .mxp-breadcrumb-inner { max-width: 1100px; margin: 0 auto; }
  .mxp-cart .mxp-breadcrumb a { color: var(--mxp-teal-mid); text-decoration: none; }
  .mxp-cart .mxp-breadcrumb a:hover { color: var(--mxp-terracotta); }
  .mxp-cart .mxp-breadcrumb span { margin: 0 8px; opacity: 0.5; }

  .mxp-cart .mxp-page-header {
    background: var(--mxp-white);
    padding: 40px 32px 0;
    border-bottom: 1px solid var(--mxp-gray-line);
  }
  .mxp-cart .mxp-page-header-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    padding-bottom: 24px;
    gap: 16px;
  }
  .mxp-cart .mxp-page-header h1 { font-size: clamp(28px, 4vw, 36px); }
  .mxp-cart .mxp-cart-count { font-size: 15px; color: var(--mxp-charcoal-soft); font-weight: 500; }

  .mxp-cart .mxp-progress-bar {
    background: var(--mxp-white);
    padding: 0 32px 28px;
  }
  .mxp-cart .mxp-progress-inner {
    max-width: 500px;
    margin: 0 auto;
    display: flex;
    align-items: center;
  }
  .mxp-cart .mxp-progress-step {
    flex: 1;
    text-align: center;
    position: relative;
  }
  .mxp-cart .mxp-progress-step::after {
    content: '';
    position: absolute;
    top: 14px;
    left: 50%;
    width: 100%;
    height: 2px;
    background: var(--mxp-gray-line);
    z-index: 0;
  }
  .mxp-cart .mxp-progress-step:last-child::after { display: none; }
  .mxp-cart .mxp-progress-dot {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--mxp-gray-line);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: var(--mxp-charcoal-soft);
    position: relative;
    z-index: 1;
    margin-bottom: 6px;
  }
  .mxp-cart .mxp-progress-step.is-active .mxp-progress-dot {
    background: var(--mxp-terracotta);
    color: var(--mxp-white);
  }
  .mxp-cart .mxp-progress-step.is-done .mxp-progress-dot {
    background: var(--mxp-teal-mid);
    color: var(--mxp-white);
  }
  .mxp-cart .mxp-progress-step.is-active::after {
    background: linear-gradient(90deg, var(--mxp-terracotta) 0%, var(--mxp-gray-line) 100%);
  }
  .mxp-cart .mxp-progress-step.is-done::after { background: var(--mxp-teal-mid); }
  .mxp-cart .mxp-progress-label {
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
    font-weight: 500;
    letter-spacing: 0.5px;
  }
  .mxp-cart .mxp-progress-step.is-active .mxp-progress-label {
    color: var(--mxp-terracotta);
    font-weight: 600;
  }

  .mxp-cart .mxp-cart-section { padding: 48px 32px 80px; }
  .mxp-cart .mxp-cart-grid {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 40px;
    align-items: start;
  }

  .mxp-cart .mxp-cart-item {
    display: grid;
    grid-template-columns: 100px 1fr auto;
    gap: 20px;
    align-items: center;
    background: var(--mxp-white);
    border-radius: 12px;
    padding: 22px;
    border: 1px solid var(--mxp-gray-line);
    margin-bottom: 16px;
    transition: box-shadow 0.2s ease, transform 0.2s ease;
  }
  .mxp-cart .mxp-cart-item:hover { box-shadow: var(--mxp-shadow-sm); }
  .mxp-cart .mxp-item-image {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    overflow: hidden;
    background: linear-gradient(135deg, var(--mxp-teal-deep), var(--mxp-teal-darkest));
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .mxp-cart .mxp-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .mxp-cart .mxp-item-details h3 {
    font-size: 17px;
    margin-bottom: 4px;
  }
  .mxp-cart .mxp-item-details h3 a {
    color: inherit;
    text-decoration: none;
  }
  .mxp-cart .mxp-item-details h3 a:hover { color: var(--mxp-terracotta); }
  .mxp-cart .mxp-item-meta {
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    margin-bottom: 12px;
  }
  .mxp-cart .mxp-item-controls {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
  }
  .mxp-cart .mxp-qty-control {
    display: inline-flex;
    align-items: center;
    border: 1px solid var(--mxp-gray-line);
    border-radius: 6px;
    overflow: hidden;
    background: var(--mxp-white);
  }
  .mxp-cart .mxp-qty-btn {
    width: 32px;
    height: 32px;
    border: none;
    background: var(--mxp-cream);
    font-size: 14px;
    color: var(--mxp-charcoal-soft);
    opacity: 0.55;
    cursor: not-allowed;
  }
  .mxp-cart .mxp-qty-val {
    width: 40px;
    height: 32px;
    border: none;
    text-align: center;
    font-family: var(--mxp-sans);
    font-size: 14px;
    font-weight: 600;
    color: var(--mxp-charcoal);
    background: var(--mxp-white);
    border-left: 1px solid var(--mxp-gray-line);
    border-right: 1px solid var(--mxp-gray-line);
  }
  .mxp-cart .mxp-item-remove {
    background: none;
    border: none;
    color: var(--mxp-charcoal-soft);
    font-size: 12px;
    cursor: pointer;
    text-decoration: underline;
    font-family: var(--mxp-sans);
    padding: 0;
  }
  .mxp-cart .mxp-item-remove:hover { color: var(--mxp-red); }
  .mxp-cart .mxp-item-right {
    text-align: right;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 8px;
  }
  .mxp-cart .mxp-item-price {
    font-family: var(--mxp-serif);
    font-weight: 700;
    font-size: 20px;
    color: var(--mxp-teal-darkest);
  }

  .mxp-cart .mxp-cart-empty {
    background: var(--mxp-white);
    border-radius: 14px;
    padding: 72px 40px;
    text-align: center;
    border: 1px solid var(--mxp-gray-line);
  }
  .mxp-cart .mxp-cart-empty h2 { font-size: 28px; margin-bottom: 12px; }
  .mxp-cart .mxp-cart-empty p {
    font-size: 15px;
    color: var(--mxp-charcoal-soft);
    margin-bottom: 28px;
    max-width: 420px;
    margin-left: auto;
    margin-right: auto;
  }

  .mxp-cart .mxp-order-summary {
    position: sticky;
    top: 88px;
    background: var(--mxp-white);
    border-radius: 14px;
    padding: 32px;
    border: 2px solid var(--mxp-teal-mid);
    box-shadow: var(--mxp-shadow-md);
  }
  .mxp-cart .mxp-summary-title {
    font-family: var(--mxp-serif);
    font-size: 22px;
    font-weight: 700;
    color: var(--mxp-teal-darkest);
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--mxp-gray-line);
  }
  .mxp-cart .mxp-summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    font-size: 14px;
    color: var(--mxp-charcoal);
  }
  .mxp-cart .mxp-summary-row.is-total {
    border-top: 2px solid var(--mxp-teal-darkest);
    margin-top: 12px;
    padding-top: 16px;
    font-weight: 700;
    font-size: 18px;
    color: var(--mxp-teal-darkest);
  }
  .mxp-cart .mxp-summary-row.is-total .mxp-summary-val {
    font-family: var(--mxp-serif);
    font-size: 24px;
  }
  .mxp-cart .mxp-summary-val { font-weight: 600; }
  .mxp-cart .mxp-summary-note {
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    margin: 0 0 4px;
  }

  .mxp-cart .mxp-promo-section {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--mxp-gray-line);
  }
  .mxp-cart .mxp-promo-label {
    font-size: 12px;
    font-weight: 600;
    color: var(--mxp-charcoal);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
  }
  .mxp-cart .mxp-promo-hint {
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    margin: 8px 0 0;
  }

  .mxp-cart .mxp-checkout-cta {
    display: block;
    width: 100%;
    text-align: center;
    background: var(--mxp-terracotta);
    color: var(--mxp-white) !important;
    padding: 16px;
    border-radius: 8px;
    text-decoration: none !important;
    font-size: 16px;
    font-weight: 700;
    transition: background 0.2s ease, transform 0.2s ease;
    margin-top: 24px;
    border: none;
    font-family: var(--mxp-sans);
  }
  .mxp-cart .mxp-checkout-cta:hover {
    background: var(--mxp-terracotta-deep);
    transform: translateY(-1px);
    color: var(--mxp-white) !important;
  }
  .mxp-cart .mxp-continue-shopping {
    display: block;
    text-align: center;
    margin-top: 14px;
    color: var(--mxp-teal-mid) !important;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: 600;
  }
  .mxp-cart .mxp-continue-shopping:hover { color: var(--mxp-terracotta) !important; }

  .mxp-cart .mxp-trust-row {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--mxp-gray-line);
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
  }
  .mxp-cart .mxp-trust-item { display: flex; align-items: center; gap: 5px; }
  .mxp-cart .mxp-trust-check { color: var(--mxp-teal-mid); font-weight: 700; }

  .mxp-cart .mxp-explore {
    padding: 56px 32px 72px;
    text-align: center;
  }
  .mxp-cart .mxp-explore-eyebrow {
    font-size: 12px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--mxp-terracotta);
    font-weight: 600;
    margin-bottom: 12px;
  }
  .mxp-cart .mxp-explore h2 {
    font-size: clamp(24px, 3vw, 30px);
    margin-bottom: 20px;
  }
  .mxp-cart .mxp-explore-cta {
    display: inline-block;
    background: var(--mxp-teal-darkest);
    color: var(--mxp-white) !important;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none !important;
    font-weight: 600;
    font-size: 14px;
  }
  .mxp-cart .mxp-explore-cta:hover {
    background: var(--mxp-teal-deep);
    color: var(--mxp-white) !important;
  }

  @media (max-width: 1024px) {
    .mxp-cart .mxp-cart-grid { grid-template-columns: 1fr; gap: 28px; }
    .mxp-cart .mxp-order-summary { position: static; }
  }
  @media (max-width: 900px) {
    .mxp-cart .mxp-cart-item {
      grid-template-columns: 80px 1fr;
      gap: 14px;
    }
    .mxp-cart .mxp-item-right {
      grid-column: 1 / -1;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
    }
    .mxp-cart .mxp-item-image { width: 80px; height: 80px; }
  }
  @media (max-width: 768px) {
    .mxp-cart .mxp-breadcrumb,
    .mxp-cart .mxp-page-header,
    .mxp-cart .mxp-progress-bar,
    .mxp-cart .mxp-cart-section,
    .mxp-cart .mxp-explore { padding-left: 16px; padding-right: 16px; }
    .mxp-cart .mxp-page-header-inner { flex-direction: column; gap: 8px; }
  }
</style>
