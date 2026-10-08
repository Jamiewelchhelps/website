(function () {
  "use strict";

  var toggle = document.querySelector(".nav-toggle");
  var menu = document.querySelector(".mobile-menu");
  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      var open = menu.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(open));
      toggle.textContent = open ? "Close" : "Menu";
    });
  }

  // Scroll reveals: .io fades in once, honoring a per-element --d delay.
  var ios = document.querySelectorAll(".io");
  if ("IntersectionObserver" in window && ios.length) {
    var ob = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add("on"); ob.unobserve(e.target); }
      });
    }, { rootMargin: "0px 0px -10% 0px", threshold: 0.05 });
    ios.forEach(function (el) { ob.observe(el); });
  } else {
    ios.forEach(function (el) { el.classList.add("on"); });
  }

  // Company logos are optional drop-ins: if assets/logos/<slug>.svg exists,
  // it replaces the set wordmark; otherwise the wordmark stands.
  document.querySelectorAll("[data-logo]").forEach(function (cell) {
    var img = new Image();
    img.src = "assets/logos/" + cell.getAttribute("data-logo") + ".svg";
    img.alt = cell.textContent.trim();
    img.onload = function () {
      cell.textContent = "";
      cell.appendChild(img);
    };
  });

  var year = document.querySelector("[data-year]");
  if (year) year.textContent = new Date().getFullYear();
})();
