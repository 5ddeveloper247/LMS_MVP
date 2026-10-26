<script>
(function () {
  function hideCertPreloader() {
    try {
      if (window.jQuery) {
        window.jQuery('.preloader').stop(true, true).fadeOut(300);
      } else {
        document.querySelectorAll('.preloader').forEach(function (el) {
          el.style.display = 'none';
        });
      }
    } catch (e) { /* ignore */ }
  }
  window.hideCertPreloader = hideCertPreloader;
  if (document.readyState === 'complete') {
    setTimeout(hideCertPreloader, 0);
  } else {
    window.addEventListener('load', hideCertPreloader);
  }
})();
</script>
