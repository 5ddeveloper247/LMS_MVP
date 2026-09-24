(function () {
    document.querySelectorAll('.ce-tab-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = btn.getAttribute('data-ce-tab');
            if (!target) {
                return;
            }

            var panel = document.getElementById(target);
            if (!panel) {
                return;
            }

            document.querySelectorAll('.ce-tab-btn').forEach(function (other) {
                other.classList.remove('active');
            });
            document.querySelectorAll('.ce-tab-panel').forEach(function (otherPanel) {
                otherPanel.classList.remove('active');
            });

            btn.classList.add('active');
            panel.classList.add('active');
        });
    });
})();
