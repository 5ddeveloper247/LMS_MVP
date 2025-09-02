<div class="aoraeditor-skip aoraeditor-header">

    <style>
        .contact_wrap {
            border-radius: 5px;
            border: 1.4px solid var(--system_primery_color);

        }

        .contact_wrap:hover {
            border-radius: 5px;
            border: 1.4px solid var(--system_primery_color);
            color: var(--system_primery_color);
        }

        .login_btn a {
            font-size: 12.5px;
            font-weight: 600;
            color: #eee;
            background-color: var(--system_primery_color);
        }

        .login_btn a:hover {
            color: var(--system_primery_color) !important;
            background-color: #fff !important;
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
            /* border-radius: 16px !important; */
        }

        .on_cursor:hover {
            background-color: #eee !important;
            cursor: pointer !important;
        }

        .mobile-menu {
            margin-left: 6rem;
        }

        /* small screen searchbar */
        .search-bar {
            position: absolute;
            /* top: 50%; */
            /* left: 50%; */
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
            /* background: #2f3640; */
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
                font-family: Jost, sans-serif;
                margin: 0px 0px 0px 18px;
                font-weight: 500;
                width: fit-content;
                border-radius: 16px !important;
            }
            .login_btn a{
                padding: 7px !important
            }
            .login_btn a:hover{
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
                /* border-radius: 4px 25px 25px 4px; */
            }

            .search-form .form-group i.form-control-feedback {
                position: absolute;
                top: 50%;
                /* right: 25px; */
                z-index: 2;
                display: block;
                width: 34px;
                height: 34px;
                /* line-height: 34px; */
                text-align: center;
                color: var(--system_primery_color);
                left: initial;
                font-size: 14px;
                transform: translateY(10px);
            }
        }

        @media only screen and (min-width: 769px) and (max-width:992px) {
         
            .login_btn a:hover{
                color: var(--system_primery_color) !important;
                background-color: #fff !important;
                border: 2px solid var(--system_primery_color) !important;
            }
            .login_btn {
                display: flex;
                font-family: Jost, sans-serif;
                margin: 0px 0px 0px 18px;
                font-weight: 500;
                width: fit-content;
            }
            .login_btn a{
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

        @media only screen and (min-width: 1800px) {
            .login_btn a {
                font-size: 18px !important;
            }
        }

        @media only screen and (min-width: 2000px) {
            .login_btn a {
                font-size: 20px !important;
            }
        }
    </style>
    <!-- HEADER::START -->

    
</div>
</div>

</header>

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
 @if (Settings('show_cart') == 1 && !in_array(Route::currentRouteName(),['CheckOut','orderPayment']))
    <a href="#" class="float notification_wrapper">
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
    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown button */
    #dropdownButton {
        background-color: #fd7e14;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 5px 16px;
        text-decoration: none;
        display: block;
        font-size: small;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown content when the dropdown button is clicked */
    .dropdown.active .dropdown-content {
        display: block;
    }
</style>



<script>
    // Toggle dropdown content on button click
    if (document.getElementById('dropdownButton')) {
        document.getElementById('dropdownButton').addEventListener('click', function() {
            document.querySelector('.dropdown').classList.toggle('active');
        });

        // Close the dropdown if the user clicks outside of it
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

