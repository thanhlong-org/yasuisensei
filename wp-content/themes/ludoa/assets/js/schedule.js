/**
 * Section Schedule Animation using Intersection Observer
 */
document.addEventListener("DOMContentLoaded", () => {
  const scheduleSection = document.querySelector("#schedule");
  const timeline = document.querySelector(".schedule__timeline");
  const scheduleItems = document.querySelectorAll(".schedule__item");

  if (!scheduleSection) return;

  // Options for the main section observer
  const sectionOptions = {
    root: null,
    rootMargin: "0px 0px -10% 0px",
    threshold: 0.1,
  };

  // Section Observer
  const sectionObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        scheduleSection.classList.add("is-active");
        if (timeline) {
          timeline.classList.add("is-active");
        }
        observer.unobserve(entry.target); // Trigger once
      }
    });
  }, sectionOptions);

  sectionObserver.observe(scheduleSection);

  // Options for timeline items observer
  const itemOptions = {
    root: null,
    rootMargin: "0px 0px -15% 0px",
    threshold: 0.15,
  };

  // Items Observer
  const itemsObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target); // Trigger once
      }
    });
  }, itemOptions);

  scheduleItems.forEach((item) => {
    itemsObserver.observe(item);
  });
});
