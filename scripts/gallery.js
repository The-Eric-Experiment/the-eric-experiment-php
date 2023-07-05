import "fslightbox";

const anchors = document.querySelectorAll("a[data-fslightbox]");

anchors.forEach((anchor) => {
  const img = anchor.querySelector("img");
  if (img) {
    const imgSrc = img.getAttribute("src");
    const parts = imgSrc.split("/");
    const filename = parts.pop();
    const newFilename =
      "modern-gallery-" + filename.replace("gallery-thumb-", "");
    anchor.setAttribute("href", parts.join("/") + "/" + newFilename);
  }
});

export function initiateGalleries() {
  refreshFsLightbox();
}
