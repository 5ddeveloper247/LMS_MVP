@extends(theme('layouts.master'))
@section('title')
{{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Customer-help') }}
@endsection
{{-- @section('css') --}}

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<style>
    .nav-pills-custom .nav-link {
        color: #aaa;
        background: #fff !important;
        position: relative;
    }

    .nav-pills-custom .nav-link.active {
        color: #fff !important;
        background: #996699 !important;
    }

    .tab-content {
        margin-left: 0rem;
        margin-top: 0rem;
        margin-right: 0rem;
    }

    .wrapper {
        position: relative;
        overflow-x: hidden;
    }

    .wrapper .eventsIcon {
        position: absolute;
        top: 0;
        height: 100%;
        width: auto;
        display: flex;
        align-items: center;
        z-index: 10;
        /* Ensure the buttons are above the tabs */
    }

    .eventsIcon:first-child {
        left: -10px;
        /* Adjust as needed */
        display: none;
        background: linear-gradient(90deg, #fff 70%, transparent);
    }

    .eventsIcon:last-child {
        right: -10px;
        /* Adjust as needed */
        justify-content: flex-end;
        background: linear-gradient(-90deg, #fff 70%, transparent);
    }

    .eventsIcon i {
        cursor: pointer;
        font-size: 14px;
        text-align: center;
        border-radius: 50%;
        /* Make it round */
        background: #efedfb;
        padding: 10px;
    }

    .eventsIcon:first-child i {
        margin-left: 10px;
        /* Adjust for better spacing */
    }

    .eventsIcon:last-child i {
        margin-right: 10px;
        /* Adjust for better spacing */
    }

    @media (min-width: 992px) {
        .nav-pills-custom .nav-link::before {
            content: '';
            display: block;
            border-top: 8px solid transparent;
            border-left: 10px solid #fff;
            border-bottom: 8px solid transparent;
            position: absolute;
            top: 50%;
            right: -10px;
            transform: translateY(-50%);
            opacity: 0;
        }
    }

    .nav-pills-custom .nav-link.active::before {
        opacity: 1;
    }

    .wrapper {
        background-color: #eee;
        transition: 0.2s ease-in-out;
    }

    .wrapper:hover {
        background-color: white;
    }

    .shadow-1 {
        box-shadow: 0 0.2rem 0.7rem rgba(0, 0, 0, 0.15) !important
    }

    .toggle,
    .content {
        font-family: "Poppins", sans-serif;
    }

    .toggle {
        text-align: start;
        width: 100%;
        background-color: transparent;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 16px;
        color: #111130;
        font-weight: 600;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 0;
    }

    .content {
        position: relative;
        font-size: 14px;
        text-align: justify;
        line-height: 30px;
        height: 0;
        overflow: hidden;
        transition: all 1s;
    }

    @media (width > 1650px) {

        .breadcrumb_area .breadcam_wrap {
            max-width: 677px !important;
        }
    }

    /* .tab-pane p span {
        color: #0079a8
    } */
</style>
@section('mainContent')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 px-0">
            <div class="breadcrumb_area position-relative">
                <div class="w-100 h-100 position-absolute bottom-0 left-0">
                    <img alt="Banner Image" class="w-100 h-100 img-cover"
                        src="{{ asset('public/frontend/infixlmstheme/img/images/customer.jpg') }}">
                </div>

                <div class="col-lg-9 offset-lg-1">
                    <div class="breadcam_wrap">&nbsp;
                        <h3 class="text-white custom-heading" id="tabHeading">Customer Help</h3>
                        {{-- <h2  class="font-size-banner my-4 text-center font-weight-bold"  data-animate="fadeInRight">
                            </h2> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<main ng-app="project1">
    <section class="bg-gray-1 hero-section py-10">
        <div class="container my-lg-5">


        </div>
    </section>
    <!-- Demo header-->
    <section class="header mb-4 mb-md-5 mt-md-5 mt-4">
        <div class="container px-md-5">
            <div class="row px-1 px-xl-5 px-md-2">

                <div class="col-md-3 px-md-0 px-lg-2">
                    <!-- Tabs nav -->
                    <div class="wrapper">
                        <div class="eventsIcon d-md-none"><i id="left" class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="nav flex-md-column bg-white d-md-block d-none">
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" style="text-decoration: none; color: #aaa;" href="{{ route('about') }}">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">About Us</span>
                            </a>
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" style="text-decoration: none; color: #aaa;" href="{{ route('resource') }}">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Resource Center</span>
                            </a>
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" style="text-decoration: none; color: #aaa;" href="{{ route('blogs') }}">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">News & Events</span>
                            </a>
                        </div>
                        <div class="nav flex-md-column nav-pills nav-pills-custom small_pills bg-white" id="v-pills-tab"
                            role="tablist" aria-orientation="vertical">

                            {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-8" data-toggle="pill" href="#customer"
                                role="tab" aria-controls="customer" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Customer Service</span></a> --}}

                            {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-9" data-toggle="pill" href="#contact"
                                role="tab" aria-controls="contact" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Contact Us</span></a> --}}
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items d-md-none d-block" style="text-decoration: none; color: #aaa;" href="{{ route('about') }}">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">About Us</span>
                            </a>
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items d-md-none d-block" style="text-decoration: none; color: #aaa;" href="{{ route('resource') }}">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Resource Center</span>
                            </a>
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items d-md-none d-block" style="text-decoration: none; color: #aaa;" href="{{ route('blogs') }}">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">News & Events</span>
                            </a>
                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items active" id="v-pills-home-tab"
                                data-bs-toggle="tab" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase"
                                    onclick="changeTab('Term Of Use')">Term
                                    Of Use</span>
                            </a>

                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-cookies-tab"
                                data-bs-toggle="tab" href="#v-pills-cookies" role="tab"
                                aria-controls="v-pills-cookies" aria-selected="true">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase"
                                    onclick="changeTab('Cookies')">Cookies</span></a>

                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-profile-tab-1"
                                data-bs-toggle="tab" href="#v-pills-profile" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase"
                                    onclick="changeTab('Privacy Policy')">Privacy Policy</span></a>

                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-messages-tab-2"
                                data-bs-toggle="tab" href="#v-pills-messages" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase"
                                    onclick="changeTab('Help and Support')">Help and Support</span></a>


                            {{-- <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-settings-tab-3"
                                    data-toggle="pill" href="#v-pills-settings" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Certificate Verification')">Certificate Verification</span></a> --}}

                            {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-4" data-toggle="pill" href="#ship"
                            role="tab" aria-controls="ship" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">Shipping & Returns</span></a> --}}

                            {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-5" data-toggle="pill" href="#track"
                            role="tab" aria-controls="track" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">Track Order</span></a> --}}
                            {{--
                        <a class="nav-link mb-3 p-3 shadow" id="tab-6" data-toggle="pill" href="#account"
                            role="tab" aria-controls="account" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">My Accounts</span></a> --}}

                            <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="tab-7" data-bs-toggle="tab"
                                href="#faq" role="tab" aria-controls="faq" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Faq's</span></a>

                            {{-- <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="tab-8">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="$('#v-pills-messages-tab-2').tab('show')">Resource center</span></a> --}}
                        </div>
                        <div class="eventsIcon d-md-none"><i id="right" class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>


                <div class="col-md-9 mt-4 mt-md-0">
                    <h1 class="customer d-none invisible">test</h1>
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="customer"
                            role="tabpanel" aria-labelledby="tab-8">
                            <h5 class="custom_small">FOR ASSISTANCE</h5>
                            <h6>DOMESTIC CUSTOMERS</h6>
                            <h6>Call Us:</h6>
                            <p class="mb-3">
                                Representatives are available from 7am – 2am ET, 7 days a week (excluding major U.S.
                                holidays) and are ready to help.
                            </p>
                            <p class="mb-3"><u>863-250-8764</u></p>

                            <h5 class="custom_small">Live Chat with Us:</h5>
                            <p class="mb-3">
                                Representatives are available from 7am – 11pm ET, 7 days a week (excluding major U.S.
                                holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of any
                                page.
                            </p>
                            <h5 class="custom_small">International Customer</h5>
                            <p class="mb-3">
                                Our international customers may access our international help center 24 hours a day, 7
                                days a week HERE. If you are unable to find the answer to your question, you may contact
                                a customer service representative through the help center. Representatives are available
                                6 days a week (Sunday - Friday) and are ready to help. Please allow 24 hours to receive
                                a response.
                            </p>
                        </div>

                        <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="contact"
                            role="tabpanel" aria-labelledby="tab-9">
                            <h5 class="custom_small_heading font-weight-bold">WE’RE HERE FOR YOU!</h5>
                            <p class="mb-3">
                                Email JUSOUT BEAUTY Customer Service (admin@merakinursing.com) or call 863-250-8764.
                                Operating hours are from 7am – 2am EST, 7 days a week, excluding major U.S. holidays.
                                Live chat representatives are available 7am – 11pm ET, 7 days a week (excluding major
                                U.S. holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of
                                any page
                            </p>
                        </div>


                        <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3 show active"
                            id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h5 class="custom_small_heading font-weight-bold text-center mb-md-4 mb-3">Terms and Conditions for Merkaii Xcellence Prep, also known as Meraki International Societe LLC</h5>
                            <h5 class="custom_small">License Contract</h5>
                            <p class="mb-3"><span class="font-weight-bold">IMPORTANT:</span> Do not edit this agreement. ready?  Meraki International Societe LLC, "We", or "Uur" and you (referred to as "Licensee", "You", or "Your") agree to a license agreement for the use of Meraki International Societe LLC (MIS) content and/or services.
                            </p>
                            <p class="mb-3">Downloading and using Meraki International Societe LLC content or services confirms that you have the
                                legal authority
                                to enter into this agreement, that you accept its terms and conditions, and that you
                                agree to be bound by them.
                                You may not access or use Meraki International Societe LLC Content or Services if you do
                                not have the necessary authority or if you disagree with its terms. In such case, you
                                must delete them.</p>
                            <p class="mb-3">This agreement seats any prior agreement, written or oral, and any other
                                communications
                                relating to the subject matter of this agreement being the entire and exclusive
                                statement between you and Meraki International Societe LLC.
                            </p>
                            <p class="mb-3">You certify that you are over 18 years old and are able to form a legal binding
                                agreement.
                            </p>
                            <h5 class="custom_small_heading text-center font-weight-bold mb-md-4 mb-3">TERMS AND SUMMARY</h5>
                            <h5 class="custom_small"> 1. Definitions</h5>
                            <p class="mb-3">The following terms have the
                                following meanings as they are used in this document:
                            </p>
                            <p class="mb-3">
                                "Agreement" refers to the license agreement between the licensee and Meraki International Societe LLC as well as any
                                associated policies that are included in it.
                                "Websites" refers to www.merkaiixcelprep.com as well as any other website that Meraki International Societe LLC owns,
                                runs, or uses to promote its goods and services.
                            </p>
                            <p class="mb-3">
                                "Services" refers to all Meraki International Societe LLC platforms, websites, and mobile applications, as well as
                                the items, services, and contents contained therein, that Meraki International Societe LLC makes available to
                                Licensees for purchase, either directly through the App Stores or through any other
                                marketplace where Meraki International Societe LLC sells such goods or services

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">2. Permission and Inclusion</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold">a.</span> Exclusive Rights. Meraki International Societe LLC is the owner and
                                operator of the Services. All materials
                                included in or included with the Services, unless otherwise specifically stated by Meraki International Societe LLC,
                                are owned, controlled, or licensed by Meraki International Societe LLC or Meraki International Societe LLC's third-party partners. This includes
                                past, present, and future versions of the materials as well as domain names, source and
                                object code, text, site design, logos, graphics, and the selection, assembly, and
                                arrangement of these materials (collectively, "Meraki International Societe LLC Content").
                            </p>

                            <p class="mb-3"> <span class="font-weight-bold"> b.</span> Permission to Use. THIS IS NOT A SALE, BUT A
                                LICENSE. Meraki International Societe LLC grants Licensee a limited,
                                non-exclusive, non-transferable, non-sublicensable license to</p>
                            <p class="mb-3"> (i) View the Meraki International Societe LLC Content</p>
                            <p class="mb-3"> (ii) Download the services </p>
                            <p class="mb-3">(iii) Use the Services exclusively for Licensee's</p>
                            <p class="mb-3">Internal use for the number of users for which the corresponding fee has been paid
                                ("License") during the subscription period, subject to the terms and conditions of this
                                Agreement and payment of the applicable license fees (the "Subscription Fee"). Licensee
                                should get advice from Meraki International Societe LLC if they are unsure about how the Services are to be used. A
                                license or subscription cannot be shared with another person. To stop unauthorized third
                                parties from accessing or using the Meraki International Societe LLC Content or Services, Meraki International Societe LLC may set reasonable
                                access restrictions.</p>
                            <p class="mb-3"><span class="font-weight-bold">c.</span> Time of Subscription. Depending on the
                                subscription plan you choose, the Services'
                                subscription period starts the day you buy them and lasts for 3, 6, 12, 18, or 24 months
                                ("Subscription Period"). After the new subscription cost is paid, your subscription will
                                automatically renew for an additional Subscription Period. For periods of renewal, Meraki International Societe LLC
                                retains the right to modify the Subscription Fee. The same terms and conditions, which
                                Meraki International Societe LLC may alter from time to time in compliance with Section 15(a) of this Agreement, will
                                apply to each new Subscription Period.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">3. Payment</h5>
                            <p class="mb-3">
                                The Meraki International Societe LLC Content and Services are only accessible to subscribers who have paid for them
                                or who have been granted access by a promotion (including a limited free trial). Unless
                                they cancel the service, subscribers will automatically be charged the standard monthly
                                amount at the conclusion of the trial period. Users may terminate their subscription at
                                any moment by contacting support or using the cancel button within the app. Subscribers
                                may continue to be billed for the current subscription term even after canceling. The
                                content of the chosen bundle is included in the monthly subscription; there are no other
                                costs. Packages or other content can be available for an additional fee. To continue
                                using Meraki International Societe LLC, a current, valid credit card is required. For inquiries regarding prorated
                                costs, billing, or refunds, please send an email to 
  <a href="mailto:payments@merkaiixcelprep.com" class="text-dark">
    payments@merkaiixcelprep.com
  </a> (Meraki International Societe LLC).

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">4. A Free Trial Membership</h5>
                            <p class="mb-3">
                                For some Services, which require registration with a working payment card, we might
                                provide free trials. If a user cancels before the trial expires, their subscription will
                                automatically renew at the discounted cost. A free trial can be ended online or by
                                getting in touch with Meraki International Societe LLC customer service. Per person, just one free trial is
                                permitted. Free trials are not available for registrations made after that. In
                                promotions that include both "paid" and "free" periods, unless otherwise specified, the
                                paid period will end first. At our discretion, we may add new or extra features,
                                services, or resources that are either priced differently from current memberships or
                                included as part of them.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">5. Licensee's Restrictions and Covenants</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold"> a.</span> To guarantee that Meraki International Societe LLC Content and Services
                                are used exclusively by Licensee and in
                                compliance with this Agreement, Licensee shall implement internal policies and
                                procedures.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> b.</span> The Licensee may not, unless otherwise
                                permitted herein, use, copy, modify,
                                sell, sublicense, rent, lease, transfer, assign, resell, distribute, or in any other way
                                disseminate the Meraki International Societe LLC Content or Services.
                                - Permit any other party to access or utilize the Meraki International Societe LLC Services or Content in any way.
                                - Feed another system with any portion of the Meraki International Societe LLC Content or Services.
                                - Use software applications that carry out automatic downloading, copying, or printing
                                to extract data or information.
                                - Use data extraction software programs in connection with the Meraki International Societe LLC Content or Services.
                                - In any manner alter, translate, reverse engineer, decompile, or disassemble the Meraki International Societe LLC
                                Content or Services.
                                - Eliminate any confidentiality, copyright, patent, trademark, and proprietary rights
                                notices that may have been included in the Meraki International Societe LLC Content or Services.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold">c.</span> Only the Licensee is authorized to use the Meraki International Societe LLC
                                Content or Services. No other
                                person shall have the right to utilize, distribute, extract, export, or download any
                                part of the Meraki International Societe LLC Content or Services under the terms of this Agreement. It is the
                                licensee's responsibility to keep any usernames and passwords supplied by Meraki International Societe LLC secure and
                                to stop third parties from using them without authorization.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold">d.</span> Whether for internal use only or for use by
                                others, the licensee is prohibited
                                from creating any software, resource, or product that has functionality comparable to
                                that of the Meraki International Societe LLC Content or Services. Licensee agrees not to provide any of the Meraki International Societe LLC
                                Content or Services for sale, license, or distribution to outside parties, nor may
                                Licensee utilize any of the Meraki International Societe LLC Content or Services as part of any product that is
                                offered for sale, license, or distribution.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">6. Possession</h5>
                            <p class="mb-3">
                                The Licensee agrees that Meraki International Societe LLC owns all copies, versions, and updates of the Meraki International Societe LLC Content
                                and Services, as well as all rights, title, interest, and ownership in and to them. This
                                Agreement only grants Licensee a restricted right of use in compliance with this
                                Agreement; it does not provide Licensee title or ownership to the Meraki International Societe LLC Content or
                                Services. There are no implicit licenses in this agreement. Meraki International Societe LLC retains all rights not
                                specifically granted hereunder.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> 7. User Submissions and Profile Information</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold"> a.</span> You grant Meraki International Societe LLC and our affiliates, licensees,
                                distributors, agents, representatives,
                                and other entities authorized by Meraki International Societe LLC the non-exclusive, worldwide, perpetual, unlimited,
                                irrevocable, royalty-free, fully sublicensable, and fully transferable right to exercise
                                any and all copyright, trademark, publicity, and database rights you may have in the
                                content, in any media now known or in the future, as well as the right to use the User
                                Generated Content, when you post, upload, embed, display, communicate, link to, email,
                                or in any other way distribute or publish any review, suggestion, idea, solution,
                                question, answer, feedback, comment, testimonial, and other material ("User Generated
                                Content") to the Meraki International Societe LLC Website or application.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> b.</span> Your name, profile, and photo may be used by
                                Meraki International Societe LLC to produce, assist, or display
                                commercials, social media posts, or other promotional materials (collectively,
                                "Marketing Materials"). By using the Services and interacting with Meraki International Societe LLC and third
                                parties, including other users, you consent to Meraki International Societe LLC using your name and profile image in
                                conjunction with Marketing Materials to advertise goods and services.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> c.</span> You grant Meraki International Societe LLC permission to use any ideas or
                                concepts included in User Generated
                                Content for any reason, including the development, production, and marketing of goods
                                and services as well as the creation of educational articles, without having to pay you
                                anything. You give Meraki International Societe LLC permission to publish your user-generated content online in a
                                searchable format that is available to Service and Internet users. You give up all moral
                                rights in any User Generated Content you provide, to the maximum degree allowed by law,
                                even if it is changed in a way that you find objectionable. User Generated Content is
                                not guaranteed to be hosted, displayed, or distributed by Meraki International Societe LLC, and we reserve the right
                                to remove any content at our sole discretion. Meraki International Societe LLC retains the right to alter the User
                                Generated Content in any way it deems appropriate, including format, size, and display
                                specifications.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> d.</span> You affirm and guarantee that:
                            </p>
                            <P class="mb-3">(i) you are
                                the owner of the User Generated Content
                                that you have submitted, or that you are authorized to grant the licenses described in
                                this section; and
                            </P>
                            <p class="mb-3">(ii) the posting of your User Generated Content does not infringe upon
                                the rights of any person or entity with regard to privacy, publicity, copyrights,
                                contracts, or other intellectual property. You will provide Meraki International Societe LLC with any records, proof,
                                or releases required to confirm your adherence to this Agreement at Meraki International Societe LLC's request.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">8. Updates automatically</h5>
                            <p class="mb-3">
                                Licensee understands that Meraki International Societe LLC may need to adopt changes in order to maintain the
                                accuracy and integrity of Meraki International Societe LLC Content and Services, and Licensee consents to receive
                                such updates from Meraki International Societe LLC. Meraki International Societe LLC will try its best to lessen the impact of these changes. The
                                licensee is not allowed to try to change or remove any of these updates.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">9. Agreement Modifications</h5>
                            <p class="mb-3">
                                Meraki International Societe LLC retains the right to alter, amend, add, or remove any part of this Agreement at any
                                time, at its sole discretion. After updates are posted, Licensee's continuing use of the
                                Services signifies Licensee's acceptance and agreement to the changes. Meraki International Societe LLC reserves the
                                right to end this Agreement at any time and to stop offering the Services instantly.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">10. Termination</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold"> a.</span> Until they are terminated, this Agreement and
                                the license it grants are in effect. If
                                Licensee violates any provision of this Agreement, Meraki International Societe LLC may immediately terminate this
                                Agreement or suspend Licensee's access to the Services.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold">b.</span> Licensee shall promptly stop using the
                                Services upon termination of this
                                Agreement and return or destroy all Meraki International Societe LLC Content and Services, including any copies,
                                extracts, and summaries. Sections 6, 7, 9, 10, 11, and 13 as well as any other clauses
                                that are by their very nature meant to survive termination will survive the termination
                                of this agreement.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> 11. Disclaimer of Warranties</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold"> a.</span> Warranty of any kind, express or implied,
                                including without limitation any implied
                                warranties of merchantability, fitness for a particular purpose, accuracy, completeness,
                                or non-infringement, is provided with the services and any information, content, or
                                materials contained therein, "as is" and "as available" basis with all faults in self.

                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold mb-2"> b.</span> Meraki International Societe LLC offers no guarantees that:
                            </p>
                            <P class="mb-3">(i) The
                                Services will fulfill your needs;
                            </P>
                            <p class="mb-3">
                                (ii)
                                The services will be timely, secure, error-free, and interruption-free;
                            </p>
                            <p class="mb-3">
                                (iii) The
                                results that can be obtained from using the services will be accurate or dependable;
                            </p>
                            <p class="mb-3">
                                (iv) Any errors in the services will be fixed; or
                            </p>
                            <p class="mb-3">
                                (v) The services, or the server that
                                makes them available, are free of viruses or other harmful components.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> c. </span> Abandon all risk relating to the services'
                                quality and performance. you will
                                be liable for the whole cost of any necessary servicing, repair, or correction should
                                the services prove to be defective.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">12. Limitation of Liability</h5>
                            <p class="mb-3">
                                To the maximum extent permitted by applicable law, Meraki International Societe LLC and its affiliates, licensors,
                                suppliers, advertisers, or sponsors shall not be liable for any direct, indirect,
                                incidental, consequential, special, punitive, or exemplary damages, including damages
                                for loss of profits, goodwill, use, data, or other intangible losses, arising out of or
                                in connection with this agreement, the use or inability to use the services,
                                unauthorized access to or alteration of your transmissions or data.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> 13. Liability</h5>
                            <p class="mb-3">
                                In the event that Licensee violates this Agreement or uses the Services in any way,
                                Licensee agrees to indemnify, defend, and hold harmless Meraki International Societe LLC, its officers, directors,
                                employees, agents, licensors, and suppliers from and against any and all claims, losses,
                                expenses, damages, and costs, including reasonable attorneys' fees.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> 14. Applicable Law and Location</h5>
                            <p class="mb-3">
                                Without respect to its conflict of law provisions, the laws of the State of Florida
                                shall govern and be construed in conformity with this Agreement. Any action or cause
                                arising out of this agreement may only be brought in Florida's federal or state courts,
                                and the parties agree to the personal jurisdiction and venue of such courts.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> 15. Miscellaneous</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold"> a.</span> Modification and Release. By updating the
                                conditions on the Website, Meraki International Societe LLC reserves the
                                right to change this Agreement at any time. Any modification to this agreement must be
                                made in writing and signed by Meraki International Societe LLC for it to be effective.
                                The ability to be severed. The remaining terms of this Agreement will still be in full
                                force and effect even if any of them are found to be invalid or unenforceable.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> b. </span> Consent. All previous or contemporaneous
                                oral or written communications and
                                proposals between Licensee and Meraki International Societe LLC regarding the Services are superseded by this
                                Agreement, which represents the entire agreement between the parties regarding the use
                                of the Services.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> c.</span> Task. By operation of law or otherwise,
                                licensee may not assign or transfer this
                                Agreement or any of its rights or duties hereunder without Meraki International Societe LLC's prior written
                                agreement. This Agreement may be assigned by Meraki International Societe LLC without prior notice at any time.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> d. </span> All notices under this agreement must be in
                                writing, and they will be
                                considered to have been sent on time if they are delivered in person; when they are
                                electronically confirmed to have been sent by email or fax; or the day after they are
                                sent if they are sent for next-day delivery via an established overnight delivery
                                service.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> 16. Money-Back Promise </h5>
                            <p class="mb-3">
                                We will reimburse your tuition if you are a graduate of a recognized nursing or
                                healthcare career institution, and you did not pass your exam. The following qualifying
                                requirements must be met by you:
                            </p>
                            <P class="mb-3">
                                <span class="font-weight-bold"> a.</span> The warranty is only valid for the initial
                                exam taken with the product.
                            </P>
                            <p class="mb-3">
                                <span class="font-weight-bold"> b.</span> The product needs to be purchased more than
                                14 days before the exam date.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> c.</span> A thorough examination and completion of all
                                the material.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> d. </span> To present your board letter and purchase
                                receipt.
                            </p>
                            <P class="font-weight-bold mb-3">You accept this Agreement's terms by downloading, using, or
                                accessing the Services.
                                Please do not download, access, or use the Services if you disagree with the provisions
                                of this Agreement.</P>
                        </div>

                        <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-cookies"
                            role="tabpanel" aria-labelledby="v-pills-cookies">

                            <h5 class="custom_small_heading font-weight-bold text-center mb-md-4 mb-3">Merkaii Xcellence Prep Cookie Policy
                            </h5>
                            <h5 class="custom_small">What are Cookies and Tracking Technologies?</h5>
                            <p class="mb-3">We use cookies and similar tracking technologies to improve and analyze our service,
                                Merkaii Xcellence Prep. This policy explains what cookies are and how we use them, your
                                choices regarding cookies, and where you can find more information. These technologies
                                track activity on our website and store certain information. Examples of tracking
                                technologies include beacons, tags, and scripts.</p>
                            <h5 class="custom_small mt-md-3 mt-2">Types of Cookies We Use</h5>
                            <p class="mb-3">
                                <span class="font-weight-bold"> Cookies or Browser Cookies:</span> Small data files
                                stored on your device when
                                you visit a
                                website. They are widely used to remember You and Your preferences and track your
                                activity on our website. You can instruct your browser to refuse all cookies or to
                                indicate when a cookie is being sent. However, this may limit your ability to use
                                some
                                features of our service.
                            </p>
                            <p class="mb-3"><span class="font-weight-bold"> Web Beacons:</span> Tiny
                                electronic files (also
                                referred to as clear gifs,
                                pixel tags, and
                                single pixel gifs) embedded in our website and emails that track activity, like how
                                many
                                users visit those pages or open emails.</p>
                            <h5 class="custom_small mt-md-3 mt-2"> We use two main types of cookies</h5>
                            <p class="mb-3"><span class="font-weight-bold"> Session Cookies:</span>
                                These cookies are temporary
                                and deleted as soon as you close your web
                                browser.</p>
                            <p class="mb-3"><span class="font-weight-bold">Persistent Cookies:</span>
                                These cookies remain on
                                your personal computer or mobile device
                                when you go offline until they expire, or you delete them.
                            </p>
                            <h5 class="custom_small_heading font-weight-bold text-center mb-md-4 mb-3">Why We Use Cookies</h5>
                            <h5 class="custom_small"> We use cookies for several reasons, including:</h5>
                            <p class="mb-3"> <span class="font-weight-bold">Necessary and Essential
                                    Cookies:</span> These cookies
                                are
                                essential for our website to
                                provide you with our services and let you use some of their features, like
                                authentication and security.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> Cookies Policy and Notice Acceptance
                                    Cookies:</span>
                                Remember if you've accepted our cookie
                                policy.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold">Functionality Cookies:</span> Remember your
                                preferences,
                                such as login details or language,
                                to personalize your experience. This gives you a more customized experience by not
                                having to re-enter your preferences each time you visit the website.
                            </p>
                            <p class="mb-3">
                                <span class="font-weight-bold"> Tracking and Performance Cookies:</span> We use
                                these
                                third parties to track website traffic
                                and user behavior to improve our website and your experience. This information may
                                be
                                used to identify you indirectly. We also test new website pages, features, or
                                functions
                                using these cookies to see how people respond to them.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Learn More About Your Cookie Choices</h5>
                            <p class="mb-3">
                                Most web browsers allow you to control cookies through their settings. You can usually
                                choose to block all cookies, or to receive a notification before a cookie is set. Please
                                be aware that completely blocking cookies may limit your use of some websites.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2"> Where to Find More Information</h5>
                            <p class="mb-3"> For more detailed information about the cookies, we use and your choices regarding
                                cookies, please see our <a href="{{ route('customer-help') }}" onclick="informationflag('privacy policy')"> Privacy Policy.</a></p>
                        </div>

                        <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-profile"
                            role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <h5 class="custom_small_heading font-weight-bold text-center mb-md-4 mb-3">Privacy Policy for Merkaii Xcellence Prep</h5>
                            <h5 class="custom_small">WHO WE ARE</h5>
                            <p class="mb-3">
                                Merkaii Xcellence Prep ("we," "us," or "our") values the privacy of those who use our
                                website<a href="" class="text-dark"> (https://www.merkaiixcellenceprep.com) </a>and other services provided by Merkaii
                                Xcellence Prep.
                            </p>
                            <p class="mb-3">
                                In this policy, "you" and "your" refer to any individual or entity using our services
                                ("Users"). "Services" encompass all current or future products, whether paid or free,
                                offered by Merkaii Xcellence Prep. The terms "Merkaii Xcellence Prep," "we," and "our"
                                collectively refer to Merkaii Xcellence Prep.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">INTRODUCTION</h5>
                            <p class="mb-3">
                                This Policy outlines our dedication to safeguarding the privacy of individuals who visit
                                our websites, register for our services, or provide us with personal information,
                                whether online or offline. It explains the types of personal information we collect, how
                                we use this information, who we may share it with, and other relevant details. We
                                encourage you to review the summaries provided below if you'd like to explore any topic
                                in greater detail. Any changes to this policy will be posted on this page.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">PERSONAL INFORMATION POLICY</h5>
                            <p class="mb-3">
                                In this Policy, "personal information" refers to any data related to an identified or
                                identifiable individual. An identifiable individual is someone who can be recognized,
                                either directly or indirectly, through identifiers like a name, identification number,
                                location data, online identifier, or other characteristics specific to their physical,
                                physiological, genetic, mental, economic, cultural, or social identity. Personal
                                information does not include aggregated data or de-identified information, meaning that
                                such information cannot be linked to a specific individual without additional data.
                            </p>
                            <p class="mb-3">
                                Providing personal information is essential for us to deliver our services to you. Some
                                of our services also require us to share your personal information with third parties,
                                such as companies that assist us in delivering our services or client institutions whose
                                forms are hosted on our websites. If you choose not to provide your personal information
                                or consent to its disclosure as described in this Policy, you will be unable to use our
                                services.
                            </p>
                            <p class="mb-3">
                                Our websites may include links to other websites, and the information practices and
                                content of those websites are governed by their respective privacy policies. We
                                recommend that you review the privacy policies of these external websites to understand
                                how they manage your information.
                            </p>
                            <p class="mb-3">
                                Although we are committed to supporting online privacy, we do not have control over the
                                actions of our client institutions or other third parties. We urge you to review the
                                privacy policies of these institutions or third parties and understand their practices
                                before providing personal information to them or through any forms on our websites where
                                they are mentioned.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">INFORMATION WE COLLECTED</h5>
                            <p class="mb-3">
                                We collect various types of information when you interact with our website or use our
                                services. The categories of personal information we may collect include:
                            </p>
                            <p class="mb-3">1. Identifiers: Name, email address, IP address, account name.</p>

                            <p class="mb-3"> 2. Personal Information: Educational background, credit card numbers, financial data.</p>

                            <p class="mb-3"> 3. Professional Information: Employment-related details.</p>

                            <p class="mb-3"> 4. Non-public Education Information: Schools attended, graduation dates.</p>

                            <p class="mb-3"> 5. Commercial Information: Purchase history, products or services considered.</p>

                            <p class="mb-3"> 6. Internet Activity: Browsing history, search history, interactions with our website,
                                services, and advertisements.</p>

                            <p class="mb-3"> 7. Geolocation Data: Physical location of access.</p>
                            <h5 class="custom_small mt-md-3 mt-2">HOW WE COLLECTED AND USE OF PERSONAL INFORMATION</h5>
                            <p class="mb-3">We gather information through various methods:</p>
                            <p class="mb-3"><span class="font-weigth-bold">Information You Provide:</span> When you register,
                                request information, or contact us, we may
                                collect personal data such as your full name, mailing address, email, phone number,
                                instant messaging ID, educational and professional details, and payment information.</p>
                            <p class="mb-3"><span>Information Collected Automatically:</span> When you interact with our websites by
                                submitting technical data-web forms, subscription details, sending emails, content you
                                post, or using various interactive features like surveys, discussions, contests,
                                customer support requests and location data. This information may include non-text
                                elements like images and videos. Our server automatically records IP addresses, browser
                                types, operating systems, domain names, access times, and referring websites. </p>
                            <p class="mb-3">
                                For electronic payment processing, we rely on a third-party intermediary, which is only
                                authorized to use your cardholder data for processing payments on our behalf. This
                                intermediary is not allowed to store, retain, or use your payment information for any
                                other purpose.
                            </p>
                            <p class="mb-3">
                                By voluntarily providing your personal information, you confirm that the data is
                                accurate and that you have the right to share it with us, either as the data owner or
                                with the necessary consent.
                            </p>
                            <h5 class="custom_small_heading font-weight-bold text-center mb-md-4 mb-3">Information We Collect on Our Websites</h5>
                            <h5 class="custom_small">Logs</h5>
                            <p class="mb-3">
                                Like most websites and online services, we collect certain information and store it in
                                log files when you interact with our websites and services. This data includes your IP
                                address, browser type, internet service provider, URLs of referring or exit pages,
                                operating system, date and time stamps, search queries, locale and language preferences,
                                device identification numbers, mobile carrier, and system configuration details.
                                Occasionally, we may link personal information to data stored in log files to enhance
                                our websites and services. In such cases, the combined information will be handled in
                                accordance with this Policy.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Analytics</h5>
                            <p class="mb-3">
                                We collect analytics data when you use our websites or mobile applications to help us
                                improve them. This anonymous data about your activities on our platforms may also be
                                shared with third-party analytics service providers. We do not associate analytics data
                                with your personal information.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Information from Other Sources</h5>
                            <p class="mb-3">We may also obtain additional information, including personal data, from third parties
                                and combine it with the information we collect through our websites. For instance, we
                                might receive details from client institutions you’ve shown interest in or test scores
                                you want linked to your application. Additionally, if you log into our services through
                                a third-party social media or authentication service, we may access certain information
                                from that service.
                            </p>
                            <p class="mb-3">
                                Our websites may feature social media tools like Facebook, X, Instagram, TikTok Like
                                button, as well as widgets like the Share This button or interactive mini programs.
                                These features might collect your IP address, the specific page you are visiting, and
                                set a cookie to ensure they function correctly. These social media features and widgets
                                are either hosted by a third party or directly on our websites, and your interactions
                                with them are governed by the privacy policies of the companies providing them.
                            <p class="mb-3">
                                Any access we have to information from third-party social media or authentication
                                services is governed by the authorization processes of those services. By allowing us to
                                connect with such a service, you grant us permission to access and store your name,
                                email address, and other personal data that the service makes available to us, to use
                                and disclose this information in accordance with this Policy. We recommend checking and
                                adjusting your privacy settings on these third-party services to manage the information
                                they share with us.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">GENERAL USES OF YOUR COLLECTED INFORMATION </h5>
                            <p class="mb-3">
                                We may utilize the information we collect from you, including personal information where
                                applicable, for a range of purposes, such as: </p>
                            <p class="mb-3"> (a) Providing, operating, maintaining, and enhancing our services, as well as developing
                                new ones.</p>
                            <p class="mb-3">(b) Enabling your access to and use of our services – to create user profiles,
                                customized content and layout.</p>
                            <p class="mb-3"> (c) Processing transactions, completing them, and sending you related details.</p>
                            <p class="mb-3"> (d) Sending transactional communications, such as responses to your comments, questions,
                                and requests, providing customer service and support, and delivering technical notices,
                                updates (if you’ve opted in), security alerts, and administrative messages.</p>
                            <p class="mb-3"> (e) Develop new products, monitoring and analyzing trends, usage, and activities related
                                to our websites and services.</p>
                            <p class="mb-3"> (f) Investigating and preventing fraudulent activities, unauthorized access, and other
                                illegal actions.</p>
                            <p class="mb-3">(g) Personalizing your experience on our websites and services by offering features or
                                advertisements that align with your interests and preferences.</p>
                            <p class="mb-3">
                                (h) For other purposes for which we have obtained your consent, such as sending
                                marketing communications. You can withdraw your consent to receive marketing
                                communications from us by following the unsubscribe instructions included in those
                                communications. If you opt out, we will record your preference, which will require us to
                                retain your email address to ensure you no longer receive such communications. We may
                                also share your preference and email address with third parties solely to prevent
                                further marketing messages from them. Rest assured, opting out will not result in any
                                discrimination against you.
                            </p>

                            <h5 class="custom_small mt-md-3 mt-2">Legal Basis for Processing Your Information (GDPR Compliance)*</h5>
                            <p class="mb-3">
                                Under the General Data Protection Regulation (GDPR), the legal basis for processing your
                                personal information depends on the type of information and the context in which it is
                                collected. Generally, we process your personal information only when:
                            </p>
                            <p class="mb-3">
                                (a) We have obtained your consent to do so.
                            </p>
                            <p class="mb-3">
                                (b) We need the information to fulfill a contract with you (e.g., to provide the
                                services you requested).
                            </p>
                            <p class="mb-3">
                                (c) The processing is in our legitimate interests or those of a third party, and these
                                interests are not overridden by your data protection rights or fundamental freedoms.
                                In some situations, we may also have a legal obligation to process your information or
                                need to do so to protect your vital interests or those of another person.
                                If we rely on your consent for processing, you have the right to withdraw or decline it
                                at any time. This will not affect the legality of the processing that occurred before
                                you withdrew your consent.
                            </p>
                            <p class="mb-3">
                                When we request personal information to comply with a legal requirement or to fulfill a
                                contract, we will clarify whether providing that information is mandatory and what the
                                potential consequences are if you choose not to provide it. If we rely on legitimate
                                interests that are not already detailed in this Policy, we will inform you of those
                                interests at the relevant time.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">IMPORTANT NOTICE REGARDING DATA TRANSFER RISKS</h5>
                            <p class="mb-3">
                                We want to inform you that transferring your information to the United States carries
                                potential risks due to the lack of an adequacy decision and appropriate safeguards.
                                These risks may include the possibility that you may not be able to fully exercise your
                                data protection rights under applicable law, which could leave you vulnerable to the
                                unlawful use or disclosure of your information.
                            </p>
                            <p class="mb-3">
                                If you are accessing our websites or using our services from the European Union or other
                                regions with specific data collection and usage laws, you are consenting to the transfer
                                of your personal information to the United States and possibly other jurisdictions.
                            </p>
                            <p class="mb-3">
                                If you have questions about the legal basis for processing your personal information,
                                please reach out to us using the contact information provided below.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">RETENTION OF YOUR PERSONAL INFORMATION</h5>
                            <p class="mb-3">
                                We will keep your personal information for as long as necessary to achieve the purposes
                                outlined in this Policy, unless a longer retention period is required or allowed by law
                                (such as for tax, accounting, or other legal reasons). When there is no ongoing
                                legitimate business need to process your personal information, we will either delete or
                                anonymize it. If deletion or anonymization is not possible (for instance, if your data
                                is stored in backup archives), we will securely store your personal information and
                                isolate it from any further processing until it can be deleted.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">SHARING OF INFORMATION, WE COLLECTED</h5>
                            <p class="mb-3">
                                We may share your information in the following ways:
                            </p>
                            <p class="mb-3">
                                1. With agents or contractors supporting our operations.
                            </p>
                            <p class="mb-3">
                                2. Across our affiliated companies and for processing in other countries, ensuring
                                protection regardless of location.
                            </p>
                            <p class="mb-3">
                                3. As required by law, or to protect our rights or the rights of others.
                            </p>
                            <p class="mb-3">
                                4. For any business purposes in line with this Privacy Policy.
                                Your information will not be disclosed to third parties without your explicit consent,
                                except as required by law.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Providing the Services You Request</h5>
                            <p class="mb-3">
                                We require your personal information to deliver the services you request. For instance,
                                you must provide personal details to create an account with us. When you use our
                                services to submit a form hosted on behalf of a client institution, the information you
                                enter will be shared with that institution. This sharing occurs even if you do not
                                complete or submit the form. If you wish to modify a form that is "in progress," you can
                                do so by following the instructions provided on the form. However, once the form is
                                submitted, you will need our assistance to access or modify the information. After your
                                personal information is shared with a client institution, their privacy policies and
                                data practices will govern how they use your information.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Third-Party Service Providers</h5>
                            <p class="mb-3">
                                We collaborate with third-party service providers for hosting, website maintenance,
                                application development, data backup, storage, payment processing, analytics, and other
                                services. These providers may access or process your personal information solely to
                                perform these services on our behalf. We do not allow our third-party providers to use
                                your personal information for their marketing purposes or for any other purpose outside
                                of the services they provide to us.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Compliance with Legal Obligations and Law Enforcement</h5>
                            <p class="mb-3">
                                In certain circumstances, we may need to disclose personal information in response to
                                lawful requests from public authorities, including those related to national security or
                                law enforcement. We may also disclose personal information to comply with subpoenas,
                                court orders, or other legal processes, or to protect our legal rights or defend against
                                legal claims. Additionally, we may share personal information if we believe it is
                                necessary to investigate, prevent, or take action regarding illegal activities,
                                suspected fraud, potential threats to the physical safety of any person, the security of
                                our services, or violations of our Terms of Use or Service, as required by law.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Community Forums</h5>
                            <p class="mb-3">
                                Our websites may include publicly accessible blogs, community forums, comment sections,
                                discussion forums, or other interactive features ("Interactive Areas"). Be aware that
                                any information you post in these areas may be read, collected, and used by others. If
                                you wish to have your personal information removed from an Interactive Area, please
                                contact us at <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                                    contact@merkaiixcelprep.com
                                </a>. In some cases, we may not be able to
                                remove your information, and if that happens, we will inform you and explain why.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">With Your Consent</h5>
                            <p class="mb-3">
                                We may share your personal information with third parties when you provide us with your
                                consent to do so.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Cookies and Tracking</h5>
                            <p class="mb-3">
                                We use cookies to enhance user experience, store preferences, and analyze site usage.
                                Cookies are small files stored on your device that help us remember your activities and
                                preferences over time. You can control cookie settings through your browser but
                                disabling them may limit some functionalities of our website.
                            </p>
                            <p class="mb-3">
                                We also use Google Analytics and other tracking technologies for advertising and
                                analytics purposes. You can opt out of Google’s use of cookies by visiting their Ads
                                Settings.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Security and Data Storage</h5>
                            <p class="mb-3">
                                We store your data with data hosting providers in the United States, using various
                                security measures to protect your information. While we strive to secure your data, no
                                system can be completely secure. We retain personal information for as long as necessary
                                to fulfill the purposes for which it was collected, or as required by law.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">YOUR RIGHTS – DELETION OF YOUR PERSONAL INFORMATION </h5>
                            <p class="mb-3">
                                <!-- You have the right to access, update, or delete your personal information. You can
                                exercise these rights by contacting us at <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                             contact@merkaiixcelprep.com
                        </a> (Create
                                Email) or via our <a href="{{ route('customer-help') }}" onclick="informationflag('Help and Support')">Help & Support</a> page. You also have the right to opt out of marketing
                                communications at any time. -->
                                To request the deletion of your personal information, you can either contact us at
                                <a href="mailto:contact@merkaiixcelprep.com" style="text-decoration: none; color: inherit;">
                                    contact@merkaiixcelprep.com
                                </a>
                                or call our toll-free number at
                                <a href="tel:+18667041036" style="text-decoration: none; color: inherit;">
                                    866-704-1036
                                </a>.
                            </p>
                            <p class="mb-3">
                                When you provide us with personal information through our websites or services, you have
                                the right to access and request the deletion of this information, subject to certain
                                limitations. For some of our services, you can access, update, and delete your
                                information directly through your account. Other services may require you to contact us
                                to request access or deletion.
                            </p>
                            <p class="mb-3">
                                We will not deny you access to your personal information unless applicable laws or
                                regulations allow or require us to withhold some or all the information we hold about
                                you. Even if you request the deletion of your information, we may need to retain it as
                                long as you maintain an account with us, to provide the services you requested, comply
                                with legal obligations, resolve disputes, enforce agreements, or because the information
                                exists in an Interactive Area.
                            </p>
                            <p class="mb-3">
                                To request access to or deletion of your personal information, you can either contact us at <a href="mailto:contact@merkaiixcelprep.com" style="text-decoration: none; color: inherit;">
    contact@merkaiixcelprep.com
  </a> or
                                call our toll-free number at <a href="tel:+18667041036" class="text-dark">
    866-704-1036
  </a>. We will respond to your request within seven
                                (7) business days. To protect your privacy and security, we will verify your identity
                                before acting on your request. We will match the identifying information you provide
                                with the data we have on file. If needed, we may ask for additional information or
                                documentation, such as a copy of your photo ID or authorization for an agent to act on
                                your behalf. This information will only be used for verification purposes and will be
                                deleted as soon as feasible after processing your request, except where required by law.
                                Please note that we cannot modify or delete information submitted through a form after
                                it has been sent to a client institution. If you need to update or remove information
                                from the submitted form, please contact the client institution directly.
                            </p>
                            <p class="mb-3">
                                We will retain personal information we process on behalf of our client institutions for
                                as long as necessary to provide services to them. We may also retain and use this
                                information to comply with legal obligations, resolve disputes, and enforce agreements.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">CALIFORNIA PRIVACY RIGHTS </h5>
                            <p class="mb-3">
                                The California Consumer Privacy Act (CCPA) and the California Privacy Rights Act (CPRA)
                                grant California residents’ specific rights regarding their personal information:
                            </p>
                            <p class="mb-3">
                                1. Right to Know: You have the right to request information about the personal data we
                                collect, use, disclose, and sell, including the categories of information we collect,
                                the sources of that information, the purposes for which we collect it, the categories of
                                third parties with whom we share it, and the specific pieces of personal information we
                                have collected about you.
                            </p>
                            <p class="mb-3">
                                2. Right to Deletion: You have the right to request the deletion of your personal
                                information that we have collected or maintain.
                            </p>
                            <p class="mb-3">
                                3. Right to Opt-Out: If applicable, you have the right to opt out of the sale of your
                                personal information.
                            </p>
                            <p class="mb-3">
                                4. Right to Non-Discrimination: You have the right to be free from discrimination if you
                                choose to exercise your privacy rights under the CCPA.
                            </p>
                            <p class="mb-3">
                                5. Right to Authorized Agent: You have the right to designate an authorized agent to
                                make requests on your behalf under the CCPA.
                            </p>
                            <p class="mb-3">
                                6. Right to Correction: You have the right to request correction of inaccurate personal
                                information.
                            </p>
                            <p class="mb-3">
                                7. Right to Limit Use of Sensitive Information: If applicable, you have the right to
                                limit the use and disclosure of sensitive personal information for purposes other than
                                those necessary to provide the services you request.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">The CCPA and CPRA also require us to disclose certain information:</h5>
                            <p class="mb-3">
                                The categories of personal information we collected about California consumers in the
                                past 12 months include identifiers (such as name, alias, postal address, email address,
                                etc.), information related to characteristics of protected classifications under
                                California or federal law, internet activity, geolocation data, professional and
                                employment information, education information, and inferences drawn from the above.
                            </p>
                            <p class="mb-3">
                                The sources from which we collect this information, the business purposes for which we
                                collect it, and the third parties with whom we share it are detailed in our Privacy
                                Policy.
                            </p>
                            <p class="mb-3">
                                We have disclosed personal information to third parties for business purposes within the
                                last 12 months, as detailed in our Privacy Policy.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Additional California Privacy Rights</h5>
                            <p class="mb-3">
                                California residents may request details about how we share their information with third
                                parties for direct marketing purposes. To make such a request, please contact us at
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                                    contact@merkaiixcelprep.com
                                </a>.
                            </p>
                            <p class="mb-3">
                                If you are between 13 and 17 years old, reside in California, and have registered for a
                                Merkaii Xcel Prep account, you may request the removal of content and information you
                                posted in Interactive Areas. To do so, email us at <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                                    contact@merkaiixcelprep.com
                                </a>
                                following these instructions:
                            </p>
                            <p class="mb-3">
                                (i) Send the email from the address associated with your
                                Merkaii Xcellence Prep account,
                            </p>
                            <p class="mb-3"> (ii) Include "Content Removal Request" in the subject
                                line, and
                            </p>
                            <p class="mb-3"> (iii) Provide your Merkaii Xcellence Prep username in the email body. We will
                                acknowledge your request and ask you to confirm it via a reply email. We will remove
                                your content within seven (7) business days after receiving your confirmation.
                            </p>
                            <p class="mb-3">
                                However, we cannot guarantee complete removal in certain situations, such as when
                                required by law, when content is reposted by third parties, when the content has been
                                anonymized, if the removal request process was not properly followed, or if you received
                                compensation for the content. Additionally, we cannot remove information entered into a
                                form after submission. For updates to such information, please contact the relevant
                                client institution.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">GDPR Privacy Rights</h5>
                            <p class="mb-3">If you are in the European Union or certain other regions, you may have additional rights
                                under applicable laws:
                            </p>
                            <ul>
                                <li class="ml-3" style="list-style-type: disc !important;">
                                    <p class="mb-3">
                                        Right of Access and Rectification: You may request information about whether we store
                                        or process any of your personal data and request corrections to inaccuracies.
                                    </p>
                                </li>
                                <li class="ml-3" style="list-style-type: disc !important;">
                                    <p class="mb-3">
                                        Right of Erasure: In certain situations, you may request the deletion of your personal
                                        information, particularly if it is no longer necessary for the original purpose.
                                    </p>
                                </li>
                                <li class="ml-3" style="list-style-type: disc !important;">
                                    <p class="mb-3">
                                        Right to Object to Processing: You can request that we stop processing your personal
                                        data or stop sending you marketing communications.
                                    </p>
                                </li>
                                <li class="ml-3" style="list-style-type: disc !important;">
                                    <p class="mb-3">
                                        Right to Restrict Processing: In certain circumstances, such as when you believe your
                                        data is inaccurate, you can request that we restrict its processing.
                                    </p>
                                </li>
                                <li class="ml-3" style="list-style-type: disc !important;">
                                    <p class="mb-3">
                                        Right to Data Portability: You may request your personal information in a structured,
                                        machine-readable format and request its transfer to another data controller.
                                    </p>
                                </li>
                                <li class="ml-3" style="list-style-type: disc !important;">
                                    <p class="mb-3">
                                        Right to Revoke Consent: If our processing is based on your consent, you may withdraw
                                        it at any time, though this does not affect the legality of processing before the
                                        withdrawal.
                                    </p>
                                </li>
                            </ul>
                            <p class="mb-3">
                                To exercise these rights, please contact us at
                                <a href="mailto:contact@merkaiixcelprep.com" style="color: #000 !important;">
                                    contact@merkaiixcelprep.com.
                                </a> We will consider your
                                request according to applicable laws. For your privacy and security, we may verify your
                                identity before taking action on your request.
                            </p>
                            <p class="mb-3">
                                You also have the right to lodge a complaint with a data protection authority about our
                                collection and use of your personal information. For more details, please contact your
                                local data protection authority.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">CHILDREN’S PRIVACY NOTICE </h5>
                            <p class="mb-3">
                                Our services are not intended for users under the age of 13. If we become aware of such
                                data collection, we will take steps to delete the information.
                            </p>
                            <p class="mb-3">
                                We do not knowingly or intentionally collect personal information from children under
                                the age of 13. If you are under 13 years old, please do not submit any personal
                                information through our websites or services. We strongly encourage parents and legal
                                guardians to oversee their children's online activities and assist in enforcing this
                                policy. If you suspect that a child under 13 has provided us with personal information,
                                please contact us at <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                                    contact@merkaiixcelprep.com
                                </a>.
                            </p>
                            <p class="mb-3">
                                If you are between the ages of 13 and 16 and reside in the European Union, your parent
                                or legal guardian may need to provide explicit consent for you to use our websites or
                                services. please fill out <a class="text-decoration-none" href="{{ url('/#stay-in-touch') }}">form</a> for your consent.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Notice to Parents and Legal Guardians</h5>
                            <p class="mb-3">
                                If you have given consent for us to collect, use, disclose, or process your child’s
                                personal information, you have the right to review, request deletion, or refuse further
                                collection, use, disclosure, or processing of your child's personal data in accordance
                                with applicable law. To exercise these rights, please contact us at <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                                    contact@merkaiixcelprep.com
                                </a>.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">POLICY CHANGES</h5>
                            <p class="mb-3">
                                We may update this Privacy Policy from time to time. Any changes will be posted on this
                                page, and significant changes will be communicated via email or within our services.
                                Continued use of our services after such changes constitutes your acceptance of the new
                                terms.</p>
                            <p class="mb-3"><span>Security</span>
                                We take the security of your personal information seriously and adhere to widely
                                accepted standards to protect it, both during transmission and once received.</p>
                            <p class="mb-3"><span> Passwords<span>
                                        If you create an account, your account information is protected by a password.
                                        It is
                                        crucial that you keep this password confidential to safeguard your personal
                                        information.
                                        Do not share your password with anyone else. We are not responsible for any
                                        consequences
                                        resulting from lost, stolen, or disclosed passwords, including unauthorized
                                        activity on
                                        your account, which is your responsibility. If you suspect that your password
                                        has been
                                        compromised, please notify us immediately.

                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Cookies</h5>
                            <p class="mb-3">
                                We may use cookies, web beacons, and other technologies to recognize users, gather
                                information about their preferences and browsing history, and personalize their
                                experience on our websites. Cookies help us prevent the need for you to repeatedly enter
                                login information, save your searches temporarily, manage our websites, and gain
                                insights into how visitors use our sites, ultimately allowing us to improve our
                                services.
                            </p>
                            <p class="mb-3">
                                We may also work with third parties, such as network advertisers and ad servers, to
                                deliver ads or other functionalities to you. These third parties may use cookies, web
                                beacons, or similar technologies to collect information about your visits to our
                                websites and use that information to present you with news or ads that may interest you,
                                even when you are no longer on our sites, or to integrate with social networking
                                platforms. This Policy does not cover the use of cookies and similar technologies by
                                third-party services, and we recommend reviewing their privacy policies to understand
                                their practices.
                            </p>
                            <p class="mb-3">
                                You can refuse to accept cookies by adjusting your browser settings. However, doing so
                                may cause issues with your browser’s functionality, and you may be unable to complete,
                                save, or submit forms or use certain services on our websites.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Business Transactions</h5>
                            <p class="mb-3">
                                In the event that, we sell or transfer all or a significant portion of our business,
                                stock, or assets, or merge with another entity, we may assign or transfer this Policy
                                along with your account and any related information, including personal data.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">Policy Updates</h5>
                            <p class="mb-3">
                                If there are significant changes to our privacy practices, we will update this Policy
                                accordingly. You will be informed of any changes by posting the revised Policy on our
                                websites, with the date of the latest update clearly indicated at the top. We may also
                                inform you of changes via email or other communication methods. We encourage you to
                                review this Policy regularly to stay informed about how your personal information is
                                being processed.
                            </p>
                            <h5 class="custom_small mt-md-3 mt-2">CONTACT US </h5>
                            <p class="mb-3">
                                If you have any questions or concerns about this Privacy Policy, please contact us at
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@merkaiixcelprep.com" target="_blank" style="text-decoration: none; color: #000 !important;">
                                    contact@merkaiixcelprep.com
                                </a> or at the address below:
                                <br>
                                Merkaii Xcellence Prep
                                <br>
                                501 S. Florida Avenue
                                <br>
                                Lakeland, FL 33801
                                <br>
                                United States of America
                            </p>
                            <p class="font-weight-bold">This Privacy Policy was last updated on 7/15/2024.</p>
                        </div>


                        <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-messages"
                            role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <h5 class="custom_small_heading font-weight-bold text-center mb-md-4 mb-3">Merkaii Xcellence Prep: Your One-Stop
                                Shop for Academic Success - Help & Support</h5>
                            <p class="mb-3">
                                At Merkaii Xcellence Prep, we're dedicated to empowering students of all backgrounds to
                                achieve their academic goals. We understand that you might have questions about our prep
                                programs and courses, enrollment process, or billing.

                            </p>
                            <p class="mb-3"> Merkaii Xcellence Prep is a comprehensive academic support platform designed to help
                                students excel in their academic pursuits. We offer personalized tutoring, test prep
                                courses, and academic coaching to healthcare adult learners at all levels.
                            </p>
                            <!-- <a href="{{ route('customer-help') }}" onclick="informationflag('Help and Support')"> -->
                            <p class="mb-3"> This Help & Support page is designed to be your one-stop resource for everything Merkaii
                                Xcellence Prep.
                            </p>

                            <h5 class="mt-md-3 mt-2">Haven't Found What You're Looking For?</h5>
                            <p class="mb-3">
                                If you can't find the answer to your question on this page, don't hesitate to reach out
                                to our friendly and knowledgeable support team.<a href="{{ route('contact-us') }}#contact-form-ankar" class="text-dark" style="color:#0079a8 !important">CLICK HERE TO CONTACT</a> We're available by phone, text, or email
                                to assist you:
                            </p>
                            <p>
                                <span class="font-weight-bold">Phone:</span>
                                <a href="tel:+18632508764" class="text-dark">
                                    863-250-8764
                                </a> (Main Line + Text)
                            </p>

                            <p>
                                <span class="font-weight-bold">Cell:</span>
                                <a href="tel:+13475251736" class="text-dark">
                                    347-525-1736
                                </a> (Voice + Text)
                            </p>

                            <p>
                                <span class="font-weight-bold">Email:</span>
                                <a href="mailto:support@merkaiixcelprep.com" class="text-dark">
                                    support@merkaiixcelprep.com
                                </a>
                            </p>

                            <h5 class="custom_small mt-md-3 mt-2">For General Inquiries see our Frequently Asked Questions (FAQs) page </h5>
                            <p class="mb-3"><span class="font-weight-bold">Billing & Payment: What are your payment options?</span>
                                <br>
                                We accept all major credit cards and debit cards. You can also set up automatic payments
                                for your convenience.
                            </p>
                            <p class="mb-3"><span class="font-weight-bold">Technical Support: I'm having trouble accessing my online
                                    account.</span> <br>If you're having
                                trouble accessing your online account, please ensure you are using the correct username
                                and password. You can also try resetting your password by clicking on the "Forgot
                                Password" link on the login page. If you continue to experience issues, please contact
                                our support team. </p>

                            <h5 class="custom_small mt-md-3 mt-2">We're Here to Help!</h5>
                            <p class="mb-3">We hope this Help & Support page has answered your questions about Merkaii Xcellence
                                Prep. If you have any further inquiries, please don't hesitate to reach out to our
                                support team. We're always happy to help!</p>
                            <h5 class="custom_small mt-md-3 mt-2">In Addition To The Above, You May Find The Following Resources Helpful</h5>
                            <p>  <pcontact-form-ankar>
                                <span class="font-weight-bold">Our Website:</span>
                                <a href="{{ url('/') }}" class="text-dark"> www.merkaiixcelprep.com</a>
                                </p>
                                <p>
                                    <pcontact-form-ankar>
                                        <span class="font-weight-bold">Our Blog:</span>
                                        <a href="{{ route('blogs') }}" class="text-dark"> https://merkaiixcelprep.com/articles </a>
                                </p>
                        </div>

                        {{-- <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-settings"
                                role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <h5>About this cookie policy</h5>
                                <p>
                                    This Cookie Policy explains what cookies are and how we use them, the types of cookies
                                    we use i.e, the information we collect using cookies and how that information is used,
                                    and how to control the cookie preferences. For further information on how we use, store,
                                    and keep your personal data secure, see our Privacy Policy.You can at any time change or
                                    withdraw your consent from the Cookie Declaration on our websiteLearn more about who we
                                    are, how you can contact us, and how we process personal data in our Privacy Policy
                                </p>
                                <h5>What are cookies?</h5>
                                <p>
                                    Cookies are small text files that are used to store small pieces of information. They
                                    are stored on your device when the website is loaded on your browser. These cookies help
                                    us make the website function properly, make it more secure, provide better user
                                    experience, and understand how the website performs and to analyze what works and where
                                    it needs improvement.
                                </p>
                                <h5>
                                    How do we use cookies?
                                </h5>

                                <p>
                                    As most of the online services, our website uses first-party and third-party cookies for
                                    several purposes. First-party cookies are mostly necessary for the website to function
                                    the right way, and they do not collect any of your personally identifiable data.The
                                    third-party cookies used on our website are mainly for understanding how the website
                                    performs, how you interact with our website, keeping our services secure, providing
                                    advertisements that are relevant to you, and all in all providing you with a better and
                                    improved user experience and help speed up your future interactions with our website.

                                </p>
                                <h5>
                                    What types of cookies do we use?
                                </h5>
                                <p>
                                    <b>Essential:</b> Some cookies are essential for you to be able to experience the full
                                    functionality of our site. They allow us to maintain user sessions and prevent any
                                    security threats. They do not collect or store any personal information. For example,
                                    these cookies allow you to log-in to your account and add products to your basket, and
                                    checkout securely.
                                </p>

                                <p>
                                    <b>Statistics:</b> These cookies store information like the number of visitors to the
                                    website, the number of unique visitors, which pages of the website have been visited,
                                    the source of the visit, etc. These data help us understand and analyze how well the
                                    website performs and where it needs improvement.
                                </p>
                                <p>
                                    <b>Marketing:</b> Our website displays advertisements. These cookies are used to
                                    personalize the advertisements that we show to you so that they are meaningful to you.
                                    These cookies also help us keep track of the efficiency of these ad campaigns.
                                    The information stored in these cookies may also be used by the third-party ad providers
                                    to show you ads on other websites on the browser as well.


                                </p>
                                <p>
                                    <b>Functional:</b> These are the cookies that help certain non-essential functionalities
                                    on our website. These functionalities include embedding content like videos or sharing
                                    content of the website on social media platforms.
                                </p>
                                <p>
                                    <b>Preferences:</b> These cookies help us store your settings and browsing preferences
                                    like language preferences so that you have a better and efficient experience on future
                                    visits to the website.
                                </p>
                            </div> --}}

                        {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id=ship role="tabpanel"
                            aria-labelledby="tab-4">
                            <h5>FREE SHIPPING</h5>
                            <p>
                                Below are the free shipping offers available on <strong>JUSOUTBEAUTY</strong>
                            </p>
                            <p>
                                <b> DOMESTIC</b> FREE Standard Shipping on all U.S. merchandise orders (please allow 4-8
                                business days for processing and shipping to receive your order)
                            </p>

                            <p>
                                <b>INTERNATIONAL</b> FREE Standard International Shipping on all merchandise orders $75
                                USD and over.
                            </p>

                            <p>
                                Please note if your order contains a hazmat item US orders must ship via ground Standard
                                Shipping. International orders must ship DHL Express. International shipping rates vary
                                by country and will be determined at checkout.
                            </p>

                            <h5>DOMESTIC SHIPPING COSTS + DELIVERY TIMES</h5>
                            <p>
                                Orders must be placed by 12pm ET to start processing on the same day. Processing time
                                usually takes 1-2 business days. Delivery times are based on orders placed between
                                Monday – Friday.
                            </p>

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Shipping Method</th>
                                        <th scope="col">Costs</th>
                                        <th scope="col">Total Delivery Time (including processing time)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>Standard Shipping</td>
                                        <td>Free</td>
                                        <td>4-8 business days (up to 21 days for APO/FPO/DPO Military Addresses)</td>
                                    </tr>
                                    <tr>

                                        <td>2 Day Shipping</td>
                                        <td>$10.95 USD</td>
                                        <td>3 – 4 business days</td>
                                    </tr>
                                    <tr>

                                        <td>1 Day Shipping</td>
                                        <td>$16.95 USD</td>
                                        <td>2 – 3 business days</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p>
                                Orders must be placed by 12pm ET Monday – Friday to start processing on the same day.
                                Processing time usually takes 1-2 business days. Delivery times are based on orders
                                placed between Monday and Friday. FentyBeauty.com and FentySkin.com offer FREE Standard
                                Shipping on all U.S. merchandise. Select items considered hazmat (hazardous materials)
                                are restricted and must be shipped ground with Standard Shipping. All U.S. orders always
                                ship Standard Shipping for free—no promotion code needed.
                            </p>
                        </div> --}}

                        {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id="track" role="tabpanel"
                            aria-labelledby="tab-5">

                            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum.</p>
                        </div> --}}
                        {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id="account" role="tabpanel"
                            aria-labelledby="tab-6">
                            <h5>Sign In</h5>
                            <p>Sign in to your account to add or edit your addresses and email Preference, save your Pro
                                filter to your profile and more.</p>
                            <h5>Creat Account</h5>
                            <p>EXCLUSIVE OFFERS + INFO <br>
                                Sign up to stay posted on hyper-limited offers, online-only product drops, in store
                                events, and-as true fenty beauty + fenty skin family-personal beauty tips from Rihhana
                                herself.</p>
                            <p class="text-muted mb-2">Click here for Sign In or Creat Account</p>
                            <button class="btn btn-primary"><a href="{{ url('/login') }}"
                        style="color:white">Login</a></button>

                    </div> --}}
                    <div class="tab-pane fade p-lg-5 rounded bg-white p-3 shadow mb-3" id="faq"
                        role="tabpanel" aria-labelledby="tab-7">
                        <h5 class="custom_small_heading font-weight-bold">Frequently Asked Questions</h5>
                        <div class="col-12 mt-3 px-0">
                            @forelse ($faqs as $faq)
                            <div class="wrapper shadow-1 mb-4 rounded px-3 py-2">
                                <button class="toggle"
                                    onclick="toggleFaq({{ $faq->id }})">{{ $faq->question }}<i
                                        class="fas fa-plus icon"></i>
                                </button>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <iframe id="iframeFaqAns_{{ $faq->id }}"
                                                    style="border:unset;width:100%;"></iframe>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- <p>{!! $faq->answer !!}</p> --}}
                                </div>
                            </div>
                            @empty
                            <div class="wrapper mb-4 px-3 py-2 shadow">
                                <button class="toggle">No FAQs Found</button>
                            </div>
                            @endforelse
                        </div>
                        {{-- <h5 class="font-weight-bolder text-dark">1. Can I apply my previous nursing or healthcare
                                    experience toward becoming an RN and/or
                                    earning a higher degree?
                                </h5>

                                <p class="mt-2">
                                    Registered nurses (RNs) must have at least an Associate Degree in Nursing (ADN), but
                                    some students decide to pursue a Bachelor of Science in Nursing (BSN). If you’re already
                                    working in the medical field, there are multiple pathways to work toward becoming an RN.
                                    <br>

                                    <strong>Here are two examples:
                                    </strong> <br>

                                    <span class="font-weight-bold">Medical Assistant (MA):
                                    </span> MAs may be able to apply some of the coursework from their
                                    program (particularly community college courses) toward an ADN to shorten the time to
                                    graduation. <br>
                                    <span class="font-weight-bold"> Licensed Practical Nurse (LPN):
                                    </span> Both LPN-to-ADN and LPN-to-BSN bridge programs take into
                                    account prior education. The main difference is that an ADN can take a year or two,
                                    while a BSN will generally take twice that long.

                                </p>
                                <h5 class="font-weight-bolder text-dark mt-2">2. How much math and science do I have to
                                    take to become a nurse? </h5>
                                <p class="mt-2">

                                    These subjects appear to be a common fear among prospective students, and the answer
                                    depends on the type of nursing you pursue. If you’re interested in the LPN/LVN route,
                                    your training program will likely include science courses like anatomy, physiology,
                                    human growth and development, and basic nutrition. You may need to meet a math
                                    requirement to get into an LPN program. <br>
                                    Whether in an ADN or BSN degree program, a prospective registered nurse will likely need to take health-related science courses, as well as meet math requirements (and liberal arts, too). <br>
                                    Don’t let math anxiety keep you from pursuing your career goals. Revisit the basics—fractions are your friends!—if you feel like you’ve forgotten them since school. And don’t be afraid to hire a tutor to help you navigate college-level coursework that seems daunting.
                                </p>
                                <h5 class="font-weight-bolder text-dark mt-2">3.Can I really get a nursing degree online?
                                </h5>
                                <p class="mt-2">Since nursing is a hands-on profession, even online nursing programs require in-person clinical training with real patients. Programs that combine online learning with real-world practice are called hybrids. <br> If you’re pursuing a bachelor’s degree and already have a combination of clinical hours and a current RN license, you may be able to find a program that is exclusively online.


                                </p> --}}
                    </div>
                    {{-- resourse center --}}
                    {{-- <div class="tab-pane fade rounded bg-white p-4 shadow mb-3" id="resource-center"
                                role="tabpanel" aria-labelledby="tab-8">
                                <h5>FOR Resource Center</h5>
                                <h6>DOMESTIC CUSTOMERS</h6>
                                <h6>Call Us:</h6>
                                <p>
                                    Representatives are available from 7am – 2am ET, 7 days a week (excluding major U.S.
                                    holidays) and are ready to help.
                                </p>
                                <p><u>863-250-8764</u></p>

                                <h5>Live Chat with Us:</h5>
                                <p>
                                    Representatives are available from 7am – 11pm ET, 7 days a week (excluding major U.S.
                                    holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of any
                                    page.
                                </p>
                                <h5>International Customer</h5>
                                <p>
                                    Our international customers may access our international help center 24 hours a day, 7
                                    days a week HERE. If you are unable to find the answer to your question, you may contact
                                    a customer service representative through the help center. Representatives are available
                                    6 days a week (Sunday - Friday) and are ready to help. Please allow 24 hours to receive
                                    a response.
                                </p>
                            </div> --}}
                </div>

            </div>
        </div>
        </div>
    </section>

</main>

<script>
    // active-tab_heading
    function updateTabHeading(tabName) {
        document.getElementById('tabHeading').innerText = tabName;
    }

    function setActiveTab(tabLink) {
        var tabName = tabLink.innerText.trim();
        updateTabHeading(tabName);
    }

    document.addEventListener('DOMContentLoaded', function() {
        var activeTab = document.querySelector('.nav-link.active');
        setActiveTab(activeTab);
    });

    var tabLinks = document.querySelectorAll('.nav-link');
    tabLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            setActiveTab(link);
        });
    });
</script>

<script>
    if (window.location.hash) {
        let hash = window.location.hash;
        if($(hash).attr('data-bs-toggle') == 'tab'){

            $(hash).tab('show');
        }
    }

    var information = localStorage.getItem("information");
    console.log(information);
    if (information == 'track order') {

        $('#tab-5').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'shipping') {

        $('#tab-4').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'my Account') {

        $('#tab-6').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'term of use') {

        $('#v-pills-home-tab').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'cookies settings') {

        $('#v-pills-cookies-tab').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'privacy policy') {

        $('#v-pills-profile-tab-1').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'Help and Support') {

        $('#v-pills-messages-tab-2').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'Certificate Verification') {

        $('#v-pills-settings-tab-3').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'faq') {

        $('#tab-7').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'customer') {

        $('#tab-8').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'contact') {

        $('#tab-9').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    }
</script>
<script>
    // function close_topbar() {

    //     $("#topbar").removeClass('d-xl-flex');
    //     $(".hero-section").removeClass('mt-15-67');
    //     $('.hero-section').attr('style', 'padding-top: 230px !important');

    // }
    $(document).ready(function() {
        $(window).on("resize", function(e) {
            checkScreenSize();
        });

        checkScreenSize();

        function checkScreenSize() {
            var newWindowWidth = $(window).width();

            if (newWindowWidth < 481) {
                $("#tab-8,#tab-9,#v-pills-home-tab,#v-pills-cookies-tab,#v-pills-profile-tab-1,#v-pills-messages-tab-2,#v-pills-settings-tab-3,#tab-4,#tab-5,#tab-6,#tab-7")
                    .click(function(event) {
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: $(".customer").offset().top
                        }, 500);
                    });

            }
        }
    });
</script>
<script>
    let toggles = document.getElementsByClassName("toggle");
    let contentDiv = document.getElementsByClassName("content");
    let icons = document.getElementsByClassName("icon");
    let wrapper = document.getElementsByClassName('wrapper');

    for (let i = 0; i < toggles.length; i++) {
        toggles[i].addEventListener("click", () => {
            if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
                toggles[i].style.color = "#0079a8";
                wrapper[i].style.background = "#fff";
                icons[i].classList.remove("fa-plus");
                icons[i].classList.add("fa-minus");
            } else {
                contentDiv[i].style.height = "0px";
                toggles[i].style.color = "#111130";
                wrapper[i].style.background = "#eee";
                icons[i].classList.remove("fa-minus");
                icons[i].classList.add("fa-plus");
            }

            for (let j = 0; j < contentDiv.length; j++) {
                if (j !== i) {
                    contentDiv[j].style.height = 0;
                    toggles[j].style.color = "#111130";
                    wrapper[j].style.background = "#eee";
                    icons[j].classList.remove("fa-minus");
                    icons[j].classList.add("fa-plus");
                }
            }
        });
    }

    var faqs = @json($faqs);
    if (faqs != '') {
        for (var i = 0; i < faqs.length; i++) {

            // set About iframe
            var iframe = document.getElementById("iframeFaqAns_" + faqs[i]['id']);
            var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            var dynamicDiv = document.createElement("div");

            dynamicDiv.innerHTML = faqs[i]['answer'].en;

            iframeDoc.body.appendChild(dynamicDiv);


        }
    }

    function toggleFaq(id) {

        var iframe = document.getElementById("iframeFaqAns_" + id);
        var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
        var bodyHeight = iframeDoc.body.querySelector("div").scrollHeight + 25;
        $("#iframeFaqAns_" + id).css('height', bodyHeight);
    }
</script>


{{-- for slider in navtabs for mobile --}}
<script>
    $(document).ready(function() {
        const $tabsBox = $(".small_pills");
        const $allTabs = $tabsBox.find(".main-items");
        const $arrowEventsIcons = $(".eventsIcon i");
        const $tabContents = $(".tab-pane");

        $arrowEventsIcons.on("click", function() {
            if ($(this).attr("id") === "left") {
                $tabsBox.animate({
                    scrollLeft: '-=340'
                }, 'smooth');
            } else {
                $tabsBox.animate({
                    scrollLeft: '+=340'
                }, 'smooth');
            }
        });

        $tabsBox.on("scroll", function() {
            let maxScrollableWidth = this.scrollWidth - this.clientWidth;
            $(".eventsIcon:first-child").css('display', this.scrollLeft <= 0 ? "none" : "flex");
            $(".eventsIcon:last-child").css('display', maxScrollableWidth - this.scrollLeft <= 1 ?
                "none" : "flex");
        });

        $allTabs.on("click", function(e) {
            e.preventDefault();
            $allTabs.removeClass("active");
            $(this).addClass("active");

            // Remove active class
            $tabContents.removeClass("show active");

            // Add active class 
            const targetContentId = $(this).attr("href").substring(1);
            $("#" + targetContentId).addClass("show active");
        });
        const handleEventsIcons = function() {
            let maxScrollableWidth = $tabsBox[0].scrollWidth - $tabsBox[0].clientWidth;
            console.log('scrollLeft:', $tabsBox[0].scrollLeft, 'maxScrollableWidth:', maxScrollableWidth);
            $(".eventsIcon:first-child").css('display', $tabsBox[0].scrollLeft <= 0 ? "none" : "flex");
            $(".eventsIcon:last-child").css('display', maxScrollableWidth - $tabsBox[0].scrollLeft <= 1 ?
                "none" : "flex");
        };
        handleEventsIcons();
    });
</script>
@include(theme('partials._custom_footer'))
@endsection