document.addEventListener("DOMContentLoaded", () => {
  // Animation for the welcome area
  gsap.from(".text-holder", {
    opacity: 0,
    duration: 2,
    y: -50,
    ease: "power2.out",
  });
  gsap.from(".img-holder", {
    opacity: 0,
    duration: 2,
    x: 50,
    ease: "power2.out",
    delay: 0.5,
  });

  // Animation for the features area
  gsap.from(".single-features-item", {
    opacity: 0,
    duration: 2,
    y: 50,
    ease: "power2.out",
    stagger: 0.2,
  });

  // Animation for the project area
  gsap.from(".single-project-item", {
    opacity: 0,
    duration: 2,
    y: 50,
    ease: "power2.out",
    stagger: 0.2,
  });

  // Animation for the slogan area
  gsap.from(".inner-content", {
    opacity: 0,
    duration: 2,
    y: 50,
    ease: "power2.out",
    delay: 0.5,
  });

  // Animation for the main title
  gsap.from("#main-title", {
    opacity: 0,
    duration: 2,
    y: -50,
    ease: "power2.out",
  });

  // Animation for individual car cards
  gsap.from(".card", {
    opacity: 0,
    duration: 2,
    y: 50,
    ease: "power2.out",
    stagger: 0.2,
  });

  // Animation for individual service items
  gsap.from(".single-service-item", {
    opacity: 0,
    scale: 0.5,
    duration: 2,
    stagger: 0.2,
    ease: "power2.out",
  });

  // Animation for pricing boxes
  gsap.from(".pricing-box", {
    opacity: 0,
    scale: 0.5,
    duration: 1,
    stagger: 0.2,
    ease: "power2.out",
  });

  // Animation for FAQ
  gsap.from(".single-item", {
    opacity: 0,
    y: 50,
    stagger: 0.2,
    duration: 1,
    ease: "power2.out",
  });
});
