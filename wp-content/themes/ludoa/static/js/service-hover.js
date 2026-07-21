/* Service section — crossfade the left image to the hovered service's image. */
(function () {
  document.querySelectorAll('.service__inner').forEach(function (inner) {
    var img = inner.querySelector('.service__image');
    var items = inner.querySelectorAll('.service-item[data-sv-img]');
    if (!img || !items.length) {
      return;
    }

    var fade = document.createElement('span');
    fade.className = 'service__image-fade';
    fade.setAttribute('aria-hidden', 'true');
    img.appendChild(fade);

    var current = '';
    var timer = null;

    function swap(url) {
      if (url === current) {
        return;
      }
      current = url;
      clearTimeout(timer);
      fade.style.transition = 'none';
      fade.style.opacity = '0';
      fade.style.backgroundImage = 'url("' + url + '")';
      void fade.offsetWidth; // flush so the next opacity change animates
      fade.style.transition = '';
      fade.style.opacity = '1';
      timer = setTimeout(function () {
        img.style.backgroundImage = 'url("' + url + '")';
        fade.style.transition = 'none';
        fade.style.opacity = '0';
        void fade.offsetWidth;
        fade.style.transition = '';
      }, 600);
    }

    items.forEach(function (item) {
      var url = item.getAttribute('data-sv-img');
      new Image().src = url; // preload so the first hover is instant
      item.addEventListener('mouseenter', function () {
        swap(url);
      });
      item.addEventListener('focusin', function () {
        swap(url);
      });
    });
  });
})();
