<div class="mxp-course-detail">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
.mxp-course-detail {
    --teal-mid: #1A8A6F; --teal-deep: #0F6E56; --teal-darkest: #0A4D3C;
    --terracotta: #C65D3A; --terracotta-deep: #A84B2D;
    --cream: #F5EDE0; --cream-warm: #EFE3D0;
    --charcoal: #2B2B2B; --charcoal-soft: #4A4A4A;
    --white: #FFFFFF; --gray-line: #E8DFD0;
    --gold-star: #E8A840;
    --serif: 'Playfair Display', Georgia, serif;
    --sans: 'Montserrat', system-ui, sans-serif;
    --shadow-sm: 0 2px 8px rgba(10, 77, 60, 0.06);
    --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    font-family: var(--sans);
    color: var(--charcoal);
    background: var(--cream);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }
  .mxp-course-detail * { box-sizing: border-box; }
.mxp-course-detail h1, .mxp-course-detail h2, .mxp-course-detail h3, .mxp-course-detail h4 { font-family: var(--serif); font-weight: 700; line-height: 1.2; color: var(--teal-darkest); }

  /* ============ NAV ============ */
.mxp-course-detail .nav { position: sticky; top: 0; z-index: 100; background: rgba(245, 237, 224, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid var(--gray-line); padding: 16px 0; }
.mxp-course-detail .nav-inner { max-width: 1240px; margin: 0 auto; padding: 0 24px; display: flex; align-items: center; justify-content: space-between; gap: 32px; }
.mxp-course-detail .nav-brand { font-family: var(--serif); font-weight: 700; font-size: 20px; color: var(--teal-darkest); text-decoration: none; }
.mxp-course-detail .nav-brand-accent { color: var(--terracotta); font-style: italic; }
.mxp-course-detail .nav-links { display: flex; gap: 28px; list-style: none; }
.mxp-course-detail .nav-links a { font-size: 14px; font-weight: 500; color: var(--charcoal); text-decoration: none; transition: color 0.2s; }
.mxp-course-detail .nav-links a:hover, .mxp-course-detail .nav-links a.active { color: var(--teal-mid); }
.mxp-course-detail .nav-cta { background: var(--terracotta); color: var(--white); padding: 10px 22px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600; transition: background 0.2s; }
.mxp-course-detail .nav-cta:hover { background: var(--terracotta-deep); }

.mxp-course-detail .breadcrumb { background: var(--cream-warm); padding: 14px 32px; border-bottom: 1px solid var(--gray-line); }
.mxp-course-detail .breadcrumb-inner { max-width: 1240px; margin: 0 auto; font-size: 13px; color: var(--charcoal-soft); }
.mxp-course-detail .breadcrumb-inner a { color: var(--teal-mid); text-decoration: none; font-weight: 500; }
.mxp-course-detail .breadcrumb-inner a:hover { color: var(--terracotta); }
.mxp-course-detail .breadcrumb-inner span { margin: 0 8px; opacity: 0.5; }

.mxp-course-detail .container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }

  /* ============ COURSE HEADER ============ */
.mxp-course-detail .course-header { background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%); color: var(--white); padding: 60px 32px 70px; position: relative; overflow: hidden; }
.mxp-course-detail .course-header::before { content: ''; position: absolute; top: -80px; right: -80px; width: 350px; height: 350px; background: radial-gradient(circle, rgba(198, 93, 58, 0.15) 0%, transparent 70%); border-radius: 50%; }
.mxp-course-detail .course-header-inner { max-width: 1240px; margin: 0 auto; display: grid; grid-template-columns: 1fr 340px; gap: 50px; align-items: start; position: relative; z-index: 1; }
.mxp-course-detail .course-header-text .course-domain { display: inline-block; font-size: 12px; font-weight: 600; letter-spacing: 2.5px; text-transform: uppercase; color: var(--terracotta); margin-bottom: 16px; padding: 5px 14px; border: 1px solid var(--terracotta); border-radius: 30px; }
.mxp-course-detail .course-header-text h1 { font-size: clamp(32px, 4vw, 48px); color: var(--white); margin-bottom: 16px; letter-spacing: -0.5px; }
.mxp-course-detail .course-header-text h1 em { font-style: italic; color: var(--cream); font-weight: 400; }
.mxp-course-detail .course-header-desc { font-size: 17px; line-height: 1.65; color: var(--cream-warm); margin-bottom: 24px; }
.mxp-course-detail .course-meta { display: flex; gap: 24px; flex-wrap: wrap; margin-bottom: 28px; }
.mxp-course-detail .course-meta-item { display: flex; align-items: center; gap: 8px; font-size: 14px; color: var(--cream); }
.mxp-course-detail .course-meta-item svg { width: 18px; height: 18px; color: var(--terracotta); flex-shrink: 0; }

  /* Course Image */
.mxp-course-detail .course-hero-image { width: 100%; border-radius: 12px; overflow: hidden; margin-top: 4px; }
.mxp-course-detail .course-hero-image img { width: 100%; height: 260px; object-fit: cover; display: block; border-radius: 12px; border: 2px solid rgba(255,255,255,0.15); }
.mxp-course-detail .course-hero-image-placeholder {
    width: 100%; height: 260px; border-radius: 12px;
    background: linear-gradient(135deg, rgba(26,138,111,0.3) 0%, rgba(15,110,86,0.5) 100%);
    border: 2px dashed rgba(255,255,255,0.25);
    display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px;
    color: rgba(255,255,255,0.5); font-size: 13px;
  }
.mxp-course-detail .course-hero-image-placeholder svg { width: 40px; height: 40px; opacity: 0.4; }

  /* ============ PURCHASE CARD (Header — On-Demand $79) ============ */
