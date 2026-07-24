/* Service section — crossfade the left image + description to the hovered service. */
(function () {
  document.querySelectorAll('.service__inner').forEach(function (inner) {
    var img = inner.querySelector('.service__image');
    var desc = inner.querySelector('.service__desc');
    var items = inner.querySelectorAll('.service-item[data-sv-img]');
    if (!img || !items.length) {
      return;
    }

    // Seed with item 1's text (the default shown) so hovering it is a no-op.
    var currentDesc = items[0].getAttribute('data-sv-desc');
    var descTimer = null;
    if (desc) {
      desc.style.transition = 'opacity 0.25s ease';
    }

    function swapDesc(html) {
      if (!desc || html === currentDesc) {
        return;
      }
      currentDesc = html;
      clearTimeout(descTimer);
      desc.style.opacity = '0';
      descTimer = setTimeout(function () {
        desc.innerHTML = html;
        desc.style.opacity = '1';
      }, 250);
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
      var descHtml = item.getAttribute('data-sv-desc');
      new Image().src = url; // preload so the first hover is instant
      item.addEventListener('mouseenter', function () {
        swap(url);
        swapDesc(descHtml);
      });
      item.addEventListener('focusin', function () {
        swap(url);
        swapDesc(descHtml);
      });
    });
  });
})();
