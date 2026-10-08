(function () {
  "use strict";

  var toggle = document.querySelector(".nav-toggle");
  var nav = document.querySelector(".site-nav");
  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(open));
      toggle.textContent = open ? "Close" : "Menu";
    });
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
