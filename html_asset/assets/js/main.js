/* ============================================================
   Khởi tạo chung cho trang chủ.
   ============================================================ */
(function () {
  function onReady(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  onReady(function () {
    var cfg = window.SITE_CONFIG || {};

    // Gắn URL đặt phòng cho mọi nút .js-reserve (khi đã có link thật).
    if (cfg.BOOKING_URL && cfg.BOOKING_URL !== "#") {
      document.querySelectorAll(".js-reserve").forEach(function (a) {
        a.setAttribute("href", cfg.BOOKING_URL);
        a.setAttribute("target", "_blank");
        a.setAttribute("rel", "noopener");
      });
    } else {
      // Nếu chưa có link thật (bằng "#"), gán sự kiện click mở modal contact
      document.querySelectorAll(".js-reserve").forEach(function (a) {
        a.addEventListener("click", function (e) {
          e.preventDefault();
          var contactModal = document.getElementById('modal-contact');
          if (contactModal) {
            contactModal.classList.add("is-open");
            document.body.style.overflow = "hidden";
          }
        });
      });
    }

    // .js-contact -> sẽ mở modal liên hệ (làm ở phase sau).

    // Modal cho phần Supervision / Fields
    var modalTriggers = document.querySelectorAll('.js-field-modal');
    modalTriggers.forEach(function (trigger) {
      var fieldId = trigger.getAttribute('data-field');
      var modalEl = document.getElementById('modal-field-' + fieldId);

      if (modalEl) {
        // Mở modal
        trigger.addEventListener("click", function (e) {
          e.preventDefault();
          modalEl.classList.add("is-open");
          document.body.style.overflow = "hidden";
        });

        // Đóng modal
        var closeElements = modalEl.querySelectorAll(".js-modal-close");
        closeElements.forEach(function (btn) {
          btn.addEventListener("click", function (e) {
            e.preventDefault();
            modalEl.classList.remove("is-open");
            var openModals = document.querySelectorAll('.modal.is-open');
            if (openModals.length === 0) {
              document.body.style.overflow = "";
            }
          });
        });
      }
    });

    // Modal cho phần Contact Form (Liên hệ) - kích hoạt bằng js-contact
    var contactTriggers = document.querySelectorAll('.js-contact');
    var contactModal = document.getElementById('modal-contact');
    if (contactModal) {
      contactTriggers.forEach(function (trigger) {
        trigger.addEventListener("click", function (e) {
          e.preventDefault();
          contactModal.classList.add("is-open");
          document.body.style.overflow = "hidden";
        });
      });

      var closeElements = contactModal.querySelectorAll(".js-modal-close");
      closeElements.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
          e.preventDefault();
          contactModal.classList.remove("is-open");
          var openModals = document.querySelectorAll('.modal.is-open');
          if (openModals.length === 0) {
            document.body.style.overflow = "";
          }
        });
      });
    }

    // Modal cho phần Privacy Policy (Chính sách bảo mật) - kích hoạt bằng js-privacy-trigger
    var privacyTriggers = document.querySelectorAll('.js-privacy-trigger');
    var privacyModal = document.getElementById('modal-privacy');
    if (privacyModal) {
      privacyTriggers.forEach(function (trigger) {
        trigger.addEventListener("click", function (e) {
          e.preventDefault();
          privacyModal.classList.add("is-open");
          document.body.style.overflow = "hidden";
        });
      });

      var closeElements = privacyModal.querySelectorAll(".js-modal-close");
      closeElements.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
          e.preventDefault();
          privacyModal.classList.remove("is-open");
          var openModals = document.querySelectorAll('.modal.is-open');
          if (openModals.length === 0) {
            document.body.style.overflow = "";
          }
        });
      });
    }

    // Modal cho phần Schedule Detail (Lịch trình chi tiết) - kích hoạt bằng js-schedule-detail-trigger
    var scheduleTriggers = document.querySelectorAll('.js-schedule-detail-trigger');
    var scheduleModal = document.getElementById('modal-schedule-detail');
    if (scheduleModal) {
      scheduleTriggers.forEach(function (trigger) {
        trigger.addEventListener("click", function (e) {
          e.preventDefault();
          scheduleModal.classList.add("is-open");
          document.body.style.overflow = "hidden";
        });
      });

      var closeElements = scheduleModal.querySelectorAll(".js-modal-close");
      closeElements.forEach(function (btn) {
        btn.addEventListener("click", function (e) {
          e.preventDefault();
          scheduleModal.classList.remove("is-open");
          var openModals = document.querySelectorAll('.modal.is-open');
          if (openModals.length === 0) {
            document.body.style.overflow = "";
          }
        });
      });
    }

    // Đóng khi nhấn phím Esc (chung cho tất cả modal)
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        var openModals = document.querySelectorAll('.modal.is-open');
        if (openModals.length > 0) {
          openModals.forEach(function (modal) {
            modal.classList.remove("is-open");
          });
          document.body.style.overflow = "";
        }
      }
    });
  });
})();
