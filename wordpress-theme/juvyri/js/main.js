(() => {
  "use strict";

  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ---------- Sticky header state ---------- */
  const header = document.getElementById("siteHeader");
  if (header) {
    const onScroll = () => {
      header.classList.toggle("scrolled", window.scrollY > 30);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* ---------- Mobile nav ---------- */
  const navToggle = document.getElementById("navToggle");
  const primaryNav = document.getElementById("primaryNav");
  const navBackdrop = document.getElementById("navBackdrop");

  if (navToggle && primaryNav && navBackdrop) {
    const closeNav = () => {
      navToggle.setAttribute("aria-expanded", "false");
      primaryNav.classList.remove("is-open");
      navBackdrop.classList.remove("is-open");
      document.body.style.overflow = "";
    };
    const openNav = () => {
      navToggle.setAttribute("aria-expanded", "true");
      primaryNav.classList.add("is-open");
      navBackdrop.classList.add("is-open");
      document.body.style.overflow = "hidden";
    };

    navToggle.addEventListener("click", () => {
      const isOpen = navToggle.getAttribute("aria-expanded") === "true";
      isOpen ? closeNav() : openNav();
    });

    navBackdrop.addEventListener("click", closeNav);

    primaryNav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", closeNav);
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeNav();
    });
  }

  /* ---------- Scroll reveal ---------- */
  const revealEls = document.querySelectorAll(".reveal");

  if (prefersReducedMotion || !("IntersectionObserver" in window)) {
    revealEls.forEach((el) => el.classList.add("is-visible"));
  } else {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -40px 0px" }
    );
    revealEls.forEach((el) => revealObserver.observe(el));
  }

  /* ---------- Count-up stats ---------- */
  const statEls = document.querySelectorAll(".stat-number[data-count]");

  const animateCount = (el) => {
    const target = parseInt(el.dataset.count, 10) || 0;
    if (prefersReducedMotion) {
      el.textContent = target;
      return;
    }
    const duration = 1400;
    const start = performance.now();

    const tick = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.round(target * eased);
      if (progress < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  if ("IntersectionObserver" in window) {
    const statObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCount(entry.target);
            statObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.6 }
    );
    statEls.forEach((el) => statObserver.observe(el));
  } else {
    statEls.forEach(animateCount);
  }

  /* ---------- Testimonial carousel (works with any number of slides) ---------- */
  const track = document.getElementById("testimonialTrack");
  const dotsWrap = document.getElementById("carouselDots");

  if (track && dotsWrap && track.children.length) {
    const slides = Array.from(track.children);
    let active = 0;
    let timer = null;

    slides.forEach((_, i) => {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.setAttribute("aria-label", `Show testimonial ${i + 1}`);
      dot.addEventListener("click", () => goTo(i, true));
      dotsWrap.appendChild(dot);
    });
    const dots = Array.from(dotsWrap.children);

    function render() {
      slides.forEach((s, i) => s.classList.toggle("is-active", i === active));
      dots.forEach((d, i) => d.classList.toggle("is-active", i === active));
    }

    function goTo(i, manual) {
      active = (i + slides.length) % slides.length;
      render();
      if (manual) restart();
    }

    function next() { goTo(active + 1); }

    function restart() {
      clearInterval(timer);
      if (!prefersReducedMotion && slides.length > 1) {
        timer = setInterval(next, 5500);
      }
    }

    render();
    restart();

    const carousel = document.getElementById("testimonialCarousel");
    if (carousel) {
      carousel.addEventListener("mouseenter", () => clearInterval(timer));
      carousel.addEventListener("mouseleave", restart);
      carousel.addEventListener("focusin", () => clearInterval(timer));
      carousel.addEventListener("focusout", restart);
    }
  }

  /* ---------- Newsletter form ----------
     If an admin has connected a real email service (Site Settings ->
     Newsletter Section -> sign-up URL), the <form> carries a real
     "action" attribute and posts there normally after a quick client-side
     check. Otherwise it's the same local "thank you" placeholder as
     before — it never actually collects addresses anywhere. */
  const form = document.getElementById("newsletterForm");
  const formMessage = document.getElementById("formMessage");
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (form) {
    const hasRealAction = !!form.getAttribute("action");

    form.addEventListener("submit", (e) => {
      const input = form.querySelector('input[type="email"]');
      const value = input.value.trim();

      if (!emailPattern.test(value)) {
        e.preventDefault();
        if (formMessage) formMessage.textContent = "Please enter a valid email address.";
        input.focus();
        return;
      }

      if (hasRealAction) {
        // Let the browser submit to the connected email service.
        return;
      }

      e.preventDefault();
      if (formMessage) formMessage.textContent = `Thank you — ${value} is on the list.`;
      form.reset();
    });
  }

  /* ---------- Back to top ---------- */
  const backToTop = document.getElementById("backToTop");
  if (backToTop) {
    backToTop.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion ? "auto" : "smooth" });
    });
  }
})();
