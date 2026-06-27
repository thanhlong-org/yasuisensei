/**
 * Premium Scroll Animations & Parallax Scroll Effects
 */
document.addEventListener("DOMContentLoaded", () => {
  // ============================================================
  // 1. Intersection Observer for Scroll-Driven Reveals
  // ============================================================
  const revealElements = document.querySelectorAll(
    ".reveal-fade, .reveal-up, .reveal-left, .reveal-right, .reveal-stagger, .reveal-deco"
  );

  if (revealElements.length > 0) {
    const revealOptions = {
      root: null,
      rootMargin: "0px 0px -10% 0px", // Kích hoạt sớm hơn một chút khi cuộn vào 10% màn hình
      threshold: 0.05,
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target); // Chỉ chạy animation một lần duy nhất
        }
      });
    }, revealOptions);

    revealElements.forEach((el) => {
      revealObserver.observe(el);
    });
  }

  // ============================================================
  // 2. Parallax Scroll Effect for Background Vertical Decos (PC Only)
  // ============================================================
  const isPC = () => window.innerWidth >= 1024;

  const parallaxTargets = [
    { section: "#program", deco: ".program__deco", speed: 0.06 },
    { section: "#supervision", deco: ".supervision__deco", speed: -0.05 },
    { section: "#fields", deco: ".fields__deco", speed: 0.05 },
    { section: "#wishes", deco: ".wishes__deco", speed: 0.08 },
    { section: "#pricing", deco: ".pricing__deco", speed: -0.06 }, // Đi ngược chiều nhẹ để tạo sự so le
    { section: "#schedule", deco: ".schedule__deco", speed: 0.05 },
    { section: "#access", deco: ".access__deco", speed: -0.05 },
    { section: "#faq", deco: ".faq__deco", speed: 0.05 }
  ];

  // Khởi tạo các DOM elements cần thiết
  const elements = parallaxTargets.map(t => ({
    sectionEl: document.querySelector(t.section),
    decoEl: document.querySelector(t.deco),
    speed: t.speed
  })).filter(t => t.sectionEl && t.decoEl);

  let tick = false;

  const updateParallax = () => {
    if (!isPC()) {
      // Reset transform trên mobile để tránh lỗi vị trí
      elements.forEach(el => {
        el.decoEl.style.transform = "";
      });
      tick = false;
      return;
    }

    elements.forEach(el => {
      const rect = el.sectionEl.getBoundingClientRect();
      const viewportHeight = window.innerHeight;

      // Chỉ tính toán và di chuyển khi section nằm trong viewport hoặc gần viewport
      if (rect.top < viewportHeight && rect.bottom > 0) {
        // Tính toán khoảng cách dịch chuyển tương đối dựa trên vị trí top của section so với viewport
        const relativeOffset = rect.top * el.speed;
        
        //pricing__deco có transform: translateY(-50%) trong css gốc nếu có?
        // Hãy kiểm tra xem: pricing__deco không có translateY trong CSS gốc,
        // Nhưng wishes__deco, schedule__deco, access__deco có transform gì không?
        // Không có transform mặc định nào ngoài vị trí absolute.
        el.decoEl.style.transform = `translateY(${relativeOffset}px)`;
      }
    });

    tick = false;
  };

  window.addEventListener("scroll", () => {
    if (!tick) {
      requestAnimationFrame(updateParallax);
      tick = true;
    }
  }, { passive: true });

  // Cập nhật một lần khi vừa load trang
  updateParallax();

  // Reset khi thay đổi kích thước màn hình
  window.addEventListener("resize", () => {
    if (!tick) {
      requestAnimationFrame(updateParallax);
      tick = true;
    }
  }, { passive: true });
});
