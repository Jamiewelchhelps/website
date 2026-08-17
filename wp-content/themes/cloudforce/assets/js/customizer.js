/**
 * Live-preview handlers for the Customizer.
 */
(function () {
  'use strict';

  if (typeof wp === 'undefined' || !wp.customize) {
    return;
  }

  wp.customize('blogname', function (value) {
    value.bind(function (to) {
      document.querySelectorAll('.site-branding a, .footer-brand__logo').forEach(function (el) {
        el.textContent = to;
      });
    });
  });

  wp.customize('blogdescription', function (value) {
    value.bind(function (to) {
      document.querySelectorAll('.site-description').forEach(function (el) {
        el.textContent = to;
      });
    });
  });
})();
