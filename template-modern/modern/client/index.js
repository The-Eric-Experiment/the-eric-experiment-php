require("magnific-popup");
const mystifyBackground = require("./mystify");
const meteorBackground = require("./meteor");
/**
 * Gallery
 */

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
    $(".main-menu-content.right").removeClass("visible");
  });
}

$(".main-menu-content.right").on("click", function (event) {
  event.stopPropagation();
});

$(".main-menu-mobile-button").on("click", function (event) {
  event.stopPropagation();
  const $menu = $(this).siblings(".main-menu-content.right");
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

$(".window-border .button.maximise").on("click", function () {
  const windowBorder = $(this).closest(".window-border");
  if (windowBorder.hasClass("maximized")) {
    windowBorder.removeClass("maximized");
  } else {
    windowBorder.addClass("maximized");
  }
});

$(".window-border .button.minimise").on("click", function () {
  const windowBorder = $(this).closest(".window-border");
  const title = windowBorder.find(".title-text").text();
  windowBorder.css("display", "none");
  const icon = document.createElement("a");
  icon.href = "javascript:void(0)";
  icon.className = "icon";
  const img = document.createElement("img");
  img.src = "/templates/modern/public/folder-icon.gif";
  img.alt = title;
  icon.appendChild(img);
  const text = document.createElement("span");
  text.innerText = title.trim();
  text.className = "text";
  icon.appendChild(text);
  const icons = document.getElementsByClassName("icons")[0];
  icons.append(icon);
  $(icon).on("dblclick", function () {
    windowBorder.css("display", "inherit");
    icons.removeChild(icon);
  });
});

function isMeteor() {
  try {
    if (["/destinations"].includes(window.location.pathname)) {
      return true;
    }

    if (/^\/(windows3x|drivers)\/?/gim.exec(window.location.pathname)) {
      return false;
    }

    const oddSecond = new Date().getSeconds() % 2;
    return oddSecond === 1;
  } catch (_) {
    return true;
  }
}

if (isMeteor()) {
  meteorBackground();
} else {
  mystifyBackground();
}
