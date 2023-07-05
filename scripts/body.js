var style = document.createElement("style");
style.type = "text/css";
style.innerHTML = ".content-wrapper { max-width: 900px; margin: 0 auto; }";
document.head.appendChild(style);

var wrapper = document.createElement("div");
wrapper.className = "content-wrapper";
var bodyContent = document.body.innerHTML;
wrapper.innerHTML = bodyContent;
document.body.innerHTML = "";
document.body.appendChild(wrapper);
