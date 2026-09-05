{{-- Scoped order confirmation redesign --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  .mxp-confirm {
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
    --mxp-serif: 'Playfair Display', Georgia, serif;
    --mxp-sans: 'Montserrat', system-ui, sans-serif;
    --mxp-shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    --mxp-shadow-lg: 0 20px 50px rgba(10, 77, 60, 0.15);
    font-family: var(--mxp-sans);
    color: var(--mxp-charcoal);
    background: var(--mxp-cream);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }
  .mxp-confirm * { box-sizing: border-box; }
  .mxp-confirm h1, .mxp-confirm h2, .mxp-confirm h3 {
    font-family: var(--mxp-serif);
    font-weight: 700;
    line-height: 1.2;
    color: var(--mxp-teal-darkest);
  }

  .mxp-confirm .mxp-progress-bar {
    background: var(--mxp-white);
    border-bottom: 1px solid var(--mxp-gray-line);
    padding: 20px 32px;
  }
  .mxp-confirm .mxp-progress-inner {
    max-width: 500px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .mxp-confirm .mxp-progress-step {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    color: var(--mxp-teal-mid);
  }
  .mxp-confirm .mxp-progress-step.is-active { color: var(--mxp-teal-darkest); }
  .mxp-confirm .mxp-progress-dot {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
  }
  .mxp-confirm .mxp-progress-step.is-done .mxp-progress-dot {
    background: var(--mxp-teal-mid);
    color: var(--mxp-white);
  }
  .mxp-confirm .mxp-progress-step.is-active .mxp-progress-dot {
    background: var(--mxp-teal-darkest);
    color: var(--mxp-white);
  }
  .mxp-confirm .mxp-progress-line {
    width: 60px;
    height: 2px;
    background: var(--mxp-teal-mid);
    margin: 0 12px;
  }

  .mxp-confirm .mxp-confirm-section { padding: 60px 32px 90px; }
  .mxp-confirm .mxp-confirm-grid {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 40px;
    align-items: start;
  }

  .mxp-confirm .mxp-confirm-card {
    background: var(--mxp-white);
    border-radius: 16px;
    padding: 50px 44px;
    box-shadow: var(--mxp-shadow-lg);
    border: 1px solid var(--mxp-gray-line);
    text-align: center;
  }
  .mxp-confirm .mxp-confirm-check {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--mxp-teal-mid) 0%, var(--mxp-teal-darkest) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
  }
  .mxp-confirm .mxp-confirm-check svg {
    width: 36px;
    height: 36px;
    color: var(--mxp-white);
  }
  .mxp-confirm .mxp-confirm-card h1 {
    font-size: clamp(28px, 4vw, 38px);
    margin: 0 0 10px;
  }
  .mxp-confirm .mxp-confirm-card h1 em {
    font-style: italic;
    color: var(--mxp-terracotta);
    font-weight: 400;
  }
  .mxp-confirm .mxp-confirm-sub {
    font-size: 16px;
    color: var(--mxp-charcoal-soft);
    line-height: 1.7;
    max-width: 480px;
    margin: 0 auto 32px;
  }

  .mxp-confirm .mxp-order-number-box {
    background: var(--mxp-cream);
    border: 1px dashed var(--mxp-gray-line);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 32px;
    display: inline-block;
  }
  .mxp-confirm .mxp-order-number-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: 600;
    color: var(--mxp-charcoal-soft);
    margin-bottom: 4px;
  }
  .mxp-confirm .mxp-order-number-value {
    font-family: var(--mxp-serif);
    font-size: 24px;
    font-weight: 700;
    color: var(--mxp-teal-darkest);
    letter-spacing: 1px;
  }

  .mxp-confirm .mxp-confirm-details { text-align: left; margin-bottom: 32px; }
  .mxp-confirm .mxp-confirm-detail-row {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    padding: 12px 0;
    border-bottom: 1px solid var(--mxp-gray-line);
    font-size: 14px;
  }
  .mxp-confirm .mxp-confirm-detail-row:last-child { border-bottom: none; }
  .mxp-confirm .mxp-confirm-detail-label { color: var(--mxp-charcoal-soft); }
  .mxp-confirm .mxp-confirm-detail-value {
    font-weight: 600;
    color: var(--mxp-teal-darkest);
    text-align: right;
  }

  .mxp-confirm .mxp-confirm-divider {
    border: none;
    border-top: 1px dashed var(--mxp-gray-line);
    margin: 28px 0;
  }

  .mxp-confirm .mxp-next-steps { text-align: left; }
  .mxp-confirm .mxp-next-steps h3 { font-size: 20px; margin: 0 0 18px; }
  .mxp-confirm .mxp-next-step-item {
    display: flex;
    gap: 16px;
    margin-bottom: 18px;
  }
  .mxp-confirm .mxp-next-step-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--mxp-cream-warm);
    border: 1px solid var(--mxp-gray-line);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--mxp-serif);
    font-weight: 700;
    font-size: 14px;
    color: var(--mxp-teal-darkest);
    flex-shrink: 0;
  }
  .mxp-confirm .mxp-next-step-text {
    font-size: 14px;
    color: var(--mxp-charcoal);
    line-height: 1.6;
  }
  .mxp-confirm .mxp-next-step-text strong { color: var(--mxp-teal-darkest); }

  .mxp-confirm .mxp-confirm-actions {
    display: flex;
    gap: 14px;
    margin-top: 32px;
    flex-wrap: wrap;
    justify-content: center;
  }
  .mxp-confirm .mxp-btn-primary {
    background: var(--mxp-terracotta);
    color: var(--mxp-white) !important;
    padding: 14px 28px;
    border-radius: 8px;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 600;
    border: 2px solid var(--mxp-terracotta);
    display: inline-block;
  }
  .mxp-confirm .mxp-btn-primary:hover {
    background: var(--mxp-terracotta-deep);
    border-color: var(--mxp-terracotta-deep);
    color: var(--mxp-white) !important;
  }
  .mxp-confirm .mxp-btn-secondary {
    background: transparent;
    color: var(--mxp-teal-darkest) !important;
    padding: 14px 28px;
    border-radius: 8px;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 600;
    border: 2px solid var(--mxp-teal-darkest);
    display: inline-block;
  }
  .mxp-confirm .mxp-btn-secondary:hover {
    background: var(--mxp-teal-darkest);
    color: var(--mxp-white) !important;
  }

  .mxp-confirm .mxp-order-summary {
    background: var(--mxp-white);
    border-radius: 16px;
    padding: 32px 28px;
    border: 1px solid var(--mxp-gray-line);
    box-shadow: var(--mxp-shadow-md);
    position: sticky;
    top: 100px;
  }
  .mxp-confirm .mxp-summary-title {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    font-weight: 700;
    color: var(--mxp-terracotta);
    margin-bottom: 20px;
  }
  .mxp-confirm .mxp-summary-item {
    display: flex;
    gap: 14px;
    align-items: center;
    padding: 14px 0;
    border-bottom: 1px solid var(--mxp-gray-line);
  }
  .mxp-confirm .mxp-summary-item:last-of-type { border-bottom: none; }
  .mxp-confirm .mxp-summary-thumb {
    width: 52px;
    height: 52px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--mxp-teal-mid), var(--mxp-teal-deep));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--mxp-white);
    font-family: var(--mxp-serif);
    font-size: 11px;
    font-weight: 700;
    text-align: center;
    line-height: 1.1;
    flex-shrink: 0;
    overflow: hidden;
  }
  .mxp-confirm .mxp-summary-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .mxp-confirm .mxp-summary-item-details { flex: 1; min-width: 0; }
  .mxp-confirm .mxp-summary-item-name {
    font-size: 13.5px;
    font-weight: 600;
    color: var(--mxp-teal-darkest);
    line-height: 1.3;
  }
  .mxp-confirm .mxp-summary-item-meta {
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    margin-top: 2px;
  }
  .mxp-confirm .mxp-summary-item-price {
    font-family: var(--mxp-serif);
    font-weight: 700;
    font-size: 15px;
    color: var(--mxp-teal-darkest);
    flex-shrink: 0;
  }
  .mxp-confirm .mxp-summary-totals {
    margin-top: 20px;
    padding-top: 16px;
    border-top: 2px solid var(--mxp-gray-line);
  }
  .mxp-confirm .mxp-summary-row {
    display: flex;
    justify-content: space-between;
    padding: 6px 0;
    font-size: 13.5px;
    color: var(--mxp-charcoal-soft);
  }
  .mxp-confirm .mxp-summary-row.is-total {
    padding-top: 12px;
    margin-top: 8px;
    border-top: 2px solid var(--mxp-teal-darkest);
    font-size: 18px;
    font-weight: 700;
    color: var(--mxp-teal-darkest);
  }
  .mxp-confirm .mxp-summary-row.is-total span:last-child { font-family: var(--mxp-serif); }

  .mxp-confirm .mxp-summary-shipping-note {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 20px;
    padding: 14px 16px;
    background: var(--mxp-cream);
    border-radius: 8px;
    font-size: 12px;
    color: var(--mxp-teal-darkest);
    line-height: 1.5;
  }
  .mxp-confirm .mxp-summary-shipping-note svg {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    color: var(--mxp-teal-mid);
  }

  .mxp-confirm .mxp-share-section {
    background: var(--mxp-white);
    border-top: 1px solid var(--mxp-gray-line);
    padding: 60px 32px;
  }
  .mxp-confirm .mxp-share-inner {
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
  }
  .mxp-confirm .mxp-share-inner h2 { font-size: 28px; margin: 0 0 10px; }
  .mxp-confirm .mxp-share-inner p {
    font-size: 15px;
    color: var(--mxp-charcoal-soft);
    line-height: 1.7;
    margin: 0 0 24px;
  }
  .mxp-confirm .mxp-share-buttons {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
  }
  .mxp-confirm .mxp-share-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 600;
    border: 1.5px solid var(--mxp-gray-line);
    color: var(--mxp-charcoal) !important;
    background: var(--mxp-cream);
    transition: all 0.2s;
  }
  .mxp-confirm .mxp-share-btn:hover {
    border-color: var(--mxp-teal-mid);
    color: var(--mxp-teal-darkest) !important;
    transform: translateY(-2px);
  }
  .mxp-confirm .mxp-share-btn svg { width: 18px; height: 18px; }

  @media (max-width: 900px) {
    .mxp-confirm .mxp-confirm-grid { grid-template-columns: 1fr; }
    .mxp-confirm .mxp-order-summary { position: static; }
  }
  @media (max-width: 600px) {
    .mxp-confirm .mxp-progress-bar,
    .mxp-confirm .mxp-confirm-section,
    .mxp-confirm .mxp-share-section {
      padding-left: 16px;
      padding-right: 16px;
    }
    .mxp-confirm .mxp-confirm-card { padding: 36px 24px; }
    .mxp-confirm .mxp-confirm-actions { flex-direction: column; }
    .mxp-confirm .mxp-btn-primary,
    .mxp-confirm .mxp-btn-secondary { text-align: center; }
    .mxp-confirm .mxp-progress-line { width: 28px; margin: 0 8px; }
  }
</style>
