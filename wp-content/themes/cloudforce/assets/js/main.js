/**
 * Cloudforce theme scripts.
 *
 * Deliberately dependency-free — no jQuery. The legacy theme loaded jQuery
 * plus eight plugins for behaviour that modern CSS and a few lines of JS
 * handle on their own.
 */
(function () {
  'use strict';

  /**
   * Mobile navigation toggle.
   */
  function initMenuToggle() {
    var toggle = document.querySelector('.menu-toggle');
    var nav = document.querySelector('.main-navigation');

    if (!toggle || !nav) {
      return;
    }

    toggle.addEventListener('click', function () {
      var isOpen = toggle.getAttribute('aria-expanded') === 'true';

      toggle.setAttribute('aria-expanded', String(!isOpen));
      nav.classList.toggle('is-open', !isOpen);
    });

    // Close the menu on Escape, returning focus to the toggle.
    document.addEventListener('keydown', function (event) {
      if (event.key !== 'Escape') {
        return;
      }

      if (toggle.getAttribute('aria-expanded') === 'true') {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
        toggle.focus();
      }
    });

    // Reset state when resizing back up to the desktop layout.
    var desktop = window.matchMedia('(min-width: 60rem)');
    var reset = function (event) {
      if (event.matches) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
      }
    };

    if (typeof desktop.addEventListener === 'function') {
      desktop.addEventListener('change', reset);
    }
  }

  /**
   * Reveal sections as they scroll into view.
   *
   * Skipped entirely when the visitor prefers reduced motion.
   */
  function initReveal() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return;
    }

    if (!('IntersectionObserver' in window)) {
      return;
    }

    var targets = document.querySelectorAll('.section, .hero');

    if (!targets.length) {
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: '0px 0px -10% 0px', threshold: 0.05 }
    );

    targets.forEach(function (target) {
      target.classList.add('will-reveal');
      observer.observe(target);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initMenuToggle();
      initReveal();
    });
  } else {
    initMenuToggle();
    initReveal();
  }
})();