.mxp-course-detail .purchase-card { background: var(--white); border-radius: 14px; padding: 32px; box-shadow: 0 12px 40px rgba(0,0,0,0.2); }
.mxp-course-detail .purchase-card-label { font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: var(--teal-mid); margin-bottom: 6px; }
.mxp-course-detail .purchase-price { font-family: var(--serif); font-size: 42px; font-weight: 700; color: var(--terracotta); margin-bottom: 2px; }
.mxp-course-detail .purchase-type { font-family: var(--serif); font-size: 15px; font-weight: 600; color: var(--teal-darkest); margin-bottom: 2px; }
.mxp-course-detail .purchase-sub-note { font-size: 12px; color: var(--teal-mid); font-weight: 500; margin-bottom: 20px; display: flex; align-items: center; gap: 5px; }
.mxp-course-detail .purchase-sub-note svg { width: 14px; height: 14px; }
.mxp-course-detail .btn-buy { display: block; width: 100%; text-align: center; background: var(--terracotta); color: var(--white); padding: 14px; border-radius: 6px; text-decoration: none; font-size: 15px; font-weight: 600; border: 2px solid var(--terracotta); transition: all 0.2s; margin-bottom: 10px; cursor: pointer; }
.mxp-course-detail .btn-buy:hover { background: var(--terracotta-deep); border-color: var(--terracotta-deep); }
.mxp-course-detail .btn-cart { display: block; width: 100%; text-align: center; background: transparent; color: var(--teal-darkest); padding: 12px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600; border: 1.5px solid var(--teal-darkest); transition: all 0.2s; margin-bottom: 10px; cursor: pointer; }
.mxp-course-detail .btn-cart:hover { background: var(--teal-darkest); color: var(--white); }
.mxp-course-detail .btn-bundle-link { display: block; text-align: center; font-size: 13px; color: var(--teal-mid); font-weight: 600; text-decoration: none; padding: 10px; border: 1.5px solid var(--teal-mid); border-radius: 6px; transition: all 0.2s; margin-bottom: 24px; }
.mxp-course-detail .btn-bundle-link:hover { background: var(--teal-mid); color: var(--white); }
.mxp-course-detail .purchase-divider { height: 1px; background: var(--gray-line); margin: 0 0 18px; }
.mxp-course-detail .purchase-includes { list-style: none; }
.mxp-course-detail .purchase-includes li { padding: 7px 0; font-size: 13px; color: var(--charcoal-soft); display: flex; align-items: flex-start; gap: 10px; border-bottom: 1px solid var(--gray-line); }
.mxp-course-detail .purchase-includes li:last-child { border-bottom: none; }
.mxp-course-detail .purchase-includes li svg { width: 16px; height: 16px; color: var(--teal-mid); flex-shrink: 0; margin-top: 2px; }
.mxp-course-detail .subscription-note { background: rgba(26,138,111,0.06); border: 1px solid rgba(26,138,111,0.15); border-radius: 8px; padding: 12px 14px; margin-top: 16px; font-size: 12px; color: var(--charcoal-soft); line-height: 1.6; }
.mxp-course-detail .subscription-note strong { color: var(--teal-darkest); font-weight: 600; }
.mxp-course-detail .btn-buy.is-disabled,
.mxp-course-detail .btn-enroll-il.is-disabled {
  display: block; width: 100%; text-align: center; padding: 14px; border-radius: 6px;
  font-size: 15px; font-weight: 600; margin-bottom: 10px; opacity: 0.65; cursor: not-allowed;
  background: var(--gray-line); color: var(--charcoal-soft); border: 2px solid var(--gray-line);
}
.mxp-course-detail .course-header-type-badges { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 18px; }
.mxp-course-detail .course-header-type-badge {
  display: inline-flex; align-items: center; padding: 5px 12px; border-radius: 999px;
  font-size: 10px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase;
  border: 1px solid rgba(255,255,255,0.35); color: var(--white);
}
.mxp-course-detail .course-header-type-badge.is-live { background: rgba(198, 93, 58, 0.92); }
.mxp-course-detail .course-header-type-badge.is-ondemand { background: rgba(26, 138, 111, 0.92); }
.mxp-course-detail .course-header-type-badge.is-full { background: rgba(255,255,255,0.16); }
.mxp-course-detail .course-header-inner--single { grid-template-columns: 1fr !important; }
.mxp-course-detail .sidebar-pricing-stack { display: flex; flex-direction: column; gap: 24px; }
.mxp-course-detail .course-about-content { font-size: 15px; color: var(--charcoal-soft); line-height: 1.75; }
.mxp-course-detail .course-about-content p:last-child { margin-bottom: 0; }

  /* ============ TWO-COLUMN CONTENT: Content LEFT, Pricing RIGHT ============ */
.mxp-course-detail .course-content { background: var(--white); padding: 70px 32px; }
.mxp-course-detail .content-two-col { max-width: 1240px; margin: 0 auto; display: grid; grid-template-columns: 1fr 340px; gap: 50px; align-items: start; }
.mxp-course-detail .content-two-col.content-two-col--single { grid-template-columns: 1fr; }

  /* Instructor-Led Sidebar (RIGHT) */
