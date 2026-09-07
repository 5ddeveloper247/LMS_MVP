{{-- Compact footer for shop checkout / cart / confirmation (design checkout.html) --}}
<style>
    .shop-flow-footer {
        --sff-teal-darkest: #0A4D3C;
        --sff-cream: #F5EDE0;
        --sff-serif: 'Playfair Display', Georgia, serif;
        --sff-sans: 'Montserrat', system-ui, sans-serif;
        background: var(--sff-teal-darkest);
        color: rgba(255, 255, 255, 0.85);
        font-family: var(--sff-sans);
        margin-top: 0;
    }

    .shop-flow-footer .footer-contact {
        background: rgba(0, 0, 0, 0.18);
        padding: 24px 0;
    }

    .shop-flow-footer .footer-contact-inner {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.75);
    }

    .shop-flow-footer .footer-contact-inner strong {
        color: var(--sff-cream);
        font-family: var(--sff-serif);
        font-weight: 700;
    }

    .shop-flow-footer .footer-contact-inner a {
        color: rgba(255, 255, 255, 0.75);
        text-decoration: none;
        transition: color 0.2s;
    }

    .shop-flow-footer .footer-contact-inner a:hover {
        color: #C65D3A;
    }

    .shop-flow-footer .footer-legal {
        background: #052821;
        padding: 24px 0;
        font-size: 11.5px;
        color: rgba(255, 255, 255, 0.5);
    }

    .shop-flow-footer .footer-legal-inner {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .shop-flow-footer .footer-legal-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
    }

    .shop-flow-footer .footer-legal-links {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .shop-flow-footer .footer-legal a {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: color 0.2s;
    }

    .shop-flow-footer .footer-legal a:hover {
        color: #C65D3A;
    }

    @media (max-width: 900px) {
        .shop-flow-footer .footer-contact-inner {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 768px) {
        .shop-flow-footer .footer-legal-top {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
    }
</style>

<footer class="shop-flow-footer" role="contentinfo">
    <div class="footer-contact">
        <div class="footer-contact-inner">
            <strong>Merkaii Xcellence Prep</strong>
            <span>501 S. Florida Avenue, Lakeland, FL 33801</span>
            <a href="tel:8632508764">(863) 250-8764</a>
            <a href="mailto:contact@merkaiixcelprep.com">contact@merkaiixcelprep.com</a>
        </div>
    </div>
    <div class="footer-legal">
        <div class="footer-legal-inner">
            <div class="footer-legal-top">
                <span>&copy; Merakii International Societe, Inc · Established 2019</span>
                <div class="footer-legal-links">
                    <a href="{{ route('customer-help') }}#v-pills-profile-tab-1">Privacy Policy</a>
                    <a href="{{ route('terms') }}">Terms of Service</a>
                    <a href="{{ route('disclaimer') }}">Disclaimer</a>
                </div>
            </div>
        </div>
    </div>
</footer>
