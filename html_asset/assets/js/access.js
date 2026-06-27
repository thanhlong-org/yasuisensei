/**
 * Section Access Scroll Animation using Intersection Observer
 */
document.addEventListener("DOMContentLoaded", () => {
  const accessSection = document.querySelector("#access");

  if (!accessSection) return;

  const observerOptions = {
    root: null,
    rootMargin: "0px 0px -10% 0px", // Trigger when 10% of the section enters viewport
    threshold: 0.1,
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        accessSection.classList.add("is-active");
        observer.unobserve(entry.target); // Animates once
      }
    });
  }, observerOptions);

  observer.observe(accessSection);
});