.mxp-course-detail .sidebar-pricing { position: sticky; top: 90px; order: 2; }
.mxp-course-detail .sidebar-card { background: var(--cream); border-radius: 14px; padding: 28px; border: 2px solid var(--teal-mid); box-shadow: var(--shadow-md); }
.mxp-course-detail .sidebar-card .purchase-card-label { color: var(--terracotta); }
.mxp-course-detail .sidebar-card .purchase-price { font-size: 38px; color: var(--teal-darkest); }
.mxp-course-detail .sidebar-card .purchase-type { color: var(--teal-darkest); }
.mxp-course-detail .sidebar-card .purchase-sub-note { color: var(--terracotta); }
.mxp-course-detail .sidebar-card .purchase-sub-note svg { color: var(--terracotta); }
.mxp-course-detail .btn-enroll-il { display: block; width: 100%; text-align: center; background: var(--teal-darkest); color: var(--white); padding: 14px; border-radius: 6px; text-decoration: none; font-size: 15px; font-weight: 600; border: 2px solid var(--teal-darkest); transition: all 0.2s; margin-bottom: 10px; cursor: pointer; }
.mxp-course-detail .btn-enroll-il:hover { background: var(--teal-deep); border-color: var(--teal-deep); }
.mxp-course-detail .btn-cart-il { display: block; width: 100%; text-align: center; background: transparent; color: var(--teal-darkest); padding: 12px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600; border: 1.5px solid var(--charcoal-soft); transition: all 0.2s; margin-bottom: 10px; cursor: pointer; }
.mxp-course-detail .btn-cart-il:hover { background: var(--charcoal); color: var(--white); border-color: var(--charcoal); }
.mxp-course-detail .btn-bundle-il { display: block; text-align: center; font-size: 13px; color: var(--teal-mid); font-weight: 600; text-decoration: none; padding: 10px; border: 1.5px solid var(--teal-mid); border-radius: 6px; transition: all 0.2s; margin-bottom: 20px; }
.mxp-course-detail .btn-bundle-il:hover { background: var(--teal-mid); color: var(--white); }
.mxp-course-detail .sidebar-includes { list-style: none; margin-top: 4px; }
.mxp-course-detail .sidebar-includes li { padding: 6px 0; font-size: 12.5px; color: var(--charcoal-soft); display: flex; align-items: flex-start; gap: 8px; }
.mxp-course-detail .sidebar-includes li svg { width: 15px; height: 15px; color: var(--teal-mid); flex-shrink: 0; margin-top: 1px; }
.mxp-course-detail .sidebar-il-badge { display: inline-flex; align-items: center; gap: 6px; background: var(--teal-darkest); color: var(--white); font-size: 11px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; padding: 5px 12px; border-radius: 4px; margin-bottom: 14px; }
.mxp-course-detail .sidebar-il-badge svg { width: 14px; height: 14px; }

  /* Left content column */
.mxp-course-detail .content-inner { min-width: 0; order: 1; }
.mxp-course-detail .content-inner h2 { font-size: 28px; margin: 50px 0 18px; padding-top: 30px; border-top: 1px solid var(--gray-line); }
.mxp-course-detail .content-inner h2:first-of-type { margin-top: 0; padding-top: 0; border-top: none; }
.mxp-course-detail .content-inner p { font-size: 15px; color: var(--charcoal-soft); line-height: 1.8; margin-bottom: 16px; }

  /* Objectives */
.mxp-course-detail .objectives-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 20px; }
.mxp-course-detail .objective-item { display: flex; gap: 10px; align-items: flex-start; background: var(--cream); border-radius: 10px; padding: 16px 18px; }
.mxp-course-detail .objective-item svg { width: 18px; height: 18px; color: var(--teal-mid); flex-shrink: 0; margin-top: 1px; }
.mxp-course-detail .objective-item p { font-size: 14px; color: var(--charcoal); line-height: 1.5; margin: 0; }
.mxp-course-detail .course-outcomes-content ul {
  list-style: none; padding: 0; margin: 0; display: grid;
  grid-template-columns: repeat(2, 1fr); gap: 14px;
}
.mxp-course-detail .course-outcomes-content li {
  display: flex; gap: 10px; align-items: flex-start; background: var(--cream);
  border-radius: 10px; padding: 16px 18px; font-size: 14px; color: var(--charcoal); line-height: 1.5;
}
.mxp-course-detail .course-outcomes-content li::before {
  content: ''; width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%231A8A6F' stroke-width='2'%3E%3Cpath d='M22 11.08V12a10 10 0 1 1-5.93-9.14'/%3E%3Cpolyline points='22 4 12 14.01 9 11.01'/%3E%3C/svg%3E") center/contain no-repeat;
}
.mxp-course-detail .course-outcomes-content > p {
  background: var(--cream); border-radius: 10px; padding: 16px 18px;
  font-size: 14px; color: var(--charcoal); line-height: 1.5; margin-bottom: 14px;
}
.mxp-course-detail .related-card-image img { width: 100%; height: 100%; object-fit: cover; display: block; }
.mxp-course-detail .section-empty {
  background: var(--cream); border: 1px dashed var(--gray-line); border-radius: 10px;
  padding: 24px; color: var(--charcoal-soft); font-size: 14px;
}
.mxp-course-detail .instructor-photo img {
  width: 100%; height: 100%; object-fit: cover; border-radius: 12px; display: block;
}

  /* Modules */
.mxp-course-detail .module-list { display: flex; flex-direction: column; gap: 12px; margin-bottom: 20px; }
.mxp-course-detail .module-item { background: var(--cream); border-radius: 10px; overflow: hidden; border: 1px solid var(--gray-line); }
.mxp-course-detail .module-item summary { padding: 18px 22px; cursor: pointer; font-family: var(--serif); font-size: 16px; font-weight: 600; color: var(--teal-darkest); list-style: none; display: flex; justify-content: space-between; align-items: center; gap: 16px; }
.mxp-course-detail .module-item summary::-webkit-details-marker { display: none; }
.mxp-course-detail .module-item summary::after { content: '+'; font-size: 22px; color: var(--terracotta); font-weight: 400; }
.mxp-course-detail .module-item[open] summary::after { content: '\2212'; }
.mxp-course-detail .module-item summary .module-meta { font-family: var(--sans); font-size: 12px; color: var(--charcoal-soft); font-weight: 500; margin-left: auto; margin-right: 12px; }
.mxp-course-detail .module-body { padding: 0 22px 18px; }
.mxp-course-detail .module-body ul { list-style: none; }
.mxp-course-detail .module-body li { padding: 6px 0 6px 20px; position: relative; font-size: 14px; color: var(--charcoal-soft); line-height: 1.6; }
.mxp-course-detail .module-body li::before { content: '\00B7'; position: absolute; left: 6px; color: var(--teal-mid); font-weight: 700; font-size: 18px; }

  /* ============ INSTRUCTOR (with photo) ============ */
