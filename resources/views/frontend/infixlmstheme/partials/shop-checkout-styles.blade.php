{{-- Scoped checkout redesign (checkout page only). Preserves existing form/JS hooks. --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  .mxp-checkout {
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
    font-family: var(--mxp-sans);
    color: var(--mxp-charcoal);
    background: var(--mxp-cream);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }
  .mxp-checkout * { box-sizing: border-box; }
  .mxp-checkout h1, .mxp-checkout h2, .mxp-checkout h3, .mxp-checkout h5 {
    font-family: var(--mxp-serif);
    font-weight: 700;
    line-height: 1.2;
    color: var(--mxp-teal-darkest);
  }

  .mxp-checkout .mxp-page-header {
    background: var(--mxp-white);
    padding: 40px 32px 0;
    border-bottom: 1px solid var(--mxp-gray-line);
  }
  .mxp-checkout .mxp-page-header-inner {
    max-width: 1100px;
    margin: 0 auto;
    padding-bottom: 24px;
  }
  .mxp-checkout .mxp-page-header h1 { font-size: clamp(28px, 4vw, 36px); margin: 0; }

  .mxp-checkout .mxp-progress-bar {
    background: var(--mxp-white);
    padding: 0 32px 28px;
  }
  .mxp-checkout .mxp-progress-inner {
    max-width: 500px;
    margin: 0 auto;
    display: flex;
    align-items: center;
  }
  .mxp-checkout .mxp-progress-step {
    flex: 1;
    text-align: center;
    position: relative;
  }
  .mxp-checkout .mxp-progress-step::after {
    content: '';
    position: absolute;
    top: 14px;
    left: 50%;
    width: 100%;
    height: 2px;
    background: var(--mxp-gray-line);
    z-index: 0;
  }
  .mxp-checkout .mxp-progress-step:last-child::after { display: none; }
  .mxp-checkout .mxp-progress-dot {
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
  .mxp-checkout .mxp-progress-step.is-active .mxp-progress-dot {
    background: var(--mxp-terracotta);
    color: var(--mxp-white);
  }
  .mxp-checkout .mxp-progress-step.is-done .mxp-progress-dot {
    background: var(--mxp-teal-mid);
    color: var(--mxp-white);
  }
  .mxp-checkout .mxp-progress-step.is-done::after { background: var(--mxp-teal-mid); }
  .mxp-checkout .mxp-progress-step.is-active::after {
    background: linear-gradient(90deg, var(--mxp-terracotta) 0%, var(--mxp-gray-line) 100%);
  }
  .mxp-checkout .mxp-progress-label {
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
    font-weight: 500;
  }
  .mxp-checkout .mxp-progress-step.is-active .mxp-progress-label {
    color: var(--mxp-terracotta);
    font-weight: 600;
  }
  .mxp-checkout .mxp-progress-step.is-done .mxp-progress-label { color: var(--mxp-teal-mid); }

  .mxp-checkout .mxp-checkout-section { padding: 40px 32px 80px; }
  .mxp-checkout .checkout_wrapper {
    max-width: 1100px;
    margin: 0 auto;
    display: grid !important;
    grid-template-columns: 1fr 400px;
    gap: 40px;
    align-items: start;
    padding: 0 !important;
  }
  .mxp-checkout .billing_details_wrapper,
  .mxp-checkout .order_wrapper {
    width: 100% !important;
    max-width: none !important;
    flex: none !important;
    padding: 0 !important;
  }

  .mxp-checkout .mxp-form-card {
    background: var(--mxp-white);
    border-radius: 14px;
    padding: 32px 28px;
    border: 1px solid var(--mxp-gray-line);
    margin-bottom: 20px;
  }
  .mxp-checkout .mxp-form-card-title {
    font-family: var(--mxp-serif);
    font-size: 20px;
    font-weight: 700;
    color: var(--mxp-teal-darkest);
    margin: 0 0 4px;
  }
  .mxp-checkout .mxp-form-card-sub {
    font-size: 13px;
    color: var(--mxp-charcoal-soft);
    margin: 0 0 20px;
  }

  .mxp-checkout .primary_label2,
  .mxp-checkout .label_name,
  .mxp-checkout label {
    font-size: 12px !important;
    font-weight: 600 !important;
    color: var(--mxp-teal-darkest) !important;
    text-transform: uppercase;
    letter-spacing: 0.6px;
  }
  .mxp-checkout .primary_label2 span,
  .mxp-checkout .req { color: var(--mxp-terracotta) !important; }

  .mxp-checkout .primary_input3,
  .mxp-checkout .primary_textarea3,
  .mxp-checkout select.wide,
  .mxp-checkout .select2-container--default .select2-selection--single {
    width: 100% !important;
    min-height: 46px;
    padding: 11px 14px !important;
    border: 1.5px solid var(--mxp-gray-line) !important;
    border-radius: 8px !important;
    font-family: var(--mxp-sans) !important;
    font-size: 14px !important;
    color: var(--mxp-charcoal) !important;
    background: var(--mxp-white) !important;
  }
  .mxp-checkout .primary_textarea3 { min-height: 100px; }
  .mxp-checkout .select2-container { width: 100% !important; }
  .mxp-checkout .select2-container--default .select2-selection--single {
    display: flex;
    align-items: center;
  }
  .mxp-checkout .select2-container--default .select2-selection--single .select2-selection__rendered {
    padding-left: 0 !important;
    line-height: 1.4 !important;
    color: var(--mxp-charcoal) !important;
  }
  .mxp-checkout .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 44px !important;
  }

  .mxp-checkout .billing_info {
    width: 100%;
    border-collapse: collapse;
    margin-top: 12px;
    font-size: 14px;
  }
  .mxp-checkout .billing_info td {
    border: 1px solid var(--mxp-gray-line) !important;
    padding: 10px 12px;
    background: var(--mxp-cream);
  }
  .mxp-checkout .billing_info td:first-child {
    font-weight: 600;
    color: var(--mxp-teal-darkest);
    width: 40%;
  }

  .mxp-checkout .remember_forgot_pass {
    margin-bottom: 10px;
  }
  .mxp-checkout .primary_checkbox .label_name {
    text-transform: none;
    letter-spacing: 0;
    font-size: 14px !important;
    color: var(--mxp-charcoal) !important;
    font-weight: 500 !important;
  }

  .mxp-checkout .order_wrapper {
    position: sticky;
    top: 88px;
  }
  .mxp-checkout .mxp-sidebar-card {
    background: var(--mxp-white);
    border-radius: 14px;
    padding: 28px;
    border: 2px solid var(--mxp-teal-mid);
    box-shadow: var(--mxp-shadow-md);
  }
  .mxp-checkout .mxp-sidebar-title {
    font-family: var(--mxp-serif);
    font-size: 20px;
    margin: 0 0 18px;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--mxp-gray-line);
  }

  .mxp-checkout .single_ordered_product {
    display: flex !important;
    align-items: center;
    gap: 12px;
    padding: 12px 0 !important;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    margin: 0 !important;
    background: transparent !important;
  }
  .mxp-checkout .single_ordered_product .product_name {
    flex: 1;
    min-width: 0;
    gap: 12px !important;
  }
  .mxp-checkout .single_ordered_product .thumb {
    width: 56px !important;
    height: 56px !important;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    background: linear-gradient(135deg, var(--mxp-teal-deep), var(--mxp-teal-darkest));
  }
  .mxp-checkout .single_ordered_product .thumb img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover;
  }
  .mxp-checkout .single_ordered_product .product_name span {
    font-size: 13px;
    font-weight: 600;
    color: var(--mxp-charcoal);
    line-height: 1.3;
  }
  .mxp-checkout .order_prise {
    font-family: var(--mxp-serif) !important;
    font-weight: 700 !important;
    font-size: 15px !important;
    color: var(--mxp-teal-darkest) !important;
    white-space: nowrap;
  }
  .mxp-checkout .removeFromCart {
    color: var(--mxp-charcoal-soft) !important;
    background: var(--mxp-cream) !important;
    border-radius: 4px;
    text-decoration: none !important;
    font-size: 12px;
    padding: 2px 6px !important;
  }
  .mxp-checkout .removeFromCart:hover { color: #C0392B !important; }

  .mxp-checkout .ordered_products_lists {
    margin-top: 16px;
  }
  .mxp-checkout .ordered_products_lists .single_lists {
    display: flex !important;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0 !important;
    margin: 0 !important;
    border: none !important;
    background: transparent !important;
    font-size: 14px;
  }
  .mxp-checkout .ordered_products_lists .single_lists .total_text {
    color: var(--mxp-charcoal);
    font-weight: 500;
  }
  .mxp-checkout .ordered_products_lists .single_lists:last-child {
    border-top: none;
    margin-top: 0 !important;
    padding-top: 8px !important;
    font-weight: 500;
    font-size: 14px;
    color: var(--mxp-charcoal);
  }
  .mxp-checkout .ordered_products_lists .single_lists.mxp-total-row {
    border-top: 2px solid var(--mxp-teal-darkest);
    margin-top: 8px !important;
    padding-top: 14px !important;
    font-weight: 700;
    font-size: 16px;
    color: var(--mxp-teal-darkest);
  }
  .mxp-checkout .ordered_products_lists .single_lists.mxp-total-row .totalBalance {
    font-family: var(--mxp-serif);
    font-size: 22px;
  }

  .mxp-checkout .coupon_wrapper {
    display: flex;
    gap: 8px;
    width: 100%;
    margin-top: 8px;
  }
  .mxp-checkout .coupon_wrapper #code {
    flex: 1;
  }
  .mxp-checkout #applyCoupon,
  .mxp-checkout #editPrevious,
  .mxp-checkout .theme_btn.small_btn2 {
    background: var(--mxp-cream) !important;
    border: 1.5px solid var(--mxp-gray-line) !important;
    color: var(--mxp-charcoal) !important;
    border-radius: 6px !important;
    font-weight: 600 !important;
    box-shadow: none !important;
  }
  .mxp-checkout #applyCoupon:hover,
  .mxp-checkout #editPrevious:hover {
    border-color: var(--mxp-teal-mid) !important;
    background: var(--mxp-cream-warm) !important;
  }

  .mxp-checkout .bank_transfer {
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid var(--mxp-gray-line);
  }
  .mxp-checkout .bank_transfer p {
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
    line-height: 1.6;
    text-align: center;
    margin-bottom: 14px !important;
  }
  .mxp-checkout #submitBtn,
  .mxp-checkout .mxp-place-order-btn {
    display: block;
    width: 100% !important;
    background: var(--mxp-terracotta) !important;
    color: var(--mxp-white) !important;
    padding: 18px !important;
    border-radius: 8px !important;
    font-size: 17px !important;
    font-weight: 700 !important;
    border: none !important;
    box-shadow: none !important;
    font-family: var(--mxp-sans) !important;
    letter-spacing: 0.3px;
    margin-top: 8px;
  }
  .mxp-checkout #submitBtn:hover,
  .mxp-checkout .mxp-place-order-btn:hover {
    background: var(--mxp-terracotta-deep) !important;
    transform: translateY(-1px);
  }

  .mxp-checkout .mxp-ship-label {
    display: block;
    font-size: 12px !important;
    font-weight: 600 !important;
    color: var(--mxp-teal-darkest) !important;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 8px;
  }
  .mxp-checkout .mxp-shipping-options {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 8px;
  }
  .mxp-checkout .mxp-ship-option {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 18px;
    background: var(--mxp-cream);
    border-radius: 8px;
    border: 1.5px solid var(--mxp-gray-line);
    cursor: pointer;
    transition: all 0.2s;
  }
  .mxp-checkout .mxp-ship-option:hover { border-color: var(--mxp-teal-mid); }
  .mxp-checkout .mxp-ship-option.is-selected {
    border-color: var(--mxp-terracotta);
    background: rgba(198, 93, 58, 0.04);
  }
  .mxp-checkout .mxp-ship-radio {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 2px solid var(--mxp-gray-line);
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .mxp-checkout .mxp-ship-option.is-selected .mxp-ship-radio {
    border-color: var(--mxp-terracotta);
  }
  .mxp-checkout .mxp-ship-option.is-selected .mxp-ship-radio::after {
    content: '';
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: var(--mxp-terracotta);
  }
  .mxp-checkout .mxp-ship-details { flex: 1; min-width: 0; }
  .mxp-checkout .mxp-ship-name {
    font-size: 14px;
    font-weight: 600;
    color: var(--mxp-charcoal);
    margin: 0;
  }
  .mxp-checkout .mxp-ship-desc {
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    margin: 2px 0 0;
  }
  .mxp-checkout .mxp-ship-price {
    font-weight: 600;
    font-size: 14px;
    color: var(--mxp-teal-darkest);
    white-space: nowrap;
  }

  .mxp-checkout .mxp-payment-mock {
    background: var(--mxp-cream);
    border: 1.5px solid var(--mxp-gray-line);
    border-radius: 8px;
    padding: 18px;
    margin-top: 8px;
  }
  .mxp-checkout .mxp-payment-fields {
    background: var(--mxp-cream);
    border: 1.5px solid var(--mxp-gray-line);
    border-radius: 8px;
    padding: 18px;
    margin-top: 8px;
  }
  .mxp-checkout .mxp-field { margin-bottom: 12px; }
  .mxp-checkout .mxp-field-label {
    display: block;
    font-size: 12px !important;
    font-weight: 600 !important;
    color: var(--mxp-teal-darkest) !important;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 6px;
  }
  .mxp-checkout .mxp-input {
    width: 100%;
    padding: 11px 12px;
    border: 1px solid var(--mxp-gray-line);
    border-radius: 6px;
    font-size: 14px;
    color: var(--mxp-charcoal);
    font-family: var(--mxp-sans);
    background: var(--mxp-white);
  }
  .mxp-checkout .mxp-input:focus {
    outline: none;
    border-color: var(--mxp-teal-mid);
    box-shadow: 0 0 0 3px rgba(26, 138, 111, 0.12);
  }
  .mxp-checkout .mxp-input.mxp-input-error {
    border-color: #C0392B !important;
  }
  .mxp-checkout .mxp-pay-grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
  }
  .mxp-checkout .mxp-pay-grid-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
  }
  .mxp-checkout .mxp-pay-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
    margin-top: 10px;
  }
  .mxp-checkout .mxp-pay-field {
    background: var(--mxp-white);
    border: 1px solid var(--mxp-gray-line);
    border-radius: 6px;
    padding: 11px 12px;
    font-size: 13px;
    color: var(--mxp-charcoal-soft);
    font-family: var(--mxp-sans);
  }
  .mxp-checkout .mxp-pay-field.mxp-pay-full { margin-bottom: 10px; }
  .mxp-checkout .mxp-pay-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 12px;
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
  }
  .mxp-checkout .mxp-pay-badge svg {
    width: 14px;
    height: 14px;
    color: var(--mxp-teal-mid);
    flex-shrink: 0;
  }
  .mxp-checkout .mxp-terms-box {
    margin-top: 16px;
    padding: 14px 16px;
    border: 1.5px solid var(--mxp-gray-line);
    border-radius: 8px;
    background: var(--mxp-white);
  }
  .mxp-checkout .mxp-terms-title {
    margin: 0 0 8px;
    font-size: 13px;
    color: var(--mxp-charcoal);
  }
  .mxp-checkout .mxp-terms-copy {
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    line-height: 1.55;
    margin: 0 0 12px;
  }
  .mxp-checkout .mxp-terms-check {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 12px;
    color: var(--mxp-charcoal);
    text-transform: none !important;
    letter-spacing: 0 !important;
    font-weight: 500 !important;
    cursor: pointer;
  }
  .mxp-checkout .mxp-terms-check input {
    margin-top: 2px;
    flex-shrink: 0;
  }
  .mxp-checkout .mxp-form-helper {
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
    margin-top: 12px;
    line-height: 1.55;
  }
  .mxp-checkout .mxp-place-order-block { margin-top: 8px; }
  .mxp-checkout .mxp-order-terms {
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
    margin-top: 12px;
    line-height: 1.6;
    text-align: center;
  }
  .mxp-checkout .mxp-secure-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    justify-content: center;
    margin-top: 16px;
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
  }
  .mxp-checkout .mxp-t-check {
    color: var(--mxp-teal-mid);
    font-weight: 700;
  }

  .mxp-checkout .mxp-sidebar-edit {
    display: block;
    text-align: center;
    margin-top: 14px;
    color: var(--mxp-teal-mid) !important;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: 600;
  }
  .mxp-checkout .mxp-sidebar-edit:hover { color: var(--mxp-terracotta) !important; }

  .mxp-checkout .mxp-sidebar-trust {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid var(--mxp-gray-line);
    font-size: 11px;
    color: var(--mxp-charcoal-soft);
  }
  .mxp-checkout .mxp-pay-note {
    margin-top: 16px;
    padding: 14px 16px;
    background: var(--mxp-cream);
    border: 1.5px solid var(--mxp-gray-line);
    border-radius: 8px;
    font-size: 12px;
    color: var(--mxp-charcoal-soft);
    line-height: 1.55;
  }
  .mxp-checkout .mxp-pay-note strong {
    color: var(--mxp-teal-darkest);
    display: block;
    margin-bottom: 4px;
    font-size: 13px;
  }

  @media (max-width: 1024px) {
    .mxp-checkout .checkout_wrapper {
      grid-template-columns: 1fr !important;
      gap: 28px;
    }
    .mxp-checkout .order_wrapper { position: static; }
  }
  @media (max-width: 768px) {
    .mxp-checkout .mxp-page-header,
    .mxp-checkout .mxp-progress-bar,
    .mxp-checkout .mxp-checkout-section {
      padding-left: 16px;
      padding-right: 16px;
    }
    .mxp-checkout .mxp-form-card { padding: 24px 18px; }
    .mxp-checkout .mxp-pay-row,
    .mxp-checkout .mxp-pay-grid-3 { grid-template-columns: 1fr 1fr; }
    .mxp-checkout .mxp-pay-grid-2 { grid-template-columns: 1fr; }
  }
</style>
