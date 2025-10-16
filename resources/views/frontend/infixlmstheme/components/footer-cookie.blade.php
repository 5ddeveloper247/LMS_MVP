<div>
    @if($cookie)
        <style>
            .remove_cart {
                margin-left: -22px;
                margin-right: 8px;
                cursor: pointer;
            }

            .theme_cookies {
                /* background: {{@$cookie->bg_color}}; */
                background: var(--system_secendory_color) !important; 
            }

            * {
                font-family: 'Inter' !important;
            }

            /* .theme_cookies .cookie_btn {
                background: {{$cookie->text_color}};
            } */
        </style>
        <div class="theme_cookies flex-column" style="display: none; max-width: 340px;">
            <div class="theme_cookies_info flex-fill d-flex flex-column">
                <div class="icon">
                    <img src="{{asset(@$cookie->image)}}" alt="" class="h-100">
                    {{-- <img src="{{ asset('/public/uploads/images/footerimg/cookiess.png') }}"> --}}
                </div>
                <p class="text-white">{!! @$cookie->details !!}</p>
            </div>
           <div class="d-flex" style="gap: 10px">
            <button type="button" class="cookie_reject_btn" style="background-color: var(--footer_text_hover_color)" onclick="setCookies();">Reject</button>
            <button type="button" class="cookie_btn text-white" style="background-color: var(--system_primery_color)" onclick="setCookies();">{{@$cookie->btn_text}}</button>
           </div>
        </div>
    @endif

        <script>
            $( document ).ready(function() {
                @if($cookie->allow)
                checkCookie();
                @endif
            });


            function setCookies() {
                $('.theme_cookies').hide(500);
                var d = new Date();
                document.cookie = "allow=1; expires=Thu, 21 Dec " + (d.getFullYear() + 1) + " 12:00:00 UTC";
            }

            function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function checkCookie() {
                var check = getCookie("allow");
                if (check != "") {
                    $('.theme_cookies').hide();
                } else {
                    $('.theme_cookies').show();
                }
            }
        </script>
</div>