.mxp-course-detail .instructor-card { display: flex; gap: 28px; align-items: flex-start; background: var(--cream); border-radius: 14px; padding: 32px; margin-bottom: 20px; }
.mxp-course-detail .instructor-photo { width: 110px; height: 110px; border-radius: 14px; overflow: hidden; flex-shrink: 0; border: 3px solid var(--white); box-shadow: var(--shadow-sm); }
.mxp-course-detail .instructor-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
.mxp-course-detail .instructor-photo-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, var(--teal-mid), var(--teal-deep));
    display: flex; align-items: center; justify-content: center;
    color: var(--white); font-family: var(--serif); font-size: 32px; font-weight: 700;
  }
.mxp-course-detail .instructor-info h4 { font-family: var(--sans); font-size: 17px; font-weight: 700; color: var(--teal-darkest); margin-bottom: 2px; }
.mxp-course-detail .instructor-info .credentials { font-family: var(--serif); font-style: italic; font-size: 14px; color: var(--terracotta); margin-bottom: 10px; }
.mxp-course-detail .instructor-info p { font-size: 14px; color: var(--charcoal-soft); line-height: 1.7; margin: 0; }

  /* Instructor's Other Courses */
.mxp-course-detail .instructor-courses { margin-top: 10px; }
.mxp-course-detail .instructor-courses h3 { font-size: 18px; margin-bottom: 16px; color: var(--teal-darkest); }
.mxp-course-detail .instructor-courses-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
.mxp-course-detail .instructor-course-card { background: var(--cream); border-radius: 10px; padding: 18px 20px; border: 1px solid var(--gray-line); text-decoration: none; color: inherit; display: block; transition: all 0.2s; }
.mxp-course-detail .instructor-course-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-sm); border-color: var(--teal-mid); }
.mxp-course-detail .instructor-course-card .ic-tag { font-size: 10px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: var(--teal-mid); margin-bottom: 4px; }
.mxp-course-detail .instructor-course-card h4 { font-size: 15px; color: var(--teal-darkest); margin-bottom: 4px; font-weight: 600; }
.mxp-course-detail .instructor-course-card p { font-size: 12px; color: var(--charcoal-soft); margin: 0; line-height: 1.5; }
.mxp-course-detail .instructor-course-card .ic-price { font-family: var(--serif); font-size: 15px; font-weight: 700; color: var(--terracotta); margin-top: 8px; }

  /* ============ REVIEWS ============ */
.mxp-course-detail .reviews-section { background: var(--cream); padding: 80px 32px; }
.mxp-course-detail .reviews-inner { max-width: 1080px; margin: 0 auto; }
.mxp-course-detail .reviews-header { text-align: center; margin-bottom: 50px; }
.mxp-course-detail .reviews-header h2 { font-size: 32px; margin-bottom: 10px; }
.mxp-course-detail .reviews-header p { font-size: 15px; color: var(--charcoal-soft); }
.mxp-course-detail .reviews-summary { display: flex; align-items: center; justify-content: center; gap: 16px; margin-top: 20px; }
.mxp-course-detail .reviews-avg { font-family: var(--serif); font-size: 48px; font-weight: 700; color: var(--teal-darkest); }
.mxp-course-detail .reviews-avg-detail { text-align: left; }
.mxp-course-detail .reviews-stars { display: flex; gap: 3px; margin-bottom: 2px; }
.mxp-course-detail .reviews-stars svg { width: 18px; height: 18px; color: var(--gold-star); fill: var(--gold-star); }
.mxp-course-detail .reviews-count { font-size: 13px; color: var(--charcoal-soft); }
.mxp-course-detail .reviews-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-top: 10px; }
.mxp-course-detail .review-card { background: var(--white); border-radius: 14px; padding: 28px; border: 1px solid var(--gray-line); }
.mxp-course-detail .review-top { display: flex; align-items: center; gap: 14px; margin-bottom: 14px; }
.mxp-course-detail .review-avatar { width: 44px; height: 44px; border-radius: 50%; background: linear-gradient(135deg, var(--teal-mid), var(--teal-deep)); display: flex; align-items: center; justify-content: center; color: var(--white); font-family: var(--serif); font-size: 16px; font-weight: 700; flex-shrink: 0; }
.mxp-course-detail .review-meta { flex: 1; }
.mxp-course-detail .review-meta h4 { font-family: var(--sans); font-size: 14px; font-weight: 600; color: var(--teal-darkest); margin-bottom: 1px; }
.mxp-course-detail .review-meta p { font-size: 12px; color: var(--charcoal-soft); margin: 0; }
.mxp-course-detail .review-stars { display: flex; gap: 2px; margin-bottom: 12px; }
.mxp-course-detail .review-stars svg { width: 15px; height: 15px; color: var(--gold-star); fill: var(--gold-star); }
.mxp-course-detail .review-card p.review-text { font-size: 14px; color: var(--charcoal-soft); line-height: 1.7; margin: 0; }
.mxp-course-detail .review-verified { display: inline-flex; align-items: center; gap: 4px; font-size: 11px; color: var(--teal-mid); font-weight: 500; margin-top: 12px; }
.mxp-course-detail .review-verified svg { width: 13px; height: 13px; }

  /* ============ RELATED COURSES (with images + course type) ============ */
