/**
 * Gallery
 */

require("magnific-popup");

$(".gallery-container").each(function () {
  // the containers for all your galleries
  $(this).magnificPopup({
    delegate: "a", // the selector for gallery item
    type: "image",
    gallery: {
      enabled: true,
    },
  });
});

/**
 * Main menu toggle
 */

function detachDocumentDismisser() {
  $(window).off("click");
}
function attachDocumentDismisser() {
  $(window).on("click", function () {
    detachDocumentDismisser();
    $(".mainmenu-content").removeClass("visible");
  });
}

$(".mainmenu-content").on("click", function (event) {
  event.stopPropagation();
});

$(".main-menu-mobile-button").on("click", function (event) {
  event.stopPropagation();
  const $menu = $(this).siblings(".mainmenu-content");
  const hasClass = $menu.hasClass("visible");
  if (!hasClass) {
    attachDocumentDismisser();
    $menu.addClass("visible");
  } else {
    $menu.removeClass("visible");
  }
});

/**
 * Window minimizer
 */
