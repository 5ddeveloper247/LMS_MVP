(function () {
    var toggle = document.getElementById('ceSidebarToggle');
    var sidebar = document.getElementById('ceSidebar');
    var overlay = document.getElementById('ceSidebarOverlay');

    if (toggle && sidebar && overlay) {
        function openSidebar() {
            sidebar.classList.add('open');
            overlay.classList.add('visible');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('visible');
            document.body.style.overflow = '';
        }

        toggle.addEventListener('click', function () {
            if (sidebar.classList.contains('open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        overlay.addEventListener('click', closeSidebar);

        window.addEventListener('resize', function () {
            if (window.innerWidth > 900) {
                closeSidebar();
            }
        });
    }

    document.querySelectorAll('.ce-tab-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = btn.getAttribute('data-ce-tab');
            if (!target) {
                return;
            }

            document.querySelectorAll('.ce-tab-btn').forEach(function (b) {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });

            document.querySelectorAll('.ce-tab-panel').forEach(function (panel) {
                panel.classList.remove('active');
            });

            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');

            var panel = document.querySelector('.ce-tab-panel[data-ce-panel="' + target + '"]');
            if (panel) {
                panel.classList.add('active');
            }
        });
    });
})();
