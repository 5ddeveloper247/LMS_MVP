{{-- ============================================================
     PREVIOUS HEADER — COMMENTED OUT (DO NOT DELETE OR MODIFY)
     ============================================================
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<div class="aoraeditor-skip aoraeditor-header">

    <style>

        :root {
            --mid-teal: #1A8A6F;
            --deep-teal: #0F6E56;
            --darkest-teal: #0A4D3C;
            --terracotta: #C65D3A;
            --terracotta-dark: #A84827;
            --cream: #F5EDE0;
            --charcoal: #2B2B2B;
            --charcoal-soft: #4a4a4a;
            --white: #FFFFFF;
            --serif: 'Playfair Display', Georgia, serif;
            --sans: 'Montserrat', system-ui, sans-serif;

        }


        .navbar_fixed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            animation: fadeInDown 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
         * { box-sizing: border-box; margin: 0; padding: 0; }
         html { scroll-behavior: smooth; }
         body {
           font-family: 'Montserrat', sans-serif;
           color: var(--charcoal);
           line-height: 1.6;
           background: var(--white);
         }

         .serif { font-family: 'Playfair Display', serif; }
         .container { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
         .narrow { max-width: 820px; margin: 0 auto; padding: 0 24px; }


        /* Utility Bar */
        .utility-bar {
          background: var(--teal-darkest);
          color: var(--cream);
          padding: 8px 0;
          border-top: 4px solid var(--terracotta);
          font-size: 12.5px;
        }
        .utility-inner {
          max-width: 1240px;
          margin: 0 auto;
          padding: 0 24px;
          display: flex;
          align-items: center;
          justify-content: space-between;
        }
        .utility-tagline {
          font-family: var(--serif);
          font-style: italic;
          font-size: 13.5px;
          color: var(--cream);
          letter-spacing: 0.5px;
        }
        .utility-links {
          display: flex;
          align-items: center;
          gap: 0;
        }
        .utility-link {
          color: var(--cream) !important;
          text-decoration: none;
          padding: 4px 16px;
          font-weight: 500;
          font-size: 12.5px;
          transition: color 0.2s;
          border-right: 1px solid rgba(245, 237, 224, 0.25);
          display: flex;
          align-items: center;
          gap: 6px;
        }
        .utility-link:last-child { border-right: none; padding-right: 0; }
        .utility-link:first-child { padding-left: 0; }
        .utility-link:hover { color: var(--terracotta) !important; }
        .utility-link svg {
          width: 14px;
          height: 14px;
          flex-shrink: 0;
        }
        .login-dot {
          width: 7px;
          height: 7px;
          border-radius: 50%;
          background: var(--terracotta);
          display: inline-block;
        }


        /* logo Mark */
        .logo-mark {
          display: flex;
          align-items: center;
          gap: 14px;
          text-decoration: none;
          color: var(--teal-deep);
          flex-shrink: 0;
        }
        .logo-seal-wrap {
          width: 48px;
          height: 48px;
          position: relative;
          flex-shrink: 0;
        }
        .logo-seal-svg {
          width: 100%;
          height: 100%;
          display: block;
        }
        .logo-text {
          display: flex;
          flex-direction: column;
          line-height: 1.05;
        }
        .logo-text .name {
          font-family: var(--serif);
          font-weight: 700;
          font-size: 19px;
          color: var(--teal-deep);
          letter-spacing: 0.2px;
        }
        .logo-text .tag {
          font-family: var(--sans);
          font-size: 9.5px;
          letter-spacing: 1.8px;
          text-transform: uppercase;
          color: var(--terracotta);
          font-weight: 600;
          margin-top: 2px;
        }



         /* ============ HEADER NAV ============ */

           .nav-brand {
             font-family: var(--serif);
             font-weight: 700;
             font-size: 20px;
             color: var(--teal-darkest);
             text-decoration: none;
             letter-spacing: -0.3px;
             line-height: 1.1;
           }

           .nav-brand-accent {
             color: var(--terracotta);
             font-style: italic;
           }
      .nav-links { display: flex; gap: 28px; align-items: center; }
      .nav-links a {
        color: var(--charcoal); text-decoration: none;
        font-size: 14px; font-weight: 500;
        transition: color 0.2s;
      }
      .nav-links a:hover { color: var(--mid-teal) !important; }
      .btn {
        display: inline-block;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600; font-size: 14px;
        padding: 12px 24px; border-radius: 4px;
        text-decoration: none; cursor: pointer;
        transition: all 0.2s; border: 2px solid transparent;
        letter-spacing: 0.3px;
      }

            .nav-inner {
              max-width: 1240px;
              margin: 0 auto;
              padding: 0 24px;
              display: flex;
              align-items: center;
              justify-content: space-between;
              gap: 24px;
            }

            .contact_wrap:hover {
                border-radius: 5px;
            }

            .btn-primary {
        background: var(--terracotta); color: var(--white);
        border-color: var(--terracotta);
      }
      .btn-primary:hover { background: var(--deep-teal); border-color: var(--deep-teal);
      color: white !important;
      }

            .login_btn a {
                font-size: 12.5px;
                font-weight: 300;
                font-family: "Inter";
                color: #eee;
                background-color: var(--terracotta);
                border-radius: 4px;
                padding: 10px 20px !important;
                border: 1px solid var(--terracotta);
            }

            .login_btn a:hover {
                color: var(--white) !important;
                background-color: var(--deep-teal) !important;
                border-color: var(--deep-teal);
            }

            .fa-lg {
                font-size: 5px;
            }

            .menu-hamburger {
                height: 20px;
                width: 20px;
            }

            .theme_btn.small_btn2 {
                white-space: nowrap;
            }

            .on_cursor:hover {
                background-color: #eee !important;
                cursor: pointer !important;
            }

            .mobile-menu {
                margin-left: 6rem;
            }

            #mobile-menu li a {
                color: #000000 !important;
                font-weight: 400 !important;
                font-size: 12px !important;
                margin-right: 9px !important;
            }

            #mobile-menu li a.active {
                color: var(--mid-teal) !important;
                font-weight: 800 !important;
            }

          
            .search-bar {
                position: absolute;
                right: 0;
                transform: translate(-50%, -50%);
                background: #8a8787;
                border: #e84118;
                height: 40px;
                border-radius: 40px;
                padding: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .search-bar:hover>.search-txt {
                width: 100%;
                padding: 0 6px;
            }

            .search-btn {
                color: #e84118;
                float: right;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .search-txt {
                border: none;
                background: none;
                outline: none;
                float: left;
                padding: 0;
                color: black;
                font-size: 16px;
                transition: 0.4s;
                line-height: 40px;
                width: 0px;

            }

            .register-btn-svg svg {
                height: 17px;
            }

            .fa-user {
                font-size: 15px;
            }

            @media only screen and (max-width: 768px) {
                .login_btn {
                    display: flex;
                    font-family: "Inter";
                    margin: 0px 0px 0px 18px;
                    font-weight: 500;
                    width: fit-catch;
                    border-radius: 16px !important;
                }

                .login_btn a {
                    padding: 7px !important
                }

                .login_btn a:hover {
                    color: var(--system_primery_color) !important;
                    background-color: #fff !important;
                    border: 2px solid var(--system_primery_color) !important;
                }

                .search-column {
                    display: flex;
                    justify-content: right;
                    align-items: end
                }

                .search-form .form-group {
                    float: right !important;
                    transition: all 0.35s, border-radius 0s;
                    width: 32px;
                    height: 32px;
                    background-color: #fff;
                    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                    border-radius: 25px;
                    border: 1px solid #ccc;
                }

                .search-form .form-group input.form-control {
                    border: 0 none;
                    background: transparent;
                    box-shadow: none;
                    display: block;
                    padding-top: 13px;
                }

                .search-form .form-group input.form-control::-webkit-input-placeholder {
                    display: none;
                }

                .search-form .form-group input.form-control:-moz-placeholder {
                    display: none;
                }

                .search-form .form-group input.form-control::-moz-placeholder {
                    display: none;
                }

                .search-form .form-group input.form-control:-ms-input-placeholder {
                    display: none;
                }

                .search-form .form-group:hover,
                .search-form .form-group.hover {
                    width: 100%;
                }

                .search-form .form-group i.form-control-feedback {
                    position: absolute;
                    top: 50%;
                    z-index: 2;
                    display: block;
                    width: 34px;
                    height: 34px;
                    text-align: center;
                    color: var(--system_primery_color);
                    left: initial;
                    font-size: 14px;
                    transform: translateY(10px);
                }
            }

            @media only screen and (min-width: 769px) and (max-width:992px) {

                .login_btn a:hover {
                    color: var(--system_primery_color) !important;
                    background-color: #fff !important;
                    border: 2px solid var(--system_primery_color) !important;
                }

                .login_btn {
                    display: flex;
                    font-family: "Inter";
                    margin: 0px 0px 0px 18px;
                    font-weight: 500;
                    width: fit-content;
                }

                .login_btn a {
                    padding: 7px !important
                }
            }



            @media only screen and (min-width: 769px) and (max-width: 1100px) {
                .login_btn a {
                    font-size: 11px !important;

                }

                .fa-user {
                    font-size: 12px;
                }

                .register-btn-svg svg {
                    height: 16px;
                }
            }

            @media only screen and (min-width: 1200px) and (max-width:1279px) {
                .login_btn a {
                    font-size: 13px;
                    color: #eee;
                }
            }

            @media only screen and (min-width: 1400px) and (max-width:1799px) {
                .login_btn a {
                    font-size: 13px;
                    color: #eee;
                }

                #mobile-menu li a {
                    font-size: 15px !important;
                    margin-right: 15px !important;
                }
            }

            @media only screen and (min-width: 1800px) {
                .login_btn a {
                    font-size: 18px !important;
                }

                #mobile-menu li a {
                    font-size: 16px !important;
                    margin-right: 16px !important;
                }
            }

            .mockup-banner {
        background: var(--terracotta) !important; color: var(--white) !important;
        text-align: center !important; padding: 10px 16px;
        font-size: 13px; letter-spacing: 0.5px;
      }
    </style>


    <header class="main-header">
       <div class="utility-bar">
          <div class="utility-inner">
            <div class="utility-tagline">Knowledge · Understanding · Wisdom</div>
            <div class="utility-links">
              <a href="{{ url('/shop') }}" class="utility-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Shop
              </a>
              <a href="tutoring.html" class="utility-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                Tutoring
              </a>
              <a href="login.html" class="utility-link">
                <span class="login-dot"></span>
                Student Login
              </a>
            </div>
          </div>
        </div>
        
        <div class="top-bar"></div>

        <div id="sticky-header" class="header_area py-0 px-0" style="background-color: #ffffff">
            <div class="container-fluid" style="padding: 18px 24px;">

                <div class="nav-inner">
                        <a href="{{ url('/') }}" class="logo-mark">
                                       <div class="logo-seal-wrap">
                                           <svg class="logo-seal-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                             <circle cx="50" cy="50" r="48" fill="#1A8A6F" stroke="#C65D3A" stroke-width="1.5"/>
                                             <circle cx="50" cy="50" r="40" fill="#0F6E56"/>
                                             <text x="38" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">M</text>
                                             <text x="50" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">X</text>
                                             <text x="62" y="55" font-family="'Playfair Display', serif" font-size="16" font-weight="700" fill="#FFFFFF" text-anchor="middle">P</text>
                                             <line x1="38" y1="64" x2="62" y2="64" stroke="#C65D3A" stroke-width="1.2"/>
                                           </svg>
                                       </div>
                                       <div class="logo-text">
                                           <span class="name">Merkaii Xcellence Prep</span>
                                           <span class="tag">NCLEX Prep · Remediation</span>
                                       </div>
                                </a>
                            <div class="translator-switch">

                                @if (Settings('frontend_language_translation') == 1)
                                    @php
                                        if (auth()->check()) {
                                            $currentLang = auth()->user()->language_code;
                                        } else {
                                            $currentLang = app()->getLocale();
                                        }
                                    @endphp
                                    <select name="code" id="language_code" class="nice_Select"
                                        onchange="location = this.value;">
                                        @foreach (getLanguageList() as $key => $language)
                                            <option value="{{ route('changeLanguage', $language->code) }}"
                                                @if ($currentLang == $language->code) selected @endif>
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                @endif
                            </div>

                            <div class="category_search category_box_iner ml-sm-5 d-none d-sm-block">
                            </div>

                    <div class="category_search d-sm-none category_box_iner ml-md-5 mr-2 mr-sm-0">
                        @if (@$homeContent->show_menu_search_box == 1)
                            <form action="{{ route('search') }}" class="mb-0" id="search_form">
                                <div class="align-items-center d-flex d-sm-none input-group theme_search_field"
                                    style="position: relative;">
                                    <div class="input-group-prepend" data-toggle="collapse" href="#collapseExample"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <button class="btn" type="button" id="button-addon1"><i
                                                class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>

                    @if (Settings('show_cart') == 1 && !in_array(Route::currentRouteName(), ['CheckOut', 'orderPayment']))
                        <a href="#" class="float notification_wrapper">
                            <div class="notify_icon cart_store">
                                <img style="max-width: 30px; padding-left: 8px; min-width: 36px;"
                                    src="{{ asset('/public/frontend/infixlmstheme/') }}/img/svg/cart_white.svg"
                                    alt="" class="d-none d-sm-block">
                                <i class="fa-solid fa-cart-shopping d-sm-none"
                                    style="font-size: 20px; color: var(--system-primery-color)"></i>
                            </div>
                            <span class="notify_count">{{ @cartItem() }}</span>
                        </a>
                    @endif

                        <nav class="navbar navbar-expand-md pl-0 mb-0 nav-center">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                                <ul id="mobile-menu" class="d-lg-flex d-none align-items-center">

                                    @if (isset($menus))
                                        @foreach ($menus->where('parent_id', null) as $menu)

                                            @php

                                                $permissions = json_decode($menu->permissions, true);

                                                if ($menu->title == 'Forum' && !isModuleActive('Forum')) {
                                                    continue;
                                                }
                                                if ($menu->link == '/saas-signup') {
                                                    if (Auth::check()) {
                                                        continue;
                                                    } elseif (SaasDomain() != 'main') {
                                                        continue;
                                                    }
                                                }

                                            @endphp
                                            @if (headerMenuPermissions($permissions))
                                                <li
                                                    class="@if ($menu->mega_menu == 1) position-static @else @if ($menu->show == 1) right_control_submenu @endif @endif">
                                                    @if ($menu->element_id == null || $menu->element_id != 0)
                                                        <a @if ($menu->is_newtab == 1) target="_blank" @endif
                                                            href="{{ getMenuLink($menu) }}">
                                                            {{ $menu->title }}</a>

                                                    @endif

                                                    @if (isset($menu->childs))
                                                        @if (count($menu->childs) != 0)
                                                            @if (isset($menu->childs))
                                                                @if ($menu->mega_menu == 1)
                                                                    <ul class="mega_menu submenu">
                                                                        <li class="container mx-auto">
                                                                            <div class="row">
                                                                                @foreach ($menu->childs as $sub)
                                                                                    <div
                                                                                        class="col-lg-{{ $menu->mega_menu_column }}">
                                                                                        <h4>
                                                                                            {{ $sub->title }}
                                                                                        </h4>
                                                                                        @if (isset($sub->childs))
                                                                                            @if (count($sub->childs) != 0)
                                                                                                <ul
                                                                                                    class="mega_menu_list">
                                                                                                    @foreach ($sub->childs as $s)
                                                                                                        <li
                                                                                                            class="@if ($sub->show == 1)  @endif">
                                                                                                            <a @if ($s->is_newtab == 1) target="_blank" @endif
                                                                                                                href="{{ getMenuLink($s) }}">{{ $s->title }}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            @endif
                                                                                        @endif

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                @else
                                                                    <ul class="submenu list">
                                                                        @foreach ($menu->childs as $sub)
                                                                            <li class="">
                                                                                    @if ($sub->is_newtab == 1) target="_blank" @endif
                                                                                    href="{{ getMenuLink($sub) }}">{{ $sub->title }}
                                                                                    @if (isset($sub->childs) && count($sub->childs) != 0)
                                                                                        <i class="ti-angle-right"></i>
                                                                                    @endif
                                                                                </a>
                                                                                @if (isset($sub->childs))
                                                                                    @if (count($sub->childs) != 0)
                                                                                        <ul
                                                                                            class="@if ($sub->show == 1) leftcontrol_submenu @endif">
                                                                                            @foreach ($sub->childs as $s)
                                                                                                <li
                                                                                                    class="@if ($sub->show == 1)  @endif">
                                                                                                    <a @if ($s->is_newtab == 1) target="_blank" @endif
                                                                                                        href="{{ getMenuLink($s) }}">{{ $s->title }}</a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @endif
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                        @guest
                                            <div class="login_btn text-center d-lg-none d-flex">
                                                <a class="inter" href="{{ url('pre-registration') }}" class="text-white"
                                                    style="gap: 5px;">{{ __('Apply Now') }}
                                                </a>
                                            </div>
                                        @endguest
                                        @auth
                                            <div class="login_btn text-center d-lg-none d-flex">
                                                @if (Auth::user()->role_id == 3)
                                                    
                                                        href="{{ route('studentDashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                @else
                                                    <a href="{{ route('dashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                @endif
                                                <a href="{{ route('logout') }}">{{ __('frontend.Log Out') }}</a>
                                            </div>
                                        @endauth
                                    @else
                                    @endif
                                    <li><a href="#"></a></li>


                                </ul>

                                @auth()
                                    <div class="header__right login_user">
                                        <div class="profile_info collaps_part">
                                            <div class="profile_img collaps_icon d-flex align-items-center">
                                                <div class="studentProfileThumb"
                                                    style="background-image: url('{{ getProfileImage(Auth::user()->image) }}')">
                                                </div>

                                                <span class="">{{ Auth::user()->name }}
                                                    <br style="display: block">
                                                    <small>
                                                        @if (showEcommerce())
                                                            @if (Auth::user()->role_id == 3)
                                                                @if (Auth::user()->balance == 0)
                                                                    {{ Settings('currency_symbol') ?? '৳' }} 0
                                                                @else
                                                                    {{ getPriceFormat(Auth::user()->balance) }}
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </small>

                                                </span>

                                            </div>
                                            <div class="profile_info_iner collaps_part_content">
                                                @if (Auth::user()->role_id == 3)
                                                    
                                                        href="{{ route('studentDashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                    
                                                        href="{{ route('myProfile') }}">{{ __('frontendmanage.My Profile') }}</a>
                                                    
                                                        href="{{ route('myAccount') }}">{{ __('frontend.Account Settings') }}</a>
                                                    @if (isModuleActive('Affiliate') && auth()->user()->affiliate_request != 1)
                                                        
                                                            href="{{ routeIsExist('affiliate.users.request') ? route('affiliate.users.request') : '' }}">{{ __('frontend.Join Affiliate Program') }}</a>
                                                    @endif
                                                @else
                                                    
                                                        href="{{ route('dashboard') }}">{{ __('dashboard.Dashboard') }}</a>
                                                    
                                                        href="{{ route('changePassword') }}">{{ __('frontendmanage.My Profile') }}</a>
                                                @endif
                                                @if (isModuleActive('UserType'))
                                                    @foreach (auth()->user()->userRoles as $role)
                                                        @php
                                                            if ($role->id == auth()->user()->role_id) {
                                                                continue;
                                                            }
                                                        @endphp
                                                        <a href="{{ route('usertype.changePanel', $role->id) }}">
                                                            {{ __('common.Switch to') }} {{ $role->name }}
                                                        </a>
                                                    @endforeach
                                                @endif
                                                <a href="{{ route('logout') }}">{{ __('frontend.Log Out') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                @guest()
                                    @if (session()->has('pre-registered-user'))

                                        <div class="dropdown">
                                            <button class="btn theme_btn dropdown-toggle" id="dropdownButton">
                                                {{ session('pre-registered-user.name') }}
                                            </button>
                                            <div class="dropdown-content" id="dropdownContent">

                                                @if (session()->has('pre-registered-user'))
                                                    <a href="{{ route('register') }}">Enroll</a>
                                                    <a href="{{ route('preRegisteredDestroy') }}">Logout</a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="header__right">
                                            <div class="contact_wrap d-flex align-items-center">
                                                <div class="login_btn d-flex p-0">
                                                    <a href="{{ url('pre-registration') }}"
                                                        class="d-flex justify-content-center align-items-center register-btn-svg px-2 py-1"
                                                        style="gap: 5px;">
                                                            {{ __('Schedule a Call') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endguest
                            </div>
                        </nav>
                </div>

            </div>

            <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
            </div>

        </div>
    </header>

 </div>

 

@if (Settings('category_show'))
    <div class="side_cate">
        <div class="side_cate_close"><i class="ti ti-close"></i></div>
        <div class="side_cate_wrap">
            <ul class="side_cate_wrap_menu">

                @if (isset($categories))
                    @foreach ($categories as $category)
                        @include(theme('partials._mobile_category'), [
                            'category' => $category,
                            'level' => 1,
                        ])
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
@if (Settings('show_cart') == 1 && !in_array(Route::currentRouteName(), ['CheckOut', 'orderPayment']))
    <a href="#" class="float notification_wrappe d-none">
        <div class="notify_icon cart_store">
            <img style="max-width: 30px;
    padding-left: 8px;
    min-width: 36px;"
                src="{{ asset('/public/frontend/infixlmstheme/') }}/img/svg/cart_white.svg" alt=""
                class="d-none d-sm-block">
            <i class="fa-solid fa-cart-shopping d-sm-none"
                style="font-size: 20px; color: var(--system-primery-color)"></i>
        </div>
        <span class="notify_count">{{ @cartItem() }}</span>
    </a>
@endif
</div>


<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    #dropdownButton {
        background-color: #fd7e14;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 5px 16px;
        text-decoration: none;
        display: block;
        font-size: small;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown.active .dropdown-content {
        display: block;
    }
</style>


     ============================================================
     END PREVIOUS HEADER
     ============================================================ --}}




<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,500&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    --shadow-nav: 0 1px 12px rgba(15, 110, 86, 0.04);
    --shadow-dropdown: 0 12px 40px rgba(15, 110, 86, 0.18);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: var(--sans);
    color: var(--charcoal);
    background: var(--cream);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }

  .utility-bar {
    background: var(--teal-darkest);
    color: var(--cream);
    padding: 8px 0;
    border-top: 4px solid var(--terracotta);
    font-size: 12.5px;
  }
  .utility-inner {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .utility-tagline {
    font-family: var(--serif);
    font-style: italic;
    font-size: 13.5px;
    color: var(--cream);
    letter-spacing: 0.5px;
  }
  .utility-links {
    display: flex;
    align-items: center;
    gap: 0;
  }
  .utility-link {
    color: var(--cream);
    text-decoration: none;
    padding: 4px 16px;
    font-weight: 500;
    font-size: 12.5px;
    transition: color 0.2s;
    border-right: 1px solid rgba(245, 237, 224, 0.25);
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .utility-link:last-child { border-right: none; padding-right: 0; }
  .utility-link:first-child { padding-left: 0; }
  .utility-link:hover { color: var(--terracotta); }
  .utility-link svg {
    width: 14px;
    height: 14px;
    flex-shrink: 0;
  }
  .login-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--terracotta);
    display: inline-block;
  }

  .main-nav {
    background: var(--white);
    padding: 16px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: var(--shadow-nav);
  }
  .nav-inner {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
  }

  .logo-mark {
    display: flex;
    align-items: center;
    gap: 14px;
    text-decoration: none;
    color: var(--teal-deep);
    flex-shrink: 0;
  }
  .logo-seal-wrap {
    width: 48px;
    height: 48px;
    position: relative;
    flex-shrink: 0;
  }
  .logo-seal-svg {
    width: 100%;
    height: 100%;
    display: block;
  }
  .logo-text {
    display: flex;
    flex-direction: column;
    line-height: 1.05;
  }
  .logo-text .name {
    font-family: var(--serif);
    font-weight: 700;
    font-size: 19px;
    color: var(--teal-deep);
    letter-spacing: 0.2px;
  }
  .logo-text .tag {
    font-family: var(--sans);
    font-size: 9.5px;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    color: var(--terracotta);
    font-weight: 600;
    margin-top: 2px;
  }

  .nav-center {
    display: flex;
    align-items: center;
    gap: 2px;
  }
  .nav-item {
    position: relative;
  }
  .nav-link {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--charcoal);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    padding: 10px 14px;
    border-radius: 4px;
    transition: all 0.2s;
    cursor: pointer;
    white-space: nowrap;
  }
  .nav-link:hover { color: var(--teal-mid); background: rgba(26, 138, 111, 0.05); }
  .nav-link.active { color: var(--teal-mid); }
  .nav-chevron {
    width: 10px;
    height: 10px;
    transition: transform 0.2s;
  }
  .nav-item:hover .nav-chevron { transform: rotate(180deg); }

  .nav-dropdown {
    position: absolute;
    top: calc(100% + 8px);
    left: 0;
    background: var(--white);
    border-radius: 8px;
    box-shadow: var(--shadow-dropdown);
    padding: 10px;
    min-width: 320px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-4px);
    transition: all 0.2s ease;
    border-top: 3px solid var(--terracotta);
    z-index: 200;
  }
  .nav-item:hover .nav-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  .nav-dropdown-link {
    display: block;
    padding: 12px 14px;
    text-decoration: none;
    color: var(--charcoal);
    border-radius: 6px;
    transition: all 0.2s;
  }
  .nav-dropdown-link:hover {
    background: var(--cream);
    color: var(--teal-deep);
  }
  .dropdown-title {
    font-family: var(--serif);
    font-weight: 700;
    font-size: 15px;
    color: var(--teal-deep);
    margin-bottom: 2px;
  }
  .dropdown-sub {
    font-size: 12px;
    color: var(--charcoal-soft);
    line-height: 1.4;
  }
  .dropdown-divider {
    border-top: 1px solid var(--gray-line);
    margin-top: 6px;
    padding-top: 10px;
  }
  .dropdown-divider .dropdown-title {
    color: var(--terracotta);
  }

  .nav-cta-wrap {
    display: flex;
    align-items: center;
    flex-shrink: 0;
  }
  .btn-nav-cta {
    display: inline-block;
    background: var(--terracotta);
    color: var(--white);
    font-family: var(--sans);
    font-weight: 600;
    font-size: 14px;
    padding: 11px 24px;
    border-radius: 6px;
    text-decoration: none;
    border: 2px solid var(--terracotta);
    transition: all 0.2s;
    letter-spacing: 0.3px;
    white-space: nowrap;
  }
  .btn-nav-cta:hover {
    background: var(--terracotta-deep);
    border-color: var(--terracotta-deep);
    transform: translateY(-1px);
    color: var(--white);
  }

  .nav-hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
    padding: 8px;
    background: none;
    border: none;
  }
  .nav-hamburger span {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--charcoal);
    border-radius: 2px;
    transition: all 0.3s;
  }
  .nav-hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
  .nav-hamburger.open span:nth-child(2) { opacity: 0; }
  .nav-hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

  .mxp-mobile-menu {
    display: none;
    position: fixed;
    top: 0; right: -100%;
    width: 320px;
    max-width: 85vw;
    height: 100vh;
    background: var(--white);
    z-index: 300;
    box-shadow: -8px 0 40px rgba(0, 0, 0, 0.15);
    transition: right 0.35s ease;
    overflow-y: auto;
    padding: 24px;
  }
  .mxp-mobile-menu.open { right: 0; }
  .mxp-mobile-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 250;
    opacity: 0;
    transition: opacity 0.3s;
  }
  .mxp-mobile-overlay.open { display: block; opacity: 1; }
  .mxp-mobile-menu-close {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    margin-bottom: 20px;
  }
  .mxp-mobile-menu-close button {
    background: none;
    border: none;
    font-size: 28px;
    color: var(--charcoal);
    cursor: pointer;
    padding: 4px 8px;
  }
  .mxp-mobile-nav-group {
    border-bottom: 1px solid var(--gray-line);
    padding: 16px 0;
  }
  .mxp-mobile-nav-group:last-child { border-bottom: none; }
  .mxp-mobile-nav-label {
    font-family: var(--sans);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--terracotta);
    margin-bottom: 10px;
  }
  .mxp-mobile-nav-link {
    display: block;
    padding: 10px 0;
    color: var(--charcoal);
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    transition: color 0.2s;
  }
  .mxp-mobile-nav-link:hover { color: var(--teal-mid); }
  .mxp-mobile-cta {
    display: block;
    text-align: center;
    background: var(--terracotta);
    color: var(--white);
    font-family: var(--sans);
    font-weight: 600;
    font-size: 15px;
    padding: 14px 24px;
    border-radius: 6px;
    text-decoration: none;
    margin-top: 20px;
    transition: background 0.2s;
  }
  .mxp-mobile-cta:hover { background: var(--terracotta-deep); color: var(--white); }
  .mxp-mobile-utility-links {
    display: flex;
    gap: 16px;
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid var(--gray-line);
  }
  .mxp-mobile-utility-link {
    font-size: 13px;
    color: var(--charcoal-soft);
    text-decoration: none;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .mxp-mobile-utility-link:hover { color: var(--teal-mid); }
  .mxp-mobile-utility-link svg { width: 14px; height: 14px; }

  /* Profile dropdown in nav */
  .mxp-profile-wrap {
    position: relative;
    display: flex;
    align-items: center;
  }
  .mxp-profile-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    padding: 6px 10px;
    border-radius: 6px;
    transition: background 0.2s;
  }
  .mxp-profile-trigger:hover { background: rgba(26, 138, 111, 0.05); }
  .mxp-profile-thumb {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background-size: cover;
    background-position: center;
    border: 2px solid var(--teal-mid);
    flex-shrink: 0;
  }
  .mxp-profile-name {
    font-size: 13px;
    font-weight: 600;
    color: var(--charcoal);
    line-height: 1.2;
  }
  .mxp-profile-balance {
    font-size: 11px;
    color: var(--charcoal-soft);
  }
  .mxp-profile-dropdown {
    position: absolute;
    top: calc(100% + 8px);
    right: 0;
    background: var(--white);
    border-radius: 8px;
    box-shadow: var(--shadow-dropdown);
    padding: 10px;
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-4px);
    transition: all 0.2s ease;
    border-top: 3px solid var(--terracotta);
    z-index: 200;
  }
  .mxp-profile-wrap:hover .mxp-profile-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  .mxp-profile-dropdown a {
    display: block;
    padding: 9px 14px;
    text-decoration: none;
    color: var(--charcoal);
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.2s;
  }
  .mxp-profile-dropdown a:hover {
    background: var(--cream);
    color: var(--teal-deep);
  }

  /* Translator switch in nav */
  .mxp-translator {
    flex-shrink: 0;
  }
  .mxp-translator .nice_Select {
    font-size: 12px;
    font-family: var(--sans);
    border: 1px solid var(--gray-line);
    border-radius: 4px;
    padding: 4px 8px;
    color: var(--charcoal);
    background: var(--white);
  }

  /* Cart in nav */
  .mxp-cart-wrap {
    position: relative;
    display: flex;
    align-items: center;
  }
  .mxp-cart-wrap .notify_count {
    position: absolute;
    top: -6px;
    right: -6px;
    background: var(--terracotta);
    color: var(--white);
    font-size: 10px;
    font-weight: 700;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* Pre-registered dropdown */
  .mxp-prereg-dropdown {
    position: relative;
    display: inline-block;
  }
  .mxp-prereg-btn {
    background: var(--terracotta);
    color: var(--white);
    font-family: var(--sans);
    font-weight: 600;
    font-size: 13px;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.2s;
  }
  .mxp-prereg-btn:hover { background: var(--terracotta-deep); }
  .mxp-prereg-content {
    display: none;
    position: absolute;
    right: 0;
    top: calc(100% + 6px);
    background: var(--white);
    min-width: 160px;
    box-shadow: var(--shadow-dropdown);
    border-radius: 8px;
    border-top: 3px solid var(--terracotta);
    z-index: 200;
    padding: 8px;
  }
  .mxp-prereg-content a {
    display: block;
    padding: 9px 14px;
    color: var(--charcoal);
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    border-radius: 6px;
    transition: background 0.2s;
  }
  .mxp-prereg-content a:hover { background: var(--cream); color: var(--teal-deep); }
  .mxp-prereg-dropdown.active .mxp-prereg-content { display: block; }

  @media (max-width: 960px) {
    .utility-links { display: none; }
    .utility-tagline { margin: 0 auto; text-align: center; }
    .nav-center { display: none; }
    .nav-hamburger { display: flex; }
    .mxp-mobile-menu { display: block; }
    .logo-seal-wrap { width: 40px; height: 40px; }
    .logo-text .name { font-size: 17px; }
    .logo-text .tag { font-size: 8.5px; letter-spacing: 1.5px; }
    .mxp-translator { display: none; }
    .nav-cta-wrap{display: none !important}
  }

  @media (max-width: 480px) {
    .utility-bar { padding: 6px 0; }
    .utility-tagline { font-size: 12px; }
    .nav-inner { padding: 0 16px; }
  }
</style>

{{-- TIER 1: UTILITY BAR --}}
<div class="utility-bar">
  <div class="utility-inner">
    <div class="utility-tagline">Knowledge · Understanding · Wisdom</div>
    <div class="utility-links">
       <a href="{{url('/shop')}}" class="utility-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        Shop
      </a>
      {{-- <a href="tutoring.html" class="utility-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        Tutoring
      </a>
      <a href="{{ url('login') }}" class="utility-link">
        <span class="login-dot"></span>
        Student Login
      </a> --}}
    </div>
  </div>
</div>

{{-- TIER 2: MAIN NAV (STICKY) --}}
<nav class="main-nav">
  <div class="nav-inner">

    {{-- Logo --}}
    <a href="{{ url('/') }}" class="logo-mark">
      <div class="logo-seal-wrap">
        <svg class="logo-seal-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="48" fill="#1A8A6F" stroke="#C65D3A" stroke-width="1.5"/>
          <circle cx="50" cy="50" r="40" fill="#0F6E56"/>
          <text x="38" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">M</text>
          <text x="50" y="58" font-family="'Playfair Display', serif" font-size="26" font-weight="700" fill="#FFFFFF" text-anchor="middle">X</text>
          <text x="62" y="55" font-family="'Playfair Display', serif" font-size="16" font-weight="700" fill="#FFFFFF" text-anchor="middle">P</text>
          <line x1="38" y1="64" x2="62" y2="64" stroke="#C65D3A" stroke-width="1.2"/>
        </svg>
      </div>
      <div class="logo-text">
        <span class="name">Merkaii Xcellence Prep</span>
        <span class="tag">NCLEX Prep · Remediation</span>
      </div>
    </a>

    {{-- Language Translator --}}
    @if (Settings('frontend_language_translation') == 1)
      <div class="mxp-translator">
        @php
          if (auth()->check()) {
            $currentLang = auth()->user()->language_code;
          } else {
            $currentLang = app()->getLocale();
          }
        @endphp
        <select name="code" id="language_code" class="nice_Select" onchange="location = this.value;">
          @foreach (getLanguageList() as $key => $language)
            <option value="{{ route('changeLanguage', $language->code) }}"
              @if ($currentLang == $language->code) selected @endif>
              {{ $language->name }}
            </option>
          @endforeach
        </select>
      </div>
    @endif

    {{-- Desktop Nav Links --}}
    <div class="nav-center">
      @if (isset($menus))
        @foreach ($menus->where('parent_id', null) as $menu)
          @php
            $permissions = json_decode($menu->permissions, true);
            if ($menu->title == 'Forum' && !isModuleActive('Forum')) {
              continue;
            }
            if ($menu->link == '/saas-signup') {
              if (Auth::check()) {
                continue;
              } elseif (SaasDomain() != 'main') {
                continue;
              }
            }
          @endphp
          @if (headerMenuPermissions($permissions))
            <div class="nav-item">
              @if ($menu->element_id == null || $menu->element_id != 0)
                <a @if ($menu->is_newtab == 1) target="_blank" @endif
                   href="{{ getMenuLink($menu) }}"
                   class="nav-link">
                  {{ $menu->title }}
                  @if (isset($menu->childs) && count($menu->childs) != 0)
                    <svg class="nav-chevron" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 4.5L6 7.5L9 4.5"/></svg>
                  @endif
                </a>
              @endif
              @if (isset($menu->childs) && count($menu->childs) != 0)
                @if ($menu->mega_menu == 1)
                  <div class="nav-dropdown" style="min-width: 600px;">
                    <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                      @foreach ($menu->childs as $sub)
                        <div style="flex: 1; min-width: 160px;">
                          <div class="dropdown-title" style="padding: 8px 14px 4px;">{{ $sub->title }}</div>
                          @if (isset($sub->childs) && count($sub->childs) != 0)
                            @foreach ($sub->childs as $s)
                              <a @if ($s->is_newtab == 1) target="_blank" @endif
                                 href="{{ getMenuLink($s) }}"
                                 class="nav-dropdown-link">
                                <div class="dropdown-sub">{{ $s->title }}</div>
                              </a>
                            @endforeach
                          @endif
                        </div>
                      @endforeach
                    </div>
                  </div>
                @else
                  <div class="nav-dropdown">
                    @foreach ($menu->childs as $sub)
                      <a @if ($sub->is_newtab == 1) target="_blank" @endif
                         href="{{ getMenuLink($sub) }}"
                         class="nav-dropdown-link">
                        <div class="dropdown-title">{{ $sub->title }}</div>
                        @if (isset($sub->childs) && count($sub->childs) != 0)
                          @foreach ($sub->childs as $s)
                            <div class="dropdown-sub">
                              <a @if ($s->is_newtab == 1) target="_blank" @endif
                                 href="{{ getMenuLink($s) }}"
                                 style="color: inherit; text-decoration: none;">
                                {{ $s->title }}
                              </a>
                            </div>
                          @endforeach
                        @endif
                      </a>
                    @endforeach
                  </div>
                @endif
              @endif
            </div>
          @endif
        @endforeach
      @endif
    </div>

    {{-- Cart --}}
    {{-- @if (Settings('show_cart') == 1 && !in_array(Route::currentRouteName(), ['CheckOut', 'orderPayment']))
      <div class="mxp-cart-wrap">
        <a href="#" style="display: flex; align-items: center; padding: 6px;">
          <img style="max-width: 28px; min-width: 28px;"
               src="{{ asset('/public/frontend/infixlmstheme/') }}/img/svg/cart_white.svg"
               alt="" class="d-none d-sm-block">
          <i class="fa-solid fa-cart-shopping d-sm-none" style="font-size: 20px; color: var(--teal-mid);"></i>
        </a>
        <span class="notify_count">{{ @cartItem() }}</span>
      </div>
    @endif --}}

    {{-- Right: CTA / Auth --}}
    @auth()
      <div class="mxp-profile-wrap">
        <div class="mxp-profile-trigger">
          <div class="mxp-profile-thumb"
               style="background-image: url('{{ getProfileImage(Auth::user()->image) }}')">
          </div>
          <div>
            <div class="mxp-profile-name">{{ Auth::user()->name }}</div>
            @if (showEcommerce() && Auth::user()->role_id == 3)
              <div class="mxp-profile-balance">
                @if (Auth::user()->balance == 0)
                  {{ Settings('currency_symbol') ?? '৳' }} 0
                @else
                  {{ getPriceFormat(Auth::user()->balance) }}
                @endif
              </div>
            @endif
          </div>
          <svg style="width:10px;height:10px;flex-shrink:0;" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 4.5L6 7.5L9 4.5"/></svg>
        </div>
        <div class="mxp-profile-dropdown">
          @if (Auth::user()->role_id == 3)
            <a href="{{ route('studentDashboard') }}">{{ __('dashboard.Dashboard') }}</a>
            <a href="{{ route('myProfile') }}">{{ __('frontendmanage.My Profile') }}</a>
            <a href="{{ route('myAccount') }}">{{ __('frontend.Account Settings') }}</a>
            @if (isModuleActive('Affiliate') && auth()->user()->affiliate_request != 1)
              <a href="{{ routeIsExist('affiliate.users.request') ? route('affiliate.users.request') : '' }}">{{ __('frontend.Join Affiliate Program') }}</a>
            @endif
          @else
            <a href="{{ route('dashboard') }}">{{ __('dashboard.Dashboard') }}</a>
            <a href="{{ route('changePassword') }}">{{ __('frontendmanage.My Profile') }}</a>
          @endif
          @if (isModuleActive('UserType'))
            @foreach (auth()->user()->userRoles as $role)
              @php if ($role->id == auth()->user()->role_id) { continue; } @endphp
              <a href="{{ route('usertype.changePanel', $role->id) }}">
                {{ __('common.Switch to') }} {{ $role->name }}
              </a>
            @endforeach
          @endif
          <a href="{{ route('logout') }}">{{ __('frontend.Log Out') }}</a>
        </div>
      </div>
    @endauth
    @guest()
      @if (session()->has('pre-registered-user'))
        <div class="mxp-prereg-dropdown" id="mxpPreregDropdown">
          <button class="mxp-prereg-btn" id="mxpPreregBtn">
            {{ session('pre-registered-user.name') }}
          </button>
          <div class="mxp-prereg-content">
            <a href="{{ route('register') }}">Enroll</a>
            <a href="{{ route('preRegisteredDestroy') }}">Logout</a>
          </div>
        </div>
      @else
        <div class="nav-cta-wrap">
          <a href="{{ url('pre-registration') }}" class="btn-nav-cta">{{ __('Schedule a Call') }}</a>
        </div>
      @endif
    @endguest

    {{-- Hamburger (mobile only) --}}
    <button class="nav-hamburger" id="mxpNavHamburger" aria-label="Open menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>
</nav>

{{-- Mobile Overlay --}}
<div class="mxp-mobile-overlay" id="mxpMobileOverlay"></div>

{{-- Mobile Slide Menu --}}
<div class="mxp-mobile-menu" id="mxpMobileMenu">
  <div class="mxp-mobile-menu-close">
    <button id="mxpMobileClose" aria-label="Close menu">×</button>
  </div>

  @if (isset($menus))
    @php $mobileMenuGroups = $menus->where('parent_id', null); @endphp
    @foreach ($mobileMenuGroups as $menu)
      @php
        $permissions = json_decode($menu->permissions, true);
        if ($menu->title == 'Forum' && !isModuleActive('Forum')) { continue; }
        if ($menu->link == '/saas-signup') {
          if (Auth::check()) { continue; }
          elseif (SaasDomain() != 'main') { continue; }
        }
      @endphp
      @if (headerMenuPermissions($permissions))
        <div class="mxp-mobile-nav-group">
          @if (isset($menu->childs) && count($menu->childs) != 0)
            <div class="mxp-mobile-nav-label">{{ $menu->title }}</div>
            @if ($menu->element_id == null || $menu->element_id != 0)
              <a @if ($menu->is_newtab == 1) target="_blank" @endif
                 href="{{ getMenuLink($menu) }}"
                 class="mxp-mobile-nav-link">
                All {{ $menu->title }}
              </a>
            @endif
            @foreach ($menu->childs as $sub)
              <a @if ($sub->is_newtab == 1) target="_blank" @endif
                 href="{{ getMenuLink($sub) }}"
                 class="mxp-mobile-nav-link">
                {{ $sub->title }}
              </a>
              @if (isset($sub->childs) && count($sub->childs) != 0)
                @foreach ($sub->childs as $s)
                  <a @if ($s->is_newtab == 1) target="_blank" @endif
                     href="{{ getMenuLink($s) }}"
                     class="mxp-mobile-nav-link"
                     style="padding-left: 16px; font-size: 13px; color: var(--charcoal-soft);">
                    {{ $s->title }}
                  </a>
                @endforeach
              @endif
            @endforeach
          @else
            @if ($menu->element_id == null || $menu->element_id != 0)
              <a @if ($menu->is_newtab == 1) target="_blank" @endif
                 href="{{ getMenuLink($menu) }}"
                 class="mxp-mobile-nav-link">
                {{ $menu->title }}
              </a>
            @endif
          @endif
        </div>
      @endif
    @endforeach
  @endif

  @auth
    <div class="mxp-mobile-nav-group">
      <div class="mxp-mobile-nav-label">Account</div>
      @if (Auth::user()->role_id == 3)
        <a href="{{ route('studentDashboard') }}" class="mxp-mobile-nav-link">{{ __('dashboard.Dashboard') }}</a>
        <a href="{{ route('myProfile') }}" class="mxp-mobile-nav-link">{{ __('frontendmanage.My Profile') }}</a>
        <a href="{{ route('myAccount') }}" class="mxp-mobile-nav-link">{{ __('frontend.Account Settings') }}</a>
      @else
        <a href="{{ route('dashboard') }}" class="mxp-mobile-nav-link">{{ __('dashboard.Dashboard') }}</a>
        <a href="{{ route('changePassword') }}" class="mxp-mobile-nav-link">{{ __('frontendmanage.My Profile') }}</a>
      @endif
      <a href="{{ route('logout') }}" class="mxp-mobile-nav-link">{{ __('frontend.Log Out') }}</a>
    </div>
  @endauth
  @guest
    <a href="{{ url('pre-registration') }}" class="mxp-mobile-cta">{{ __('Schedule a Call') }}</a>
  @endguest

  <div class="mxp-mobile-utility-links">
    <a href="{{url('/shop')}}" class="mxp-mobile-utility-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
      Shop
    </a>
    <a href="{{ url('login') }}" class="mxp-mobile-utility-link">
      <span class="login-dot"></span>
      Student Login
    </a>
  </div>
</div>

{{-- Category side panel (preserved from previous header) --}}
@if (Settings('category_show'))
  <div class="side_cate">
    <div class="side_cate_close"><i class="ti ti-close"></i></div>
    <div class="side_cate_wrap">
      <ul class="side_cate_wrap_menu">
        @if (isset($categories))
          @foreach ($categories as $category)
            @include(theme('partials._mobile_category'), ['category' => $category, 'level' => 1])
          @endforeach
        @endif
      </ul>
    </div>
  </div>
@endif

{{-- Hidden cart float (preserved from previous header) --}}
@if (Settings('show_cart') == 1 && !in_array(Route::currentRouteName(), ['CheckOut', 'orderPayment']))
  <a href="#" class="float notification_wrappe d-none">
    <div class="notify_icon cart_store">
      <img style="max-width: 30px; padding-left: 8px; min-width: 36px;"
           src="{{ asset('/public/frontend/infixlmstheme/') }}/img/svg/cart_white.svg"
           alt="" class="d-none d-sm-block">
      <i class="fa-solid fa-cart-shopping d-sm-none"
         style="font-size: 20px; color: var(--system-primery-color)"></i>
    </div>
    <span class="notify_count">{{ @cartItem() }}</span>
  </a>
@endif

<script>
(function() {
  var hamburger = document.getElementById('mxpNavHamburger');
  var mobileMenu = document.getElementById('mxpMobileMenu');
  var mobileOverlay = document.getElementById('mxpMobileOverlay');
  var mobileClose = document.getElementById('mxpMobileClose');

  function openMenu() {
    mobileMenu.classList.add('open');
    mobileOverlay.classList.add('open');
    hamburger.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    mobileMenu.classList.remove('open');
    mobileOverlay.classList.remove('open');
    hamburger.classList.remove('open');
    document.body.style.overflow = '';
  }

  if (hamburger) {
    hamburger.addEventListener('click', function() {
      if (mobileMenu.classList.contains('open')) {
        closeMenu();
      } else {
        openMenu();
      }
    });
  }

  if (mobileClose) { mobileClose.addEventListener('click', closeMenu); }
  if (mobileOverlay) { mobileOverlay.addEventListener('click', closeMenu); }

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('open')) {
      closeMenu();
    }
  });

  // Pre-registered dropdown
  var preregBtn = document.getElementById('mxpPreregBtn');
  var preregDropdown = document.getElementById('mxpPreregDropdown');
  if (preregBtn && preregDropdown) {
    preregBtn.addEventListener('click', function() {
      preregDropdown.classList.toggle('active');
    });
    window.addEventListener('click', function(event) {
      if (!event.target.matches('#mxpPreregBtn')) {
        if (preregDropdown.classList.contains('active')) {
          preregDropdown.classList.remove('active');
        }
      }
    });
  }

  // Back to top (preserved from previous header)
  document.addEventListener("DOMContentLoaded", function() {
    try {
      var backToTopBtn = document.getElementById('back-top');
      var backToTopLink = document.getElementById('back-top-btn');
      if (backToTopBtn && backToTopLink) {
        backToTopLink.addEventListener('click', function(e) {
          e.preventDefault();
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        if (typeof $ !== 'undefined') {
          $(document).on("click", "#back-top-btn", function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
          });
        }
      }
    } catch (error) {
      console.error("Back to Top Error:", error);
    }
  });
})();
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const header = document.getElementById("sticky-header");

    if (!header) return;

    function toggleStickyHeader() {

        if (window.pageYOffset > 50 || document.documentElement.scrollTop > 50) {
            header.classList.add("navbar_fixed");
        } else {
            header.classList.remove("navbar_fixed");
        }
    }

    toggleStickyHeader();

    window.addEventListener("scroll", toggleStickyHeader);

});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        try {
            const backToTopBtn = document.getElementById('back-top');
            const backToTopLink = document.getElementById('back-top-btn');

            if (backToTopBtn && backToTopLink) {
                backToTopLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });

                $(document).on("click", "#back-top-btn", function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        } catch (error) {
            console.error("Back to Top Error:", error);
        }
    });


    if (document.getElementById('dropdownButton')) {
        document.getElementById('dropdownButton').addEventListener('click', function() {
            document.querySelector('.dropdown').classList.toggle('active');
        });

        window.addEventListener('click', function(event) {
            if (!event.target.matches('#dropdownButton')) {
                var dropdowns = document.getElementsByClassName('dropdown');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('active')) {
                        openDropdown.classList.remove('active');
                    }
                }
            }
        });
    }
</script>