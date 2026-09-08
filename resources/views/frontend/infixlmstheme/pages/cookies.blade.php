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
        --shadow-md: 0 8px 24px rgba(10, 77, 60, 0.10);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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
    h3 {
        font-family: var(--serif) !important;
        font-weight: 700 !important;
        line-height: 1.2 !important;
        color: var(--teal-darkest);
    }

    .legal-hero {
        background: linear-gradient(135deg, var(--teal-darkest) 0%, var(--teal-deep) 100%);
        color: var(--white);
        padding: 60px 32px 70px;
        text-align: center;
    }

    .legal-hero h1 {
        font-size: clamp(32px, 4vw, 48px);
        color: var(--white);
        margin-bottom: 10px;
    }

    .legal-hero p {
        font-size: 14px;
        color: var(--cream-warm);
        font-family: var(--sans) !important;
    }

    .legal-content {
        max-width: 820px;
        margin: 0 auto;
        padding: 60px 32px 90px;
    }

    .legal-card {
        background: var(--white);
        border-radius: 16px;
        padding: 50px 48px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-line);
    }

    .legal-card h2 {
        font-size: 22px !important;
        margin: 36px 0 14px;
        padding-top: 28px;
        border-top: 1px solid var(--gray-line);
        color: var(--teal-darkest) !important;

    }

    .legal-card h2:first-of-type {
        margin-top: 0;
        padding-top: 0;
        border-top: none;
    }

    .legal-card p {
        font-size: 15px;
        line-height: 1.8;
        color: var(--charcoal-soft) !important;
        margin-bottom: 14px;
        font-family: var(--sans) !important;
    }

    .legal-card ul {
        margin: 10px 0 14px 24px;
    }

    .legal-card li {
        font-size: 14.5px;
        line-height: 1.7;
        color: var(--charcoal-soft);
        margin-bottom: 8px;
    }

    .legal-card a {
        color: var(--teal-mid);
        text-decoration: underline;
    }

    .legal-card strong {
        color: var(--teal-darkest);
    }

    .cookie-table {
        width: 100%;
        border-collapse: collapse;
        margin: 18px 0;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--gray-line);
    }

    .cookie-table th {
        background: var(--teal-darkest);
        color: var(--white);
        padding: 14px 18px;
        text-align: left;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .cookie-table td {
        padding: 14px 18px;
        border-bottom: 1px solid var(--gray-line);
        font-size: 14px;
        color: var(--charcoal-soft);
        vertical-align: top;
        line-height: 1.6;
    }

    .cookie-table tr:last-child td {
        border-bottom: none;
    }

    .cookie-table tr:nth-child(even) td {
        background: var(--cream);
    }


    @media (max-width: 768px) {

        .legal-card {
            padding: 32px 24px;
        }


        .cookie-table {
            font-size: 13px;
        }

        .cookie-table th,
        .cookie-table td {
            padding: 10px 12px;
        }
    }
</style>

@section('mainContent')
    <section class="legal-hero">
        <h1>Cookie Policy</h1>
        <p>Last Updated: May 2026</p>
    </section>

    <div class="legal-content">
        <div class="legal-card">

            <h2>What Are Cookies?</h2>
            <p>Cookies are small text files placed on your device when you visit a website. They help the site remember your
                preferences, understand how you use the site, and improve your experience. Similar technologies include
                pixels,
                local storage, and session storage.</p>

            <h2>How We Use Cookies</h2>
            <p>Merkaii Xcellence Prep (operated by Merakii International Societe, Inc) uses cookies and similar technologies
                for the following purposes:</p>

            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Cookie Type</th>
                        <th>Purpose</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Essential</strong></td>
                        <td>Required for the website to function — login sessions, shopping cart, form submissions, and
                            security
                            features. These cannot be disabled.</td>
                        <td>Session / up to 1 year</td>
                    </tr>
                    <tr>
                        <td><strong>Analytics</strong></td>
                        <td>Help us understand how visitors use the site — which pages are most visited, how users navigate,
                            and
                            where they drop off. We use Google Analytics (GA4) to collect this data anonymously.</td>
                        <td>Up to 2 years</td>
                    </tr>
                    <tr>
                        <td><strong>Functionality</strong></td>
                        <td>Remember your preferences — language, timezone, font size, and other display settings — so you
                            don't
                            have to set them each visit.</td>
                        <td>Up to 1 year</td>
                    </tr>
                    <tr>
                        <td><strong>Marketing</strong></td>
                        <td>Used to show relevant content and measure the effectiveness of our outreach. These may be set by
                            third-party advertising partners such as Meta (Facebook/Instagram) or Google Ads.</td>
                        <td>Up to 2 years</td>
                    </tr>
                </tbody>
            </table>

            <h2>Third-Party Cookies</h2>
            <p>Some cookies on our site are placed by third-party services we use. These include:</p>
            <ul>
                <li><strong>Google Analytics (GA4)</strong> — anonymous site usage data to improve our content and user
                    experience.</li>
                <li><strong>Stripe</strong> — payment processing. Stripe sets cookies to prevent fraud and process
                    transactions
                    securely.</li>
                <li><strong>Calendly / Acuity</strong> — scheduling widget. May set cookies to remember your timezone and
                    preferences.</li>
                <li><strong>Meta Pixel</strong> — if active, tracks conversions from Facebook and Instagram advertising.
                </li>
                <li><strong>YouTube</strong> — embedded video content may set cookies to track viewing activity.</li>
            </ul>
            <p>We do not control these third-party cookies. Please refer to each provider's privacy policy for details on
                how
                they use your data.</p>

            <h2>Managing Your Cookie Preferences</h2>
            <p>You can control and delete cookies through your browser settings. Most browsers allow you to:</p>
            <ul>
                <li>View which cookies are stored on your device</li>
                <li>Delete individual cookies or clear all cookies</li>
                <li>Block cookies from specific sites or all sites</li>
                <li>Set your browser to notify you when a cookie is set</li>
            </ul>
            <p>Please note that disabling essential cookies may prevent parts of the website from functioning properly —
                including the shopping cart, student login, and form submissions.</p>
            <p>For more information on managing cookies in your browser, visit <a href="https://www.allaboutcookies.org"
                    target="_blank" rel="noopener">allaboutcookies.org</a>.</p>

            <h2>Do Not Track</h2>
            <p>Some browsers send a "Do Not Track" signal to websites. There is currently no industry standard for how
                websites should respond to this signal. Our site does not currently respond to Do Not Track signals, but we
                respect your right to control your browsing experience through the cookie management options described
                above.
            </p>

            <h2>Updates to This Policy</h2>
            <p>We may update this Cookie Policy from time to time as we add new features or as cookie regulations change.
                The
                "Last Updated" date at the top of this page reflects the most recent revision. Continued use of the site
                after
                changes are posted constitutes acceptance of the updated policy.</p>

            <h2>Questions?</h2>
            <p>If you have questions about our use of cookies, contact us at:</p>
            <p><strong>Merkaii Xcellence Prep</strong><br>
                Merakii International Societe, Inc<br>
                501 S. Florida Avenue, Lakeland, FL 33801<br>
                <a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a><br>
                <a href="tel:8632508764">(863) 250-8764</a>
            </p>

        </div>
    </div>

    @include(theme('partials._custom_footer'))
@endsection
