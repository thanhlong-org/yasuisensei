/* ============================================================
   Contact modal flow: 入力 → 確認 → 完了 (single modal, AJAX submit)
   ============================================================ */
(function () {
  "use strict";

  function ready(fn) {
    if (document.readyState !== "loading") {
      fn();
    } else {
      document.addEventListener("DOMContentLoaded", fn);
    }
  }

  ready(function () {
    var modal = document.getElementById("modal-contact");
    if (!modal) return;

    var flow = modal.querySelector("[data-contact-flow]");
    var form = modal.querySelector(".js-contact-form");
    if (!flow || !form) return;

    var steps = flow.querySelectorAll(".contact-step");
    var fields = ["name", "email", "tel", "subject_type", "message"];
    var cfg = window.ludoaContact || {};

    function showStep(name) {
      steps.forEach(function (s) {
        s.classList.toggle("is-active", s.getAttribute("data-step") === name);
      });
      flow.scrollTop = 0;
    }

    function fieldValue(key) {
      var el = form.elements["ludoa_" + key];
      return el ? el.value.trim() : "";
    }

    function resetFlow() {
      form.reset();
      showStep("input");
    }

    // STEP 1 → STEP 2 (validate natively, then fill confirm)
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      if (typeof form.reportValidity === "function" && !form.reportValidity()) {
        return;
      }
      fields.forEach(function (key) {
        var val = fieldValue(key);
        var dd = flow.querySelector('[data-confirm="' + key + '"]');
        if (!dd) return;
        if (val !== "") {
          dd.textContent = val;
          dd.classList.remove("is-empty");
        } else {
          dd.textContent = "（未入力）";
          dd.classList.add("is-empty");
        }
      });
      showStep("confirm");
    });

    // STEP 2 → STEP 1
    var backBtn = flow.querySelector(".js-contact-back");
    if (backBtn) {
      backBtn.addEventListener("click", function () {
        showStep("input");
      });
    }

    // STEP 2 → submit (AJAX) → STEP 3
    var sendBtn = flow.querySelector(".js-contact-send");
    var errBox = flow.querySelector(".js-contact-error");
    if (sendBtn) {
      sendBtn.addEventListener("click", function () {
        if (!cfg.ajaxUrl) return;
        var original = sendBtn.textContent;
        sendBtn.disabled = true;
        sendBtn.textContent = "送信中…";
        if (errBox) errBox.hidden = true;

        var data = new FormData();
        data.append("action", "ludoa_contact_submit");
        data.append("nonce", cfg.nonce || "");
        fields.forEach(function (key) {
          data.append("ludoa_" + key, fieldValue(key));
        });
        var agree = form.elements["ludoa_agree"];
        data.append("ludoa_agree", agree && agree.checked ? "1" : "");

        fetch(cfg.ajaxUrl, {
          method: "POST",
          body: data,
          credentials: "same-origin"
        })
          .then(function (r) {
            return r.json();
          })
          .then(function (res) {
            if (res && res.success) {
              showStep("thankyou");
            } else {
              throw new Error("submit_failed");
            }
          })
          .catch(function () {
            if (errBox) {
              errBox.textContent =
                "送信に失敗しました。お手数ですが時間をおいて再度お試しください。";
              errBox.hidden = false;
            }
          })
          .then(function () {
            sendBtn.disabled = false;
            sendBtn.textContent = original;
          });
      });
    }

    // Reset back to step 1 after the modal is closed (main.js handles closing).
    modal.querySelectorAll(".js-modal-close").forEach(function (btn) {
      btn.addEventListener("click", function () {
        setTimeout(resetFlow, 300);
      });
    });
    var overlay = modal.querySelector(".modal__overlay");
    if (overlay) {
      overlay.addEventListener("click", function () {
        setTimeout(resetFlow, 300);
      });
    }
  });
})();
