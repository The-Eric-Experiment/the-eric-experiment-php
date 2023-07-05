export function loadModernImages() {
  // Select all images in the page
  const images = document.querySelectorAll("img");

  // Loop through each image
  images.forEach((img) => {
    // Ignore images that have data-ytId attribute
    if (img.getAttribute("data-ytId")) {
      return;
    }

    // Get the current image src
    const src = img.src;

    // Construct the new image src with 'modern-' prepended to the filename
    const parts = src.split("/");
    const filename = parts.pop();
    const modernSrc = [...parts, "modern-" + filename].join("/");

    // Create a new image element
    const newImage = new Image();

    // When the new image loads successfully, replace the src of the original image
    newImage.onload = function () {
      img.src = modernSrc;
    };

    // This is necessary to catch errors silently if the image doesn't exist
    newImage.onerror = function () {};

    // Attempt to load the new image
    newImage.src = modernSrc;
  });
}
