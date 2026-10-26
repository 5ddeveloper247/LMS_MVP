<script>
// Mobile Menu Toggle
(function () {
  const hamburger = document.getElementById('navHamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  const mobileOverlay = document.getElementById('mobileOverlay');
  const mobileClose = document.getElementById('mobileClose');
  if (!hamburger) return;
  function openMenu() { mobileMenu.classList.add('open'); mobileOverlay.classList.add('open'); hamburger.classList.add('open'); hamburger.setAttribute('aria-expanded', 'true'); document.body.style.overflow = 'hidden'; }
  function closeMenu() { mobileMenu.classList.remove('open'); mobileOverlay.classList.remove('open'); hamburger.classList.remove('open'); hamburger.setAttribute('aria-expanded', 'false'); document.body.style.overflow = ''; }
  hamburger.addEventListener('click', function () { mobileMenu.classList.contains('open') ? closeMenu() : openMenu(); });
  mobileClose.addEventListener('click', closeMenu);
  mobileOverlay.addEventListener('click', closeMenu);
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && mobileMenu.classList.contains('open')) closeMenu(); });
})();
</script>
