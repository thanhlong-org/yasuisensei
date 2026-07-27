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

  // Matches the intro choreography in loader.css, which is shorter on SP.
  var sp = window.matchMedia && window.matchMedia('(max-width:767px)').matches;
  var MIN_SHOW = sp ? 850 : 1050;
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
    }, 700); // curtain transition (0.6s) + slack
  }

  // Hide as soon as the intro animation has played. Waiting for `load` used to
  // hold the curtain until every font and image had arrived, which on mobile
  // pushed the hero — the LCP element — several seconds past its actual paint.
  //
  // This file is inlined right below the loader markup (see header.php), so the
  // clock starts at parse time instead of after the footer bundle has been
  // fetched — on a phone that alone was up to a second of dead curtain.
  setTimeout(finish, Math.max(0, MIN_SHOW - (Date.now() - started)));
})();
