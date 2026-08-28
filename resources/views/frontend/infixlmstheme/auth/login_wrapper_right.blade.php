@php
    $route = Route::currentRouteName();
    
    if ($route == 'register') {
        $title = $page->reg_title;
        $banner = $page->reg_banner;
        $slogans1 = $page->reg_slogans1;
        $slogans2 = $page->reg_slogans2;
        $slogans3 = $page->reg_slogans3;
        $slogans4 = $page->reg_slogans4;
        $slogans5 = $page->reg_slogans5;
    }elseif ($route == 'register.3') {
        $title = $page->reg_title;
        $banner = $page->reg_banner;
        $slogans1 = $page->reg_slogans1;
        $slogans2 = $page->reg_slogans2;
        $slogans3 = $page->reg_slogans3;
        $slogans4 = $page->reg_slogans4;
        $slogans5 = $page->reg_slogans5;
    } elseif ($route == 'login') {
        $title = $page->title;
        $banner = $page->banner;
        $slogans1 = $page->slogans1;
        $slogans2 = $page->slogans2;
        $slogans3 = $page->slogans3;
        $slogans4 = $page->slogans4;
        $slogans5 = $page->slogans5;
    } elseif ($route == 'register.2') {
        $title = $page->reg_title;
        $banner = $page->reg_banner;
        $slogans1 = $page->reg_slogans1;
        $slogans2 = $page->reg_slogans2;
        $slogans3 = $page->reg_slogans3;
        $slogans4 = $page->reg_slogans4;
        $slogans5 = $page->reg_slogans5;
    } else {
        $title = $page->forget_title;
        $banner = $page->forget_banner;
        $slogans1 = $page->forget_slogans1;
        $slogans2 = $page->forget_slogans2;
        $slogans3 = $page->forget_slogans3;
        $slogans4 = $page->forget_slogans4;
        $slogans5 = $page->forget_slogans5;
    }
@endphp

<div class="login_wrapper_right">
    <div class="login_main_info">
        <h4>

            {{ $title ?? 'Welcome to Merkaii Xcellence College of Health' }}
        </h4>
        <div class="thumb">
            <img src="{{ asset($banner ?? 'public/frontend/infixlmstheme/img/banner/global.png') }}" alt="">
        </div>
        <div class="other_links" style="margin-bottom: 54px">
            <span>{{ $slogans1 ?? 'Excellence.' }} </span>
            <span>{{ $slogans2 ?? 'Community.' }} </span>
            <span>{{ $slogans3 ?? 'Diversity.' }} </span><br>
            <span>{{ $slogans4 ?? 'Diversity.' }} </span>
            <span>{{ $slogans5 ?? 'Diversity.' }} </span>
        </div>
    </div>
</div>