.mxp-course-detail .related-section { background: var(--white); padding: 70px 32px; }
.mxp-course-detail .related-header { text-align: center; margin-bottom: 40px; }
.mxp-course-detail .related-header h2 { font-size: 32px; margin-bottom: 10px; }
.mxp-course-detail .related-header p { font-size: 15px; color: var(--charcoal-soft); }
.mxp-course-detail .related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 1080px; margin: 0 auto; }
.mxp-course-detail .related-card { background: var(--cream); border-radius: 12px; overflow: hidden; border: 1px solid var(--gray-line); transition: transform 0.2s, box-shadow 0.2s; text-decoration: none; color: inherit; display: block; }
.mxp-course-detail .related-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.mxp-course-detail .related-card-image { width: 100%; height: 160px; overflow: hidden; }
.mxp-course-detail .related-card-image img { width: 100%; height: 100%; object-fit: cover; display: block; }
.mxp-course-detail .related-card-image-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(26,138,111,0.15) 0%, rgba(15,110,86,0.25) 100%);
    display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 6px;
    color: var(--teal-mid); font-size: 12px;
  }
.mxp-course-detail .related-card-image-placeholder svg { width: 28px; height: 28px; opacity: 0.35; }
.mxp-course-detail .related-card-body { padding: 22px 24px 24px; }
.mxp-course-detail .related-tag { font-size: 11px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; color: var(--teal-mid); margin-bottom: 6px; }
.mxp-course-detail .related-card h3 { font-size: 18px; margin-bottom: 6px; color: var(--teal-darkest); }
.mxp-course-detail .related-card p.related-desc { font-size: 13px; color: var(--charcoal-soft); line-height: 1.6; margin-bottom: 14px; }
.mxp-course-detail .related-card-footer { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
.mxp-course-detail .related-price { font-family: var(--serif); font-size: 20px; font-weight: 700; color: var(--terracotta); }
.mxp-course-detail .related-course-type { font-size: 10px; font-weight: 600; letter-spacing: 0.8px; text-transform: uppercase; padding: 4px 10px; border-radius: 4px; white-space: nowrap; }
.mxp-course-detail .related-course-type.self-study { background: rgba(26,138,111,0.1); color: var(--teal-deep); }
.mxp-course-detail .related-course-type.instructor-led { background: rgba(198,93,58,0.12); color: var(--terracotta-deep); }

  /* ============ FINAL CTA ============ */
.mxp-course-detail .final-cta { background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%); color: var(--white); padding: 80px 32px; text-align: center; }
.mxp-course-detail .final-cta-inner { max-width: 700px; margin: 0 auto; }
.mxp-course-detail .final-cta h2 { color: var(--white); font-size: clamp(28px, 4vw, 40px); margin-bottom: 16px; }
.mxp-course-detail .final-cta h2 em { font-style: italic; color: var(--cream); }
.mxp-course-detail .final-cta p { font-size: 17px; color: var(--cream-warm); margin-bottom: 30px; line-height: 1.6; }
.mxp-course-detail .cta-price-row { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-bottom: 24px; }
.mxp-course-detail .cta-option { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 12px; padding: 20px 28px; text-align: center; min-width: 200px; }
.mxp-course-detail .cta-option-price { font-family: var(--serif); font-size: 32px; font-weight: 700; color: var(--white); }
.mxp-course-detail .cta-option-label { font-size: 13px; color: var(--cream-warm); margin-top: 4px; }
.mxp-course-detail .btn-primary { background: var(--terracotta); color: var(--white); padding: 16px 36px; border-radius: 6px; text-decoration: none; font-size: 15px; font-weight: 600; transition: all 0.2s; display: inline-block; border: 2px solid var(--terracotta); }
.mxp-course-detail .btn-primary:hover { background: var(--terracotta-deep); border-color: var(--terracotta-deep); transform: translateY(-1px); }

  /* ============ FOOTER ============ */
