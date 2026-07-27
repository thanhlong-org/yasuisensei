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

  // Hard cap: the loader is off screen 3s after navigation starts, full stop.
  // 2300ms of intro (the gold bar tops out right here) + the 0.7s curtain split.
  var MIN_SHOW = 2300;
  var done = false;

  // Elapsed since navigation start — NOT since this script ran. The two used to
  // be the same thing only on a fast connection: whatever delays the document
  // (slow TTFB, the render-blocking CSS, a phone crawling through the image
  // queue) used to be added on top of the budget instead of counting against
  // it, which is how a ~3s curtain turned into a minute of navy on mobile.
  function elapsed() {
    if (window.performance && typeof performance.now === 'function') {
      return performance.now();
    }
    return 0;
  }

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
    }, 750); // curtain transition (0.7s) + slack
  }

  // Hide as soon as the intro animation has played. Waiting for `load` used to
  // hold the curtain until every font and image had arrived, which on mobile
  // pushed the hero — the LCP element — several seconds past its actual paint.
  //
  // This file is inlined right below the loader markup (see header.php) so it
  // runs at parse time rather than after the footer bundle has been fetched.
  setTimeout(finish, Math.max(0, MIN_SHOW - elapsed()));

  // Back/forward cache restore replays no timers — bail out immediately.
  window.addEventListener('pageshow', function (e) {
    if (e.persisted) {
      finish();
    }
  });
})();
