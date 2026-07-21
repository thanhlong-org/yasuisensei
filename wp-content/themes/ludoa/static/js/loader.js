/* Site loader — plays once per session, exits with a curtain split. */
(function () {
  var root = document.documentElement;
  var el = document.getElementById('ludoa-loader');
  if (!el) {
    return;
  }

  // Repeat visit in this session: node is hidden by CSS — just drop it.
  if (root.classList.contains('ludoa-no-loader')) {
    root.classList.add('ludoa-loader-done');
    el.parentNode.removeChild(el);
    return;
  }

  var MIN_SHOW = 2100; // let the intro animation finish
  var started = Date.now();
  var done = false;

  function finish() {
    if (done) {
      return;
    }
    done = true;
    try {
      sessionStorage.setItem('ludoaLoaderShown', '1');
    } catch (e) {}
    el.classList.add('is-done');
    root.classList.add('ludoa-loader-done'); // unlock scroll
    setTimeout(function () {
      el.classList.add('is-gone');
    }, 1300);
  }

  window.addEventListener('load', function () {
    setTimeout(finish, Math.max(0, MIN_SHOW - (Date.now() - started)));
  });

  // Failsafe: never trap the visitor if the load event stalls.
  setTimeout(finish, 6000);
})();
