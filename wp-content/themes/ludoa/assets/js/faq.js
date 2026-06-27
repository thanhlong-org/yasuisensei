/**
 * Section FAQ Accordion Actions & Animation
 */
document.addEventListener("DOMContentLoaded", () => {
  const faqSection = document.querySelector("#faq");
  const faqItems = document.querySelectorAll(".faq__item");

  // 1. Scroll animation using Intersection Observer
  if (faqSection) {
    const observerOptions = {
      root: null,
      rootMargin: "0px 0px -10% 0px",
      threshold: 0.1,
    };

    const sectionObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          faqSection.classList.add("is-active");
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    sectionObserver.observe(faqSection);
  }

  // 2. Accordion Toggling
  faqItems.forEach((item) => {
    const header = item.querySelector(".faq__item-header");
    if (!header) return;

    header.addEventListener("click", () => {
      const isOpen = item.classList.contains("is-open");
      
      // Toggle current item
      item.classList.toggle("is-open");
      header.setAttribute("aria-expanded", !isOpen);
    });
  });
});