.mxp-course-detail .footer { background: var(--teal-darkest); color: var(--cream-warm); padding: 70px 32px 30px; }
.mxp-course-detail .footer-inner { max-width: 1240px; margin: 0 auto; }
.mxp-course-detail .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 40px; }
.mxp-course-detail .footer-col h5 { font-family: var(--serif); font-weight: 700; font-size: 16px; color: var(--cream); margin-bottom: 16px; }
.mxp-course-detail .footer-col ul { list-style: none; }
.mxp-course-detail .footer-col ul li { margin-bottom: 10px; }
.mxp-course-detail .footer-col ul a { color: rgba(245, 237, 224, 0.75); text-decoration: none; font-size: 13.5px; transition: color 0.2s; }
.mxp-course-detail .footer-col ul a:hover { color: var(--terracotta); }
.mxp-course-detail .footer-brand-block .footer-brand { font-family: var(--serif); font-weight: 700; font-size: 22px; color: var(--white); margin-bottom: 14px; }
.mxp-course-detail .footer-brand-block .footer-brand em { font-style: italic; color: var(--terracotta); }
.mxp-course-detail .footer-brand-block p { font-size: 13px; line-height: 1.7; color: rgba(245, 237, 224, 0.7); max-width: 340px; }
.mxp-course-detail .footer-tagline { font-family: var(--serif); font-style: italic; font-size: 15px; color: var(--terracotta); margin-top: 18px; }
.mxp-course-detail .footer-motto { font-family: var(--serif); font-style: italic; font-size: 13px; color: rgba(245,237,224,0.6); margin-top: 8px; }
.mxp-course-detail .footer-contact-band { background: rgba(0,0,0,0.18); padding: 28px 0; margin: 0 -32px; padding-left: 32px; padding-right: 32px; }
.mxp-course-detail .footer-contact-inner { max-width: 1240px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 24px; }
.mxp-course-detail .footer-contact-info { font-size: 13px; line-height: 1.8; color: rgba(245, 237, 224, 0.85); }
.mxp-course-detail .footer-contact-info strong { color: var(--cream); }
.mxp-course-detail .footer-contact-info a { color: rgba(245, 237, 224, 0.85); text-decoration: none; }
.mxp-course-detail .footer-contact-info a:hover { color: var(--terracotta); }
.mxp-course-detail .footer-social { display: flex; gap: 12px; }
.mxp-course-detail .footer-social a { width: 38px; height: 38px; border-radius: 50%; background: rgba(245, 237, 224, 0.1); border: 1px solid rgba(245, 237, 224, 0.15); display: flex; align-items: center; justify-content: center; color: var(--cream); text-decoration: none; transition: all 0.2s; }
.mxp-course-detail .footer-social a:hover { background: var(--terracotta); border-color: var(--terracotta); transform: translateY(-2px); }
.mxp-course-detail .footer-social svg { width: 16px; height: 16px; }
.mxp-course-detail .footer-legal { background: #052821; padding: 24px 32px; margin: 0 -32px; }
.mxp-course-detail .footer-legal-inner { max-width: 1240px; margin: 0 auto; }
.mxp-course-detail .footer-legal-top { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 14px; padding-bottom: 14px; border-bottom: 1px solid rgba(255,255,255,0.1); font-size: 11.5px; color: rgba(255,255,255,0.5); }
.mxp-course-detail .footer-legal-links { display: flex; gap: 18px; }
.mxp-course-detail .footer-legal-links a { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 11.5px; }
.mxp-course-detail .footer-legal-links a:hover { color: var(--terracotta); }
.mxp-course-detail .footer-disclaimer { font-size: 11px; color: rgba(255,255,255,0.38); line-height: 1.65; }

  /* ============ RESPONSIVE ============ */
  @media (max-width: 1060px) {
.mxp-course-detail .content-two-col { grid-template-columns: 1fr 280px; gap: 32px; }
  }
  @media (max-width: 960px) {
.mxp-course-detail .nav-links { display: none; }
.mxp-course-detail .course-header-inner { grid-template-columns: 1fr; }
.mxp-course-detail .purchase-card { max-width: 400px; }
.mxp-course-detail .content-two-col { grid-template-columns: 1fr; }
.mxp-course-detail .sidebar-pricing { position: static; order: 0; }
.mxp-course-detail .content-inner { order: 1; }
.mxp-course-detail .sidebar-card { max-width: 400px; }
.mxp-course-detail .objectives-grid { grid-template-columns: 1fr; }
.mxp-course-detail .instructor-courses-grid { grid-template-columns: 1fr; }
.mxp-course-detail .reviews-grid { grid-template-columns: 1fr; }
.mxp-course-detail .related-grid { grid-template-columns: 1fr; max-width: 440px; margin: 0 auto; }
.mxp-course-detail .cta-price-row { flex-direction: column; align-items: center; }
.mxp-course-detail .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
.mxp-course-detail .footer-brand-block { grid-column: 1 / -1; }
  }
  @media (max-width: 640px) {
.mxp-course-detail .course-hero-image img, .mxp-course-detail .course-hero-image-placeholder { height: 180px; }
.mxp-course-detail .instructor-card { flex-direction: column; align-items: center; text-align: center; }
.mxp-course-detail .footer-grid { grid-template-columns: 1fr; }
.mxp-course-detail .footer-contact-inner { flex-direction: column; align-items: flex-start; }
.mxp-course-detail .footer-legal-top { flex-direction: column; align-items: flex-start; }
  }
</style>

<div class="breadcrumb">
  <div class="breadcrumb-inner">
    <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span><a href="{{ route('quizzes') }}">Prep-Courses</a><span>&rsaquo;</span>{{ $course->title ?? 'Medical-Surgical Nursing' }}
  </div>
</div>

<!-- ============================================================
     COURSE HEADER + ON-DEMAND PURCHASE CARD ($79)
     ============================================================ -->
<header class="course-header">
  <div class="course-header-inner {{ empty($headerPurchase) ? 'course-header-inner--single' : '' }}">
    <div class="course-header-text">
      @if (!empty($categoryName))
        <span class="course-domain">{{ $categoryName }}</span>
      @endif
      <h1>{{ $course->title }}</h1>
      @if (!empty($courseExcerpt))
        <p class="course-header-desc">{{ $courseExcerpt }}</p>
      @endif
      @if (!empty($typeBadges))
        <div class="course-header-type-badges">
          @foreach ($typeBadges as $badge)
            <span class="course-header-type-badge {{ $badge['class'] === 'pc-badge-live' ? 'is-live' : ($badge['class'] === 'pc-badge-ondemand' ? 'is-ondemand' : 'is-full') }}">{{ $badge['label'] }}</span>
          @endforeach
        </div>
      @endif
      <div class="course-meta">
        @if (($total ?? 0) > 0)
          <div class="course-meta-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            {{ $total }} {{ $total === 1 ? 'Lesson' : 'Lessons' }}
          </div>
        @endif
        @if (count($purchaseOptions ?? []) > 1)
          <div class="course-meta-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            {{ count($purchaseOptions) }} Learning Options
          </div>
        @endif
        @if (($detailReviewStats['total'] ?? 0) > 0)
          <div class="course-meta-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            {{ $detailReviewStats['rating'] }} ({{ $detailReviewStats['total'] }} {{ $detailReviewStats['total'] === 1 ? 'Review' : 'Reviews' }})
          </div>
        @endif
      </div>

      <div class="course-hero-image">
        @if (!empty($courseImage))
          <img src="{{ $courseImage }}" alt="{{ $course->title }}">
        @else
          <div class="course-hero-image-placeholder">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            {{ $course->title }}
          </div>
        @endif
      </div>
    </div>

    @if (!empty($headerPurchase))
      @include(theme('components.partials.course-detail-purchase-card'), ['option' => $headerPurchase, 'variant' => 'header'])
    @endif
  </div>
</header>

<!-- ============================================================
     MAIN CONTENT — Content LEFT, Instructor-Led Pricing RIGHT
     ============================================================ -->
<section class="course-content">
  <div class="content-two-col {{ empty($sidebarPurchases) ? 'content-two-col--single' : '' }}">

    <!-- LEFT COLUMN: Course Details -->
    <div class="content-inner">

      <h2>About This Course</h2>
      @if (!empty($course->about))
        <div class="course-about-content">{!! $course->about !!}</div>
      @else
        <p>Explore this prep-course and choose the learning option that fits you best.</p>
      @endif

      @if (!empty($course->outcomes))
        <h2>Learning Objectives</h2>
        <div class="course-outcomes-content">{!! $course->outcomes !!}</div>
      @endif

      <h2>Course Modules</h2>
      @if ($course->chapters->count())
        <div class="module-list">
          @foreach ($course->chapters as $chapter)
            @php
              $chapterLessons = $chapter->lessons;
              $lessonCount = $chapterLessons->count();
              $quizCount = $chapterLessons->where('is_quiz', 1)->count();
            @endphp
            <details class="module-item">
              <summary>
                {{ $chapter->name }}
                <span class="module-meta">
                  {{ $lessonCount }} {{ $lessonCount === 1 ? 'lesson' : 'lessons' }}
                  @if ($quizCount)
                    &middot; {{ $quizCount }} {{ $quizCount === 1 ? 'quiz' : 'quizzes' }}
                  @endif
                </span>
              </summary>
              <div class="module-body">
                @if ($lessonCount)
                  <ul>
                    @foreach ($chapterLessons as $lesson)
                      <li>{{ $lesson->name }}</li>
                    @endforeach
                  </ul>
                @else
                  <p class="section-empty" style="margin:0;">No lessons added to this module yet.</p>
                @endif
              </div>
            </details>
          @endforeach
        </div>
      @else
        <p class="section-empty">Course modules will be published soon.</p>
      @endif

      @if ($course->user)
        <h2>Your Instructor</h2>
        <div class="instructor-card">
          <div class="instructor-photo">
            @if (!empty($course->user->image))
              <img src="{{ getInstructorImage($course->user->image) }}" alt="{{ $course->user->name }}">
            @else
              @php
                $instructorParts = preg_split('/\s+/', trim($course->user->name ?? 'I'));
                $instructorInitials = strtoupper(substr($instructorParts[0] ?? 'I', 0, 1) . substr($instructorParts[1] ?? '', 0, 1));
              @endphp
              <div class="instructor-photo-placeholder">{{ $instructorInitials }}</div>
            @endif
          </div>
          <div class="instructor-info">
            <h4>
              <a href="{{ route('instructorDetails', [$course->user->id, $course->user->name]) }}" style="color:inherit;text-decoration:none;">
                {{ $course->user->name }}
              </a>
            </h4>
            @if (!empty($course->user->headline))
              <p class="credentials">{{ $course->user->headline }}</p>
            @endif
            @if (!empty($course->user->short_details))
              <p>{{ $course->user->short_details }}</p>
            @elseif (!empty($course->user->about))
              <div>{!! \App\View\Components\QuizPageSection::excerpt($course->user->about, 260) !!}</div>
            @endif
            @if (($userRating['total'] ?? 0) > 0)
              <p style="font-size:13px;color:var(--teal-mid);margin-top:10px;">
                {{ $userRating['rating'] }} rating &middot; {{ $userRating['total'] }} reviews
              </p>
            @endif
          </div>
        </div>
      @endif

      @if (($instructorCourses ?? collect())->count())
        <div class="instructor-courses">
          <h3>More Courses by This Instructor</h3>
          <div class="instructor-courses-grid">
            @foreach ($instructorCourses as $instructorCourse)
              @php
                $icCategory = $instructorCourse->category
                  ? (is_array($instructorCourse->category->name) ? ($instructorCourse->category->name[app()->getLocale()] ?? reset($instructorCourse->category->name)) : $instructorCourse->category->name)
                  : 'Course';
                $icPrice = \App\View\Components\QuizPageSection::listingPriceLabel($instructorCourse);
                $icExcerpt = \App\View\Components\QuizPageSection::excerpt($instructorCourse->about, 90);
              @endphp
              <a href="{{ route('courseDetailsView', $instructorCourse->slug) }}" class="instructor-course-card">
                <p class="ic-tag">{{ $icCategory }}</p>
                <h4>{{ $instructorCourse->title }}</h4>
                <p>{{ $icExcerpt ?: 'Explore this prep-course.' }}</p>
                <p class="ic-price">{{ $icPrice ?: 'View options' }}</p>
              </a>
            @endforeach
          </div>
        </div>
      @endif

    </div>

    @if (!empty($sidebarPurchases))
      <aside class="sidebar-pricing">
        <div class="sidebar-pricing-stack">
          @foreach ($sidebarPurchases as $sidebarPurchase)
            @include(theme('components.partials.course-detail-purchase-card'), ['option' => $sidebarPurchase, 'variant' => 'sidebar'])
          @endforeach
        </div>
      </aside>
    @endif

  </div>
</section>

<!-- ============================================================
     STUDENT REVIEWS
     ============================================================ -->
<section class="reviews-section">
  <div class="reviews-inner">
    <div class="reviews-header">
      <h2>What Students Are Saying</h2>
      <p>Real feedback from students who completed this course.</p>
      @if (($detailReviewStats['total'] ?? 0) > 0)
        <div class="reviews-summary">
          <span class="reviews-avg">{{ $detailReviewStats['rating'] }}</span>
          <div class="reviews-avg-detail">
            <div class="reviews-stars">
              @for ($star = 1; $star <= 5; $star++)
                <svg viewBox="0 0 24 24" @if($star > round($detailReviewStats['rating'])) fill="none" stroke="currentColor" stroke-width="2" @endif><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              @endfor
            </div>
            <p class="reviews-count">Based on {{ $detailReviewStats['total'] }} {{ $detailReviewStats['total'] === 1 ? 'review' : 'reviews' }}</p>
          </div>
        </div>
      @endif
    </div>

    @if (($detailReviews ?? collect())->count())
      <div class="reviews-grid">
        @foreach ($detailReviews as $review)
          @php
            $reviewName = $review->user->name ?? 'Student';
            $nameParts = preg_split('/\s+/', trim($reviewName));
            $reviewInitials = strtoupper(substr($nameParts[0] ?? 'S', 0, 1) . substr($nameParts[1] ?? '', 0, 1));
          @endphp
          <div class="review-card">
            <div class="review-top">
              <div class="review-avatar">{{ $reviewInitials }}</div>
              <div class="review-meta">
                <h4>{{ $reviewName }}</h4>
                <p>Student Review</p>
              </div>
            </div>
            <div class="review-stars">
              @for ($star = 1; $star <= 5; $star++)
                <svg viewBox="0 0 24 24" @if($star > (int) $review->star) fill="none" stroke="currentColor" stroke-width="2" @endif><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              @endfor
            </div>
            <p class="review-text">{{ $review->comment }}</p>
            <span class="review-verified"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Verified Student</span>
          </div>
        @endforeach
      </div>
    @else
      <p class="section-empty">No reviews yet. Be the first to share your experience after enrolling.</p>
    @endif
  </div>
</section>

<!-- ============================================================
     STUDENTS ALSO ENROLLED IN (with images + course type badges)
     ============================================================ -->
@if (($relatedCourses ?? collect())->count())
  <section class="related-section">
    <div class="container">
      <div class="related-header">
        <h2>Students Also Enrolled In</h2>
        <p>Build a complete study plan with these complementary courses.</p>
      </div>
      <div class="related-grid">
        @foreach ($relatedCourses as $relatedCourse)
          @php
            $relatedCategory = $relatedCourse->category
              ? (is_array($relatedCourse->category->name) ? ($relatedCourse->category->name[app()->getLocale()] ?? reset($relatedCourse->category->name)) : $relatedCourse->category->name)
              : 'Course';
            $relatedPrice = \App\View\Components\QuizPageSection::listingPriceLabel($relatedCourse);
            $relatedExcerpt = \App\View\Components\QuizPageSection::excerpt($relatedCourse->about, 100);
            $relatedImage = !empty($relatedCourse->thumbnail) ? getCourseImage($relatedCourse->thumbnail) : null;
            $relatedBadges = \App\View\Components\QuizPageSection::listingTypeBadges($relatedCourse);
            $relatedTypeLabel = count($relatedBadges) === 1 ? $relatedBadges[0]['label'] : (count($relatedBadges) > 1 ? count($relatedBadges) . ' Options' : 'Prep-Course');
          @endphp
          <a href="{{ route('courseDetailsView', $relatedCourse->slug) }}" class="related-card">
            <div class="related-card-image">
              @if ($relatedImage)
                <img src="{{ $relatedImage }}" alt="{{ $relatedCourse->title }}" style="width:100%;height:100%;object-fit:cover;display:block;">
              @else
                <div class="related-card-image-placeholder">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                  {{ $relatedCourse->title }}
                </div>
              @endif
            </div>
            <div class="related-card-body">
              <p class="related-tag">{{ $relatedCategory }}</p>
              <h3>{{ $relatedCourse->title }}</h3>
              <p class="related-desc">{{ $relatedExcerpt ?: 'Explore this prep-course.' }}</p>
              <div class="related-card-footer">
                <span class="related-price">{{ $relatedPrice ?: 'View options' }}</span>
                <span class="related-course-type {{ count($relatedBadges) === 1 && ($relatedBadges[0]['class'] ?? '') === 'pc-badge-ondemand' ? 'self-study' : 'instructor-led' }}">{{ $relatedTypeLabel }}</span>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
@endif

<!-- ============================================================
     FINAL CTA
     ============================================================ -->
<section class="final-cta">
  <div class="final-cta-inner">
    <h2>Ready to start <em>{{ $course->title }}?</em></h2>
    <p>Choose the learning format that fits your style &mdash; self-paced or instructor-led.</p>
    @if (!empty($purchaseOptions))
      <div class="cta-price-row">
        @foreach ($purchaseOptions as $ctaOption)
          <div class="cta-option">
            <p class="cta-option-price">{{ $ctaOption['price_label'] ?? 'TBA' }}</p>
            <p class="cta-option-label">{{ $ctaOption['title'] }}</p>
          </div>
        @endforeach
      </div>
      @if (!empty($headerPurchase) && $headerPurchase['can_purchase'])
        <a href="{{ $headerPurchase['buy_url'] }}" class="btn-primary">Get Started Now &rarr;</a>
      @endif
    @endif
  </div>
</section>

</div>
