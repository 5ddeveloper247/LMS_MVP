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

        .article-header {
            background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
            color: var(--white);
            padding: 80px 32px;
            position: relative;
            overflow: hidden
        }

        .article-header::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(198, 93, 58, 0.18) 0%, transparent 70%);
            border-radius: 50%
        }

        .article-header-inner {
            max-width: 740px;
            margin: 0 auto;
            position: relative;
            z-index: 1
        }

        .article-cat {
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--terracotta);
            font-weight: 600;
            margin-bottom: 16px
        }

        .article-header h1 {
            font-size: clamp(32px, 4.5vw, 48px);
            color: var(--white);
            margin-bottom: 18px;
            line-height: 1.15
        }

        .article-meta {
            font-size: 14px;
            color: var(--cream-warm);
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: center
        }

        .article-body-section {
            background: var(--white);
            padding: 60px 32px 80px
        }

        .article-content {
            max-width: 740px;
            margin: 0 auto
        }

        .article-content p {
            font-size: 16px;
            line-height: 1.85;
            color: var(--charcoal);
            margin-bottom: 20px
        }

        .article-content h2 {
            font-size: 26px;
            color: var(--teal-darkest);
            margin: 40px 0 16px
        }

        .article-content h3 {
            font-size: 20px;
            color: var(--teal-deep);
            margin: 32px 0 12px
        }

        .article-content blockquote {
            background: linear-gradient(135deg, var(--cream) 0%, var(--cream-warm) 100%);
            border-left: 4px solid var(--terracotta);
            border-radius: 0 10px 10px 0;
            padding: 24px 28px;
            margin: 28px 0;
            font-family: var(--serif);
            font-style: italic;
            font-size: 18px;
            line-height: 1.6;
            color: var(--teal-deep)
        }

        .article-content ul {
            margin: 16px 0 20px 24px
        }

        .article-content li {
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 8px;
            color: var(--charcoal)
        }

        .article-cta-box {
            background: var(--cream);
            border-radius: 12px;
            padding: 32px;
            text-align: center;
            margin: 40px 0;
            border: 1px solid var(--gray-line)
        }

        .article-cta-box h3 {
            font-size: 22px;
            margin-bottom: 10px
        }

        .article-cta-box p {
            font-size: 14px;
            color: var(--charcoal-soft);
            margin-bottom: 18px
        }

        .btn-primary {
            display: inline-block;
            background: var(--terracotta);
            color: var(--white);
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s
        }

        .btn-primary:hover {
            background: var(--terracotta-deep)
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

        .author-card {
            max-width: 740px;
            margin: 0 auto;
            display: flex;
            gap: 24px;
            align-items: center;
            background: var(--cream);
            border-radius: 12px;
            padding: 28px;
            border-left: 4px solid var(--terracotta)
        }

        .author-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--teal-deep);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cream);
            font-family: var(--serif);
            font-size: 28px;
            font-weight: 700
        }

        .author-info h4 {
            font-size: 17px;
            color: var(--teal-darkest);
            margin-bottom: 4px
        }

        .author-info p {
            font-size: 13.5px;
            color: var(--charcoal-soft);
            line-height: 1.6
        }

        .related-section {
            background: var(--cream);
            padding: 80px 32px
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px
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
            color: var(--teal-darkest)
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: 1080px;
            margin: 0 auto
        }

        .related-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--gray-line);
            transition: all 0.25s
        }

        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md)
        }

        .related-image {
            aspect-ratio: 16/10;
            background: linear-gradient(135deg, var(--teal-mid) 0%, var(--teal-deep) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--cream);
            font-family: var(--serif);
            font-style: italic;
            font-size: 13px;
            padding: 16px
        }

        .related-body {
            padding: 20px
        }

        .related-cat {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--terracotta);
            font-weight: 600;
            margin-bottom: 6px
        }

        .related-card h3 {
            font-size: 16px;
            color: var(--teal-darkest);
            margin-bottom: 8px
        }

        .related-link {
            color: var(--teal-mid);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600
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
            font-weight: 600
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
            font-size: 13.5px
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
            background: var(--terracotta)
        }

        .social-icon svg {
            width: 16px;
            height: 16px
        }

        .footer-legal {
            background: #052821;
            padding: 24px 0;
            font-size: 11.5px;
            color: rgba(255, 255, 255, 0.5)
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
            gap: 20px
        }

        .footer-legal a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none
        }

        .footer-disclaimer {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.38);
            line-height: 1.65
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

            .article-header {
                padding: 60px 24px
            }

            .related-grid {
                grid-template-columns: 1fr
            }

            .author-card {
                flex-direction: column;
                text-align: center
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

    @php
        $authorName = $blog->user->name ?? Settings('site_title');
        $authorInitials = collect(preg_split('/\s+/', trim($authorName)))->filter()->map(fn ($p) => mb_strtoupper(mb_substr($p, 0, 1)))->take(2)->implode('');
        $readMinutes = max(1, (int) ceil(str_word_count(trim(strip_tags(html_entity_decode($blog->description ?? '')))) / 200));
        if (! empty($blog->authored_date_time)) {
            $publishedLabel = \Carbon\Carbon::parse($blog->authored_date_time)->format('F Y');
        } elseif (! empty($blog->authored_date)) {
            $publishedLabel = \Carbon\Carbon::parse($blog->authored_date)->format('F Y');
        } else {
            $publishedLabel = $blog->created_at?->format('F Y') ?? '';
        }
    @endphp

    <!-- TItle -->
    <div class="ce-breadcrumb">
        <div class="ce-breadcrumb-inner">
            <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span><a href="{{ route('blogs') }}">Blog</a><span>&rsaquo;</span>{{ \Illuminate\Support\Str::limit($blog->title, 48) }}
        </div>
    </div>


    <header class="article-header">
        <div class="article-header-inner">
            <p class="article-cat">{{ $blog->category->title ?? __('common.Uncategorized') }}</p>
            <h1>{{ $blog->title }}</h1>
            <div class="article-meta">
                <span>By {{ $authorName }}</span>
                <span>&#183; {{ $readMinutes }} min read</span>
                <span>&#183; {{ $publishedLabel }}</span>
            </div>
        </div>
    </header>

    @if($blog->image || $blog->thumbnail)
    <section style="max-width:900px;margin:0 auto;padding:0 32px 32px;">
        <img src="{{ getBlogImage($blog->image ?: $blog->thumbnail) }}" alt="{{ $blog->title }}" style="width:100%;border-radius:12px;border:1px solid var(--gray-line);">
    </section>
    @endif

    <section class="article-body-section">
        <div class="article-content">
            {!! $blog->description !!}
        </div>

        <div class="author-card" style="margin-top:48px">
            <div class="author-photo">{{ $authorInitials ?: 'MX' }}</div>
            <div class="author-info">
                <h4>{{ $authorName }}</h4>
                <p>Contributor at {{ Settings('site_title') ? Settings('site_title') : 'MXP' }}.</p>
            </div>
        </div>
    </section>

    @if(!empty($relatedPosts) && $relatedPosts->count())
    <section class="related-section">
        <div class="section-header">
            <p class="section-eyebrow">Keep Reading</p>
            <h2 class="section-title">Related Articles</h2>
        </div>
        <div class="related-grid">
            @foreach($relatedPosts as $related)
            <article class="related-card">
                <div class="related-image">
                    @if($related->image || $related->thumbnail)
                        <img src="{{ getBlogImage($related->thumbnail ?: $related->image) }}" alt="{{ $related->title }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        {{ $related->category->title ?? 'Blog' }}
                    @endif
                </div>
                <div class="related-body">
                    <p class="related-cat">{{ $related->category->title ?? __('common.Uncategorized') }}</p>
                    <h3>{{ $related->title }}</h3>
                    <a href="{{ route('blogDetails', $related->slug) }}" class="related-link">Read &#8594;</a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
    @endif

    <section class="final-cta">
        <h2>Need more than tips? <em>Get the full program.</em></h2>
        <p>Our coaching programs deliver the structure, accountability, and live support that blog posts can&#8217;t.</p><a href="{{ url('/') }}#programs" class="btn-on-teal">Explore Programs &#8594;</a>
    </section>

</div>
