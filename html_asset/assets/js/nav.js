/* ============================================================
   Điều hướng: hamburger drawer (SP) + dropdown ngôn ngữ.
   ============================================================ */
(function () {
  function onReady(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  onReady(function () {
    var body = document.body;

    /* ---- Drawer (hamburger) ---- */
    var drawer = document.getElementById("drawer");
    var openBtn = document.querySelector(".js-drawer-open");
    var closeBtn = document.querySelector(".js-drawer-close");

    function openDrawer() {
      if (!drawer) return;
      drawer.classList.add("is-open");
      body.classList.add("no-scroll");
      if (openBtn) openBtn.setAttribute("aria-expanded", "true");
    }
    function closeDrawer() {
      if (!drawer) return;
      drawer.classList.remove("is-open");
      body.classList.remove("no-scroll");
      if (openBtn) openBtn.setAttribute("aria-expanded", "false");
    }

    if (openBtn) openBtn.addEventListener("click", openDrawer);
    if (closeBtn) closeBtn.addEventListener("click", closeDrawer);
    if (drawer) {
      drawer.addEventListener("click", function (e) {
        // bấm vào link điều hướng hoặc nền tối -> đóng
        if (e.target.closest("a") || e.target === drawer) closeDrawer();
      });
    }

    /* ---- Dropdown ngôn ngữ (có thể có nhiều: PC + SP) ---- */
    var langs = Array.prototype.slice.call(document.querySelectorAll("[data-lang]"));

    function closeAllLangs() {
      langs.forEach(function (lang) {
        var t = lang.querySelector(".lang__toggle");
        var m = lang.querySelector(".lang__menu");
        if (m) m.hidden = true;
        if (t) t.setAttribute("aria-expanded", "false");
      });
    }

    langs.forEach(function (lang) {
      var toggle = lang.querySelector(".lang__toggle");
      var menu = lang.querySelector(".lang__menu");
      if (!toggle || !menu) return;
      toggle.addEventListener("click", function (e) {
        e.stopPropagation();
        var isOpen = !menu.hidden;
        closeAllLangs();
        if (!isOpen) {
          menu.hidden = false;
          toggle.setAttribute("aria-expanded", "true");
        }
      });
    });

    /* ---- Đóng khi bấm ra ngoài / nhấn ESC ---- */
    document.addEventListener("click", closeAllLangs);
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        closeDrawer();
        closeAllLangs();
      }
    });
  });
})();
