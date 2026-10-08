<div class="mxp-main-community">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10)
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth
        }

        .mxp-main-community {
            font-family: var(--sans);
            color: var(--charcoal);
            background: var(--cream);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased
        }

        .mxp-main-community h1,
        .mxp-main-community h2,
        .mxp-main-community h3,
        .mxp-main-community h4 {
            font-family: var(--serif);
            font-weight: 700;
            line-height: 1.2;
            color: var(--teal-darkest)
        }

        .nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(245, 237, 224, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--gray-line);
            padding: 16px 0
        }

        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px
        }

        .nav-brand {
            font-family: var(--serif);
            font-weight: 700;
            font-size: 20px;
            color: var(--teal-darkest);
            text-decoration: none
        }

        .nav-brand-accent {
            color: var(--terracotta);
            font-style: italic
        }

        .nav-links {
            display: flex;
            gap: 28px;
            list-style: none
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--charcoal);
            text-decoration: none;
            transition: color 0.2s
        }

        .nav-links a:hover {
            color: var(--teal-mid)
        }

        .nav-cta {
            background: var(--terracotta);
            color: var(--white);
            padding: 10px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600
        }

        .breadcrumb {
            background: var(--cream-warm);
            padding: 12px 32px;
            font-size: 13px;
            color: var(--charcoal-soft)
        }

        .breadcrumb-inner {
            max-width: 1200px;
            margin: 0 auto
        }

        .breadcrumb a {
            color: var(--teal-mid);
            text-decoration: none
        }

        .breadcrumb span {
            margin: 0 8px;
            opacity: 0.5
        }

        .hero {
            background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
            color: var(--white);
            padding: 80px 32px 90px;
            position: relative;
            overflow: hidden
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
            border-radius: 50%
        }

        .hero-inner {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1
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
            border-radius: 30px
        }

        .hero h1 {
            font-size: clamp(38px, 5vw, 56px);
            color: var(--white);
            margin-bottom: 22px
        }

        .hero h1 em {
            font-style: italic;
            color: var(--cream);
            font-weight: 400
        }

        .hero-sub {
            font-size: 18px;
            line-height: 1.7;
            color: var(--cream-warm);
            max-width: 640px;
            margin: 0 auto
        }

        .section-eyebrow {
            font-size: 12px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--terracotta);
            font-weight: 600;
            margin-bottom: 14px
        }

        .section-title {
            font-size: clamp(28px, 3.5vw, 38px);
            color: var(--teal-darkest);
            margin-bottom: 14px
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px
        }

        /* nav title */

        .mxp-main-community .ce-breadcrumb {
            background: var(--ce-cream-warm);
            padding: 14px 32px;
            border-bottom: 1px solid var(--ce-gray-line)
        }

        .mxp-main-community .ce-breadcrumb-inner {
            max-width: 1240px;
            margin: 0 auto;
            font-size: 13px;
            color: var(--ce-charcoal-soft)
        }

        .mxp-main-community .ce-breadcrumb-inner a {
            color: var(--ce-teal-mid);
            text-decoration: none;
            font-weight: 500
        }

        .mxp-main-community .ce-breadcrumb-inner a:hover {
            color: var(--ce-terracotta)
        }

        .mxp-main-community .ce-breadcrumb-inner span {
            margin: 0 8px;
            opacity: .5
        }

        /* Featured post */
        .featured-section {
            background: var(--white);
            padding: 80px 32px
        }

        .featured-post {
            max-width: 1080px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 48px;
            background: var(--cream);
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid var(--gray-line)
        }

        .featured-image {
            background: linear-gradient(135deg, var(--teal-deep) 0%, var(--teal-darkest) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cream);
            font-family: var(--serif);
            font-style: italic;
            font-size: 16px;
            text-align: center;
            padding: 40px;
            min-height: 320px
        }

        .featured-content {
            padding: 40px 40px 40px 0;
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .featured-cat {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--terracotta);
            font-weight: 600;
            margin-bottom: 12px
        }

        .featured-content h2 {
            font-size: 28px;
            color: var(--teal-darkest);
            margin-bottom: 12px;
            line-height: 1.2
        }

        .featured-excerpt {
            font-size: 15px;
            color: var(--charcoal-soft);
            line-height: 1.7;
            margin-bottom: 20px
        }

        .featured-meta {
            font-size: 13px;
            color: var(--charcoal-soft);
            margin-bottom: 20px
        }

        .featured-link {
            color: var(--teal-mid);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px
        }

        .featured-link:hover {
            color: var(--terracotta)
        }

        /* Filters */
        .blog-section {
            background: var(--cream);
            padding: 80px 32px
        }

        .filter-tabs {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 48px
        }

        .filter-tab {
            background: var(--white);
            border: 1px solid var(--gray-line);
            border-radius: 30px;
            padding: 8px 20px;
            font-family: var(--sans);
            font-size: 13px;
            font-weight: 500;
            color: var(--charcoal-soft);
            cursor: pointer;
            transition: all 0.2s;
            border: none
        }

        .filter-tab:hover {
            color: var(--teal-mid);
            background: var(--cream-warm)
        }

        .filter-tab.active {
            background: var(--teal-darkest);
            color: var(--white)
        }

        /* Article grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            max-width: 1080px;
            margin: 0 auto
        }

        .article-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--gray-line);
            transition: all 0.25s;
            display: flex;
            flex-direction: column
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md)
        }

        .article-image {
            aspect-ratio: 16/10;
            background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cream);
            font-family: var(--serif);
            font-style: italic;
            font-size: 14px;
            text-align: center;
            padding: 20px
        }

        .article-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column
        }

        .article-cat {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--terracotta);
            font-weight: 600;
            margin-bottom: 8px
        }

        .article-card h3 {
            font-size: 18px;
            color: var(--teal-darkest);
            margin-bottom: 10px;
            line-height: 1.3
        }

        .article-excerpt {
            font-size: 13.5px;
            color: var(--charcoal-soft);
            line-height: 1.6;
            margin-bottom: 16px;
            flex: 1
        }

        .article-meta {
            font-size: 12px;
            color: var(--charcoal-soft);
            padding-top: 14px;
            border-top: 1px solid var(--gray-line)
        }

        .article-link {
            display: inline-block;
            margin-top: 12px;
            color: var(--teal-mid);
            text-decoration: none;
            font-weight: 600;
            font-size: 13px
        }

        .article-link:hover {
            color: var(--terracotta)
        }

        /* Newsletter */
        .newsletter-section {
            background: var(--white);
            padding: 80px 32px
        }

        .newsletter-inner {
            max-width: 600px;
            margin: 0 auto;
            text-align: center
        }

        .newsletter-inner h2 {
            font-size: 30px;
            margin-bottom: 12px
        }

        .newsletter-inner p {
            font-size: 15px;
            color: var(--charcoal-soft);
            line-height: 1.7;
            margin-bottom: 24px
        }

        .newsletter-form {
            display: flex;
            gap: 12px
        }

        .newsletter-form input {
            flex: 1;
            padding: 14px 18px;
            border: 1.5px solid var(--gray-line);
            border-radius: 6px;
            font-size: 14.5px;
            font-family: var(--sans)
        }

        .newsletter-form input:focus {
            outline: none;
            border-color: var(--teal-mid)
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
            white-space: nowrap
        }

        .final-cta {
            background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
            padding: 80px 32px;
            text-align: center;
            color: var(--white)
        }

        .final-cta h2 {
            font-size: clamp(28px, 3.5vw, 40px);
            color: var(--white);
            margin-bottom: 18px
        }

        .final-cta h2 em {
            font-style: italic;
            color: var(--cream);
            font-weight: 400
        }

        .final-cta p {
            font-size: 17px;
            color: var(--cream-warm);
            margin-bottom: 32px;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7
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
            transition: all 0.2s
        }

        .btn-on-teal:hover {
            background: var(--terracotta-deep)
        }

        .footer-main {
            background: var(--teal-darkest);
            color: rgba(255, 255, 255, 0.85);
            padding: 70px 0 0
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 40px;
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px 50px
        }

        .footer-brand-col {
            padding-right: 20px
        }

        .footer-logo-mark {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            margin-bottom: 20px
        }

        .footer-seal-wrap {
            width: 56px;
            height: 56px;
            flex-shrink: 0
        }

        .footer-seal-wrap svg {
            width: 100%;
            height: 100%;
            display: block
        }

        .footer-logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.05
        }

        .footer-logo-text .name {
            font-family: var(--serif);
            font-weight: 700;
            font-size: 20px;
            color: var(--white)
        }

        .footer-logo-text .tag {
            font-size: 9.5px;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--terracotta);
            font-weight: 600;
            margin-top: 3px
        }

        .footer-desc {
            font-size: 13.5px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.72);
            margin-bottom: 22px;
            max-width: 340px
        }

        .footer-tagline-motto {
            font-family: var(--serif);
            font-style: italic;
            font-size: 15px;
            color: var(--terracotta);
            margin-bottom: 10px
        }

        .footer-tagline-quote {
            font-family: var(--serif);
            font-style: italic;
            font-size: 14px;
            color: var(--cream);
            opacity: 0.75;
            padding-top: 14px;
            margin-top: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.12)
        }

        .footer-col-title {
            font-family: var(--serif);
            font-weight: 700;
            font-size: 16px;
            color: var(--cream);
            margin-bottom: 18px
        }

        .footer-col ul {
            list-style: none
        }

        .footer-col li {
            margin-bottom: 11px
        }

        .footer-col a {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            font-size: 13.5px;
            transition: color 0.2s
        }

        .footer-col a:hover {
            color: var(--terracotta)
        }

        .footer-contact {
            background: rgba(0, 0, 0, 0.18);
            padding: 30px 0
        }

        .footer-contact-inner {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 24px
        }

        .footer-contact-info {
            font-size: 13.5px;
            line-height: 1.85;
            color: rgba(255, 255, 255, 0.82)
        }

        .footer-contact-info strong {
            color: var(--cream)
        }

        .footer-contact-info a {
            color: rgba(255, 255, 255, 0.82);
            text-decoration: none
        }

        .footer-socials {
            display: flex;
            gap: 12px
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
            transition: all 0.2s
        }

        .social-icon:hover {
            background: var(--terracotta);
            border-color: var(--terracotta);
            color: var(--white)
        }

        .social-icon svg {
            width: 16px;
            height: 16px
        }

        .footer-legal {
            background: #052821;
            padding: 24px 0;
            font-size: 11.5px;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.7
        }

        .footer-legal-inner {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px
        }

        .footer-legal-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1)
        }

        .footer-legal-links {
            display: flex;
            gap: 20px;
            flex-wrap: wrap
        }

        .footer-legal a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none
        }

        .footer-disclaimer {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.38);
            line-height: 1.65;
            max-width: 1100px
        }

        @media(max-width:1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 36px
            }

            .footer-brand-col {
                grid-column: 1/-1
            }
        }

        @media(max-width:900px) {
            .nav-links {
                display: none
            }

            .hero {
                padding: 70px 24px 80px
            }

            .featured-post {
                grid-template-columns: 1fr
            }

            .featured-image {
                min-height: 240px
            }

            .featured-content {
                padding: 32px
            }

            .articles-grid {
                grid-template-columns: 1fr
            }

            .newsletter-form {
                flex-direction: column
            }

            .footer-contact-inner {
                flex-direction: column;
                align-items: flex-start
            }

            .footer-legal-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px
            }
        }

        @media(max-width:768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 32px;
                padding: 0 24px 40px
            }
        }
    </style>


    <!-- TItle -->
    <div class="ce-breadcrumb">
        <div class="ce-breadcrumb-inner">
            <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>Blog
        </div>
    </div>

    <!-- Header -->
    <header class="hero">
        <div class="hero-inner"><span class="hero-eyebrow">MXP Blog</span>
            <h1>Study smarter. <em>Pass with purpose.</em></h1>
            <p class="hero-sub">Weekly study tips, NCLEX question breakdowns, comeback stories, and insights from nursing educators who've helped 1,500+ students find their way back.</p>
        </div>
    </header>

    @php
        $blogExcerpt = function ($html, $limit = 160) {
            return \Illuminate\Support\Str::limit(trim(strip_tags(html_entity_decode($html ?? ''))), $limit);
        };
        $blogReadMinutes = function ($html) {
            $words = str_word_count(trim(strip_tags(html_entity_decode($html ?? ''))));

            return max(1, (int) ceil($words / 200));
        };
        $blogDisplayDate = function ($post) {
            if (! empty($post->authored_date_time)) {
                return \Carbon\Carbon::parse($post->authored_date_time)->format('F Y');
            }
            if (! empty($post->authored_date)) {
                return \Carbon\Carbon::parse($post->authored_date)->format('F Y');
            }

            return $post->created_at?->format('F Y') ?? '';
        };
    @endphp

    <!-- Featured -->
    @if($featuredPost)
    <section class="featured-section">
        <div class="featured-post">
            <div class="featured-image">
                @if($featuredPost->image || $featuredPost->thumbnail)
                    <img src="{{ getBlogImage($featuredPost->thumbnail ?: $featuredPost->image) }}" alt="{{ $featuredPost->title }}" style="width:100%;height:100%;object-fit:cover;min-height:320px;">
                @else
                    Featured image<br>coming soon
                @endif
            </div>
            <div class="featured-content">
                <p class="featured-cat">{{ $featuredPost->category->title ?? __('common.Uncategorized') }}</p>
                <h2>{{ $featuredPost->title }}</h2>
                <p class="featured-excerpt">{{ $blogExcerpt($featuredPost->description, 220) }}</p>
                <p class="featured-meta">{{ $featuredPost->user->name ?? '' }} · {{ $blogReadMinutes($featuredPost->description) }} min · {{ $blogDisplayDate($featuredPost) }}</p>
                <a href="{{ route('blogDetails', $featuredPost->slug) }}" class="featured-link">Read Article →</a>
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Grid -->
    <section class="blog-section">
        @if(isset($categories) && $categories->count())
        <div class="filter-tabs" id="blog-category-filters">
            <button type="button" class="filter-tab active" data-category="all">All</button>
            @foreach ($categories as $category)
                <button type="button" class="filter-tab" data-category="{{ $category->id }}">{{ $category->title }}</button>
            @endforeach
        </div>
        <div class="articles-grid" id="blog-articles-grid">
            @foreach ($categories as $category)
                @foreach ($category->blogs as $post)
                    @if($featuredPost && (int) $post->id === (int) $featuredPost->id)
                        @continue
                    @endif
                    <article class="article-card" data-category="{{ $category->id }}">
                        <div class="article-image">
                            @if($post->image || $post->thumbnail)
                                <img src="{{ getBlogImage($post->thumbnail ?: $post->image) }}" alt="{{ $post->title }}" style="width:100%;height:100%;object-fit:cover;">
                            @else
                                {{ $category->title }}
                            @endif
                        </div>
                        <div class="article-body">
                            <p class="article-cat">{{ $category->title }}</p>
                            <h3>{{ $post->title }}</h3>
                            <p class="article-excerpt">{{ $blogExcerpt($post->description) }}</p>
                            <p class="article-meta">{{ $post->user->name ?? '' }} · {{ $blogReadMinutes($post->description) }} min · {{ $blogDisplayDate($post) }}</p>
                            <a href="{{ route('blogDetails', $post->slug) }}" class="article-link">Read →</a>
                        </div>
                    </article>
                @endforeach
            @endforeach
        </div>
        @else
        <div class="section-header">
            <p class="section-title" style="font-size:20px;">No articles published yet. Check back soon.</p>
        </div>
        @endif
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="newsletter-inner">
            <h2>Get weekly study notes.</h2>
            <p>One email per week — a study tip, a question breakdown, or a comeback story. No fluff, no daily bombardment.</p>
            <div class="newsletter-form"><input type="email" placeholder="Email address" aria-label="Email"><button>Subscribe →</button></div>
        </div>
    </section>

    <section class="final-cta">
        <h2>Need more than tips? <em>Get the full program.</em></h2>
        <p>The blog is free. But if you need structure, coaching, and accountability, our programs deliver all of that.</p><a href="{{ url('/') }}#programs" class="btn-on-teal">Explore Programs →</a>
    </section>

    @if(isset($categories) && $categories->count())
    <script>
        (function () {
            var tabs = document.querySelectorAll('#blog-category-filters .filter-tab');
            var cards = document.querySelectorAll('#blog-articles-grid .article-card');
            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    var category = tab.getAttribute('data-category');
                    tabs.forEach(function (t) { t.classList.remove('active'); });
                    tab.classList.add('active');
                    cards.forEach(function (card) {
                        var show = category === 'all' || card.getAttribute('data-category') === category;
                        card.style.display = show ? '' : 'none';
                    });
                });
            });
        })();
    </script>
    @endif

</div>