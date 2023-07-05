const noRetroElements = document.querySelectorAll(".no-retro");
noRetroElements.forEach((element) => {
  if (typeof window.atob === "function") {
    const encodedContent = element.getAttribute("data-content");
    if (encodedContent) {
      const decodedContent = window.atob(encodedContent);
      element.outerHTML = decodedContent;
    }
  }
});
