(function () {
    document.querySelectorAll('.ce-tabs-panel').forEach(function (group) {
        group.querySelectorAll('.ce-tab-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var target = btn.getAttribute('data-ce-tab');
                if (!target) {
                    return;
                }

                var panel = group.querySelector('#' + target);
                if (!panel) {
                    return;
                }

                group.querySelectorAll('.ce-tab-btn').forEach(function (other) {
                    other.classList.remove('active');
                });
                group.querySelectorAll('.ce-tab-panel').forEach(function (otherPanel) {
                    otherPanel.classList.remove('active');
                });

                btn.classList.add('active');
                panel.classList.add('active');
            });
        });
    });
})();
