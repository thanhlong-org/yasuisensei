/* ============================================================
   Slider cho khu vực 総合監修 (SUPERVISION).
   Sử dụng thư viện Swiper.js để tạo carousel active zoom.
   ============================================================ */
(function () {
  function onReady(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  onReady(function () {
    var swiperEl = document.querySelector('.supervision-swiper');
    if (!swiperEl) return;

    var swiper = new Swiper('.supervision-swiper', {
      loop: true,
      centeredSlides: true,
      slidesPerView: 1.3,
      spaceBetween: 20,
      initialSlide: window.innerWidth < 1024 ? 2 : 0, /* Index 2 (Onodera) cho SP, Index 0 (Fukuo) cho PC */
      speed: 600, /* Tốc độ chuyển slide mượt mà */
      
      /* Navigation */
      navigation: {
        nextEl: '.supervision__btn--next',
        prevEl: '.supervision__btn--prev',
      },

      /* Pagination */
      pagination: {
        el: '.supervision__pagination',
        clickable: true,
      },

      /* Breakpoints */
      breakpoints: {
        /* PC (màn hình lớn >= 1024px) */
        1024: {
          slidesPerView: 'auto',
          spaceBetween: 20,
          centeredSlides: false,
        }
      },

      on: {
        init: function () {
          updateVisualClasses(this);
        },
        slideChange: function () {
          updateVisualClasses(this);
        },
        transitionStart: function () {
          updateVisualClasses(this);
        },
        beforeLoop: function () {
          this.el.classList.add('no-transition');
        },
        loopFix: function () {
          var self = this;
          setTimeout(function () {
            self.el.classList.remove('no-transition');
          }, 0);
        }
      }
    });

    function updateVisualClasses(swiper) {
      if (window.innerWidth < 1024) {
        /* Trên mobile dùng Swiper mặc định */
        return;
      }
      var activeIndex = swiper.activeIndex;
      var visualActiveIndex = activeIndex + 2; /* visual active luôn là slide thứ 3 trong viewport */
      
      swiper.slides.forEach(function (slide, idx) {
        slide.classList.remove(
          'slide-left-hidden',
          'slide-visual-before',
          'slide-visual-active',
          'slide-visual-after'
        );
        if (idx < activeIndex) {
          slide.classList.add('slide-left-hidden');
        } else if (idx < visualActiveIndex) {
          slide.classList.add('slide-visual-before');
        } else if (idx === visualActiveIndex) {
          slide.classList.add('slide-visual-active');
        } else {
          slide.classList.add('slide-visual-after');
        }
      });
    }
  });
})();
