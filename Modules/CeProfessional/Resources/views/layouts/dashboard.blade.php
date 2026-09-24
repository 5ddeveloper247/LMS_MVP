<!DOCTYPE html>
<html lang="en">
<head>
    @include('ceprofessional::partials._head')
</head>
<body class="ce-dashboard-body">
    <div class="ce-sidebar-overlay" id="ceSidebarOverlay"></div>

    <div class="ce-shell">
        @include('ceprofessional::partials._sidebar')

        <div class="ce-main">
            @include('ceprofessional::partials._topbar')

            <main class="ce-content">
                @include('ceprofessional::partials._flash')
                <div class="ce-content-inner">
                    @yield('content')
                </div>
            </main>

            @include('ceprofessional::partials._footer')
        </div>
    </div>

    @stack('js')
</body>
</html>
