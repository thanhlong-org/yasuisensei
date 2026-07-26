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

  var MIN_SHOW = 1400; // matches the (tightened) intro choreography in loader.css
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

  // Hide as soon as the intro animation has played. Waiting for `load` used to
  // hold the curtain until every font and image had arrived, which on mobile
  // pushed the hero — the LCP element — several seconds past its actual paint.
  setTimeout(finish, Math.max(0, MIN_SHOW - (Date.now() - started)));
})();
