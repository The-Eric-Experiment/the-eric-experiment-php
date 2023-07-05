export function loadYoutubeEmbeds() {
  const images = document.querySelectorAll("img[data-ytId]");

  // Loop through each image
  images.forEach((img) => {
    // Get the YouTube video ID from data-ytId attribute
    const videoId = img.getAttribute("data-ytId");

    // Create a new iframe for YouTube embed
    const iframe = document.createElement("iframe");

    // Set the src attribute of the iframe to embed the YouTube video
    iframe.src = `https://www.youtube.com/embed/${videoId}`;

    // Set additional attributes for the iframe
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "");
    iframe.setAttribute("width", "600px");
    iframe.setAttribute("height", "338px");

    // Replace the image with the YouTube embed iframe
    img.parentNode.replaceChild(iframe, img);
  });
}
